<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	var $session_data = "";
	public function __Construct() {
		parent::__construct();
		 $this->load->library('user_agent');
            date_default_timezone_set('Asia/Jakarta');
		$this->cekLogin();
		$this->session_data = $this->session->userdata('user_dashboard');
	}

	public function index()
	{
		if ($this->session->userdata('empno') == true) 
		{
			$lat       = $this->input->get('para1');
			$long      = $this->input->get('para2');

			$_SESSION["lat"]  = $lat;
			$_SESSION["long"] = $long;

			$empno     = $this->session->userdata('empno');
			$pinno     = $this->session->userdata('pinno');
			$plant     = $this->session->userdata('plant');
			$today     = date('Y-m-d');
			$ATTEND_DATE = str_replace('-', '', $today);

			$loginDetail = $this->m_data_login($empno, $pinno, $plant, $ATTEND_DATE)->row();
			$data['lattt']  = $lat;
			$data['longgg'] = $long;

			// Cek jika tidak ada absen hari ini, siapkan data kosong untuk check-in
			if (empty($loginDetail)) {
				$loginDetail = (object)[
					'ATTEND_DATE' => $ATTEND_DATE,
					'IN_TIME'     => '0000',
					'OUT_TIME'    => '0000',
					'REG_IN_OS'   => '',
					'REG_OUT_OS'  => '',
					'GMT'         => null
				];
			}

			$data['baris'] = $loginDetail;

			// Hitung zona waktu (WIB/WITA/WIT) jika IN_TIME sudah terisi
			if ($loginDetail->IN_TIME !== '0000') {
				$currGMT = $loginDetail->GMT ?? 7;

				if ($currGMT == 7 || $currGMT == 0) {
					$data['gmt'] = 'WIB';
				} elseif ($currGMT == 8 || $currGMT == 1) {
					$data['gmt'] = 'WITA';
				} elseif ($currGMT == 9 || $currGMT == 2) {
					$data['gmt'] = 'WIT';
				} else {
					$data['gmt'] = null;
				}
			} else {
				$data['gmt'] = null;
			}

			$data['attend_date'] = $ATTEND_DATE;

			$this->load->view('admin/index', $data);
		} 
		else 
		{
			redirect('login');
		}
	}

	public function check_in()
    {
        if ($this->session->userdata('empno') == true) {
            date_default_timezone_set('Asia/Jakarta');
            $GMT = 7;

			$COMPANY = '01';
            $EMPNO = $this->session->userdata('empno');
            $PINNO = $this->session->userdata('pinno');
            $PLANT = $this->session->userdata('plant');
            $REG_IN_OS = $this->session->userdata('host');
            $REG_IN_IP = $this->session->userdata('ip');

            $REG_IN_LAT = $this->input->post('lat');
			$REG_IN_LONG = $this->input->post('long');

			if (empty($REG_IN_LAT) || empty($REG_IN_LONG)) {
				$this->session->set_flashdata('GAGAL', '
					<script type="text/javascript">
						sweetAlert("", "Lokasi gagal didapatkan. Silakan aktifkan GPS Anda.", "error");
					</script>
				');
				redirect('dashboard');
				return;
			}

            $LAT_CJJKT = -6.2334289;
            $LONG_CJJKT = 106.8190722;

            $THETA = $LONG_CJJKT - $REG_IN_LONG;
            $MILES = (sin(deg2rad($LAT_CJJKT)) * sin(deg2rad($REG_IN_LAT))) + (cos(deg2rad($LAT_CJJKT)) * cos(deg2rad($REG_IN_LAT)) * cos(deg2rad($THETA)));
            $MILES = acos($MILES);
            $MILES = rad2deg($MILES);
            $MILES = $MILES * 60 * 1.1515;
            $kilometers = $MILES * 1.609344;
            $meters = $kilometers * 1000;
            //Validasi Meter atau Jarak
            if ($meters>300 || $this->session->userdata('empno') == '220023') {
                $REG_IN = $REG_IN_LAT.','.$REG_IN_LONG;
                $ATTEND_DATE = str_replace('-','', date('Y-m-d'));

                $getGMTData = $this->getGMTData();
                $TIME_IN = str_replace('-','', date('H-i', strtotime('+'.$getGMTData.' hour')));
                $GMT = empty($getGMTData) ? 0 : $getGMTData ;

                $ms = substr((microtime(true)),12,2);
                date_default_timezone_set('Asia/Jakarta');

                if ($this->agent->is_browser())
                {
                    $agent = $this->agent->platform().' '.$this->agent->browser().' '.$this->agent->version();
                }
                elseif ($this->agent->is_mobile())
                {
                    $agent = $this->agent->mobile();
                }
                else
                {
                    $agent = '';
                }

                if (!empty($_SERVER["HTTP_CLIENT_IP"]))
                {
                    $ip = $_SERVER["HTTP_CLIENT_IP"];
                }
                elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
                {
                    $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
                }
                else
                {
                    $ip = $_SERVER["REMOTE_ADDR"];
                }

                $upload_path = FCPATH . "uploads/$PLANT";
				if (!is_dir($upload_path)) {
					mkdir($upload_path, 0777, true); // Buat folder otomatis
				}

				$config['upload_path'] = $upload_path;
				$config['file_name'] = $PLANT."_".$EMPNO."_".$ATTEND_DATE."_IN.jpg";
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['overwrite'] = true;

				$this->load->library('upload', $config);

                if (! $this->upload->do_upload('selfie_in')) {
					$error = $this->upload->display_errors(); // Ambil pesan error upload
					$this->session->set_flashdata('GAGAL', '
						<script type="text/javascript">
							sweetAlert("Upload Error", "'.str_replace('"', "'", $error).'", "error");
						</script>
					');
					redirect('dashboard');
					return;
				}

                $uploadData = $this->upload->data();

                unset($config);

                $config = $this->createImgConfig($uploadData['full_path']);
                $this->load->library('image_lib', $config);

                if($this->image_lib->resize()) {
                    if(array_key_exists('rotation_angle', $config)) $this->image_lib->rotate();
                }

                $sql = "            
                INSERT INTO HR_ATTENDANCE_WFH(
                    COMPANY,
                    PLANT,
                    EMPNO,
                    ATTEND_DATE,
                    TIME_IN, REG_IN_OS, REG_IN_IP, GMT)
                VALUES(
                    '$COMPANY',
                    '$PLANT',
                    '$EMPNO',
                    '$ATTEND_DATE',
                    '$TIME_IN',
                    '$REG_IN',
                    '$ip',
                    $GMT
                )";
                // echo "<pre/>";print_r($sql);exit;
                $INSERTDATA = $this->db->query($sql); //INSERT DB
                 if ($this->session->userdata('empno') == '220014') {
                    // echo "<pre/>";print_r($sql);
                    // echo "<pre/>";print_r($INSERTDATA);exit;
                }
                
                $this->session->set_flashdata('sukses', '
                            <script type="text/javascript">
                                sweetAlert("", "Successfully insert Data", "success");
                            </script>
                            ');
                        redirect('dashboard');            
            }
            else 
            {
             $this->load->view('afterlogin/V_Dikantor');
            }
        } 
        else 
        {
            redirect();
        }
    }

	public function check_out()
	{
		if ($this->session->userdata('empno')) 
		{
			date_default_timezone_set('Asia/Jakarta');
			$GMT = 7;

			$COMPANY = '01';
			$EMPNO = $this->session->userdata('empno');
			$PINNO = $this->session->userdata('pinno');
			$PLANT = $this->session->userdata('plant');
			$REG_OUT_OS = $this->session->userdata('host');
			$REG_OUT_IP = $this->session->userdata('ip');

			$REG_OUT_LAT = $this->input->post('latout');
			$REG_OUT_LONG = $this->input->post('longout');

			if (empty($REG_OUT_LAT) || empty($REG_OUT_LONG)) {
				$this->session->set_flashdata('GAGAL', '
					<script type="text/javascript">
						sweetAlert("", "Lokasi gagal didapatkan. Silakan aktifkan GPS Anda.", "error");
					</script>
				');
				redirect('dashboard');
				return;
			}

			$LAT_CJJKT = -6.2334289;
			$LONG_CJJKT = 106.8190722;

			$THETA = $LONG_CJJKT - $REG_OUT_LONG;
			$MILES = (sin(deg2rad($LAT_CJJKT)) * sin(deg2rad($REG_OUT_LAT))) + (cos(deg2rad($LAT_CJJKT)) * cos(deg2rad($REG_OUT_LAT)) * cos(deg2rad($THETA)));
			$MILES = acos($MILES);
			$MILES = rad2deg($MILES);
			$MILES = $MILES * 60 * 1.1515;
			$kilometers = $MILES * 1.609344;
			$meters = $kilometers * 1000;

			$REG_OUT = $REG_OUT_LAT . ',' . $REG_OUT_LONG;
			$ATTEND_DATE = str_replace('-', '', date('Y-m-d'));

			$getGMTData = $this->getGMTData();
			$TIME_OUT = str_replace('-', '', date('H-i', strtotime('+' . $getGMTData . ' hour')));
			$GMT = empty($getGMTData) ? 0 : $getGMTData;

			$upload_path = FCPATH . "uploads/$PLANT";
			if (!is_dir($upload_path)) {
				mkdir($upload_path, 0777, true);
			}

			$config['upload_path'] = $upload_path;
			$config['file_name'] = $PLANT . "_" . $EMPNO . "_" . $ATTEND_DATE . "_OUT.jpg";
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['overwrite'] = true;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('selfie_out')) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('GAGAL', '
					<script type="text/javascript">
						sweetAlert("Upload Error", "' . str_replace('"', "'", $error) . '", "error");
					</script>
				');
				redirect('dashboard');
				return;
			}

			$uploadData = $this->upload->data();

			unset($config);
			$config = $this->createImgConfig($uploadData['full_path']);
			$this->load->library('image_lib', $config);

			if ($this->image_lib->resize()) {
				if (array_key_exists('rotation_angle', $config)) $this->image_lib->rotate();
			}

			// Update query
			$sql = "
				UPDATE HR_ATTENDANCE_WFH
				SET TIME_OUT = '$TIME_OUT', REG_OUT_OS = '$REG_OUT', REG_OUT_IP = '$REG_OUT_IP'
				WHERE COMPANY = '$COMPANY'
				AND EMPNO = '$EMPNO'
				AND PLANT = '$PLANT'
				AND ATTEND_DATE = '$ATTEND_DATE'
			";

			$this->db->query($sql);

			$this->session->set_flashdata('sukses', '
				<script type="text/javascript">
					sweetAlert("", "Successfully Check Out Attendance", "success");
				</script>
			');
			redirect('dashboard');
		} else {
			redirect();
		}
	}

	private function createImgConfig($path)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path;
        $config['maintain_ratio'] = TRUE;
        $config['new_image']     = $path;

        $exif = exif_read_data($path);

        if ($exif && (!empty($exif['Orientation']))) {
            switch ($exif['Orientation']) {
                case 1: // nothing
                    $config['width'] = 500;
                    break;
                case 2: // horizontal flip
                    $config['rotation_angle'] = 'hor';
                    $config['width'] = 500;
                    break;
                case 3: // 180 rotate left
                    $config['rotation_angle'] = 180;
                    $config['width'] = 500;
                    break;
                case 4: // vertical flip
                    $config['rotation_angle'] = 'ver';
                    $config['width'] = 500;
                    break;
                case 5: // vertical flip + 90 rotate right
                    $config['rotation_angle'] = 270;
                    $config['height'] = 500;
                    break;
                case 6: // 90 rotate right
                    $config['rotation_angle'] = 270;
                    $config['height'] = 500;
                    break;
                case 7: // horizontal flip + 90 rotate right
                    $config['rotation_angle'] = 90;
                    $config['height'] = 500;
                    break;
                case 8:    // 90 rotate left
                    $config['rotation_angle'] = 90;
                    $config['height'] = 500;
                    break;
                default:
                    $config['width'] = 500;
            }
        } else {
            $config['width'] = 500;
        }

        return $config;
    }

	private function getGMTData() {
        $user_ok     = $this->session->userdata('empno');
        $plant_ok    = $this->session->userdata('plant');
        
        $login   = $this->m_gmt($user_ok,$plant_ok)->row();
        return $login->GMT;
    }

	public function m_gmt($empno, $plant)
	{
		date_default_timezone_set('Asia/Jakarta');
 		$now_date = str_replace('-','', date('Y-m-d'));

		$query_login = "
			SELECT * FROM HR_EMPLOYEE_ATTD WHERE EMPNO = '$empno' AND PLANT = '$plant'
		";
		$login = $this->db->query($query_login);

		return $login;
	}

	private function m_history_login($empno, $plant)
	{
		date_default_timezone_set('Asia/Jakarta');
 		$now_date = str_replace('-','', date('Y-m-d'));

		$query_login = "
			SELECT * FROM HR_ATTENDANCE_WFH WHERE EMPNO = '$empno' AND PLANT = '$plant' ORDER BY ATTEND_DATE DESC
		";

		$login = $this->db->query($query_login)->row();

		return $login;
	}
	
	public function m_data_login($empno, $pinno, $plant, $attend_date)
	{
		date_default_timezone_set('Asia/Jakarta');
 		$now_date = str_replace('-','', date('Y-m-d'));

		$query_login = "
			SELECT COMPANY,        
				PLANT AS PLANT_CODE,
				case when plant = '0101' then 'SUPER UNGGAS JAYA' 
             		 WHEN PLANT = '0102' THEN 'CJ SUPERFEED'
             		 WHEN PLANT = '0112' THEN 'CJ HQ'
             		 WHEN PLANT = '0401' THEN 'CJF JOMBANG'
             	 	 WHEN PLANT = '0402' THEN 'CJF MEDAN'
             		 WHEN PLANT = '0403' THEN 'CJF LAMPUNG'
             		 WHEN PLANT = '0404' THEN 'CJF SEMARANG' 
             		 WHEN PLANT = '0405' THEN 'CJF KALIMANTAN' END AS PLANT,
	            EMPNO, 
	            PINNO, 
	            FULL_NAME, 
	            DEPT_NAME, 
	            $now_date AS ATTEND_DATE,
	            nvl((SELECT TIME_IN FROM HR_ATTENDANCE_WFH WHERE EMPNO = A.EMPNO AND PLANT = A.PLANT and attend_date = $now_date),'0000') AS IN_TIME,
				nvl((SELECT TIME_OUT FROM HR_ATTENDANCE_WFH WHERE EMPNO = A.EMPNO AND PLANT = A.PLANT and attend_date = $now_date),'0000') AS OUT_TIME,
				nvl((SELECT REG_IN_OS FROM HR_ATTENDANCE_WFH WHERE EMPNO = A.EMPNO AND PLANT = A.PLANT and attend_date = $now_date),'0000') AS REG_IN_OS,
				nvl((SELECT REG_OUT_OS FROM HR_ATTENDANCE_WFH WHERE EMPNO = A.EMPNO AND PLANT = A.PLANT and attend_date = $now_date),'0000') AS REG_OUT_OS,
				(SELECT GMT FROM HR_ATTENDANCE_WFH WHERE EMPNO = A.EMPNO AND PLANT = A.PLANT and attend_date = $now_date) AS GMT
            FROM HR_EMPLOYEE_ATTD A
                WHERE   A.EMPNO = '$empno' AND
						A.PINNO = '$pinno' AND
						A.PLANT = '$plant'
		";

		$login = $this->db->query($query_login);

		return $login;
	}

	// private function m_data_login($empno, $password, $plant, $now_date)
	// {
	// 	date_default_timezone_set('Asia/Jakarta');
 	// 	$now_date = str_replace('-','', date('Y-m-d'));

	// 	$query_login = "
	// 		SELECT COMPANY,        
	// 			PLANT AS PLANT_CODE,
	// 			case when plant = '0101' then 'SUPER UNGGAS JAYA' 
    //          		 WHEN PLANT = '0102' THEN 'CJ SUPERFEED'
    //          		 WHEN PLANT = '0112' THEN 'CJ HQ'
    //          		 WHEN PLANT = '0401' THEN 'CJF JOMBANG'
    //          	 	 WHEN PLANT = '0402' THEN 'CJF MEDAN'
    //          		 WHEN PLANT = '0403' THEN 'CJF LAMPUNG'
    //          		 WHEN PLANT = '0404' THEN 'CJF SEMARANG' 
    //          		 WHEN PLANT = '0405' THEN 'CJF KALIMANTAN' END AS PLANT,
	//             EMPNO, 
	//             PINNO, 
	//             FULL_NAME, 
	//             DEPT_NAME, 
	//             $now_date AS ATTEND_DATE,
	//             nvl((SELECT TIME_IN FROM HR_ATTENDANCE_WFH WHERE EMPNO = A.EMPNO AND PLANT = A.PLANT and attend_date = $now_date),'0000') AS IN_TIME,
	// 			nvl((SELECT TIME_OUT FROM HR_ATTENDANCE_WFH WHERE EMPNO = A.EMPNO AND PLANT = A.PLANT and attend_date = $now_date),'0000') AS OUT_TIME,
	// 			nvl((SELECT REG_IN_OS FROM HR_ATTENDANCE_WFH WHERE EMPNO = A.EMPNO AND PLANT = A.PLANT and attend_date = $now_date),'0000') AS REG_IN_OS,
	// 			nvl((SELECT REG_OUT_OS FROM HR_ATTENDANCE_WFH WHERE EMPNO = A.EMPNO AND PLANT = A.PLANT and attend_date = $now_date),'0000') AS REG_OUT_OS,
	// 			(SELECT GMT FROM HR_ATTENDANCE_WFH WHERE EMPNO = A.EMPNO AND PLANT = A.PLANT and attend_date = $now_date) AS GMT
    //         FROM HR_EMPLOYEE_ATTD A
    //             WHERE   A.EMPNO = '$empno' AND
	// 					A.PINNO = '$password' AND
	// 					A.PLANT = '$plant'
	// 	";

	// 	$login = $this->db->query($query_login);

	// 	return $login;
	// }

	private function getTimeZoneId($lat, $lon){

        // buat akun di geonames dan aktifkan fungsi web services
        $username = "induray";
        $url = "http://api.geonames.org/timezoneJSON?lat=".$lat."&lng=".$lon."&username=".$username;
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        if(curl_errno($ch)){
            // echo 'Curl error: ' . curl_error($ch);
        }
        curl_close($ch);      
        return $output;
    }

    private function _getNextSeq($req_no) {
        $this->db->select_max('SEQ');
        $this->db->where('REQ_NO', $req_no);
        $query = $this->db->get('TR_SS_ORDER_REQUEST_APPROVAL');
        $row = $query->row();

        return $row ? ($row->SEQ + 1) : 1;
    }

	private function cekLogin() {
		$session = $this->session->userdata('user_dashboard');
		if (empty($session)) {
			redirect('login_dashboard');
		}
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __Construct() {
		parent::__construct();
	}

	public function index() {
		redirect('home');
	}

	private function list_userlogin($employee_id) {
		$data['999999'] = [
			'id'			=> 1,
			'company'		=> '01',
			'plant'			=> '0112',
			'dept'			=> '2110',
			'area'			=> '0001',
			'employee_id'	=> '999999',
			'password'		=> password_hash('1100', PASSWORD_DEFAULT),
			'full_name'		=> 'Administrator',
			'email'			=> '',
			'plant_name'	=> 'CJFC Jakarta',
			'dept_name'		=> 'IT SST',
			'area_name'		=> 'JAKARTA AREA'
		];

		return !empty($data[$employee_id]) ? $data[$employee_id] : [];
	}

	public function login() {
		redirect('login');
	}

	public function login_dashboard()
	{
		if ($_SERVER['REQUEST_METHOD'] != 'POST') {
			return $this->load->view('admin/login');
		}
		$session_dashboard = $this->session->userdata('user_dashboard');
		if (!empty($session_dashboard)) {
			return redirect('dashboard');
		}

		$user_suja = trim($this->input->post('user_suja', TRUE));
		$password  = trim($this->input->post('password', TRUE));
		$plant     = trim($this->input->post('plant', TRUE));

		// Sanitasi input
		$user_ok     = str_replace("'", "", $user_suja);
		$password_ok = str_replace("'", "", $password);
		$plant_ok    = str_replace("'", "", $plant);

		// Proses login
		$login = $this->m_login($user_ok, $password_ok, $plant_ok);

		if ($login == 1) {
			// $logindt  = $this->m_login_wfh($user_ok);
			// $logindt2 = $this->m_login_wfh2($user_ok);

			$logindt = 1;
			if ($logindt == 1) {
				return redirect('dashboard');
			} elseif ($logindt2 == 1) {
				$this->session->set_flashdata('message', '
					<div class="alert alert-danger" role="alert">
						<strong>Failed!</strong> Jadwal Anda WFO, Tidak Bisa Login
					</div>
				');
				return redirect('login');
			} else {
				return redirect('dashboard');
			}
		} else {
			$this->session->set_flashdata('message', '
				<div class="alert alert-danger" role="alert">
					<strong>Failed!</strong> Wrong employee ID or password
				</div>
			');
			return redirect('login');
		}

		// View login hanya ditampilkan jika belum ada POST
		$this->load->view('admin/login');
	}


	private function m_login($empno, $password, $plant)
	{
		$login = $this->db->get_where('HR_EMPLOYEE_ATTD', [
			'EMPNO' => $empno,
			'PINNO' => $password,
			'PLANT' => $plant
		]);
		// Ambil IP dan Host
		$ip = $_SERVER["HTTP_CLIENT_IP"] ?? $_SERVER["HTTP_X_FORWARDED_FOR"] ?? $_SERVER["REMOTE_ADDR"];
		$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);

		if ($login->num_rows() === 1) {
			$user = $login->row();
			$this->session->set_userdata([
				'user_dashboard' => TRUE, // tambahkan ini untuk mencegah redirect loop
				'empno' => $user->EMPNO,
				'pinno' => $user->PINNO,
				'plant' => $user->PLANT,
				'full_name' => $user->FULL_NAME,
				'dept_name' => $user->DEPT_NAME,
				'ip' => $ip,
				'host' => $host
			]);
			return 1;
		}

		return 0;
	}


	private function m_login_wfh($empno)
	{
		$query = $this->db->get_where('HR_DAILY_ATTENDANCE_WFH', [
			'EMPNO' => $empno,
			'STATUS' => 'H'
		]);

		return ($query->num_rows() === 1) ? 1 : 0;
	}

	private function m_login_wfh2($empno)
	{
		$query = $this->db->get_where('HR_DAILY_ATTENDANCE_WFH', [
			'EMPNO' => $empno,
			'STATUS' => 'O'
		]);

		return ($query->num_rows() === 1) ? 1 : 0;
	}


	private function proceed_login($user) {
		$user_access = json_decode($user['MENU_ACCESS']);
		// $user_area 	= $this->Dbhelper->selectTabel('CODE_AREA', 'CD_USER_AREA', array('EMPLOYEE_ID' => $user['EMPLOYEE_ID']));
		// $user_customer 	= $this->Dbhelper->selectTabel('CUSTOMER', 'CD_USER_CUSTOMER', array('EMPLOYEE_ID' => $user['EMPLOYEE_ID']));

		// $area = [];
		// $customer = [];
		// if (!empty($user_area)) {
		// 	foreach ($user_area as $v) {
		// 		$area[] = $v['CODE_AREA'];
		// 	}
		// }

		// if (!empty($user_customer)) {
		// 	foreach ($user_customer as $v) {
		// 		$customer[] = $v['CUSTOMER'];
		// 	}
		// }
		$data["user"] 					= $user;
		$data["user_access"] 		= !empty($user_access) ? $user_access : [];
		// $data["user_area"] 			= $area;
		// $data["user_customer"] 	= $customer;
		// $data["user_access_detail"] = $user_access_detail;
		if (!empty($this->session->userdata('user_dashboard'))) {
			$this->session->sess_destroy();
		}

		$session['user_dashboard'] = $data;
		$this->session->set_userdata($session);

		$session = $this->session->userdata('user_dashboard');
		// if ($user_group_id > 1) {
		// 	return redirect('general');
		// }
		return redirect('dashboard');
	}

	function logout(){
		$session = $this->session->userdata('user_dashboard');
		if (empty($session)) {
			$this->session->sess_destroy();
			redirect('home');
		}
		$this->session->sess_destroy();
		redirect('login_dashboard');
	}
	
}

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Attendance</title>
	<link rel="icon" type="image/png" href="<?= asset('icon/iconcj.ico') ?>" sizes="16x16">
    <link rel="icon" type="image/png" href="<?= asset('icon/iconcj.ico') ?>" sizes="32x32">
 	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	<link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  	<link rel="stylesheet" href="<?php echo base_url();?>bower_components/font-awesome/css/font-awesome.min.css">
  	<link rel="stylesheet" href="<?php echo base_url();?>bower_components/Ionicons/css/ionicons.min.css">
  	<link rel="stylesheet" href="<?php echo base_url();?>bower_components/jvectormap/jquery-jvectormap.css">
  	<link rel="stylesheet" href="<?php echo base_url();?>dist/css/AdminLTE.css">
  	<link rel="stylesheet" href="<?php echo base_url();?>dist/css/skins/_all-skins.min.css">
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  	<link rel="stylesheet" href="<?php echo base_url();?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  	<link rel="stylesheet" href="<?php echo base_url();?>bower_components/datatables.net-bs/css/buttons.dataTables.min.css">
  	<style type="text/css">
      #example1 tr:hover {background-color: #FFFFAA;}
      #example1 tr.selected td {
        background: none repeat scroll 0 0 #FFCF8B;
        color: #000000;
      }

  	</style>
   	<style>
      	/* Always set the map height explicitly to define the size of the div
      	 * element that contains the map. */
      	#map {
        	height: 100%;
      	}
      	/* Optional: Makes the sample page fill the window. */
      	html, body {
        	height: 100%;
        	margin: 0;
        	padding: 0;
     	}

     	table{
    		width:100%;
		}

		.selfie-prv {
		  width: 100%;
		  height: 150px;
		  object-fit: cover;
		  border: 1px solid #DADEE1;
		}

		.rp-r {
			padding-right: 1px;
		}

		.rp-l {
			padding-left: 1px;
		}

		.card-box {
            width: 95%;
            margin: auto;
            padding: 10px;
            border-radius: 10px;
        }
    </style>

  	<script src="<?php echo base_url();?>dist/sweetalert/sweetalert-dev.js"></script>
  	<link rel="stylesheet" href="<?php echo base_url();?>dist/sweetalert/sweetalert.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dist/sweetalert/themes/google/google.css">
    <!-- <link href="<?= asset('/css/app.css') ?>" rel="stylesheet">
    <link href="<?= asset('/css/style.css') ?>" rel="stylesheet"> -->

</head>


<body class="login-page body-auth" style="background: url(https://cjfnc.id/wfh-new/assets//img/bg-auth.png); background-attachment:fixed; background-size: cover; height: 100%;">
	<div id="app">
        <main>
            <?= $this->session->flashdata('successinsert');?>
            <?= $this->session->flashdata('GAGAL');?>
            <?= $this->session->flashdata('sukses');?>
            <?= $this->session->flashdata('dikantor');?>

            <div class="card-box">
                <div class="login-box-body">
                    <br>
                    <!-- <p class="login-box-msg">Sign in to your account</p> -->
                    <!-- <div class="login-logo" style="color: ">
                        &nbsp<b class="attendance2">Attendance</b> 
                    </div> -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group input-group-sm" style="width: 100%;" >
                                <span class="input-group-addon" style="width: 100px;"><b>PLANT</b></span>
                                <input type="text" name="PLANT" class="form-control" readonly value="<?php echo $baris->PLANT ;?>" placeholder="<?php echo $baris->PLANT ;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group input-group-sm" style="width: 100%;">
                                <span class="input-group-addon"  style="width: 100px;"><b>FULL NAME</b></span>
                                <input type="text" name="FULL_NAME" class="form-control" readonly value="<?php echo $baris->FULL_NAME ;?>" placeholder="<?php echo $baris->FULL_NAME ;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group input-group-sm" style="width: 100%;">
                                <span class="input-group-addon"  style="width: 100px;"><b>DEPT NAME</b></span>
                                <input type="text" name="DEPT_NAME" class="form-control" readonly value="<?php echo $baris->DEPT_NAME ;?>" placeholder="<?php echo $baris->DEPT_NAME ;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group input-group-sm" style="width: 100%;">
                                <span class="input-group-addon"  style="width: 100px;"><b>DATE</b></span>
                                <input id="date_input" type="text" name="TODAY_DATE" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group input-group-sm" style="width: 100%;">
                                <span class="input-group-addon"  style="width: 100px;"><b>CLOCK</b></span>
                                <input id="clock_input" type="text" name="TODAY_CLOCK" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <?php if ($gmt) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group input-group-sm" style="width: 100%;">
                                <span class="input-group-addon"  style="width: 100px;"><b>GMT</b></span>
                                <input type="text" name="GMT" class="form-control" readonly value="<?php echo $gmt ;?>" placeholder="<?php echo $gmt ;?>">
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <br>

                    <h4><b class="attendance1">ONLINE ATTENDANCE</b>  </h4>

                    <script type="text/javascript">
                        function updateDate() {
                            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                            var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu']; // Diperbaiki karakter kutip tunggal
                            var date = new Date();
                            var day = date.getDate();
                            var month = date.getMonth();
                            var thisDay = myDays[date.getDay()];
                            var yy = date.getFullYear(); // Gunakan getFullYear() agar tidak salah tahun

                            var fullDate = thisDay + ', ' + day + ' ' + months[month] + ' ' + yy;
                            
                            // Memasukkan nilai ke dalam input
                            document.getElementById("date_input").value = fullDate;
                        }

                        updateDate(); // Panggil fungsi untuk menampilkan tanggal saat halaman dimuat
                    </script>
                    
                    <!-- <div id="clock"></div> -->
                    <script type="text/javascript">
                        function showTime() {
                            var a_p = "";
                            var today = new Date();
                            var curr_hour = today.getHours();
                            var curr_minute = today.getMinutes();

                            curr_hour = checkTime(curr_hour);
                            curr_minute = checkTime(curr_minute);
                            document.getElementById('clock_input').value=curr_hour + ":" + curr_minute;
                        }
                
                        function checkTime(i) {
                            if (i < 10) {
                                i = "0" + i;
                            }
                            return i;
                        }
                        setInterval(showTime, 500);
                        //-->
                    </script>

                    <?php
                        // Ambil jam saat ini dalam format 24 jam
                        $current_hour = date('H');
                    ?>

                    <?php if ($baris->IN_TIME == '0000' and is_null($lattt)) { ?>
                        <form id="form-checkin" action="<?php echo base_url('dashboard/check_in'); ?>" method="post" enctype="multipart/form-data">
                            <!-- Koordinat (disembunyikan) -->
                            <input type="hidden" name="lat" id="lat">
                            <input type="hidden" name="long" id="long">

                            <!-- Tombol awal untuk ambil lokasi -->
                            <div class="row" id="btn_get_location">
                                <div class="col-xs-12">
                                    <button type="button" id="btn_check_in" class="btn btn-block bg-green btn-block" onclick="getLocation()">CHECK IN</button>
                                </div>
                            </div>

                            <!-- Bagian preview & upload -->
                            <div class="row" id="map_and_selfie" style="display: none;">
                                <div class="col-xs-6 rp-r">
                                    <iframe id="google_map_preview" width="100%" height="150" frameborder="0" style="border:0"></iframe>
                                </div>
                                <div class="col-xs-6 rp-l">
                                    <img class="selfie-prv" id="selfie_in_prv" src="#" style="display: none; width: 100%; border: 1px solid #ccc;" />
                                    <p id="gambar_terpilih" class="text-success" style="display:none; text-align: center;">✅ Gambar terupload</p>
                                </div>
                            </div>

                            <!-- Upload Selfie -->
                            <div class="row" id="row_selfie" style="display: none;">
                                <div class="col-xs-12">
                                    <input type="file" name="selfie_in" id="selfie_in" accept="image/*" capture="user" style="display: none;" required>
                                    <button type="button" id="do_selfie" class="btn btn-block bg-green btn-block">TAKE SELFIE</button>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <div class="row" id="submit_btn" style="display: none;">
                                <div class="col-xs-12">
                                    <!-- <button type="submit" id="btn_submit_checkin" class="btn btn-block bg-green btn-block" onclick="return handleSubmitCheckIn(this)">CHECK IN - SUBMIT</button> -->
                                     <button type="button" id="btn_submit_checkin" class="btn btn-block bg-green btn-block">CHECK IN - SUBMIT</button>
                                </div>
                            </div>

                            <!-- Flash messages -->
                            <p class="text-danger"><?php echo $this->session->flashdata('message'); ?></p>
                            <p class="text-success"><?php echo $this->session->flashdata('sukses'); ?></p>
                        </form>
                    <?php } else if ($current_hour >= 12 && $baris->IN_TIME !== '0000' && ($baris->OUT_TIME == '0000' || empty($baris->OUT_TIME))) { ?>
                        <?php $IN_KOOR =  $baris->REG_IN_OS; ?>

                        <!-- TAMPILKAN KOORDINAT MASUK -->
                        <div class="row">
                            <div class="col-xs-6 rp-r">
                                <iframe width="100%" height="150" frameborder="0" style="border:0" 
                                    src="https://www.google.com/maps/embed/v1/place?q=<?php echo $IN_KOOR;?>&amp;key=AIzaSyBxty2H-6okfgQqlKcUb_g5qW62W9ocEVw">
                                </iframe>
                            </div>
                            <div class="col-xs-6 rp-l">
                                 <?php 
                                    $plant = $this->session->userdata('plant');
                                    $empno = $this->session->userdata('empno');
                                    $attend_date = $baris->ATTEND_DATE;
                                    $filename = "{$plant}_{$empno}_{$attend_date}_IN.jpg";
                                    $img_url = base_url("uploads/{$plant}/{$filename}");
                                ?>
                                <img class="selfie-prv" src="<?php echo $img_url; ?>" style="width: 100%; border-radius: 6px;" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group input-group-sm" style="width: 100%;">
                                    <span class="input-group-addon" style="width: 100px;"><b>TIME IN</b></span>
                                    <input type="text" name="TIME_IN" class="form-control" readonly 
                                        value="<?php echo $attend_date.' '.substr($baris->IN_TIME, 0, 2)." : ".substr($baris->IN_TIME, 2, 2) ?>">
                                </div>
                            </div>
                        </div>

                        <br>

                        <!-- FORM CHECK OUT -->
                        <form id="form-checkout" action="<?= base_url('dashboard/check_out'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="latout" id="lat_out">
                            <input type="hidden" name="longout" id="long_out">
                            <!-- Tombol awal untuk ambil lokasi -->
                            <div class="row" id="btn_get_location_out">
                                <div class="col-xs-12">
                                    <button type="button" id="btn_check_out" class="btn btn-block bg-orange btn-block" onclick="getCurrentLocation()">CHECK OUT</button>
                                </div>
                            </div>

                            <!-- Bagian preview map & upload selfie -->
                            <div class="row" id="map_and_selfie_out" style="display: none;">
                                <div class="col-xs-6 rp-r">
                                    <iframe id="google_map_preview_out" width="100%" height="150" frameborder="0" style="border:0"></iframe>
                                </div>
                                <div class="col-xs-6 rp-l">
                                    <img class="selfie-prv" id="selfie_out_prv" src="#" style="display: none; width: 100%; border: 1px solid #ccc;" />
                                </div>
                            </div>

                            <!-- Upload Selfie -->
                            <div class="row" id="row_selfie_out" style="display: none;">
                                <div class="col-xs-12">
                                    <input type="file" name="selfie_out" id="selfie_out" accept="image/*" capture="user" style="display: none;" required>
                                    <button type="button" id="do_selfie_out" class="btn btn-block bg-green btn-block">TAKE SELFIE</button>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <div class="row" id="submit_btn_out" style="display: none;">
                                <div class="col-xs-12">
                                    <!-- <button type="submit" id="btn_submit_checkout" class="btn btn-block bg-orange btn-block" onclick="return handleCheckOutSubmit(this)">CHECK OUT - SUBMIT</button> -->
                                    <button type="button" id="btn_submit_checkout" class="btn btn-block bg-orange btn-block">CHECK OUT - SUBMIT</button>
                                </div>
                            </div>
                        </form>                         
                    <?php } else if ($baris->IN_TIME <> '0000' && $baris->OUT_TIME <> '0000' ) { ?>
                        <?php
                            // JIKA ABSEN MASUK DAN ABSEN KELUAR SUDAH DIISI
                            $IN_KOOR =  $baris->REG_IN_OS;
                            $OUT_KOOR =  $baris->REG_OUT_OS;
                        ?>
                            <br>
                            
                            <div class="row">
                                <div class="col-xs-6 rp-r">
                                    <iframe width="100%" height="150" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $IN_KOOR;?>&amp;key=AIzaSyBxty2H-6okfgQqlKcUb_g5qW62W9ocEVw"></iframe>
                                </div>
                                <div class="col-xs-6 rp-l">
                                     <?php 
                                        $plant = $this->session->userdata('plant');
                                        $empno = $this->session->userdata('empno');
                                        $attend_date = $baris->ATTEND_DATE;
                                        $filename = "{$plant}_{$empno}_{$attend_date}_IN.jpg";
                                        $img_url = base_url("uploads/{$plant}/{$filename}");
                                    ?>
                                    <img class="selfie-prv" src="<?php echo $img_url; ?>" style="width: 100%; border-radius: 6px;" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group input-group-sm" style="width: 100%;">
                                        <span class="input-group-addon" style="width: 100px;"><b>TIME IN</b></span>
                                        <?php
                                            // Format tanggal jadi "18 July 2025"
                                            $tanggal_format = date('d F Y', strtotime($attend_date));

                                            // Format jam jadi "09:10"
                                            $jam_format = substr($baris->IN_TIME, 0, 2) . ':' . substr($baris->IN_TIME, 2, 2);

                                            // Gabungkan
                                            $display_value = $tanggal_format . ' ' . $jam_format;
                                        ?>

                                        <input type="text" name="TIME_IN" class="form-control" readonly value="<?php echo $display_value; ?>" placeholder="<?php echo $display_value; ?>">
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-xs-6 rp-r">
                                    <iframe width="100%" height="150" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $OUT_KOOR;?>&amp;key=AIzaSyBxty2H-6okfgQqlKcUb_g5qW62W9ocEVw"></iframe>
                                </div>
                                <div class="col-xs-6 rp-l">
                                     <?php 
                                        $plant = $this->session->userdata('plant');
                                        $empno = $this->session->userdata('empno');
                                        $attend_date = $baris->ATTEND_DATE;
                                        $filename = "{$plant}_{$empno}_{$attend_date}_OUT.jpg";
                                        $img_url = base_url("uploads/{$plant}/{$filename}");
                                    ?>
                                    <img class="selfie-prv" src="<?php echo $img_url; ?>" style="width: 100%; border-radius: 6px;" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group input-group-sm" style="width: 100%;">
                                        <span class="input-group-addon" style="width: 100px;"><b>TIME OUT</b></span>
                                        <?php
                                            // Format tanggal jadi "18 July 2025"
                                            $tanggal_format_out = date('d F Y', strtotime($attend_date));

                                            // Format jam jadi "09:10"
                                            $jam_format_out = substr($baris->OUT_TIME, 0, 2) . ':' . substr($baris->OUT_TIME, 2, 2);

                                            // Gabungkan
                                            $display_value_out = $tanggal_format_out . ' ' . $jam_format_out;
                                        ?>

                                        <input type="text" name="TIME_IN" class="form-control" readonly value="<?php echo $display_value_out; ?>" placeholder="<?php echo $display_value_out; ?>">
                                        
                                    </div>
                                </div>
                            </div>
                            <br>
                            <p><i>*Anda sudah melakukan absen untuk hari ini <?php $tanggal_format_out ?></i></p>
                    <?php } ?>

                    </div><br>	

                    <form action="<?= route('logout') ?>" method="post">		  	    
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-block bg-red btn-block" style="font-weight: 700">LOG OUT</button>
                            </div>
                        </div>
                        <p class="text-danger"><?php echo $this->session->flashdata('message');?></p>
                    </form>

                    <p style="text-align: center;color: #000;"><strong>Copyright &copy; IT </strong>  CJ Feed & Livestock</p>

                    <script>
                    function getMobileOperatingSystem() {
                        const userAgent = navigator.userAgent || navigator.vendor || window.opera;

                        // Windows Phone must come first because its UA also contains "Android"
                        if (/windows phone/i.test(userAgent)) {
                            return "Windows Phone";
                        }

                        if (/android/i.test(userAgent)) {
                            return "Android";
                        }

                        // iOS detection from: http://stackoverflow.com/a/9039885/177710
                        if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
                            return "iOS";
                        }

                        return "unknown";
                        // return "Android";
                    }
                    </script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/TextPlugin.min.js"></script>
                    <script>
                        gsap.registerPlugin(TextPlugin);
                        gsap.from(".attendance1", {duration: 3, text: ""});
                        gsap.from(".attendance2", {duration: 3, text: ""});
                        gsap.from(".gambar", {duration:3, rotateY:360, opacity:0});
                    </script>
                    <script>
                        function getLocation() {
                            const btn = document.getElementById("btn_check_in");
                            btn.disabled = true;
                            btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Getting Location...';

                            if (navigator.geolocation) {
                                navigator.geolocation.getCurrentPosition(showPosition, function(error) {
                                    alert("Gagal mendapatkan lokasi: " + error.message);
                                    btn.disabled = false;
                                    btn.innerHTML = 'CHECK IN';
                                });
                            } else {
                                alert("Browser tidak mendukung Geolocation.");
                                btn.disabled = false;
                                btn.innerHTML = 'CHECK IN';
                            }
                        }

                        
                        // Button "Check In"
                        document.getElementById("btn_submit_checkin").addEventListener("click", function() {
                            const confirmCheck = confirm('Confirmation Check In ?');
                            if (!confirmCheck) return false;

                            let button = document.getElementById("btn_submit_checkin");
                            // Disable tombol dan ganti teks saat proses berjalan
                            button.disabled = true;
                            button.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Submitting...';
                            
                            document.getElementById('form-checkin').submit();
                        });


                        function handleSubmitCheckIn(button) {
                            const confirmCheck = confirm('Confirmation Check In ?');
                            console.log(confirmCheck);
                            if (!confirmCheck) return false;

                            // Disable tombol dan ganti teks saat proses berjalan
                            button.disabled = true;
                            button.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Submitting...';

                            // Biarkan form tetap submit
                            return true;
                        }

                        // Setelah lokasi didapatkan
                        function showPosition(position) {
                            const lat = position.coords.latitude;
                            const long = position.coords.longitude;

                            document.getElementById("lat").value = lat;
                            document.getElementById("long").value = long;

                            const mapUrl = `https://www.google.com/maps/embed/v1/place?q=${lat},${long}&key=AIzaSyBxty2H-6okfgQqlKcUb_g5qW62W9ocEVw`;
                            document.getElementById("google_map_preview").src = mapUrl;

                            document.getElementById("btn_get_location").style.display = "none";
                            document.getElementById("map_and_selfie").style.display = "flex";
                            document.getElementById("row_selfie").style.display = "block";
                        }

                        function handleLocationError(error) {
                            return alert("Gagal mengambil lokasi: " + error.message);
                        }

                        // Button "Take Selfie"
                        document.getElementById("do_selfie").addEventListener("click", function() {
                            document.getElementById("selfie_in").click();
                        });

                        // Saat selfie diupload
                        document.getElementById("selfie_in").addEventListener("change", function(event) {
                            const file = event.target.files[0];
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    const img = document.getElementById("selfie_in_prv");
                                    img.src = e.target.result;
                                    img.style.display = "block";

                                    document.getElementById("gambar_terpilih").style.display = "block";
                                    document.getElementById("submit_btn").style.display = "block";
                                    document.getElementById("do_selfie").style.display = "none"; // Sembunyikan tombol
                                };
                                reader.readAsDataURL(file);
                            }
                        });

                        // Helper untuk deteksi OS
                        function getMobileOperatingSystem() {
                            var userAgent = navigator.userAgent || navigator.vendor || window.opera;

                            if (/windows phone/i.test(userAgent)) return "Windows Phone";
                            if (/android/i.test(userAgent)) return "Android";
                            if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) return "iOS";

                            return "unknown";
                        }
                    </script>
                    <script>
                        function getCurrentLocation() {
                            const btn = document.getElementById("btn_check_out");
                            btn.disabled = true;
                            btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Getting Location...';

                            if (navigator.geolocation) {
                                navigator.geolocation.getCurrentPosition(showPositionOut, function(error) {
                                    alert("Gagal mendapatkan lokasi: " + error.message);
                                    btn.disabled = false;
                                    btn.innerHTML = 'CHECK OUT';
                                });
                            } else {
                                alert("Browser tidak mendukung Geolocation.");
                                btn.disabled = false;
                                btn.innerHTML = 'CHECK OUT';
                            }
                        }

                        
                        // Button "Check Out"
                        document.getElementById("btn_submit_checkout").addEventListener("click", function() {
                            console.log('CLICK');
                            const confirmCheck = confirm('Confirmation Check Out ?');
                            if (!confirmCheck) return false;

                            let button = document.getElementById("btn_submit_checkout");
                            // Disable tombol dan ganti teks saat proses berjalan
                            button.disabled = true;
                            button.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Submitting...';
                            
                            document.getElementById('form-checkout').submit();
                        });

                        function handleCheckOutSubmit(button) {
                            const confirmSubmit = confirm("Confirmation Check Out ?");
                            if (!confirmSubmit) return false;

                            // Nonaktifkan tombol dan ubah tampilannya
                            button.disabled = true;
                            button.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Submitting...';

                            // Izinkan form tetap lanjut submit
                            return true;
                        }

                            function showPositionOut(position) {
                                const lat = position.coords.latitude;
                                const long = position.coords.longitude;

                                document.getElementById("lat_out").value = lat;
                                document.getElementById("long_out").value = long;

                                const mapUrl = `https://www.google.com/maps/embed/v1/place?q=${lat},${long}&key=AIzaSyBxty2H-6okfgQqlKcUb_g5qW62W9ocEVw`;
                                document.getElementById("google_map_preview_out").src = mapUrl;

                                document.getElementById("btn_get_location_out").style.display = "none";
                                document.getElementById("map_and_selfie_out").style.display = "flex";
                                document.getElementById("row_selfie_out").style.display = "block";
                            }

                            // Tombol selfie OUT
                            document.getElementById("do_selfie_out").addEventListener("click", function() {
                                document.getElementById("selfie_out").click();
                            });

                            document.getElementById("selfie_out").addEventListener("change", function(event) {
                                const file = event.target.files[0];
                                if (file) {
                                    const reader = new FileReader();
                                    reader.onload = function(e) {
                                        const img = document.getElementById("selfie_out_prv");
                                        img.src = e.target.result;
                                        img.style.display = "block";

                                        document.getElementById("submit_btn_out").style.display = "block";
                                        document.getElementById("do_selfie_out").style.display = "none";
                                    };
                                    reader.readAsDataURL(file);
                                }
                            });

                            // Utility deteksi OS
                            function getMobileOperatingSystem() {
                                var userAgent = navigator.userAgent || navigator.vendor || window.opera;

                                if (/windows phone/i.test(userAgent)) return "Windows Phone";
                                if (/android/i.test(userAgent)) return "Android";
                                if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) return "iOS";

                                return "unknown";
                            }
                    </script>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
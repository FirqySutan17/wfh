<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Attendance</title>
	<!-- <link rel="icon" href="<?php echo base_url();?>cjlogo.png" type="image/x-icon" /> -->
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
			width: 360px;
			margin: 5% auto;
			padding: 10px;
		}
    </style>

  	<script src="<?php echo base_url();?>dist/sweetalert/sweetalert-dev.js"></script>
  	<link rel="stylesheet" href="<?php echo base_url();?>dist/sweetalert/sweetalert.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dist/sweetalert/themes/google/google.css">
    <!-- <link href="<?= asset('/css/app.css') ?>" rel="stylesheet">
    <link href="<?= asset('/css/style.css') ?>" rel="stylesheet"> -->

</head>


<body class="login-page body-auth" style="background: url('../assets/img/bg-auth.png'); background-attachment:fixed; background-size: cover; height: 100%;">
	<div id="app">
        <main>
            <?= $this->session->flashdata('successinsert');?>
            <?= $this->session->flashdata('GAGAL');?>
            <?= $this->session->flashdata('sukses');?>
            <?= $this->session->flashdata('dikantor');?>

            <div class="card-box">
                <div class="login-box-body">
                    <!-- <p class="login-box-msg">Sign in to your account</p> -->
                    <div class="login-logo" style="color: ">
                        &nbsp<b class="attendance2">Attendance</b> 
                    </div>

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
                                        <button type="button" class="btn btn-block bg-green btn-block" onclick="getLocation()">CHECK IN</button>
                                    </div>
                                </div>

                                <!-- Google Map dan Selfie Preview -->
                                <div class="row" id="map_and_selfie" style="display: none;">
                                    <div class="col-xs-6 rp-r">
                                        <iframe id="google_map_preview" width="100%" height="150" frameborder="0" style="border:0"></iframe>
                                    </div>
                                    <div class="col-xs-6 rp-l">
                                        <img class="selfie-prv" id="selfie_in_prv" src="#" style="display: none"/>
                                    </div>
                                </div>

                                <!-- Upload Selfie -->
                                <div class="row" id="row_selfie" style="display: none;">
                                    <div class="col-xs-12">
                                        <input type="file" name="selfie_in" id="selfie_in" accept="image/*" capture="user" style="display: none;">
                                        <button type="button" id="do_selfie" class="btn btn-block bg-green btn-block">TAKE SELFIE</button>
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <div class="row" id="submit_btn" style="display: none;">
                                    <div class="col-xs-12">
                                        <button type="submit" class="btn btn-block bg-green btn-block" onclick="return confirm('Confirmation Check In ?')">CHECK IN - SUBMIT</button>
                                    </div>
                                </div>

                                <p class="text-danger"><?php echo $this->session->flashdata('message'); ?></p>
                            </form>
                    <?php } else if ($baris->IN_TIME <> '0000' and $baris->OUT_TIME == '0000' and is_null($lattt)) { ?>
                        <?php $IN_KOOR =  $baris->REG_IN_OS; ?>
                        <div class="row">
                            <div class="col-xs-6 rp-r">
                                <iframe width="100%" height="150" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $IN_KOOR;?>&amp;key=AIzaSyBxty2H-6okfgQqlKcUb_g5qW62W9ocEVw"></iframe>
                            </div>
                            <div class="col-xs-6 rp-l">
                                <img class="selfie-prv" src=""/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group input-group-sm" style="width: 100%;">
                                    <span class="input-group-addon" style="width: 100px;"><b>TIME IN</b></span>
                                    <input type="text" name="TIME_IN" class="form-control" readonly value="<?php echo $attend_date.' '.substr($baris->IN_TIME, 0, 2)." : ".substr($baris->IN_TIME, 2, 2) ?>" placeholder="<?php echo $attend_date.' '.$baris->IN_TIME ;?>">
                                </div>
                            </div>
                        </div>
                        <br>
                        <?php if ($current_hour <= 12) { ?>
                            <p><i>*Note : Untuk melakukan <b>ABSEN KELUAR</b> bisa dilakukan diatas pukul 12.00</i></p>
                        <?php } ?>
                        <?php if ($current_hour >= 12) { ?>  
                            <form action="https://dtech.web.id/cjfnl" method="post">           
                                <div class="row">
                                    <div class="col-xs-12">
                                        <!-- <button type="submit" class="btn btn-block bg-green btn-block" )">Share Location</button> -->
                                        <a href="https://gpsrequest.cjfnc.id/" class="btn btn-block bg-orange btn-block">CHECK OUT</a>
                                    </div>
                                </div>
                                <p class="text-danger"><?php echo $this->session->flashdata('message');?></p>
                            </form>
                        <?php } ?>
                    <?php } else if ($baris->IN_TIME <> '0000' and $baris->OUT_TIME == '0000' and isset($lattt)) { ?>
                        <?php $IN_KOOR =  $baris->REG_IN_OS; ?>
                            <!-- IN DETAIL -->
                            <div class="row">
                                <div class="col-xs-6 rp-r">
                                    <iframe width="100%" height="150" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $IN_KOOR;?>&amp;key=AIzaSyBxty2H-6okfgQqlKcUb_g5qW62W9ocEVw"></iframe>
                                </div>
                                <div class="col-xs-6 rp-l">
                                    <img class="selfie-prv" src=""/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group input-group-sm" style="width: 100%;">
                                        <span class="input-group-addon" style="width: 100px;"><b>TIME IN</b></span>
                                        <input type="text" name="TIME_IN" class="form-control" readonly value="<?php echo $attend_date.' '.substr($baris->IN_TIME, 0, 2)." : ".substr($baris->IN_TIME, 2, 2) ?>" placeholder="<?php echo $attend_date.' '.$baris->IN_TIME ;?>">
                                    </div>
                                </div>
                            </div>

                            <br>

                            <!-- OUT DETAIL -->

                            <div class="row">
                                <div class="col-xs-6 rp-r">
                                    <iframe width="100%" height="150" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $lattt;?>,<?php echo $longgg;?>&amp;key=AIzaSyBxty2H-6okfgQqlKcUb_g5qW62W9ocEVw"></iframe>
                                </div>
                                <div class="col-xs-6 rp-l">
                                    <img class="selfie-prv" id="selfie_out_prv" src="#" style="display: none"/>
                                </div>
                            </div>

                            <form action="<?php echo base_url();?>add_out" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="attend_date_checkout" value="<?= $attend_date ?>">
                                <div class="row" style="display: none;">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <input type="file" name="selfie_out" id="selfie_out" accept="image/*" capture="user">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="selfie_btn">
                                    <div class="col-xs-12">
                                        <button type="button" id="do_selfie" class="btn btn-block bg-blue btn-block">TAKE SELFIE</button>
                                    </div>
                                </div>	 
                                <div class="row" id="submit_btn" style="display: none;">
                                    <div class="col-xs-12">
                                        <button type="submit" id="out_btn" class="btn btn-block bg-blue btn-block" onclick="return confirm('Confirmation Check Out ?')">CHECK OUT - SUBMIT</button>
                                    </div>
                                </div>
                                <p class="text-danger"><?php echo $this->session->flashdata('message');?></p>
                            </form>

                            <script>
                            document.getElementById("do_selfie").addEventListener("click", function() {
                                const result = getMobileOperatingSystem();

                                if (result != "unknown"){
                                    document.getElementById("selfie_out").click();
                                } else {
                                    alert("Error, please use Android/iOS phone and updated browser!");
                                }
                            });
                            document.getElementById("selfie_out").addEventListener("change", function () {
                                const inputFile = document.getElementById("selfie_out");
                                const btnSubmit = document.getElementById("submit_btn");
                                const imgSelfie = document.getElementById("selfie_out_prv");
                                const btnSelfie = document.getElementById("selfie_btn");
                                if (inputFile.files.length === 0) {
                                    btnSubmit.style.display = 'none';
                                    imgSelfie.style.display = 'none';
                                    btnSelfie.style.display = 'block';
                                } else {
                                    btnSelfie.style.display = 'none';
                                    btnSubmit.style.display = 'block';
                                    imgSelfie.style.display = 'inline-block';

                                    const [file] = inputFile.files;
                                    imgSelfie.src = URL.createObjectURL(file);
                                }
                            });
                            </script>                              
                    <?php } else if ($baris->IN_TIME <> '0000' and $baris->OUT_TIME <> '0000' ) { ?>
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
                                    <img class="selfie-prv" src=""/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group input-group-sm" style="width: 100%;">
                                        <span class="input-group-addon" style="width: 100px;"><b>TIME IN</b></span>
                                        <input type="text" name="TIME_IN" class="form-control" readonly value="<?php echo $attend_date.' '.substr($baris->IN_TIME, 0, 2)." : ".substr($baris->IN_TIME, 2, 2) ?>" placeholder="<?php echo $attend_date.' '.$baris->IN_TIME ;?>">
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-xs-6 rp-r">
                                    <iframe width="100%" height="150" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $OUT_KOOR;?>&amp;key=AIzaSyBxty2H-6okfgQqlKcUb_g5qW62W9ocEVw"></iframe>
                                </div>
                                <div class="col-xs-6 rp-l">
                                    <img class="selfie-prv" src=""/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group input-group-sm" style="width: 100%;">
                                        <span class="input-group-addon" style="width: 100px;"><b>TIME OUT</b></span>
                                        <input type="text" name="TIME_IN" class="form-control" readonly value="<?php echo $attend_date.' '.substr($baris->OUT_TIME, 0, 2)." : ".substr($baris->OUT_TIME, 2, 2) ?>" placeholder="<?php echo $attend_date.' '.$baris->OUT_TIME ;?>">
                                    </div>
                                </div>
                            </div>
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

                    <p style="text-align: center;color: white;"><strong>Copyright &copy; IT </strong>  CJ Feed & Livestock</p>

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
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(function(position) {
                                const lat = position.coords.latitude;
                                const long = position.coords.longitude;

                                document.getElementById('lat').value = lat;
                                document.getElementById('long').value = long;

                                // Tampilkan peta
                                const map = document.getElementById("google_map_preview");
                                map.src = "https://www.google.com/maps/embed/v1/place?q=" + lat + "," + long + "&key=AIzaSyBxty2H-6okfgQqlKcUb_g5qW62W9ocEVw";

                                // Tampilkan semua bagian form setelah lokasi didapatkan
                                document.getElementById("btn_get_location").style.display = "none";
                                document.getElementById("map_and_selfie").style.display = "flex";
                                document.getElementById("row_selfie").style.display = "block";
                            }, function(error) {
                                alert("Gagal mendapatkan lokasi. Aktifkan GPS dan izinkan akses lokasi.");
                            });
                        } else {
                            alert("Geolocation tidak didukung oleh browser ini.");
                        }
                    }

                    // Button "Take Selfie"
                    document.getElementById("do_selfie").addEventListener("click", function() {
                        const result = getMobileOperatingSystem();

                        if (result != "unknown"){
                            document.getElementById("selfie_in").click();
                        } else {
                            alert("Error, please use Android/iOS phone and updated browser!");
                        }
                    });

                    // Saat selfie diupload
                    document.getElementById("selfie_in").addEventListener("change", function () {
                        const inputFile = document.getElementById("selfie_in");
                        const imgSelfie = document.getElementById("selfie_in_prv");
                        const submitBtn = document.getElementById("submit_btn");

                        if (inputFile.files.length > 0) {
                            imgSelfie.src = URL.createObjectURL(inputFile.files[0]);
                            imgSelfie.style.display = 'inline-block';
                            submitBtn.style.display = 'block';
                        } else {
                            imgSelfie.style.display = 'none';
                            submitBtn.style.display = 'none';
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
                </div>
            </div>
        </main>
    </div>
</body>
</html>
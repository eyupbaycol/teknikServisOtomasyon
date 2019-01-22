<?php
session_start();
try{
    $db = new PDO('mysql:host=localhost;dbname=uyekayit','root','');
}
catch(PDOException $mesaj){
    echo $mesaj->getmessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
    <div class="container-login100-form-btn">
                                <button  type="submit" class="login100-form-btn" onclick="geridon()">
                                   Geri Dön
                                </button>
                                </div>
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Email</th>
      <th scope="col">Ürün Türü</th>
      <th scope="col">Ürün Marka</th>
      <th scope="col">Ürün Garanti</th>
      <th scope="col">Ürün Sorun</th>
      <th scope="col">Ürün Adres</th>
      <th scope="col">Ürün Durumu</th>
    </tr>
  </thead>
  <tbody>
   <?php 
    $v=$db->prepare("select * from urunkayit where kullaniciadi=?");
    $kullaniciadi=$_SESSION["uye"];
    $x=$v->execute([$kullaniciadi]);
    while($b=$v->fetch(PDO::FETCH_ASSOC)){
        $email = $b['urun_email'];
        $tur = $b['urun_tur'];
        $marka = $b['urun_marka'];
        $garanti = $b['urun_garanti'];
        $sorun = $b['urun_sorun'];
        $adres = $b['urun_adres'];
        $urun_durum=$b['urun_durum'];
        echo "<tr>
        <td>$email</td>
        <td>$tur</td>
        <td>$marka</td>
        <td>$garanti</td>
        <td>$sorun</td>
        <td>$adres</td>
        <td>$urun_durum</td>
        </tr>";
    }
   ?>

  </tbody>
</table>
		</div>
	</div>
	

	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
    <script>
        function geridon(){
            window.location="anasayfa.php";
        }
    </script>
</body>
</html>
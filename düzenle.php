<?php
session_start();
try{
    $db = new PDO('mysql:host=localhost;dbname=uyekayit','root','');
}
catch(PDOException $mesaj){
    echo $mesaj->getmessage();
}      
if($_POST){
    $email = $_POST['email'];
    $sorun = $_POST['sorun'];
    $adres = $_POST['adres'];
    $durum=$_POST['durum'];
    $id=$_GET['id'];
    $v=$db->prepare("UPDATE urunkayit SET urun_email='$email',urun_sorun='$sorun',urun_adres='$adres',urun_durum='$durum' WHERE urun_id='$id'");
        $x=$v->execute();
    header("Location:adminpanel.php");    
}
echo"<!DOCTYPE html>
<html lang='en'>
<head>
	<title>Anasayfa</title>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
<!--===============================================================================================-->	
	<link rel='icon' type='image/png' href='images/icons/favicon.ico'/>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='vendor/bootstrap/css/bootstrap.min.css'>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='fonts/font-awesome-4.7.0/css/font-awesome.min.css'>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='fonts/iconic/css/material-design-iconic-font.min.css'>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='vendor/animate/animate.css'>
<!--===============================================================================================-->	
	<link rel='stylesheet' type='text/css' href='vendor/css-hamburgers/hamburgers.min.css'>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='vendor/animsition/css/animsition.min.css'>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='vendor/select2/select2.min.css'>
<!--===============================================================================================-->	
	<link rel='stylesheet' type='text/css' href='vendor/daterangepicker/daterangepicker.css'>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='css/util.css'>
	<link rel='stylesheet' type='text/css' href='css/main.css'>
<!--===============================================================================================-->
</head>
<body>
	
	<div class='limiter'>
		<div class='container-login100' style='background-image: url('images/bg-01.jpg');'>
			<div class='wrap-login100'>
            <div class='container-login100-form-btn'>                     
   
  </form>
</nav>
<div class='container'>
<form method='post' action=''>
  <div class='form-group'>
    <label class='label' for='email'>Eposta</label>
    <input type='email' name='email' class='form-control' id='email' placeholder='name@example.com'>
      </div>
    <label  class='label' for='urunSorun'>Ürün Sorun</label>
    <textarea class='form-control' name='sorun' rows='3' placeholder='Detaylı Sorun Açıklama'></textarea>
    <label  class='label' for='adres'>Adres Bilgisi:</label>
    <textarea class='form-control' id='adres'  name='adres' rows='3' placeholder='Ürün sahibi adres bilgisi'></textarea>
    <div class='form-group'>
    <label class='label' for='durum'>Ürün Durum</label>
    <input type='text' name='durum' class='form-control' id='durum'>
      </div>
    <div class='container-login100-form-btn'>                     
    <button  id='gonder' type='submit' class='login100-form-btn'  onclick='kaydet()' value='Gönder' style='margin-top:10px;'>Kaydet</button>
   </div> 
  </div>
		</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src='vendor/jquery/jquery-3.2.1.min.js'></script>
<!--===============================================================================================-->
	<script src='vendor/animsition/js/animsition.min.js'></script>
<!--===============================================================================================-->
	<script src='vendor/bootstrap/js/popper.js'></script>
	<script src='vendor/bootstrap/js/bootstrap.min.js'></script>
<!--===============================================================================================-->
	<script src='vendor/select2/select2.min.js'></script>
<!--===============================================================================================-->
	<script src='vendor/daterangepicker/moment.min.js'></script>
	<script src='vendor/daterangepicker/daterangepicker.js'></script>
<!--===============================================================================================-->
	<script src='vendor/countdowntime/countdowntime.js'></script>
<!--===============================================================================================-->
	<script src='js/main.js'></script>
    <script>
    </script>
    

</body>
</html>
";

?>

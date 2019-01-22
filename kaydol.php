<?php 
try{
    $db = new PDO('mysql:host=localhost;dbname=uyekayit','root','');
}
catch(PDOException $mesaj){
    echo $mesaj->getmessage();
}
$a=$db->prepare("select uye_ad from kayitlar where uye_ad=?");
$v=$db->prepare("insert into kayitlar set                
                uye_ad=?,
                uye_sifre=?,
                uye_email=?,
                uye_yetki=? 
                ");
                if($_POST){
                    $name=$_POST["username"];
                    $a->execute(array($name));
                    $b=$a->fetch(PDO::FETCH_ASSOC);//bir kere listele
                    $d=$a->rowCount();
                    if($d){
                        echo"<script>alert('Lütfen başka bir kullanıcı adı deneyin')</script>";
                    }
                    else{
                    $isim=$_POST["username"];
                    $sifre=$_POST["password"];
                    $email=$_POST["email"];
                    $uye_yetki=0;
                    if(!$isim|| !$sifre||!$email){
                        echo "<script>alert('Lütfen bütün alanları doldurunuz.')</script>";
                    }
                    else{
                        $x=$v->execute(array($isim,$sifre,$email,$uye_yetki));
                        header("Location:index.php");
                    }  
                }
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
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						KAYIT OLUN  
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Kullanıcı Adı Girin">
						<input class="input100" type="text" name="username" placeholder="Kullanıcı Adı">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Şifre Girin">
						<input class="input100" type="password" name="password" placeholder="Şifre">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate="Email Girin">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf187;"></span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Kayıt Ol
						</button>
					</div>

				</form>
			</div>
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

</body>
</html>


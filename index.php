<?php 
session_start();
try{
    $db = new PDO('mysql:host=localhost;dbname=uyekayit','root','');
}
catch(PDOException $mesaj){
    echo $mesaj->getmessage();
}
 $v=$db->prepare("select uye_ad,uye_sifre, uye_yetki from kayitlar where uye_ad=? and uye_sifre=?");
    if($_POST){
        $isim=$_POST["username"];
        $sifre=$_POST["password"];
        $v->execute(array($isim,$sifre));
        $x=$v->fetch(PDO::FETCH_ASSOC);//bir kere listele
        $d=$v->rowCount();
        if($d){
           $_SESSION["uye"]=$x["uye_ad"];
           $_SESSION["sifre"]=$x["uye_sifre"]; 
           $_SESSION["yetki"]=$x["uye_yetki"];
           $durum=$x["uye_yetki"];
           if($durum==1){
               header("Location:adminpanel.php");
           }
           else{
            header("Location:anasayfa.php");
           }
        }
        else{
            echo "<script>alert('Kullanıcı Adı ve Şifre Hatalı')</script>"; 
            echo"<script>location.href='index.php';</script>";
        }

    }else{       
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
        <style>
        #bg{
            background-image: url("images/bg-01.jpg");
        }
        </style>
            <title>Giriş Sayfası</title>
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
                <div  id="bg" class="container-login100" >
                    <div class="wrap-login100">
                        <form class="login100-form validate-form" method="post" action="">
                            <span class="login100-form-logo">
                                <i class="zmdi zmdi-landscape"></i>
                            </span>
        
                            <span class="login100-form-title p-b-34 p-t-27">
                               HOŞ GELDİNİZ
                            </span>
        
                            <div class="wrap-input100 validate-input" data-validate = "Kullanıcı Adi Girin">
                                <input class="input100" type="text" name="username" placeholder="Kullanıcı Adı">
                                <span class="focus-input100" data-placeholder="&#xf207;"></span>
                            </div>
        
                            <div class="wrap-input100 validate-input" data-validate="Şifre Girin">
                                <input class="input100" type="password" name="password" placeholder="Şifre">
                                <span class="focus-input100" data-placeholder="&#xf191;"></span>
                            </div>
                            <div class="container-login100-form-btn">
                                <button  type="submit" class="login100-form-btn">
                                    Giriş Yap
                                </button>
                                <button  type="submit" onclick="press(9)" class="login100-form-btn">
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
        </html>';
    }   
?>
<script>
    function press(){
        window.location="kaydol.php"
    }
</script>



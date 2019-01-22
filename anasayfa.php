<?php
 
    session_start();
    $conn = new PDO('mysql:host=localhost;dbname=uyekayit','root','');
    $sql="select markalar from urunmarka";
    $sql2="select turler from uruntur";
try{
      $stmt=$conn->prepare($sql);
      $stmt->execute();
      $results=$stmt->fetchAll();

      $stmt2=$conn->prepare($sql2);
      $stmt2->execute();
      $sonuc=$stmt2->fetchAll();
}
catch(PDOException $mesaj){
    echo $mesaj->getmessage();
} 

 if($_SESSION["yetki"]==0){

}else{
    header("Location:index.php");
}
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Anasayfa</title>
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
            <div class="container-login100-form-btn">                     
            <button class="login100-form-btn" onclick="myfunction()" type="button">Ürünlerim</button>                    
         <button  id="gonder" type="button" class="login100-form-btn"  onclick="cikis()" value="Gönder">Çıkış Yap</button>
   </div>
   
  </form>
</nav>
<div class="container">
<form method="post" action="urunekle.php">
  <div class="form-group">
    <label class="label" for="email">Eposta</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
      </div>
  <div class="form-group">
    <label class="label" for="urunTur">Ürün Türünü Seçin</label>
    <select class="form-control" id="urunTur" name="tur">
     <?php foreach($sonuc as $output){
          $deger=$output['turler'];
          echo "<option> $deger</option>";
    }
    
      ?>
   
    </select>
  </div>
  <div class="form-group">
    <label  class="label" for="urunMarka">Ürün Markasını Seçin</label>
    <select class="form-control" id="urunMarka" name="marka">
    <?php foreach($results as $output){
          $deger=$output['markalar'];
          echo "<option> $deger</option>";
    }
    
      ?>
    </select>
  </div>    
  <label class="label">Ürün Garantisi:</label>
  <input type="radio" name="garanti" value="var" checked="checked"> Var
  <input type="radio" name="garanti" value="yok">Yok<br>
    <label  class="label" for="urunSorun">Ürün Sorun</label>
    <textarea class="form-control" name="urunSorun" rows="3" placeholder="Detaylı Sorun Açıklama"></textarea>
    <label  class="label" for="adres">Adres Bilgisi:</label>
    <textarea class="form-control" id="adres"  name="adres" rows="3" placeholder="Ürün sahibi adres bilgisi"></textarea>
    <div class="container-login100-form-btn">                     
    <button  id="gonder" type="submit" class="login100-form-btn"  onclick="gonder()" value="Gönder" style="margin-top:10px;">Gönder</button>
   </div> 
  </div>
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
    <script>
    
        function myfunction(){
            window.location="urunlerim.php";
        }
        function cikis(){
            window.location="cikis.php";
        }
    </script>
    

</body>
</html>
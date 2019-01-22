<?php
session_start();
try{
  $db= new PDO('mysql:host=localhost;dbname=uyekayit','root','');
}catch(PDOException $mesaj){
  echo $mesaj->getmessage();
}
$v=$db->prepare("insert into urunkayit set
                  urun_email=?,
                  urun_tur=?,
                  urun_marka=?,
                  urun_garanti=?,
                  urun_sorun=?,
                  urun_adres=?,
                  kullaniciadi=?,
                  urun_durum=?
              ");
              if($_POST){
                  $x="Bekleme";
                $urun_email=$_POST["email"];
                $urun_tur=$_POST["tur"];
                $urun_marka=$_POST["marka"];
                $urun_garanti=$_POST["garanti"];
                $urun_sorun=$_POST["urunSorun"];
                $urun_adres=$_POST["adres"];
                $kullaniciadi=$_SESSION["uye"];
                $urun_durum=$x;
                if( !$urun_email|| !$urun_tur ||!$urun_marka || !$urun_garanti ||  !$urun_sorun || !$urun_adres ||  !$kullaniciadi){
                  echo "tüm alanları doldurunuz";
                }else{
                  $x=$v->execute(array($urun_email,$urun_tur,$urun_marka,$urun_garanti,$urun_sorun,$urun_adres,$kullaniciadi,$urun_durum));                  
                          
                      echo "<script>alert('Ürün ekleme başarılı.')</script>"; 
                      echo "<script>location.href='anasayfa.php';</script>";  
                }
              }
?>
<?php
session_start();
try{
    $db = new PDO('mysql:host=localhost;dbname=uyekayit','root','');
}
catch(PDOException $mesaj){
    echo $mesaj->getmessage();
}      

         
if($_POST)
{       
        $id =$_POST["urun_id"];
        if($id==""){
           header("Location:adminpanel.php");
        }
        else{
                 $in  = str_repeat('?,', count($id) - 1) . '?';  // Dizideki veri sayısı kadar soru işareti koy
        $sil = $db->prepare("DELETE FROM urunkayit WHERE urun_id IN($in)"); // Soru işaretlerini sorguya ekle
        $sil->execute($id); // Seçilen id değerlerini gönder
        $hata = $sil->errorInfo();
        if($hata[2])
        {
            echo "Silme işlemi başarısız";
        }else
        {
            // echo"<script>alert('Silme İşlemi Başarılı')</script>";
            // echo "<script>location.href='adminpanel.php';</script>";  
            header("Location:adminpanel.php");
            
        }
        }
}
?>
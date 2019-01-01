<?php
  if($_GET){
    $idi=$_GET["id"];

    try {
     $db = new PDO("mysql:host=localhost;dbname=dersler;charset=utf8;","root","");
     $db ->query("SET CHARACTER SET UTF8");
     $db ->query("SET NAMES UTF8");
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     }catch(PDOException $hata){
     print $hata -> getMessage();
     echo "<p>veri tabanı bağlantı hatası!</p>";
     }
     $sil = $db -> prepare("DELETE FROM uyeler1 WHERE uye_id =:id");
     $sil -> execute(array(":id" => $idi));

     header("Refresh:0; url=duzenle.php");
  }

?>

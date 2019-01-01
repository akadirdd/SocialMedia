<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>düzenleme işlemi</title>
    <link rel="stylesheet" href ="düzenle.css" />
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
  </head>
  <body>
    <?php
     $id =$_GET["id"];
     try {
      $db = new PDO("mysql:host=localhost;dbname=dersler;charset=utf8;","root","");
      $db ->query("SET CHARACTER SET UTF8");
      $db ->query("SET NAMES UTF8");
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     }catch(PDOException $hata){
      print $hata -> getMessage();
      echo "<p>veri tabanı bağlantı hatası!</p>";
     }
     $sorgu = $db -> prepare("SELECT * FROM uyeler1 WHERE uye_id =:id");
     $sorgu -> execute(array(":id" => $id));
     $satir = $sorgu -> fetch(PDO::FETCH_ASSOC);
    ?>
    <center>
    <div class="as ">
     <form  action="" method="post">
       <label>Email</label>
       <input class="form-control" value="<?php echo $satir["uye_mail"]; ?>" type="text" name="isim" >
       <label>Şifre</label>
       <input class="form-control" type="text" name="sifre" value="<?php echo $satir["uye_sifre"]; ?>">
       <label>Bio</label>
       <input class="form-control" type="text" name="bio" value="<?php echo $satir["uye_bio"]; ?>">
       <label>doğum tarihi</label>
       <input class="form-control" type="text" name="dogum" value="<?php echo $satir["uye_dogum_tarih"]; ?> ">
       <input class="btn btn-primary" type="submit" name="kaydet" value="Kaydet">
       <?php
         if ($_POST) {
           $mail=$_POST["isim"];
           $sifre=$_POST["sifre"];
           $biom=$_POST["bio"];
           $dogum=$_POST["dogum"];

           $güncelle = $db -> prepare("UPDATE uyeler1 SET uye_mail =:ad, uye_sifre=:sif, uye_bio=:bi, uye_dogum_tarih=:tarih WHERE uye_id=:id");
           $güncelle -> execute(array(":ad" => $mail, ":sif" => $sifre, ":bi" => $biom, ":tarih" => $dogum, ":id" => $id));

       ?>
       <?php if($güncelle) { ?>
        <p><?php echo "Düzenlemeler kaydedildi"; ?></p>

       <?php header("Refresh:1; url=duzenle.php"); }} ?>
     </form>
    </div>
    </center>
  </body>
</html>

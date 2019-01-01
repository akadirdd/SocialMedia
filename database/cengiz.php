<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>COMPUTER WORLD</title>
    <link rel="stylesheet" href ="ceno.css" />

  </head>
  <body>
    <div class="arkap">
      <div class="orta">
        <div class="baslık">

        </div>
        <div class="giris">
          <h3>COMPUTER WORLD</h3>
          <p>GİRİŞ İŞLEMLERİ</p>
          <form action="cengiz.php" method="post">
            <table>
              <tr>
                <td>E-mail: </td>
                <td><input type="text" name="ad"/></td>
              </tr>
              <tr>
                <td>şifre: </td>
                <td><input type="password" name="sifre"/></td>
              </tr>
              <tr>
                <td></td>
                <td><input type="submit" value="GİRİŞ" /></td>
              </tr>


            </table>
          </form>
          <?php

            if($_POST){
              session_start();
              session_destroy();
              session_start();
              $ad=$_POST["ad"];
              $sifre=$_POST["sifre"];
              if($ad !="" && $sifre != ""){
                try {
                  $db = new PDO("mysql:host=localhost;dbname=dersler;charset=utf8;","root","");
                  $db ->query("SET CHARACTER SET UTF8");
                  $db ->query("SET NAMES UTF8");
                  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $hata) {
                  print $hata -> getMessage();
                  echo "<p>veri tabanı bağlantı hatası!</p>";
                }
                try {
                  $veri = $db->prepare('SELECT * FROM uyeler1 WHERE uye_mail = :isim');
                  $veri->bindValue(':isim', $ad , PDO::PARAM_STR);
                  $veri->execute();
                  $dizi = $veri->fetch(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                  echo "<p>veri çekme hatası!</p>";
                }
                //uye_mail, uye_sifre, uye_bio, uye_dogum_tarih
                if($dizi["uye_sifre"]==$sifre){
                  $_SESSION["oturum"]=true;
                  $_SESSION["kullanıcı"]=$ad;
                  $_SESSION["kullanıcı_sifre"]=$dizi["uye_sifre"];
                  $_SESSION["kullanıcı_bio"]=$dizi["uye_bio"];
                  $_SESSION["kullanıcı_dtarih"]=$dizi["uye_dogum_tarih"];
                  echo "<p>giriş yapıldı </p>";
                  header("Refresh:1; url=jsders.php");
                }else{
                  echo "<p>kullanıcı adı/şifre yanlış!...</p>";
                }

              }else{
                echo "<p>kullanıcı adı/şifre kısmını doldurunuz!..</p>";
              }


            }
            ?>
            <p class="kayıtlink"><a href="kayıt.php">KAYIT OLMAK İÇİN TIKLAYINIZ</a></p>
        </div>

      </div>
      <div class="footer">

      </div>
    </div>

  </body>
</html>

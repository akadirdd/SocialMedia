<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>COMPUTER WORLD</title>
    <link rel="stylesheet" href ="yeni.css" />

  </head>
  <body>
    <div class="arkap">
      <div class="orta">
        <div class="baslık">

        </div>
        <div class="giris">
          <h3>COMPUTER WORLD</h3>

          <form action="" method="post">
      		<table>
      		  <tr>
      		    <td colspan="2">kayıt işlemleri</td>
      		  </tr>
      			<tr>
      		    <td>kullanıcı adı: </td>
      				<td><input type="text" name="ad" </td>
      		  </tr>
      			<tr>
      		    <td>şifre: </td>
      				<td><input type="text" name="sifre"</td>
      		  </tr>
            <tr>
      		    <td>şifre tekrar: </td>
      				<td><input type="text" name="sifre1"</td>
      		  </tr>
            <tr>
      		    <td>Doğum tarihi: </td>
      				<td><input type="date" name="tarih"</td>
      		  </tr>
            <tr>
      		    <td>bionuzu oluşturun</td>
      				<td><textarea name="bio" rows="10" columns="200"></textarea></td>
      		  </tr>
      			<tr>
      		    <td></td>
      				<td><input type="submit" value="kaydol"</td>
      		  </tr>
      		</table>
      		</form>
          <?php
          $sabit=0;
      		if($_POST){
      			$kadi=$_POST["ad"];
      			$ksifre=$_POST["sifre"];
            $ksifre1=$_POST["sifre1"];
            $ktarih=$_POST["tarih"];
            $kbio=$_POST["bio"];

            if($ksifre==$ksifre1 && $kadi!="" && $ksifre!=""){

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
        			$sql = "INSERT INTO uyeler1 (uye_mail, uye_sifre, uye_bio, uye_dogum_tarih)
        		  VALUES ('$kadi', '$ksifre','$kbio', '$ktarih')";
        		  // use exec() because no results are returned
        		  $db->exec($sql);
        			echo "<p>Başarıyla kaydoldunuz</p>";
              $sabit = $sabit + 1;
        			} catch (PDOException $e) {
        				echo "hata";
        			}

            }else{
              echo "<p>şifreler aynı değil</p>";
            }
            if($sabit ==1){
              echo "<p><a href='cengiz.php'>Giriş sayfasına ilerleyiniz </a></p>";
            }

          }
      		?>

        </div>

      </div>
      <div class="footer">

      </div>
    </div>

  </body>
</html>

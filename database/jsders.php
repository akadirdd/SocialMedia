<!DOCTYPE html>
<html>
	<head>
	<title>CENGIZHAN</title>
	<link rel="stylesheet" href ="anasayfa.css" />


	</head>

	<body>
	<div class = "arkaplan">
	
	<div class = "ust">
	<div class = "resim">
		<h2 class="is" >Computer World</h2>
	</div>
	<div class = "menu">
		<ul>
			<li><a href="jsders.php" >Ana Sayfa</a></li>
			<li><a href="profil.php" >Profilim</a></li>
			<li><a href="#" >Hakkimizda</a></li>
			<li><a href="#" >Iletisim</a></li>

		</ul>
	</div>
	</div>
	<div class = "sol">
		<?php session_start(); ?>
		<h2>--<?php echo $_SESSION['kullanıcı']; ?>--</h2>

		<p><a href="cikis.php">   ÇIKIŞ </a></p>

		<ul>

			<li>java</li>
			<li>js</li>
			<li>C</li>
			<li>C++</li>
			<li>php</li>
			<li>.NET</li>
			<li>CSS</li>

		</ul>
	</div>
	<div class = "sag">
		<div class = "sag_ust">
			<?php
				//$_SESSION['kullanıcı']

				if(!isset($_SESSION["oturum"])){

					header("location:cengiz.php");
				}
			?>
			<p>Hoşgeldin <?php echo $_SESSION['kullanıcı']; ?>! Bu sayfada kullanıcıların paylaştığı günlükleri görebilirsin. İstediğinde sen de kendi günlüğünü paylaşabilirsin.</p>
			<form action="" method="post">
				<textarea name="paylas" rows="3" cols="80"></textarea>
				<input type="submit" value="PAYLAŞ" />
			</form>
			<?php
				if ($_POST) {
					$pay=$_POST["paylas"];
					$kul=$_SESSION["kullanıcı"];
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
						$sql = "INSERT INTO paylasim (uye_mail, uye_paylasimi)
						VALUES ('$kul', '$pay')";
						// use exec() because no results are returned
						$db->exec($sql);
						echo "<p>Başarıyla gönderildi...</p>";

					}catch (PDOException $e) {
						echo "hata";
					}
				}
		 	?>

		</div>
		<div class = "haberler">
			<div class = "haber">
				<?php
				try {
					$db = new PDO("mysql:host=localhost;dbname=dersler;charset=utf8;","root","");
					$db ->query("SET CHARACTER SET UTF8");
					$db ->query("SET NAMES UTF8");
					$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				} catch (PDOException $hata) {
					print $hata -> getMessage();
					echo "<p>veri tabanı bağlantı hatası!</p>";
				}
					$sorgu = $db->query("SELECT * FROM paylasim");
					$rows = $sorgu -> fetchAll(PDO::FETCH_ASSOC);
				?>
				<?php $a=0;for($i=(count($rows)-1);$i>=0;$i--){ $a++;?>

				<form action="" method="">
					<table>
						<tr>
							<th><?php echo $rows[$i]["uye_mail"]; ?> : </th>
						</tr>
						<tr>
							<td><?php echo $rows[$i]["uye_paylasimi"]; ?></td>
						</tr>
					</table>
				</form>
				<?php } ?>
			</div>
			<div class = "sonrakibutonu">
				<p>sonrakisayfa</p>
			</div>

		</div>
	</div>

	<div class = "footer">

		<p class = "reseve">All right reserved!2018</p>


	</div>
	</div>

	</body>
</html>

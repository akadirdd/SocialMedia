<!DOCTYPE html>
<html>
	<head>
	<title>CENGIZHAN-Makaleler</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href ="profil1.css" />


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
		<p>profil</p>
		<?php
			session_start();

			if(!isset($_SESSION["oturum"])){

				header("location:cengiz.php");
			}
		?>
		<h3>KULLANICI BİLGİLERİ</h3>
		<p>KULLANICI ADI : <?php echo $_SESSION["kullanıcı"]; ?></p>
		<p>KULLANICI ŞİFRE : <?php echo $_SESSION["kullanıcı_sifre"]; ?></p>
		<p>KULLANICI BİO : <?php echo $_SESSION["kullanıcı_bio"]; ?></p>
		<p>KULLANICI DOĞUM TARİHİ : <?php echo $_SESSION["kullanıcı_dtarih"]; ?></p>
	</div>
	<div class = "sag">
		<h3>PAYLAŞIMLARIM</h3>
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
			$maill=$_SESSION["kullanıcı"];
			//$sorgu = $db->query("SELECT * FROM paylasim");
			//$rows = $sorgu -> fetchAll(PDO::FETCH_ASSOC);
		try {
				$veri = $db->prepare('SELECT * FROM paylasim WHERE uye_mail = :isim');
				$veri->bindValue(':isim', $maill , PDO::PARAM_STR);
				$veri->execute();
				$dizi = $veri->fetchAll(PDO::FETCH_ASSOC);
			} catch (PDOException $e) {
				echo "<p>veri çekme hatası!</p>";
			}

		?>
		<?php for($i=(count($dizi)-1);$i>=0;$i--){
			$_SESSION["id_mail"]=$dizi[$i]["uye_id"];
			$_SESSION["uyel"]=$dizi[$i]["uye_mail"];
			$_SESSION["mesaj"]=$dizi[$i]["uye_paylasimi"];

			?>

		<form action="" method="">
			<table>
				<tr>
					<th><?php echo $dizi[$i]["uye_mail"]; ?> : </th>
				</tr>
				<tr>
					<td><?php echo $dizi[$i]["uye_paylasimi"]; ?></td>
				</tr>
				<tr>
					<td>
						<ul class="ul1">
							<li class="li1"><a class="a1" href="duzelt.php">düzenle</a></li>
							<li class="li1"><a class="a1" href="#">sil</a></li>
						</ul>
					</td>
				</tr>
			</table>
		</form>

		<?php } ?>

	</div>

	<div class = "footer">

		<p class = "reseve">All right reserved!2018</p>


	</div>
	</div>

	</body>
</html>

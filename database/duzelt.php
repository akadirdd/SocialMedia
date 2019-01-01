<!DOCTYPE html>
<html>
	<head>
	<title>düzenleme</title>
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
		<?php
      //$_SESSION["id_mail"]
      //$_SESSION["uyel"]
      //$_SESSION["mesaj"]

    ?>
    <p>paylaşım idsi:<?php echo $_SESSION["id_mail"]; ?> </p>
    <p>paylaşım yapan:<?php echo $_SESSION["uyel"]; ?> </p>
    <p>paylaşım:<?php echo $_SESSION["mesaj"]; ?> </p>
    <form action="" method="post">
      <textarea name="düz" rows="3" cols="80"></textarea>
      <input type="submit" value="DÜZENLE" />
    </form>
    <?php

    ?>

	</div>

	<div class = "footer">

		<p class = "reseve">All right reserved!2018</p>


	</div>
	</div>

	</body>
</html>

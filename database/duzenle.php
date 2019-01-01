<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>kullanıcı düzenle</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <link rel="stylesheet" href="assets/materialize/css/materialize.min.css" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css">
  </head>

<body>
<div class="card">


<div class="card-content">
<?php if($_GET) {
  $idb=$_GET["sil"];

?>
<div class="alert alert-warning">
  <strong>Uyarı</strong>
  <p><?php echo $idb; ?> ID'li kullanıcıyı silmek istiyor musunuz?  <a href="sil.php?id=<?php echo $idb; ?>">SİL</a> | <a href="duzenle.php">İPTAL</a></p>
</div>
<?php } ?>
<div class="table-responsive">


<form action="" method="">
    <table class="table table-striped table-bordered table-hover">
      <tr>
        <th>idler</th>
        <th>e-postalar</th>
        <th>şifreler</th>
        <th>biolar</th>
        <th>doğum tarihleri</th>
        <th>işlemler</th>
      </tr>

        <?php
          try {
					 $db = new PDO("mysql:host=localhost;dbname=dersler;charset=utf8;","root","");
					 $db ->query("SET CHARACTER SET UTF8");
					 $db ->query("SET NAMES UTF8");
					 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				  }catch(PDOException $hata){
					 print $hata -> getMessage();
					 echo "<p>veri tabanı bağlantı hatası!</p>";
				  }
					$sorgu = $db->query("SELECT * FROM uyeler1");
					$rows = $sorgu -> fetchAll(PDO::FETCH_ASSOC);
        ?><?php for($i=(count($rows)-1);$i>=0;$i--){?>
      <tr>

        <td><?php echo $rows[$i]["uye_id"]; ?></td>
        <td><?php echo $rows[$i]["uye_mail"]; ?></td>
        <td><?php echo $rows[$i]["uye_sifre"]; ?></td>
        <td><?php echo $rows[$i]["uye_bio"]; ?></td>
        <td><?php echo $rows[$i]["uye_dogum_tarih"]; ?></td>
        <td><a href="duzenle1.php?id=<?php echo $rows[$i]["uye_id"]; ?>">Düzenle</a> | <a href="duzenle.php?sil=<?php echo $rows[$i]["uye_id"];?>">Sil</a></td>
      </tr><?php } ?>
    </table>
</form>
</div>
</div>
</div>
</body>
</html>

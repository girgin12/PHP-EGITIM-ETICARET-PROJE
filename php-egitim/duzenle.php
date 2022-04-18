<?php require_once 'connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CRUD İSLEMLERİ</title>
</head>
<body>
	<h1>Veritabanı PDO Düzenleme işlemleri</h1>
	<hr>
	<?php 

	if ($_GET ['durum']== "ok") {

		echo "İşlem başarılı";
	}
	elseif  ($_GET ['durum']== "no") {

		echo "İşlem başarısız";
	}

	?>

	<?php 

	$verilersor=$db->prepare("SELECT * from veriler where bilgilerim_id=:id");
	$verilersor->execute(array(

		'id' => $_GET['bilgilerim_id']



	));

	$verilercek=$verilersor->fetch(PDO::FETCH_ASSOC);


	?>


	<form action="islem.php" method="POST">

		<input type="text" required  name="bilgilerim_ad" value="<?php  echo $verilercek ['bilgilerim_ad']?>">
		<input type="text" required name="bilgilerim_soyad" value="<?php  echo $verilercek ['bilgilerim_soyad']?>">
		<input type="email"required name="bilgilerim_mail" value="<?php  echo $verilercek ['bilgilerim_mail']?>">
		<input type="text" required name="bilgilerim_yas" value="<?php  echo $verilercek ['bilgilerim_yas']?>">
		<input type="hidden" value="<?php echo $verilercek['bilgilerim_id'] ?>" name="bilgilerim_id">
		<button type="submit" name="updateislemi"> Formu Düzenle</button>
	</form>
	<br>


</body>
</html>
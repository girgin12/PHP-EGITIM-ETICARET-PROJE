<?php 
require_once 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CRUD İSLEMLERİ</title>
</head>
<body>
	<h1>Veritabanı PDO kayıt işlemleri</h1>
	<hr>
	<?php 

	if ($_GET ['durum']== "ok") {

		echo "İşlem başarılı";
	}
	elseif  ($_GET ['durum']== "no") {

		echo "İşlem başarısız";
	}

	?>

	<form action="islem.php" method="POST">

		<input type="text" required  name="bilgilerim_ad" placeholder="Adınızı giriniz..">
		<input type="text" required name="bilgilerim_soyad" placeholder="Soyadınızı  giriniz..">
		<input type="email"required name="bilgilerim_mail" placeholder="mailinizi giriniz..">
		<input type="text" required name="bilgilerim_yas" placeholder="yasınızı  giriniz..">
		<button type="submit" name="insertislemi"> Formu gönder</button>
	</form>
	<br>
	<hr>

	<h4>Kayıtların listelenmesi</h4>

	<?php
	/* $verilersor=$db->prepare("SELECT * from veriler");
	$verilersor->execute();

	$verilercek=$verilersor->fetch(PDO::FETCH_ASSOC);
	echo "<pre>";
     print_r($verilercek);
     echo "</pre>";
  
     echo "<br>";  */
     //SELECT İŞLEMİİ

	/* $verilersor=$db->prepare("SELECT * from veriler");
	$verilersor->execute();

   while ($verilercek=$verilersor->fetch(PDO::FETCH_ASSOC)) {
   		echo $verilercek['bilgilerim_ad']; echo "<br>";
   	}	*/

/*WHERE SELECT İŞLEMİİ 

   	$verilersor=$db->prepare("SELECT * from veriler WHERE bilgilerim_yas=:bilgilerim_yas OR bilgilerim_ad=:bilgilerim_ad");
   	$verilersor->execute([

   		'bilgilerim_yas' => 25,
   		'bilgilerim_ad' => "kenan"


   	]

   	

   );

   	while ($verilercek=$verilersor->fetch(PDO::FETCH_ASSOC)) {
   		echo $verilercek['bilgilerim_ad']; echo "<br>";
   	}

   	*/
   	?>


   	<table style="width: 60%;" border="5">
   		<tr>
   			<th>Sıra no</th>
   			<th>Id</th>
   			<th>Ad</th>
   			<th>Soyad</th>
   			<th>Mail</th>
   			<th>Yaş</th>
   			<th>İşlemler</th>
   			<th width="50">İşlemler</th>
   		</tr>

   		<?php
   		$verilersor=$db->prepare("SELECT * from veriler");
   		$verilersor->execute();
   		$say=0;

   		while($verilercek=$verilersor->fetch(PDO::FETCH_ASSOC)) 

   			{$say++ ?>




   				<tr>
   					<td><?php echo $say; ?></td>
   					<td><?php echo $verilercek['bilgilerim_id'] ?></td>
   					<td><?php echo $verilercek['bilgilerim_ad'] ?></td>
   					<td><?php echo $verilercek['bilgilerim_soyad'] ?></td>
   					<td><?php echo $verilercek['bilgilerim_mail'] ?></td>
   					<td><?php echo $verilercek['bilgilerim_yas'] ?></td>
   					<td align="center"><a href="duzenle.php?bilgilerim_id=<?php echo $verilercek['bilgilerim_id'] ?>"><button>Düzenle</button></td></a>
   					<td align="center"><a href="islem.php?bilgilerim_id=<?php echo $verilercek['bilgilerim_id'] ?>&bilgilerimsil=ok"><button>Sil</button></td></a>

   				</tr>

   				<?php 




   			}?>


   		</table>

   	</body>
   	</html>
<?php
require_once 'connect.php';

if (isset($_POST['insertislemi'])) {

	


	$kaydet=$db->prepare("INSERT into veriler set 
		bilgilerim_ad=:bilgilerim_ad,
		bilgilerim_soyad=:bilgilerim_soyad,
		bilgilerim_mail=:bilgilerim_mail,
		bilgilerim_yas=:bilgilerim_yas

		");

	$insert=$kaydet->execute(array(   //$insert 1 yada 0 gönderir. kayıt başarılı yada başarısız için örnek olarak.
		'bilgilerim_ad' => $_POST['bilgilerim_ad'],
		'bilgilerim_soyad' => $_POST['bilgilerim_soyad'],
		':bilgilerim_mail' => $_POST['bilgilerim_mail'],
		'bilgilerim_yas' => $_POST['bilgilerim_yas']

	));


	if ($insert) {
		//echo "Kayıt başarılı.";

		header("Location:index.php?durum=ok"); //istediğimiz sayfaya önlendiriyoruz.
		exit; //yapılan işlemi durduruyoruz.
	}else {
		//echo "Kayıt Oluşturulamadı.";
		header("Location:index.php?durum=no");
	}



}



if (isset($_POST['updateislemi'])) {

	$bilgilerim_id=$_POST['bilgilerim_id'];


	$kaydet=$db->prepare("UPDATE veriler set 
		bilgilerim_ad=:bilgilerim_ad,
		bilgilerim_soyad=:bilgilerim_soyad,
		bilgilerim_mail=:bilgilerim_mail,
		bilgilerim_yas=:bilgilerim_yas
		where bilgilerim_id={$_POST['bilgilerim_id']}

		");

	$insert=$kaydet->execute(array(   //$insert 1 yada 0 gönderir. kayıt başarılı yada başarısız için örnek olarak.
		'bilgilerim_ad' => $_POST['bilgilerim_ad'],
		'bilgilerim_soyad' => $_POST['bilgilerim_soyad'],
		':bilgilerim_mail' => $_POST['bilgilerim_mail'],
		'bilgilerim_yas' => $_POST['bilgilerim_yas']

	));


	if ($insert) {
		//echo "Kayıt başarılı.";

		header("Location:duzenle.php?durum=ok&bilgilerim_id=$bilgilerim_id"); //istediğimiz sayfaya önlendiriyoruz.
		exit; //yapılan işlemi durduruyoruz.
	}else {
		//echo "Kayıt Oluşturulamadı.";
		header("Location:duzenle.php?durum=no&bilgilerim_id=$bilgilerim_id");
	}



}


if($_GET['bilgilerimsil']=="ok") {

	$sil=$db->prepare("DELETE from veriler where bilgilerim_id=:id");
	$control=$sil->execute(array(

		'id' => $_GET['bilgilerim_id']
	));





if ($control) {
		//echo "Kayıt başarılı.";

		header("Location:index.php?durum=ok"); //istediğimiz sayfaya önlendiriyoruz.
		exit; //yapılan işlemi durduruyoruz.
	}else {
		//echo "Kayıt Oluşturulamadı.";
		header("Location:index.php?durum=no");
		exit;
	}



}



?>
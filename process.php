<?php 
error_reporting(0);
session_start();
if($_SERVER['REQUEST_METHOD'] == 'GET'){
	$data = array(
		'status' => false,
		'message' => 'Bu sayfaya erişim izniniz yok'
	);
	$data = json_encode($data, JSON_UNESCAPED_UNICODE);
	die($data);
}else{
	$csrf = htmlspecialchars(addslashes(strip_tags($_POST['csrf'])));
	if(isset($csrf) && $_SESSION['csrf'] == $csrf){
		$data = array(
			'status' => true,
			'message' => 'CSRF tokeni doğru'
		);
		$data = json_encode($data, JSON_UNESCAPED_UNICODE);
		$_SESSION['csrf'] = '';
		die($data);
	}else{
		$data = array(
			'status' => false,
			'message' => 'CSRF tokeni hatalı lütfen sayfayı yenileyip tekrar işlem yapın'
		);
		$data = json_encode($data, JSON_UNESCAPED_UNICODE);
		die($data);
	}
}
?>
<?php 
session_start();
function generateRandomString($length = 255) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$_SESSION['csrf'] = generateRandomString();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Örnek Form</title>
</head>
<body>
	<form action="process.php" method="POST">
		<label for="userName">Kullanıcı Adı</label>
		<input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
		<input type="text" name="userName">
		<label for="userPassword">Şifre</label>
		<input type="text" name="userPassword">
		<button type="submit">Gönder</button>
	</form>
</body>
</html>
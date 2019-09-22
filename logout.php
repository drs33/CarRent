<?php
	//здесь удаляется сессия и происходит переход на главную страницу
?>
<?php
	session_start();
	session_destroy();
	header('Location:index.php');
	exit;
?>

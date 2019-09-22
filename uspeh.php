<?php
	//обработчик формы заказа и вывод сообщения об успешном заказе
?><?php
	session_start();
	require('connect.php');

	if (isset($_POST['otprzakaz'])){
		$zakazname=$_POST['name'];
		$zakazsname=$_POST['sname'];
		$zakazphone=$_POST['phone'];
		$zakazfdata=$_POST['fdata'];
		$zakazldata=$_POST['ldata'];
		$nnn=$_SESSION['id'];
		$edc=$_POST['zxc'];
		$qas=(int)$edc;
		



		
		$qu="INSERT INTO `dogovor` (`id`, `dataf`, `datal`, `id_client`, `id_auto`) VALUES (NULL, '$zakazfdata', '$zakazldata', '$nnn','$qas')";
		$ypa=mysqli_query($connection,$qu);
		$qu1="UPDATE `client` SET `name` = '$zakazname', `sname` = '$zakazsname', `phone` = '$zakazphone' WHERE `client`.`id` = '$nnn'";
		$ypa1=mysqli_query($connection,$qu1);
		$qu2="UPDATE `auto` SET `status` = 'NOT available' WHERE `auto`.`id` = '$qas'";
		$ypa2=mysqli_query($connection,$qu2);
		?>
		







		<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body>
	<div class="main">
				<div class="header">
					<a href="index.php"><img src="logo.png"></a>
				
				</div>
	<div class="leftbar">
					<br>
					<a href="index.php">Главная</a><br>
					<a href="about.php">О нас</a><br>
					<a href="contact.php">Контакты</a><br>
					<a href="myar.php">Моя история аренд</a>
				</div>
<div class="content">
	<table  align="center">
		<th>Оформление заказа</th>
		<tr><td>Ваш заказ успешно оформлен</td></tr>
	</table>

</div>
<div class="sidebar">
					<form  action="uspeh.php" method="POST" class="hide">
					<h2>Авторизация</h2>
				<?php if (isset($fmsg)){ ?><div class="err"><?php echo $fmsg; ?> </div><?php }?>
					<input type="text" name="username" class="form-control" placeholder="username" required><br>
					<input type="password" name="password" class="form-control" placeholder="password" required><br>
					<button type="submit" class="button">Авторизоваться</button>
			
					</form>

					<form action="logout.php">
					<button type="submit">ВЫЙТИ</button>
					</form>
	 	
				</div>
		</div>























		<?php

	}
	else echo "ОШИБКААААА";
?>
<?php  
	require('connect.php');
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

	<form align="center"  action="uspeh.php" method="POST">
		<tr><td><input  type="text" name="name" placeholder="Введите имя" required></td></tr>
		<tr><td><input  type="text" name="sname" placeholder="Введите фамилию" required></td></tr>
		<tr><td><input  type="text" name="phone" placeholder="номер телефона" required></td></tr>
		<tr><td><p>Дата начала аренды</p></td></tr>
		<tr><td><input  type="date" name="fdata" required></td></tr>
		<tr><td><p>Дата окончания аренды</p></td></tr>
		<tr><td><input  type="date" name="ldata" required></td></tr>
		<tr><td><p>Вы выбрали автомобиль <?php echo $_POST['hf'];$idewnik=$_POST['idewnik'];$dd=(int)$idewnik;?> </p></td></tr>
		<input type="hidden" name="zxc" value="<?php echo $dd?>">
		<tr><td><input type="submit" name="otprzakaz" ></td></tr>
		
	</form>
	</table>

</div>
<div class="sidebar">
					<form   method="POST" class="hide">
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






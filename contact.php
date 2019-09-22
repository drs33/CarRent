<?php
	//здесь странциа КОНТАКТЫ
?>
<?php
	session_start();
?>

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
		</div>
		<div class="content">
		

			<h3>Телефон для связи: 8(921)-747-66-68<h3>
			<h3>Работаем с 9-00 до 23-00 без выходных<h3>

				<h3>Наш адрес Большая Морская ул.,67<h3>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d706.8135328373555!2d30.296952637740063!3d59.929387881478476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469630e20893ae4f%3A0x64cccee1889b3e72!2z0KHQsNC90LrRgi3Qn9C10YLQtdGA0LHRg9GA0LPRgdC60LjQuSDQs9C-0YHRg9C00LDRgNGB0YLQstC10L3QvdGL0Lkg0YPQvdC40LLQtdGA0YHQuNGC0LXRgiDQsNGN0YDQvtC60L7RgdC80LjRh9C10YHQutC-0LPQviDQv9GA0LjQsdC-0YDQvtGB0YLRgNC-0LXQvdC40Y8!5e0!3m2!1sru!2sru!4v1556911033106!5m2!1sru!2sru" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

		
	</div>
	<div class="sidebar">
		<form  method="POST">
			<h2>Регистрация</h2>
			<?php if (isset($smsg)){ ?><div class="alert alert-success" role="alert"><?php echo $smsg; ?> </div><?php }?>

			<?php if (isset($fmsg)){ ?><div class="alert alert-danger" role="alert"><?php echo $fmsg; ?> </div><?php }?>
			<input type="text" name="username" class="form-control" placeholder="username" required><br>
			<input type="password" name="password" class="form-control" placeholder="password" required><br>
			<button type="submit" class="button">Зарегистрироваться</button>
			
		</form>
		<div class="avtar"><form action="atr.php">
    			<button type="submit" class="button">Авторизация</button>
			</form>
		</div>
	</div>
</div>




	
		






</body>
</html>
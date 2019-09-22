<?php
	//здесь страница О НАС
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
	

			<h3>Автопрокат-компания, образованная в 2019 году, является новичком на рынке аренды автомобилей, но хорошo зарекомендовавшая себя, отличается высоким профессионализмом сотрудников, низкими ценами на аренду, высоким качеством автомобилей, а также надёжным партнёром в решении проблем связанными с ДТП.</h3>
		
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
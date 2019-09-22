<?php
	//страница с регистрацией,кнопкой авторизация,а также выводом главной информации
?>
<?php
	 	require('connect.php');
	 
	 	if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['stag'])&& isset($_POST['imya'])&& isset($_POST['familiya'])&& isset($_POST['numphone'])&& isset($_POST['password1'])) {
	 		if (($_POST['password'])==($_POST['password1'])){
	 			if ($_POST['stag']>=2){
	 			
	 		$imya=$_POST['imya'];
	 		$familiya=$_POST['familiya'];
	 		$stag=$_POST['stag'];
	 		$numphone=$_POST['numphone'];
			$username=$_POST['username'];
	 		$password=$_POST['password'];
	 		$query="INSERT INTO client (id, name, sname, phone, login, password, stag) VALUES (NULL, '$imya', '$familiya', '$numphone', '$username', '$password', '$stag')";
	 		$result=mysqli_query($connection,$query);
	 		if ($result){
	 			$smsg="Регистрация прошла успешно";
			}
			else {
				$fmsg="Оо что то пошло не так,повторите попытку";
			}
		}
		else {
		$fmsg="Вашего стажа вождения не достаточно для регистрации в сервисе";
	} 
} else {
			$fmsg="пароли не совпали,повторите попытку";
		}
	 
	 	
	
	 }
	 ?>
	 
	
<?php
	session_start();
?>

<?php
	require('connect.php');
?>
<?php
	$qry=mysqli_query($connection,"SELECT model.marka, model.model, model.class, model.trannsm, model.zena, auto.color, auto.status FROM model INNER JOIN auto ON model.id = auto.id_model");
$posts=array();
if ($qry) {
	while ($row=mysqli_fetch_assoc($qry)) {
	$posts[]=$row;
}
}
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body>
	<div class="main">
		<div class="header">
			<a href="index.php" ><img src="logo.png"></a>
			
			
		</div>
		<div class="leftbar">
		<br>
			<a href="index.php">Главная</a><br>
			<a href="about.php">О нас</a><br>
			<a href="contact.php">Контакты</a><br>
		</div>
		<div class="content">
			
			
		<table align="center">
		<tr>
			<th>Марка</th>
			<th>Модель</th>
			<th>Класс</th>
			<th>Вид трансмиссии</th>
			<th>Цена/сутки</th>
			<th>Цвет</th>
			<th>Статус</th>
		</tr>
	<?php foreach($posts as $post){
			echo'<tr align="center">';
		echo '<td>'.$post['marka'].'</td>';
		echo '<td>'. $post['model'].	'</td>';
		echo '<td>'. $post['class']	.'</td>';
		echo '<td>'. $post['trannsm'].	'</td>';
		echo '<td>'.$post['zena']	.    '</td>';
		echo '<td>'.$post['color'].	'</td>';
		echo '<td>'. $post['status']	.'</td>';
	
	}
	
	
	echo '</table>';
	?>
	</div>

	<div class="sidebar">
		<form  method="POST" action="registration.php">
			<h2>Регистрация</h2>
			<?php if (isset($smsg)){ ?><div class="alert alert-success" role="alert"><?php echo $smsg; ?> </div><?php }?>

			<?php if (isset($fmsg)){ ?><div class="alert alert-danger" role="alert"><?php echo $fmsg; ?> </div><?php }?>
			<input size="32" type="text" name="familiya" class="form-control" placeholder="Введите фамилию" required><br>
			<input size="32" type="text" name="imya" class="form-control" placeholder="Введите имя" required><br>
			<input size="32" type="text" name="numphone" class="form-control" placeholder="Введите номер телефона" required><br>
			<input size="32" type="text" name="username" class="form-control" placeholder="Введите логин" required><br>
			<input size="32" type="password" name="password" class="form-control" placeholder="Введите пароль" required><br>
			<input size="32" type="password" name="password1" class="form-control" placeholder="Повторите пароль" required><br>
			<input size="32" type="text" name="stag" class="form-control" placeholder="Введите стаж вождения(не менее 2 лет)" required><br>
			<button type="submit">Зарегистрироваться</button>
			
		</form>
		<div class="avtar"><form action="atr.php">
    			<button type="submit" class="button">Авторизация</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>

	
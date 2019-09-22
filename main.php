<?php
	//страница с регистрацией,кнопкой авторизация,а также выводом главной информации с возможной сортировкой (реализована на sort.php)

?>
<?php
	require('connect.php');
?>










































	 
	
<?php
	session_start();
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
			<form action="" method="POST" >
				<input type="submit" name="admin" value="админ">
			</form>

			
		</div>
		<div class="leftbar">
		<br>
			<a href="index.php">Главная</a><br>
			<a href="about.php">О нас</a><br>
			<a href="contact.php">Контакты</a><br>
		</div>
		<div class="content">
			<form action="" method="POST">
					<span class="filtr">Выберите класс</span>
		<select name="classdobavlenie">
			<?php
				$classb="business";
				$classe="econom";
			?>
			<option selected disabled hidden style='display: none' value=''></option>
			<option value="<?php echo $classe;?>">econom</option>
			<option value="<?php echo $classb;?>">business</option>
		</select><br>



		<span class="filtr">Выберите вид трансмиссии</span>
		<select name="kotrdobavlenie">
			<?php 
				$kotra="auto";
				$kotrm="mech";
			?>
			<option selected disabled hidden style='display: none' value=''></option>
			<option value="<?php echo $kotra;?>">auto</option>
			<option value="<?php echo $kotrm;?>">mech</option>
		 </select><br>
		<input type="submit" name="sendfiltr" value="Принять">
		</form> 
				
			<?php 
	if (isset($_POST['admin']))
	{
		?>
		<h2>Вход как администратор</h2>
		<form method="POST" action="admin.php" class="adminforma">
			<input class="adminforma" type="text" name="adminlogin" placeholder="Ведите логин администратора" required><br>
			<input class="adminforma" type="password" name="adminpass" placeholder="Введите пароль администратора" required><br>
			<input class="adminforma" type="submit" name="adminka" value="Получить доступ">
		</form>
	
<?php
	} 



	elseif (isset($_POST['sendfiltr'])){
		if (isset($_POST['classdobavlenie']) && (isset($_POST['kotrdobavlenie']))){
		$ffclass=$_POST['classdobavlenie'];
		$ffkotr=$_POST['kotrdobavlenie'];
		$ffqu=mysqli_query($connection,"SELECT model.marka, model.model, model.class, model.trannsm, model.zena, auto.color, auto.status FROM model INNER JOIN auto ON model.id = auto.id_model WHERE model.trannsm='$ffkotr'&& model.class='$ffclass'");
	}
	if (!isset($_POST['classdobavlenie']) && (!isset($_POST['kotrdobavlenie']))){
		
		$ffqu=mysqli_query($connection,"SELECT model.marka, model.model, model.class, model.trannsm, model.zena, auto.color, auto.status FROM model INNER JOIN auto ON model.id = auto.id_model");
	}
	if (!isset($_POST['classdobavlenie']) && (isset($_POST['kotrdobavlenie']))){
		$ffkotr=$_POST['kotrdobavlenie'];
		$ffqu=mysqli_query($connection,"SELECT model.marka, model.model, model.class, model.trannsm, model.zena, auto.color, auto.status FROM model INNER JOIN auto ON model.id = auto.id_model WHERE model.trannsm='$ffkotr'");
	}
	if (isset($_POST['classdobavlenie']) && (!isset($_POST['kotrdobavlenie']))){
		$ffclass=$_POST['classdobavlenie'];
		$ffqu=mysqli_query($connection,"SELECT model.marka, model.model, model.class, model.trannsm, model.zena, auto.color, auto.status FROM model INNER JOIN auto ON model.id = auto.id_model WHERE model.class='$ffclass'");
	}
		$fposts=array();
		if ($ffqu){
			while ($frow=mysqli_fetch_assoc($ffqu)) {
				$fposts[]=$frow;
				}
			}
			?>
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
	<?php foreach($fposts as $fpost){
			echo'<tr align="center">';
		echo '<td>'.$fpost['marka'].'</td>';
		echo '<td>'. $fpost['model'].	'</td>';
		echo '<td>'. $fpost['class']	.'</td>';
		echo '<td>'. $fpost['trannsm'].	'</td>';
		echo '<td>'.$fpost['zena']	.    '</td>';
		echo '<td>'.$fpost['color'].	'</td>';
		echo '<td>'. $fpost['status']	.'</td>';
	
	}
	
	
	echo '</table>';

	
	}

else {








































		?>
			
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
	






		<?php } ?>

		</div>
 
	<div class="sidebar">
		<form  action="registration.php">
			<button type="submit" class="button">Зарегистрироваться</button>
			
		</form>
		<form action="atr.php">
    			<button type="submit" class="button">Авторизация</button>
			</form>

	</div>
</div>
</body>
</html>

	
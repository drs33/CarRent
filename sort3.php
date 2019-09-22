<?php
	session_start();
	require('connect.php');
	$qry=mysqli_query($connection,"SELECT model.marka, model.model, model.class, model.trannsm, model.zena, auto.color, auto.status FROM model INNER JOIN auto ON model.id = auto.id_model ORDER BY model.zena ASC");
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
			<div class="sort">
			Сортировать по <strong>имени</strong> (<a href="sort1.php"><span>От А до Я</span></a>/<a href="sort2.php"><span>От Я до А</span></a>)<br>
				Сортировать по <strong>цене</strong> (<a href="sort3.php"><span>Возрастанию</span></a>/<a href="sort4.php"><span>Убыванию</span></a>)
			</div>
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
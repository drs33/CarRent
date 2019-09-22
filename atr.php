
<?php
	//здесь происходит авторизация,если успешно то поялвяется кнопка закзать иначе все как и было на main.php
?>
<?php
	session_start();
?>

<?php
	require('connect.php');
?>

<?php
	$qry=mysqli_query($connection,"SELECT model.id,model.marka, model.model, model.class, model.trannsm, model.zena, auto.color, auto.status FROM model INNER JOIN auto ON model.id = auto.id_model");
$posts=array();
if ($qry) {
	while ($row=mysqli_fetch_assoc($qry)) {
	$posts[]=$row;
}
}
?>


<link rel="stylesheet" type="text/css" href="style.css">	 
	




<?php
	 	require('connect.php');
	 	if (isset($_POST['username']) and isset($_POST['password'])){
	 		$username=$_POST['username'];
	 		$password=$_POST['password'];
	 		$query="SELECT * FROM client WHERE login='$username' and password='$password'";
	 		$result=mysqli_query($connection,$query) or DIE(mysql_error($connection));
	 		$count=mysqli_num_rows($result);
	 		$ro=mysqli_fetch_assoc($result);
			$_SESSION['id']=$ro['id'];
			$nnn=$_SESSION['id'];

	 		if ($count==1) {
	 			$_SESSION['username']=$username;
	 		} else {
	 			$fmsg="Ошибка,попробуйте еще раз";
	 		}
	 	}
	 	if (isset($_SESSION['username'])) {
	 		$username=$_SESSION['username'];
	 		$succ=1;
	 		
	 		?>
		

	 		<?php

	 	}
	 ?>



<?php if (isset($succ)){
	
			?>

			<div class="main">
				<div class="header">
					<a href="index.php"><img src="logo.png"></a>
				
				</div>
				<div class="leftbar">
					<br>
					<a href="index.php">Главная</a><br>
					<a href="about.php">О нас</a><br>
					<a href="contact.php">Контакты</a><br>
					<a href="myar.php">Личный кабинет</a><br>
					<a href="cart.php">Корзина(<?php if (!isset($_SESSION['vsego'])){echo "0";}else { echo $_SESSION['vsego']; } ?>)</a>
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
						<th>-------</th>
					</tr>
					<?php foreach($posts as $post){
							$per1=$post['marka'];
							$per2=$post['model'];
							$per3=$post['zena'];
							$per400=$post['id'];

							echo'<tr align="center">';
							echo '<td>'.$post['marka'].'</td>';
							echo '<td>'. $post['model'].	'</td>';
							echo '<td>'. $post['class']	.'</td>';
							echo '<td>'. $post['trannsm'].	'</td>';
							echo '<td>'.$post['zena']	.    '</td>';
							echo '<td>'.$post['color'].	'</td>';
							echo '<td>'. $post['status']	.'</td>';
							echo '<td>'."<a href='addto.php?id=$post[id]'>добавить</a>".'</td>';
							}
							echo '</table>';
					?>
				
					
				
				</div>




				


				<div class="sidebar">
					<form  method="POST" class="hide">
					<h2>Авторизация</h2>
				<?php if (isset($fmsg)){ ?><div class="err"><?php echo $fmsg; ?> </div><?php }?>
					<input type="text" name="username" class="form-control" placeholder="username" required><br>
					<input type="password" name="password" class="form-control" placeholder="password" required><br>
					<button type="submit" class="button">Авторизоваться</button>
			
					</form>
					<?php echo "Здравствуйте, ".$username; ?>
					

					<form action="logout.php">
					<button type="submit">ВЫЙТИ</button>
					</form>
	 	
				</div>
		</div>
	<?php 
	
	}
	else { ?>

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

			<form  method="POST" >
			<h2>Авторизация</h2>
				<?php if (isset($fmsg)){ ?><div class="err"><?php echo $fmsg; ?> </div><?php }?>
			<input type="text" name="username" class="form-control" placeholder="username" required><br>
			<input type="password" name="password" class="form-control" placeholder="password" required><br>
			<button type="submit" class="button">Авторизоваться</button>
			
		</form>
	





	
		
	</div>
		
</div>

<?php
}
?>		
















































































































































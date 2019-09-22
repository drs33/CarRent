
<?php
	//страница списка аренд клиента
?>
<link rel="stylesheet" type="text/css" href="style.css">	
<?php
	session_start();
?>

<?php
	require('connect.php');
?>
<?php
	$nnn=$_SESSION['id'];
	$qry=mysqli_query($connection,"SELECT `name`,`sname`,`phone`,`login`,`password`,`stag` FROM `client` WHERE `id`='$nnn'");
$posts=array();
if ($qry) {
	while ($row=mysqli_fetch_assoc($qry)) {
	$posts[]=$row;
}
}
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
						<th>Имя</th>
						<th>Фамилия</th>
						<th>Номер телефона</th>
						<th>Логин</th>
						<th>Пароль</th>
						<th>Стаж</th>
					</tr>
					<?php foreach($posts as $post){
							echo'<tr align="center">';
							echo '<td>'.$post['name'].'</td>';
							echo '<td>'. $post['sname'].	'</td>';
							echo '<td>'. $post['phone'].	'</td>';
							echo '<td>'. $post['login'].	'</td>';
							echo '<td>'. $post['password'].	'</td>';
							echo '<td>'. $post['stag'].	'</td>';
							}
							echo '</table>';
					?>
					<form method="POST">
						<input type="submit" name="updlk" value="Изменить">
					</form>
					<?php 
						if (isset($_POST['updlk'])){
							?> 
								<form method="POST">
									<input type="text" name="lkname" value="<?php echo $post['name']; ?>"><br>
									<input type="text" name="lksname" value="<?php echo $post['sname']; ?>"><br>
									<input type="text" name="lkphone" value="<?php echo $post['phone']; ?>"><br>
									<input type="text" name="lklogin" value="<?php echo $post['login']; ?>"><br>
									<input type="text" name="lkpassword" value="<?php echo $post['password']; ?>"><br>
									<input type="text" name="lkstag" value="<?php echo $post['stag']; ?>"><br>
									<input type="submit" name="lkupd">
								</form>


							<?php
						}
						if (isset($_POST['lkupd'])){
							$lkname=$_POST['lkname'];
							$lksname=$_POST['lksname'];
							$lkphone=$_POST['lkphone'];
							$lklogin=$_POST['lklogin'];
							$lkpassword=$_POST['lkpassword'];
							$lkstag=$_POST['lkstag'];
							$gg=mysqli_query($connection,"UPDATE `client` SET `name` = '$lkname', `sname` = '$lksname', `phone` = '$lkphone', `login` = '$lklogin', `password` = '$lkpassword', `stag` = '$lkstag' WHERE `client`.`id` = $nnn");
							header('Location:myar.php');
						}
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

					<form action="logout.php">
					<button type="submit">ВЫЙТИ</button>
					</form>
	 	
				</div>
		</div>
	
	


































































































































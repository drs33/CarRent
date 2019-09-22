<?php
	// страница авторизации админа
?>
<link rel="stylesheet" type="text/css" href="style.css">
<?php
	 	session_start();
	 	require('connect.php');
	 	if (isset($_POST['adminka'])){
	 		if (isset($_POST['adminlogin']) and isset($_POST['adminpass'])){
	 			$adminlogin=$_POST['adminlogin'];
	 			$adminpass=$_POST['adminpass'];
	 			$query="SELECT * FROM client WHERE login='$adminlogin' and password='$adminpass'";
	 			$result=mysqli_query($connection,$query) or DIE(mysql_error($connection));
	 			$count=mysqli_num_rows($result);
	 			$ro=mysqli_fetch_assoc($result);
	 		if ($count==1) {
	 			$_SESSION['username']=$adminlogin;
	 			$flag=1;
	 			$smsg="ПРИВЕТ,АДМИН";
	 		} else {
	 			$fmsg="Ошибка,попробуйте еще раз";
	 			$flag=0;
	 		}
	 	}
	 	

	 	}
		
?>
	<div class="main">
				<div class="header">
					<a href="index.php"><img src="logo.png"></a>
				
				</div>
				<?php if ($flag==1){ ?>
				<div class="leftbar">
					<br>
					<a href="index.php">Главная</a><br>
					<a href="about.php">О нас</a><br>
					<a href="contact.php">Контакты</a><br>
					<a href="autolist.php">Список автомобилей</a><br>
					<a href="modellist.php">Список моделей</a><br>
				</div>
				<div class="content">
					<h2><?php echo $smsg; ?></h2>
					
				</div>
				<div class="sidebar">
					
	 	<form action="logout.php">
					<button type="submit">ВЫЙТИ</button>
					</form>
				</div>
			<?php }
			elseif (flag==0){ ?>
				<div class="leftbar">
					<br>
					<a href="index.php">Главная</a><br>
					<a href="about.php">О нас</a><br>
					<a href="contact.php">Контакты</a><br>
				</div>
				<div class="content">
					<h2><?php echo $fmsg; ?></h2>
					<form method="POST" action="admin.php" class="adminforma">
			<input class="adminforma" type="text" name="adminlogin" placeholder="Ведите логин администратора" required><br>
			<input class="adminforma" type="password" name="adminpass" placeholder="Введите пароль администратора" required><br>
			<input class="adminforma" type="submit" name="adminka" value="Получить доступ">
		</form>
					
				</div>
			<?php }
			?>


				<div class="sidebar">
					
	 	
				</div>
		</div>
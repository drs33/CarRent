
<?php
	 	require('connect.php');
	 	if (isset($_POST['username']) && isset($_POST['password'])){
	 		$username=$_POST['username'];
	 		$password=$_POST['password'];
	 		$query="INSERT INTO client (login,password) VALUES ('$username','$password')";
	 		$result=mysqli_query($connection,$query);
	 		if ($result){
	 			$smsg="Регистрация прошла успешно";
			}
			else {
				$fmsg="Пользователь с таким логином уже существует";
			}
	 	}
	 ?>

	<link rel="stylesheet" type="text/css" href="style.css">	 
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

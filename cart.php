<link rel="stylesheet" type="text/css" href="style.css">	
<?php
	session_start();
	require('connect.php');

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
					<a href="myar.php">Личный кабинет</a>
				</div>
				<div class="content">
					<h2>КОРЗИНА</h2>
					<?php 
					$cart=unserialize($_COOKIE['cart']); ?>
	
					
					<?php

	$total=0;$count=0;$_SESSION['vsego']=$count;
	if (isset($_GET['delete'])){
		unset($cart[$_GET['delete']]);
		$ser=serialize($cart);
		setcookie('cart',$ser,time()+3600);
		unset($_SESSION['cart'][$_GET['delete']]);
	}
	if (!empty($cart)) { ?>
		<table align="center">
					<tr>
						<th>Марка</th>
						<th>Модель</th>
						<th>Класс</th>
						<th>Вид трансмиссии</th>
						<th>Цвет</th>
						<th>Цена/сутки</th>
					
						
					</tr>
					<?php 
					foreach($cart as $id => $count){
						$q=mysqli_query($connection,"SELECT model.marka, model.model, model.class, model.trannsm, model.zena, auto.color FROM model INNER JOIN auto ON model.id = auto.id_model WHERE model.id=$id");
							$fetch=mysqli_fetch_assoc($q);
							$_SESSION['vsego']=$count+$_SESSION['vsego'];	
							

							echo'<tr align="center">';
							echo '<td>'.$fetch['marka'].'</td>';
							echo '<td>'. $fetch['model'].	'</td>';
							echo '<td>'. $fetch['class']	.'</td>';
							echo '<td>'. $fetch['trannsm'].	'</td>';
							echo '<td>'.$fetch['color'].	'</td>';
							echo '<td>'.$fetch['zena']	.    '</td>';
							$total=$total+$fetch['zena'];
							echo '<td>'."<a href='cart.php?delete=".$id."'>удалить</a>".'</td>';
							}
							echo '</table>'; 
						} else { echo "Корзина пуста"."</br>"; } 
							echo "Итоговая сумма за аренду автомобилей ".$total; ?>
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
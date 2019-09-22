
<link rel="stylesheet" type="text/css" href="style.css">
<?php
	session_start();
	require('connect.php');
	$autozapros=mysqli_query($connection,"SELECT `id`,`id_model`,`color`,`status`,`regnum` FROM auto");
	$posts=array();
if ($autozapros) {
	while ($row=mysqli_fetch_assoc($autozapros)) {
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
					<a href="autolist.php">Список автомобилей</a><br>
					<a href="modellist.php">Список моделей</a><br>
				</div>
				<div class="content">
					
					<table align="center">
					<tr>
						<th>id</th>
						<th>id модели</th>
						<th>цвет</th>
						<th>статус</th>
						<th>регистрационный номер</th>
					</tr>
					<?php foreach($posts as $post){
							$kot=$post['id'];
							echo'<tr align="center">';
							echo '<td>'.$post['id'].'</td>';
							echo '<td>'. $post['id_model'].	'</td>';
							echo '<td>'. $post['color']	.'</td>';
							echo '<td>'. $post['status'].	'</td>';
							echo '<td>'.$post['regnum']	.    '</td>';?>
							<td><form method="POST">
								<input type="submit" name="deleteauto[]" value="Удалить">
								<input type="hidden" name="qwe" value="<?php echo $kot; ?>">
								
							</form></td>
							<td><form method="POST">
								<input type="submit" name="updateauto[]" value="Обновить информацию">
								<input type="hidden" name="qwe" value="<?php echo $kot; ?>">
								
							</form></td>
							
							<?php }
							
							echo '</table>';
					?>
					<form  class="addauto" method="POST">
								<input type="submit" name="addauto" value="Добавить автомобиль">
						</form>






						<?php if (isset($_POST['addauto'])){ 
			 	?>
			 	
			 			<form class="addauto" method="POST">
			 				<?php 
			 				$opt=mysqli_query($connection,"SELECT `id`,`marka`,`model` FROM `model`");
			 				$posts=array();?>
			 					<select name="avtodobavlenie">
			 						<?php 
							while ($row=mysqli_fetch_array($opt)) {
								$mid=$row['id'];
								$mmarka=$row['marka'];
								$mmodel=$row['model']; ?>

								<option value="<?php echo $mid;?>"><?php echo $mid." ".$mmarka." ".$mmodel;?></option>
								<?php }
							?>
						</select> 
			 				<input type="text" name="color" placeholder="Введите цвет авто" required>
			 				<input type="text" name="regnum" placeholder="Введите регистрационный номер"  required>
			 				<input type="submit" name="dobavka" value="Добавить">
			 			</form>
			 	
			 <?php }
		?>

				</div>

				<div class="sidebar">
	 	
				</div>
		</div>
		<?php
		$fgy=$_POST['qwe'];
			if (isset($_POST['deleteauto'])) {
				$delzapr=mysqli_query($connection,"DELETE FROM `auto` WHERE `auto`.`id` = '$fgy'");
				header("Refresh: 0");
			 }
			 if (isset($_POST['updateauto'])){
			 	$updzapr=mysqli_query($connection,"UPDATE `auto` SET `status` = 'available' WHERE `auto`.`id` = '$fgy'");
			 	echo $fgy;
			 	header("Refresh: 0");
			 }
			 if (isset($_POST['dobavka'])){
			 	$addcolor=$_POST['color'];
			 	$addregnum=$_POST['regnum'];
			 	$addid=$_POST['avtodobavlenie'];
			 	$addzapr=mysqli_query($connection,"INSERT INTO `auto` (`id`, `color`, `status`, `regnum`, `id_model`) VALUES (NULL, '$addcolor', 'available', '$addregnum','$addid')");
			 	header("Refresh: 0");
			 }
			

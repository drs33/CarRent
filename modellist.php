<?php
	//здесь список моделей(удаление,изменениеЮдобавление)
?>
<link rel="stylesheet" type="text/css" href="style.css">
<?php
	session_start();
	require('connect.php');
	$modelzapros=mysqli_query($connection,"SELECT `id`,`marka`,`model`,`class`,`trannsm`,`zena` FROM model");
	$posts=array();
if ($modelzapros) {
	while ($row=mysqli_fetch_assoc($modelzapros)) {
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
						<th>марка</th>
						<th>модель</th>
						<th>класс</th>
						<th>вид трансмиссии</th>
						<th>цена</th>
					</tr>
					<?php foreach($posts as $post){
							$kot=$post['id'];
							echo'<tr align="center">';
							echo '<td>'.$post['id'].'</td>';
							echo '<td>'. $post['marka'].	'</td>';
							echo '<td>'. $post['model']	.'</td>';
							echo '<td>'. $post['class'].	'</td>';
							echo '<td>'.$post['trannsm']	.    '</td>';
							echo '<td>'.$post['zena']	.    '</td>';?>
							<td><form method="POST">
								<input type="submit" name="deleteauto[]" value="Удалить">
								<input type="hidden" name="qwe" value="<?php echo $kot; ?>">
								
							</form></td>
							
							<?php }
							
							echo '</table>';
					?>
					<form  class="addauto" method="POST">
								<input type="submit" name="addmodel" value="Добавить автомобиль">
						</form>
						<form  class="addauto" method="POST">
								<input type="submit" name="changezena" value="Изменить цену">
						</form>






						<?php if (isset($_POST['addmodel'])){ 
			 	?>
			 	
			 			<form class="addauto" method="POST">
			 				<input type="text" name="marka" placeholder="Введите марку автомобиля" required>
			 				<input type="text" name="model" placeholder="Введите модель автомобиля"  required>
			 			
			 				<select name="classdobavlenie">
			 				
								<option value="econom"><эконом></option>
								<option value="business"><бизнесс></option>
							
						</select> 
						<select name="trannsmdobavlenie">
			 				
								<option value="mech"><механика></option>
								<option value="auto"><автомат></option>
							
						</select> 
			 				<input type="text" name="zena" placeholder="Введите цену модели" required>
			 				<input type="submit" name="dobavkamodel" value="Добавить модель">
			 			</form>
			 	
			 <?php } ?>

			 		<?php if (isset($_POST['changezena'])){ 
			 	?>
			 	
			 			<form  method="POST">
			 				<?php 
			 				$opt=mysqli_query($connection,"SELECT `id`,`marka`,`model` FROM `model`");
			 				$posts=array();?>
			 					<select name="modeldobavlenie">
			 						<?php 
							while ($row=mysqli_fetch_array($opt)) {
								$mid=$row['id'];
								$mmarka=$row['marka'];
								$mmodel=$row['model']; ?>

								<option value="<?php echo $mid;?>"><?php echo $mid." ".$mmarka." ".$mmodel;?></option>
								<?php }
							?>
						</select> 
			 				<input type="text" name="zzena" placeholder="Введите новую цену" required>
			 				<input type="submit" name="zenach" value="Изменить">
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
				$delzapr=mysqli_query($connection,"DELETE FROM `model` WHERE `model`.`id` = '$fgy'");
				header("Refresh: 0");
			 }
			 if (isset($_POST['dobavkamodel'])){
			 	$addmarka=$_POST['marka'];
			 	$addmodel=$_POST['model'];
			 	$addzena=$_POST['zena'];
			 	$addclass=$_POST['classdobavlenie'];
			 	$addtrannsm=$_POST['trannsmdobavlenie'];
			 	$addzapr=mysqli_query($connection,"INSERT INTO `model` (`id`, `marka`, `model`, `class`, `trannsm`, `zena`) VALUES (NULL, '$addmarka', '$addmodel', '$addclass','$addtrannsm','$addzena')");
			 	header("Refresh: 0");
			 }
			 if (isset($_POST['zenach'])){
			 	$chid=$_POST['modeldobavlenie'];
			 	$chzena=$_POST['zzena'];
			 	$chzapros=mysqli_query($connection,"UPDATE `model` SET `zena` = '$chzena' WHERE `model`.`id` = $chid");
			 	header("Refresh: 0");
			 }
			

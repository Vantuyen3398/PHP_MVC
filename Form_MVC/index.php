<?php  
	session_start();
	include 'controller/controller.php';	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/register.css">
	<script src="js/validate.js"></script>
	<style>
	</style>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body>
	<nav class="nav nav-pills nav-justified">
  		<a class="nav-link active" aria-current="page" href="index.php">Home</a>
  		<a class="nav-link" href="index.php?action=chagne">Chagne PassWord</a>
  		<?php
  			if(isset($_SESSION['login']))
  			{
  		?>
  				<a class="nav-link" href="index.php?controller=users&action=listuser">List User</a>
  		<?php } ?>  
  		 <!-- <a class="nav-link" href="index.php?controller=users&action=listuser">List User</a> -->
  		<ul class="infor"> 
			<!-- <li>
				<img src="http://localhost:8080/Form_MVC/uploads/users/<?php echo $item?>" alt="avatar">
			</li> -->
			<?php 
				if(isset($_SESSION['login']['username']))
				{?>
					<li class="logout">Hi, <?php echo $_SESSION['login']['username'];?>
						<a href='index.php?controller=users&action=logout'>Logout</a>
					</li>
			<?php } else { ?>
					<a class="nav-link" href='index.php?controller=users&action=login'>Login</a>
					<a class="nav-link" href='index.php?controller=users&action=register'>Register</a>
			<?php } ?>
		</ul>
	</nav>
	<?php 
		$controller = new Controller();
		$controller->handleRequest();
	 ?>
</body>
</html>
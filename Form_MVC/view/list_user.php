<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<center>
		<form action="index.php?controller=users&action=listuser" method="get">
			<input type="hidden" name="c" value="user">
			<input type="text" name="keyword" placeholder="Tìm Kiếm..." value="<?php echo (isset($_GET['keyword'])) ? $_GET['keyword'] : '' ?>">
			<input type="submit" value="search">
		</form>
	</center>
	<table class="table">
	  	<thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Name</th>
		      <th scope="col">Email</th>
		      <th scope="col">Username</th>
		      <th scope="col">Password</th>
		      <th scope="col">Date</th>
		      <th scope="col">Avatar</th>
		      <th scope="col">Action</th>
		    </tr>
		  	</thead>
		  	<tbody>
		  	<?php
				$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
				if(!empty($keyword)){
					foreach ($search as $key => $item){
			?>
		    <tr>
		      	<th scope="row"><?php echo $key?></th>
		      	<td><?php echo $item[0]?></td>
		      	<td><?php echo $item[1]?></td>
		      	<td><?php echo $item[2]?></td>
		      	<td><?php echo $item[3]?></td>
		      	<td><?php echo $item[4]?></td>
		      	<td><?php echo $item[5]?></td>
		      	<td>
		      		<a onclick="return confirm('Are you want to delete?')" href="?username=<?php $del;?>">Delete</a>
		      	</td>
		    </tr>
		    <?php
					}
				}
				else {
						foreach ($list as $key => $item) {
			?>
			<tr>
		      	<th scope="row"><?php echo $key + 1?></th>
		      	<td><?php echo $item[0]?></td>
		      	<td><?php echo $item[1]?></td>
		      	<td><?php echo $item[2]?></td>
		      	<td><?php echo $item[3]?></td>
		      	<td><?php echo $item[4]?></td>
		      	<td><?php echo $item[5]?></td>
		      	<td>
		      		<a onclick="return confirm('Are you want to delete?')" href="index.php?controller=users&action=listuser&username=<?= $item[2]?>">Delete</a>
		      	</td>
		    </tr>
		    <?php		
					} 
				}
			?>
	  	</tbody>
	</table>
	<nav aria-label="Page navigation example">
	  	<ul class="pagination">
		    <li class="page-item">
		      	<a class="page-link" href="#" aria-label="Previous">
		        <span aria-hidden="true">&laquo;</span>
		      	</a>
		    </li>
		    <li class="page-item">
		    	<?php 
		    		if($list){
		    			$i = 1;
		    			$size = count($list);
		    			$pageTotal = ceil($size / 3);
		    			for($i = 1; $i < $pageTotal; $i++){
						echo '<a class="page-link" href="index.php?controller=users&action=listuser&trang='.$i.'">'.$i.'</a>';
		    		}}
		    	?>
		    </li>
		      	<a class="page-link" href="#" aria-label="Next">
		        	<span aria-hidden="true">&raquo;</span>
		      	</a>
		    </li>
	  	</ul>
	</nav>
</body>
</html>
<?php 
// $searchthis = "nhat";
// $matches = array();

// $handle = @fopen("uploads/user.txt", "r");
// if ($handle)
// {
//     while (!feof($handle))
//     {
//         $buffer = fgets($handle);
//         if(strpos($buffer, $searchthis) !== FALSE)
//             $matches[] = $buffer;
//     }
//     fclose($handle);
// }

// // show results:
// print_r($matches);
?> 
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
		<form action="index.php?action=listuser" method="get">
			<input type="hidden" name="c" value="user">
			<input type="text" name="keyword" placeholder="Tìm Kiếm..." value="<?php echo (isset($_GET['keyword'])) ? $_GET['keyword'] : '' ?>">
			<input type="submit" value="search">
		</form>
		<table border = "1">
			<tr>
				<td>stt</td>
				<td>name</td>
				<td>email</td>
				<td>username</td>
				<td>password</td>
				<td>date</td>
				<td>avatar</td>
				<td>action</td>
			</tr>
			<?php
			$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
				if(!empty($keyword)){
					foreach ($search as $key => $item){
			?>
				<tr>
					<td><?php echo $key?></td>
					<td><?php echo $item[0]?></td>
					<td><?php echo $item[1]?></td>
					<td><?php echo $item[2]?></td>
					<td><?php echo $item[3]?></td>
					<td><?php echo $item[4]?></td>
					<td><?php echo $item[5]?></td>
					<td><a onclick="return confirm('Are you want to delete?')" href="?username=<?php $del;?>">Delete</a></td>
				</tr>
			<?php
					}
				}
				else {
					foreach ($list as $key => $item) {
			?>
				<tr>
					<td><?php echo $key + 1?></td>
					<td><?php echo $item[0]?></td>
					<td><?php echo $item[1]?></td>
					<td><?php echo $item[2]?></td>
					<td><?php echo $item[3]?></td>
					<td><?php echo $item[4]?></td>
					<td><?php echo $item[5]?></td>
					<td><a onclick="return confirm('Are you want to delete?')" href="?username=<?php $del;?>">Delete</a></td>
				</tr>
			<?php			
					}
				}
			?>
		</table>
	</center>
</body>
</html>
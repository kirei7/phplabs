<?php
 include('../../inc.php');
 include('inc_tab.php');
 	

	session_start();
	
	if(!isset($_SESSION['success'])){
    	die(header("location: 404.php"));
	}

	$db = mysqli_connect($server, $user, $pwd, $dbase);
	  
	$res=mysqli_query($db,"SELECT * from $users");
	
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="main.css" type="text/css">
	<title>Document</title>
</head>
<body>
	<div class="menu">
			<a href="index.php">Головна</a>
			<a href="users.php">Користувачі</a>
			<a href="logout.php">Вихід</a>
		</div>
<div class="flex-table">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Id</th>
				<th>Ім'я</th>
				<th>Пошта</th>
			</tr>
		</thead>
		<tbody>
			<?php
		
				while ($row = $res->fetch_assoc()) {
					echo "<tr>";
				    echo " <th>" . $row['id'] . "</th>";
				    echo " <th>" . $row['name'] . "</th>";
				    echo " <th>" . $row['email'] . "</th>";
				    echo "</tr>";
				}	
			?>
		</tbody>
	</table>
	</div>
</body>
</html>
<style scope>
	.flex-table {
		display: flex;
	  	width: 100%;
	  	justify-content: center;
	  	margin-top: 200px;
	}
	table {
		width: 80%!important;
	}
</style>
<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="main.css" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>
<body>
		<div class="menu">
		<?php
			echo '<a href="index.php">Головна</a>';
			if(isset($_SESSION['success'])){
    			echo '<a href="users.php">Користувачі</a>';
    			echo '<a href="logout.php">Вихід</a>';
			} else {
				echo '<a href="view/registration.php">Реєстрація</a>';
			}
		?>
		</div>
		
		<h1 style="text-align: center;">Головна</h1>
</body>
</html>

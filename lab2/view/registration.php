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
	<div class="registration row">
		<form class="form-horizontal col m8 offset-m2 l8 offset-l2" action="../auth/register.php" method="POST">
		 <?php
			 if(!empty($_SESSION["wrong_name"])){ 
			    $wrong_name = $_SESSION["wrong_name"]; 
			    echo '<p class="bg-danger">'. $wrong_name .'</p>';
			 } 
		 ?>
		  <div class="form-group">
		    <label for="inputEmail3" class="control-label">Ім'я</label>
		    <div>
		      <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Ім'я" value="<?php echo $_SESSION["name"]; ?>">
		    </div>
		  </div>
		 <?php
			 if(!empty($_SESSION["wrong_email"])){ 
			   	$wrong_email = $_SESSION["wrong_email"]; 
			    echo '<p class="bg-danger">'. $wrong_email .'</p>';
			 } 
		 ?>
		  <div class="form-group">
		    <label for="inputEmail3" class="control-label">Пошта</label>
		    <div>
		      <input type="text" name="email" class="form-control" id="inputEmail3" placeholder="Пошта" value="<?php echo $_SESSION["email"]; ?>">
		    </div>
		  </div>
		  <?php
			 if(!empty($_SESSION["wrong_password"])){ 
			    $wrong_password = $_SESSION["wrong_password"]; 
			    echo '<p class="bg-danger">'. $wrong_password .'</p>';
			 }
		 ?>
		  <div class="form-group">
		    <label for="inputPassword3" class="control-label">Пароль</label>
		    <div>
		      <input type="password" name="password"  class="form-control" id="inputPassword3" placeholder="Пароль">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col offset-s5">
		      <button type="submit" class="btn btn-default  deep-purple lighten-1" style="margin: 10px 0;">Зареєструватись</button>
		    </div>
		  </div>
		</form>
		<div class="col m2 l2"></div>
	</div>
		<div class="login row">
			<form class="form-horizontal col m8 offset-m2 l8 offset-l2" action="../auth/login.php" method="POST">
			  <?php
				 if(!empty($_SESSION["wrong_login_email"])){ 
				    $wrong_login_email = $_SESSION["wrong_login_email"]; 
				    echo '<p class="bg-danger">'. $wrong_login_email .'</p>';
				 } else if(!empty($_SESSION["un_user"])){
				 	 $un_user = $_SESSION["un_user"]; 
			 	     echo '<p class="bg-danger">'. $un_user .'</p>';
			 	 }
			  ?>
			  <div class="form-group">
			    <label for="inputEmail3" class="control-label">Пошта</label>
			    <div>
			      <input type="text" name="email" class="form-control" id="inputEmail3" placeholder="Пошта" value="<?php echo $_SESSION["login_email"]; ?>">
			    </div>
			  </div>
			 <?php
				 if(!empty($_SESSION["wrong_login_password"])){ 
				    $wrong_login_password = $_SESSION["wrong_login_password"]; 
				    echo '<p class="bg-danger">'. $wrong_login_password .'</p>';
				 } else if(!empty($_SESSION["un_pass"])){
				 	 $un_pass = $_SESSION["un_pass"]; 
				     echo '<p class="bg-danger">'. $un_pass .'</p>';
				 }
			 ?>
			  <div class="form-group">
			    <label for="inputPassword3" class="control-label">Пароль</label>
			    <div>
			      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Пароль">
			    </div>
			  </div>
			  <div class="form-group" style="margin: 10px 0;">
			    <div class="col offset-s6 s6">
			      <button type="submit" class="btn btn-default deep-purple lighten-1" style="margin: 10px 0;">Війти</button>
			    </div>
			  </div>
			</form>
			<div class="col m2 l2"></div>
	</div>
	<div class="toggle row col m8 offset-m2 l8 offset-l2">
		<p class="bg-info" id="info-login">Вже маєте аккаунт? <button type="button" class="btn deep-purple lighten-1" onclick="logine()">Війти</button></p>
		<p class="bg-info" id="info-registration">Немає аккаунту? <button type="button" class="btn deep-purple lighten-1" onclick="register()">Зареєструватися</button></p>
		<div class="col m2 l2 "></div>
	</div>
	<script>
		let registration = document.getElementsByClassName('registration');
		let login = document.getElementsByClassName('login');
		let info_login = document.getElementById('info-login');
		let info_registration = document.getElementById('info-registration');
		function register(){
			registration[0].style.display = 'block';
			info_login.style.display = 'block';
			login[0].style.display = 'none';
			info_registration.style.display = 'none';
		}
		function logine(){
			registration[0].style.display = 'none';
			info_login.style.display = 'none';
			login[0].style.display = 'block';
			info_registration.style.display = 'block';
		}
	</script>
	<?php
		if(!empty($_SESSION["wrong_name"]) || !empty($_SESSION["wrong_email"]) || !empty($_SESSION["wrong_password"])){
			echo "<script>register();</script>";
			unset($_SESSION["wrong_name"]); 
			unset($_SESSION["wrong_email"]); 
			unset($_SESSION["wrong_password"]); 
			unset($_SESSION["name"]); 
			unset($_SESSION["email"]); 
		} else if(!empty($_SESSION["wrong_login_email"]) || !empty($_SESSION["wrong_login_password"]) || !empty($_SESSION["un_pass"]) || !empty($_SESSION["un_user"])){
			echo "<script>logine();</script>";
			unset($_SESSION["wrong_login_email"]); 
			unset($_SESSION["wrong_login_password"]); 
			unset($_SESSION["un_pass"]); 
			unset($_SESSION["un_user"]); 
			unset($_SESSION["email"]); 
		}
	?>
</body>
</html>
<style scope>
	.registration, .login {
		margin-top: 10%;
	}
	.bg-info {
		padding: 10px 20px;
		text-align: center;
		border-radius: 12px;
	}
	.bg-danger {
		padding: 5px 10px;
		text-align: center;
		border-radius: 12px;
	}

	.registration {
		display: none;
	}
	#info-login {
		display: none;
	}

</style>
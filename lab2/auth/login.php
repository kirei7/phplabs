<?php
	session_start();
	include('../../dbConnection.php');

	$db = mysqli_connect($server, $user, $pwd, $dbase);

	function check_email ($email){
	  if(!preg_match('|^[-0-9A-Za-z_\.]+@[-0-9A-Za-z^\.]+\.[a-z]{2,6}$|i',$email)){
	  	return false; 
	  	
	  } else {
	  	 return true;
	  }
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		 
		  if (empty($_POST["email"])){
	      	 $_SESSION["wrong_login_email"]="Поле 'пошта' обов'язкове для заповнення "; 
		  } else if(!check_email ($_POST["email"])){ 
			 $_SESSION["wrong_login_email"]="Неправильно вказана адреса електронної пошти"; 
			 $_SESSION["login_email"] = $_POST['email']; 
	 	  } else{
	 	  	 $_SESSION["login_email"] = $_POST['email']; 
	 		 $email = $_POST['email'];	
	 	  }
		
		  if (empty($_POST["password"])){
		    $_SESSION["wrong_login_password"]="Поле 'пароль' обов'язкове для заповення"; 
		    $_SESSION["login_email"] = $_POST['email']; 
		  } else {
		    $password = $_POST['password'];
		  }
		  
		  if(!empty($_SESSION["wrong_login_email"]) || !empty($_SESSION["wrong_login_password"])){
			header("Location: ../view/registration.php"); 
			exit;
		  }

		  $res = mysqli_query($db, "SELECT * FROM Users WHERE email='$email'");


			if ($res !== null){ 
				$row = $res->fetch_assoc();
 				if (password_verify($password , $row['password'])){ 
					$_SESSION['success'] = true;
					header("Location: ../index.php"); 	
					exit;
				} else { 	
						$_SESSION['un_pass'] = 'Неправильниа пошта або пароль';
						header("Location: ../view/registration.php"); 	
						exit;
				} 	
			} else { 	
					$_SESSION['un_user'] = 'Користувача не знайдено';
					header("Location: ../view/registration.php"); 	
					exit;	
				} 
		} else {
			header("Location: ../index.php"); 	
		}
	
?>
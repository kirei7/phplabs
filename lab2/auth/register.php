<?php
	include('../../dbConnection.php');
		
	$db = mysqli_connect($server, $user, $pwd, $dbase);
	session_start();


	function check_name ($name){
	  if(!preg_match("/[0-9a-z_]/i",$name)){
	  	return false; 
	  	
	  } else {
	  	 return true;
	  }
	}
	function check_email ($email){
	  if(!preg_match('|^[-0-9A-Za-z_\.]+@[-0-9A-Za-z^\.]+\.[a-z]{2,6}$|i',$email)){
	  	return false; 
	  	
	  } else {
	  	 return true;
	  }
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["name"])) {
			 $_SESSION["wrong_name"]="Поле 'ім'я' користувача обов'язкове для заповення"; 
		  } else if(!check_name ($_POST["name"])) { 
			 $_SESSION["wrong_name"]="Неправильно вказанe ім'я користувача"; 
			 $_SESSION["name"] = $_POST['name']; 
	 	  } else{
	 	  	 $_SESSION["name"] = $_POST['name']; 
	 		 $name = $_POST['name'];	
	 	  }
		
		  if (empty($_POST["email"])){
	      	 $_SESSION["wrong_email"]="Поле 'пошта' обов'язкове для заповнення "; 
		  } else if(!check_email ($_POST["email"])){ 
			 $_SESSION["wrong_email"]="Неправильно вказана адреса електронної пошти"; 
			 $_SESSION["email"] = $_POST['email']; 
	 	  } else{
	 	  	 $_SESSION["email"] = $_POST['email']; 
	 		 $email = $_POST['email'];	
	 	  }
		
		  if (empty($_POST["password"])){
		    $_SESSION["wrong_password"]="Поле 'пароль' обов'язкове для заповення"; 
		    $_SESSION["name"] = $_POST['name'];
		    $_SESSION["email"] = $_POST['email']; 
		  } else {
		    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		  }
		  
		  if(!empty($_SESSION["wrong_name"]) || !empty($_SESSION["wrong_email"]) || !empty($_SESSION["wrong_password"])){
			header("Location: ../view/registration.php"); 
			exit;
			}
			
			if ( mysqli_query($db,"INSERT INTO Users (name, email, password) VALUES (
				 '$name',
				 '$email',
				 '$password'
				 )") ) {
				 	$_SESSION["success"] = true;
				 	header("Location: ../index.php"); 
				 	
				} else {
					echo("Error : " . mysqli_error($db));
			}
	} else {
		header("Location: ../index.php"); 	
	}
	
	
?>
<?php
include('./init.php');
//session_start();
//	$connect_mysql=mysqli_connect("localhost","root","","signup");

/*	if(!$conn)
	{
	    alert("Erreur de Connexion");
	}*/

	$mail=$_POST['mai'];
	$password=$_POST['pwd'];
	$msg="";


	$result= $conn->query('SELECT * FROM user WHERE mail="'.$mail.'" AND password="'.$password.'" ');
	if ($result->rowcount() > 0) {
    // output data of each row
    	while($row = $result->fetch()) {

				$_SESSION["mail"] = $row['mail'];;
				$_SESSION["password"] = $row['password'];
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (20*3660) ;
				/*echo "<script type='text/javascript'>alert('$message');</script>";
				header("Location: Inc(Signin).php");*/
			}
				setcookie('mail', $_POST['mai'], time()+3660);
	            setcookie('password', $_POST['pwd'], time()+3660);

				header('location: index.php');
	}else{
				$message = "Invalid Username or Password!";
				header("Location:Sign in.php?msg=Invalid Username or Password!");
	}
			
?>
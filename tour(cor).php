<?php
include('./init.php');
//$connect_mysql=mysqli_connect("localhost","root","","signup");
if(isset($_POST['mai'],$_POST['pwd']))
{ 

	$mail=$_POST['mai'];
	$password=$_POST['pwd'];
	$msg="";
	$ret= $conn->query('SELECT * FROM user WHERE mail="'.$mail.'" AND password="'.$password.'" ');
			
			if($ret->rowcount()>0) {
               $row =  $ret->fetch();
				$_SESSION["mail"] = $mail;
				$_SESSION["password"] = $row[password];
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (20*3660) ;
				/*echo "<script type='text/javascript'>alert('$message');</script>";
				header("Location: Inc(Signin).php");*/
				
			}
			else{
				$message = "Invalid Username or Password!";
				header("Location: tour.php? Username ou Password invalide!");//(cor)
			}
		}
			if(isset($_SESSION["mail"])) {
				setcookie('mail', $_POST['mai'], time()+3660);
	            setcookie('password', $_POST['pwd'], time()+3660);
	            

				header('location: tour.php');
		}
?>

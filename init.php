<?php
session_start();
try{
 $conn = new PDO('mysql:host=localhost;dbname=signup;charset=utf8','root','');
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exeption $e){
die("Erreur de connexion "/*.$e->getMessage()*/);
}
if (!isset($_SESSION['mail']) and isset($_COOKIE['mail'], $_COOKIE['pass'])) 
{
	# code...
	$_COOKIE['mail'] = stripcslashes($_COOKIE['mail']);
	$var = $conn->prepare('SELECT password ,id from Users where mail="'.$_COOKIE['mail'].'"');
	$ver = $var->fetch();
	if ($var->rowcount()==1)
	 {
		
            $_SESSION['mail'] = $_COOKIE['mail'];
			$_SESSION['userid']= $ver['id'];
			
    }else{
   		   		
	 header("location: ./signout.php");	
	}
}
 ?>

<?php
include("./init.php");
/*
if(!isset($_SESSION['mail'])){
	//header("Location: " . WEB_URL . "sign in.php");
	header("Location: sign in.php");
	die();
}
*/

$msg = 'none';
$sql = '';
$xMsg = "No information Found";
require_once "bootstrap.php";
require_once "bootstrap1.php";
?> 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATS</title>
<?php
if(isset($_POST['mel']) && $_POST['mel'] != '')
{
	$mel = $_POST['mel'];
	//echo "salam - ".$mel;
	$var= $conn->query("SELECT count(id) as i FROM user WHERE mail = '".make_safe($_POST['mel'])."'");
	$b = $var->fetch();
	if ($b['i']>0) 
	{
		$sql= $conn->query("SELECT * FROM user WHERE mail = '".make_safe($_POST['mel'])."'");
        $a = $sql->fetch();
		//if($row = mysql_fetch_array($sql))
		//{
			//here success
			$xMsg = 'Check your Email Address for login details';
			$msg = 'block';
			//now send and email to user
			$to = trim($_POST['mel']);
				//$subject = $row_arr['email'] . ' User Login Details';
				$admin = "elhadjimordiallo@icloud.com";
				$subject = " Recuperation de Compte";
				$headers = "From: " . strip_tags($admin) . "\r\n";
				$headers .= "Reply-To: ". strip_tags($admin) . "\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				$message = '<html><body>';
				$message .= '<h1>User Login Information</h1>';
				$message .= '<div>Username : '.$_POST['mel'].'</div>';
				$message .= '<div>Password: '.$a['password'].'</div>';
				$message .= '</body></html>';
				echo $message;
				die();
				mail($to, $subject, $message, $headers);
				$ver = mail($to, $subject, $message, $headers);
				/*if ( mail($to, $subject, $message, $headers)) {
					# code...
					echo "Bravo les info";
				}else {
					# code...
					echo "erreur";
				}*/
				if (!$ver) {
					$errorMessage = error_get_last();
				}else {
					# code...
					echo "bravo !!";
				}
		   // }
	/*	}else{
			$msg = 'block';
		}*/
	}else {
		# code...
		echo "Cette adresse n'existe pas !!";
	}	
	
}
function make_safe($variable) 
{
   $variable = strip_tags(mysql_real_escape_string(trim($variable)));
   return $variable; 
}//else {
	# code...
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>ATS</title>

<?php require_once "bootstrap.php";?>
<?php require_once "bootstrap1.php";?>
<!-- BOOTSTRAP STYLES-->
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLES-->
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<!-- CUSTOM STYLES-->
<link href="assets/css/custom.css" rel="stylesheet" />
<!-- GOOGLE FONTS-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<div class="container">
  <br/><br/><br/><br/>
  <div class="row text-center ">
    <div class="col-md-12"><br/>
      <span style="font-size:35px;font-weight:bold;color:red;"></span> <span style="font-size:18px;">Formulaire de r&eacute;cup&eacute;ration de Compte</span></div>
  </div>
  <br/>
  <div class="row ">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
      <div style="margin-bottom:8px;padding-top:2px;width:100%;height:25px;background:#E52740;color:#fff; display:<?php //echo $msg; ?>" align="center"><?php// echo $xMsg; ?></div>
      <div class="panel panel-default" id="loginBox">
        <div class="panel-heading"> <strong> Mot de Pass oubli&eacute; </strong> </div>
        <div class="panel-body">
          <form onSubmit="return validationForm();" role="form" id="form" method="post">
            <br />
            <div class="form-group input-group"> <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
              <input type="text" name="mel" id="mel" class="form-control" placeholder="Your Email Address " />
            </div>
            
            <div class="form-group">
              <button style="width:100%;" type="submit" id="login" class="btn btn-primary">Submit</button>
            </div>
            <div class="form-group"> <a style="width:100%;" type="submit" id="login" class="btn btn-success" href="<?php //echo WEB_URL;?>sign in.php">Back To Login</a> </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

function validationForm(){
	if($("#mel").val() == ''){
		alert("Valid Email Required !!!");
		$("#mel").focus();
		return false;
	}else{
		return true;
	}
}
</script>
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<?php 
    // include('footer.php');
//}
?> 
</body>
</html>

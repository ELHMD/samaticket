<?php
include('./init.php');
if (isset($_GET['id'])) 
{
   $id = $_GET['id'];
  
    if(isset($_POST['name'], $_POST['password']))
    {
        $inscr =0;
        $user = stripslashes($_POST['name']);
        $mel = stripslashes($_POST['mel']);
        $password = stripslashes($_POST['password']);
        echo "user : ".$user;
        echo "<br> mel : ".$mel;
        echo "<br> pass : ".$password;
          $ver1 =  $conn->query('SELECT count(mail) as i from user where mail="'.$mel.'"');
          $m = $ver1->fetch();
          $n = $m['i'];
          echo "Nbre : ".$n;
          if($n>0)
          {
              
            $msg =  " Desole mais ce nom existe deja dans la base !!";
            $inscr=1; 
                header("location: Modif_cpt.php?id=$id&msg=$msg");
            
          }
          $s =strlen($password);
          if($s<8)
          {
              
            $msg =  " Le mot de pass doit contenir au moins 8caracteres !!";
            $inscr=1; 
                header("location: Modif_cpt.php?id=$id&msg=$msg");
            
          }
          
        if ($inscr==0) 
        {
            $mdp = $password;
           $ins = $conn->query('UPDATE user set 
          name="'.$user.'", 
          mail= "'.$mel.'", 
           password="'.$mdp.'" where mail="'.$id.'"');
           if ($ins) 
           {
             
             ?>
                  <script>
                       alert('Les modifications ont bien ete enregistrer !!');
                  </script>
            <?php
              header("location: signout.php");
           }else {
              $msg = "Une s'est produite lors de l'insertion !!";
              header("location: Modif_cpt.php?id=$id&msg=$msg");
           }
        }
      
    }else{
            $var = $conn->query("SELECT * FROM user where mail='".$id."'");
            $result = $var->fetch();
        
    ?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta charset="utf-8">
	<title>ATS</title>
	<?php require_once "bootstrap.php";?>
   <?php require_once "bootstrap1.php";?>
             <title>Modifications</title>
            <link rel="shortcut icon" href="../Images/logo.jpg">
            <style>
                body{
                    background-image:url(img/sen.jpg);
                    background-size: cover;
                    background-repeat: no-repeat;
                    height: 100vh;
                    background-position: 0px 0px, 50% 50%;
                }
                form{
                    background-color: black ;
                    color: white;
                    width: 40%;
                }
                td{
                    width: auto;
                }
                input{
                        margin-bottom: 10px;
                        margin-top: 5px;
                        color: black;
                        width:110%;
                    }
                    .tit{
                        background-color: black;
                        color: white;
                        height: 30px; 
                        font-family:'times new roman';
                        font-size: 20px;
                    }
            </style>
            </head>
        <body>
            <center>    
    <p style="height: 30%;">
     </p>
        <form action="" method="POST" >
            <div class="tit" > 
            Vous pouvez modifier vos informations:</div><br />
            <br>
            <div class="center">
                <table>
                    <tr>
                        <td> <label for="username">Nom & Prenom  :</label> </td>
                        <td> <input type="text" name="name" id="name" pattern="^([A-Z])([a-z]){3,}$"  minlength="3" required value="<?php echo htmlentities($result['name'], ENT_QUOTES, 'UTF-8'); ?>" /><br /> <br>
               </td>
                    </tr>
                    <tr>
                        <td> <label for="username">Nom d'utilisateur ( Email)  :</label></td>
                        <td><input type="text" name="mel" id="mel" value="<?php echo htmlentities($result['mail'], ENT_QUOTES, 'UTF-8'); ?>" /><br /> <br>
                </td>
                    </tr>
                    <tr>
                        <td> <label for="password">Mot de passe  :</label></td>
                        <td> <input type="text" name="password" id="password" value="<?php echo htmlentities($result['password'], ENT_QUOTES, 'UTF-8'); ?>" /><br /> <br>
</td>
                    </tr>
                </table>
               
                                <br />
                <div align="center"><input style="height: 40px;width: 50%;" type="image" src="./img/modifier.png">
            </div> <br>
            </div>
            <br>
            <?php
			    if(isset($_REQUEST["msg"])<>"")
			    {
			      echo 	"<h4>".$_REQUEST["msg"]."</h4>";
			    }
			 ?>
             <br>
        </form>
        

        <br> <br>
    </center>
    <?php
            }
}else{
    echo "Cet utilisateur n'existe pas !!";
}   
echo '<p style="height: 20%;"></p>';
echo '<center><div style="background-color: black;color: white;">';
include('./footer.php');
echo "</center></div>";
?>

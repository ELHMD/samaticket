<?php 
   include('./init.php');
if(isset($_SESSION['mail']))
{ 
   $mail = $_SESSION['mail'];
    //echo "mon mail es ".$mail;
    if(isset($_GET['id'],$_GET['cat']))
    {       
       $id = $_GET['id'];
       $cat = $_GET['cat'];
       echo "je suis ".$id." - ".$cat;
       if (isset($_POST['tit'],$_POST['cat'],$_POST['prix'],$_POST['nbr'])) 
       {
           $tit = htmlspecialchars(stripcslashes(mysql_real_escape_string($_POST['tit'])));
           $cat = htmlspecialchars(stripcslashes(mysql_real_escape_string($_POST['cat'])));
           $prix = htmlspecialchars(stripcslashes(mysql_real_escape_string($_POST['prix'])));
           $nbr = htmlspecialchars(stripcslashes(mysql_real_escape_string($_POST['nbr'])));
           $ver =  $conn->query("SELECT count(id_tick) as a,id_tick as n from ticket where id_event='".$id."' and cat_ticket='".$cat."' ");
                $b = $ver->fetch();
               $u = $b['a'];
               $c = $b['n'];
            if ($u==0) 
            {
                # code...

                $msg = "Cet evenement n'existe pas !! ";
                header("Location: Modif_cat.php?n=$id&cat=$cat&msg=$msg");
            }   
           $var =  $conn->query("SELECT count(id_event) as i from ticket where id_event='".$id."'");
            if ($var->rowcount()>0) 
            {
                //$a = $var->fetch();
                //$ = $v['type'];
                $in =  $conn->query("update ticket set cat_ticket='".$cat."', prix='".$prix."', nbre_place='".$nbr."' 
                                         where id_event='".$id."' and id_tick='".$c."' ");
                if ($in) 
                {
                    # code...
                    $msg = "Les Modifications reussi !! ";
                    header("Location: Modif_cat.php?n=$id&cat=$cat&msg=$msg");
                }else {
                    # code...
                    $msg = "Erreur, Probleme d'insertion des donnees !! ";
                    header("Location: Modif_cat.php?n=$id&cat=$cat&msg=$msg");
                }                         
        
            }else {
                # code...
                $msg = "Cet evenement existe deja dans la base !! ";
                header("Location: Modif_cat.php?n=$id&cat=$cat&msg=$msg");
            }
       }else {
           # code...
           $msg = "erreur d'insertion ";
           header("Location: Modif_cat.php?n=$id&cat=$cat&msg=$msg");
       }
    }else {
        # code...
       // echo "Les donnees ne sont pas arrivee";
       header('Location: modal.php');
    }
}else {
    # code...
    header('Location: modal.php');
}            
?>
<!DOCTYPE html>
            <html lang="fr">
            <head>
              <meta charset="UTF-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              
             <?php require_once "bootstrap.php";?>
            <?php require_once "bootstrap1.php";?>
</head>
<body>
	<?php require_once "navbar.php";?>


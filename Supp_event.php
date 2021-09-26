<?php
include('./init.php');
if (isset($_GET['n']))
{
  $id = $_GET['n'];
  //echo $id;
  $ver = $conn->query('SELECT count(id_event) as nbre from event where id_event="'.$id.'" ');
  $ver= $ver->fetch();
  if ($ver['nbre']>0)
 {
   if (isset($_POST['Drop']))
   {
        $var = $conn->query('DELETE from event where id_event="'.$id.'" ');
        if ($var)
        {

              $var1 = $conn->query('DELETE from ticket where id_event="'.$id.'" ');
              if ($var1)
              {
                      $var2 = $conn->query('DELETE from ventes where id_event="'.$id.'" ');
                      if ($var2)
                      {
                        $msg = "Suppression r&eacute;ssi !!"; 
                        header("Location: tour.php?msg=$msg");

                      }else {
                        # code...
                        $msg = "Une erreur de suppression des Ventes !";
                        header("Location: tour.php?msg=$msg");
                      }
              }else {
                # code...
                $msg = "Une erreur de suppression des tickets !";
            header("Location: tour.php?msg=$msg");
              }
        }else{
            $msg = "Une erreur de suppression de l'\Evenement !";
            header("Location: tour.php?msg=$msg");
        }
   }else{ 
    ?>
  <!DOCTYPE html>
  <html>
  <head>
  <meta charset="UTF-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>ATS</title>
             <?php require_once "bootstrap.php";?>
            <?php require_once "bootstrap1.php";?>
            <style>
              body{
                background-attachment: fixed;
         background-image: url('./img/even.jpg');
         background-size: 100% 100%;
         
              }
            </style>
  </head>
  <body>
    <center>
      <p style="height:50px;"></p>
      <form action="" method="POST">
        <fieldset style="width: 40%;background-color: black;">
          <div style="color: white;font-family: apple chancery;font-size: 28px;">Voulez-vous supprimer cet Evenement ?</div>
          <br />
           <div>
            <input type="hidden" name="Drop" value="true" />
            <input type="submit" value="Oui" /> 
            <input type="button" value="Non" onclick="javascript:history.go(-1);" />
          </div><br><br>
        </fieldset>
      </form>
    </center>
    <p style="height:400px;"></p>
  </body>
  </html>
    <?php
  }
 }else{
  echo "Cet Evenement a &eacute;t&eacute; supprim&eacute; ou n'existe pas ";
 }
}else{
  echo "Cet evenement n'est pas d&eacute;fini !!" ;
}
echo '<center><div style="background-color: black;color: white;">';
include('./footer.php');
echo "</center></div>";
?>
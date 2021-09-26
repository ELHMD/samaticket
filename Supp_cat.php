<?php
include('./init.php');
if (isset($_GET['n'],$_GET['cat']))
{
  $id = $_GET['n'];
  $cat = $_GET['cat'];
  //echo $id;
  $ver = $conn->query('SELECT count(id_event) as nbre from ticket where id_event="'.$id.'" and cat_ticket="'.$cat.'" ');
  $ver= $ver->fetch();
  if ($ver['nbre']>0)
 {
   if (isset($_POST['Drop']))
   {
        $var = $conn->query('DELETE from ticket where id_event="'.$id.'" and cat_ticket="'.$cat.'"');
        if ($var)
        {
             $var1 = $conn->query('DELETE from ventes where id_event="'.$id.'" and type_tic="'.$cat.'" ');
              if ($var1)
              {
                        $msg = "Suppression OK !!"; 
                        header("Location: tour.php?msg=$msg");
                     
              }else {
                # code...
                $msg = "Une erreur de suppression des Ventes de ticket !";
            header("Location: tour.php?msg=$msg");
              }
        }else{
            $msg = "Erreur de suppression du Ticket !";
            header("Location: tour.php?msg=$msg");
        }
   }else{ 
    ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>ATS</title>
    
	<?php require_once "bootstrap.php";?>
    <?php require_once "bootstrap1.php";?>
  </head>
  <body>
    <center>
      <p style="height:50px;"></p>
      <form action="" method="POST">
        <fieldset style="width: 50%;background-color: black;">
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
    <p style="height:100px;"></p>
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
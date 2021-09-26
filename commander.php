<?php 
 include('./init.php');
 if(isset($_GET['id'],$_GET['tic']))
 {
     $n = $_GET['id'];
     $tic =  $_GET['tic'];
     
     //echo "je suis :".$n;
     //echo "je suis :".$_SESSION['mail'];
   /*  if (isset()) 
     {
         # code...
     }else{ 
         */
?>   
<!DOCTYPE html>
  <html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATS</title>
	<?php require_once "bootstrap.php";?>
    <?php require_once "bootstrap1.php";?>
      <style>
          body{
              background-attachment: fixed;
              background-image: url('./img/back2.png');
              background-size: 100% 100%;
             

          }
          .champ{
              width : 30%;
          }
          form{
              width: 50%;
              background-color: white;
               opacity: 0.8;
          }
          table{
              margin-left: 5px;
          }
          td{
            width: 50%;
          }
          .champ{
              width: 80%;
          }
      </style>
  </head>
  <body>
 
 <div id="myModal" class="modal" style="display: block;">  
 <!--<div class="modal-content">--> 
     <p style="height: 30%;"> </p>
 <?php 
      $var = $conn->query('SELECT * from event where id_event="'.$n.'" ');
      $v = $var->fetch();
      $t = $v['titre_event'];
      $ver = $conn->query('SELECT * from ticket where id_event="'.$n.'" and cat_ticket="'.$tic.'" ');
      $m = $ver->fetch();
      $b = $m['prix'];
      $nbr = $m['nbre_place'];
      //echo "il y a  : ".$nbr;
      $ver1 = $conn->query('SELECT nbr_tic as n  from ventes where id_event="'.$n.'" and type_tic="'.$tic.'" ');
      $c=0;
      while($p = $ver1->fetch()){
          $c = $p['n']+ $c;
      }
      
      //echo "vente record de : ".$c;
      $r = $nbr - $c;
      //echo "il  reste : ".$r;
 ?>
    <div class="container">
    <center>
     <form action="commande_check.php?id=<?php echo $n;?>&tic=<?php echo $tic;?>" method="post">
         <div class="modal-header">
                            <span class="close" style="margin-top: -18px;">&times;</span>
                        <h2 style="font-size: 23px; text-align: center;">Veuillez faire vos commandes de Ticket <b><?php  echo $t;  ?></b></h2>
        </div> <br>
        <table>
            
            <tr>
               <td><span> Categorie de Ticket : </span> </td>
                <td><select name="cat" id="cat" class="champ">
                  <option  value="<?php echo $tic; ?>"><?php echo $tic; ?></option>
              </select></td>
            </tr>
            <tr style="height:20px;"> </tr>
            <tr>
                <td><span>Prix du Ticket :  </span> </td>
                <td><select name="prix" id="prix" class="champ">
                  <option  value="<?php echo $b; ?>"><?php echo $b; ?></option>
              </select></td>
            </tr>
            <tr style="height:20px;"> </tr>
            <?php
               if ($r>1) {
                   # code...
            ?>   
            <tr>
                <td><span>Place disponible :</span> </td>
                <td><select name="dispo" id="dispo" class="champ">
                  <option  value="<?php echo $r; ?>"><?php echo $r; ?></option>
              </select></td>
            </tr>
            <tr style="height:20px;"> </tr>
            <tr>
                <td><span>R&eacute;servation de Ticket :</span> </td>
                <td>
                    <input class="champ" type="number" name="nbr" id="nbr" min="1" required>
                </td>
            </tr>
            <tr style="height:20px;"> </tr>
            <tr>
                <td colspan="3"> <center>
                    <button class="big button w-button" style="background-color: black;" type="submit">Commander </button></center>
                </td>
               
            </tr>
            <?php
                }else {
                    ?>        
            <tr>
                 <td colspan="3"><span>D&eacute;sol&eacute; mais Aucune Place  n'est disponible !!! </span> </td>
            </tr>
            <?php
                }
                
            ?>
            
         </table>
               
                  <br>

     </form>
    </center>
   
    </div> 
  </div> 
</div>  
  </body>
  <?php

 }
  
  ?>
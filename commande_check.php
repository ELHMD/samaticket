<?php 
  include('./init.php');
  require_once "bootstrap.php";
require_once "bootstrap1.php";
if (isset($_GET['id'],$_GET['tic'])) {
   $n = $_GET['id'];
   $tic = $_GET['tic'];
   $mel = $_SESSION['mail'];
   //echo "n :".$n;
  // echo "<br>".$tic;
  //$ver = $conn->query('SELECT count(id_tic) as n from ventes where id_event="'.$n.'" ');
   $ver = $conn->query('SELECT count(id_tic) as n from ventes');
   $v = $ver->fetch();
   $i = $v['n']; 
   //echo "j'ai  i /".$i; 
   $i++;
   //echo "j'ai  i' /".$i; 
  if(isset($_POST['nbr']))
  {
     $cat = $_POST['cat'];
     $prix = $_POST['prix'];
     $nbr = $_POST['nbr'];
     $stat = "en cours";
     $dispo = $_POST['dispo'];
     //echo "j'ai /".$nbr;
     //echo "dispo /".$dispo;
     $u=0;
     $msg = "";
        if ($dispo < $nbr) {
            $msg = "Le nombre de ticket selectionne n'est pas disponible ";
           $u=1;
        }
        if ($u==0) {
            # code...
        
            $var = $conn->query('insert into ventes values(Null,"'.$n.'","'.$mel.'","'.$tic.'","'.$nbr.'","'.$prix.'","'.$stat.'")');
            if ($var) {
               // header("Location: ticket.php");
               if ($nbr>1) {
                ?> 
                    <script>
               //        alert("Vos Tickest ont bien ete reserves. Veuillez vous rapprocher de nos agents commerciaux pour regler la facture, Merci.  ");
                    </script>
                <?php 
               
               }else {
                   
               
               ?>
                <script>
                    alert("Votre Ticket a bien ete reserve. Veuillez vous rapprocher de nos agents commerciaux pour regler la facture, Merci.  ");
                  
                </script>
               <?php
                header("Location: qrcode.php?id=$mel&ev=$n&tic=$tic");
               }
            }else {
                echo "erreuuur de var";
            }
            
        }else {
            //header("Location: commander.php?id=$n&tic=$tic");
            echo "erreuuur de msg";
        }
  }else {
     // header("Location: commander.php?id=$n&tic=$tic");
     echo "erreuuur de nbr";
    }
}else {
    header('Location: tour.php');
}
?>
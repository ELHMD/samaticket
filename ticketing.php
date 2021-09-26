<?php
 include('./init.php');
 //echo "mon nom es ".$_SESSION['mail'];
 if(isset($_GET['id']))//,$_POST['pwd']
{ 
  $n = $_GET['id'];
  if (isset($_POST['titre'])) {
    # code...
  
   //echo "salam / ".$n;
   $msg= "";
	$titre =$_POST['titre'];
	$cat = stripslashes($_POST['cat']);
  $prix = $_POST['prix'];
  $nbr = $_POST['nbr'];
  $v =  $conn->query("SELECT count(id_tick) as i from ticket ");
      $m=$v->fetch();
      $a = $m['i'];
      $a ++;
      $e =  $conn->query("SELECT id_tick as i from ticket where id_event='".$n."' and cat_ticket='".$cat."' ");
      $f=$e->fetch();
      $o = $f['i'];
      //echo "var es ".$o;
if ($o>0) {
  $msg = "duplication";
  ?>   
      <script> //alert("Erreur !!!. Cette information est deja dans la base.  ");</script>
  <?php 
  header("Location: ticketing.php?id=$n&msg=$msg");
}else{ 
 // $var= $conn->query('INSERT INTO ticket VALUES("'.$n.'","'.$a.'","'.$cat.'","'.$prix.'","'.$nbr.'")');
	$var= $conn->query('INSERT INTO ticket VALUES("'.$n.'",Null,"'.$cat.'","'.$prix.'","'.$nbr.'")');
	if ($var) {
    $msg = "ok";
    header("Location: ticketing.php?id=$n&msg=$msg");
  }else {
    $msg= "Une erreur c'est produite lors de l'insertion des donnees ";
      header("Location: ticketing.php?id=$n&msg=$msg");
  }
} 
 
}else{ 
?>
<!DOCTYPE html> <script> alert </script>
<html>
<head>
	<meta charset="utf-8">
	<title>COLDPLAY</title>
	<?php require_once "bootstrap.php";?>
   <?php require_once "bootstrap1.php";?>
  <style>
    body{
         background-attachment: fixed;
         background-image: url('./img/band.png');
         background-size: 100% 100%;
         opacity: 0.8;
         color: black;
    }
      form{
          width: 50%;
          margin: 03%; 
          background-color: cyan;
          
      }

  </style>
</head>
<body>
<center> 
    <form action="" method="post">
           <legend style="font-family: impact;font-size: 28px;">Formulaire d'Evenement</legend>
        <div class="tour-date-row w-row">
        <?php
        if (isset($_GET['msg'])) {
          $g = $_GET['msg'];
        ?>
        <div class="tour-date-row w-row">
            <div class="w-col w-col-5">
              <div><label for="cat"></label></div>
            </div>
            <div class="w-col w-col-5">
              <div class="venue"> 
            <?php 
              if ($g == "ok") {  
                # code...
                ?>   
                <script> alert("Bravo!!,Les donnees ont bien ete inserees.  ");</script>
                <?php 
              }elseif ($g == "duplication") {
                ?>   
                <script> alert("Erreur !!!. Cette information est deja dans la base.  ");</script>
                <?php 
              }else{ 
                echo " ".$_GET['msg']; 
              }    
              ?>
              </div>
            </div>
        </div>
        <?php
             }
              ?>
            <div class="w-col w-col-5">
              <div><label for="titre"> Evenement :</label></div>
            </div>
            <div class="w-col w-col-5">
              <?php
                 $sel = $conn->query('select * from event where id_event="'.$n.'"');
                 $u = $sel->fetch();
              ?>
              <div class="venue">
                <select name="titre" id="titre">
                  <option value="<?php echo $u['titre_event']; ?>"><?php echo $u['titre_event']; ?></option>
                </select>
               <!--  <input type="text" name="" id="" required>-->
              </div>
            </div>
        </div> 
        <div class="tour-date-row w-row">
            <div class="w-col w-col-5">
              <div><label for="cat">Categorie de ticket :</label></div>
            </div>
            <div class="w-col w-col-5">
              <div class="venue"><input type="text" name="cat" id="cat" style="width: 200px;" required></div>
            </div>
        </div>    
        <div class="tour-date-row w-row">
            <div class="w-col w-col-5">
              <div><label for="prix">Prix  :</label></div>
            </div>
            <div class="w-col w-col-5">
              <div class="venue"><input type="number" style="width: 200px;" name="prix" id="prix" min="0" required></div>
            </div>
        </div> 
        <div class="tour-date-row w-row">
            <div class="w-col w-col-5">
              <div><label for="places">Places reserv&eacute;es :</label></div>
            </div>
            <div class="w-col w-col-5">
              <div class="venue">
                <input type="number" name="nbr" id="nbr" min="0" style="width: 200px;" required>
              </div>
            </div>
        </div>
        <div class="tour-date-row w-row" >
            <div class="w-col w-col-5">
              <div><label for="artiste">  </label></div>
            </div>
            <div class="w-col w-col-5">
              <div class="venue">
                  <input style="width: 100%;height: 30px;" type="submit" value="Ajouter">
                  </div>
            </div>   
        </div>       
         
</form>
<?php   
                     
                     $b =  $conn->query("SELECT count(id_tick) as i from ticket where id_event='".$n."'  ");
                     $p=$b->fetch();
                     $c = $p['i'];
                     if ($c>0) 
                     {
                       ?>
    <div class="tour-date-row w-row" >
           <div class="w-col w-col-5">
             <div><label for="artiste">  </label></div>
           </div>
           <div class="w-col w-col-5">
                 <div class="venue">
                   <a href="tour.php">
                     <button style="width: 100%;height: 50px;background-color:white ;color:black;"> Terminer </button>
                  </a>
                 </div>
           </div>   
           <div class="w-col w-col-5">
             <div><label for="artiste">  </label></div>
           </div>
    </div>       
                       <?php
                     }
              ?>
</center>
<?php
  }
}else {
   echo "La connexion a echouee !!!!";
}
?>
</body>
<html>  
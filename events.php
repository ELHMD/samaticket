<?php
 include('./init.php');
 //echo "mon nom es ".$_SESSION['mail'];
 if(isset($_POST['titre']))//,$_POST['pwd']
{ 

	$titre =$_POST['titre'];
	$lieu = $_POST['lieu'];
  $dat = $_POST['dat'];
  $art = $_POST['art'];
  $v =  $conn->query("SELECT count(id_event) as i from event ");
      $n=$v->fetch();
      $a = $n['i'];
      $a ++;
      //echo "num est ".$a;
     // echo "------Je suis ".	$titre."--- ".$lieu."----". $dat."-----".$art;
  
      
	//$msg="";
	$var= $conn->query('INSERT INTO event VALUES("'.$a.'","'.$titre.'","'.$art.'","'.$dat.'","'.$lieu.'")');
	if ($var) {
    header("Location: ticketing.php?id=$a");
  }else {
    //echo "Erreur d'insertion";
    header('Location: tour.php');
  }
}else {
  
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ATS</title>
	<?php require_once "bootstrap.php";?>
   <?php require_once "bootstrap1.php";?>
  <style>
    body{
         background-attachment: fixed;
         background-image: url('./img/gtn.jpg');
         background-size: 100% 100%;
         opacity: 0.8;
         color: black;
    }
      form{
          width: 50%;
          margin: 03%; 
          background-color: white;
          
      }

  </style>
</head>
<body>
<center> 
    <form action="" method="post">
           <legend style="font-family: impact;font-size: 28px;">Formulaire d'Evenement</legend>
        <div class="tour-date-row w-row">
            <div class="w-col w-col-5">
              <div><label for="titre">Titre Evenement :</label></div>
            </div>
            <div class="w-col w-col-5">
              <div class="venue"><input type="text" name="titre" id="titre" required></div>
            </div>
        </div> 
        <div class="tour-date-row w-row">
            <div class="w-col w-col-5">
              <div><label for="lieu">Lieu Evenement :</label></div>
            </div>
            <div class="w-col w-col-5">
              <div class="venue"><input type="text" name="lieu" id="lieu" required></div>
            </div>
        </div>    
        <div class="tour-date-row w-row">
            <div class="w-col w-col-5">
              <div><label for="date">Date Evenement :</label></div>
            </div>
            <div class="w-col w-col-5">
              <div class="venue"><input type="date" style="width: 180px;" name="dat" id="dat" required></div>
            </div>
        </div> 
        <div class="tour-date-row w-row">
            <div class="w-col w-col-5">
              <div><label for="artiste">Artistes Evenement :</label></div>
            </div>
            <div class="w-col w-col-5">
              <div class="venue">
                  <textarea name="art" id="art" cols="25" rows="5" required></textarea>
              </div>
            </div>
        </div>
        <div class="tour-date-row w-row" >
            <div class="w-col w-col-5">
              <div><label for="artiste">  </label></div>
            </div>
            <div class="w-col w-col-5">
              <div class="venue">
                <input style="height: 40px;" type="image" src="./img/button.png">
             </div>
            </div>   
        </div>
         
    
    </form>
</center>
<?php
}
?>
</body>
<html>  
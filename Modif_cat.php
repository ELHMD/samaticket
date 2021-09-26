<?php 
   include('./init.php');
if(isset($_SESSION['mail']))
{ 
   $mail = $_SESSION['mail'];
    //echo "mon mail es ".$mail;
    if(isset($_GET['n'],$_GET['cat']))
    {       
       $id = $_GET['n'];
       $cat = $_GET['cat'];
       //echo "je suis ".$id;
      $var =  $conn->query("SELECT * from ticket as t, event as e  where e.id_event=t.id_event and t.id_event='$id'");
        if ($var->rowcount()>0) 
        {
            $a = $var->fetch();
            //$ = $v['type'];
?>
            <!DOCTYPE html>
            <html lang="fr">
            <head>
              <meta charset="UTF-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>ATS</title>
             <?php require_once "bootstrap.php";?>
            <?php require_once "bootstrap1.php";?>
            <style type="text/css">
  <?php 
                if(isset($_SESSION['mail']))
                    {
                         include "modal.css";
                    }
                    else{
                      include "modal1.css";
                    }
    ?>

body{
  color: white;
}
.nav-bar {
    background-color: transparent;
}
.w-container {
    margin-left: auto;
    margin-right: auto;
    max-width: 940px;
}
#nav{
	background-color: transparent;
}
.logo{
	padding-top: 8px;
}
.w-nav {
    position: relative;
    background: #dddddd;
    z-index: 1000;
}
.w-nav-brand {
    position: relative;
    float: none;
    text-decoration: none;
    color: #333333;
}
.w-nav-overlay {
    position: absolute;
    overflow: hidden;
    display: none;
    top: 100%;
    left: 0;
    right: 0;
    width: 100%;
}
body {

  background-image: url(img/music.png);
    background-size: cover;
    overflow: scroll;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

.content-wrapper {
    margin-top: 78px;
}
.w-container {
    margin-left: auto;
    margin-right: auto;
    max-width: 940px;
}
.page-title {
    margin-top: 0px;
    margin-bottom: 86px;
    font-size: 36px;
    line-height: 51px;
    font-weight: 300;
    text-align: center;
    text-transform: uppercase;
}
.footer {
    padding-top: 43px;
    padding-bottom: 43px;
    background-color: transparent;
    color: #222;
    text-align: center;
}
.venue-list-item {
    padding-top: 5px;
    padding-bottom: 5px;
    border-top: 1px solid hsla(0, 0%, 100%, .3);
    border-bottom: 1px solid hsla(0, 0%, 100%, .3);
}
@media screen and (max-width: 991px){

	.w-container {
    max-width: 728px !important;
	}	
	.w-nav[data-collapse="medium"] .w-nav-menu {
	    display: none;
	}
	.nav-menu {
    padding-top: 18px !important;
    padding-bottom: 18px !important;
    border-top: 1px solid #000 !important;
    background-color: rgba(0, 0, 0, .85) !important;
	}
	
	.w-container {
    max-width: 728px !important;
	}
	.logo{
	padding-top: 8px !important;
	width: 10% !important;
	}
}

@media (max-width: 767px){
	

	.logo{
	padding-top: 8px !important;
	width: 10% !important;
	}
}

@media screen and (max-width: 479px){
	.w-container {
	    max-width: none !important;
	}	
	.logo{
	padding-top: 8px !important;
	width: 10% !important;
	}
}

#a{
    color: #2675ae;
    text-decoration: none;
}
.new{
  margin-top: 16px;
    padding: 15px 20px;
    text-align: center;
}
.head{
  
  text-align: center;
}
.login{

  margin: 0 auto;
    width: 340px;
}
label{
  color: #0e0e0f;
}
.bd1{

  background-color: transparent;
    font-size: 14px;
    padding: 20px;
}
.btn-primary {
    background-color: #2675aed9;
}
form label {
    display: block;
    margin-bottom: 7px;
}
input{
  margin-bottom: 5px;
    /*/margin-top: 5px;*/
}
.label-link{
  margin-left: 7em;
}
.form-control{
  background-color: #ffffffc2;
}
#p{
  color: black;

}
legend{
  color: white;
  font-size: 28px;
}
form{
  width: 40%;
}
input, textarea{
  color: black;
}
input{
  width: 250%; 
  height: 25px;
}
.list {
    padding-top: 5px;
    padding-bottom: 5px;
    border-top: 1px solid hsla(0, 0%, 50%, .3);
    border-bottom: 1px solid hsla(0, 0%, 50%, .3);
}

</style>
            </head>
 <body>
	<?php require_once "navbar.php";?>           
<center>
  <form action="Modif_cat_ctrl.php?id=<?php echo $id; ?>&cat=<?php echo  $cat; ?>" method="post">  
     <Legend>Formulaire  de Modification</Legend>
     <div class="w-dyn-items">
   <div class="list">
      <div class="tour-date-row w-row">
            
            <div class="w-col w-col-4">
              <div class="venue"><span>Titre de l'Evénement : </span></div>
            </div>
            <div class="w-col w-col-3">
              <div><input type="text" name="tit" id="tit" required value="<?php   echo $a['titre_event']; ?>" >
            </div>
            </div>
            <div class="w-col w-col-2">
               
            </div>
      </div>
    </div>
</div>   

<div class="w-dyn-items">
   <div class="list">
      <div class="tour-date-row w-row">
            
            <div class="w-col w-col-4">
              <div class="venue"><span>Cat&eacute;gorie : </span></div>
            </div>
            <div class="w-col w-col-3">
              <div><input type="text" name="cat" id="cat" required value="<?php  echo $a['cat_ticket']; ?>"></div>
            </div>
            <div class="w-col w-col-2">
               
            </div>
      </div>
    </div>
  </div>   
  <div class="w-dyn-items">
   <div class="list">
      <div class="tour-date-row w-row">
            
            <div class="w-col w-col-4">
              <div class="venue" ><span>&nbsp;&nbsp;Prix :  </span></div>
            </div>
            <div class="w-col w-col-3">
              <div><input type="number" name="prix" id="prix" required value="<?php  echo $a['prix']; ?>"></div>
            </div>
            <div class="w-col w-col-2">
               
            </div>
      </div>
    </div>
  </div>   
  <div class="w-dyn-items">
   <div class="list">
      <div class="tour-date-row w-row">
            
            <div class="w-col w-col-4">
              <div class="venue"><span>Nombre de place :  </span></div>
            </div>
            <div class="w-col w-col-3">
              <div>
                  <input type="number" name="nbr" id="nbr" required value="<?php  echo $a['nbre_place']; ?>">
              </div>
            </div>
            <div class="w-col w-col-2">
               
            </div>
      </div>
    </div>
  </div>   
  <div class="w-dyn-items">
   <div class="list">
      <div class="tour-date-row w-row">
            
            <div class="w-col w-col-4">
              <div class="venue"><span> </span></div>
            </div>
            <div class="w-col w-col-3">
              <div>
              <input style="height: 40px;" type="image" src="./img/modifier.png">
            </div>
            </div>
            <div class="w-col w-col-2">
               
            </div>
      </div>
    </div>
  </div>   

  <div class="w-dyn-items">
   <div class="list">
      <div class="tour-date-row w-row">
        <?php
			    if(isset($_REQUEST["msg"])<>"")
			    {
			      echo 	"<h4 class='inc'>".$_REQUEST["msg"]."</h4>";
			    }
			 ?>
      </div>
    </div>
 </div>
   
  </form>
</center>
<?php   

 require_once "footer.php";

         }else {
            header('Location: tour.php');
         }
    }     
    
}else {
   echo "Veuillez vous connecter svp! ";
}     
?>
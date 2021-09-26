<?php
include('./init.php');
if (isset($_GET['id'],$_GET['n'])) 
{
   $id =  $_GET['id'];
   $n = $_GET['n'];
   //echo "I am : ".$id."--".$n;
   $mel = $_SESSION['mail'];
   $sql = $conn->query("select * from ventes as v , event as e where v.mail='".$_SESSION['mail']."' and v.id_event='".$id."' and v.id_tic='".$n."' ");
    $a = $sql->fetch();
   if (isset($_POST['tit'],$_POST['type'],$_POST['nbr'])) 
   { 
       $type= $_POST['type'];
       $nbr = $_POST['nbr'];
       $tit = $_POST['tit'];
       echo $type."-".$tit."-".$nbr;
       $ver = $conn->query("select nbre_place as n, SUM(nbr_tic) as s from ventes as v , ticket as t where v.id_event='".$id."' and v.type_tic='".$type."' ");
       $u = $ver->fetch();
       echo "il y a ".$u['n']." places";
       echo "vente : ".$u['s'];
       $ver1 = $conn->query("select prix as p from ticket where id_event='".$id."' and cat_ticket='".$type."' ");
       $q = $ver1->fetch();
       echo "prix : ".$q['p'];
       $d = $u['n'] - $u['s'];
       if ($nbr > $d )
       {
           # code...
           $msg = "Le nombre de ticket demander n'est pas dispo !!";
           header("Location: Modif_tic.php?id=$id&n=$n");
       }
       //$var = $conn->query("update ventes set  ");
   }else {
?>
 
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>ATS</title>
	<?php require_once "bootstrap.php";?>
  <?php require_once "bootstrap1.php";?>
  
<style type="text/css">
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
  margin-bottom: 15px;
    margin-top: 5px;
    color: black;
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
select{
    color: black;
}
</style>
</head>

<body>
	<?php require_once "navbar.php";?>

    <center>
        <form action="" method="post">
            <div class="w-dyn-items">
              <div class="venue-list-item w-dyn-item">
                    <div class="tour-date-row w-row">
                        <div class="w-col w-col-2">
                          <div></div>
                        </div>
                        <div class="w-col w-col-5">
                           <div class="venue"><?php  echo $a['titre_event'];  ?></div>
                        </div>
                        <div class="w-col w-col-3">
                          <div>
                              <select name="tit" id="tit">
                                  <option value="<?php  echo $a['titre_event'];  ?>"><?php  echo $a['titre_event'];  ?></option>
                              </select>
                          </div>
                        </div>
                           <div class="w-col w-col-2">
                        </div>
                    </div>
                </div>
            </div>   
            <div class="w-dyn-items">
              <div class="venue-list-item w-dyn-item">
                    <div class="tour-date-row w-row">
                        <div class="w-col w-col-2">
                          <div></div>
                        </div>
                        <div class="w-col w-col-5">
                           <div class="venue">Categorie ticket : </div>
                        </div>
                        <div class="w-col w-col-3">
                            <div>
                              <select name="type" id="type" require>
                                  <option value="">choisir ticket</option>
                                  <?php
                                  $sql1 = $conn->query("select cat_ticket as c from ticket where id_event='".$id."' ");
   
                                     while ($b=  $sql1->fetch()) 
                                     {
                                       ?>
                                       <option value="<?php  echo $b['c'];  ?>"><?php  echo $b['c'];  ?></option>
                                    <?php  
                                     }
                                  ?>
                              </select>
                            </div>
                        </div>
                           <div class="w-col w-col-2">
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-dyn-items">
              <div class="venue-list-item w-dyn-item">
                    <div class="tour-date-row w-row">
                        <div class="w-col w-col-2">
                          <div></div>
                        </div>
                        <div class="w-col w-col-5">
                           <div class="venue">Nombre ticket : </div>
                        </div>
                        <div class="w-col w-col-3">
                            <div>
                              <input type="number" min="1" name="nbr" id="nbr" placeholder="<?php  echo $a['nbr_tic'];  ?>" require>
                            </div>
                        </div>
                           <div class="w-col w-col-2">
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-dyn-items">
              <div class="venue-list-item w-dyn-item">
                    <div class="tour-date-row w-row">
                        <div class="w-col w-col-2">
                          <div></div>
                        </div>
                        <div class="w-col w-col-5">
                           <div class="venue"> </div>
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

        </form>
    </center>
</body>    
<?php
   }
}else {
    # code...
    header("Location: Listes.php");
}
//echo "salam";
?>
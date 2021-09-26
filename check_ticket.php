<?php 
include('./init.php');
$mel = $_SESSION['mail'];
    
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
    color: white;
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
    color: white;
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

table{
  position: relative;
  width: 90%;
  border: 2px;
  font-family: apple chancery;
    font-size: 20px;
}
tr{
    height: 30px;
}
#tit{
    font-family: apple chancery;
    font-size: 24px;
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
        <div class="tour-date-row w-row">
            <div class="w-col w-col-5">
              <div><label for="titre">Titre Evenement :</label></div>
            </div>
            <div class="w-col w-col-1">
              <div class="venue">
                  <select name="titre" id="titre" required>
                      <option value="">Choisir un Event</option>
                      <?php 
                           $sql = $conn->query("select distinct(titre_event) as t from event ");
                           if ($sql->rowcount()>0) 
                           {
                               # code...
                               while ($a = $sql->fetch()) {
                                   # code...
                                   ?>
                                   <option value="<?php echo $a['t']; ?>"><?php echo $a['t']; ?></option>
                                   <?php
                               }
                           }
                      ?>
                  </select>
                </div>
            </div>
        </div> 
        <div class="tour-date-row w-row">
            <div class="w-col w-col-5">
              <div><label for="titre">Categorie Ticket :</label></div>
            </div>
            <div class="w-col w-col-1">
              <div class="venue">
                 <select name="cat" id="cat" required>
                      <option value="">Choisir un Ticket</option>
                      <?php 
                           $sql1 = $conn->query("select distinct(cat_ticket) as c from ticket ");
                           if ($sql->rowcount()>0) 
                           {
                               # code...
                               while ($b = $sql1->fetch()) {
                                   # code...
                                   ?>
                                   <option value="<?php echo $b['c']; ?>"><?php echo $b['c']; ?></option>
                                   <?php
                               }
                           }
                      ?>
                  </select>
                </div>
            </div>
        </div> 
        </form>
    </center>
</body>    
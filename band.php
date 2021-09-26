<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>ATS</title>
    <?php include "session.php";?>
	<?php require_once "bootstrap.php";?>

<style type="text/css">
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

    background: linear-gradient(30deg,#000,#535050);
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
    font-size: 45px;
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
p {
    margin-bottom: 10px;
    line-height: 24px;
    font-weight: 300;
    padding-left: 5px;
    padding-right: 5px;
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

</style>
</head>

<body>
	<?php require_once "navbar.php";?>
	<div class="content-wrapper w-container">
    <h1 class="page-title">
     <font style="vertical-align: inherit; font-family: sans-serif;">
        <font style="vertical-align: inherit; background: linear-gradient(to right,#E20D13, #F0E300, #A4C615, #4363AB,#BE4A94,#E30922);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
        Pr&eacute;sentation
       </font>
    </font></h1>
    <div class="w-richtext">
    	<p>
			Africa Technologie & Services(ATS) est un Site S&eacute;n&eacute;galais specilisé en Evenementiel et vente de Ticket.
            ATS est une vitrine artistique et de marketing réservée aux acteurs culturels voulant se produire via un Evenement,
            le site met à leur dispositiont une palette de d'Evenement accessible depuis l'accueil du site par le biais d'une liste.
            
            Chaque Evenement dispose du boutton "Ticket" qui permet au client d'acceder à la liste des tickets disponible pour ainsi faire la commande.
            <br> <br>   
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis obcaecati nihil totam, blanditiis eos numquam, 
            accusantium dignissimos placeat deleniti error ipsum necessitatibus quaerat maxime quia et omnis fugit voluptatem magni!
		</p>
	</div>
  </div>
  <?php require_once "footer.php";?>
</body>
</html>
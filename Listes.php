<?php 
include('./init.php');
$mel = $_SESSION['mail'];
   $sql = $conn->query("select * from ventes where mail='".$_SESSION['mail']."' group by type_tic order by id_event DESC ");
    
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

</style>
</head>

<body>
    
	<?php require_once "navbar.php";?>
    <center>
    <table>
        <tr>
            <th colspan="5" id="tit">
                  <center>Liste des Commandes de Tickets</center>
            </th>
        </tr>
        <tr>
            <th>Num</th>
            <th>Evenement</th>
            <th>Categorie tic</th>
            <th>Nbre</th>
            <th>Etat</th>
        </tr>
    <?php 
    $i = $sql->rowcount();
        if ($sql->rowcount()>0) {
            # code...
            while ($s = $sql->fetch())
            {

                ?>  
                <tr>
                    <td> <?php echo $i; ?>  </td>
                    <td>
                    <?php 
                        $l = $conn->query("select titre_event as a, date_event as d from event where id_event='".$s['id_event']."' ");
                        $b = $l->fetch();
                        echo $b['a'];
                     ?>    
                    </td>
                    <td>  <?php echo $s['type_tic'];   ?> </td>
                    <td><?php echo $s['nbr_tic']; ?></td>
                    <td>
                        <?php 
                        $now = time();
                        //echo "i am : ".$now;
                        //echo " time : ".strtotime($b['d']);
                        $dif = strtotime($b['d']) - $now ;
                        //echo "j'ai : ".$dif;
                          if (($s['statut']=="en cours") && ($dif > 0)) 
                          {
                              # code...
                              echo $s['statut'];
                          }else { 
                              # code...
                              echo "Non Valide";
                         }
                           
                        ?>
                    </td>
                    <?php 
                            if ($s['statut']=="en cours") 
                                {
                                    # code...
                           
                     ?> 
                      <td>
                           
              <a href="Modif_tic.php?id=<?php echo $s['id_event']; ?>&n=<?php echo $s['id_tic']; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg> 
              </a>  
            
              <a href="Supp_tic.php?n=<?php echo $s['id_event']; ?>"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                   <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                   <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>
              </a>
                    </td>
                     <?php               
                                }
                    ?>
                    
                   
                </tr>
                 <?php 
                 $i --;
            }
        }else {
            # code...
            ?>
            <tr>
                <td colspan="5"> <center>Aucun evenement !!</center> </td>
            </tr>
             <?php 
        }
        
    ?>

            

    </table>
    
</center>


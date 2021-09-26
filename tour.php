<?php 
  include('./init.php');
       //$connect_mysql=mysqli_connect("localhost","root","","signup");
  if(isset($_SESSION['mail']))
   { 
       $mail = $_SESSION['mail'];
        //echo "mon mail es ".$mail;
        $var =  $conn->query("SELECT type from user where mail='$mail'");
        if ($var->rowcount()>0) {
          # code...
          $v = $var->fetch();
          $n = $v['type'];
        }
        
   }     
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
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

</style>
</head>

<body>
	<?php require_once "navbar.php";?>
	<div class="content-wrapper w-container">
    <h1 class="page-title">
      <font style="vertical-align: inherit;background: linear-gradient(to right,#E20D13, #F0E300, #A4C615, #4363AB,#BE4A94,#E30922);-webkit-background-clip: text;-webkit-text-fill-color: transparent;/* color: transparent; */">
         <font style="vertical-align: inherit;  font-family: sans-serif;">
                 <!-- WE'RE COMING TO YOUR CITY! --> Bienvenue dans notre Site !!
        </font>
      </font>
    </h1>
  </div>
  <br>
    <div class="w-dyn-items"><div class="venue-list-item w-dyn-item">
          <div class="tour-date-row w-row">
            <div class="w-col w-col-2">
               <div></div>
            </div>
            <div class="w-col w-col-5">
              <div class="venue">  
  
                     <?php
			    if(isset($_REQUEST["msg"])<>"")
			    {
			      echo 	"<h4>".$_REQUEST["msg"]."</h4>";
			    }
			 ?>

               </div>
            </div>
            <div class="w-col w-col-3">
              <div></div>
            </div>
            <div class="w-col w-col-2">
              
            </div>
        </div>
    </div>

  <div class="w-dyn-list" style="text-align: center;">
  <?php 
  if(isset($_SESSION['mail']))
  { 
        if($n=="admin")
        {
          ?>    
    <div class="w-dyn-items"><div class="venue-list-item w-dyn-item">
          <div class="tour-date-row w-row">
            <div class="w-col w-col-2">
               <div><a href="events.php"><button class="rsvp-button w-button" onclick="form()">Ajouter Events</button></a></div>
            </div>
            <?php 
             $sql = $conn->query("select count(id_tic) as id from ventes where mail='".$_SESSION['mail']."'");
             $s = $sql->fetch();
             $i = $s['id'];
             if ($i>0) {
               # code...
           
          ?>
            <div class="w-col w-col-5">
              <div class="venue"> 
              <a href="Listes.php"><button class="rsvp-button w-button" onclick="form()">My Events</button></a>
              </div>
            </div>
            <?php 
             }
          ?>
            <div class="w-col w-col-3">
              <div>
              <a href="check_ticket.php"><button class="rsvp-button w-button" onclick="form()">Etat Ticket</button></a>
              </div>
            </div>
            <div class="w-col w-col-2">
              
            </div>
        </div>
    </div>
          <?php  
        }
      } 
   
   $v =  $conn->query("SELECT * from event order by id_event desc ");
    if ($v->rowcount()>0) 
    {
      while ($a=$v->fetch()) {
            # code...
         
    ?>
      <div class="w-dyn-items">
        <div class="venue-list-item w-dyn-item">
          <div class="tour-date-row w-row">
            <div class="w-col w-col-2">
              <div><?php  echo $a['lieu_event']; ?></div>
            </div>
            <div class="w-col w-col-5">
              <div class="venue"><?php  echo $a['titre_event']; echo " le ".$a['date_event']; ?></div>
            </div>
            <div class="w-col w-col-3">
              <div><?php  echo $a['acteur_event']; ?></div>
            </div>
            <div class="w-col w-col-2">
            <?php
                 if (isset($_SESSION['mail'])) {
                   # code...
            
            ?>
                <a href="modal.php?n=<?php echo $a['id_event']; ?>&id=<?php echo $_SESSION['mail']; ?>">  
                 <button class="rsvp-button w-button"> Tickets</button>
              </a>

               <?php 
                     if($n=="admin")
                     {
               ?>
              <a href="Modif_event.php?n=<?php echo $a['id_event']; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg> 
              </a>  
            
              <a href="Supp_event.php?n=<?php echo $a['id_event']; ?>"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                   <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                   <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>
              </a>
            
                <?php
                    }
                 }else{
                   # code...
            
            ?>
      <button class="rsvp-button w-button" onclick="op()" > Tickets</button>
      <?php
                 }
                   # code...
            
            ?>
            </div>
      </div>
    </div>
  </div>      
  <?php   
           //$_REQUEST['b'] = $a['id_event'];
 
      }
    }else {
      ?>  
        <div class="w-dyn-items"><div class="venue-list-item w-dyn-item">
          <div class="tour-date-row w-row">
                 <div class="w-col w-col-2">
                    <div>    </div>
                 </div>
                 <div class="w-col w-col-5">
                   <div class="venue" style="font-family: times; font-size: 28px;"><center> Aucun Evenement est en attente</center> </div>
                </div>
                <div class="w-col w-col-3">
                  <div>       </div>
                </div>
                <div class="w-col w-col-2">
                 </div>         </div>
               </div>
          </div>     
      <?php
    }
  ?>
<?php 
                if(isset($_SESSION['mail']))
                    {
                         include "modal.php";
                    }
                    else{
                      include "modal1.php";
                    }
                    //Le Formulaire
                  /*  if(isset($_SESSION['mail']))
                    {
                         include "events.php";
                    }/*
                    else{
                      include "modal1.php";
                    }*/
    ?>

<!-- The Modal -->
  <?php require_once "footer.php";?>

<script>
// Get the modal
var modal = document.getElementById('myModal');
// Le Formulaire
var form = document.getElementById('myform');

// Get the button that opens the modal
//var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
function op() {
  modal.style.display = "block";
}
//Le Formulaire
function form() {
  form.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
//Le Formulaire
/*
span.onclick = function() {
  form.style.display = "none";
}
*/

</script>
<script type="text/javascript">
  $(document).ready(function(){

var quantitiy=0;
   $('.quantity-right-plus').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
            
            $('#quantity').val(quantity + 1);

            var t=Number(document.getElementById("quantity").value);
            var r=Number(document.getElementById("quantty").value);
            document.getElementById("myText").value=t*4000+r*9000;

          
            // Increment
        
    });

     $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
      
            // Increment
            if(quantity>0){
            $('#quantity').val(quantity - 1);
            }

            var t=Number(document.getElementById("quantity").value);
            var r=Number(document.getElementById("quantty").value);
            document.getElementById("myText").value=t*4000+r*9000;
    });
    
});
</script>

<script type="text/javascript">
  $(document).ready(function(){

var quatiy=0;
   $('.quantity-right-plus1').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quanity = parseInt($('#quantty').val());
        
        // If is not undefined
            
           
           $('#quantty').val(quanity + 1);
            var t=Number(document.getElementById("quantity").value);
            var r=Number(document.getElementById("quantty").value);
            document.getElementById("myText").value=t*4000+r*9000;

          
            // Increment
        
    });

     $('.quantity-left-minus1').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantty').val());
        
        // If is not undefined
      
            // Increment
            if(quantity>0){
            $('#quantty').val(quantity - 1);
            }
            var t=Number(document.getElementById("quantity").value);
            var r=Number(document.getElementById("quantty").value);
            document.getElementById("myText").value=t*4000+r*9000;
    });
    
});
</script>
<script>
function che()
{
  var to=Number(document.getElementById("myText").value);
  if(to>0){
    document.getElementById("tic").click();
  }
  else{
    alert("Total amount should be greater than 0");
  }
}
</script>
</body>
</html>
<?php
      try{
        $conn = new PDO('mysql:host=localhost;dbname=signup;charset=utf8','root','');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       }catch(Exeption $e){
       die("Erreur de connexion "/*.$e->getMessage()*/);
       }
       if (!isset($_SESSION['mail']) and isset($_COOKIE['mail'], $_COOKIE['pass'])) 
       {
         # code...
         $_COOKIE['mail'] = stripcslashes($_COOKIE['mail']);
         $var = $conn->prepare('SELECT password ,id from Users where mail="'.$_COOKIE['mail'].'"');
         $ver = $var->fetch();
         if ($var->rowcount()==1)
          {
           
                   $_SESSION['mail'] = $_COOKIE['mail'];
             $_SESSION['userid']= $ver['id'];
             
           }else{
                     
          header("location: ./signout.php");	
         }
       }

     if (isset($_GET['id'],$_GET['n'])) 
   {
       $i = $_GET['n'];
       $mel =$_GET['id'];
      
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
  
  </head>
  
  
<div id="myModal" class="modal" style="display: block;">
<?php
      $var = $conn->query('SELECT * from event where id_event="'.$i.'" ');
      $v = $var->fetch();
      $t = $v['titre_event'];
   ?>
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close" style="margin-top: -18px;">&times;</span>
      <h2 style="font-size: 23px; text-align: center;">Choisir vos ticket <b><?php  echo $t;  ?></b></h2>
    </div>
    
    <div class="container">
  <?php
       
        $ar =  $conn->query("SELECT type from user where mail='$mel'");
      if ($ar->rowcount()>0) {
        # code...
        $v = $ar->fetch();
        $t = $v['type'];
      }
         
      $ver = $conn->query('SELECT * from ticket  where id_event="'.$i.'" ');
      $n =$ver->rowcount();
      //echo "je suis : ".$n."mail : ".$mel."num :".$i;
      if ($n>0) 
      {
        while ($a = $ver->fetch()) 
        {
        //echo $a['ticket1'];
   ?>
    <div class="jumbotron">
        <div class="row">
          <div class="col-sm-8">
            <span><?php  echo $a['cat_ticket'];  ?></span><br>
            <span> <?php  echo $a['prix'];  ?> Fcfa</span>
            <span>Ce tickets permet d'acceder au loge <?php  echo $a['cat_ticket'];  ?></span>
          </div>
          <div class="col-sm-4">
              <div class="input-group" id="mod">
              <!--        <span class="input-group-btn">
                    <button type="button" class="quantity-left-minus btn btn-number" style="width: 50px;" data-type="minus" data-field="">
                      <span class="glyphicon glyphicon-minus"></span>
                    </button>
                  </span>
        
                  <input type="text" id="quantity" name="quantity" class="form-control input-number" style="margin-top: 0px; height: 32px; margin-bottom: 0px; width: 100%; float: none;  text-align: center;" value="0" min="0" max="10" disabled="">
                  <span class="input-group-btn">
                     <button type="button" class="quantity-right-plus btn btn-number" style="width: 50px;" data-type="plus" data-field="">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                  </span>
              -->
              <a href="commander.php?id=<?php echo $i;?>&tic=<?php  echo $a['cat_ticket'];  ?>">
                  <button class="big button w-button" style="background-color: black;" >commander</button>
              </a>
              <?php 
                     if($t=="admin")
                     {
               ?>
              <a href="Modif_cat.php?n=<?php echo $a['id_event']; ?>&cat=<?php  echo $a['cat_ticket'];  ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg> 
              </a>            
              <a href="Supp_cat.php?n=<?php echo $a['id_event']; ?>&cat=<?php  echo $a['cat_ticket'];  ?>"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                   <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                   <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>
              </a>
              <?php 
                    }
               ?>
              
              </div>
          </div>
        </div>
    </div>
<?php 
  }
 }else {
?>
  <div class="jumbotron">
     <div class="row">
     <div class="col-sm-8">
           <center> <span>Cette evenement ne compte pas encore de Ticket !!</span></center>
     </div>
  
<?php
 // echo "i am :".$i;
     $r = $conn->query('SELECT * from user where mail="'.$mel.'" ');
     $w = $r->fetch();
     $l = $w['type'];
     if ($l=="admin") {
      ?>
      
         <div class="col-sm-4">
              <a href="ticketing.php?id=<?php  echo $i;  ?>">
                 <button class="big button w-button" style="background-color: black;">Ticketing</button>
              </a>
         </div>
    
      
    <?php
     }
 }
     
echo '<center><div style="background-color: black;color: white;">';
include('./footer.php');
echo "</center></div>";
  ?>
  </div>
    </div>  
      <!--
      <div class="jumbotron">
        <div class="row">
          <div class="col-sm-8">
            <span>GA Phase I</span><br>
            <span> 4000.00 Taka</span>
            <span>GA Phase 1 tickets are General Admission tickets into the Arena</span>
          </div>
          <div class="col-sm-4">
              <div class="input-group" id="mod">
                  <span class="input-group-btn">
                    <button type="button" class="quantity-left-minus btn btn-number" style="width: 50px;" data-type="minus" data-field="">
                      <span class="glyphicon glyphicon-minus"></span>
                    </button>
                  </span>
                  <input type="text" id="quantity" name="quantity" class="form-control input-number" style="margin-top: 0px; height: 32px; margin-bottom: 0px; width: 100%; float: none;  text-align: center;" value="0" min="0" max="10" disabled="">
                  <span class="input-group-btn">
                    <button type="button" class="quantity-right-plus btn btn-number" style="width: 50px;" data-type="plus" data-field="">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                  </span>
              </div>
          </div>
        </div>
      </div>
      <div class="jumbotron">
        <div class="row">
            <div class="col-sm-8">
              <span>VIP Phase I</span><br>
              <span>9000.00 Taka</span>
              <span>VIP Phase 1 tickets give you entry into the VIP Section at the Arena. VIP section includes front of stage viewing, dedicated bars and toilets.</span>
            </div>
            <div class="col-sm-4">
              <div class="input-group" id="mod">
                  <span class="input-group-btn">
                    <button type="button" class="quantity-left-minus1 btn btn-number" style="width: 50px;" data-type="minus" data-field="" onclick="">
                      <span class="glyphicon glyphicon-minus"></span>
                    </button>
                  </span>
                  <input type="text" id="quantty" name="quanty" class="form-control input-number" style="margin-top: 0px; height: 32px; margin-bottom: 0px; width: 100%; float: none;  text-align: center;" value="0" min="0" max="10" disabled="">
                  <span class="input-group-btn">
                    <button type="button" class="quantity-right-plus1 btn btn-number" style="width: 50px;" data-type="plus" data-field="" onclick="">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                  </span>
              </div>
            </div>
        </div>
      </div>
    </div>

    

    <div class="modal-footer">
      <div class="row" id="fot">
        <div class="col-sm-8">
            <span class="final-prize">Total  Taka</span>
            <input type="text" id="myText" value="0" disabled size="6">
        </div>
        <div class="col-sm-4">
          <div class="proceed-button">
                <button class="btn3" id="bt" onclick="che()">Proceed</button>
                <a href="ticket.php" id="tic"></a>
          </div>
        </div>
      </div>
    </div>
-->
  </div>
</div>


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
<?php
    
   }

  ?>
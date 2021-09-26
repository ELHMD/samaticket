
<div class="nav-bar w-nav" id="nav" data-animation="default" data-collapse="medium" data-contain="1" data-duration="400">
        <div class="w-container">   
            <a class="brand-link w-nav-brand w--current" href="index.php">
                <img class="logo" src="logo1.png" style="width: 5%">
            </a>
            
            <nav class="nav-menu w-nav-menu" role="navigation" style="transform: translateY(0px) translateX(0px);">
                <a style="width: 5%;"> </a>
                <a style="width: 5%;"> </a>
                <a class="nav-link w-nav-link" href="band.php">Presentation</a>
                <a class="nav-link w-nav-link" href="videos.php">Videos</a>
                <a class="nav-link w-nav-link" href="tour.php">Ticket Concert </a>
                <?php 
                if(isset($_SESSION['mail']))
                    {
                         echo '<a class="nav-link w-nav-link" href="signout.php">Deconnecter</a>'; 
                    }
                    else{
                    echo '<a class="nav-link w-nav-link" href="Sign in.php">Login</a>';
                    }
                ?>
                 <?php 
                
                if(isset($_SESSION['mail']))                 
                    {
                        $mel = $_SESSION['mail'];
                        echo '<a class="nav-link w-nav-link" href="Modif_cpt.php?id='.$mel.'">Parametre</a>'; 
                    }
                    
                ?>
             </nav>
                
            <div class="menu-button w-clearfix w-nav-button">
                <div class="menu-text">MENU</div>
                <div class="menu-icon w-icon-nav-menu"></div>
            </div>
        </div>
        <div class="w-nav-overlay" data-wf-ignore="" style="display: none;"></div>
</div>

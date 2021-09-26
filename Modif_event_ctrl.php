<?php   
 include('./init.php');
if (isset($_GET['id'])) {
    # code...
    $id = $_GET['id'];
    //echo $id;
    if (isset($_POST['tit'])) {
        # code...
        $tit= mysql_real_escape_string(stripslashes($_POST['tit']));
        $lieu =  mysql_real_escape_string(stripslashes($_POST['lieu']));
        $dat = mysql_real_escape_string(stripslashes($_POST['dat']));
        $act = mysql_real_escape_string(stripslashes($_POST['act']));
        //echo $tit;
        $ver =  $conn->query('SELECT count(distinct(id_event)) as i from event where id_event="'.$id.'" and titre_event="'.$tit.'"  
            and date_event="'.$dat.'" ');
            $inscr = 0;
            $a = $ver->fetch();
            $n= $a['i'];

        if ($n>0) 
        {
            //ver->rowcount()
            
           $msg = "Cette evenement est deja reserver ";
           header("Location: Modif_event.php?n=$id&msg=$msg");
            $inscr=1;
        }
        if ($inscr==0) 
        {
            $var =  $conn->query('update event set  titre_event="'.$tit.'", acteur_event="'.$act.'",date_event="'.$dat.'", 
            lieu_event="'.$lieu.'" where id_event="'.$id.'" ');
            if ($var) 
            {
                # code...
                $msg = "Insertion réussie !!";
                header("Location: Modif_event.php?n=$id&msg=$msg");
            }
        }
        
    }else {
        # code...
        header("Location: Modif_event.php?n=$id");
    }
}else {
    # code...
    header("Location: sign in.php");
}
 ?>
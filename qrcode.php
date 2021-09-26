<?php    
include('./init.php');
/*
 * PHP QR Code encoder
 *
 * Exemplatory usage
 *
 * PHP QR Code is distributed under LGPL 3
 * Copyright (C) 2010 Dominik Dzienia <deltalab at poczta dot fm>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */
require_once "bootstrap.php";
require_once "bootstrap1.php";
?> 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATS</title>
    <style>
         body{
              background-attachment: fixed;
              background-image: url('./img/bac.jpg');
              background-size: 100% 100%;
            }
            h1{
                color: white;
            }
    </style>
</head>
<body>
 <?php
    if (isset($_GET['id'],$_GET['tic'],$_GET['ev'])) 
    {
        # code...
        $mel = $_GET['id'];
        $t = $_GET['tic'];
        $e = $_GET['ev'];
        $ver = $conn->query('SELECT titre_event as n from event where id_event="'.$e.'" ');
        $v = $ver->fetch();
        $i = $v['n']; 
        echo '<p style="height: 40px;"> </p>';
        echo "<h1><center>Event QR Code ".$i." </center></h1><hr/>";
    
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';
    
    include "./phpqrcode/qrlib.php";    
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.'test.png';
    
    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = $_REQUEST['level'];    

    $matrixPointSize = 4;
   // if (isset($_REQUEST['size']))
   $_REQUEST['size'] = 8;
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);


    //if (isset($_REQUEST['data'])) { 
            //it's very important!
            $_REQUEST['data'] = $mel." - ".$t;
        if (trim($_REQUEST['data']) == '')
            die('donnees ne doit pas etre vide !! ');
        $var = $conn->query('SELECT count(id_tic)  as m, id_tic as a from ventes where id_event="'.$e.'" and mail="'.$mel.'" and type_tic="'.$t.'"');
        $p = $var->fetch();
        $o = $p['m']; 
        $a = $p['a'];   
        // user data
        //$filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
       $filename = $PNG_TEMP_DIR.'qr-'.$e.'-'.$t.'-'.$mel.'-'.$a.'_'.$o.'.png';
       $var1 = $conn->query('SELECT id_tic as a,nbr_tic as y from ventes where id_event="'.$e.'" and mail="'.$mel.'" and type_tic="'.$t.'"');
       
       $b = $var1->rowcount();
       //echo "j'ai ".$b;
        if ($b>0) 
        {   
            # code...
           while ($c =  $var1->fetch() ) 
           {
                # code...
                $n = $c['a'];
                $d = $c['y'];
            //    echo "salam ".$n.'-'.$d;
                //$filename = $PNG_TEMP_DIR.'qr-'.$e.'-'.$t.'-'.$mel.'-'.$n.'.png';
                $filename = $PNG_TEMP_DIR.'qr-'.$e.'-'.$t.'-'.$mel.'-'.$n.'-'.$d.'.png'; 
               // echo $filename.'<br>';
              //display generated file
                QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2); 
                echo '<center><img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/></center>';
               //echo '<center><img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/></center>'; 
           }
        }else {
                    # code...
                    echo "Aucune vente n'a ete realise sur ce ticket";
        }
       ?> 
       <script>
           alert("Veuillez vous rapprocher de nos agents pour la confirmation de vos tickets ");
       </script>
       <?php 
     //   QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    //} else {    
    
        //default data
       // echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>';    
    //    QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
   // }    
        
    
    #Mine
    //mail('elhadjimordiallo1@gmail.com', 'This is a test subject line', 'The complete body of the message', null, '-elhadjimordiallo@icloud.com'); 
  
    // benchmark
    //QRtools::timeBenchmark();    

}else{
    header("Location: tour.php");
}

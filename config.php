<?php
// $host = "127.0.0.1";
// $username = "root";
// $pass = "";
// $db = "wiyata";
$host = "ini-undangan.online";
$username = "iniunda1_rexyst";
$pass = "tjVfEZXLm3";
$db = "iniunda1_wp203";
$siteurl = "http://127.0.0.1/kpri/";
$author = "RAMA";

$con = mysqli_connect($host, $username, $pass, $db);

// start main function
if($con) {
    ?>
    
    <?php
    ;}
    else {
        ?>
        <script type="text/javascript">
        alert("Error 503: Service Unavailable");
        </script>
        <?php
        ;
    }
    
    $cekdatabase = mysqli_select_db($con , $db) ;
    if($cekdatabase) {
        ?>
        
        <?php
        ;}
        else {
            ?>
            
            <script type="text/javascript">
            alert("Error 503: Service Unavailable");
            </script>
            <?php
            ;
        } 
        //   end main function
        
?> 
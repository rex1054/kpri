<?php
$siteurl;
$host;
$domain = $_SERVER['SERVER_NAME'];
if($domain == '127.0.0.1'){
    $siteurl = 'http://'.$domain.'/kpri'.'/';
    $host = "ini-undangan.online";
} else {
    $siteurl = 'https://'.$domain.'/';
    $host = "localhost";
}

$username = "iniunda1_rexyst";
$pass = "tjVfEZXLm3";
$db = "iniunda1_wp203";
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
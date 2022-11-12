<?php
$siteurl;
$host;
$domain = $_SERVER['SERVER_NAME'];
if($domain == '127.0.0.1'){
    $siteurl = 'http://'.$domain.'/kpri'.'/';
    $host = "soj.my.id";
} else {
    $siteurl = 'https://'.$domain.'/';
    $host = "localhost";
}

$username = "sojy3165_kpri";
$pass = "qIwp7B]rq7^m";
$db = "sojy3165_kpri";
$author = "RAMA";
// Vomi_3FCRXYt ftp

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
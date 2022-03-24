<?php
$host = "127.0.0.1";
$username = "root";
$pass = "";
$db = "kpri_wiyata";
$siteurl = "http://127.0.0.1:80/kpri/";

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
<?php
require('../../../config.php');
if(isset($_POST['get_option']))
{
    $state = $_POST['get_option'];
    
    if($state == ''){
        echo ': Data Tidak Ditemukan.';
    }
    else {
        
        $getakun = "SELECT `nama` FROM `akun` WHERE nip = ".$state;
        $getData = $con->query($getakun);
        if($getData->num_rows == 0) {
            echo "Tidak ada data untuk ditampilkan.";
        }
        else {
            $data = $getData->fetch_assoc();
            echo ': '.$data['nama'];
        }
    }
}
?>
<?php
require('../../../config.php');
if(isset($_POST['get_option']))
{$state=$_POST['get_option'];    
    if($state == ''){
        echo 'Data Tidak Ditemukan.';
    }
    else {        
        $getakun = "SELECT akun.nama, akun.hp, instansi.instansi FROM akun join instansi on akun.instansi = instansi.id WHERE akun.nip = ".$state;
        $getData = $con->query($getakun);
        if($getData->num_rows == 0) {
            $returnArr = ["Data tidak ditemukan!", "000000000000", "Data tidak ditemukan!"];    
            echo json_encode($returnArr);
        }
        else {
            $data = $getData->fetch_assoc();

            $returnArr = [$data['nama'], $data['hp'], $data['instansi']];    
            echo json_encode($returnArr);
        }
    }
}
?>
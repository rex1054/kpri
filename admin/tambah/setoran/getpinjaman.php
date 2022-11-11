<?php
require('../../../config.php');
if(isset($_POST['get_option']))
{$state=$_POST['get_option'];    
    if($state == ''){
        echo 'Data Tidak Ditemukan.';
    }
    else {        
        $getakun = "SELECT setor_pinjam.* FROM ajuan
        JOIN peminjaman ON peminjaman.id_ajuan = ajuan.id
        JOIN setor_pinjam ON setor_pinjam.id_peminjaman = peminjaman.id
        WHERE ajuan.peminjam = ".$state." ORDER BY ajuan.id DESC LIMIT 1";
        $getData = $con->query($getakun);
        if($getData->num_rows == 0) {
            $returnArr = ["0", "0", "000000000000", "000000000000"];    
            echo json_encode($returnArr);
        }
        else {
            $data = $getData->fetch_assoc();

            $returnArr = [$data['ke']+1, $data['dari'], $data['pokok'], $data['jasa']];    
            echo json_encode($returnArr);
        }
    }
}
?>
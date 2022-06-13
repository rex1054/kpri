<?php
require_once('config.php');
$sql = "SELECT nip, ktp_suami, ktp_istri, foto_3x4 FROM akun";

$query = $con->query($sql);
if($query->num_rows == 0) { echo "Data tidak ditemukan."; }
else {
    if(mysqli_num_rows($query)>0) { 
        while ($data = mysqli_fetch_array($query)) {
            $sqla = "UPDATE `akun` SET `ktp_suami`='".$data['nip']."_KTP_SUAMI.jpg',`ktp_istri`='".$data['nip']."_KTP_ISTRI.jpg',`foto_3x4`='".$data['nip']."_3x4.jpg' WHERE `nip` = ".$data['nip'];
            $querya = $con->query($sqla);
            echo $querya." : ".$sqla." <br/>";
        }
    }
}
?>
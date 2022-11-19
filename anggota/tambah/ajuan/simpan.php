<?php
session_start();
require("../../../config.php");
// info dasar
$nip = $_SESSION['nip'];
$tanggal = date("Y-m-d");
$jenis = $_POST['jenis'];
$jumlah = $_POST['jumlah'];
$tempo = $_POST['tempo'];
$penghasilan = $_POST['penghasilan'];
$status = 5;

$sql = 'INSERT INTO `ajuan`(`peminjam`, `tanggal`, `jenis`, `jumlah`, `tempo`, `penghasilan`, `status`) VALUES ('.$nip.',"'.$tanggal.'",'.$jenis.','.$jumlah.','.$tempo.','.$penghasilan.', '.$status.')';

if($con->query($sql)){
    ?>
<script>alert('Berhasil menyimpan data.');window.open('<?php echo $siteurl; ?>anggota/ajuan/', '_SELF');</script>
<?php
} else {
    echo $sql;
    ?>
<script>alert('Gagal menyimpan data.');window.open('<?php echo $siteurl; ?>anggota/ajuan/', '_SELF');</script>
<?php
}
?>
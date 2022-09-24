<?php
require_once('../../../config.php');

$status = $_POST['status'];
$level = $_POST['level'];
$nama = $_POST['nama'];
$nip = $_POST['nip'];
$kelamin = $_POST['kelamin'];
$tempatLahir = $_POST['tempat-lahir'];
$tgl = $_POST['tanggal-lahir'];
$tanggal = date_create($tgl);
$tanggalLahir = date_format($tanggal,"Y-m-d");
$alamatRumah = $_POST['alamat-rumah'];
$pos = $_POST['pos'];
$hp = $_POST['hp'];
$instansi = $_POST['instansi'];
$alamatInstansi = $_POST['alamat-instansi'];
$idInstansi = 0;

echo "status = ".$status."<br/>";
echo "level = ".$level."<br/>";
echo "nama = ".$nama."<br/>";
echo "nip = ".$nip."<br/>";
echo "kelamin = ".$kelamin."<br/>";
echo "tempatLahir = ".$tempatLahir."<br/>";
echo "tanggalLahir = ".$tanggalLahir."<br/>";
echo "alamatRumah = ".$alamatRumah."<br/>";
echo "pos = ".$pos."<br/>";
echo "hp = ".$hp."<br/>";
echo "instansi = ".$instansi."<br/>";
echo "alamatInstansi = ".$alamatInstansi."<br/>";

$sqla = "SELECT * FROM instansi WHERE instansi = '".$instansi."'";
$query = $con->query($sqla);
$hasila = $query->fetch_assoc();
if($query->num_rows == 0) {
  $sqlb = 'INSERT INTO instansi(instansi, alamat) VALUES ("'.$instansi.'","'.$alamatInstansi.'")';
  if($con->query($sqlb)){
    $sqlc = "SELECT * FROM instansi WHERE instansi = '".$instansi."'";
    $queryb = $con->query($sqlc);
    $hasilc = $queryb->fetch_assoc();
    $idInstansi = $hasilc['id'];
  }
} else {
    $idInstansi = $hasila['id'];
}


$sql = 'UPDATE akun SET nama="'.$nama.'", kelamin='.$kelamin.', tempat_lahir="'.$tempatLahir.'", tanggal_lahir="'.$tanggalLahir.'", alamat="'.$alamatRumah.'", pos='.$pos.', hp='.$hp.', instansi='.$idInstansi.', status='.$status.', jabatan='.$level.' WHERE nip = '.$nip;

echo $sql;
if($con->query($sql)){
    ?>
    <script>alert("Berhasil memperbarui data."); window.open("<?php echo $siteurl."admin/profil"; ?>", "_SELF");</script>
    <?php
} else {
    ?>
    <script>alert("Gagal memperbarui data."); window.open("<?php echo $siteurl."admin/profil"; ?>", "_SELF");</script>
    <?php
}

?>
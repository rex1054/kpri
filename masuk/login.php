<?php
session_start();
require_once("../config.php");
if(isset($_POST['username']) && isset($_POST['sandi'])) {
  $nip = $_POST['username'];
  $sandi = $_POST['sandi'];
} else {
  ?>
  <script>
  console.log("Identitas belum diisi.");
  var z = confirm("Identitas belum diisi.");
  if (z == true) {
    window.open('<?php echo $siteurl; ?>', '_SELF');
  }
  else {
    window.open('<?php echo $siteurl; ?>', '_SELF');
  }
  </script>
  <?php
}

$sql = "SELECT akun.nip, 
akun.nama,
kelamin.kelamin,
akun.sandi,
akun.tempat_lahir,
akun.tanggal_lahir,
akun.alamat,
akun.pos,
akun.hp,
instansi.instansi, 
instansi.alamat as 'alamat_instansi',
akun.ktp_suami,
akun.ktp_istri,
akun.foto_3x4,
status_akun.status,
jabatan.jabatan 
FROM akun join kelamin on akun.kelamin = kelamin.id join status_akun on akun.status = status_akun.id join jabatan on akun.jabatan = jabatan.id join instansi on akun.instansi = instansi.id where akun.nip =".$nip;
$query = $con->query($sql);
$hasil = $query->fetch_assoc();
if($query->num_rows == 0) {
  ?>
  <script>
  console.log("NIP belum terdaftar, silahkan melakukan registrasi terlebih dahulu.");
  var z = confirm("NIP belum terdaftar, silahkan melakukan registrasi terlebih dahulu.");
  if (z == true) {
    window.open('<?php echo $siteurl; ?>', '_SELF');
  }
  else {
    window.open('<?php echo $siteurl; ?>', '_SELF');
  }
  </script>
  <?php
} else {
  if($sandi <> $hasil['sandi']) {
    ?>
    <script>
    console.log("Kata sandi salah, silahkan periksa ulang data anda.");
    var z = confirm("Kata sandi salah, silahkan periksa ulang data anda.");
    if (z == true) {
      window.open('<?php echo $siteurl; ?>', '_SELF');
    }
    else {
      window.open('<?php echo $siteurl; ?>', '_SELF');
    }
    </script>
    <?php
  } else {
    $_SESSION['nama'] = $hasil['nama'];
    $_SESSION['nip'] = $hasil['nip'];
    $_SESSION['jenis-kelamin'] = $hasil['kelamin'];
    $_SESSION['tempat-lahir'] = $hasil['tempat_lahir'];
    $_SESSION['tanggal-lahir'] = $hasil['tanggal_lahir'];
    $_SESSION['alamat-rumah'] = $hasil['alamat'];
    $_SESSION['kode-pos'] = $hasil['pos'];
    $_SESSION['no-hp'] = $hasil['hp'];
    $_SESSION['instansi'] = $hasil['instansi'];
    $_SESSION['alamat-instansi'] = $hasil['alamat_instansi'];
    $_SESSION['ktp-suami'] = $hasil['ktp_suami'];
    $_SESSION['ktp-istri'] = $hasil['ktp_istri'];
    $_SESSION['ft3x4'] = $hasil['foto_3x4'];
    $_SESSION['jabatan'] = $hasil['jabatan'];
    
    switch($hasil['jabatan']){
      case 'Admin':
        ?>
        <script>window.open('<?php echo $siteurl.'admin/'; ?>', '_SELF');</script>
        <?php
        break;
        case 'Anggota':
          ?>
        <script>window.open('<?php echo $siteurl.'anggota'; ?>', '_SELF');</script>
          <?php
          break;
          case 'Pimpinan':
            ?>
        <script>window.open('<?php echo $siteurl.'pimpinan'; ?>', '_SELF');</script>
            <?php
            break;
            default:
            
            break;
          }
          
        }
      }
      ?>
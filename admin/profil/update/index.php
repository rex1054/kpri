<?php
include('../../../config.php');
session_start();
if(isset($_SESSION['nip'])){} else {header('location:'.$siteurl); }
$fullName = explode(" ", $_SESSION['nama']);
$nick = $fullName[0];

$data;

$sql = "SELECT akun.nama, akun.nip, kelamin.kelamin, akun.tempat_lahir, akun.tanggal_lahir, akun.alamat, akun.pos, akun.hp, instansi.instansi, instansi.alamat as alamat_instansi, akun.ktp_suami, akun.ktp_istri, akun.foto_3x4, status_akun.status, jabatan.jabatan, akun.gabung FROM akun join kelamin on akun.kelamin = kelamin.id join instansi on akun.instansi = instansi.id join status_akun on akun.status = status_akun.id join jabatan on akun.jabatan = jabatan.id WHERE akun.nip = ".$_SESSION['nip'];

$query = $con->query($sql);
if($query->num_rows == 0){
  ?>
<script>
alert("Data Tidak Ditemukan");
window.open('<?php echo $siteurl; ?>admin', '_SELF')
</script>
<?php
} else {
  $data = $query->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Nama -->
    <title>KPRI Wiyata Usaha</title>

    <!-- fav-icon -->
    <link rel="icon" type="image/png" href="<?php echo $siteurl; ?>assets/logo.png">

    <!-- meta -->
    <meta name="description" content="Sistem Informasi Simpan Pinjam">
    <meta name="author" content="<?php echo $author; ?>">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <!-- style -->
    <link href="<?php echo $siteurl; ?>assets/css/main.css" rel="stylesheet">
    <link href="<?php echo $siteurl; ?>assets/css/admin/main.css" rel="stylesheet">
    <link href="<?php echo $siteurl; ?>assets/css/admin/update-profil.css" rel="stylesheet">

</head>

<body>
<div class=mengubah_data_pengguna>
  <div class=header_container>
    <div class="logo"></div><span  class="teks_koperasi">KOPERASI PEGAWAI REPUBLIK INDONESIA</span><span  class="teks_nama_koperasi">WIYATA USAHA</span><span  class="teks_alamat_koperasi">Jl. Krakatau No.216, Kencong, Kabupaten Jember, Jawa Timur 68167
Telepon: (0336) 321386</span>
    <div class="garis_header"></div>
  </div>
  <div class=side_menu>
    <div class="side_menu_background"></div>
    <div class=beranda_menu>
      <div class="menu_beranda"></div><span  class="teks_beranda">Beranda</span>
    </div>
    <div class=pegawai_menu>
      <div class="menu_pegawai"></div><span  class="teks_pegawai">Pegawai</span>
    </div>
    <div class=anggota_menu>
      <div class="menu_daftar_nasabah"></div><span  class="teks_anggota">Anggota</span>
    </div>
    <div class=pinjaman_menu>
      <div class="menu_pinjaman"></div><span  class="teks_pinjaman">Pinjaman</span>
    </div>
    <div class=simpanan_menu>
      <div class="menu_simpanan"></div><span  class="teks_simpanan">Simpanan</span>
    </div>
    <div class=profil_menu>
      <div class="menu_profil"></div><span  class="teks_profil">Profil</span>
    </div>
    <div class=main_menu>
      <div class="main_menu_background"></div><span  class="teks_main_menu">Menu</span>
    </div>
    <div class=user_container><span  class="teks_selamat">Selamat datang</span><span  class="teks_user">Admin</span></div><span  class="teks_menu">©KPRI-Wiyata Usaha 2021</span>
  </div>
  <div class=main_container>
    <div class="container_background"></div>
    <div class=menu_atas>
      <div class=ubah_status>
        <div class="status_background"></div><span  class="teks_status">Status</span>
        <div class="input_status"></div><span  class="admin">Admin</span>
      </div>
      <div class=ubah_level>
        <div class="level_background"></div><span  class="teks_level">Level</span>
        <div class="input_level"></div><span  class="admin">Admin</span>
      </div>
    </div>
    <div class=form_kiri_container>
      <div class=nama><span  class="teks_nama">Nama</span>
        <div class="input_nama"></div>
      </div>
      <div class=nip><span  class="teks_nip">NIP</span>
        <div class="input_nip"></div>
      </div>
      <div class=kelamin><span  class="teks_kelamin">Jenis kelamin</span><span  class="laki_laki">Laki-laki</span><span  class="perempuan">Perempuan</span></div>
      <div class=tempat_lahir><span  class="teks_tempat_lahir">Tempat lahir</span>
        <div class="input_tempat_lahir"></div>
      </div>
      <div class=tanggal_lahir><span  class="teks_tanggal_lahir">Tanggal lahir</span>
        <div class="input_tanggal_lahir"></div>
      </div>
      <div class=alamat_rumah><span  class="teks_alamat_rumah">Alamat rumah</span>
        <div class="input_alamat_rumah"></div>
      </div>
    </div>
    <div class=form_kanan_container>
      <div class=pos><span  class="kode_pos">Kode pos</span>
        <div class="kolom_kode_pos"></div>
      </div>
      <div class=hp><span  class="nomor_hp">Nomor HP</span>
        <div class="kolom_nomor_hp"></div>
      </div>
      <div class=instansi><span  class="nama_instansi">Nama instansi</span>
        <div class="kolom_foto_ktp_suami"></div>
        <div class="kolom_nama_isntansi"></div>
      </div>
      <div class=alamat_instansi><span  class="alamat_instansi">Alamat instansi</span>
        <div class="kolom_alamat_kantor"></div>
      </div>
    </div>
    <div class=tombol>
      <div class=simpan>
        <div class="tombol_simpan"></div><span  class="teks_simpan">SIMPAN</span>
      </div>
      <div class=kembali>
        <div class="tombol_kembali"></div><span  class="teks_kembali">KEMBALI
</span>
      </div>
    </div>
  </div>
</div>

    <script src="<?php echo $siteurl; ?>config.js"></script>
    <script src="<?php echo $siteurl; ?>assets/js/main.js"></script>
    <script src="<?php echo $siteurl; ?>assets/js/admin.js"></script>
</body>
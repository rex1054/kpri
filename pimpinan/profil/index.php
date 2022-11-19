<?php
session_start();
include('../../config.php');
if(isset($_SESSION['nip'])){} else {header('location:'.$siteurl); }
$fullName = explode(" ", $_SESSION['nama']);
$nick = $fullName[0];

$data;

$sql = "SELECT akun.nama, akun.nip, kelamin.kelamin, akun.tempat_lahir, akun.tanggal_lahir, akun.alamat, akun.pos, akun.hp, instansi.instansi, instansi.alamat as alamat_instansi, akun.ktp_suami, akun.ktp_istri, akun.foto_3x4, status_akun.status, jabatan.jabatan, akun.gabung FROM akun join kelamin on akun.kelamin = kelamin.id join instansi on akun.instansi = instansi.id join status_akun on akun.status = status_akun.id join jabatan on akun.jabatan = jabatan.id WHERE akun.nip = ".$_SESSION['nip'];

$query = $con->query($sql);
if($query->num_rows == 0){
  ?>
  <script>alert("Data Tidak Ditemukan");window.open('<?php echo $siteurl; ?>admin', '_SELF')</script>
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
<link href="<?php echo $siteurl; ?>assets/css/admin/profil.css" rel="stylesheet">

</head>
<body>
<div class=melihat_data_pengguna>
<div class=header_container>
<div class="logo"></div><span  class="teks_koperasi">KOPERASI PEGAWAI REPUBLIK INDONESIA</span><span  class="teks_nama_koperasi">WIYATA USAHA</span><span  class="teks_alamat_koperasi">Jl. Krakatau No.216, Kencong, Kabupaten Jember, Jawa Timur 68167
Telepon: (0336) 321386</span>
<div class="garis_header"></div>
</div>
<div class=side_menu>
<div class="side_menu_background"></div>
<div class=beranda_menu>
<div class="menu menu_beranda">
<span  class="teks_beranda" onclick="menu('beranda')">Beranda</span>
</div>
</div>
<div class=pegawai_menu>
<div class="menu menu_pegawai" onclick="menu('pegawai')">
<span  class="teks_pegawai">Pegawai</span>
</div>
</div>
<div class=anggota_menu>
<div class="menu menu_daftar_nasabah" onclick="menu('anggota')">
<span  class="teks_anggota">Anggota</span>
</div>
</div>
<div class=pinjaman_menu>
<div class="menu menu_pinjaman" onclick="menu('pinjaman')">
<span  class="teks_pinjaman">Pinjaman</span>
</div>
</div>
<div class=simpanan_menu>
<div class="menu menu_simpanan" onclick="menu('simpanan')">
<span  class="teks_simpanan">Simpanan</span>
</div>
</div>
<div class=profil_menu>
<div class="menu menu_profil aktif" onclick="menu('profil')">
<span  class="teks_profil">Profil</span>
</div>
</div>
<div class=main_menu>
<div class="main_menu_background">
<span  class="teks_main_menu">Menu</span>
</div>
</div>
<div class=user_container>
<span  class="teks_selamat">Selamat datang</span>
<span  class="teks_user"><?php echo $nick; ?></span>
<span  class="teks_selamat logout"><a href="<?php echo $siteurl; ?>" target="_SELF">Logout</a></span>
</div>
<span  class="teks_menu">©KPRI-Wiyata Usaha 2021</span>
</div>
<div class=kolom_profil>
<div class="profil_background"></div>
<div class="foto_profil" style="background-image: url('<?php echo $siteurl.'assets/i/user_3x4/'.$data['foto_3x4']; ?>');"></div>
<div class=data_kiri_container>
<div class=nama><span  class="teks_nama">Nama</span><span  class="data_nama">: <?php echo $data['nama']; ?></span></div>
<div class=nip><span  class="teks_nip">NIP</span><span  class="data_nip">: <?php echo $data['nip']; ?></span></div>
<div class=kelamin><span  class="teks_kelamin">Jenis kelamin</span><span  class="data_kelamin">: <?php echo $data['kelamin']; ?></span></div>
<div class=tempat_lahir><span  class="teks_tempat_lahir">Tempat lahir</span><span  class="data_tempat_lahir">: <?php echo $data['tempat_lahir']; ?></span></div>
<div class=tanggal_lahir><span  class="teks_tanggal_lahir">Tanggal lahir</span><span  class="data_tanggal_lahir">: <?php echo $data['tanggal_lahir']; ?></span></div>
<div class=alamat_rumah><span  class="teks_alamat_rumah">Alamat rumah</span><span  class="data_alamat_rumah" style="overflow-y: scroll;">: <?php echo $data['alamat']; ?></span></div>
<div class=pos><span  class="teks_pos">Kode pos</span><span  class="data_pos">: <?php echo $data['pos']; ?></span></div>
</div>
<div class=data_kanan_container>
<div class=hp><span  class="teks_hp">Nomor HP</span><span  class="data_hp">: <?php echo $data['hp']; ?></span></div>
<div class=instansi><span  class="teks_instansi">Instansi</span><span  class="data_instansi">: <?php echo $data['instansi']; ?></span></div>
<div class=alamat_instansi><span  class="teks_alamat_instansi">Alamat instansi</span><span  class="data_alamat_instansi" style="overflow-y: scroll;">: <?php echo $data['alamat_instansi']; ?></span></div>
<div class=ktp_suami><span  class="teks_ktp_suami">Foto KTP suami</span><span  class="data_ktp_suami">: <?php echo $data['ktp_suami']; ?><img id="ktp-suami-show" class="kpri-profile-show-icon" src="<?php echo $siteurl; ?>assets/show.png"></span></div>
<div class=ktp_istri><span  class="teks_ktp_istri">Foto KTP istri</span><span  class="data_ktp_istri">: <?php echo $data['ktp_istri']; ?><img id="ktp-istri-show" class="kpri-profile-show-icon" src="<?php echo $siteurl; ?>assets/show.png"></span></div>
<div class=foto_3x4><span  class="teks_3x4">Foto 3x4</span><span  class="data_3x4">: <?php echo $data['foto_3x4']; ?><img id="foto-3x4-show" class="kpri-profile-show-icon" src="<?php echo $siteurl; ?>assets/show.png"></span></div>
<div class=registrasi><span  class="teks_registrasi">Tanggal registrasi</span><span  class="data_registrasi">: <?php echo $data['gabung']; ?></span></div>
</div>
<div class=tombol>
<div class=update_profil>
<button class="tombol_update" onclick="updateProfil(<?php echo $_SESSION['nip']; ?>)"><span  class="teks_update">UPDATE PROFIL</span></button>
</div>
<div class=ubah_sandi>
<button class="tombol_ubah" onclick="ubahsandi()"><span  class="teks_ubah">UBAH KATA SANDI</span></button>
</div>
<div class=rekening>
<button class="tombol_rekening" onclick="menu('rekening/?nip=<?php echo $_SESSION['nip']; ?>')"><span  class="teks_rekening">REKENING</span></button>
</div>
</div>
</div>
</div>

<!-- Modal section -->
<div id="modal-ktp-suami" class="modal">
<div class="modal-content">
<div class="modal-header">
<span id="closea" class="close">&times;</span>
<h2>Foto KTP Suami</h2>
</div>
<div class="modal-body">
<img src="<?php echo $siteurl; ?>assets/i/user_ktp_suami/<?php echo $data['ktp_suami'];?>" alt="<?php echo $siteurl; ?>assets/i/user_ktp_suami/<?php echo $data['ktp_suami'];?>">
</div>
<div class="modal-footer">
<div class="modal-footer-left">
<h3>KPRI Wiyata Usaha</h3>
</div>
<div class="modal-footer-right">
<a href="<?php echo $siteurl; ?>assets/i/user_ktp_suami/<?php echo $data['ktp_suami'];?>" target="_blank"><button type="button" class="kpri-tombol-ubah">Ukuran Penuh</button></a>
<button type="button" class="kpri-tombol-ubah" onclick="ubahFotoKTPSuami()">Ubah Foto</button>
</div>
</div>
</div>
</div>

<div id="modal-ktp-istri" class="modal">
<div class="modal-content">
<div class="modal-header">
<span id="closeb" class="close">&times;</span>
<h2>Foto KTP Istri</h2>
</div>
<div class="modal-body">
<img src="<?php echo $siteurl; ?>assets/i/user_ktp_istri/<?php echo $data['ktp_istri'];?>" alt="<?php echo $siteurl; ?>assets/i/user_ktp_istri/<?php echo $data['ktp_istri'];?>">
</div>
<div class="modal-footer">
<div class="modal-footer-left">
<h3>KPRI Wiyata Usaha</h3>
</div>
<div class="modal-footer-right">
<a href="<?php echo $siteurl; ?>assets/i/user_ktp_istri/<?php echo $data['ktp_istri'];?>" target="_blank"><button type="button" class="kpri-tombol-ubah">Ukuran Penuh</button></a>
<button type="button" class="kpri-tombol-ubah" onclick="ubahFotoKTPIstri()">Ubah Foto</button>
</div>
</div>
</div>
</div>

<div id="modal-3x4" class="modal">
<div class="modal-content">
<div class="modal-header">
<span id="closec" class="close">&times;</span>
<h2>Foto 3x4</h2>
</div>
<div class="modal-body">
<img src="<?php echo $siteurl; ?>assets/i/user_3x4/<?php echo $data['foto_3x4'];?>" alt="<?php echo $siteurl; ?>assets/i/user_3x4/<?php echo $data['foto_3x4'];?>">
</div>
<div class="modal-footer">
<div class="modal-footer-left">
<h3>KPRI Wiyata Usaha</h3>
</div>
<div class="modal-footer-right">
<a href="<?php echo $siteurl; ?>assets/i/user_3x4/<?php echo $data['foto_3x4'];?>" target="_blank"><button type="button" class="kpri-tombol-ubah">Ukuran Penuh</button></a>
<button type="button" class="kpri-tombol-ubah" onclick="ubahFoto3x4()">Ubah Foto</button>
</div>
</div>
</div>
</div>

<!-- modal ubah foto KTP suami -->
<div id="modal-ubah-foto-ktp-suami" class="modal">
<form action="simpan.php?a=1&nip=<?php echo $data['nip'];?>" method="post" enctype="multipart/form-data">
<div class="modal-content">
<div class="modal-header">
<span id="closezz" class="close">&times;</span>
<h2>Ubah Foto KTP Suami</h2>
</div>
<div class="modal-body">
<div class="input-foto">
<input class="kpri-input" type="file" name="foto-ktp-suami" id="foto-ktp-suami" required>
</div>
</div>
<div class="modal-footer">
<div class="modal-footer-left">
<h3>KPRI Wiyata Usaha</h3>
</div>
<div class="modal-footer-right">
<input type="submit" name="submit" value="Simpan" class="kpri-tombol-ubah">
</div>
</div>
</div>
</form>
</div>

<!-- modal ubah foto KTP Istri -->
<div id="modal-ubah-foto-ktp-Istri" class="modal">
<form action="simpan.php?a=2&nip=<?php echo $data['nip'];?>" method="post" enctype="multipart/form-data">
<div class="modal-content">
<div class="modal-header">
<span id="closezzz" class="close">&times;</span>
<h2>Ubah Foto KTP Istri</h2>
</div>
<div class="modal-body">
<div class="input-foto">
<input class="kpri-input" type="file" name="foto-ktp-istri" id="foto-ktp-Istri" required>
</div>
</div>
<div class="modal-footer">
<div class="modal-footer-left">
<h3>KPRI Wiyata Usaha</h3>
</div>
<div class="modal-footer-right">
<input type="submit" name="submit" value="Simpan" class="kpri-tombol-ubah">
</div>
</div>
</div>
</form>
</div>

<!-- modal ubah foto 3x4 -->
<div id="modal-ubah-foto-3x4" class="modal">
<form action="simpan.php?a=3&nip=<?php echo $data['nip'];?>" method="post" enctype="multipart/form-data">
<div class="modal-content">
<div class="modal-header">
<span id="closezzzz" class="close">&times;</span>
<h2>Ubah Foto 3x4</h2>
</div>
<div class="modal-body">
<div class="input-foto">
<input class="kpri-input" type="file" name="foto-3x4" id="foto-3x4" required>
</div>
</div>
<div class="modal-footer">
<div class="modal-footer-left">
<h3>KPRI Wiyata Usaha</h3>
</div>
<div class="modal-footer-right">
<input type="submit" name="submit" value="Simpan" class="kpri-tombol-ubah">
</div>
</div>
</div>
</form>
</div>

<!-- modal ubah kata sandi -->
<div id="modal-ubah-sandi" class="modal">
<form action="simpan.php?a=4&nip=<?php echo $data['nip'];?>" method="post" enctype="multipart/form-data">
<div class="modal-content">
<div class="modal-header">
<span id="closesandi" class="close">&times;</span>
<h2>Ubah Kata Sandi</h2>
</div>
<div class="modal-body">
<div class="input-foto">
<div class="kata_sandi_1_2411">
<div class="kolom_kata_sandi_1_2421 tooltip">
<input class="kpri-input kpri-specials" required name="sandi-baru" id="kpri-kata-sandia" type="password" placeholder="KATA SANDI BARU">
<span class="tooltiptext">Kata sandi baru</span>
<span class="kpri-sandi">
<a id="tampilkan-sandia" href="#" onclick="tampilsandia()">
<img class="kpri-logo-specials" id="kpri-logo-passworda" style="position: absolute; left: 126px; top: 6px;" src="<?php echo $siteurl; ?>assets/show.png">
</a>
</span>
</div>
</div>

<div class="kata_sandi_1_2412">
<div class="kolom_kata_sandi_1_2422 tooltip">
<input class="kpri-input kpri-specials" required name="konfirmasi-sandi" id="kpri-kata-sandib" type="password" placeholder="KONFIRMASI KATA SANDI BARU">
<span class="tooltiptext">Konfirmasi kata sandi baru</span>
<span class="kpri-sandi">
<a id="tampilkan-sandib" href="#" onclick="tampilsandib()">
<img class="kpri-logo-specials" id="kpri-logo-passwordb" style="position: absolute; left: 126px; top: 6px;" src="<?php echo $siteurl; ?>assets/show.png">
</a>
</span>
</div>
</div>

</div>
</div>
<div class="modal-footer">
<div class="modal-footer-left">
<h3>KPRI Wiyata Usaha</h3>
</div>
<div class="modal-footer-right">
<input type="submit" name="submit" value="Simpan" class="kpri-tombol-ubah">
</div>
</div>
</div>
</form>
</div>

<script src="<?php echo $siteurl; ?>config.js"></script>
<script src="<?php echo $siteurl; ?>assets/js/main.js"></script>
<script src="<?php echo $siteurl; ?>assets/js/pimpinan.js"></script>
</body>
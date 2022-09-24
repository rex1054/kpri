<?php
include('../../config.php');
session_start();
if(isset($_SESSION['nip'])){} else {header('location:'.$siteurl); }
$fullName = explode(" ", $_SESSION['nama']);
$nick = $fullName[0];
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
    <link href="<?php echo $siteurl; ?>assets/css/admin/pegawai.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/fh-3.2.3/r-2.3.0/sc-2.0.6/datatables.min.css" />
</head>
<body>
<div class=melihat_daftar_pengguna>
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
      <div class="menu menu_daftar_nasabah aktif" onclick="menu('anggota')">
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
      <div class="menu menu_profil" onclick="menu('profil')">
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
  <div class=search_bar_container>
  <div class=tambah_pengguna>
      <button class="tombol_tambah_background" onclick="registrasi()"><span  class="teks_tombol_tambah">MENAMBAH DATA PENGGUNA</span></button>
    </div>
    <div class=cari>
      <input class="kolom_cari cari" type="text" name="cari-nama" onkeyup="filt('tabel-pegawai', 'cari-nama', 1)" id="cari-nama" placeholder="Cari Nama">
    </div>
  </div>
  <div class=main_container>
    <div class="container_background">
    <span  class="main_teks">DAFTAR ANGGOTA</span>
    <div class=tabel_container>
      <table class="tabel_pegawai" id="tabel-pegawai">
          <thead>
              <tr>
                  <th class="pojok-kiri-atas">NIP</th>
                  <th>Nama</th>
                  <th>Instansi</th>
                  <th>Status</th>
              </tr>
          </thead>
          <tbody>
              <?php if(isset($_GET['m'])){
                  $_GET['m'] = $_GET['m'];
                  include('../get/get-data-anggota.php');
              } else { include('../get/get-data-anggota.php'); } ?>
          </tbody>
      </table>
    </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo $siteurl; ?>config.js"></script>
<script src="<?php echo $siteurl; ?>assets/js/admin.js"></script>
<script type="text/javascript" src="<?php echo $siteurl; ?>assets/DataTables/datatables.min.js"></script>
</body>
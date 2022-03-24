<?php
include('../config.php');
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
    <meta name="author" content="REXYST">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <!-- style -->
    <link href="<?php echo $siteurl; ?>assets/css/main.css" rel="stylesheet">
    <link href="<?php echo $siteurl; ?>assets/css/admin/beranda.css" rel="stylesheet">
</head>
<body>
<div class=beranda>
  <div class=header_container>
    <div class="logo"></div>
    <span  class="teks_koperasi">KOPERASI PEGAWAI REPUBLIK INDONESIA</span>
    <span  class="teks_nama_koperasi">WIYATA USAHA</span>
    <span  class="teks_alamat_koperasi">Jl. Krakatau No.216, Kencong, Kabupaten Jember, Jawa Timur 68167 Telepon: (0336) 321386</span>
    <div class="garis_header"></div>
  </div>
  <div class=side_menu>
    <div class="side_menu_background"></div>
    <div class=beranda_menu>
      <div class="menu menu_beranda aktif">
          <span  class="teks_beranda">Beranda</span>
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
    </div>
    <span  class="teks_menu">©KPRI-Wiyata Usaha 2021</span>
  </div>
  <div class=main_container>
    <div class="container_background"></div>
    <div class=seacrh_bar_container>
      <div class=cari_container>
        <input class="kolom_nama cari" type="text" name="cari-nama" id="cari-nama" placeholder="Cari Nama">
      </div>
      <div class=filter_container>
        <span  class="teks_filter">Tampilkan berdasarkan bulan</span>
        <input class="kolom_bulan" type="month" placeholder="Pilih Bulan">
      </div>
    </div>
    <div class=tabel_container>
      <span  class="main_teks">INFORMASI SALDO TRANSAKSI</span>
      <table class="tabel_transaksi">
          <thead>
              <tr>
                  <th class="pojok-kiri-atas">No.</th>
                  <th>Tanggal</th>
                  <th>Jenis Transaksi</th>
                  <th>Nama</th>
                  <th>Instansi</th>
                  <th>Status</th>
              </tr>
          </thead>
          <tbody>
              <?php include('get/get.data.beranda.php'); ?>
          </tbody>
      </table>
    </div>
    <div class=tombol_container>
      <div class=tombol_laporan>
        <button class="tombol_laporan_background">
            <span  class="teks_tombol_laporan">BUAT LAPORAN</span>
        </button>  
      </div>
      <div class=tombol_tambah_simpanan>
        <button class="tombol_tambah_simpanan_background">
        <span  class="teks_tambah_simpanan">TAMBAH SIMPANAN</span>
    </button>
      </div>
      <div class=tombol_tambah_pinjaman>
        <button class="tombol_tambah_pinjaman_background">
        <span  class="teks_tambah_pinjaman">TAMBAH PINJAMAN</span>
    </button>
      </div>
    </div>
  </div>
</div>
</body>
<script src="<?php echo $siteurl; ?>assets/js/admin.js"></script>
</html>
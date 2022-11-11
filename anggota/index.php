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
    <meta name="author" content="<?php echo $author; ?>">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <!-- style -->
    <link href="<?php echo $siteurl; ?>assets/css/main.css" rel="stylesheet">
    <link href="<?php echo $siteurl; ?>assets/css/anggota/main.css" rel="stylesheet">
    <link href="<?php echo $siteurl; ?>assets/css/anggota/beranda.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/fh-3.2.3/r-2.3.0/sc-2.0.6/datatables.min.css" />

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
          <span  class="teks_beranda" onclick="menu('beranda')">Beranda</span>
        </div>
    </div>
    <div class=pegawai_menu>
      <div class="menu menu_pegawai" onclick="menu('rekening')">
      <span  class="teks_pegawai">Rekening</span>
      </div>
    </div>
    <div class=anggota_menu>
      <div class="menu menu_daftar_nasabah" onclick="menu('pinjaman')">
      <span  class="teks_anggota">Pinjaman</span>
      </div>
    </div>
    <div class=pinjaman_menu>
      <div class="menu menu_pinjaman" onclick="menu('simpanan')">
      <span  class="teks_pinjaman">Simpanan</span>
      </div>
    </div>
    <div class=simpanan_menu>
      <div class="menu menu_simpanan" onclick="menu('profil')">
      <span  class="teks_simpanan">Profil</span>
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
  
  <div class=main_container>
            <div class="container_background"></div>
            <span class="main_teks">DAFTAR TRANSAKSI</span>
            <div class=seacrh_bar_container>
                <div class=filter_container>
                    <span class="teks_filter">Tampilkan berdasarkan bulan</span>
                    <input class="kolom_bulan" <?php if(isset($_GET['m'])){echo 'value="'.$_GET['m'].'"'; } ?>
                        type="month" onchange="bulan(this.value)" placeholder="Pilih Bulan">
                    <button class="tombol tombol_reset" onclick="reset('beranda')">
                        Reset
                    </button>
                </div>
                <div class=filter_container_year>
                    <span class="teks_filter">Tampilkan berdasarkan tahun</span>
                    <select class="kolom_bulan" name="yearpicker" id="yearpicker" onchange="tahun(this.value)" placeholder="Pilih Tahun"></select>
                </div>
            </div>
            <div class=tabel_container>
                <table class="tabel_transaksi hover stripe" id="tabel-transaksi">
                    <thead>
                        <tr>
                            <th class="pojok-kiri-atas">No.</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Instansi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($_GET['m'])){
  $_GET['m'] = $_GET['m'];
  include('get/get-data-beranda.php');
} else if(isset($_GET['y'])){
  $_GET['y'] = $_GET['y'];
  include('get/get-data-beranda.php');
}else { include('get/get-data-beranda.php'); } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo $siteurl; ?>config.js"></script>
<script src="<?php echo $siteurl; ?>assets/js/main.js"></script>
<script src="<?php echo $siteurl; ?>assets/js/anggota.js"></script>
<script type="text/javascript" src="<?php echo $siteurl; ?>assets/DataTables/datatables.min.js"></script>
<script>
  getYear(<?php if(isset($_GET['y'])){ echo $_GET['y']; } else { echo date('Y'); } ?>);
</script>
</html>
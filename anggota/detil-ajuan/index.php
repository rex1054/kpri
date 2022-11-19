<?php
session_start();
include('../../config.php');
if(isset($_SESSION['nip'])){} else {header('location:'.$siteurl); }
$fullName = explode(" ", $_SESSION['nama']);
$nick = $fullName[0];

$_GET['id'] = $_GET['id'];
include('getData.php');

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
<link href="<?php echo $siteurl;?>assets/css/admin/main.css" rel="stylesheet">
<link href="<?php echo $siteurl;?>assets/css/admin/detil-transaksi.css" rel="stylesheet">
<link href="<?php echo $siteurl;?>assets/css/admin/detil-ajuan.css" rel="stylesheet">
<link rel="stylesheet" media="print" href="<?php echo $siteurl; ?>assets/css/setoran.print.css">
</head>
<body>
<div class=melihat_detail_transaksi>
<div class=header_container>
<img class="logo" src="<?php echo $siteurl; ?>assets/logo.png">
<span  class="teks_koperasi">KOPERASI PEGAWAI REPUBLIK INDONESIA</span>
<span  class="teks_nama_koperasi">WIYATA USAHA</span>
<span  class="teks_alamat_koperasi">Jl. Krakatau No.216, Kencong, Kabupaten Jember, Jawa Timur 68167 Telepon: (0336) 321386</span>
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
      <div class="menu menu_pegawai" onclick="menu('rekening')">
      <span  class="teks_pegawai">Rekening</span>
      </div>
    </div>
    <div class=anggota_menu>
      <div class="menu menu_daftar_nasabah aktif" onclick="menu('pinjaman')">
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
<div class=kolom_profil>
    <div class="profil_background"></div>
    <div class=data_kiri_container>
      <div class=ajuan><span  class="teks_ajuan">Nomor ajuan</span><span  class="data_ajuan">: <?php echo $id; ?></span></div>
      <div class=nip><span  class="teks_nip">NIP</span><span  class="data_nip">: <?php echo $nip; ?></span></div>
      <div class=nama><span  class="teks_nama">Nama</span><span  class="data_nama">: <?php echo $nama; ?></span></div>
      <div class=instansi><span  class="teks_instansi">Instansi</span><span  class="data_ajuan">: <?php echo $instansi; ?></span></div>
      <div class=tanggal><span  class="teks_tanggal">Tanggal</span><span  class="data_tanggal">: <?php echo $tanggal; ?></span></div>
      <div class=jenis><span  class="teks_jenis">Jenis </span><span  class="data_jenis">: <?php echo $jenis; ?></span></div>
      <div class=jumlah><span  class="teks_jumlah">Jumlah</span><span  class="data_jumlah">: <?php echo $jumlah; ?></span></div>
      <div class=diangsur><span  class="teks_diangsur">Diangsur</span><span  class="data_diangsur">: <?php echo $diangsur; ?></span></div>
    </div>
    <div class=data_kanan_container>
      <div class=penghasilan><span  class="teks_penghasilan">Penghasilan</span><span  class="data_penghasilan">: <?php echo $penghasilan; ?></span></div>
      <div class=status><span  class="teks_status">Status</span><span  class="data_status">: <?php echo $status; ?></span></div>
      <div class=admin><span  class="teks_admin">Admin</span><span  class="data_admin">: <?php echo $admin; ?></span></div>
    </div><span  class="detail_pinjaman">DETAIL AJUAN</span>
    <div class=tombol_container>
                <div class=tombol_hapus>
                    <button class="tombol_kembali_background" onclick="hapus('anggota', 'ajuan', <?php echo $id_ajuan; ?>)">
                        <span class="teks_kembali">HAPUS</span>
                    </button>
                </div>
                <div class=tombol_kembali>
                    <button class="tombol_kembali_background" onclick="menu('ajuan')">
                        <span class="teks_kembali">KEMBALI</span>
                    </button>
                </div>
            </div>
  </div>
</div>

<script src="../../config.js"></script>
<script src="../../assets/js/main.js"></script>
<script src="../../assets/js/anggota.js"></script>

</body>
</html>
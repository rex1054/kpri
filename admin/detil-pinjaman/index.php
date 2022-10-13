<?php
include('../../config.php');
session_start();
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
<link href="<?php echo $siteurl;?>assets/css/admin/detil-pinjaman.css" rel="stylesheet">
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
<span  class="menu-teks teks_beranda" onclick="menu('beranda')">Beranda</span>
</div>
</div>
<div class=pegawai_menu>
<div class="menu menu_pegawai" onclick="menu('pegawai')">
<span  class="menu-teks teks_pegawai">Pegawai</span>
</div>
</div>
<div class=anggota_menu>
<div class="menu menu_daftar_nasabah" onclick="menu('anggota')">
<span  class="menu-teks teks_anggota">Anggota</span>
</div>
</div>
<div class=pinjaman_menu>
<div class="menu menu_pinjaman aktif" onclick="menu('pinjaman')">
<span  class="menu-teks teks_pinjaman">Pinjaman</span>
</div>
</div>
<div class=simpanan_menu>
<div class="menu menu_simpanan" onclick="menu('simpanan')">
<span  class="menu-teks teks_simpanan">Simpanan</span>
</div>
</div>
<div class=profil_menu>
<div class="menu menu_profil" onclick="menu('profil')">
<span  class="menu-teks teks_profil">Profil</span>
</div>
</div>
<div class=main_menu>
<div class="main_menu_background">
<span  class="menu-teks teks_main_menu">Menu</span>
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
      <div class=nomor_pinjaman><span  class="teks_nomor_pinjaman">Nomor pinjaman</span><span  class="data_nama">: <?php echo $id; ?></span></div>
      <div class=nomor_ajuan><span  class="teks_nomor_ajuan">Nomor ajuan</span><span  class="data_nip">: <?php echo $idAjuan; ?></span></div>
      <div class=jenis><span  class="teks_jenis">Jenis </span><span  class="data_kelamin">: <?php echo $jenis; ?></span></div>
      <div class=jumlah><span  class="teks_jumlah">Jumlah</span><span  class="data_tempat_lahir">: <?php echo $jumlah; ?></span></div>
      <div class=jasa><span  class="teks_jasa">Jasa</span><span  class="data_tanggal_lahir">: <?php echo $jasa; ?></span></div>
      <div class=diangsur><span  class="teks_diangsur">Diangsur</span><span  class="data_alamat_rumah">: <?php echo $diangsur; ?></span></div>
      <div class=angsuran><span  class="teks_angsuran">Angsuran</span><span  class="data_pos">: <?php echo $angsuran; ?></span></div>
    </div>
    <div class=data_kanan_container>
      <div class=potongan><span  class="teks_potongan">Potongan</span><span  class="data_hp">: <?php echo $potongan; ?></span></div>
      <div class=asuransi><span  class="teks_asuransi">Asuransi</span><span  class="data_instansi">: <?php echo $angsuran; ?></span></div>
      <div class=diterima><span  class="teks_diterima">Diterima</span><span  class="data_alamat_instansi">: <?php echo $diterima; ?></span></div>
      <div class=mulai_mengangsur><span  class="teks_mulai_mengangsur">Mulai mengangsur</span><span  class="data_ktp_suami">: <?php echo $mulai; ?></span></div>
      <div class=pimpinan><span  class="teks_pimpinan">Pimpinan</span><span  class="data_ktp_istri">: <a href="<?php echo $siteurl.'admin/detil-pengguna/?nip='.$pimpinan; ?>"><?php echo $pimpinan; ?></a></span></div>
      <div class=status><span  class="teks_status">Status</span><span  class="data_3x4">: <?php echo $status; ?></span></div>
    </div><span  class="detail_pinjaman">DETAIL PINJAMAN</span>
    <div class=tombol_container>
                <div class=tombol_kembali>
                    <button class="tombol_kembali_background" onclick="menu('pinjaman')">
                        <span class="teks_kembali">KEMBALI</span>
                    </button>
                </div>
            </div>
  </div>
</div>

<script src="../../config.js"></script>
<script src="../../assets/js/admin.js"></script>

</body>
</html>
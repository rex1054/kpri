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
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">


    <!-- style -->
    <link href="<?php echo $siteurl; ?>assets/css/main.css" rel="stylesheet">
    <link href="<?php echo $siteurl; ?>assets/css/anggota/rekening.css" rel="stylesheet">

</head>

<body>
    <div class=rekening>
        <div class=header_container>
            <div class="logo"></div>
            <span class="teks_koperasi">KOPERASI PEGAWAI REPUBLIK INDONESIA</span>
            <span class="teks_nama_koperasi">WIYATA USAHA</span>
            <span class="teks_alamat_koperasi">Jl. Krakatau No.216, Kencong, Kabupaten Jember, Jawa Timur 68167 Telepon:
                (0336) 321386</span>
            <div class="garis_header"></div>
        </div>
        <div class=side_menu>
            <div class="side_menu_background"></div>
            <div class=beranda_menu>
                <div class="menu menu_beranda">
                    <span class="teks_beranda" onclick="menu('anggotaBeranda')">Beranda</span>
                </div>
            </div>
            <div class=pegawai_menu>
                <div class="menu menu_pegawai aktif" onclick="menu('rekening')">
                    <span class="teks_pegawai">Rekening</span>
                </div>
            </div>
            <div class=anggota_menu>
                <div class="menu menu_daftar_nasabah" onclick="menu('anggotaPinjaman')">
                    <span class="teks_anggota">Pinjaman</span>
                </div>
            </div>
            <div class=pinjaman_menu>
                <div class="menu menu_pinjaman" onclick="menu('anggotaSimpanan')">
                    <span class="teks_pinjaman">Simpanan</span>
                </div>
            </div>
            <div class=simpanan_menu>
                <div class="menu menu_simpanan" onclick="menu('profil')">
                    <span class="teks_simpanan">Profil</span>
                </div>
            </div>
            <div class=main_menu>
                <div class="main_menu_background">
                    <span class="teks_main_menu">Menu</span>
                </div>
            </div>
            <div class=user_container>
                <span class="teks_selamat">Selamat datang</span>
                <span class="teks_user"><?php echo $nick; ?></span>
                <span class="teks_selamat logout"><a href="<?php echo $siteurl; ?>" target="_SELF">Logout</a></span>
            </div>
            <span class="teks_menu">©KPRI-Wiyata Usaha 2021</span>
        </div>

        <div class=main_container>
            <div class="container_background"></div>
            <?php include('../get/get-data-rekening.php'); ?>
        </div>
</body>
<script src="<?php echo $siteurl; ?>config.js"></script>
<script src="<?php echo $siteurl; ?>assets/js/anggota.js"></script>

</html>
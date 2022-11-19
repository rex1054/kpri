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
<div class="menu menu_beranda aktif">
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
<div class="menu menu_pinjaman" onclick="menu('pinjaman')">
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
<div class="container_background"></div><span  class="teks_judul">BUKTI SETORAN ANGGOTA</span>
<div class=user_data_container>
<div class=nip><span  class="teks_nip">NIP</span><span  class="data_nip">: <?php echo $akun['nip']; ?></span></div>
<div class=nama><span  class="teks_nama">Nama</span><span  class="data_nama">: <?php echo $akun['nama']; ?></span></div>
<div class=bulan><span  class="teks_bulan">Bulan</span><span  class="data_bulan">: <?php echo $bulan; ?></span></div>
<div class=tanggal_transaksi><span  class="teks_tanggal_transaksi">Tanggal Transaksi</span><span  class="data_tanggal_transaksi">: <?php echo $tgl['tanggal']; ?></span></div>
</div>
<div class=tabel_setoran>
<div class=tabel_header>
<div class=no>
<div class="cell_no"></div><span  class="teks_no table-header">NO</span>
</div>
<div class=jenis>
<div class="cell_jenis"></div><span  class="teks_jenis table-header">JENIS SETORAN</span>
</div>
<div class=ke>
<div class="cell_ke"></div><span  class="teks_ke table-header">ke</span>
</div>
<div class=dr>
<div class="cell_dr"></div><span  class="teks_dr table-header">dr</span>
</div>
<div class=nominal>
<div class="cell_nominal"></div><span  class="teks_nominal table-header">NOMINAL</span>
</div>
<div class=keterangan>
<div class="cell_keterangan"></div><span  class="teks_keterangan table-header">KETERANGAN</span>
</div>
</div>
<div class=row_sp>
<div class=sp_no>
<div class="cell_sp_no"></div><span  class="teks_sp_no">1</span>
</div>
<div class=sp_jenis>
<div class="cell_sp_jenis"></div><span  class="teks_sp_jenis">SP</span>
</div>
<div class=sp_ke>
<div class="cell_sp_ke">
<input class="input-data odd" id="sp-ke" type="text" name="sp-ke" value="-" disabled>
</div>
</div>
<div class=sp_dr>
<div class="cell_sp_dr">
<input class="input-data odd" id="sp-dr" type="text" name="sp-dr" value="-" disabled>
</div>
</div>
<div class=sp_nominal>
<div class="cell_sp_nominal">
<input disabled class="input-data odd" id="sp-nominal" type="text" name="sp-nominal" value="<?php if($jenisSimpanan=='SP'){echo 'Rp. '.$jumlahSimpanan;} else {echo '-';} ?>">
</div>
</div>
<div class=sp_keterangan>
<div class="cell_sp_keterangan">
<input disabled class="input-data odd" id="sp-keterangan" type="text" name="sp-keterangan" value="<?php if($jenisSimpanan=='SP'){echo $keteranganSimpanan;} else {echo '-';} ?>">
</div>
</div>
</div>
<div class=row_sw>
<div class=sw_no>
<div class="cell_sw_no"></div><span  class="teks_sw_no">2</span>
</div>
<div class=sw_jenis>
<div class="cell_sw_jenis"></div><span  class="teks_sw_jenis">SW</span>
</div>
<div class=sw_ke>
<div class="cell_sw_ke">
<input disabled class="input-data even" id="sw-ke" type="text" name="sw-ke" value="-">
</div>
</div>
<div class=sw_dr>
<div class="cell_sw_dr">
<input disabled class="input-data even" id="sw-dr" type="text" name="sw-dr" value="-">
</div>
</div>
<div class=sw_nominal>
<div class="cell_sw_nominal">
<input disabled class="input-data even" id="sw-nominal" type="text" name="sw-nominal" value="<?php if($jenisSimpanan=='SW'){echo 'Rp. '.$jumlahSimpanan;} else {echo '-';} ?>">
</div>
</div>
<div class=sw_keterangan>
<div class="cell_sw_keterangan">
<input disabled class="input-data even" id="sw-keterangan" type="text" name="sw-keterangan" value="<?php if($jenisSimpanan=='SW'){if ($keteranganSimpanan==""){echo $keteranganSimpanan;}} else {echo '-';} ?>">
</div>
</div>
</div>
<div class=row_tab>
<div class=tab_no>
<div class="cell_tab_no"></div><span  class="teks_tab_no">3</span>
</div>
<div class=tab_jenis>
<div class="cell_tab_jenis"></div><span  class="teks_tab_jenis">TAB</span>
</div>
<div class=tab_ke>
<div class="cell_tab_ke">
<input disabled class="input-data odd" id="tab-ke" type="text" name="tab-ke" value="-">
</div>
</div>
<div class=tab_dr>
<div class="cell_tab_dr">
<input disabled class="input-data odd" id="tab-dr" type="text" name="tab-dr" value="-">
</div>
</div>
<div class=tab_nominal>
<div class="cell_tab_nominal">
<input disabled class="input-data odd" id="tab-nominal" type="text" name="tab-nominal" value="<?php if($jenisSimpanan=='TAB'){echo $jumlahSimpanan;} else {echo '-';} ?>">
</div>
</div>
<div class=tab_keterangan>
<div class="cell_tab_keterangan">
<input disabled class="input-data odd" id="tab-keterangan" type="text" name="tab-keterangan" value="<?php if($jenisSimpanan=='TAB'){echo $keteranganSimpanan;} else {echo '-';} ?>">
</div>
</div>
</div>
<div class=row_sr>
<div class=sr_no>
<div class="cell_sr_no"></div><span  class="teks_sr_no">4</span>
</div>
<div class=sr_jenis>
<div class="cell_sr_jenis"></div><span  class="teks_sr_jenis">SR</span>
</div>
<div class=sr_ke>
<div class="cell_sr_ke">
<input disabled class="input-data even" id="sr-ke" type="text" name="sr-ke" value="-">
</div>
</div>
<div class=sr_dr>
<div class="cell_sr_dr">
<input disabled class="input-data even" id="sr-dr" type="text" name="sr-dr" value="-">
</div>
</div>
<div class=sr_nominal>
<div class="cell_sr_nominal">
<input disabled class="input-data even" id="sr-nominal" type="text" name="sr-nominal" value="<?php if($jenisSimpanan=='SR'){echo $jumlahSimpanan;} else {echo '-';} ?>">
</div>
</div>
<div class=sr_keterangan>
<div class="cell_sr_keterangan">
<input disabled class="input-data even" id="sr-keterangan" type="text" name="sr-keterangan" value="<?php if($jenisSimpanan=='SR'){echo $keteranganSimpanan;} else {echo '-';} ?>">
</div>
</div>
</div>
<div class=row_usp>
<div class=ros_usp_merge_cell>
<div class="cell_usp"></div><span  class="teks_usp">USP</span>
</div>
<div class=row_usp_pokok>
<div class=usp_pokok_no>
<div class="cell_usp_pokok_no"></div><span  class="teks_usp_pokok_no">5</span>
</div>
<div class=usp_pokok_jenis>
<div class="cell_usp_pokok_jenis"></div><span  class="teks_usp_pokok_jenis">POKOK</span>
</div>
<div class=usp_pokok_ke>
<div class="cell_usp_pokok_ke">
<input disabled class="input-data odd" id="usp-pokok-ke" type="text" name="usp-pokok-ke" value="<?php echo $uspke; ?>">
</div>
</div>
<div class=usp_pokok_dr>
<div class="cell_usp_pokok_dr">
<input disabled class="input-data odd" id="usp-pokok-dr" type="text" name="usp-pokok-dr" value="<?php echo $uspdr; ?>">
</div>
</div>
<div class=usp_pokok_nominal>
<div class="cell_usp_pokok_nominal">
<input disabled class="input-data odd" id="usp-pokok-nominal" type="text" name="usp-pokok-nominal" value="<?php echo 'Rp. '.$usppokoknominal; ?>">
</div>
</div>
<div class=usp_pokok_keterangan>
<div class="cell_usp_pokok_keterangan">
<input disabled class="input-data odd" id="usp-pokok-keterangan" type="text" name="usp-pokok-keterangan" value="<?php echo $uspketerangan; ?>">
</div>
</div>
</div>
<div class=row_usp_jasa>
<div class=usp_jasa_no>
<div class="cell_usp_jasa_no"></div><span  class="teks_usp_jasa_no">6</span>
</div>
<div class=usp_jasa_jenis>
<div class="cell_usp_jasa_jenis"></div><span  class="teks_usp_jasa_jenis">JASA</span>
</div>
<div class=usp_jasa_ke>
<div class="cell_usp_jasa_ke">
<input disabled class="input-data even" id="usp-jasa-ke" type="text" name="usp-jasa-ke" value="<?php echo $uspke; ?>">
</div>
</div>
<div class=usp_jasa_dr>
<div class="cell_usp_jasa_dr">
<input disabled class="input-data even" id="usp-jasa-dr" type="text" name="usp-jasa-dr" value="<?php echo $uspdr; ?>">
</div>
</div>
<div class=usp_jasa_nominal>
<div class="cell_usp_jasa_nominal">
<input disabled class="input-data even" id="usp-jasa-nominal" type="text" name="usp-jasa-nominal" value="<?php echo 'Rp. '.$uspjasanominal; ?>">
</div>
</div>
<div class=usp_jasa_keterangan>
<div class="cell_usp_jasa_keterangan">
<input disabled class="input-data even" id="usp-jasa-keterangan" type="text" name="usp-jasa-keterangan" value="<?php echo $uspketerangan; ?>">
</div>
</div>
</div>
</div>
<div class=row_bke>
<div class=row_bke_merge_cell>
<div class="cell_bke"></div><span  class="teks_bke">BKE</span>
</div>
<div class=row_bke_pokok>
<div class=bke_pokok_no>
<div class="cell_bke_pokok_no"></div><span  class="teks_bke_pokok_no">7</span>
</div>
<div class=bke_pokok_jenis>
<div class="cell_bke_pokok_jenis"></div><span  class="teks_bke_pokok_jenis">POKOK</span>
</div>
<div class=bke_pokok_ke>
<div class="cell_bke_pokok_ke">
<input disabled class="input-data odd" id="bke-pokok-ke" type="text" name="bke-pokok-ke" value="<?php echo $bkeke; ?>">
</div>
</div>
<div class=bke_pokok_dr>
<div class="cell_bke_pokok_dr">
<input disabled class="input-data odd" id="bke-pokok-dr" type="text" name="bke-pokok-dr" value="<?php echo $bkedr; ?>">
</div>
</div>
<div class=bke_pokok_nominal>
<div class="cell_bke_pokok_nominal">
<input disabled class="input-data odd" id="bke-pokok-nominal" type="text" name="bke-pokok-nominal"  value="<?php echo 'Rp. '.$bkepokoknominal; ?>">
</div>
</div>
<div class=bke_pokok_keterangan>
<div class="cell_bke_pokok_keterangan">
<input disabled class="input-data odd" id="bke-pokok-keterangan" type="text" name="bke-pokok-keterangan" value="<?php echo $bkeketerangan; ?>">
</div>
</div>
</div>
<div class=row_bke_jasa>
<div class=bke_jasa_no>
<div class="cell_bke_jasa_no"></div><span  class="teks_bke_jasa_no">8</span>
</div>
<div class=bke_jasa_jenis>
<div class="cell_bke_jasa_jenis"></div><span  class="teks_bke_jasa_jenis">JASA</span>
</div>
<div class=bke_jasa_ke>
<div class="cell_bke_jasa_ke">
<input disabled class="input-data even" id="bke-jasa-ke" type="text" name="bke-jasa-ke" value="<?php echo $bkeke; ?>">
</div>
</div>
<div class=bke_jasa_dr>
<div class="cell_bke_jasa_dr">
<input disabled class="input-data even" id="bke-jasa-dr" type="text" name="bke-jasa-dr" value="<?php echo $bkedr; ?>">
</div>
</div>
<div class=bke_jasa_nominal>
<div class="cell_bke_jasa_nominal">
<input disabled class="input-data even" id="bke-jasa-nominal" type="text" name="bke-jasa-nominal" value="<?php echo 'Rp. '.$bkejasanominal; ?>">
</div>
</div>
<div class=bke_jasa_keterangan>
<div class="cell_bke_jasa_keterangan">
<input disabled class="input-data even" id="bke-jasa-keterangan" type="text" name="bke-jasa-keterangan" value="<?php echo $bkeketerangan; ?>">
</div>
</div>
</div>
</div>
<div class=row_ekstra>
<div class=row_ekstra_merge_cell>
<div class="cell_ekstra"></div><span  class="teks_ekstra">EKSTRA</span>
</div>
<div class=row_ekstra_pokok>
<div class=ekstra_pokok_no>
<div class="cell_ekstra_pokok_no"></div><span  class="teks_ekstra_pokok_no">9</span>
</div>
<div class=ekstra_pokok_jenis>
<div class="cell_ekstra_pokok_jenis"></div><span  class="teks_ekstra_pokok_jenis">POKOK</span>
</div>
<div class=ekstra_pokok_ke>
<div class="cell_ekstra_pokok_ke">
<input disabled class="input-data odd" id="ekstra-pokok-ke" type="text" name="ekstra-pokok-ke" value="<?php echo $ekstrake; ?>">
</div>
</div>
<div class=ekstra_pokok_dr>
<div class="cell_ekstra_pokok_dr">
<input disabled class="input-data odd" id="ekstra-pokok-dr" type="text" name="ekstra-pokok-dr" value="<?php echo $ekstradr; ?>">
</div>
</div>
<div class=ekstra_pokok_nominal>
<div class="cell_ekstra_pokok_nominal">
<input disabled class="input-data odd" id="ekstra-pokok-nominal" type="text" name="ekstra-pokok-nominal" value="<?php echo 'Rp. '.$ekstrapokoknominal; ?>">
</div>
</div>
<div class=ekstra_pokok_keterangan>
<div class="cell_ekstra_pokok_keterangan">
<input disabled class="input-data odd" id="ekstra-pokok-keterangan" type="text" name="ekstra-pokok-keterangan" value="<?php echo $ekstraketerangan; ?>">
</div>
</div>
</div>
<div class=row_ekstra_jasa>
<div class=ekstra_jasa_no>
<div class="cell_ekstra_jasa_no"></div><span  class="teks_ekstra_jasa_no">10</span>
</div>
<div class=ekstra_jasa_jenis>
<div class="cell_ekstra_jasa_jenis"></div><span  class="teks_ekstra_jasa_jenis">JASA</span>
</div>
<div class=ekstra_jasa_ke>
<div class="cell_ekstra_jasa_ke">
<input disabled class="input-data even" id="ekstra-jasa-ke" type="text" name="ekstra-jasa-ke" value="<?php echo $ekstrake; ?>">
</div>
</div>
<div class=ekstra_jasa_dr>
<div class="cell_ekstra_jasa_dr">
<input disabled class="input-data even" id="ekstra-jasa-dr" type="text" name="ekstra-jasa-dr" value="<?php echo $ekstradr; ?>">
</div>
</div>
<div class=ekstra_jasa_nominal>
<div class="cell_ekstra_jasa_nominal">
<input disabled class="input-data even" id="ekstra-jasa-nominal" type="text" name="ekstra-jasa-nominal" value="<?php echo 'Rp. '.$ekstrajasanominal; ?>">
</div>
</div>
<div class=ekstra_jasa_keterangan>
<div class="cell_ekstra_jasa_keterangan">
<input disabled class="input-data even" id="ekstra-jasa-keterangan" type="text" name="ekstra-jasa-keterangan" value="<?php echo $ekstraketerangan; ?>">
</div>
</div>
</div>
</div>
<div class=row_toko>
<div class=row_toko_merge_cell>
<div class="cell_toko"></div><span  class="teks_toko">TOKO</span>
</div>
<div class=row_toko_pokok>
<div class=toko_pokok_no>
<div class="cell_toko_pokok_no"></div><span  class="teks_toko_pokok_no">11</span>
</div>
<div class=toko_pokok_jenis>
<div class="cell_toko_pokok_jenis"></div><span  class="teks_toko_pokok_jenis">POKOK</span>
</div>
<div class=toko_pokok_ke>
<div class="cell_toko_pokok_ke">
<input disabled class="input-data odd" id="toko-pokok-ke" type="text" name="toko-pokok-ke" value="<?php echo $tokoke; ?>">
</div>
</div>
<div class=toko_pokok_dr>
<div class="cell_toko_pokok_dr">
<input disabled class="input-data odd" id="toko-pokok-dr" type="text" name="toko-pokok-dr" value="<?php echo $tokodr; ?>">
</div>
</div>
<div class=toko_pokok_nominal>
<div class="cell_toko_pokok_nominal">
<input disabled class="input-data odd" id="toko-pokok-nominal" type="text" name="toko-pokok-nominal" value="<?php echo 'Rp. '.$tokopokoknominal; ?>">
</div>
</div>
<div class=toko_pokok_keterangan>
<div class="cell_toko_pokok_keterangan">
<input disabled class="input-data odd" id="toko-pokok-keterangan" type="text" name="toko-pokok-keterangan" value="<?php echo $tokoketerangan; ?>">
</div>
</div>
</div>
<div class=row_toko_jasa>
<div class=toko_jasa_no>
<div class="cell_toko_jasa_no"></div><span  class="teks_toko_jasa_no">12</span>
</div>
<div class=toko_jasa_jenis>
<div class="cell_toko_jasa_jenis"></div><span  class="teks_toko_jasa_jenis">JASA</span>
</div>
<div class=toko_jasa_ke>
<div class="cell_toko_jasa_ke">
<input disabled class="input-data even" id="toko-jasa-ke" type="text" name="toko-jasa-ke" value="<?php echo $tokoke; ?>">
</div>
</div>
<div class=toko_jasa_dr>
<div class="cell_toko_jasa_dr">
<input disabled class="input-data even" id="toko-jasa-dr" type="text" name="toko-jasa-dr" value="<?php echo $tokodr; ?>">
</div>
</div>
<div class=toko_jasa_nominal>
<div class="cell_toko_jasa_nominal">
<input disabled class="input-data even" id="toko-jasa-nominal" type="text" name="toko-jasa-nominal" value="<?php echo 'Rp. '.$tokojasanominal; ?>">
</div>
</div>
<div class=toko_jasa_keterangan>
<div class="cell_toko_jasa_keterangan">
<input disabled class="input-data even" id="toko-jasa-keterangan" type="text" name="toko-jasa-keterangan" value="<?php echo $tokoketerangan; ?>">
</div>
</div>
</div>
</div>
<div class=row_haji>
<div class=row_haji_merge_cell>
<div class="cell_haji"></div><span  class="teks_haji">HAJI</span>
</div>
<div class=row_haji_pokok>
<div class=haji_pokok_no>
<div class="cell_haji_pokok_no"></div><span  class="teks_haji_pokok_no">13</span>
</div>
<div class=haji_pokok_jenis>
<div class="cell_haji_pokok_jenis"></div><span  class="teks_haji_pokok_jenis">POKOK</span>
</div>
<div class=haji_pokok_ke>
<div class="cell_haji_pokok_ke">
<input disabled class="input-data odd" id="haji-pokok-ke" type="text" name="haji-pokok-ke" value="<?php echo $hajike; ?>">
</div>
</div>
<div class=haji_pokok_dr>
<div class="cell_haji_pokok_dr">
<input disabled class="input-data odd" id="haji-pokok-dr" type="text" name="haji-pokok-dr" value="<?php echo $hajidr; ?>">
</div>
</div>
<div class=haji_pokok_nominal>
<div class="cell_haji_pokok_nominal">
<input disabled class="input-data odd" id="haji-pokok-nominal" type="text" name="haji-pokok-nominal" value="<?php echo 'Rp. '.$hajipokoknominal; ?>">
</div>
</div>
<div class=haji_pokok_keterangan>
<div class="cell_haji_pokok_keterangan">
<input disabled class="input-data odd" id="haji-pokok-keterangan" type="text" name="haji-pokok-keterangan" value="<?php echo $hajiketerangan; ?>">
</div>
</div>
</div>
<div class=row_haji_jasa>
<div class=haji_jasa_no>
<div class="cell_haji_jasa_no"></div><span  class="teks_haji_jasa_no">14</span>
</div>
<div class=haji_jasa_jenis>
<div class="cell_haji_jasa_jenis"></div><span  class="teks_haji_jasa_jenis">JASA</span>
</div>
<div class=haji_jasa_ke>
<div class="cell_haji_jasa_ke">
<input disabled class="input-data even" id="haji-jasa-ke" type="text" name="haji-jasa-ke" value="<?php echo $hajike; ?>">
</div>
</div>
<div class=haji_jasa_dr>
<div class="cell_haji_jasa_dr">
<input disabled class="input-data even" id="haji-jasa-dr" type="text" name="haji-jasa-dr" value="<?php echo $hajidr; ?>">
</div>
</div>
<div class=haji_jasa_nominal>
<div class="cell_haji_jasa_nominal">
<input disabled class="input-data even" id="haji-jasa-nominal" type="text" name="haji-jasa-nominal" value="<?php echo 'Rp. '.$hajijasanominal; ?>">
</div>
</div>
<div class=haji_jasa_keterangan>
<div class="cell_haji_jasa_keterangan">
<input disabled class="input-data even" id="haji-jasa-keterangan" type="text" name="haji-jasa-keterangan" value="<?php echo $hajiketerangan; ?>">
</div>
</div>
</div>
</div>
<div class=row_arisan>
<div class=arisan_no>
<div class="cell_arisan_no"></div><span  class="teks_arisan_no">15</span>
</div>
<div class=arisan_jenis>
<div class="cell_arisan_jenis"></div><span  class="teks_arisan_jenis">ARISAN</span>
</div>
<div class=arisan_ke>
<div class="cell_arisan_ke">
<input disabled class="input-data odd" id="arsisan-ke" type="text" name="arsisan-ke" value="-">
</div>
</div>
<div class=arisan_dr>
<div class="cell_arisan_dr">
<input disabled class="input-data odd" id="arsisan-dr" type="text" name="arsisan-dr" value="-">
</div>
</div>
<div class=arisan_nominal>
<div class="cell_arisan_nominal">
<input disabled class="input-data odd" id="arsisan-nominal" type="text" name="arsisan-nominal" value="<?php echo 'Rp. '; ?>">
</div>
</div>
<div class=arisan_keterangan>
<div class="cell_arisan_keterangan">
<input disabled class="input-data odd" id="arsisan-keterangan" type="text" name="arsisan-keterangan" value="<?php echo ''; ?>">
</div>
</div>
</div>
<div class=row_seragam>
<div class=seragam_no>
<div class="cell_seragam_no"></div><span  class="teks_seragam_no">16</span>
</div>
<div class=seragam_jenis>
<div class="cell_seragam_jenis"></div><span  class="teks_seragam_jenis">SERAGAM</span>
</div>
<div class=seragam_ke>
<div class="cell_seragam_ke">
<input disabled class="input-data even" id="seragam-ke" type="text" name="seragam-ke" value="-">
</div>
</div>
<div class=seragam_dr>
<div class="cell_seragam_dr">
<input disabled class="input-data even" id="seragam-dr" type="text" name="seragam-dr" value="-">
</div>
</div>
<div class=seragam_nominal>
<div class="cell_seragam_nominal">
<input disabled class="input-data even" id="seragam-nominal" type="text" name="seragam-nominal" value="<?php echo 'Rp. '; ?>">
</div>
</div>
<div class=seragam_keterangan>
<div class="cell_seragam_keterangan">
<input disabled class="input-data even" id="seragam-keterangan" type="text" name="seragam-keterangan" value="-">
</div>
</div>
</div>
<!-- Total -->
<?php
$total;
?>
<div class=row_jumlah>
<div class=jumlah_no>
<div class="cell_jumlah_no"></div><span  class="teks_jumlah_no">17</span>
</div>
<div class=jumlah_jenis>
<div class="cell_jumlah_jenis"></div><span  class="teks_jumlah_jenis">JUMLAH SETORAN</span>
</div>
<div class=jumlah_nominal>
<div class="cell_jumlah_nominal">
<input disabled class="input-data odd" id="jumlah-nominal" type="text" name="jumlah-nominal" value="<?php echo 'Rp. '.$jumlahTotal; ?>">
</div>
</div>
<div class=jumlah_keterangan>
<div class="cell_jumlah_keterangan">
<input disabled class="input-data odd" id="jumlah-keterangan" type="text" name="jumlah-keterangan">
</div>
</div>
</div>
</div>
<div class=penyetor>
<span  class="teks_penyetor">Penyetor,</span>
<span  class="teks_nama_penyetor"><?php echo $penyetor; ?></span>
</div>
<div class=penerima>
<span  class="teks_penerima">Penerima/Karyawan</span>
<span  class="teks_nama_penerima"><?php echo $admin; ?></span>
</div>
<div class=tombol >
<button class="tombol_simpan" onclick="menu('beranda')"><span  class="teks_simpan">Kembali</span></button>
<button class="tombol_cetak" onclick="window.print()"><span  class="teks_cetak">Cetak</span></button>
</div>
</div>

<script src="<?php echo $siteurl; ?>config.js"></script>
<script src="<?php echo $siteurl; ?>assets/js/pimpinan.js"></script>

</body>
</html>
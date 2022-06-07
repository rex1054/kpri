<?php
include('../config.php');
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
<link href="<?php echo $siteurl; ?>assets/css/registrasi.css" rel="stylesheet">
</head>
<body>
<div class=registrasi>
<div class=header_container>
<div class="logo"></div><span  class="teks_koperasi">KOPERASI PEGAWAI REPUBLIK INDONESIA</span><span  class="teks_nama_koperasi">WIYATA USAHA</span><span  class="teks_alamat_koperasi">Jl. Krakatau No.216, Kencong, Kabupaten Jember, Jawa Timur 68167
Telepon: (0336) 321386</span>
<div class="garis_header"></div>
</div>
<div class=form_container>
<form action="registrasi.php" method="POST" enctype="multipart/form-data">
<div class=form_1_container>
<div class="container_1_background"></div>
<span  class="text_registrasi">REGISTRASI</span>
<div class=nama_pengguna>
<span  class="teks_nama">NAMA </span>
<input class="special kolom_nama" type="text" id="nama" name="nama" required placeholder="Nama Anda">
</div>
<div class=kata_sandi>
<span  class="teks_kata_sandi">KATA SANDI</span>
<input class="special kolom_kata_sandi" type="password" id="sandi" name="sandi" required placeholder="Sandi Anda">
</div>
<div class=jenis_kelamin>
<span  class="teks_jenis_kelamin">JENIS KELAMIN</span>
<div class=kelamin>
<input class="laki_laki" type="radio" id="cowok" name="kelamin" value="1" checked>
<label style="margin-left: 25px;" for="cowok">Laki-laki</label>
<input class="perempuan" type="radio" id="cewek" name="kelamin" value="2">
<label style="margin-left: 32px;" for="cewek">Perempuan</label>
</div>
</div>
<div class=nip>
<span  class="teks_nip">NIP</span>
<input class="special kolom_nip" type="number" id="nip" name="nip" required placeholder="NIP Anda">
</div>
<div class=tempat_lahir>
<span  class="teks_tempat_lahir">TEMPAT LAHIR</span>
<input class="special kolom_tempat_lahir" type="text" id="tempat-lahir" name="tempat-lahir" required placeholder="Tempat Lahir Anda">
</div>
<div class=tanggal_lahir>
<span  class="teks_tanggal_lahir">TANGGAL LAHIR</span>
<input class="special kolom_tanggal_lahir" type="date" id="tanggal-lahir" name="tanggal-lahir" required placeholder="Tanggal Lahir Anda">
</div>
<div class=alamat_rumah>
<span  class="teks_tanggal_lahir">ALAMAT RUMAH</span>
<input class="special kolom_alamat_rumah" type="text" id="alamat" name="alamat" required placeholder="Alamat Rumah Anda">
</div>
</div>
<div class=form_2_container>
<div class="container_2_background"></div>
<div class=kode_pos>
<span  class="teks_kode_pos">KODE POS</span>
<input class="special kolom_kode_pos" type="number" id="pos" name="pos" required placeholder="Kode Pos Anda">
</div>
<div class=nomor_hp>
<span  class="teks_nomor_hp">NOMOR HP</span>
<input class="special kolom_nomer_hp" type="number" id="hp" name="hp" required placeholder="Nomor HP Anda">
</div>
<div class=nama_instansi>
<span  class="teks_nama_instansi">NAMA INSTANSI</span>
<input class="special kolom_nama_instansi" type="text" id="instansi" name="instansi" required placeholder="Nama Instansi Anda">
</div>
<div class=alamat_instansi>
<span  class="teks_alamat_instansi">ALAMAT INSTANSI</span>
<input class="special kolom_alamat_instansi" type="text" id="alamat-instansi" name="alamat-instansi" required placeholder="Alamat Instansi Anda">
</div>
<div class=foto_ktp_suami>
<span  class="teks_ktp_suami">FOTO KTP SUAMI</span>
<input class="special input-file kolom_ktp_suami" type="file" id="ktp-suami" name="ktp-suami" required placeholder="Unggah Foto KTP Suami Anda">
</div>
<div class=foto_ktp_istri>
<span  class="teks_ktp_istri">FOTO KTP ISTRI</span>
<input class="special input-file kolom_ktp_istri" type="file" id="ktp-istri" name="ktp-istri" required placeholder="Unggah Foto KTP Istri Anda">
</div>
<div class=foto_3x4>
<span  class="teks_foto_3x4">FOTO UKURAN 3X4</span>
<input class="special input-file kolom_foto_3x4" type="file" id="foto-3x4" name="foto-3x4" required placeholder="Unggah Foto 3x4 Anda">
</div>
<span  class="teks_persyaratan">Lihat persyaratan <a href="#" onclick="syarat()">di sini</a></span>
<span  class="teks_punya_akun">Sudah punya akun? Masuk <a href="#" onclick="masuk()">di sini</a></span>
<button type="submit" class=tombol_registrasi>
<span  class="teks_registrasi">REGISTRASI</span>
</button>
</form>
</div>
</div>
<script src="../config.js"></script>
<script src="../assets/js/main.js"></script>
</body>
</html>
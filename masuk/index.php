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
    <link href="<?php echo $siteurl; ?>assets/css/masuk.css" rel="stylesheet">
</head>
<body>
<div class=masuk>
  <div class=header_container>
    <div class="logo"></div>
    <span  class="teks_koperasi">KOPERASI PEGAWAI REPUBLIK INDONESIA</span>
    <span  class="teks_nama_koperasi">WIYATA USAHA</span>
    <span  class="teks_alamat_koperasi">Jl. Krakatau No.216, Kencong, Kabupaten Jember, Jawa Timur 68167
Telepon: (0336) 321386</span>
    <div class="garis_header"></div>
  </div>
  <div class=form_container>
      <form action="login.php" method="POST" enctype="multipart/form-data">
    <div class="container_background"></div>
    <span  class="teks_masuk">MASUK</span>
    <div class=nip>
    <input type="number" class="kolom_nip text-center" name="nip" required autofocus placeholder="199805012016011003">
      <span  class="teks_nip">NIP</span>
    </div>
    <div class=kata_sandi>
    <input type="password" class="kolom_kata_sandi text-center" name="sandi" required placeholder="Kata Sandi Anda">
      <span  class="teks_kata_sandi">KATA SANDI</span>
    </div>
    <div class=tombol_masuk>
      <button class="tombol_masuk_background" type="submit">
      <span  class="teks_tombol_masuk">MASUK</span>
      </button>
    </div>
    <div class=belum_punya_akun>
        <span  class="teks_belum_punya_akun">Belum punya akun? Registrasi</span>
        <span  class="teks_di_sini"><a href="<?php echo $siteurl; ?>registrasi/">di sini</a></span></div>
  </div>
      </form>
</div>
</body>
</html>
<?php
session_start();
include('../../../config.php');
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
<link href="<?php echo $siteurl; ?>assets/css/admin/detil-transaksi.css" rel="stylesheet">
<link href="<?php echo $siteurl; ?>assets/css/admin/tambah-pinjaman.css" rel="stylesheet">
</head>
<body>
<div class=melihat_detail_transaksi>
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
<form action="simpan.php" method="POST" enctype="multipart/form-data">
<div class=form_container>
<span  class="tambah_data_peminjaman">TAMBAH AJUAN PEMINJAMAN</span>
      <div class=nip><span  class="teks_nip">NIP</span>
        <input class="input_nip" id="nip" type="number" name="nip" onkeyup="searchAkun()" required></input>
      </div>
      <div class=nama><span  class="teks_nama">Nama</span>
        <input class="input_nama" id="nama" name="nama" type="text" disabled>
      </div>
      <div class=hp><span  class="teks_hp">Nomer Hp</span>
        <input class="input_hp" id="hp" name="hp" type="number" disabled>
      </div>
      <div class=instansi><span  class="teks_instansi">Instansi</span>
        <input class="input_instansi" id="instansi" name="instansi" type="text" disabled>
      </div>
      <div class=jenis>
        <span  class="teks_jenis">Jenis pinjaman</span>
        <input class="bke-radio" type="radio" name="jenis" value="1" checked><span class=bke>USP</span>
        <input class="haji-radio" type="radio" name="jenis" value="2"><span class=haji>BKE</span>
        <input class="ekstra-radio" type="radio" name="jenis" value="3"><span  class="ekstra">Ekstra</span>
        <input class="toko-radio" type="radio" name="jenis" value="4"><span  class="toko">Toko</span>
        <input class="usp-radio" type="radio" name="jenis" value="5"><span  class="usp">Haji</span>
    </div>
      <div class=jumlah><span  class="teks_jumlah">Jumlah pinjaman</span>
        <input class="input_jumlah" type="number" name="jumlah" required>
      </div>
      <div class=tempo><span  class="teks_tempo">Tempo angsuran</span>
        <input class="input_tempo" type="number" name="tempo" required>
      </div>
      <div class=penghasilan><span  class="teks_penghasilan">Penghasilan bersih</span>
        <input class="input_penghasilan" type="number" name="penghasilan" required>
      </div>
      <div class=diangsur><span  class="teks_diangsur">Diangsur</span>
        <input class="input_diangsur" type="number" value="1" disabled>
      </div>
      <div class=tombols>
        <button class="tombol_simpan tombol"><span  class="teks_simpan">SIMPAN</span></button>
      </div>
    </div>
</form>
<button class="tombol_batal tombol" onclick="menu('ajuan')"><span  class="teks_batal">BATAL</span></button>
</div>

<script src="<?php echo $siteurl; ?>config.js"></script>
<script src="<?php echo $siteurl; ?>assets/js/jquery.min.js"></script>
<script src="<?php echo $siteurl; ?>assets/js/admin.js"></script>
<script>
function searchAkun(){
    var a = document.getElementById('nip').value;
    console.log('value : '+a);
    
    $.ajax({
        type: 'post',
        url: 'getAkun.php',
        data: {
            get_option: a
        },
        dataType: 'json',
        success: function(data){
          $('#nama').val(data[0]);
          $('#hp').val(data[1]);
          $('#instansi').val(data[2]);
    }
    });
}
</script>

</body>
</html>
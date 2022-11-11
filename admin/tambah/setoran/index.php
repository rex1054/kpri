<?php
include('../../../config.php');
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
<link href="<?php echo $siteurl; ?>assets/css/admin/tambah-transaksi.css" rel="stylesheet">
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

<div class=main_container_810_36>
<div class="container_background_810_37"></div>
<div class=form_container_810_38>
    <span  class="tambah_setoran_810_39">TAMBAH SETORAN</span>
<form action="simpan.php" method="POST" enctype="multipart/form-data">
<div class=bulan style="z-index: 999;"><span  class="teks_bulan">Setoran bulan:</span>
<input class="input-bulan ajuan-input" id="bulan" name="bulan" type="month"></div>
<span  class="teks_tanggal">Tanggal Transaksi:</span>
<span  class="value_tanggal"><?php echo date("d-m-Y"); ?></span>
<div class=nip_810_40>
    <span  class="teks_nip_810_41">NIP</span>
    <span  class="teks_total_810_78"><b><u>TOTAL SETORAN :</u></b></span>
    <span  class="teks_nominal_813_92" id="nominal"></span>
<input class="input_nip_810_42 kpri-input" name="nip" id="nip" type="number" placeholder="Masukkan NIP" onkeyup="searchAkun()">
</div>
<div class=nama_810_45><span  class="teks_nama_810_46">Nama</span>
<input class="input_nama_810_47 kpri-input" name="nama" id="nama" type="text" placeholder="Masukkan NIP Dulu" disabled>
</div>
<div class=hp_810_48><span  class="teks_hp_810_49">Nomer Hp</span>
<input class="input_hp_810_50 kpri-input" name="hp" id="hp" type="number" placeholder="Masukkan NIP Dulu" disabled>
</div>
<div class=instansi_810_51><span  class="teks_instansi_810_52">Instansi</span>
<input class="input_instansi_810_53 kpri-input" name="instansi" id="instansi" type="text" placeholder="Masukkan NIP Dulu" disabled>
</div>
<div class=jenis_810_54>
    <span  class="teks_jenis_810_55">Jenis Setoran</span>
<select class="input_jenis_810_75 kpri-input" name="jenis" id="jenis" onchange="ceksetoran(this.value)">
    <option value="" selected disabled>Pilih Jenis Setoran</option>
    <option value="1">Simpanan Pokok</option>
    <option value="2">Simpanan Wajib</option>
    <option value="3">Tabungan</option>
    <option value="4">Sukarela</option>
    <option value="5">Setor Pinjaman</option>
    <option value="6">Arisan</option>
    <option value="7">Seragam</option>
</select>
</div>
<div class=angsuran_810_60><span  class="teks_angsuran_810_61">Angsuran Ke / Dari</span>
<input class="input_ke_810_62 kpri-input" name="ke" id="ke" type="number">
<input class="input_dari_810_76 kpri-input" name="dari" id="dari" type="number">
<span  class="teks_slash_810_77">/</span>
</div>
<div class=pokok_810_63><span  class="teks_jasa_810_64">Pokok</span>
<input class="input_pokok_810_65 kpri-input" name="pokok" id="pokok" type="number" onkeyup="jumlah()" onchange="jumlah()">
</div>
<div class=jasa_810_66><span  class="teks_jasa_810_67">Jasa</span>
<input class="input_jasa_810_68 kpri-input" name="jasa" id="jasa" type="number" onkeyup="jumlah()" onchange="jumlah()">
</div>
<div class=keterangan_810_69><span  class="teks_keterangan_810_70">Keterangan</span>
<input class="input_keterangan_810_71 kpri-input" name="ket" id="ket" type="text">
</div>
<div class=tombol_810_72>
<button type="submit" class="tombol_tambah_810_73 tombol"><span  class="teks_tambah_810_74">TAMBAH</span></button>
</div>
</form>
</div>
</div>


<script src="<?php echo $siteurl; ?>config.js"></script>
<script src="<?php echo $siteurl; ?>assets/js/jquery.min.js"></script>
<script src="<?php echo $siteurl; ?>assets/js/admin.js"></script>
<script>
function ceksetoran(a){
    var ke = document.getElementById('ke');
    var dari = document.getElementById('dari');
    var jasa = document.getElementById('jasa');
    var id = document.getElementById('nip').value;
    if(a < 5 || a > 9){
        ke.setAttribute('disabled', '');
        dari.setAttribute('disabled', '');
        jasa.setAttribute('disabled', '');
    } else {
        ke.removeAttribute('disabled')
        dari.removeAttribute('disabled')
        jasa.removeAttribute('disabled')

        $.ajax({
        type: 'post',
        url: 'getpinjaman.php',
        data: {
            get_option: id
        },
        dataType: 'json',
        success: function(data){
          $('#ke').val(data[0]);
          $('#dari').val(data[1]);
          $('#pokok').val(data[2]);
          $('#jasa').val(data[3]);
    }
    });
    }
    
}

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
<script>
function jumlah(){
    var moneyFormatter  = new Intl.NumberFormat();
    var a = document.getElementById('pokok').value;
    var b = document.getElementById('jasa').value;
    
    if(a == null) {
        a=0;
    }
    if(b == null) {
        b=0;
    }
    
    
    var z = Number(a)+Number(b);
    var zz = moneyFormatter.format(z);
    var x = document.getElementById('nominal');
    x.innerHTML = 'RP. '+zz;
}
</script>

</body>
</html>
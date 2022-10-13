<?php
include('../../../config.php');
session_start();
if(isset($_SESSION['nip'])){} else {header('location:'.$siteurl); }
$fullName = explode(" ", $_SESSION['nama']);
$nick = $fullName[0];
$nip;
if(isset($_GET['nip'])){
  $nip = $_GET['nip'];
} else {
  $nip = 0;
}

$data;

$sql = "SELECT akun.nama, akun.nip, kelamin.kelamin, akun.tempat_lahir, akun.tanggal_lahir, akun.alamat, akun.pos, akun.hp, akun.status as id_status, akun.jabatan as id_jabatan, instansi.instansi, instansi.alamat as alamat_instansi, akun.ktp_suami, akun.ktp_istri, akun.foto_3x4, status_akun.status, jabatan.jabatan, akun.gabung FROM akun join kelamin on akun.kelamin = kelamin.id join instansi on akun.instansi = instansi.id join status_akun on akun.status = status_akun.id join jabatan on akun.jabatan = jabatan.id WHERE akun.nip = ".$nip;

$query = $con->query($sql);
if($query->num_rows == 0){
  ?>
<script>
alert("Data Tidak Ditemukan");
window.open('<?php echo $siteurl; ?>anggota', '_SELF')
</script>
<?php
} else {
  $data = $query->fetch_assoc();
}

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
    <link href="<?php echo $siteurl; ?>assets/css/admin/update-profil.css" rel="stylesheet">

</head>

<body>
<div class=mengubah_data_pengguna>
  <div class=header_container>
    <div class="logo"></div><span  class="teks_koperasi">KOPERASI PEGAWAI REPUBLIK INDONESIA</span><span  class="teks_nama_koperasi">WIYATA USAHA</span><span  class="teks_alamat_koperasi">Jl. Krakatau No.216, Kencong, Kabupaten Jember, Jawa Timur 68167
Telepon: (0336) 321386</span>
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
      <div class="menu menu_simpanan aktif" onclick="menu('profil')">
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
    <form action="simpan.php" method="POST" enctype="multipart/form-data">
    <div class=form_kiri_container>
      <div class=nama><span  class="teks_nama">Nama</span>
        <input class="input_nama input-profil" type="text" name="nama" value="<?php echo $data['nama']; ?>" placeholder="<?php echo $data['nama']; ?>" disabled>
      </div>
      <div class=nip><span  class="teks_nip">NIP</span>
        <input class="input_nip input-profil" type="number" maxlength="20" name="nip" value="<?php echo $data['nip']; ?>" placeholder="<?php echo $data['nip']; ?>" disabled>
      </div>
      <div class=kelamin>
        <span class="teks_kelamin">Jenis kelamin</span>
        <span class="laki_laki"><input type="radio" name="kelamin" value="1" <?php if($data['kelamin'] == "Pria") { echo "checked"; } ?> disabled>Laki-laki</span>
        <span class="perempuan"><input type="radio" name="kelamin" value="2" <?php if($data['kelamin'] == "Wanita") { echo "checked"; } ?> disabled>Perempuan</span></div>
      <div class=tempat_lahir><span  class="teks_tempat_lahir">Tempat lahir</span>
        <input class="input_tempat_lahir input-profil" type="text" name="tempat-lahir" value="<?php echo $data['tempat_lahir']; ?>" placeholder="<?php echo $data['tempat_lahir']; ?>" disabled>
      </div>
      <div class=tanggal_lahir><span  class="teks_tanggal_lahir">Tanggal lahir</span>
      <?php
      $date=date_create($data['tanggal_lahir']);
      ?>
        <input class="input_tanggal_lahir input-profil" type="date" name="tanggal-lahir" value="<?php echo date_format($date,"Y-m-d"); ?>" placeholder="<?php echo date_format($date,"Y-m-d"); ?>" disabled>
      </div>
      <div class=alamat_rumah><span  class="teks_alamat_rumah">Alamat rumah</span>
        <input class="input_alamat_rumah input-profil" type="text" name="alamat-rumah" value="<?php echo $data['alamat']; ?>" placeholder="<?php echo $data['alamat']; ?>">
      </div>
    </div>
    <div class=form_kanan_container>
      <div class=pos><span  class="kode_pos">Kode pos</span>
        <input class="kolom_kode_pos input-profil" type="number" name="pos" maxlength="5" value="<?php echo $data['pos']; ?>" placeholder="<?php echo $data['pos']; ?>" required>
      </div>
      <div class=hp><span  class="nomor_hp">Nomor HP</span>
        <input class="kolom_nomor_hp input-profil" type="number" name="hp" value="<?php echo $data['hp']; ?>" placeholder="<?php echo $data['hp']; ?>" required>
      </div>
      <div class=instansi><span  class="nama_instansi">Nama instansi</span>
        <input class="kolom_nama_isntansi input-profil" type="text" name="instansi" value="<?php echo $data['instansi']; ?>" placeholder="<?php echo $data['instansi']; ?>" required>
      </div>
      <div class=alamat><span  class="alamat_instansi">Alamat instansi</span>
        <input class="kolom_alamat_kantor input-profil" type="text" name="alamat-instansi" value="<?php echo $data['alamat_instansi']; ?>" placeholder="<?php echo $data['alamat_instansi']; ?>" required>
      </div>
    </div>
    <div class=tombol>
      <div class=simpan>
        <button type="submit" class="tombol_simpan"><span  class="teks_simpan">SIMPAN</span></button>
      </div>
      <div class=kembali>
        <div class="tombol_kembali" onclick="menu('profil')"><span  class="teks_kembali">KEMBALI</div>
</span>
      </div>
    </div>
</form>
  </div>
</div>

    <script src="<?php echo $siteurl; ?>config.js"></script>
    <script src="<?php echo $siteurl; ?>assets/js/main.js"></script>
    <script src="<?php echo $siteurl; ?>assets/js/anggota.js"></script>
</body>
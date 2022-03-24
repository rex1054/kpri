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
    <meta name="author" content="REXYST">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <!-- style -->
    <link href="<?php echo $siteurl; ?>assets/css/main.css" rel="stylesheet">
    <link href="<?php echo $siteurl; ?>assets/css/admin/detail.css" rel="stylesheet">
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
          <span  class="teks_beranda">Beranda</span>
        </div>
    </div>
    <div class=pegawai_menu>
      <div class="menu menu_pegawai" onclick="menu('pegawai')">
      <span  class="teks_pegawai">Pegawai</span>
      </div>
    </div>
    <div class=anggota_menu>
      <div class="menu menu_daftar_nasabah" onclick="menu('anggota')">
      <span  class="teks_anggota">Anggota</span>
      </div>
    </div>
    <div class=pinjaman_menu>
      <div class="menu menu_pinjaman" onclick="menu('pinjaman')">
      <span  class="teks_pinjaman">Pinjaman</span>
      </div>
    </div>
    <div class=simpanan_menu>
      <div class="menu menu_simpanan" onclick="menu('simpanan')">
      <span  class="teks_simpanan">Simpanan</span>
      </div>
    </div>
    <div class=profil_menu>
      <div class="menu menu_profil" onclick="menu('profil')">
      <span  class="teks_profil">Profil</span>
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
    </div>
    <span  class="teks_menu">©KPRI-Wiyata Usaha 2021</span>
  </div>

  <div class=main_container>
    <div class="container_background"></div><span  class="teks_judul">BUKTI SETORAN ANGGOTA</span>
    <div class=user_data_container>
      <div class=nip><span  class="teks_nip">NIP</span><span  class="data_nip">:</span></div>
      <div class=nama><span  class="teks_nama">Nama</span><span  class="data_nama">:</span></div>
      <div class=bulan><span  class="teks_bulan">BULAN</span><span  class="data_bulan">:</span></div>
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
              <input class="input-data odd" id="sp-ke" type="number" name="sp-ke">
          </div>
        </div>
        <div class=sp_dr>
          <div class="cell_sp_dr">
          <input class="input-data odd" id="sp-dr" type="number" name="sp-dr">
          </div>
        </div>
        <div class=sp_nominal>
          <div class="cell_sp_nominal">
          <input class="input-data odd" id="sp-nominal" type="number" name="sp-nominal">
          </div>
        </div>
        <div class=sp_keterangan>
          <div class="cell_sp_keterangan">
          <input class="input-data odd" id="sp-keterangan" type="text" name="sp-keterangan">
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
          <input class="input-data even" id="sw-ke" type="number" name="sw-ke">
          </div>
        </div>
        <div class=sw_dr>
          <div class="cell_sw_dr">
          <input class="input-data even" id="sw-dr" type="number" name="sw-dr">
          </div>
        </div>
        <div class=sw_nominal>
          <div class="cell_sw_nominal">
          <input class="input-data even" id="sw-nominal" type="number" name="sw-nominal">
          </div>
        </div>
        <div class=sw_keterangan>
          <div class="cell_sw_keterangan">
          <input class="input-data even" id="sw-keterangan" type="text" name="sw-keterangan">
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
          <input class="input-data odd" id="tab-ke" type="number" name="tab-ke">
          </div>
        </div>
        <div class=tab_dr>
          <div class="cell_tab_dr">
          <input class="input-data odd" id="tab-dr" type="number" name="tab-dr">
          </div>
        </div>
        <div class=tab_nominal>
          <div class="cell_tab_nominal">
          <input class="input-data odd" id="tab-nominal" type="number" name="tab-nominal">
          </div>
        </div>
        <div class=tab_keterangan>
          <div class="cell_tab_keterangan">
          <input class="input-data odd" id="tab-keterangan" type="text" name="tab-keterangan">
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
          <div class="cell_sr_ke"></div><span  class="data_sr_ke">-</span>
        </div>
        <div class=sr_dr>
          <div class="cell_sr_dr"></div><span  class="data_sr_dr">-</span>
        </div>
        <div class=sr_nominal>
          <div class="cell_sr_nominal"></div><span  class="data_sr_nominal">-</span>
        </div>
        <div class=sr_keterangan>
          <div class="cell_sr_keterangan"></div><span  class="data_sr_keterangan">-</span>
        </div>
      </div>
      <div class=row_usp>
        <div class=row_usp_pokok>
          <div class=usp_pokok_no>
            <div class="cell_usp_pokok_no"></div><span  class="teks_usp_pokok_no">5</span>
          </div>
          <div class=usp_pokok_jenis>
            <div class="cell_usp_pokok_jenis"></div><span  class="teks_usp_pokok_jenis">POKOK</span>
          </div>
          <div class=usp_pokok_ke>
            <div class="cell_usp_pokok_ke"></div><span  class="data_usp_pokok_ke">-</span>
          </div>
          <div class=usp_pokok_dr>
            <div class="cell_usp_pokok_dr"></div><span  class="data_usp_pokok_dr">-</span>
          </div>
          <div class=usp_pokok_nominal>
            <div class="cell_usp_pokok_nominal"></div><span  class="data_usp_pokok_nominal">-</span>
          </div>
          <div class=usp_pokok_keterangan>
            <div class="cell_usp_pokok_keterangan"></div><span  class="data_usp_pokok_keterangan">-</span>
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
            <div class="cell_usp_jasa_ke"></div><span  class="data_usp_jasa_ke">-</span>
          </div>
          <div class=usp_jasa_dr>
            <div class="cell_usp_jasa_dr"></div><span  class="data_usp_jasa_dr">-</span>
          </div>
          <div class=usp_jasa_nominal>
            <div class="cell_usp_jasa_nominal"></div><span  class="data_usp_jasa_nominal">-</span>
          </div>
          <div class=usp_jasa_keterangan>
            <div class="cell_usp_jasa_keterangan"></div><span  class="data_usp_jasa_keterangan">-</span>
          </div>
        </div>
        <div class=ros_usp_merge_cell>
          <div class="cell_usp"></div><span  class="teks_usp">USP</span>
        </div>
      </div>
      <div class=row_bke>
        <div class=row_bke_pokok>
          <div class=bke_pokok_no>
            <div class="cell_bke_pokok_no"></div><span  class="teks_bke_pokok_no">7</span>
          </div>
          <div class=bke_pokok_jenis>
            <div class="cell_bke_pokok_jenis"></div><span  class="teks_bke_pokok_jenis">POKOK</span>
          </div>
          <div class=bke_pokok_ke>
            <div class="cell_bke_pokok_ke"></div><span  class="data_bke_pokok_ke">-</span>
          </div>
          <div class=bke_pokok_dr>
            <div class="cell_bke_pokok_dr"></div><span  class="data_bke_pokok_dr">-</span>
          </div>
          <div class=bke_pokok_nominal>
            <div class="cell_bke_pokok_nominal"></div><span  class="data_bke_pokok_nominal">-</span>
          </div>
          <div class=bke_pokok_keterangan>
            <div class="cell_bke_pokok_keterangan"></div><span  class="data_bke_pokok_keterangan">-</span>
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
            <div class="cell_bke_jasa_ke"></div><span  class="data_bke_jasa_ke">-</span>
          </div>
          <div class=bke_jasa_dr>
            <div class="cell_bke_jasa_dr"></div><span  class="data_bke_jasa_dr">-</span>
          </div>
          <div class=bke_jasa_nominal>
            <div class="cell_bke_jasa_nominal"></div><span  class="data_bke_jasa_nominal">-</span>
          </div>
          <div class=bke_jasa_keterangan>
            <div class="cell_bke_jasa_keterangan"></div><span  class="data_bke_jasa_keterangan">-</span>
          </div>
        </div>
        <div class=row_bke_merge_cell>
          <div class="cell_bke"></div><span  class="teks_bke">BKE</span>
        </div>
      </div>
      <div class=row_ekstra>
        <div class=row_ekstra_pokok>
          <div class=ekstra_pokok_no>
            <div class="cell_ekstra_pokok_no"></div><span  class="teks_ekstra_pokok_no">9</span>
          </div>
          <div class=ekstra_pokok_jenis>
            <div class="cell_ekstra_pokok_jenis"></div><span  class="teks_ekstra_pokok_jenis">POKOK</span>
          </div>
          <div class=ekstra_pokok_ke>
            <div class="cell_ekstra_pokok_ke"></div><span  class="data_ekstra_pokok_ke">-</span>
          </div>
          <div class=ekstra_pokok_dr>
            <div class="cell_ekstra_pokok_dr"></div><span  class="data_ekstra_pokok_dr">-</span>
          </div>
          <div class=ekstra_pokok_nominal>
            <div class="cell_ekstra_pokok_nominal"></div><span  class="data_ekstra_pokok_nominal">-</span>
          </div>
          <div class=ekstra_pokok_keterangan>
            <div class="cell_ekstra_pokok_keterangan"></div><span  class="data_ekstra_pokok_keterangan">-</span>
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
            <div class="cell_ekstra_jasa_ke"></div><span  class="data_ekstra_jasa_ke">-</span>
          </div>
          <div class=ekstra_jasa_dr>
            <div class="cell_ekstra_jasa_dr"></div><span  class="data_ekstra_jasa_dr">-</span>
          </div>
          <div class=ekstra_jasa_nominal>
            <div class="cell_ekstra_jasa_nominal"></div><span  class="data_ekstra_jasa_nominal">-</span>
          </div>
          <div class=ekstra_jasa_keterangan>
            <div class="cell_ekstra_jasa_keterangan"></div><span  class="data_ekstra_jasa_keterangan">-</span>
          </div>
        </div>
        <div class=row_ekstra_merge_cell>
          <div class="cell_ekstra"></div><span  class="teks_ekstra">EKSTRA</span>
        </div>
      </div>
      <div class=row_toko>
        <div class=row_toko_pokok>
          <div class=toko_pokok_no>
            <div class="cell_toko_pokok_no"></div><span  class="teks_toko_pokok_no">11</span>
          </div>
          <div class=toko_pokok_jenis>
            <div class="cell_toko_pokok_jenis"></div><span  class="teks_toko_pokok_jenis">POKOK</span>
          </div>
          <div class=toko_pokok_ke>
            <div class="cell_toko_pokok_ke"></div><span  class="data_toko_pokok_ke">-</span>
          </div>
          <div class=toko_pokok_dr>
            <div class="cell_toko_pokok_dr"></div><span  class="data_toko_pokok_dr">-</span>
          </div>
          <div class=toko_pokok_nominal>
            <div class="cell_toko_pokok_nominal"></div><span  class="data_toko_pokok_nominal">-</span>
          </div>
          <div class=toko_pokok_keterangan>
            <div class="cell_toko_pokok_keterangan"></div><span  class="data_toko_pokok_keterangan">-</span>
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
            <div class="cell_toko_jasa_ke"></div><span  class="data_toko_jasa_ke">-</span>
          </div>
          <div class=toko_jasa_dr>
            <div class="cell_toko_jasa_dr"></div><span  class="data_toko_jasa_dr">-</span>
          </div>
          <div class=toko_jasa_nominal>
            <div class="cell_toko_jasa_nominal"></div><span  class="data_toko_jasa_nominal">-</span>
          </div>
          <div class=toko_jasa_keterangan>
            <div class="cell_toko_jasa_keterangan"></div><span  class="data_toko_jasa_ketarangan">-</span>
          </div>
        </div>
        <div class=row_toko_merge_cell>
          <div class="cell_toko"></div><span  class="teks_toko">TOKO</span>
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
            <div class="cell_haji_pokok_ke"></div><span  class="data_haji_pokok_ke">-</span>
          </div>
          <div class=haji_pokok_dr>
            <div class="cell_haji_pokok_dr"></div><span  class="data_haji_pokok_dr">-</span>
          </div>
          <div class=haji_pokok_nominal>
            <div class="cell_haji_pokok_nominal"></div><span  class="data_haji_pokok_nominal">-</span>
          </div>
          <div class=haji_pokok_keterangan>
            <div class="cell_haji_pokok_keterangan"></div><span  class="data_haji_pokok_keterangan">-</span>
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
            <div class="cell_haji_jasa_ke"></div><span  class="data_haji_jasa_ke">-</span>
          </div>
          <div class=haji_jasa_dr>
            <div class="cell_haji_jasa_dr"></div><span  class="data_haji_jasa_dr">-</span>
          </div>
          <div class=haji_jasa_nominal>
            <div class="cell_haji_jasa_nominal"></div><span  class="data_haji_jasa_nominal">-</span>
          </div>
          <div class=haji_jasa_keterangan>
            <div class="cell_haji_jasa_keterangan"></div><span  class="data_haji_jasa_keterangan">-</span>
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
          <div class="cell_arisan_ke"></div><span  class="data_arisan_ke">-</span>
        </div>
        <div class=arisan_dr>
          <div class="cell_arisan_dr"></div><span  class="data_arisan_dr">-</span>
        </div>
        <div class=arisan_nominal>
          <div class="cell_arisan_nominal"></div><span  class="data_arisan_nominal">-</span>
        </div>
        <div class=arisan_keterangan>
          <div class="cell_arisan_keterangan"></div><span  class="data_arisan_keterangan">-</span>
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
          <div class="cell_seragam_ke"></div><span  class="data_seragam_ke">-</span>
        </div>
        <div class=seragam_dr>
          <div class="cell_seragam_dr"></div><span  class="data_seragam_dr">-</span>
        </div>
        <div class=seragam_nominal>
          <div class="cell_seragam_nominal"></div><span  class="data_seragam_nominal">-</span>
        </div>
        <div class=seragam_keterangan>
          <div class="cell_seragam_keterangan"></div><span  class="data_seragam_keterangan">-</span>
        </div>
      </div>
      <div class=row_jumlah>
        <div class=jumlah_no>
          <div class="cell_jumlah_no"></div><span  class="teks_jumlah_no">17</span>
        </div>
        <div class=jumlah_jenis>
          <div class="cell_jumlah_jenis"></div><span  class="teks_jumlah_jenis">JUMLAH SETORAN</span>
        </div>
        <div class=jumlah_nominal>
          <div class="cell_jumlah_nominal"></div><span  class="data_jumlah_nominal">-</span>
        </div>
        <div class=jumlah_keterangan>
          <div class="cell_jumlah_keterangan"></div><span  class="data_jumlah_keterangan">-</span>
        </div>
      </div>
    </div>
    <div class=tombol>
      <div class="tombol_simpan"></div><span  class="teks_simpan">SIMPAN</span>
    </div>
</div>
</body>
</html>
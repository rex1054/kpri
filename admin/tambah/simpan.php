<?php
$nip = $_POST['nip'];
$bulan = $_POST['bulan'];
$spnominal = $_POST['sp-nominal'];
$spket = $_POST['sp-keterangan'];
$swnominal = $_POST['sw-nominal'];
$swket = $_POST['sw-keterangan'];
$tabnominal = $_POST['tab-nominal'];
$tabket = $_POST['tab-keterangan'];
$srnominal = $_POST['sr-nominal'];
$srket = $_POST['sr-keterangan'];
$pokokUSPNom = $_POST['usp-pokok-nominal'];
$pokokUSPKet = $_POST['usp-pokok-keterangan'];
$jasaUSPNom = $_POST['usp-jasa-nominal'];
$jasaUSPKet = $_POST['usp-jasa-keterangan'];
$pokokBKENom = $_POST['bke-pokok-nominal'];
$pokokBKEKet = $_POST['bke-pokok-keterangan'];
$jasaBKENom = $_POST['bke-jasa-nominal'];
$jasaBKEKet = $_POST['bke-jasa-keterangan'];
$pokokEkstraNom = $_POST['ekstra-pokok-nominal'];
$pokokEkstraKet = $_POST['ekstra-pokok-keterangan'];
$jasaEkstraNom = $_POST['ekstra-jasa-nominal'];
$jasaEkstraKet = $_POST['ekstra-jasa-keterangan'];
$pokokTokoNom = $_POST['toko-pokok-nominal'];
$pokokTokoKet = $_POST['toko-pokok-keterangan'];
$jasaTokoNom = $_POST['toko-jasa-nominal'];
$jasaTokoKet = $_POST['toko-jasa-keterangan'];
$pokokHajiNom = $_POST['haji-pokok-nominal'];
$pokokHajiKet = $_POST['haji-pokok-keterangan'];
$jasaHajiNom = $_POST['haji-jasa-nominal'];
$jasaHajiKet = $_POST['haji-jasa-keterangan'];
$arisanNominal = $_POST['arisan-nominal'];
$arisanKet = $_POST['arisan-keterangan'];
$seragamNominal = $_POST['seragam-nominal'];
$seragamKet = $_POST['seragam-keterangan'];
$jumlah = $_POST['jumlah-nominal'];

function addTrx($penyetor, $bulan, $jumlah, $tanggal, $admin){
    require_once('../../config.php');
    $sql = "INSERT INTO transaksi (penyetor, bulan, jumlah, tanggal, admin) values (
        ".$penyetor.", '".$bulan."', ".$jumlah.", '".$tanggal."', ".$admin."
    )";
    $con->query($sql);
}

function simpan($jenis, $jumlah, $ket, $tanggal){
    $getSql = "SELECT ke FROM `bke` WHERE id_peminjaman = 8 order by id desc limit 1";

    $sql = "INSERT INTO ".$jenis." () values (

    )";
}
?>
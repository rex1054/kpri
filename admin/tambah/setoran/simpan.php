<?php
session_start();
// info dasar
$admin = $_SESSION['nip'];
$nip = $_POST['nip'];
$bulan = $_POST['bulan'];
$tanggal = date("Y-m-d");

// simpanan
$spnominal = $_POST['sp-nominal'];
$spket = $_POST['sp-keterangan'];
$swnominal = $_POST['sw-nominal'];
$swket = $_POST['sw-keterangan'];
$tabnominal = $_POST['tab-nominal'];
$tabket = $_POST['tab-keterangan'];
$srnominal = $_POST['sr-nominal'];
$srket = $_POST['sr-keterangan'];

// usp
$pokokUSPNom = $_POST['usp-pokok-nominal'];
$pokokUSPKet = $_POST['usp-pokok-keterangan'];
$jasaUSPNom = $_POST['usp-jasa-nominal'];
$jasaUSPKet = $_POST['usp-jasa-keterangan'];

// bke
$pokokBKENom = $_POST['bke-pokok-nominal'];
$pokokBKEKet = $_POST['bke-pokok-keterangan'];
$jasaBKENom = $_POST['bke-jasa-nominal'];
$jasaBKEKet = $_POST['bke-jasa-keterangan'];

// ekstra
$pokokEkstraNom = $_POST['ekstra-pokok-nominal'];
$pokokEkstraKet = $_POST['ekstra-pokok-keterangan'];
$jasaEkstraNom = $_POST['ekstra-jasa-nominal'];
$jasaEkstraKet = $_POST['ekstra-jasa-keterangan'];

// toko
$pokokTokoNom = $_POST['toko-pokok-nominal'];
$pokokTokoKet = $_POST['toko-pokok-keterangan'];
$jasaTokoNom = $_POST['toko-jasa-nominal'];
$jasaTokoKet = $_POST['toko-jasa-keterangan'];

// haji
$pokokHajiNom = $_POST['haji-pokok-nominal'];
$pokokHajiKet = $_POST['haji-pokok-keterangan'];
$jasaHajiNom = $_POST['haji-jasa-nominal'];
$jasaHajiKet = $_POST['haji-jasa-keterangan'];

// arisan
$arisanNominal = $_POST['arisan-nominal'];
$arisanKet = $_POST['arisan-keterangan'];

// seragam
$seragamNominal = $_POST['seragam-nominal'];
$seragamKet = $_POST['seragam-keterangan'];

// jumlah
$jumlah = $_POST['jumlah-nominal'];

try{
require("../../../config.php");

// dapatkan rekening
$sqlgetrekening = "SELECT * FROM rekening WHERE pemilik = ".$nip;
$queryrekening = $con->query($sqlgetrekening)->fetch_assoc();
$rekening = $queryrekening['nomor'];

// dapatkan id transaksi terakhir
$sqlidtransaksi = "SELECT id FROM `transaksi` ORDER BY id DESC LIMIT 1";
$latestid = $con->query($sqlidtransaksi)->fetch_assoc();
$idtransaksi = $latestid + 1;

// transaksi
$sqltransaksi = `INSERT INTO transaksi(penyetor, bulan, jumlah, tanggal, admin) VALUES (`.$nip.`,`.$bulan.`,`.$jumlah.`,"`.$tanggal.`",`.$admin.`)`;
$con->query($sqltransaksi);

// sp(3)
$sqlsp = `INSERT INTO simpanan(rekening, jenis, jumlah, id_transaksi, keterangan) VALUES (`.$rekening.`, 3, `.$spnominal.`, `.$idtransaksi.`,"`.$spket.`")`;
$con->query($sqlsp);

// sw(2)
$sqlsw = `INSERT INTO simpanan(rekening, jenis, jumlah, id_transaksi, keterangan) VALUES (`.$rekening.`, 2, `.$swnominal.`, `.$idtransaksi.`,"`.$swket.`")`;
$con->query($sqlsw);

// sr(1)
$sqlsr = `INSERT INTO simpanan(rekening, jenis, jumlah, id_transaksi, keterangan) VALUES (`.$rekening.`, 1, `.$srnominal.`, `.$idtransaksi.`,"`.$srket.`")`;
$con->query($sqlsr);

// tab(4)
$sqltab = `INSERT INTO simpanan(rekening, jenis, jumlah, id_transaksi, keterangan) VALUES (`.$rekening.`, 4, `.$tabnominal.`, `.$idtransaksi.`,"`.$tabket.`")`;
$con->query($sqltab);

// bke
$sqlbke = `INSERT INTO bke(id_transaksi, id_peminjaman, ke, pokok, jasa, keterangan) VALUES (`.$idtransaksi.`,`.$nip.`,[value-4],[value-5],[value-6],[value-7])`;
$con->query($sqlbke);



} catch (Error) {

} finally {

}
?>
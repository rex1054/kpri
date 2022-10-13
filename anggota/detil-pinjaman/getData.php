<?php

$id_pinjaman = $_GET['id'];

$id;
$idAjuan;
$jenis;
$jumlah;
$jasa;
$diangsur;
$angsuran;
$potongan;
$angsuran;
$potongan;
$asuransi;
$diterima;
$mulai;
$pimpinan;
$status;

$sql = "SELECT peminjaman.`id`, peminjaman.`id_ajuan`, jenis_pinjaman.`jenis`, peminjaman.`jumlah`, peminjaman.`jasa`, peminjaman.`diangsur`, peminjaman.`angsuran`, peminjaman.`potongan`, peminjaman.`asuransi`, peminjaman.`diterima`, peminjaman.`mulai`, peminjaman.`admin`, peminjaman.`pimpinan`, status_transaksi.status FROM `peminjaman` JOIN jenis_pinjaman ON peminjaman.jenis = jenis_pinjaman.id JOIN status_transaksi ON peminjaman.status = status_transaksi.id WHERE peminjaman.id = ".$id_pinjaman;

$query = $con->query($sql);
$data = $query->fetch_assoc();

$id = $data['id'];
$idAjuan = $data['id_ajuan'];
$jenis = $data['jenis'];
$jumlah = $data['jumlah'];
$jasa = $data['jasa'];
$diangsur = $data['diangsur'];
$angsuran = $data['angsuran'];
$potongan = $data['potongan'];
$angsuran = $data['angsuran'];
$potongan = $data['potongan'];
$asuransi = $data['angsuran'];
$diterima = $data['diterima'];
$mulai = $data['mulai'];
$pimpinan = $data['pimpinan'];
$status = $data['status'];

?>
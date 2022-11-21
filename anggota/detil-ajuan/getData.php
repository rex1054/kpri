<?php

$id_ajuan = $_GET['id'];

$id;
$nip;
$nama;
$instansi;
$tanggal;
$jenis;
$jumlah;
$diangsur;
$penghasilan;
$status;
$admin;

$sql = "SELECT ajuan.id, ajuan.peminjam, akun.nama, instansi.instansi, ajuan.tanggal, jenis_pinjaman.jenis, ajuan.jumlah, ajuan.tempo, ajuan.penghasilan, status_transaksi.status, ajuan.admin FROM ajuan join akun on ajuan.peminjam = akun.nip join instansi on akun.instansi = instansi.id join jenis_pinjaman on ajuan.jenis = jenis_pinjaman.id join status_transaksi on ajuan.status = status_transaksi.id WHERE ajuan.id =  ".$id_ajuan;
$sqladmin = 'SELECT akun.nama FROM ajuan join akun on ajuan.admin = akun.nip WHERE ajuan.id = '.$id_ajuan;

$query = $con->query($sql);
$queryadmin = $con->query($sqladmin);
$data = $query->fetch_assoc();
$admins = $queryadmin->fetch_assoc();

$id = $data['id'];
$nip = $data['peminjam'];
$nama = $data['nama'];
$instansi = $data['instansi'];
$tanggal = $data['tanggal'];
$jenis = $data['jenis'];
$jumlah = $data['jumlah'];
$diangsur = $data['tempo'];
$penghasilan = $data['penghasilan'];
$status = $data['status'];
$admin = $admins['nama'];


?>
<?php
session_start();
require_once('../../../config.php');
// info dasar
$admin = $_SESSION['nip'];
$nip = $_POST['nip'];
$bulan = $_POST['bulan'];
$tanggal = date("Y-m-d");

$sql;
$jasa;
$ke;
$dari;
$jumlah;

if(isset($_POST['jenis'])){
    $jenis = $_POST['jenis'];

    $gettrxid = 'SELECT id FROM transaksi ORDER BY id DESC LIMIT 1';
    $datatrx = $con->query($gettrxid)->fetch_assoc();
    $trxid = $datatrx['id']+1;

    $getrek = 'SELECT nomor FROM rekening WHERE pemilik = '.$_POST['nip'];
    $datarek = $con->query($getrek)->fetch_assoc();
    $rek = $datarek['nomor'];

    $sqlsetor = 'INSERT INTO transaksi(penyetor, bulan, jumlah, tanggal, admin) VALUES (
        '.$_POST['nip'].',
        '.$_POST['bulan'].',
        '.$jumlah.',
        '.$tanggal.',
        '.$_SESSION['nip'].'
        )';

    if($jenis < 5){
        $jumlah = $_POST['pokok'];
        $sql = 'INSERT INTO simpanan(rekening, jenis, jumlah, id_transaksi, keterangan) VALUES (
            '.$rek.',
            '.$jenis.',
            '.$jumlah.',
            '.$trxid.',
            "'.$_POST['ket'].'"
        )';
    } else if($jenis == 5){
        $ke = $_POST['ke'];
        $dari = $_POST['dari'];
        $pokok = $_POST['pokok'];
        $jasa = $_POST['jasa'];
        $jumlah = $pokok+$jasa;
        $ket = $_POST['ket'];

        $getpinjam = 'SELECT peminjaman.id FROM ajuan
        JOIN peminjaman ON peminjaman.id_ajuan = ajuan.id
        WHERE ajuan.peminjam = '.$_POST['nip'].' AND ajuan.status = 3';

        $sql = 'INSERT INTO setor_pinjam(
            id_transaksi, 
            id_peminjaman, 
            jenis, 
            ke, 
            dari, 
            pokok, 
            jasa, 
            keterangan) VALUES (
                '.$trxid.',
                
            )';
    }
}
?>
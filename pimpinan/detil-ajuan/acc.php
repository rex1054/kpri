<?php
require_once('../../config.php');

$id = $_GET['id'];
$pimpinan = $_GET['nip'];
$acc = $_GET['acc'];
$sql;
if($acc == 1){
    $sql = 'UPDATE ajuan SET mulai = "'.date('Y-m-d').'", status='.$acc.' WHERE id = '.$id;
} else {
    $sql = 'UPDATE ajuan SET status='.$acc.' WHERE id = '.$id;
}


if($con->query($sql)){
$sqlGet = 'SELECT * FROM ajuan WHERE id = '.$id;
$data = $con->query($sqlGet)->fetch_assoc();
$potongan = $data['jumlah']*0.15;
$jasa = 15000;
$potongan = $data['jumlah']*0.01;
$asuransi = $data['jumlah']*0.01;
$totalpotongan = $potongan*$data['diangsur'];
$totaljasa = $jasa*$data['diangsur'];
$totalasuransi = $asuransi*$data['diangsur'];
$total = $data['jumlah']+$totalasuransi+$totaljasa+$totalpotongan;
$angsuran = $total/$data['diangsur'];
$diterima = $data['jumlah']-$angsuran;
$diangsur = $data['diangsur']-1;

    $sqlInsert = 'INSERT INTO peminjaman(
        id_ajuan, 
        jenis, 
        jumlah, 
        jasa, 
        diangsur, 
        angsuran, 
        potongan, 
        asuransi, 
        diterima, 
        mulai, 
        admin, 
        pimpinan, 
        status) VALUES (
            '.$id.',
            '.$data['jenis'].',
            '.$data['jumlah'].',
            '.$jasa.',
            '.$diangsur.',
            '.$angsuran.',
            '.$potongan.',
            '.$asuransi.',
            '.$diterima.',
            "'.date('Y-m-d').'",
            '.$data['admin'].',
            '.$pimpinan.',
            3
        )';
        
    if($con->query($sqlInsert)){
        ?>
        <script>alert('Berhasil Acc.'); window.open('<?php echo $siteurl."pimpinan/ajuan/"; ?>', '_self')</script>
        <?php
    } else {
        ?>
        <script>alert('Gagal Acc.'); window.open('<?php echo $siteurl."pimpinan/ajuan/"; ?>', '_self')</script>
        <?php
    }
}
?>
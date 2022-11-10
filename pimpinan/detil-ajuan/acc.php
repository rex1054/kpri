<?php
require_once('../../config.php');

$id = $_GET['id'];
$pimpinan = $_GET['nip'];
$acc = $_GET['acc'];
$sql;
if($acc == 3){
    $sql = 'UPDATE ajuan SET mulai = "'.date('Y-m-d').'", status='.$acc.' WHERE id = '.$id;
} else {
    $sql = 'UPDATE ajuan SET status=4 WHERE id = '.$id;
}


if($con->query($sql)){
$sqlGet = 'SELECT * FROM ajuan WHERE id = '.$id;
$data = $con->query($sqlGet)->fetch_assoc();
$potongan = $data['jumlah']*0.15;
$jasa = 15000;
$potongan = $data['jumlah']*0.01;
$asuransi = $data['jumlah']*0.01;
$tempo = $data['tempo'];
$totalpotongan = $potongan*$tempo;
$totaljasa = $jasa*$tempo;
$totalasuransi = $asuransi*$tempo;
$total = $data['jumlah']+$totalasuransi+$totaljasa+$totalpotongan;
$angsuran = $total/$tempo;
$diterima = $data['jumlah']-$angsuran;

    $sqlInsert = 'INSERT INTO peminjaman(
        id_ajuan, 
        jenis, 
        jumlah, 
        jasa, 
        tempo, 
        angsuran, 
        potongan, 
        asuransi, 
        diterima, 
        mulai, 
        pimpinan, 
        status) VALUES (
            '.$id.',
            '.$data['jenis'].',
            '.$data['jumlah'].',
            '.$jasa.',
            '.$tempo.',
            '.$angsuran.',
            '.$potongan.',
            '.$asuransi.',
            '.$diterima.',
            "'.date('Y-m-d').'",
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
} else {
    $con->query($sql);
    ?>
    <script>alert('Gagal Acc.'); window.open('<?php echo $siteurl."pimpinan/ajuan/"; ?>', '_self')</script>
    <?php
}
?>
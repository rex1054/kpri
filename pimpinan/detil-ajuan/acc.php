<?php
require_once('../../config.php');

$id = $_GET['id'];
$pimpinan = $_GET['nip'];
$acc = $_GET['acc'];
$sql;
$user;
$potongan;
$jasa;
$potongan;
$asuransi;
$tempo;
$totalpotongan;
$totaljasa;
$totalasuransi;
$total;
$angsuran;
$diterima;
if($acc == 3){
    $sql = 'UPDATE ajuan SET mulai = "'.date('Y-m-d').'", status='.$acc.' WHERE id = '.$id;
} else {
    $sql = 'UPDATE ajuan SET status=4 WHERE id = '.$id;
}


if($con->query($sql)){
    $sqlGet = 'SELECT * FROM ajuan WHERE id = '.$id;
    $data = $con->query($sqlGet)->fetch_assoc();
    $user = $data['peminjam'];
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
                $sqlsetor = 'INSERT INTO transaksi(penyetor, bulan, jumlah, tanggal) VALUES (
                    '.$user.',
                    "'.date('Y-m-d').'",
                    '.$angsuran.',
                    "'.date('Y-m-d').'"
                    )';
                    
                    if($con->query($sqlsetor)){
                        $gettrxid = 'SELECT id FROM transaksi ORDER BY id DESC LIMIT 1';
                        $datatrx = $con->query($gettrxid)->fetch_assoc();
                        $trxid = $datatrx['id'];
                        
                        $getpinjaman = 'SELECT * FROM peminjaman WHERE id_ajuan = '.$id;
                        $datapinjaman = $con->query($getpinjaman)->fetch_assoc();
                        $idpinjaman = $datapinjaman['id'];
                        $jenispinjam = $datapinjaman['jenis'];
                        
                        $sqlsetoran = 'INSERT INTO setor_pinjam(
                            id_transaksi, 
                            id_peminjaman, 
                            jenis, 
                            ke, 
                            dari, 
                            pokok, 
                            jasa, 
                            keterangan) VALUES (
                                '.$trxid.',
                                '.$idpinjaman.',
                                '.$jenispinjam.',
                                1,
                                '.$tempo.',
                                '.$angsuran.',
                                '.$jasa.',
                                "Angsuran pertama"
                                )';
                                
                                if($con->query($sqlsetoran)){
                                    ?>
                                    <script>alert('Berhasil Acc.'); window.open('<?php echo $siteurl."pimpinan/ajuan/"; ?>', '_self');</script>
                                    <?php
                                } else {
                                    echo $sqlsetoran;
                                    ?>
                                    <script>alert('Gagal Acc. Error sqlsetoran'); window.open('<?php echo $siteurl."pimpinan/ajuan/"; ?>', '_self');</script>
                                    <?php
                                }
                            } else {
                                ?>
                                <script>alert('Gagal Acc. Error sqlsetor'); window.open('<?php echo $siteurl."pimpinan/ajuan/"; ?>', '_self');</script>
                                <?php
                            }
                        } else {
                            ?>
                            <script>alert('Gagal Acc. Error sqlinsert'); window.open('<?php echo $siteurl."pimpinan/ajuan/"; ?>', '_self');</script>
                            <?php
                        }
                    } else {
                        $con->query($sql);
                        ?>
                        <script>alert('Gagal Acc. Error updatesql'); window.open('<?php echo $siteurl."pimpinan/ajuan/"; ?>', '_self');</script>
                        <?php
                    }
                    ?>
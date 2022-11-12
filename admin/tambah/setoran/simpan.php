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
    
    $sqlsetor;
    
    if($jenis < 5){
        $jumlah = $_POST['pokok'];
        
        $sqlsetor = 'INSERT INTO transaksi(penyetor, bulan, jumlah, tanggal, admin) VALUES (
            '.$_POST['nip'].',
            "'.$_POST['bulan'].'-01",
            '.$jumlah.',
            "'.$tanggal.'",
            '.$_SESSION['nip'].'
            )';
            
            $sql = 'INSERT INTO simpanan(rekening, jenis, jumlah, id_transaksi, keterangan) VALUES (
                '.$rek.',
                '.$jenis.',
                '.$jumlah.',
                '.$trxid.',
                "'.$_POST['ket'].'"
                )';
                
                if($con->query($sqlsetor)){
                    if($con->query($sql)){
                        
                    }
                }
            } else if($jenis == 5){
                $ke = $_POST['ke'];
                $dari = $_POST['dari'];
                $pokok = $_POST['pokok'];
                $jasa = $_POST['jasa'];
                $jumlah = $pokok+$jasa;
                $ket;
                if(isset($_POST['ket']) || $_POST['ket'] != ''){
                    $ket = $_POST['ket'];
                } else {
                    $ket = '';
                }
                
                $sqlsetor = 'INSERT INTO transaksi(penyetor, bulan, jumlah, tanggal, admin) VALUES (
                    '.$_POST['nip'].',
                    "'.$_POST['bulan'].'-01",
                    '.$jumlah.',
                    "'.$tanggal.'",
                    '.$_SESSION['nip'].'
                    )';
                    
                    if($con->query($sqlsetor)){
                        $getpinjam = 'SELECT peminjaman.* FROM ajuan
                        JOIN peminjaman ON peminjaman.id_ajuan = ajuan.id
                        WHERE ajuan.peminjam = '.$_POST['nip'].' AND ajuan.status = 3';
                        $datapinjam = $con->query($getpinjam)->fetch_assoc();
                        $idpinjam = $datapinjam['id'];
                        $jenispinjam = $datapinjam['jenis'];
                        
                        $getsetoran = 'SELECT * FROM `setor_pinjam` WHERE id_peminjaman = '.$idpinjam.' ORDER BY id DESC LIMIT 1';
                        if($con->query($getsetoran)->num_rows > 0){
                            $datasetor = $con->query($getsetoran)->fetch_assoc();
                            $ke = $datasetor['ke']+1;
                        } else {
                            $ke = 1;
                        }
                        
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
                                '.$idpinjam.',
                                '.$jenispinjam.',
                                '.$ke.',
                                '.$dari.',
                                '.$pokok.',
                                '.$jasa.',
                                "'.$ket.'"
                                )';
                                if($con->query($sql)){
                                    ?>
                                    <script>alert('Berhasil menyimpan data.');window.open('<?php echo $siteurl; ?>admin/', '_SELF');</script>
                                    <?php
                                } else {
                                    echo $sql.'<br/>';
                                    echo $sqlsetor;
                                    ?>
                                    <script>alert('Gagal menyimpan data.');window.open('<?php echo $siteurl; ?>admin/', '_SELF');</script>
                                    <?php
                                }
                            } else {
                                echo $sqlsetor;
                                ?>
                                    <script>alert('Gagal menyimpan data.');window.open('<?php echo $siteurl; ?>admin/', '_SELF');</script>
                                    <?php
                            }
                            
                            
                        }
                    }
                    ?>
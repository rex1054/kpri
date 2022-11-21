<?php
$jumlahTotal = 0;
$totalNominal='';
$getAkunQuery = "SELECT akun.nama, akun.nip from transaksi join akun on transaksi.penyetor = akun.nip WHERE transaksi.id = ".$_GET['id'];
$getAdminQuery = "SELECT akun.nama, akun.nip from transaksi join akun on transaksi.admin = akun.nip WHERE transaksi.id = ".$_GET['id'];
$getTransaksiQuery = "SELECT bulan, tanggal FROM `transaksi` where id = ".$_GET['id'];
$getSimpananQuery = "SELECT simpanan.jumlah, jenis_simpanan.jenis, simpanan.keterangan FROM simpanan join jenis_simpanan on simpanan.jenis = jenis_simpanan.id WHERE simpanan.id_transaksi = ".$_GET['id'];
$getsetoran = 'SELECT setor_pinjam.*, transaksi.penyetor, transaksi.bulan, transaksi.jumlah, transaksi.tanggal, transaksi.admin FROM setor_pinjam
JOIN transaksi ON setor_pinjam.id_transaksi = transaksi.id
WHERE setor_pinjam.id_transaksi = '.$_GET['id'];
$getArisan = 'SELECT * FROM arisan WHERE id_transaksi = '.$_GET['id'];
$getSeragam = 'SELECT * FROM seragam WHERE id_transaksi = '.$_GET['id'];

setlocale(LC_ALL, 'ID');
$akun = $con->query($getAkunQuery)->fetch_assoc();
$akunadmin = $con->query($getAdminQuery)->fetch_assoc();
$penyetor = $akun['nama'];
$admin;
if(isset($akunadmin['nama']) || $akunadmin['nama'] != ''){
    $admin = $akunadmin['nama'];
} else {
    $admin = '..................................';
}
$tgl = $con->query($getTransaksiQuery)->fetch_assoc();
$xTgl = date_create($tgl['bulan']);
$bulan = date_format($xTgl, 'F Y');

$jumlahSimpanan = '-';
$jenisSimpanan = '-';
$keteranganSimpanan = '-';

$uspke = '-';
$uspdr = '-';
$usppokoknominal = '-';
$uspjasanominal = '-';
$uspketerangan = '-';

$bkeke = '-';
$bkedr = '-';
$bkepokoknominal = '-';
$bkejasanominal = '-';
$bkeketerangan = '-';

$ekstrake = '-';
$ekstradr = '-';
$ekstrapokoknominal = '-';
$ekstrajasanominal = '-';
$ekstraketerangan = '-';

$tokoke = '-';
$tokodr = '-';
$tokopokoknominal = '-';
$tokojasanominal = '-';
$tokoketerangan = '-';

$hajike = '-';
$hajidr = '-';
$hajipokoknominal = '-';
$hajijasanominal = '-';
$hajiketerangan = '-';

$arisanBulan;
$arisanNominal = 0;
$arisaKeteragan = '';

$seragamNominal = 0;

try {
    $simpanan = $con->query($getSimpananQuery);
    if($simpanan->num_rows != 0) {
        $datasimpanan = $simpanan->fetch_assoc();
        $jumlahSimpanan = $datasimpanan['jumlah'];
        $jenisSimpanan = $datasimpanan['jenis'];
        $keteranganSimpanan = $datasimpanan['keterangan'];
        $jumlahTotal = $jumlahSimpanan;
    }
} catch(Exception $e) {
    ?>
    <script>console.log('error : <?php echo $e; ?>');</script>
    <?php
}

try{
    $setoran = $con->query($getsetoran);
    if($setoran->num_rows > 0){
        $data = $setoran->fetch_assoc();
        
        if(isset($data['jenis'])){
            switch($data['jenis']){
                case 1:
                    $uspke = $data['ke'];
                    $uspdr = $data['dari'];
                    $usppokoknominal = $data['pokok'];
                    $uspjasanominal = $data['jasa'];
                    $uspketerangan = $data['keterangan'];
                    $jumlahTotal = $data['jumlah'];
                    break;
                    case 2:
                        $bkeke = $data['ke'];
                        $bkedr = $data['dari'];
                        $bkepokoknominal = $data['pokok'];
                        $bkejasanominal = $data['jasa'];
                        $bkeketerangan = $data['keterangan'];
                        $jumlahTotal = $data['jumlah'];
                        break;
                        case 3:
                            $extrake = $data['ke'];
                            $extradr = $data['dari'];
                            $extrapokoknominal = $data['pokok'];
                            $extrajasanominal = $data['jasa'];
                            $extraketerangan = $data['keterangan'];
                            $jumlahTotal = $data['jumlah'];
                            break;
                            case 4:
                                $tokoke = $data['ke'];
                                $tokodr = $data['dari'];
                                $tokopokoknominal = $data['pokok'];
                                $tokojasanominal = $data['jasa'];
                                $tokoketerangan = $data['keterangan'];
                                $jumlahTotal = $data['jumlah'];
                                break;
                                case 5:
                                    $hajike = $data['ke'];
                                    $hajidr = $data['dari'];
                                    $hajipokoknominal = $data['pokok'];
                                    $hajijasanominal = $data['jasa'];
                                    $hajiketerangan = $data['keterangan'];
                                    $jumlahTotal = $data['jumlah'];
                                    break;
                                    default:
                                    break;
                                }
                            }
                        }
                    }
                    catch(Exception $e) {
                        ?>
                        <script>console.log('error : <?php echo $e; ?>');</script>
                        <?php
                    }

try{
$arisan = $con->query($getArisan);
if($arisan->num_rows > 0){
    $data = $arisan->fetch_assoc();
    $bulanArisan = date_create($data['bulan']);
    $arisanBulan = date_format($bulanArisan, 'm');
    $arisanNominal = $data['jumlah'];
    $arisanKeterangan = $data['keterangan'];
    $jumlahTotal = $arisanNominal;
}
} catch(Exception $e){
    ?>
    <script>console.log('error : <?php echo $e; ?>');</script>
    <?php
}

try{
    $seragam = $con->query($getSeragam);
    if($seragam->num_rows > 0){
        $data = $seragam->fetch_assoc();
        $seragamNominal = $data['jumlah'];
        $jumlahTotal = $seragamNominal;
    }
    } catch(Exception $e){
        ?>
        <script>console.log('error : <?php echo $e; ?>');</script>
        <?php
                        
    }      
                    ?>
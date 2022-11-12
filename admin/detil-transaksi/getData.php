<?php
$jumlahTotal = 0;
$totalNominal='';
$getAkunQuery = "SELECT akun.nama, akun.nip from transaksi join akun on transaksi.penyetor = akun.nip WHERE transaksi.id = ".$_GET['id'];
$getTransaksiQuery = "SELECT bulan, tanggal FROM `transaksi` where id = ".$_GET['id'];
$getSimpananQuery = "SELECT simpanan.jumlah, jenis_simpanan.jenis, simpanan.keterangan FROM simpanan join jenis_simpanan on simpanan.jenis = jenis_simpanan.id WHERE simpanan.id_transaksi = ".$_GET['id'];
$getsetoran = 'SELECT setor_pinjam.*, transaksi.penyetor, transaksi.bulan, transaksi.jumlah, transaksi.tanggal, transaksi.admin FROM setor_pinjam
JOIN transaksi ON setor_pinjam.id_transaksi = transaksi.id
WHERE setor_pinjam.id_transaksi = '.$_GET['id'];

setlocale(LC_ALL, 'ID');
$akun = $con->query($getAkunQuery)->fetch_assoc();
$tgl = $con->query($getTransaksiQuery)->fetch_assoc();
$xTgl = date_create($tgl['bulan']);
// $yTgl = date_format($xTgl, 'Y-m-d h:i:sA');
$bulan = date_format($xTgl, 'F Y');
// $bulan = strftime('%B %G', strtotime($yTgl));
// $bulan = $tgl['bulan'];

$jumlahSimpanan;
$jenisSimpanan;
$keteranganSimpanan;

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
$arisanNominal = '';

$seragamNominal = '';

try {
    $simpanan = $con->query($getSimpananQuery);
    if($simpanan->num_rows == 0) {
        $jumlahSimpanan = '-';
        $jenisSimpanan = '-';
        $keteranganSimpanan = '-';
    } else {
        $simpanan->fetch_assoc();
        $jumlahTotal += $simpanan['jumlah'];
        $nominalSimpanan = str_split($simpanan['jumlah'], 1);
        $a = COUNT($nominalSimpanan);
        for($i=0; $i < $a; $i++) {
            if($i == ($a-3) || $i == ($a-6) || $i == ($a-9)) {
                $jumlahSimpanan .= '.'.strval($nominalSimpanan[$i]);
            } else {
                $jumlahSimpanan .= strval($nominalSimpanan[$i]);
            }
        }
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
    
    $nominalTotal = str_split($jumlahTotal, 1);
    $z = COUNT($nominalTotal);
    for($i=0; $i < $z; $i++) {
        if($i == ($z-3) || $i == ($z-6) || $i == ($z-9)) {
            if($i == 0) {
                $totalNominal .= strval($nominalTotal[$i]);
            } else {
                $totalNominal .= '.'.strval($nominalTotal[$i]);
            }
        } else {
            $totalNominal .= strval($nominalTotal[$i]);
        }
    }
    
    ?>
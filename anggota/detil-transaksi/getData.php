<?php
$jumlahTotal = 0;
$totalNominal='';
$getAkunQuery = "SELECT akun.nama, akun.nip from transaksi join akun on transaksi.penyetor = akun.nip WHERE transaksi.id = ".$_GET['id'];
$getTransaksiQuery = "SELECT bulan, tanggal FROM `transaksi` where id = ".$_GET['id'];
$getSimpananQuery = "SELECT simpanan.jumlah, jenis_simpanan.jenis, simpanan.keterangan FROM simpanan join jenis_simpanan on simpanan.jenis = jenis_simpanan.id WHERE simpanan.id_transaksi = ".$_GET['id'];
$getPinjaman = "SELECT diangsur from peminjaman where id = ";
$getBKEQuery = "SELECT bke.pokok, bke.ke, bke.jasa, bke.keterangan, peminjaman.diangsur FROM bke join peminjaman on bke.id_peminjaman = peminjaman.id WHERE bke.id_transaksi = ".$_GET['id'];
$getUSPQuery = "SELECT usp.pokok, usp.ke, usp.jasa, usp.keterangan, peminjaman.diangsur FROM usp join peminjaman on usp.id_peminjaman = peminjaman.id WHERE usp.id_transaksi = ".$_GET['id'];
$getEkstraQuery = "SELECT ekstra.pokok, ekstra.ke, ekstra.jasa, ekstra.keterangan, peminjaman.diangsur FROM ekstra join peminjaman on ekstra.id_peminjaman = peminjaman.id WHERE ekstra.id_transaksi = ".$_GET['id'];
$getTokoQuery = "SELECT toko.pokok, toko.ke, toko.jasa, toko.keterangan, peminjaman.diangsur FROM toko join peminjaman on toko.id_peminjaman = peminjaman.id WHERE toko.id_transaksi = ".$_GET['id'];
$getHajiQuery = "SELECT haji.pokok, haji.ke, haji.jasa, haji.keterangan, peminjaman.diangsur FROM haji join peminjaman on haji.id_peminjaman = peminjaman.id WHERE haji.id_transaksi = ".$_GET['id'];
$getArisanQuery = "SELECT jumlah, bulan FROM trx_arisan WHERE id_transaksi = ".$_GET['id'];
$getSeragamQuery = "SELECT jumlah FROM seragam WHERE id_transaksi = ".$_GET['id'];

setlocale(LC_ALL, 'ID');
$akun = $con->query($getAkunQuery)->fetch_assoc();
$tgl = $con->query($getTransaksiQuery)->fetch_assoc();
$xTgl = date_create($tgl['bulan']);
$yTgl = date_format($xTgl, 'Y-m-d h:i:sA');
$bulan = strftime('%B', strtotime($yTgl));

$jumlahSimpanan;
$jenisSimpanan;
$keteranganSimpanan;

$uspke;
$uspdr;
$usppokoknominal;
$uspjasanominal;
$uspketerangan;

$bkeke;
$bkedr;
$bkepokoknominal;
$bkejasanominal;
$bkeketerangan;

$ekstrake;
$ekstradr;
$ekstrapokoknominal;
$ekstrajasanominal;
$ekstraketerangan;

$tokoke;
$tokodr;
$tokopokoknominal;
$tokojasanominal;
$tokoketerangan;

$hajike;
$hajidr;
$hajipokoknominal;
$hajijasanominal;
$hajiketerangan;

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
    $usp = $con->query($getUSPQuery);
    if($usp->num_rows == 0){
        $uspke = '-';
        $uspdr = '-';
        $usppokoknominal = '-';
        $uspjasanominal = '-';
        $uspketerangan = '-';
    }
    else {
        $usp = $usp->fetch_assoc();
        $jumlahTotal += $usp['pokok'];
        $jumlahTotal += $usp['jasa'];
        $uspke = $usp['ke'];
        $uspdr = $usp['diangsur'];
        if($usp['keterangan']==''){
            $uspketerangan = '-';
        } else {
            $uspketerangan = $usp['keterangan'];
        }
        $nominalPokok = str_split($usp['pokok'], 1);
        $nominalJasa = str_split($usp['jasa'], 1);
        $usppokoknominal = '';
        $uspjasanominal = '';
        $a = COUNT($nominalPokok);
        $b = COUNT($nominalJasa);
        for($i=0; $i < $a; $i++) {
            if($i == ($a-3) || $i == ($a-6) || $i == ($a-9)) {
                if($i == 0) {
                    $usppokoknominal .= strval($nominalPokok[$i]);
                } else {
                    $usppokoknominal .= '.'.strval($nominalPokok[$i]);
                }
            } else {
                $usppokoknominal .= strval($nominalPokok[$i]);
            }
        }
        for($i=0; $i < $b; $i++) {
            if($i == ($b-3) || $i == ($b-6) || $i == ($b-9)) {
                if($i == 0) {
                    $uspjasanominal .= strval($nominalJasa[$i]);
                } else {
                    $uspjasanominal .= '.'.strval($nominalJasa[$i]);
                }
            } else {
                $uspjasanominal .= strval($nominalJasa[$i]);
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
    $bke = $con->query($getBKEQuery);
    if($bke->num_rows == 0){
        $bkeke = '-';
        $bkedr = '-';
        $bkepokoknominal = '-';
        $bkejasanominal = '-';
        $bkeketerangan = '-';
    }
    else {
        $bke = $bke->fetch_assoc();
        $jumlahTotal += $bke['pokok'];
        $jumlahTotal += $bke['jasa'];
        $bkeke = $bke['ke'];
        $bkedr = $bke['diangsur'];
        if($bke['keterangan']==''){
            $bkeketerangan = '-';
        } else {
            $bkeketerangan = $bke['keterangan'];
        }
        $nominalPokok = str_split($bke['pokok'], 1);
        $nominalJasa = str_split($bke['jasa'], 1);
        $bkepokoknominal = '';
        $bkejasanominal = '';
        $a = COUNT($nominalPokok);
        $b = COUNT($nominalJasa);
        for($i=0; $i < $a; $i++) {
            if($i == ($a-3) || $i == ($a-6) || $i == ($a-9)) {
                if($i == 0) {
                    $bkepokoknominal .= strval($nominalPokok[$i]);
                } else {
                    $bkepokoknominal .= '.'.strval($nominalPokok[$i]);
                }
            } else {
                $bkepokoknominal .= strval($nominalPokok[$i]);
            }
        }
        for($i=0; $i < $b; $i++) {
            if($i == ($b-3) || $i == ($b-6) || $i == ($b-9)) {
                if($i == 0) {
                    $bkejasanominal .= strval($nominalJasa[$i]);
                } else {
                    $bkejasanominal .= '.'.strval($nominalJasa[$i]);
                }
            } else {
                $bkejasanominal .= strval($nominalJasa[$i]);
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
    $ekstra = $con->query($getEkstraQuery);
    if($ekstra->num_rows == 0){
        $ekstrake = '-';
        $ekstradr = '-';
        $ekstrapokoknominal = '-';
        $ekstrajasanominal = '-';
        $ekstraketerangan = '-';
    }
    else {
        $ekstra = $ekstra->fetch_assoc();
        $jumlahTotal += $ekstra['pokok'];
        $jumlahTotal += $ekstra['jasa'];
        $ekstrake = $ekstra['ke'];
        $ekstradr = $ekstra['diangsur'];
        if($ekstra['keterangan']==''){
            $ekstraketerangan = '-';
        } else {
            $ekstraketerangan = $ekstra['keterangan'];
        }
        $nominalPokok = str_split($ekstra['pokok'], 1);
        $nominalJasa = str_split($ekstra['jasa'], 1);
        $ekstrapokoknominal = '';
        $ekstrajasanominal = '';
        $a = COUNT($nominalPokok);
        $b = COUNT($nominalJasa);
        for($i=0; $i < $a; $i++) {
            if($i == ($a-3) || $i == ($a-6) || $i == ($a-9)) {
                if($i == 0) {
                    $ekstrapokoknominal .= strval($nominalPokok[$i]);
                } else {
                    $ekstrapokoknominal .= '.'.strval($nominalPokok[$i]);
                }
            } else {
                $ekstrapokoknominal .= strval($nominalPokok[$i]);
            }
        }
        for($i=0; $i < $b; $i++) {
            if($i == ($b-3) || $i == ($b-6) || $i == ($b-9)) {
                if($i == 0) {
                    $ekstrajasanominal .= strval($nominalJasa[$i]);
                } else {
                    $ekstrajasanominal .= '.'.strval($nominalJasa[$i]);
                }
            } else {
                $ekstrajasanominal .= strval($nominalJasa[$i]);
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
    $toko = $con->query($getTokoQuery);
    if($toko->num_rows == 0){
        $tokoke = '-';
        $tokodr = '-';
        $tokopokoknominal = '-';
        $tokojasanominal = '-';
        $tokoketerangan = '-';
    }
    else {
        $toko = $toko->fetch_assoc();
        $jumlahTotal += $toko['pokok'];
        $jumlahTotal += $toko['jasa'];
        $tokoke = $toko['ke'];
        $tokodr = $toko['diangsur'];
        if($toko['keterangan']==''){
            $tokoketerangan = '-';
        } else {
            $tokoketerangan = $toko['keterangan'];
        }
        $nominalPokok = str_split($toko['pokok'], 1);
        $nominalJasa = str_split($toko['jasa'], 1);
        $tokopokoknominal = '';
        $tokojasanominal = '';
        $a = COUNT($nominalPokok);
        $b = COUNT($nominalJasa);
        for($i=0; $i < $a; $i++) {
            if($i == ($a-3) || $i == ($a-6) || $i == ($a-9)) {
                if($i == 0) {
                    $tokopokoknominal .= strval($nominalPokok[$i]);
                } else {
                    $tokopokoknominal .= '.'.strval($nominalPokok[$i]);
                }
            } else {
                $tokopokoknominal .= strval($nominalPokok[$i]);
            }
        }
        for($i=0; $i < $b; $i++) {
            if($i == ($b-3) || $i == ($b-6) || $i == ($b-9)) {
                if($i == 0) {
                    $tokojasanominal .= strval($nominalJasa[$i]);
                } else {
                    $tokojasanominal .= '.'.strval($nominalJasa[$i]);
                }
            } else {
                $tokojasanominal .= strval($nominalJasa[$i]);
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
    $haji = $con->query($getHajiQuery);
    if($haji->num_rows == 0){
        $hajike = '-';
        $hajidr = '-';
        $hajipokoknominal = '-';
        $hajijasanominal = '-';
        $hajiketerangan = '-';
    }
    else {
        $haji = $haji->fetch_assoc();
        $jumlahTotal += $haji['pokok'];
        $jumlahTotal += $haji['jasa'];
        $hajike = $haji['ke'];
        $hajidr = $haji['diangsur'];
        if($haji['keterangan']==''){
            $hajiketerangan = '-';
        } else {
            $hajiketerangan = $haji['keterangan'];
        }
        $nominalPokok = str_split($haji['pokok'], 1);
        $nominalJasa = str_split($haji['jasa'], 1);
        $hajipokoknominal = '';
        $hajijasanominal = '';
        $a = COUNT($nominalPokok);
        $b = COUNT($nominalJasa);
        for($i=0; $i < $a; $i++) {
            if($i == ($a-3) || $i == ($a-6) || $i == ($a-9)) {
                if($i == 0) {
                    $hajipokoknominal .= strval($nominalPokok[$i]);
                } else {
                    $hajipokoknominal .= '.'.strval($nominalPokok[$i]);
                }
            } else {
                $hajipokoknominal .= strval($nominalPokok[$i]);
            }
        }
        for($i=0; $i < $b; $i++) {
            if($i == ($b-3) || $i == ($b-6) || $i == ($b-9)) {
                if($i == 0) {
                    $hajijasanominal .= strval($nominalJasa[$i]);
                } else {
                    $hajijasanominal .= '.'.strval($nominalJasa[$i]);
                }
            } else {
                $hajijasanominal .= strval($nominalJasa[$i]);
            }
        }
    }
}
catch(Exception $e) {
    ?>
    <script>console.log('error : <?php echo $e; ?>');</script>
    <?php
}

try {
    $arisan = $con->query($getArisanQuery);
    if($arisan->num_rows == 0) {
        $arisanNominal = '-';
        $arisanBulan = '-';
    } else {
        $arisan = $arisan->fetch_assoc();
        $jumlahTotal += $arisan['jumlah'];
        $xTgl = date_create($arisan['bulan']);
        $yTgl = date_format($xTgl, 'Y-m-d h:i:sA');
        $arisanBulan = strftime('%B %Y', strtotime($yTgl));
        $nominalArisan = str_split($arisan['jumlah'], 1);
        $a = COUNT($nominalArisan);
        for($i=0; $i < $a; $i++) {
            if($i == ($a-3) || $i == ($a-6) || $i == ($a-9)) {
                if($i == 0) {
                    $arisanNominal .= strval($nominalArisan[$i]);
                } else {
                    $arisanNominal .= '.'.strval($nominalArisan[$i]);
                }
            } else {
                $arisanNominal .= strval($nominalArisan[$i]);
            }
        }
    }
} catch(Exception $e) {
    ?>
    <script>console.log('error : <?php echo $e; ?>');</script>
    <?php
}

try {
    $seragam = $con->query($getSeragamQuery);
    if($seragam->num_rows == 0) {
        $seragamNominal = '-';
    } else {
        $seragam = $seragam->fetch_assoc();
        $jumlahTotal += $seragam['jumlah'];
        $nominalSeragam = str_split($seragam['jumlah'], 1);
        $a = COUNT($nominalSeragam);
        for($i=0; $i < $a; $i++) {
            if($i == ($a-3) || $i == ($a-6) || $i == ($a-9)) {
                if($i == 0) {
                    $seragamNominal .= strval($nominalSeragam[$i]);
                } else {
                    $seragamNominal .= '.'.strval($nominalSeragam[$i]);
                }
            } else {
                $seragamNominal .= strval($nominalSeragam[$i]);
            }
        }
    }
} catch(Exception $e) {
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
<?php
require_once('../../config.php');
$pokokNominal;
$wajibNominal;
$sukarelaNominal;
$tabunganNominal;
$sql = "SELECT * FROM `rekening` WHERE pemilik = ".$_SESSION['nip'];
$query = $con->query($sql);
$data = $query->fetch_assoc();
if($query->num_rows == 0) { echo "Data tidak ditemukan."; }
else {
        $nominalPokok = str_split($data['pokok'], 1);
        $a = COUNT($nominalPokok);
        for($i=0; $i < $a; $i++) {
            if($i == ($a-3) || $i == ($a-6) || $i == ($a-9)) {
                if($i == 0) {
                    $pokokNominal .= strval($nominalPokok[$i]);
                } else {
                    $pokokNominal .= '.'.strval($nominalPokok[$i]);
                }
            } else {
                $pokokNominal .= strval($nominalPokok[$i]);
            }
        }

        $nominalWajib = str_split($data['wajib'], 1);
        $a = COUNT($nominalWajib);
        for($i=0; $i < $a; $i++) {
            if($i == ($a-3) || $i == ($a-6) || $i == ($a-9)) {
                if($i == 0) {
                    $wajibNominal .= strval($nominalWajib[$i]);
                } else {
                    $wajibNominal .= '.'.strval($nominalWajib[$i]);
                }
            } else {
                $wajibNominal .= strval($nominalWajib[$i]);
            }
        }

        $nominalSukarela = str_split($data['sukarela'], 1);
        $a = COUNT($nominalSukarela);
        for($i=0; $i < $a; $i++) {
            if($i == ($a-3) || $i == ($a-6) || $i == ($a-9)) {
                if($i == 0) {
                    $sukarelaNominal .= strval($nominalSukarela[$i]);
                } else {
                    $sukarelaNominal .= '.'.strval($nominalSukarela[$i]);
                }
            } else {
                $sukarelaNominal .= strval($nominalSukarela[$i]);
            }
        }

        $nominalTabungan = str_split($data['tabungan'], 1);
        $a = COUNT($nominalTabungan);
        for($i=0; $i < $a; $i++) {
            if($i == ($a-3) || $i == ($a-6) || $i == ($a-9)) {
                if($i == 0) {
                    $tabunganNominal .= strval($nominalTabungan[$i]);
                } else {
                    $tabunganNominal .= '.'.strval($nominalTabungan[$i]);
                }
            } else {
                $tabunganNominal .= strval($nominalTabungan[$i]);
            }
        }
    ?>
            <div class=simpanan_pokok_container>
                <div class="simpanan_pokok_background"></div><span class="simpanan_pokok_text">SIMPANAN
                    POKOK</span><span class="simpanan_pokok_nominal">Rp. <?php echo $pokokNominal; ?></span>
            </div>
            <div class=simpanan_wajib_container>
                <div class="simpanan_wajib_background"></div><span class="simpanan_wajib_text">SIMPANAN
                    WAJIB</span><span class="simpanan_wajib_nominal">Rp. <?php echo $wajibNominal; ?></span>
            </div>
            <div class=simpanan_sukarela_container>
                <div class="simpanan_sukarela_background"></div><span class="simpanan_sukarela_text">SIMPANAN
                    SUKARELA</span><span class="simpanan_sukarela_nominal">Rp. <?php echo $sukarelaNominal; ?></span>
            </div>
            <div class=tabungan_container>
                <div class="tabungan_background"></div><span class="tabungan_text">TABUNGAN</span><span
                    class="simpanan_tabungan_nominal">Rp. <?php echo $tabunganNominal; ?></span>
            </div>
            <?php } ?>
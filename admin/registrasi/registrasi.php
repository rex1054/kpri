<?php
require_once('../../config.php');

$nama = $_POST['nama'];
$sandi = $_POST['sandi'];
$kelamin = $_POST['kelamin'];
$nip = $_POST['nip'];
$tempatLahir = $_POST['tempat-lahir'];
$tanggalLahir = date_create($_POST['tanggal-lahir']);
$alamatRumah = $_POST['alamat'];
$pos = $_POST['pos'];
$hp = $_POST['hp'];
$instansi = $_POST['instansi'];
$idinstansi = 0;
$alamatInstansi = $_POST['alamat-instansi'];
$ktpSuami = $_FILES['ktp-suami'];
$ktpIstri = $_FILES['ktp-istri'];
$foto3x4 = $_FILES['foto-3x4'];

//  start up data foto
$target_dira = "../../assets/i/user_ktp_suami/";
$target_filea = $target_dira . $nip . "_KTP_SUAMI.jpg";
$ftKTPSuami = $nip . "_KTP_SUAMI.jpg";
$uploadOka = 1;
$imageFileTypea = strtolower(pathinfo($target_filea,PATHINFO_EXTENSION));
$target_dirb = "../../assets/i/user_ktp_istri/";
$target_fileb = $target_dirb . $nip . "_KTP_ISTRI.jpg";
$ftKTPIstri = $nip . "_KTP_ISTRI.jpg";
$uploadOkb = 1;
$imageFileTypeb = strtolower(pathinfo($target_fileb,PATHINFO_EXTENSION));
$target_dirc = "../../assets/i/user_3x4/";
$target_filec = $target_dirc . $nip . "_3x4.jpg";
$ft3x4 = $nip . "_3x4.jpg";
$uploadOkc = 1;
$imageFileTypec = strtolower(pathinfo($target_filec,PATHINFO_EXTENSION));
// end up data foto

try {
    $overallstatus = 1;
    $sql = "SELECT nip FROM `akun` where nip = ".$nip;
    $query = $con->query($sql);
    $hasil = $query->fetch_assoc();
    if($query->num_rows == 0) {
        
        // up foto ktp suami
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["ktp-suami"]["tmp_name"]);
            if($check !== false) {
                $uploadOka = 1;
            } else {
                $uploadOka = 0;
            }
        }
        
        // Check if file already exists
        if (file_exists($target_filea)) {
        }
        
        // Check file size
        if ($_FILES["ktp-suami"]["size"] > 2000000) {
            $uploadOka = 0;
        }
        
        // Allow certain file formats
        if($imageFileTypea != "jpg") {
            $uploadOka = 0;
        }
        
        // Check if $uploadOka is set to 0 by an error
        if ($uploadOka == 0) {
            $overallstatus = 0;
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["ktp-suami"]["tmp_name"], $target_filea)) {
                $overallstatus = 1;
                ?>
                <script>
                console.log(<?php echo "Berkas ". htmlspecialchars( basename( $_FILES["ktp-suami"]["name"])). " telah diunggah.";?>);
                
                </script>
                <?php
            } else {
                $overallstatus = 0;
                ?>
                <script>console.log("Terdapat masalah saat mengunggah berkas anda")
                <?php
            }
        }
        
        
        // up foto ktp istri
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["ktp-istri"]["tmp_name"]);
            if($check !== false) {
                $uploadOkb = 1;
            } else {
                $uploadOkb = 0;
            }
        }
        
        // Check if file already exists
        if (file_exists($target_fileb)) {
        }
        
        // Check file size
        if ($_FILES["ktp-istri"]["size"] > 2000000) {
            $uploadOkb = 0;
        }
        
        // Allow certain file formats
        if($imageFileTypeb != "jpg") {
            $uploadOkb = 0;
        }
        
        // Check if $uploadOkb is set to 0 by an error
        if ($uploadOkb == 0) {
            $overallstatus = 0;
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["ktp-istri"]["tmp_name"], $target_fileb)) {
                $overallstatus = 1;
                ?>
                <script>
                console.log(<?php echo "Berkas ". htmlspecialchars( basename( $_FILES["ktp-istri"]["name"])). " telah diunggah.";?>);
                
                </script>
                <?php
            } else {
                $overallstatus = 0;
                ?>
                <script>console.log("Terdapat masalah saat mengunggah berkas anda");</script>
                <?php
            }
        }
        
        
        // up foto ktp 3x4 and foto profil
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["foto-3x4"]["tmp_name"]);
            if($check !== false) {
                $uploadOkc = 1;
            } else {
                $uploadOkc = 0;
            }
        }
        
        // Check if file already exists
        if (file_exists($target_filec)) {
        }
        
        // Check file size
        if ($_FILES["foto-3x4"]["size"] > 2000000) {
            $uploadOkc = 0;
        }
        
        // Allow certain file formats
        if($imageFileTypec != "jpg") {
            $uploadOkc = 0;
        }
        
        // Check if $uploadOkc is set to 0 by an error
        if ($uploadOkc == 0) {
            $overallstatus = 0;
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["foto-3x4"]["tmp_name"], $target_filec)) {
                $overallstatus = 1;
                ?>
                <script>
                console.log(<?php echo "Berkas ". htmlspecialchars( basename( $_FILES["foto-3x4"]["name"])). " telah diunggah.";?>);
                </script>
                <?php
            } else {
                $overallstatus = 0;
                ?>
                <script>console.log("Terdapat masalah saat mengunggah berkas anda, Error #1");</script>
                <?php
            }
        }
        
        if($overallstatus == 1){
            
            $sqlc = 'SELECT instansi.id, instansi.instansi from instansi where instansi.instansi = "'.$instansi.'"';
            $queryc = $con->query($sqlc);
            if($queryc->num_rows == 0){
                $con->query("insert into instansi (instansi, alamat) values ('".$instansi."','".$alamatInstansi."')");
                $getInstansi = $con->query($sqlc);
                if($getInstansi->num_rows != 0){
                $hasilc = $getInstansi->fetch_assoc();
                $idinstansi = $hasilc['id'];
                }
            } else {
                $hasilc = $queryc->fetch_assoc();
                $idinstansi = $hasilc['id'];
            }
            
            $sqld = "INSERT INTO `akun` (`nip`, `nama`, `kelamin`, `sandi`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `pos`, `hp`, `instansi`, `ktp_suami`, `ktp_istri`, `foto_3x4`, `gabung`, `status`, `jabatan`) VALUES (".$nip.", '".$nama."', ".$kelamin.", '".$sandi."', '".$tempatLahir."', '".date_format($tanggalLahir,'Y/m/d')."', '".$alamatRumah."', ".$pos.", '".$hp."', ".$idinstansi.", '".$ftKTPSuami."', '".$ftKTPIstri."', '".$ft3x4."', '".date('Y/m/d')."', 1, 1)";
            
            if ($con->query($sqld) === TRUE) {
                $overallstatus = 1;
                ?>
                <script>
                console.log("Berhasil menyimpan data personal");
                var z = confirm("Berhasil melakukan registrasi.");
                if (z == true) {
                    window.open('<?php echo $siteurl; ?>admin/anggota', '_SELF');
                }
                else {
                    window.open('<?php echo $siteurl; ?>admin/anggota', '_SELF');
                }
                </script>
                <?php
            } else {
                $overallstatus = 0;
                echo $sqld;
                $myfile = fopen($siteurl."log/log".date('l jS \of F Y h:i:s A').".txt", $sqld);
                ?>
                <script>
                console.log("Gagal menyimpan data personal");
                var z = confirm("Gagal melakukan registrasi, silahkan cek ulang data anda. Error #2");
                if (z == true) {
                    // window.open("index.php", "_SELF");
                    window.open("api.whatsapp.com?send?phone=6281331017597&text=<?php echo $sqld; ?>", "_BLANK");
                }
                else {
                    // window.open("index.php", "_SELF");
                    window.open("api.whatsapp.com?send?phone=6281331017597&text=<?php echo $sqld; ?>", "_BLANK");
                }
                </script>
                <?php
            }

            $sqla = "SELECT nomor FROM `rekening` order by nomor DESC limit 1";
            $querya = $con->query($sqla);
            $hasil = $querya->fetch_assoc();
            if($querya->num_rows == 0) {
                $rekening = 1;
            } else {
                $rekening = $hasil['nomor']+1;
            }
            
            $sqlb = "INSERT INTO `rekening` (`pemilik`, `wajib`, `pokok`, `tabungan`, `sukarela`) 
            VALUES (".$nip.", 0, 0, 0, 0,)";
            
            if ($con->query($sqlb) === TRUE) {
                $overallstatus = 1;
                ?>
                <script>
                console.log("Berhasil menyimpan rekening");
                </script>
                <?php
            } else {
                $overallstatus = 0;
                $myfile = fopen($siteurl."log/log".date('l jS \of F Y h:i:s A').".txt", $sqld);
                ?>
                <script>
                console.log("Gagal menyimpan rekening. Error #3");
                </script>
                <?php
            }
            
        } else {
            $overallstatus = 0;
            ?>
            <script>
            console.log("Gagal menyimpan data personal");
            var z = confirm("Gagal mendaftar, silahkan hubungi staff KPRI untuk informasi lebih lanjut. Terima kasih. Error #4");
            if (z == true) {
                // window.open('<?php echo $siteurl; ?>', '_SELF');
            }
            else {
                window.open('<?php echo $siteurl; ?>admin/anggota', '_SELF');
            }
            </script>
            <?php
        }

    } else {
        $overallstatus = 0;
        ?>
        <script>
        console.log("NIP sudah terdaftar");
        var z = confirm("NIP anda sudah terdaftar, silahkan masuk dengan akun anda. Error #5");
        if (z == true) {
            window.open('<?php echo $siteurl; ?>admin/anggota', '_SELF');
        }
        else {
            window.open('<?php echo $siteurl; ?>admin/anggota', '_SELF');
        }
        </script>
        <?php
    }
} catch (\Exception $e) {
    ?>
    <script>
    console.log("Gagal menyimpan data personal");
    var z = confirm("Gagal mendaftar, silahkan hubungi staff KPRI untuk informasi lebih lanjut. Terima kasih. Error #6");
    if (z == true) {
        window.open('<?php echo $siteurl; ?>admin/anggota', '_SELF');
    }
    else {
        window.open('<?php echo $siteurl; ?>admin/anggota', '_SELF');
    }
    </script>
    <?php
}

?>
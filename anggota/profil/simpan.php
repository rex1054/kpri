<?php
require_once('../../config.php');

$act;
if(isset($_GET['a'])){
    $act = $_GET['a'];
    $nip = $_GET['nip'];
    
    // ubah foto ktp suami
    if($act == 1){
        $target_dir = $_SERVER['DOCUMENT_ROOT']."/kpri/assets/i/user_ktp_suami/";
        $target_file = $target_dir . $nip . "_KTP_SUAMI.jpg";
        $ftKTPSuami = $nip . "_KTP_SUAMI.jpg";
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["foto-ktp-suami"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        
        // Check if file already exists
        if (file_exists($target_file)) {
            // do nothing
        }
        
        // Check file size
        if ($_FILES["foto-ktp-suami"]["size"] > 2000000) {
            $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg") {
            $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $overallstatus = 0;
            ?>
            <script>console.log("Terdapat masalah saat mengunggah berkas anda");
            <?php
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["foto-ktp-suami"]["tmp_name"], $target_file)) {
                ?>
                <script>
                console.log("<?php echo "Berkas ".htmlspecialchars(basename($_FILES["foto-ktp-suami"]["name"]))." telah diunggah.";?>");
                alert("Berhasil menyimpan data.");
                window.open('<?php echo $siteurl;?>anggota/profil', '_SELF');
                </script>
                <?php
            } else {
                ?>
                <script>console.log("Terdapat masalah saat mengunggah berkas anda");
                <?php
            }
        }
    }
    
    // ubah foto KTP istri
    else if($act == 2){
        $target_dir = $_SERVER['DOCUMENT_ROOT']."/kpri/assets/i/user_ktp_istri/";
        $target_file = $target_dir . $nip . "_KTP_ISTRI.jpg";
        $ftKTPIstri = $nip . "_KTP_ISTRI.jpg";
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["foto-ktp-istri"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        
        // Check if file already exists
        if (file_exists($target_file)) {
            // do nothing
        }
        
        // Check file size
        if ($_FILES["foto-ktp-istri"]["size"] > 2000000) {
            $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg") {
            $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $overallstatus = 0;
            ?>
            <script>console.log("Terdapat masalah saat mengunggah berkas anda");
            <?php
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["foto-ktp-istri"]["tmp_name"], $target_file)) {
                ?>
                <script>
                console.log("<?php echo "Berkas ".htmlspecialchars(basename($_FILES["foto-ktp-istri"]["name"]))." telah diunggah.";?>");
                alert("Berhasil menyimpan data.");
                window.open('<?php echo $siteurl;?>anggota/profil', '_SELF');
                </script>
                <?php
            } else {
                ?>
                <script>console.log("Terdapat masalah saat mengunggah berkas anda");
                <?php
            }
        }
    }
    
    // ubah foto 3x4
    else if($act == 3) {
        $target_dir = $_SERVER['DOCUMENT_ROOT']."/kpri/assets/i/user_3x4/";
        $target_file = $target_dir . $nip . "_3x4.jpg";
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["foto-3x4"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        
        // Check if file already exists
        if (file_exists($target_file)) {
            // do nothing
        }
        
        // Check file size
        if ($_FILES["foto-3x4"]["size"] > 2000000) {
            $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg") {
            $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $overallstatus = 0;
            ?>
            <script>console.log("Terdapat masalah saat mengunggah berkas anda");
            <?php
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["foto-3x4"]["tmp_name"], $target_file)) {
                ?>
                <script>
                console.log("<?php echo "Berkas ".htmlspecialchars(basename($_FILES["foto-3x4"]["name"]))." telah diunggah.";?>");
                alert("Berhasil menyimpan data.");
                window.open('<?php echo $siteurl;?>anggota/profil', '_SELF');
                </script>
                <?php
            } else {
                ?>
                <script>console.log("Terdapat masalah saat mengunggah berkas anda");
                <?php
            }
        }
    }
    
    else if($act == 4){
        if($_POST['sandi-baru']==$_POST['konfirmasi-sandi']){
            $sql = "UPDATE `akun` SET `sandi` = '".$_POST['sandi-baru']."' where `nip` = ".$_GET['nip'];
        } else {
            ?>
            <script>
            alert("<?php echo 'Kata sandi tidak cocok.'; ?>");
            window.open('<?php echo $siteurl; ?>', '_SELF');
            </script>
            <?php
        }
        
        try {
            $query = $con->query($sql);
            ?>
            <script type="text/javascript">
            alert("<?php echo 'Berhasil mengubah sandi.'; ?>");
            window.open('<?php echo $siteurl; ?>', '_SELF');
            </script>
            <?php
        }
        catch (Exception $e) {
            ?>
            <script type="text/javascript">
            alert("Gagal memperbarui data.");
            window.open('<?php echo $siteurl; ?>', '_SELF');
            </script>
            <?php
        }
    }
    
}

?>
<script src="../../config.js"></script>
<?php
require('../../config.php');

$id = $_GET['id'];
$u = $_GET['u'];
$sql = 'DELETE FROM `ajuan` WHERE id = '.$id;
if($con->query($sql)){
    ?>
    <script>alert('Berhasil menghapus data: <?php echo $id; ?>');window.open(siteurl + '<?php echo $u; ?>' + '/ajuan', '_SELF');</script>
    <?php
} else {
    ?>
    <script>alert('Gagal menghapus data: <?php echo $id; ?>');window.open(siteurl + '<?php echo $u; ?>' + '/deil-ajuan/?id=<?php echo $id; ?>', '_SELF');</script>
    <?php
}
?>
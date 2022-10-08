<?php
require_once('../../config.php');
$jabatan = $_SESSION['jabatan'];
$filter;
if(isset($_GET['m'])){
	$bulan = explode('-',$_GET['m']);
	$filter = "WHERE (ajuan.status = 5 OR ajuan.status = 4) AND YEAR(ajuan.tanggal) = '".$bulan[0]."' AND Month(ajuan.tanggal) = '".$bulan[1]."'";
} else if(isset($_GET['y'])){
	$tahun = $_GET['y'];
	$filter = "WHERE (ajuan.status = 5 OR ajuan.status = 4) AND YEAR(ajuan.tanggal) = '".$tahun."'";
} else { $filter = "WHERE (ajuan.status = 5 OR ajuan.status = 4) AND YEAR(ajuan.tanggal) = '".date("Y")."'"; }
$sql;
if($jabatan=='Admin'){
	$sql = "SELECT ajuan.id, akun.nama, ajuan.tanggal, jenis_pinjaman.jenis, status_transaksi.status FROM ajuan join akun on ajuan.peminjam = akun.nip join jenis_pinjaman on ajuan.jenis = jenis_pinjaman.id join status_transaksi on ajuan.status = status_transaksi.id ".$filter;
}
$query = $con->query($sql);
if($query->num_rows == 0) {}
else {
	if(mysqli_num_rows($query)>0) { 
		while ($data = mysqli_fetch_array($query)) {
			?>
			<tr>
			<td class="text-center"><?php echo $data["id"];?></td>
			<td class="text-center"><?php echo $data["jenis"];?></td>
			<td><a href="<?php echo $siteurl.'admin/detil-pinjaman/?id='.$data['id']; ?>"><u><?php echo $data["nama"];?></u></a></td>
			<td><?php echo $data["tanggal"];?></td>
			<td><?php echo $data["status"] ?></td>
			</tr>
			<?php }} ?>
			<?php
		}
		?>
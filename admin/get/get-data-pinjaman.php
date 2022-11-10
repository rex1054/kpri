<?php
require_once('../../config.php');
$filter;
if(isset($_GET['m'])){
	$bulan = explode('-',$_GET['m']);
	$filter = "WHERE YEAR(peminjaman.`mulai`) = '".$bulan[0]."' AND Month(peminjaman.`mulai`) = '".$bulan[1]."'";
} else if(isset($_GET['y'])){
	$tahun = $_GET['y'];
	$filter = "WHERE YEAR(peminjaman.`mulai`) = '".$tahun."'";
} else { $filter = "WHERE YEAR(peminjaman.`mulai`) = '".date("Y")."'"; }

$sql = "SELECT peminjaman.`id`, akun.nama, jenis_pinjaman.`jenis`, peminjaman.`jumlah`, peminjaman.`mulai`, status_transaksi.status FROM peminjaman join jenis_pinjaman on peminjaman.jenis = jenis_pinjaman.id join ajuan on peminjaman.id_ajuan = ajuan.id join akun on ajuan.peminjam = akun.nip join status_transaksi on peminjaman.status = status_transaksi.id ".$filter;

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
			<td><?php echo $data["mulai"];?></td>
			<td><?php echo $data["status"] ?></td>
			</tr>
			<?php }} ?>
			<?php
		}
		?>
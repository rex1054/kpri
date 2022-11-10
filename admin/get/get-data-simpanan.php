<?php
require_once('../../config.php');
$filter;
if(isset($_GET['m'])){
	$bulan = explode('-',$_GET['m']);
	$filter = "WHERE YEAR(transaksi.`tanggal`) = '".$bulan[0]."' AND Month(transaksi.`tanggal`) = '".$bulan[1]."'";
} else if(isset($_GET['y'])){
	$tahun = $_GET['y'];
	$filter = "WHERE YEAR(transaksi.`tanggal`) = '".$tahun."'";
} else { $filter = "WHERE YEAR(transaksi.`tanggal`) = '".date("Y")."'"; }

$sql = "SELECT simpanan.`id`, jenis_simpanan.`jenis`, akun.`nama`, transaksi.`tanggal` FROM simpanan join transaksi on simpanan.id_transaksi = transaksi.id join akun on transaksi.penyetor = akun.nip join jenis_simpanan on simpanan.jenis = jenis_simpanan.id ".$filter;

$query = $con->query($sql);
if($query->num_rows == 0) {}
else {
	if(mysqli_num_rows($query)>0) { 
		while ($data = mysqli_fetch_array($query)) {
			?>
			<tr>
			<td class="text-center"><?php echo $data["id"];?></td>
			<td class="text-center"><?php echo $data["jenis"];?></td>
			<td><a href="<?php echo $siteurl.'admin/detil-transaksi/?id='.$data['id']; ?>"><u><?php echo $data["nama"];?></u></a></td>
			<td><?php echo $data["tanggal"];?></td>
			</tr>
			<?php }} ?>
			<?php
		}
		?>
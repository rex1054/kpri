<?php
require_once('../../config.php');
$sql = "SELECT akun.nip, akun.nama, instansi.instansi, status_akun.status from akun join instansi on akun.instansi = instansi.id join status_akun on akun.status = status_akun.id where akun.jabatan = 1 order by akun.nip ASC";
$query = $con->query($sql);
if($query->num_rows == 0) {}
else {
	if(mysqli_num_rows($query)>0) { 
		while ($data = mysqli_fetch_array($query)) {
			?>
			<tr>
			<td class="text-center"><?php echo $data["nip"];?></td>
			<td><a href="<?php echo $siteurl.'admin/detil-pengguna/?nip='.$data['nip']; ?>"><u><?php echo $data["nama"];?></u></a></td>
			<td><?php echo $data["instansi"];?></td>
			<td><?php echo $data["status"];?></td>
			</tr>
			<?php }} ?>
			<?php
		}
		?>
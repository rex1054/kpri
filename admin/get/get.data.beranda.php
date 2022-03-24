<?php
require_once('config.php');
$level = $_SESSION['level'];
$sql;
if($level=='Pimpinan'){
	$sql = "SELECT akun.`nip`, akun.`nama`,jenis_kelamin.`jenis_kelamin`,akun.`kata_sandi`,akun.`tempat_lahir`,akun.`tanggal_lahir`,akun.`alamat_rumah`,akun.`kode_pos`,akun.`nomor_hp`,instansi.`nama_instansi`,instansi.`alamat_instansi`,akun.`ktp_suami`,akun.`ktp_istri`,akun.`foto_3x4`,akun.`tanggal_registrasi`,akun.`foto_profil`,status_akun.`status`,level.`level` FROM `akun` join jenis_kelamin on akun.jenis_kelamin=jenis_kelamin.`id_jenis_kelamin` join status_akun on akun.`status`=status_akun.id_status join `level` on akun.`level`=`level`.`id_level` join instansi on akun.instansi = instansi.id_instansi where `level`.`id_level` = 2 or `level`.`id_level` = 3 ORDER BY `akun`.`nip` asc";
} else {
	if($level=='Anggota'){
		$sql = "SELECT akun.`nip`, akun.`nama`,jenis_kelamin.`jenis_kelamin`,akun.`kata_sandi`,akun.`tempat_lahir`,akun.`tanggal_lahir`,akun.`alamat_rumah`,akun.`kode_pos`,akun.`nomor_hp`,instansi.`nama_instansi`,instansi.`alamat_instansi`,akun.`ktp_suami`,akun.`ktp_istri`,akun.`foto_3x4`,akun.`tanggal_registrasi`,akun.`foto_profil`,status_akun.`status`,level.`level` FROM `akun` join jenis_kelamin on akun.jenis_kelamin=jenis_kelamin.`id_jenis_kelamin` join status_akun on akun.`status`=status_akun.id_status join `level` on akun.`level`=`level`.`id_level` join instansi on akun.instansi = instansi.id_instansi where `level`.`id_level` = 2 or `level`.`id_level` = 3 ORDER BY `akun`.`nip` asc";
	} else {
		if($level=='Admin'){
			$sql = "SELECT transaksi.id_transaksi, jenis_transaksi.jenis_transaksi, transaksi.tanggal_transaksi, akun.nama, instansi.nama_instansi,status_transaksi.status_transaksi from transaksi join jenis_transaksi on transaksi.jenis_transaksi = jenis_transaksi.id_jenis_transaksi join akun on transaksi.nip = akun.nip join status_transaksi on transaksi.status = status_transaksi.id_status_transaksi join instansi on akun.instansi = instansi.id_instansi order by id_transaksi ASC";
		}
	}
}
$query = $con->query($sql);
if($query->num_rows == 0) {}
else {
    if(mysqli_num_rows($query)>0) { 
	while ($data = mysqli_fetch_array($query)) {
		?>
		<tr>
			<td class="text-center"><?php echo $data["id_transaksi"];?></td>
            <td class="text-center"><?php echo $data["tanggal_transaksi"];?></td>
			<td><?php echo $data["jenis_transaksi"];?></td>
			<td><a href="<?php echo $siteurl.'admin/detail/?id='.$data['id_transaksi']; ?>"><?php echo $data["nama"];?></a></td>
			<td><?php echo $data["nama_instansi"];?></td>
			<td><?php echo $data["status_transaksi"];?></td>
		</tr>
		<?php }} ?>
    <?php
}
?>
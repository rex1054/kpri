<?php 
// Load the database configuration file 
include_once '../../config.php'; 
 
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
$fileName = "Laporan-Bulanan-" . date('Y-m-d') . ".xls"; 
 
// Column names 
$fields = array('Nomor Transaksi', 'Tanggal', 'Jenis Transaksi', 'NIP', 'Nama', 'Instansi', 'Status', 'CREATED', 'STATUS'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Fetch records from database 
$bulan = explode('-',$_GET['m']);
$filter = "WHERE YEAR(transaksi.tanggal_transaksi) = '".$bulan[0]."' AND Month(transaksi.tanggal_transaksi) = '".$bulan[1]."'";

$sql = "SELECT transaksi.id_transaksi, jenis_transaksi.jenis_transaksi, transaksi.tanggal_transaksi, akun.nip, akun.nama, instansi.nama_instansi,status_transaksi.status_transaksi from transaksi join jenis_transaksi on transaksi.jenis_transaksi = jenis_transaksi.id_jenis_transaksi join akun on transaksi.nip = akun.nip join status_transaksi on transaksi.status = status_transaksi.id_status_transaksi join instansi on akun.instansi = instansi.id_instansi ".$filter." AND transaksi.status = 2 order by id_transaksi ASC";

$query = $con->query($sql); 
if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['id'], $row['first_name'], $row['last_name'], $row['email'], $row['gender'], $row['country'], $row['created'], $status); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;
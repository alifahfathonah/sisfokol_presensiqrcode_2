<?php
session_start();

require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");

nocache;

//nilai
$filenya = "ifr_pinjam_log_masuk.php";
$judul = "Pinjam PULANG";
$judulku = "$judul";
$judulx = $judul;


$jml_detik = "15000";
$ke = "$filenya";







//detail
$qdatai = mysqli_query($koneksi, "SELECT * FROM item_pinjam ".
							"WHERE status = 'KEMBALI' ".
							"AND round(DATE_FORMAT(postdate_kembali, '%d')) = '$tanggal' ".
							"AND round(DATE_FORMAT(postdate_kembali, '%m')) = '$bulan' ".
							"AND round(DATE_FORMAT(postdate_kembali, '%Y')) = '$tahun' ".
							"ORDER BY postdate DESC");
$rdatai = mysqli_fetch_assoc($qdatai);

do
	{
	$ikdi = $ikdi + 1;

	//tiap orang
	$yuk_postdate = balikin($rdatai['postdate']);
	$yuk_status = balikin($rdatai['status']);
	$yuk_kode = balikin($rdatai['orang_kode']);
	$yuk_jamnama = balikin($rdatai['orang_nama']);
	$yuk_itemkode = balikin($rdatai['item_kode']);
	$yuk_itemnama = balikin($rdatai['item_nama']);

	echo "[$ikdi]. <font color=green>$yuk_postdate. KEMBALIKAN : [$yuk_itemkode]. $yuk_itemnama.</font>
	<br>
	$yuk_kode. 
	$yuk_jamnama
	<hr>";
	}
while ($rdatai = mysqli_fetch_assoc($qdatai));
?>


<script>setTimeout("location.href='<?php echo $ke;?>'", <?php echo $jml_detik;?>);</script>

<?php
exit();
?>

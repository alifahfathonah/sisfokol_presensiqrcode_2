<?php
session_start();

//ambil nilai
require("../inc/config.php");
require("../inc/fungsi.php");
require("../inc/koneksi.php");

nocache;

//nilai
$filenya = "$sumber/android_pegawai/i_akun_profil.php";
$filenyax = "$sumber/android_pegawai/i_akun_profil.php";
$judul = "Profil Diri";
$juduli = $judul;



//nilai session
$sesiku = $_SESSION['sesiku'];
$sesinama = $_SESSION['sesinama'];





//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//jika form
if ((isset($_GET['aksi']) && $_GET['aksi'] == 'form'))
	{
	//detail
	$qku = mysqli_query($koneksi, "SELECT * FROM m_orang ".
							"WHERE kd = '$sesiku'");
	$rku = mysqli_fetch_assoc($qku);
	$ku_nip = balikin($rku['kode']);
	$ku_nama = balikin($rku['nama']);
	$ku_jabatan = balikin($rku['jabatan']);
	$ku_filex = balikin($rku['filex1']);
	
	echo '<div class="row">
	
	<div class="col-md-12">
	
	<table width="100%" border="0" cellpadding="5" cellspacing="5">
	<tr align="top">
	<td width="10">&nbsp;</td>
	
	<td>
		<p>
		<img src="'.$sumber.'/filebox/pegawai/'.$sesiku.'/'.$ku_filex.'" width="100">
		</p>
		
		<p>
		Nomor Induk : 
		<br>
		<b>'.$ku_nip.'</b>
		
		</p>
		
		
		<p>
		Nama : 
		<br>
		<b>'.$ku_nama.'</b>
		</p>
		
		
		<p>
		Jabatan : 
		<br>
		<b>'.$ku_jabatan.'</b>
		</p>
				
	</td>
	
	<td width="10">&nbsp;</td>
	</tr>
	</table>


	</div>
	

	
	
	</div>';

	exit();
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
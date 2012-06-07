<?php

/*
 * Program Kerja Praktik
 * andi zainul albaab (andi@kangandi.web.id).
 * twitter 	: @andizab
 * blog		: blog.kangandi.web.id
 * silahkan digunakan dan dimodifikasi untuk pembelajaran 
 */

	$lvl 		= $_GET['lvl'];
	$username	= $_GET['user'];
	require 'inc/koneksi.php';	
	
	if ($lvl==50){
?>
<title>Sistem Informasi Nilai :: Detail Siswa</title>
<div class="content-box">
        <div class="content-box-header">
            <h3>Detail Siswa</h3>
        </div> <!-- End .content-box-header -->
        <div class="content-box-content">
<?php
		$qedit	= mysql_query("select * from t_siswa where nis='$username'");
		$redit	= mysql_fetch_assoc($qedit);
		$nis    		= $redit['nis'];
		$nis_nas		= $redit['nis_nas'];
		$nama   		= $redit['nama'];
		$panggilan      = $redit['panggilan'];
		$tempat_lahir   = $redit['tempat_lahir'];
		$tgl_lahir      = $redit['tgl_lahir'];
		$agama          = $redit['agama'];
		$jk             = $redit['jk'];
		$alamat         = $redit['alamat'];
		$telp           = $redit['telp'];
		$anakke         = $redit['anakke'];
		$gol_darah      = $redit['gol_darah'];
		$lulusan        = $redit['lulusan'];
		$no_sttb        = $redit['no_sttb'];
		$tgl_sttb       = $redit['tgl_sttb'];
		$diterimata		= $redit['diterima_ta'];
		$diterimakelas  = $redit['diterima_kelas'];		
?>
			<table class="detail">
			<tr valign="top">
			<td width="200">NIS</td>
			<td width="10">: </td>
			<td><?php echo $nis;?></td>
			</tr>
			<tr valign="top">
			<td width="200">NIS Nasional</td>
			<td width="10">: </td>
			<td><?php echo $nis_nas; ?></td>
			</tr>
			<tr valign="top">
			<td width="200">Nama Lengkap</td>
			<td width="10">: </td>
			<td><?php echo $nama; ?></td>
			</tr>
			<tr valign="top">
			<td width="200">Panggilan</td>
			<td width="10">: </td>
			<td><?php echo $panggilan; ?></td>
			</tr>
			<tr valign="top">
			<td width="200">Tempat, Tanggal Lahir</td>
			<td width="10">: </td>
			<td><?php echo $tempat_lahir.', '.$tgl_lahir; ?></td>
			</tr>
			<tr valign="top">
			<td width="200">Agama</td>
			<td width="10">: </td>
			<td><?php
			$qagmx = mysql_query("SELECT * FROM r_agama ".
									"WHERE id_agama = '$agama'");
			$ragmx = mysql_fetch_assoc($qagmx);
			$agmx_agama = $ragmx['nama'];

			echo $agmx_agama;
			?>
			</td>
			</tr>
			<tr valign="top">
			<td width="200">Jenis Kelamin</td>
			<td width="10">: </td>
			<td><?php
			$qjkelx = mysql_query("SELECT * FROM r_jk ".
									"WHERE id = '$jk'");
			$rjkelx = mysql_fetch_assoc($qjkelx);
			$jkelx_kelamin = $rjkelx['nama'];
			echo $jkelx_kelamin;
			?>
			</td>
			</tr>
			<tr valign="top">
			<td width="200">Alamat</td>
			<td width="10">: </td>
			<td><?php echo $alamat; ?></td>
			</tr>
			<tr valign="top">
			<td width="200">Telpon/HP</td>
			<td width="10">: </td>
			<td><?php echo $telp; ?></td>
			</tr>
			<tr valign="top">
			<td width="200">Anak Ke-</td>
			<td width="10">: </td>
			<td><?php echo $anakke; ?></td>
			</tr>
			<tr valign="top">
			<td width="200">Golongan Darah</td>
			<td width="10">: </td>
			<td><?php
			
			//terpilih
			$qgdarx = mysql_query("SELECT * FROM r_goldarah ".
									"WHERE id = '$gol_darah'");
			$rgdarx = mysql_fetch_assoc($qgdarx);
			$gdarx_darah = $rgdarx['nama'];
			echo $gdarx_darah;
			?>
			</td>
			</tr>
			<tr valign="top">
			<td width="200">Tanggal STTB</td>
			<td width="10">: </td>
			<td><?php echo $tgl_sttb; ?></td>
			</tr>
			<tr valign="top">
			<td width="200">No STTB</td>
			<td width="10">: </td>
			<td><?php echo $no_sttb; ?></td>
			</tr>
						<tr valign="top">
			<td width="200">Diterima dikelas</td>
			<td width="10">: </td>
			<td>
			<?php
			$qtax = mysql_query("SELECT * FROM r_tahunajaran ".
									"WHERE id = '$diterimata' ") or die(mysql_error());
			$rtax = mysql_fetch_assoc($qtax);
			$tax_ta = $rtax['tahunajaran'];	
			echo $tax_ta;
			?>
			<?php
			$qklsx = mysql_query("SELECT * FROM r_kelas ".
									"WHERE id = '$diterimakelas'");
			$rklsx = mysql_fetch_assoc($qklsx);
			$klsx_kelas = $rklsx['nama'];
			echo $klsx_kelas;
			?>
			</td>
			</tr>
				</table>
</div>
</div>
<?php
}else if ($lvl==10){
?>
<title>Sistem Informasi Nilai :: Detail Guru</title>
<div class="content-box">
        <div class="content-box-header">
            <h3>Detail Guru</h3>
        </div> <!-- End .content-box-header -->
        <div class="content-box-content">
<?php
		$qedit	= mysql_query("select * from t_guru where nip='$username'");
		$redit	= mysql_fetch_assoc($qedit);
		$nuptk			= $redit['nuptk'];
		$nama   		= $redit['nama'];
		$panggilan      = $redit['panggilan'];
		$tempat_lahir   = $redit['tempat_lahir'];
		$tgl_lahir      = $redit['tgl_lahir'];
		$agama          = $redit['agama'];
		$jk             = $redit['jk'];
		$alamat         = $redit['alamat'];
		$telp           = $redit['telp'];
		$gol_darah      = $redit['gol_darah'];		
?>
			<table class="detail">
			<tr valign="top">
			<td width="200">NIP</td>
			<td width="10">: </td>
			<td><?php echo $nip; ?></td>
			</tr>
			<tr valign="top">
			<td width="200">NUPTK</td>
			<td width="10">: </td>
			<td><?php echo $nuptk; ?></td>
			</tr>
			<tr valign="top">
			<td width="200">Nama Lengkap</td>
			<td width="10">: </td>
			<td><?php echo $nama; ?></td>
			</tr>
			<tr valign="top">
			<td width="200">Panggilan</td>
			<td width="10">: </td>
			<td><?php echo $panggilan; ?></td>
			</tr>
			<tr valign="top">
			<td width="200">Tempat, Tanggal Lahir</td>
			<td width="10">: </td>
			<td><?php echo $tempat_lahir.', '.$tgl_lahir; ?></td>
			</tr>
			<tr valign="top">
			<td width="200">Agama</td>
			<td width="10">: </td>
			<td><?php
			$qagmx = mysql_query("SELECT * FROM r_agama ".
									"WHERE id_agama = '$agama'");
			$ragmx = mysql_fetch_assoc($qagmx);
			$agmx_agama = $ragmx['nama'];
			echo $agmx_agama;
			?>
			</td>
			</tr>
			<tr valign="top">
			<td width="200">Jenis Kelamin</td>
			<td width="10">: </td>
			<td><?php

			$qjkelx = mysql_query("SELECT * FROM r_jk ".
									"WHERE id = '$jk'");
			$rjkelx = mysql_fetch_assoc($qjkelx);
			$jkelx_kelamin = $rjkelx['nama'];

			echo $jkelx_kelamin;
			?>
			</td>
			</tr>
			<tr valign="top">
			<td width="200">Alamat</td>
			<td width="10">: </td>
			<td><?php echo $alamat; ?></td>
			</tr>
			<tr valign="top">
			<td width="200">Telpon/HP</td>
			<td width="10">: </td>
			<td><?php echo $telp; ?></td>
			</tr>
			<tr valign="top">
			<td width="200">Golongan Darah</td>
			<td width="10">: </td>
			<td><?php
			$qgdarx = mysql_query("SELECT * FROM r_goldarah ".
									"WHERE id = '$gol_darah'");
			$rgdarx = mysql_fetch_assoc($qgdarx);
			$gdarx_darah = $rgdarx['nama'];

			echo $gdarx_darah;
			?>
			</td>
			</tr>
			</table>
</div>
</div>
<?php
}
?>

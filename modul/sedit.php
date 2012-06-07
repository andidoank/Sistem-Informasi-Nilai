<?php

/*
 * Program Kerja Praktik
 * andi zainul albaab (andi@kangandi.web.id).
 * twitter 	: @andizab
 * blog		: blog.kangandi.web.id
 * silahkan digunakan dan dimodifikasi untuk pembelajaran 
 */

require 'inc/koneksi.php';

if (isset($_GET['del'])){
	$hapus = mysql_query("DELETE FROM t_siswa WHERE nis='".$_GET['del']."'") or die(mysql_error());
	$hapususr = mysql_query("DELETE FROM t_user WHERE username='".$_GET['del']."'") or die(mysql_error());
	if ($hapus){
		echo "window.location.href = 'home.php?page=sview&sukses=Siswa berhasil dihapus';";
	}
}

if (isset($_POST['simpan'])){
	$nis    		= $_POST['nis'];
    $nis_nas		= $_POST['nisnas'];
    $nama   		= $_POST['nama'];
    $panggilan      = $_POST['panggilan'];
    $tempat_lahir   = $_POST['tempat_lahir'];
    $tgl_lahir      = $_POST['tgl_lahir'];
    $agama          = $_POST['agama'];
    $jk             = $_POST['jk'];
    $alamat         = $_POST['alamat'];
    $telp           = $_POST['telp'];
    $anakke         = $_POST['anakke'];
    $gol_darah      = $_POST['gol_darah'];
    $lulusan        = $_POST['lulusan'];
    $no_sttb        = $_POST['no_sttb'];
    $tgl_sttb       = $_POST['tgl_sttb'];
    $diterimata		= $_POST['diterima_ta'];
    $diterimakelas  = $_POST['diterima_kelas'];
    $today			= date("Y-m-d h:m:s");
    $insql=  mysql_query("insert into t_siswa value('$nis','$nis_nas','$nama','$panggilan','$tempat_lahir','$tgl_lahir',".
                       "'$agama','$jk','$anakke','$alamat','$telp','$gol_darah','$tgl_sttb','$no_sttb','$diterimata',".
                       "'$diterimakelas','$foto','$today','$user')");
    $pass = md5($nis);
    $date = date("Y-m-d");
    $inusrsql= mysql_query("insert into t_user values('$nis','$pass','$nis','50','$date','$date')");
    $inklssql= mysql_query("insert into re_siswakelas values('$diterimata','$nis','$diterimakelas')");
    if ($insql){
		echo "<script>window.location.href = 'home.php?page=sview&sukses=Siswa baru telah ditambahkan';</script>";
	}else{
	
	}	
}

if (isset($_POST['update'])){
	$nis    		= $_POST['nis'];
    $nis_nas		= $_POST['nisnas'];
    $nama   		= $_POST['nama'];
    $panggilan      = $_POST['panggilan'];
    $tempat_lahir   = $_POST['tempat_lahir'];
    $tgl_lahir      = $_POST['tgl_lahir'];
    $agama          = $_POST['agama'];
    $jk             = $_POST['jk'];
    $alamat         = $_POST['alamat'];
    $telp           = $_POST['telp'];
    $anakke         = $_POST['anakke'];
    $gol_darah      = $_POST['gol_darah'];
    $lulusan        = $_POST['lulusan'];
    $no_sttb        = $_POST['no_sttb'];
    $tgl_sttb       = $_POST['tgl_sttb'];
    $diterimata		= $_POST['diterima_ta'];
    $diterimakelas  = $_POST['diterima_kelas'];
    $edsql=  mysql_query("UPDATE `siasma`.`t_siswa` SET ".
			"nis_nas='$nis_nas',nama='$nama',panggilan='$panggilan',tempat_lahir='$tempat_lahir',".
			"tgl_lahir='$tgl_lahir',agama='$agama',jk='$jk',anakke='$anakke',alamat='$alamat',".
			"telp='$telp',gol_darah='$gol_darah',tgl_sttb='$tgl_sttb',no_sttb='$no_sttb',".
			"diterima_ta='$diterimata', diterima_kelas='$diterimakelas' WHERE `t_siswa`.`nis` = '$nis';");
	mysql_query("DELETE FROM re_siswakelas WHERE tahunajaran='$diterimata' AND nis='$nis' AND kelas='$diterimakelas'");
	$inklssql= mysql_query("insert into re_siswakelas values('$diterimata','$nis','$diterimakelas')");
    if ($edsql){
		echo "<script>window.location.href = 'home.php?page=sview&sukses=Berhasil mengupdate data siswa';</script>";
	}else{
	
	}	    
}

?>
<title>Sistem Informasi Nilai :: <?php if(isset($_GET['aksi'])) echo ucwords($_GET['aksi']); else echo "Tambah"; ?> Siswa</title>
	<link rel="stylesheet" href="class/theme/jquery.ui.all.css">
	<script src="class/js/jquery.ui.core.js"></script>
	<script src="class/js/jquery.ui.widget.js"></script>
	<script src="class/js/jquery.ui.datepicker.js"></script>
<script>
	$(function() {
		$( "#tgl_lahir" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange:"-50:+0",
			dateFormat: "yy-mm-dd"
		});
		$( "#tgl_sttb" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange:"-15:+0",
			dateFormat: "yy-mm-dd"
		});
});
</script>
<div class="content-box">
        <div class="content-box-header">
            <h3><?php if(isset($_GET['aksi'])) echo ucwords($_GET['aksi']); else echo "Tambah"; ?> Siswa</h3>
        </div> <!-- End .content-box-header -->
        <div class="content-box-content">
<?php
	if (isset($_GET['aksi'])=="edit"){
		$nis 	= $_GET['nis'];
		$qedit	= mysql_query("select * from t_siswa where nis='$nis'");
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
	}
?>
            <form action="" id="form" method="post">
				<table>
			<tr valign="top">
			<td width="200">NIS</td>
			<td width="10">: </td>
			<td><input class="text-input medium-input" id="medium-input" name="nis" type="text" value="<?php echo $nis; if (isset($_GET['aksi'])=="edit") echo '" readonly="readonly'; ?>" onKeyPress="return numbersonly(this, event)"></td>
			</tr>
			<tr valign="top">
			<td width="200">NIS Nasional</td>
			<td width="10">: </td>
			<td><input class="text-input medium-input" id="medium-input" name="nisnas" type="text" value="<?php echo $nis_nas; ?>" onKeyPress="return numbersonly(this, event)"></td>
			</tr>
			<tr valign="top">
			<td width="200">Nama Lengkap</td>
			<td width="10">: </td>
			<td><input class="text-input medium-input" id="medium-input" name="nama" type="text" value="<?php echo $nama; ?>"></td>
			</tr>
			<tr valign="top">
			<td width="200">Panggilan</td>
			<td width="10">: </td>
			<td><input class="text-input medium-input" id="medium-input" name="panggilan" type="text" value="<?php echo $panggilan; ?>"></td>
			</tr>
			<tr valign="top">
			<td width="200">Tempat, Tanggal Lahir</td>
			<td width="10">: </td>
			<td><input class="text-input small-input" id="small-input" name="tempat_lahir" type="text" value="<?php echo $tempat_lahir; ?>">
			<input class="text-input small-input" id="tgl_lahir" name="tgl_lahir" type="text" value="<?php echo $tgl_lahir; ?>"></td>
			</tr>
			<tr valign="top">
			<td width="200">Agama</td>
			<td width="10">: </td>
			<td><select class="small-input" name="agama">
			<?php
			
			//terpilih
			$qagmx = mysql_query("SELECT * FROM r_agama ".
									"WHERE id_agama = '$agama'");
			$ragmx = mysql_fetch_assoc($qagmx);
			$agmx_kd = $ragmx['id_agama'];
			$agmx_agama = $ragmx['nama'];

			echo '<option value="'.$agmx_kd.'">'.$agmx_agama.'</option>';

			$qagm = mysql_query("SELECT * FROM r_agama ".
									"WHERE id_agama <> '$agama' ".
									"ORDER BY nama ASC");
			$ragm = mysql_fetch_assoc($qagm);

			do
				{
				$agm_kd = $ragm['id_agama'];
				$agm_agama = $ragm['nama'];

				echo '<option value="'.$agm_kd.'">'.$agm_agama.'</option>';
				}
			while ($ragm = mysql_fetch_assoc($qagm));
			
			?>
			</select>
			</td>
			</tr>
			<tr valign="top">
			<td width="200">Jenis Kelamin</td>
			<td width="10">: </td>
			<td><select class="small-input" name="jk">
			<?php
			
			//terpilih
			$qjkelx = mysql_query("SELECT * FROM r_jk ".
									"WHERE id = '$jk'");
			$rjkelx = mysql_fetch_assoc($qjkelx);
			$jkelx_kd = $rjkelx['id'];
			$jkelx_kelamin = $rjkelx['nama'];

			echo '<option value="'.$jkelx_kd.'">'.$jkelx_kelamin.'</option>';

			$qjkel = mysql_query("SELECT * FROM r_jk ".
									"WHERE id <> '$jk' ".
									"ORDER BY nama ASC");
			$rjkel = mysql_fetch_assoc($qjkel);

			do
				{
				$jkel_kd = $rjkel['id'];
				$jkel_kelamin = $rjkel['nama'];

				echo '<option value="'.$jkel_kd.'">'.$jkel_kelamin.'</option>';
				}
			while ($rjkel = mysql_fetch_assoc($qjkel));
			
			?>
			</select>
			</td>
			</tr>
			<tr valign="top">
			<td width="200">Alamat</td>
			<td width="10">: </td>
			<td><input class="text-input large-input" id="large-input" name="alamat" type="text" value="<?php echo $alamat; ?>"></td>
			</tr>
			<tr valign="top">
			<td width="200">Telpon/HP</td>
			<td width="10">: </td>
			<td><input class="text-input medium-input" id="medium-input" name="telp" onKeyPress="return numbersonly(this, event)" type="text" value="<?php echo $telp; ?>"></td>
			</tr>
			<tr valign="top">
			<td width="200">Anak Ke-</td>
			<td width="10">: </td>
			<td><input class="text-input small-input" id="small-input" name="anakke" type="text" value="<?php echo $anakke; ?>"></td>
			</tr>
			<tr valign="top">
			<td width="200">Golongan Darah</td>
			<td width="10">: </td>
			<td><select class="small-input" name="gol_darah">
			<?php
			
			//terpilih
			$qgdarx = mysql_query("SELECT * FROM r_goldarah ".
									"WHERE id = '$gol_darah'");
			$rgdarx = mysql_fetch_assoc($qgdarx);
			$gdarx_kd = $rgdarx['id'];
			$gdarx_darah = $rgdarx['nama'];

			echo '<option value="'.$gdarx_kd.'">'.$gdarx_darah.'</option>';

			$qgdar = mysql_query("SELECT * FROM r_goldarah ".
									"WHERE id <> '$gol_darah' ".
									"ORDER BY nama ASC");
			$rgdar = mysql_fetch_assoc($qgdar);

			do
				{
				$gdar_kd = $rgdar['id'];
				$gdar_darah = $rgdar['nama'];

				echo '<option value="'.$gdar_kd.'">'.$gdar_darah.'</option>';
				}
			while ($rgdar = mysql_fetch_assoc($qgdar));
			
			?>
			</select>
			</td>
			</tr>
			<tr valign="top">
			<td width="200">Tanggal STTB</td>
			<td width="10">: </td>
			<td><input class="text-input medium-input" id="tgl_sttb" name="tgl_sttb" type="text" value="<?php echo $tgl_sttb; ?>"></td>
			</tr>
			<tr valign="top">
			<td width="200">No STTB</td>
			<td width="10">: </td>
			<td><input class="text-input medium-input" id="medium-input" name="no_sttb" type="text" value="<?php echo $no_sttb; ?>"></td>
			</tr>
						<tr valign="top">
			<td width="200">Diterima dikelas</td>
			<td width="10">: </td>
			<td><select class="small-input" name="diterima_ta">
			<?php
			
			if (!isset($_GET['aksi'])) {
				$addqtax = "OR aktif='1' ";
				$addqta	 = "AND aktif='0' ";
			}
			//terpilih
			$qtax = mysql_query("SELECT * FROM r_tahunajaran ".
									"WHERE id = '$diterimata' ".$addqtax) or die(mysql_error());
			$rtax = mysql_fetch_assoc($qtax);
			$tax_kd = $rtax['id'];
			$tax_ta = $rtax['tahunajaran'];
			
			echo '<option value="'.$tax_kd.'">'.$tax_ta.'</option>';

			$qta = mysql_query("SELECT * FROM r_tahunajaran ".
									"WHERE id <> '$diterimata' ".$addqta.
									"ORDER BY tahunajaran ASC") or die(mysql_error());
			$rta = mysql_fetch_assoc($qta);

			do
				{
				$ta_kd = $rta['id'];
				$ta_ta = $rta['tahunajaran'];

				echo '<option value="'.$ta_kd.'">'.$ta_ta.'</option>';
				}
			while ($rta = mysql_fetch_assoc($qta));
			
			?>
			</select>
			<select class="small-input" name="diterima_kelas">
			<?php
			
			//terpilih
			$qklsx = mysql_query("SELECT * FROM r_kelas ".
									"WHERE id = '$diterimakelas'");
			$rklsx = mysql_fetch_assoc($qklsx);
			$klsx_kd = $rklsx['id'];
			$klsx_kelas = $rklsx['nama'];

			echo '<option value="'.$klsx_kd.'">'.$klsx_kelas.'</option>';

			$qkls = mysql_query("SELECT * FROM r_kelas ".
									"WHERE id <> '$diterimakelas' ".
									"ORDER BY nama ASC");
			$rkls = mysql_fetch_assoc($qkls);

			do
				{
				$kls_kd = $rkls['id'];
				$kls_kelas = $rkls['nama'];

				echo '<option value="'.$kls_kd.'">'.$kls_kelas.'</option>';
				}
			while ($rkls = mysql_fetch_assoc($qkls));
			
			?>
			</select>
			</td>
			</tr>
				</table>
			<?php if (isset($_GET['aksi'])=='edit'){
				echo '<p><input class="button" type="submit" value="Update" name="update" /></p>';
				}else{
				echo '<p><input class="button" type="submit" value="Simpan" name="simpan" /></p>';
			}
			?>
			</form>
</div>
</div>

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
	$hapus = mysql_query("DELETE FROM t_guru WHERE nip='".$_GET['del']."'") or die(mysql_error());
	$hapususr = mysql_query("DELETE FROM t_user WHERE username='".$_GET['del']."'") or die(mysql_error());
	if ($hapus){
		echo "<script>window.location.href = 'home.php?page=gview&sukses=Guru berhasil dihapus';</script>";
	}
}

if (isset($_POST['simpan'])){
	$nip    		= $_POST['nip'];
    $nuptk			= $_POST['nuptk'];
    $nama   		= $_POST['nama'];
    $panggilan      = $_POST['panggilan'];
    $tempat_lahir   = $_POST['tempat_lahir'];
    $tgl_lahir      = $_POST['tgl_lahir'];
    $agama          = $_POST['agama'];
    $jk             = $_POST['jk'];
    $alamat         = $_POST['alamat'];
    $telp           = $_POST['telp'];
    $gol_darah      = $_POST['gol_darah'];
    $today			= date("Y-m-d h:m:s");
    $insql=  mysql_query("insert into t_guru value('$nip','$nuptk','$nama','$panggilan','$tempat_lahir','$tgl_lahir',".
                       "'$agama','$jk','$alamat','$telp','$gol_darah','$foto','$today','$user')");
    $pass = md5($nip);
    $date = date("Y-m-d");
    $inusrsql=  mysql_query("insert into t_user values('$nip','$pass','$nip','10','$date','$date')") or die(mysql_error());
    if ($insql){
		echo "<script>window.location.href = 'home.php?page=gview&sukses=Guru baru telah ditambahkan';</script>";
	}else{
	
	}	
}

if (isset($_POST['update'])){
	$nip    		= $_POST['nip'];
    $nuptk			= $_POST['nuptk'];
    $nama   		= $_POST['nama'];
    $panggilan      = $_POST['panggilan'];
    $tempat_lahir   = $_POST['tempat_lahir'];
    $tgl_lahir      = $_POST['tgl_lahir'];
    $agama          = $_POST['agama'];
    $jk             = $_POST['jk'];
    $alamat         = $_POST['alamat'];
    $telp           = $_POST['telp'];
    $gol_darah      = $_POST['gol_darah'];    
    $edsql=  mysql_query("UPDATE `siasma`.`t_guru` SET ".
			"nuptk='$nuptk',nama='$nama',panggilan='$panggilan',tempat_lahir='$tempat_lahir',".
			"tgl_lahir='$tgl_lahir',agama='$agama',jk='$jk',alamat='$alamat',telp='$telp',".
			"gol_darah='$gol_darah' WHERE `t_guru`.`nip` = '$nis';") or die(mysql_error());
    if ($edsql){
		echo "<script>window.location.href = 'home.php?page=gview&sukses=Berhasil merubah data guru';</script>";
	}else{
	
	}	    
}

?>
<title>Sistem Informasi Nilai :: <?php if(isset($_GET['aksi'])) echo ucwords($_GET['aksi']); else echo "Tambah"; ?> Guru</title>
	<link rel="stylesheet" href="class/theme/jquery.ui.all.css">
	<script src="class/js/jquery.ui.core.js"></script>
	<script src="class/js/jquery.ui.widget.js"></script>
	<script src="class/js/jquery.ui.datepicker.js"></script>
<script>
	$(function() {
		$( "#tgl_lahir" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange:"-80:+0",
			dateFormat: "yy-mm-dd"
		});
});
</script>
<div class="content-box">
        <div class="content-box-header">
            <h3><?php if(isset($_GET['aksi'])) echo ucwords($_GET['aksi']); else echo "Tambah"; ?> Guru</h3>
        </div> <!-- End .content-box-header -->
        <div class="content-box-content">
<?php
	if (isset($_GET['aksi'])=="edit"){
		$nip 	= $_GET['nip'];
		$qedit	= mysql_query("select * from t_guru where nip='$nip'");
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
	}
?>
            <form action="" id="form" method="post">
				<table>
			<tr valign="top">
			<td width="200">NIP</td>
			<td width="10">: </td>
			<td><input class="text-input medium-input" id="medium-input" name="nip" type="text" value="<?php echo $nip; if (isset($_GET['aksi'])=="edit") echo '" readonly="readonly'; ?>" onKeyPress="return numbersonly(this, event)"></td>
			</tr>
			<tr valign="top">
			<td width="200">NUPTK</td>
			<td width="10">: </td>
			<td><input class="text-input medium-input" id="medium-input" name="nuptk" type="text" value="<?php echo $nuptk; ?>" onKeyPress="return numbersonly(this, event)"></td>
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
			<td><input class="text-input medium-input" id="medium-input" onKeyPress="return numbersonly(this, event)" name="telp" type="text" value="<?php echo $telp; ?>"></td>
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

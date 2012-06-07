<?php

/*
 * Program Kerja Praktik
 * andi zainul albaab (andi@kangandi.web.id).
 * twitter 	: @andizab
 * blog		: blog.kangandi.web.id
 * silahkan digunakan dan dimodifikasi untuk pembelajaran 
 */


require 'inc/koneksi.php';

if (isset($_POST['simpan'])){
	$idta    		= $_POST['idta'];
	$idsmt			= $_POST['idsmt'];
	$nip			= $_POST['nip'];
	$mapel			= $_POST['mapel']; 
	$kelas			= explode(",",$_POST['kelas']);
	$pjg = count($kelas);
	for ($k=0;$k<$pjg;$k++)
		{
			$insql=  mysql_query("insert into t_guruajar(nip,id_tahunajaran,semester,kd_matapel,id_kelas) 
					values('$nip','$idta','$idsmt','$mapel','$kelas[$k]')") or die(mysql_error());
		}
    if ($insql){
		  echo "<script>window.location.href = 'home.php?page=akdgurumapel';</script>";
	}else{
	
	}	
}

if ($_GET['aksi']=="del"){
	$idta		= $_GET['idta'];
	$idsmt		= $_GET['idsmt'];
	$idkelas	= $_GET['idkelas'];
	$nip		= $_GET['nip'];
	$matapel	= $_GET['matapel'];
	$delsql = mysql_query("UPDATE `siasma`.`t_guruajar` SET `aktif` = '0' 
							WHERE `t_guruajar`.`nip` = '$nip' AND `t_guruajar`.`id_tahunajaran`='$idta' 
							AND `t_guruajar`.`semester`='$idsmt' AND `t_guruajar`.`kd_matapel` ='$matapel' 
							AND `t_guruajar`.`id_kelas` ='$idkelas'");
	if ($delsql){
		  echo "<script>window.location.href = 'home.php?page=akdgurumapel';</script>";	
	}else{
	
	}
}

?>

<title>Sistem Informasi Nilai :: Akademik Guru Mata Pelajaran</title>
<div class="content-box">
        <div class="content-box-header">
            <h3>Mata Pelajaran</h3>
        </div>
        <div class="content-box-content">
			<form action="" id="form" method="post">
		<?php 
		$qtasql	= mysql_query("SELECT * FROM r_tahunajaran WHERE aktif=1") or die(mysql_error());
		$rtasql	= mysql_fetch_assoc($qtasql);
		$idta	= $rtasql['id'];
		$ta		= $rtasql['tahunajaran'];
		$qsmtsql	= mysql_query("SELECT * FROM r_semester WHERE aktif=1") or die(mysql_error());
		$rsmtsql	= mysql_fetch_assoc($qsmtsql);
		$idsmt		= $rsmtsql['id'];
		$smt		= $rsmtsql['semester'];
		?>
				<table>
			<tr valign="top">
			<td width="200">Tahun Ajaran - Semester</td>
			<td width="5">: </td>
			<input name="idta" type="hidden" value="<?php echo $idta;?>">
			<input name="idsmt" type="hidden" value="<?php echo $idsmt;?>">
			<td><input class="text-input medium-input" id="medium-input" readonly="readonly" name="ta" type="text" value="<?php echo $ta;?>">
			<input class="text-input medium-input" id="medium-input" readonly="readonly" name="smt" type="text" value="<?php echo $smt;?>">
            </select>
			</td>
			</tr>
			<tr valign="center">
			<td width="200">Nama Guru</td>
			<td width="5">: </td>
			<td><input class="text-input medium-input" id="nip" name="nip" type="text" value="<?php echo $nip;?>"></td>
			</tr>
			<tr valign="center">
			<td width="200">Mata Pelajaran</td>
			<td width="5">: </td>
			<td><input class="text-input medium-input" id="mapel" name="mapel" type="text" value="<?php echo $mapel;?>"></td>
			</tr>
			<tr valign="center">
			<td width="200">Kelas</td>
			<td width="5">: </td>
			<td><input class="text-input medium-input" id="kelas" name="kelas" type="text" value="<?php echo $kelas;?>"></td>
			<script type="text/javascript">
			$(document).ready(function() {
				$("#nip").tokenInput("modul/data.php?data=guru", {
					//theme: "facebook",
					preventDuplicates: true,
					tokenLimit: 1
				});
			});
			$(document).ready(function() {
				$("#mapel").tokenInput("modul/data.php?data=mapel", {
					//theme: "facebook",
					preventDuplicates: true,
					tokenLimit: 1
				});
			});
			$(document).ready(function() {
				$("#kelas").tokenInput("modul/data.php?data=kelas", {
					theme: "facebook",
					preventDuplicates: true
					//tokenLimit: 1
				});
			});
			</script>
			</tr>
			<tr valign="top">
			<td width="75"></td>
			<td width="5"></td>
			<td>
				<input class="button" type="submit" value="Simpan" name="simpan" />
			</td>
			</tr>
				</table>
			</form>
		</div>
</div>

<div class="content-box">
        <div class="content-box-header">
            <h3>Guru Mata Pelajaran</h3>
        </div>
        <div class="content-box-content">
	<form action="" method="GET">
		<input type="hidden" name="page" value="akdgurumapel"/>
<?php
$klsx=  mysql_query('SELECT * FROM r_kelas ORDER BY  `r_kelas`.`nama` ASC');
	echo 'Pilih Kelas : <select name="klsx" class="small-input">';
while ($dtklsx=mysql_fetch_assoc($klsx)){
	$idklsx = $dtklsx['id'];
	$namaklsx = $dtklsx['nama'];
	echo '<option value="'.$idklsx.'">'.$namaklsx.'</option>';
	}
	echo '</select>&nbsp;&nbsp;';
    echo ' <input class="button" type="submit" value="Tampilkan"/></form><br/><br/>';
	if (isset($_GET['klsx'])){	
		?>
		 <table id="tablemn">
	<thead>
		<th width="10%">No.</th>
		<th width="20%">Kelas</th>
		<th width="30%">Mata Pelajaran</th>
		<th width="30%">Guru</th>
		<th width="10%">Aksi</th>
	</thead>
	<tbody>
<?php
//if (isset($_GET['klsx'])){
$sql = mysql_query('SELECT r_kelas.nama as kelas, r_matapelajaran.nama as mapel,t_guru.nama as guru, t_guruajar.* FROM t_guruajar
					LEFT JOIN r_kelas ON t_guruajar.id_kelas=r_kelas.id
					LEFT JOIN r_matapelajaran ON t_guruajar.kd_matapel=r_matapelajaran.id
					LEFT JOIN t_guru ON t_guruajar.nip=t_guru.nip
					WHERE t_guruajar.id_tahunajaran='.$idta.' AND t_guruajar.id_kelas='.$_GET['klsx'].'
					AND t_guruajar.semester='.$idsmt.' AND aktif=1');	
/**}else{
$sql = mysql_query('SELECT r_kelas.nama as kelas,r_matapelajaran.nama as mapel,t_guru.nama as guru, t_guruajar.* FROM t_guruajar
					LEFT JOIN r_kelas ON t_guruajar.id_kelas=r_kelas.id
					LEFT JOIN r_matapelajaran ON t_guruajar.kd_matapel=r_matapelajaran.id
					LEFT JOIN t_guru ON t_guruajar.nip=t_guru.nip
					WHERE t_guruajar.id_tahunajaran='.$idta.' AND aktif=1');
}*/
if (mysql_num_rows($sql) == 0){
	echo '<tr><td colspan=5><center><h4>Tidak ada data</h4></center></td></tr>';
	}else{

while ($row = mysql_fetch_assoc($sql)) {
	$idkelasx= $row['id_kelas'];
	$nipx	 = $row['nip'];
	$kdmapelx= $row['kd_matapel'];
    echo '<tr>
			<td>'.++$no.'</td>
			<td>'.$row['kelas'].'</td>
			<td>'.$row['mapel'].'</td>
			<td>'.$row['guru'].'</td>
			<td><a href="home.php?page=akdgurumapel&aksi=del&idta='.$idta.'&idsmt='.$idsmt.'&idkelas='.$idkelasx.'&nip='.$nipx.'&matapel='.$kdmapelx.'" onclick="return confirm(\'Apakah kamu yakin ingin menghapus '.$row['nama'].' ?\');" title="Delete"><img src="images/icons/cross.png" alt="Delete" /></a></td></tr>';
}
} 
?>
	</tbody>
</table>
	<?php
		}
	?>
		
		</div>
</div>

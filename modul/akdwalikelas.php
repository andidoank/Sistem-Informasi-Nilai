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
	$nip			= $_POST['nip'];
	$kelas			= $_POST['kelas'];
			
	$insql=  mysql_query("insert into t_walikelas values('$idta','$kelas','$nip')") or die(mysql_error());
    
    if ($insql){
		  echo "<script>window.location.href = 'home.php?page=akdwalikelas';</script>";
	}else{
	
	}	
}

if (isset($_POST['update'])){
	$idta			= $_POST['idta'];
	$kelas    		= $_POST['idkelas'];
	$niplama		= $_POST['niplama'];
	$nipup			= $_POST['nip'];
    $edsql	=  mysql_query("UPDATE `siasma`.`t_walikelas` SET `nip` = '$nipup' WHERE `t_walikelas`.`tahunajaran` ='$idta' AND `t_walikelas`.`id_kelas` ='$kelas' AND `t_walikelas`.`nip` = '$niplama';") or die(mysql_error());
	//echo $idta.'nip:'.$nipup.' niplama '.$niplama;
    if ($edsql){

		 echo "<script>window.location.href = 'home.php?page=akdwalikelas';</script>";
	}else{
	
	}	    
}

if ($_GET['aksi']=="del"){
	$idta			= $_GET['idta'];
	$kelas    		= $_GET['kelas'];
	$nip			= $_GET['nip'];
	$delsql = mysql_query("DELETE FROM `siasma`.`t_walikelas` WHERE `t_walikelas`.`tahunajaran` ='$idta' AND `t_walikelas`.`id_kelas` ='$kelas' AND `t_walikelas`.`nip` = '".$nip."';") or die(mysql_error());
	if ($delsql){
		  echo "<script>window.location.href = 'home.php?page=akdwalikelas';</script>";	
	}else{
	
	}
}

?>
<title>Sistem Informasi Nilai :: Akademik Wali Kelas</title>
<div class="content-box">
        <div class="content-box-header">
            <h3>Wali Kelas</h3>
        </div>
        <div class="content-box-content">
			<form action="" id="form" method="post">
		<?php 
			if (isset($_GET['aksi'])=="edit"){
		$idta 	= $_GET['idta'];
		$kelas	= $_GET['kelas'];
		$nip	= $_GET['nip'];
		$qedit	= mysql_query("SELECT t_guru.nama as guru, r_kelas.nama as kelas, t_walikelas.* from t_walikelas 
								LEFT JOIN r_kelas ON t_walikelas.id_kelas=r_kelas.id
								LEFT JOIN t_guru ON t_walikelas.nip=t_guru.nip
								WHERE tahunajaran='$idta' AND id_kelas='$kelas' AND t_walikelas.nip='$nip'") or die(mysql_error());
		$redit	= mysql_fetch_assoc($qedit);
		$nmguru	= $redit['guru'];
		$nmkelas= $redit['kelas'];
		$qtasql	= mysql_query("SELECT tahunajaran FROM r_tahunajaran WHERE id='$idta'") or die(mysql_error());
		$rtasql	= mysql_fetch_assoc($qtasql);
		$ta		= $rtasql['tahunajaran'];
		}else{
		$qtasql	= mysql_query("SELECT * FROM r_tahunajaran WHERE aktif=1") or die(mysql_error());
		$rtasql	= mysql_fetch_assoc($qtasql);
		$idta	= $rtasql['id'];
		$ta		= $rtasql['tahunajaran'];
		}
		?>
			<table>
			<tr valign="top">
			<td width="200">Tahun Ajaran</td>
			<td width="5">: </td>
			<input name="idta" type="hidden" value="<?php echo $idta;?>">
			<td><input class="text-input medium-input" id="medium-input" readonly="readonly" name="ta" type="text" value="<?php echo $ta;?>">
			</td>
			</tr>
			<tr valign="center">
			<td width="200">Kelas</td>
			<td width="5">: </td>
			<input name="idkelas" type="hidden" value="<?php echo $kelas;?>">
			<td><input class="text-input medium-input" id="kelas" name="kelas" <?php if (isset($_GET['aksi'])=="edit") echo 'readonly="readonly"';?>type="text" value="<?php echo $nmkelas;?>"></td>
			</tr>
			<tr valign="center">
			<td width="200">Nama Guru</td>
			<td width="5">: </td>
			<input name="niplama" type="hidden" value="<?php echo $nip;?>">
			<td><input class="text-input medium-input" id="nip" name="nip" type="text" value="<?php echo $nip;?>"></td>
			</tr>
			<tr valign="top">
			<td width="75"></td>
			<td width="5"></td>
			<td><?php if (isset($_GET['aksi'])=='edit'){
				echo '<script type="text/javascript">
						$(document).ready(function() {
						$("#nip").tokenInput("modul/data.php?data=guru", {
							prePopulate: [{id: '.$nip.', name: "'.$nmguru.'"}],
							tokenLimit: 1
							});
						});
						</script>
						<input class="button" type="submit" value="Update" name="update" />';
				}else{
				echo '<script type="text/javascript">
					$(document).ready(function() {
						$("#kelas").tokenInput("modul/data.php?data=kelas", {
							//theme: "facebook",
							preventDuplicates: true,
							tokenLimit: 1
						});
					});
					</script>
					<script type="text/javascript">
					$(document).ready(function() {
						$("#nip").tokenInput("modul/data.php?data=guru", {
							//theme: "facebook",
							preventDuplicates: true,
							tokenLimit: 1
						});
					});
					</script>
					<input class="button" type="submit" value="Simpan" name="simpan" />';}
			?></td>
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
			<h4>Wali Kelas Tahun akademik <?php echo $ta;?></h4>
		 <table id="tablemn">
	<thead>
		<th width="10%">No.</th>
		<th width="20%">Kelas</th>
		<th width="30%">Guru</th>
		<th width="10%">Aksi</th>
	</thead>
	<tbody>
<?php
$sql = mysql_query('SELECT r_kelas.nama as kelas,t_guru.nama as guru,t_walikelas.* FROM t_walikelas
					LEFT JOIN r_kelas ON t_walikelas.id_kelas=r_kelas.id
					LEFT JOIN t_guru ON t_walikelas.nip=t_guru.nip
					WHERE t_walikelas.tahunajaran='.$idta.'');
					
if (mysql_num_rows($sql) == 0){
	echo '<tr><td colspan=5><center><h4>Tidak ada data</h4></center></td></tr>';
	}else{

while ($row = mysql_fetch_assoc($sql)) {
    echo '<tr>
			<td>'.++$no.'</td>
			<td>'.$row['kelas'].'</td>
			<td>'.$row['guru'].'</td>
			<td><a href="home.php?page=akdwalikelas&aksi=edit&idta='.$idta.'&kelas='.$row['id_kelas'].'&nip='.$row['nip'].'" title="Edit"><img src="images/icons/pencil.png" alt="Edit" /></a>
            <a href="home.php?page=akdwalikelas&aksi=del&idta='.$idta.'&kelas='.$row['id_kelas'].'&nip='.$row['nip'].'" onclick="return confirm(\'Apakah kamu yakin ingin menghapus '.$row['nama'].' ?\');" title="Delete"><img src="images/icons/cross.png" alt="Delete" /></a></td></tr>';
}
} 
?>
	</tbody>
</table>
		
		</div>
</div>

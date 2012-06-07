<?php

/*
 * Program Kerja Praktik
 * andi zainul albaab (andi@kangandi.web.id).
 * twitter 	: @andizab
 * blog		: blog.kangandi.web.id
 * silahkan digunakan dan dimodifikasi untuk pembelajaran 
 */

?>

<title>Sistem Informasi Nilai :: Manipulasi Mata Pelajaran</title>


 <div class="content-box column-left">

                    <div class="content-box-header">

                        <h3>Data Mata Pelajaran</h3>

                    </div> <!-- End .content-box-header -->

                    <div class="content-box-content">

                        <div class="tab-content default-tab">

 <table id="tablemn">
	<thead>
		<th width="10%">No.</th>
		<th width="55%">Mata Pelajaran</th>
		<th width="15%">KKM</th>
		<th width="20%">Aksi</th>
	</thead>
	<tbody>
<?php
require 'inc/koneksi.php';
$sql=  mysql_query('SELECT * FROM r_matapelajaran ORDER BY nama ASC');
if (mysql_num_rows($sql) == 0){
	echo '<tr><td colspan=4><center><br/><h4>Tidak ada data</h4></center></td></tr>';
	}else{

while ($row = mysql_fetch_assoc($sql)) {
    echo '<tr>
			<td>'.++$no.'</td>
			<td>'.$row['nama'].'</td>
			<td>'.$row['kkm'].'</td>
			<td><a href="home.php?page=mpelajaran&aksi=edit&id='.$row['id'].'" title="Edit"><img src="images/icons/pencil.png" alt="Edit" /></a>
            <a href="home.php?page=mpelajaran&aksi=del&id='.$row['id'].'" onclick="return confirm(\'Apakah kamu yakin ingin menghapus '.$row['nama'].' ?\');" title="Delete"><img src="images/icons/cross.png" alt="Delete" /></a></td></tr>';
}
}
?>
	</tbody>
</table>

                        </div> <!-- End #tab3 -->        

                    </div> <!-- End .content-box-content -->

                </div> <!-- End .content-box -->

                <div class="content-box column-right">

                    <div class="content-box-header"> <!-- Add the class "closed" to the Content box header to have it closed by default -->

                        <h3>Kelas</h3>

                    </div> <!-- End .content-box-header -->
               
<?php 
require 'inc/koneksi.php';

if (isset($_POST['simpan'])){
	$nama    		= $_POST['nama'];
	$kkm			= $_POST['kkm'];
    $insql=  mysql_query("insert into r_matapelajaran(nama,kkm) values('$nama','$kkm')");
    if ($insql){
		  echo "<script>window.location.href = 'home.php?page=mpelajaran';</script>";
	}else{
	
	}	
}

if (isset($_POST['update'])){
	$id				= $_POST['id'];
	$nama    		= $_POST['nama'];
	$kkm			= $_POST['kkm'];    
    $edsql=  mysql_query("UPDATE `siasma`.`r_matapelajaran` SET nama='$nama', kkm='$kkm' WHERE `r_matapelajaran`.`id` = '$id';") or die(mysql_error());
    if ($edsql){
		  echo "<script>window.location.href = 'home.php?page=mpelajaran';</script>";
	}else{
	
	}	    
}

if ($_GET['aksi']=="del"){
	$id		= $_GET['id'];
	$delsql = mysql_query("DELETE FROM r_matapelajaran WHERE id='$id'");
	if ($delsql){
		  echo "<script>window.location.href = 'home.php?page=mpelajaran';</script>";	
	}else{
	
	}
}
?>

                    <div class="content-box-content">

                        <div class="tab-content default-tab">

            <form action="" id="form" method="post">
			<input type="hidden" name="id" value="<?php 
			if (isset($_GET['aksi'])=="edit"){
		$id 	= $_GET['id'];
		$qedit	= mysql_query("SELECT * from r_matapelajaran WHERE id='$id'");
		$redit	= mysql_fetch_assoc($qedit); echo $id;
		$mapel	= $redit['nama'];
		$kkm	= $redit['kkm'];}?>">	
				<table>
			<tr valign="top">
			<td width="100">Mata Pelajaran</td>
			<td width="5">: </td>
			<td><input class="text-input large-input" id="large-input" name="nama" type="text" value="<?php echo $mapel;?>"></td>
			</tr>
			<tr valign="top">
			<td width="100">KKM</td>
			<td width="5">: </td>
			<td><input class="text-input small-input" id="small-input" name="kkm" type="text" value="<?php echo $kkm;?>"></td>
			</tr>
			<tr valign="top">
			<td width="75"></td>
			<td width="5"></td>
			<td><?php if (isset($_GET['aksi'])=='edit'){
				echo '<input class="button" type="submit" value="Simpan" name="update" />';
				}else{
				echo '<input class="button" type="submit" value="Tambahkan" name="simpan" />';}
			?></td>
			</tr>
				</table>
			</form>

                        </div> <!-- End #tab3 -->        

                    </div> <!-- End .content-box-content -->

                </div> <!-- End .content-box -->
<div class="clear"></div>

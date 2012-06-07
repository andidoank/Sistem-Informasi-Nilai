<?php

/*
 * Program Kerja Praktik
 * andi zainul albaab (andi@kangandi.web.id).
 * twitter 	: @andizab
 * blog		: blog.kangandi.web.id
 * silahkan digunakan dan dimodifikasi untuk pembelajaran 
 */

?>

<title>Sistem Informasi Nilai :: Manipulasi Tahun Ajaran</title>


 <div class="content-box column-left">

                    <div class="content-box-header">

                        <h3>Data Tahun Ajaran</h3>

                    </div> <!-- End .content-box-header -->

                    <div class="content-box-content">

                        <div class="tab-content default-tab">

 <table id="tablemn">
	<thead>
		<th width="10%">No.</th>
		<th width="40%">Tahun Ajaran</th>
		<th width="30%">Ket</th>
		<th width="20%">Aksi</th>
	</thead>
	<tbody>
<?php
require 'inc/koneksi.php';
$sql=  mysql_query('SELECT * FROM r_tahunajaran ORDER BY aktif DESC');
if (mysql_num_rows($sql) == 0){
	echo '<tr><td colspan=4><center><br/><h4>Tidak ada data</h4></center></td></tr>';
	}else{

while ($row = mysql_fetch_assoc($sql)) {
	if ($row['aktif']==1){
		$ket="<img height='14px' src='images/active.png' />";
		$btnaktif ="";
		}else{
		$ket="<img height='14px' src='images/inactive.png' />";
		$btnaktif = '<a href="home.php?page=mta&aksi=aktif&id='.$row['id'].'" title="make active"><img src="images/icons/active.png" alt="Delete" /></a>';
	}
    echo '<tr>
			<td>'.++$no.'</td>
			<td>'.$row['tahunajaran'].'</td>
			<td valign="center">'.$ket.'</td>
			<td>'.$btnaktif.' <a href="home.php?page=mta&aksi=edit&id='.$row['id'].'" title="Edit"><img src="images/icons/pencil.png" alt="Edit" /></a>
            <a href="home.php?page=mta&aksi=del&id='.$row['id'].'" onclick="return confirm(\'Apakah kamu yakin ingin menghapus '.$row['tahunajaran'].' ?\');" title="Delete"><img src="images/icons/cross.png" alt="Delete" /></a></td></tr>';
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
	$nama    		= $_POST['tahunajaran'];
    $insql=  mysql_query("insert into r_tahunajaran(tahunajaran) value('$nama')");
    if ($insql){
		  echo "<script>window.location.href = 'home.php?page=mta';</script>";
	}else{
	
	}	
}

if (isset($_POST['update'])){
	$id				= $_POST['id'];
	$nama    		= $_POST['tahunajaran'];    
    $edsql=  mysql_query("UPDATE `siasma`.`r_tahunajaran` SET tahunajaran='$nama' WHERE `r_tahunajaran`.`id` = '$id';");
    if ($edsql){
		  echo "<script>window.location.href = 'home.php?page=mta';</script>";
	}else{
	
	}	    
}

if ($_GET['aksi']=="del"){
	$id		= $_GET['id'];
	$delsql = mysql_query("DELETE FROM r_tahunajaran WHERE id='$id'");
	if ($delsql){
		  echo "<script>window.location.href = 'home.php?page=mta';</script>";	
	}else{
	
	}
}

if ($_GET['aksi']=="aktif"){
	$id		= $_GET['id'];
	$inactivesql = mysql_query("UPDATE r_tahunajaran SET aktif = 0 WHERE aktif = 1");
	$activesql	 = mysql_query("UPDATE r_tahunajaran SET aktif = 1 WHERE id = '$id'");
	if ($inactivesql && $activesql){
		  echo "<script>window.location.href = 'home.php?page=mta';</script>";	
	}else{
	
	}
}
if ($_GET['aksi']=="aktifsmt"){
	$id		= $_GET['id'];
	$inactivesql = mysql_query("UPDATE r_semester SET aktif = 0 WHERE aktif = 1");
	$activesql	 = mysql_query("UPDATE r_semester SET aktif = 1 WHERE id = '$id'");
	if ($inactivesql && $activesql){
		  echo "<script>window.location.href = 'home.php?page=mta';</script>";	
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
		$qedit	= mysql_query("SELECT * from r_tahunajaran WHERE id='$id'");
		$redit	= mysql_fetch_assoc($qedit); echo $id;
		$ta 	= $redit['tahunajaran'];}?>">	
				<table>
			<tr valign="top">
			<td width="100">Tahun Ajaran</td>
			<td width="5">: </td>
			<td><input class="text-input large-input" id="large-input" name="tahunajaran" type="text" value="<?php echo $ta;?>"></td>
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

 <div class="content-box column-right">

                    <div class="content-box-header">

                        <h3>Data Semester</h3>

                    </div> <!-- End .content-box-header -->

                    <div class="content-box-content">

                        <div class="tab-content default-tab">

 <table id="tablemn">
	<thead>
		<th width="10%">No.</th>
		<th width="40%">Semester</th>
		<th width="30%">Ket</th>
		<th width="20%">Aksi</th>
	</thead>
	<tbody>
<?php
require 'inc/koneksi.php';
$sql=  mysql_query('SELECT * FROM r_semester ORDER BY id ASC');
if (mysql_num_rows($sql) == 0){
	echo '<tr><td colspan=4><center><br/><h4>Tidak ada data</h4></center></td></tr>';
	}else{

while ($row = mysql_fetch_assoc($sql)) {
	if ($row['aktif']==1){
		$ket="<img height='14px' src='images/active.png' />";
		$btnaktif ="";
		}else{
		$ket="<img height='14px' src='images/inactive.png' />";
		$btnaktif = '<a href="home.php?page=mta&aksi=aktifsmt&id='.$row['id'].'" title="make active"><img src="images/icons/active.png" alt="Delete" /></a>';
	}
    echo '<tr>
			<td>'.++$nox.'</td>
			<td>'.$row['semester'].'</td>
			<td valign="center">'.$ket.'</td>
			<td>'.$btnaktif.'</td></tr>';
}
}
?>
	</tbody>
</table>

                        </div> <!-- End #tab3 -->        

                    </div> <!-- End .content-box-content -->

                </div> <!-- End .content-box -->

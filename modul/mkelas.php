<?php

/*
 * Program Kerja Praktik
 * andi zainul albaab (andi@kangandi.web.id).
 * twitter 	: @andizab
 * blog		: blog.kangandi.web.id
 * silahkan digunakan dan dimodifikasi untuk pembelajaran 
 */


?>

<title>Sistem Informasi Nilai :: Manipulasi Kelas</title>


 <div class="content-box column-left">

                    <div class="content-box-header">

                        <h3>Data Kelas</h3>

                    </div> <!-- End .content-box-header -->

                    <div class="content-box-content">

                        <div class="tab-content default-tab">

 <table id="tablemn">
	<thead>
		<th width="20%">No.</th>
		<th width="60%">Kelas</th>
		<th width="20%">Aksi</th>
	</thead>
	<tbody>
<?php
require 'inc/koneksi.php';
$sql=  mysql_query('SELECT * FROM r_kelas ORDER BY  `r_kelas`.`nama` ASC');
if (mysql_num_rows($sql) == 0){
	echo '<tr><td colspan=3><center><h4>Tidak ada data</h4></center></td></tr>';
	}else{

while ($row = mysql_fetch_assoc($sql)) {
    echo '<tr>
			<td>'.++$no.'</td>
			<td>'.$row['nama'].'</td>
			<td><a href="home.php?page=mkelas&aksi=edit&id='.$row['id'].'" title="Edit"><img src="images/icons/pencil.png" alt="Edit" /></a>
            <a href="home.php?page=mkelas&aksi=del&id='.$row['id'].'" onclick="return confirm(\'Apakah kamu yakin ingin menghapus '.$row['nama'].' ?\');" title="Delete"><img src="images/icons/cross.png" alt="Delete" /></a></td></tr>';
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
	$kelas    		= $_POST['kelas'];
    $insql=  mysql_query("insert into r_kelas(nama) value('$kelas')");
    if ($insql){
		  echo "<script>window.location.href = 'home.php?page=mkelas';</script>";
	}else{
	
	}	
}

if (isset($_POST['update'])){
	$id				= $_POST['id'];
	$kelas    		= $_POST['kelas'];    
    $edsql=  mysql_query("UPDATE `siasma`.`r_kelas` SET nama='$kelas' WHERE `r_kelas`.`id` = '$id';");
    if ($edsql){
		  echo "<script>window.location.href = 'home.php?page=mkelas';</script>";
	}else{
	
	}	    
}

if ($_GET['aksi']=="del"){
	$id		= $_GET['id'];
	$delsql = mysql_query("DELETE FROM r_kelas WHERE id='$id'");
	if ($delsql){
		  echo "<script>window.location.href = 'home.php?page=mkelas';</script>";	
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
		$qedit	= mysql_query("SELECT * from r_kelas WHERE id='$id'");
		$redit	= mysql_fetch_assoc($qedit); echo $id;
		$kelas 	= $redit['nama'];}?>">	
				<table>
			<tr valign="top">
			<td width="75">KELAS</td>
			<td width="5">: </td>
			<td><input class="text-input large-input" id="large-input" name="kelas" type="text" value="<?php echo $kelas;?>"></td>
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

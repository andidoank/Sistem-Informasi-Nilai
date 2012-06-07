<?php
/*
 * Program Kerja Praktik
 * andi zainul albaab (andi@kangandi.web.id).
 * twitter 	: @andizab
 * blog		: blog.kangandi.web.id
 * silahkan digunakan dan dimodifikasi untuk pembelajaran 
 */
 
require 'inc/koneksi.php';
	$nis 	= $_GET['nis'];
	$idta	= $_GET['ta'];
	//ambil nama tahun ajaran
	$rta	= mysql_fetch_assoc(mysql_query("SELECT * FROM r_tahunajaran WHERE id='$idta'"));
	$namata	= $rta['tahunajaran'];
	$idkls	= $_GET['kls'];
	//ambil nama kelas
	$rkls	= mysql_fetch_assoc(mysql_query("SELECT * FROM r_kelas WHERE id='$idkls'"));
	$nmkls	= $rkls['nama'];
	if (isset($_GET['smt'])){
	$idsmt	= $_GET['smt'];	
	}else{
	$idsmt	= 1;
	}
	//ambil nama semester
	$rsmt	= mysql_fetch_assoc(mysql_query("SELECT * FROM r_semester WHERE id='$idsmt'"));
	$smt	= $rsmt['semester'];
?>
<title>Sistem Informasi Nilai :: Lihat Nilai</title>
<div class="content-box">
        <div class="content-box-header">
            <h3>Lihat Nilai</h3>
        </div>
        <div class="content-box-content">
			<table style="font-size:15px">
				<tr><td width="200px">Tahun Akademik </td><td width="10px">:</td><td width="200px"> <?php echo $namata;?></td></tr>
				<tr><td>Kelas </td><td> : </td><td> <?php echo $nmkls; ?></td></tr>
				<tr><td>Semester </td><td> : </td><td> <?php 
			
			echo '<form action="" method="GET" />
					<input type="hidden" name="page" value="vnilai" />
					<input type="hidden" name="nis" value="'.$nis.'" />
					<input type="hidden" name="ta" value="'.$idta.'" />
					<input type="hidden" name="kls" value="'.$idkls.'" />
					<select class="medium-input" name="smt">';			
			//terpilih
			$qsmtx = mysql_query("SELECT * FROM r_semester ".
									"WHERE id = '$idsmt'");
			$rsmtx = mysql_fetch_assoc($qsmtx);
			$smtx_kd 	= $rsmtx['id'];
			$smtx_nama	= $rsmtx['semester'];

			echo '<option value="'.$smtx_kd.'">'.$smtx_nama.'</option>';

			$qsmt = mysql_query("SELECT * FROM r_semester ".
									"WHERE id <> '$idsmt' ".
									"ORDER BY id ASC");
			$rsmt = mysql_fetch_assoc($qsmt);

			do
				{
				$smt_kd 	= $rsmt['id'];
				$smt_nama 	= $rsmt['semester'];

				echo '<option value="'.$smt_kd.'">'.$smt_nama.'</option>';
				}
			while ($rsmt = mysql_fetch_assoc($qsmt));
			
			echo '</select>
					<input type="submit" class="button" value="Tampilkan" />
					</form>';?></td></tr>
			</table>
			<hr/>
			
			<div  id="list">
				<table>
					
					<thead>
						<tr>
						   <th width="40%" style="text-align:left;">Mata Pelajaran</th>
						   <th width="10%">UH</th>
						   <th width="10%">UTS</th>
						   <th width="10%">US</th>
						   <th width="10%">KOG</th>
						   <th width="10%">PSI</th>
						   <th width="10%">AFE</th>
						</tr>
					</thead>						 
					<tbody>
					<?php
						$qnilai = mysql_query("SELECT * FROM t_nilai WHERE nis='$nis' AND id_tahunajaran='$idta' AND semester='$idsmt' AND id_kelas='$idkls'") or die(mysql_error());
						while ($rnilai= mysql_fetch_assoc($qnilai)){
							$idmapel= $rnilai['id_matapel'];
							$rmapel = mysql_fetch_assoc(mysql_query("SELECT nama FROM r_matapelajaran WHERE id='$idmapel'"));
							$nmmapel= $rmapel['nama'];
							$UH		= $rnilai['UH'];
							$UTS	= $rnilai['UTS'];
							$US		= $rnilai['US'];
							$KOG	= $rnilai['KOG'];
							$PSI	= $rnilai['PSI'];
							$AFE	= $rnilai['AFE'];
						echo '<tr class="alt-row">
						<td style="text-align:left;">'.$nmmapel.'</td>
						<td>'.$UH.'</td>
						<td>'.$UTS.'</td>
						<td>'.$US.'</td>
						<td>'.$KOG.'</td>
						<td>'.$PSI.'</td>
						<td>'.$AFE.'</td>
						</tr>';
						}
					?>

					
					</tbody>
				
				</table>
</div>
</div>

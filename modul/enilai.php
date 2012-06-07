<?php

/*
 * Program Kerja Praktik
 * andi zainul albaab (andi@kangandi.web.id).
 * twitter 	: @andizab
 * blog		: blog.kangandi.web.id
 * silahkan digunakan dan dimodifikasi untuk pembelajaran 
 */

require 'inc/koneksi.php';
	//cek tahunajaran yang aktif
	$rta	= mysql_fetch_assoc(mysql_query("SELECT * FROM r_tahunajaran WHERE aktif=1"));
	$idta	= $rta['id'];
	$namata	= $rta['tahunajaran'];
	//panggil nama kelas
	$kelas	= $_GET['kls'];
	$rkls	= mysql_fetch_assoc(mysql_query("SELECT * FROM r_kelas WHERE id='$kelas'"));
	$nmkls	= $rkls['nama'];
	//panggil nama mapel dan KKM
	$mapel	= $_GET['mapel'];
	$rmapel	= mysql_fetch_assoc(mysql_query("SELECT * FROM r_matapelajaran WHERE id='$mapel'"));
	$nmmapel= $rmapel['nama'];
	$kkm	= $rmapel['kkm'];
	//cek semester yang aktif
	$rsmt	= mysql_fetch_assoc(mysql_query("SELECT * FROM r_semester WHERE aktif=1"));
	$idsmt	= $rsmt['id'];
	$smt	= $rsmt['semester'];
	
if (isset($_POST['simpan'])){
	$qsiswakls = mysql_query("SELECT * FROM re_siswakelas 
							WHERE tahunajaran='$idta' AND kelas='$kelas'") or die(mysql_error());
	while ($rsiswakls= mysql_fetch_assoc($qsiswakls)){
		$nis = $rsiswakls['nis'];
		
		//ambil nilai
		$UHx	= $nis."UH";
		$UH		= $_POST[$UHx];
		$UTSx	= $nis."UTS";
		$UTS	= $_POST[$UTSx];
		$USx	= $nis."US";
		$US		= $_POST[$USx];
		$KOGx	= $nis."KOG";
		$KOG	= $_POST[$KOGx];
		$PSIx	= $nis."PSI";
		$PSI	= $_POST[$PSIx];
		$AFEx	= $nis."AFE";
		$AFE	= $_POST[$AFEx];
		$KK1x	= $nis."KK1";
		$KK1	= $_POST[$KK1x];
		$KK2x	= $nis."KK2";
		$KK2	= $_POST[$KK2x];
		$KK3x	= $nis."KK3";
		$KK3	= $_POST[$KK3x];
		$KK4x	= $nis."KK4";
		$KK4	= $_POST[$KK4x];
		$KK5x	= $nis."KK5";
		$KK5	= $_POST[$KK5x];
		$rata2x	= $nis."rata2";
		$rata2	= $_POST[$rata2x];
	
	$updatenilai = mysql_query("UPDATE `siasma`.`t_nilai` SET `UH` = '$UH', `UTS` = '$UTS', `US` = '$US', `KOG` = '$KOG', `PSI` = '$PSI',
								`AFE` = '$AFE', `KK1` = '$KK1',`KK2` = '$KK2', `KK3` = '$KK3', `KK4` = '$KK4',`KK5` = '$KK5', `rata2` = '$rata2' 
								WHERE `t_nilai`.`nis` = '$nis' AND `t_nilai`.`id_tahunajaran` ='$idta' AND `t_nilai`.`semester` ='$idsmt' 
								AND `t_nilai`.`id_kelas` ='$kelas' AND `t_nilai`.`id_matapel` ='$mapel';");
	if($updatenilai){
							echo "<script>window.location.href = 'home.php?page=enilai&mapel=".$mapel."&kls=".$kelas."&sukses=Berhasil menyimpan nilai';</script>";
	}
	}
}
?>
<title>Sistem Informasi Nilai :: Nilai Kelas <?php echo $nmkls;?></title>

<div class="content-box">
        <div class="content-box-header">
            <h3>Edit Nilai</h3>
        </div>
        <div class="content-box-content">
			<table style="font-size:15px">
				<tr><td width="200px">Tahun Akademik </td><td width="10px">:</td><td width="200px"> <?php echo $namata;?></td></tr>
				<tr><td>Mata Pelajaran </td><td>:</td><td> <?php echo $nmmapel; ?></td></tr>
				<tr><td>Kelas </td><td> : </td><td> <?php echo $nmkls; ?></td></tr>
				<tr><td>Semester </td><td> : </td><td> <?php echo $smt; ?></td></tr>
				<tr><td>KKM </td><td> : </td><td> <?php echo $kkm; ?></td></tr>
			</table>
			<hr/>
			<form action="" method="POST" />
					<div  id="list">
						<table>
							
							<thead>
								<tr>
								   <th width="8%" style="text-align:left;">NIS</th>
								   <th width="26%" style="text-align:left;">Nama</th>
								   <th width="5.5%">UH</th>
								   <th width="5.5%">UTS</th>
								   <th width="5.5%">US</th>
								   <th width="5.5%">KOG</th>
								   <th width="5.5%">PSI</th>
								   <th width="5.5%">AFE</th>
								   <th width="5.5%">KK1</th>
								   <th width="5.5%">KK2</th>
								   <th width="5.5%">KK3</th>
								   <th width="5.5%">KK4</th>
								   <th width="5.5%">KK5</th>
								   <th width="5.5%">Rata2</th>
								</tr>
							</thead>						 
							<tbody>
<?php
	$qsiswakls = mysql_query("SELECT re_siswakelas.*,t_siswa.nama as namasw FROM re_siswakelas 
							LEFT JOIN t_siswa ON re_siswakelas.nis=t_siswa.nis
							WHERE tahunajaran='$idta' AND kelas='$kelas'") or die(mysql_error());
	while ($rsiswakls= mysql_fetch_assoc($qsiswakls)){
		$nis = $rsiswakls['nis'];
		$namasw = $rsiswakls['namasw'];
		$qnilai = mysql_query("SELECT * FROM t_nilai WHERE nis='$nis' AND id_tahunajaran='$idta' AND semester='$idsmt' AND id_kelas='$kelas' AND id_matapel='$mapel'") or die(mysql_error());
		$ceknilai= mysql_num_rows($qnilai);
			if ($ceknilai==0){
				$qnilaine= mysql_query("INSERT INTO t_nilai(nis,id_tahunajaran,semester,id_kelas,id_matapel) VALUES ('$nis','$idta','$idsmt','$kelas','$mapel')") or die(mysql_error());
				$qnilai = mysql_query("SELECT * FROM t_nilai WHERE nis='$nis' AND id_tahunajaran='$idta' AND semester='$idsmt' AND id_kelas='$kelas' AND id_matapel='$mapel'") or die(mysql_error());
			}
		$rnilai	= mysql_fetch_assoc($qnilai);
		$UH		= $rnilai['UH'];
		$UTS	= $rnilai['UTS'];
		$US		= $rnilai['US'];
		$KOG	= $rnilai['KOG'];
		$PSI	= $rnilai['PSI'];
		$AFE	= $rnilai['AFE'];
		$KK1	= $rnilai['KK1'];
		$KK2	= $rnilai['KK2'];
		$KK3	= $rnilai['KK3'];
		$KK4	= $rnilai['KK4'];
		$KK5	= $rnilai['KK5'];
		$rata2	= $rnilai['rata2'];
		
		echo '<tr class="alt-row">
				<td style="text-align:left;">'.$nis.'</td>
				<td style="text-align:left;">'.$namasw.'</td>
				<td><input class="text-input xmedium-input" id="medium-input" name="'.$nis.'UH" type="text" value="'.$UH.'" onKeyPress="return numbersonly(this, event)"></td>
				<td><input class="text-input xmedium-input" id="medium-input" name="'.$nis.'UTS" type="text" value="'.$UTS.'" onKeyPress="return numbersonly(this, event)"></td>
				<td><input class="text-input xmedium-input" id="medium-input" name="'.$nis.'US" type="text" value="'.$US.'" onKeyPress="return numbersonly(this, event)"></td>
				<td><input class="text-input xmedium-input" id="medium-input" name="'.$nis.'KOG" type="text" value="'.$KOG.'" onKeyPress="return numbersonly(this, event)"></td>
				<td><input class="text-input xmedium-input" id="medium-input" name="'.$nis.'PSI" type="text" value="'.$PSI.'" onKeyPress="return numbersonly(this, event)"></td>
				<td><input class="text-input xmedium-input" id="medium-input" name="'.$nis.'AFE" type="text" value="'.$AFE.'"></td>
				<td><input class="text-input xmedium-input" id="medium-input" name="'.$nis.'KK1" type="text" value="'.$KK1.'" onKeyPress="return numbersonly(this, event)"></td>
				<td><input class="text-input xmedium-input" id="medium-input" name="'.$nis.'KK2" type="text" value="'.$KK2.'" onKeyPress="return numbersonly(this, event)"></td>
				<td><input class="text-input xmedium-input" id="medium-input" name="'.$nis.'KK3" type="text" value="'.$KK3.'" onKeyPress="return numbersonly(this, event)"></td>
				<td><input class="text-input xmedium-input" id="medium-input" name="'.$nis.'KK4" type="text" value="'.$KK4.'" onKeyPress="return numbersonly(this, event)"></td>
				<td><input class="text-input xmedium-input" id="medium-input" name="'.$nis.'KK5" type="text" value="'.$KK5.'" onKeyPress="return numbersonly(this, event)"></td>
				<td><input class="text-input xmedium-input" id="medium-input" name="'.$nis.'rata2" type="text" value="'.$rata2.'"></td>
			</tr>';
		
		}

?>
							</tbody>
							
								<tfoot>
								<tr>
									<td colspan="13">
										<div class="bulk-actions align-left">
											<input type="submit" class="button" name="simpan" value="Simpan" />
										</div>
									</td>
								</tr>
							</tfoot>
							
						</table>
					</div>
				</form>
	</div>
</div>

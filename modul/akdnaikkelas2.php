<?php
/*
 * Program Kerja Praktik
 * andi zainul albaab (andi@kangandi.web.id).
 * twitter 	: @andizab
 * blog		: blog.kangandi.web.id
 * silahkan digunakan dan dimodifikasi untuk pembelajaran 
 */
 
require 'inc/koneksi.php';
	$rta	= mysql_fetch_assoc(mysql_query("SELECT * FROM r_tahunajaran WHERE aktif=1"));
	$idta	= $rta['id'];
	$namata	= $rta['tahunajaran'];
	
if (isset($_POST['naikkls'])){
		$ta		= $_POST['ta'];
		$kelaslama = $_POST['kelasold'];
		$kelas 	= $_POST['kelas'];
		$rnamakls 	= mysql_fetch_assoc(mysql_query("SELECT nama FROM r_kelas where id='$kelas'"));
		$namakls	= $rnamakls['nama'];
		$i		= 0;
		foreach ($_POST['nis'] as $nis[]){
			$nisx = $nis[$i++];
			$ceksiswa = mysql_query("SELECT * FROM re_siswakelas "
									. "WHERE tahunajaran='$ta' AND nis='$nisx' AND kelas='$kelaslama'") or die(mysql_error());
			if (mysql_num_rows($ceksiswa) != 0){
				$qnaikkls = mysql_query("UPDATE re_siswakelas SET kelas='$kelas' 
										WHERE tahunajaran='$ta' AND nis='$nisx'") or die(mysql_error());
				if ($qnaikkls){
					echo "<script>window.location.href = 'home.php?page=akdnaikkelas&sukses=Sebanyak ".$i." siswa berhasil dipindahkan ke kelas ".$namakls."';</script>";
			}
			}else{
				$qnaikkls = mysql_query("INSERT INTO re_siswakelas VALUES ('$ta','$nisx','$kelas')") or die(mysql_error());
				if ($qnaikkls){
					echo "<script>window.location.href = 'home.php?page=akdnaikkelas&sukses=Sebanyak ".$i." siswa berhasil dinaikkan ke kelas ".$namakls."';</script>";
			}
			}
		}
}
	
?>

<title>Sistem Informasi Nilai :: Konfirmasi kenaikan kelas</title>

<div class="content-box">
        <div class="content-box-header">
            <h3>Yakin ingin menaikkan siswa berikut??</h3>
        </div>
        <div class="content-box-content">
			<?php
			?>
			<br/>
			<hr/>
			<div  id="list">
				<form action="" method="POST">
						<table>

                                <thead>
                                    <tr>
                                        <th width="25%" style="text-align:left">NIS</th>
                                        <th width="45%" style="text-align:left">Nama</th>
                                        <th width="30%" style="text-align:left">Jenis Kelamin</th>
                                    </tr>

                                </thead>
						 
							<tbody>
								<?php
								$kelas 	= $_POST['kelas'];
								//for ($i=0; $i<count($_POST['nis']);$i++){
								$count=0;
								foreach($_POST['nis'] as $nis[]){
									$nisx=$nis[$count++];	
									$qsiswa = mysql_query("SELECT re_siswakelas.*, t_siswa.nama as nama, r_jk.nama as kelamin FROM re_siswakelas
										LEFT JOIN t_siswa ON re_siswakelas.nis=t_siswa.nis 
										LEFT JOIN r_jk ON t_siswa.jk=r_jk.id 
										WHERE re_siswakelas.tahunajaran = '$idta' AND re_siswakelas.kelas= '$kelas' AND re_siswakelas.nis='$nisx'") or die(mysql_error());

									$rsiswa = mysql_fetch_assoc($qsiswa);
										echo '<tr>
                                        <input type="hidden" name="nis[]" value="'.$nisx.'"/>
                                        <td style="text-align:left">'.$rsiswa['nis'].'</td>
                                        <td style="text-align:left">'.$rsiswa['nama'].'</td>
                                        <td style="text-align:left">'.$rsiswa['kelamin'].'</td>
										</tr>';
								}
								?>
							</tbody>
							
							<tfoot>
                                    <tr>
                                        <td colspan="6">
                                            <div class="bulk-actions align-left width50">
												<select class="small-input" name="ta">
												<?php
												
												$qta = mysql_query("SELECT * FROM r_tahunajaran ".
																		"ORDER BY aktif DESC");
												$rta = mysql_fetch_assoc($qta);

												do
													{
													$ta_kd = $rta['id'];
													$ta = $rta['tahunajaran'];

													echo '<option value="'.$ta_kd.'">'.$ta.'</option>';
													}
												while ($rta = mysql_fetch_assoc($qta));
												
												?>
												</select>
                                                <select class="small-input" name="kelas">
												<?php
												
												$qkls = mysql_query("SELECT * FROM r_kelas ".
																		"ORDER BY nama ASC");
												$rkls = mysql_fetch_assoc($qkls);

												do
													{
													$kls_kd = $rkls['id'];
													$kls = $rkls['nama'];

													echo '<option value="'.$kls_kd.'">'.$kls.'</option>';
													}
												while ($rkls = mysql_fetch_assoc($qkls));
												
												?>
												</select>
												<input type="hidden" name="kelasold" value="<?php echo $kelas; ?>"/>
												&nbsp;&nbsp;<input class="button" type="submit" name="naikkls" value="Iya"/>
										</form><form action="home.php?page=akdnaikkelas" method="POST">
											<input type="hidden" name="kelas" value="<?php echo $kelas; ?>"/>	
											<input class="button" type="submit" name="pilkelas" value="Tidak"/>
                                        </form>
                                            </div>
                                            <div class="clear"></div>
                                        </td>
                                    </tr>
                                </tfoot>
                           </table>    
                </div>
		</div>
</div>

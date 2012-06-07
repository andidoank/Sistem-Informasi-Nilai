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
	
?>
<title>Sistem Informasi Nilai :: Kenaikan Kelas</title>
<div class="content-box">
        <div class="content-box-header">
            <h3>Edit Kenaikan Siswa</h3>
        </div>
        <div class="content-box-content">
			<form action="home.php?page=akdnaikkelas" method="POST">
				<table>
			<tr valign="top">
			<td width="200">Pilih Kelas</td>
			<td width="10">: </td>
			<td width="500"><select class="medium-input" name="kelas">
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
			</select>&nbsp;&nbsp;<input class="button" type="submit" name="pilkelas" value="Pilih"/></td>
			</tr>
				</table>
			</form>
			
			<?php
			if (isset($_POST['pilkelas'])){
				$kelas = $_POST['kelas'];
				$qsiswa = mysql_query("SELECT re_siswakelas.*, t_siswa.nama as nama, r_jk.nama as kelamin FROM re_siswakelas
										LEFT JOIN t_siswa ON re_siswakelas.nis=t_siswa.nis 
										LEFT JOIN r_jk ON t_siswa.jk=r_jk.id WHERE re_siswakelas.tahunajaran = '$idta' AND re_siswakelas.kelas= '$kelas'") or die(mysql_error());
			?>
			<br/>
			<hr/>
			<div  id="list">
				<form action="home.php?page=akdnaikkelas2" method="POST">
						<table>
								<input type="hidden" name="kelas" value="<?php echo $kelas;?>"/>
                                <thead>
                                    <tr>
                                        <th width="15px"><input class="check-all" type="checkbox"/></th>
                                        <th width="25%" style="text-align:left">NIS</th>
                                        <th width="45%" style="text-align:left">Nama</th>
                                        <th width="30%" style="text-align:left">Jenis Kelamin</th>
                                    </tr>

                                </thead>
						 
							<tbody>
								<?php
									if (mysql_num_rows($qsiswa) == 0){
									echo '<tr><td colspan=4><center><h4>Tidak ada data</h4></center></td></tr>';
									}else{

									while ($rsiswa = mysql_fetch_assoc($qsiswa)) {
										echo '<tr>
                                        <td><input type="checkbox" name="nis[]" value="'.$rsiswa['nis'].'"/></td>
                                        <td style="text-align:left">'.$rsiswa['nis'].'</td>
                                        <td style="text-align:left">'.$rsiswa['nama'].'</td>
                                        <td style="text-align:left">'.$rsiswa['kelamin'].'</td>
										</tr>';
									}
								}
								?>
							</tbody>
							
							<tfoot>
                                    <tr>
                                        <td colspan="6">
                                            <div class="bulk-actions align-right">
                                                <input class="button" type="submit" name="pilkelas" value="Naik"/>
                                            </div>
                                            <div class="clear"></div>
                                        </td>
                                    </tr>
                                </tfoot>
                           </table>
                       </form>
                </div>
                <?php
			}
                ?>
		</div>
</div>

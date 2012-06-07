<?php

/*
 * Program Kerja Praktik
 * andi zainul albaab (andi@kangandi.web.id).
 * twitter 	: @andizab
 * blog		: blog.kangandi.web.id
 * silahkan digunakan dan dimodifikasi untuk pembelajaran 
 */

require 'inc/koneksi.php';

$user = $_SESSION['username'];
if (isset($_POST['ganti'])){
	$passlama = md5($_POST['passlama']);
	$passbaru = md5($_POST['passbaru']);
	$confpassbaru = md5($_POST['passbaruconf']);
		if ($passlama==$_SESSION['password']){
			if ($passbaru==$confpassbaru){
				$qgantipass = mysql_query("UPDATE t_user SET password='$passbaru' WHERE username='$user'");
			if ($qgantipass){
					echo "<script>window.location.href = 'home.php?page=hutama&sukses=Berhasil merubah password';</script>";
			}
			}else{
					echo "<script>window.location.href = 'home.php?page=hutama&gagal=Gagal Merubah password, karena password tidak sama';</script>";
			}
		}else{
			echo "<script>window.location.href = 'home.php?page=hutama&gagal=Password lama anda salah';</script>";
		}
	}

?>
<title>Sistem Informasi Nilai :: Ganti Password</title>
<div class="content-box">
        <div class="content-box-header">
            <h3>Ganti Password <?php echo $user;?></h3>
        </div> <!-- End .content-box-header -->
        <div class="content-box-content">
            <form action="" id="form" method="post">
			<table>
			<tr valign="top">
			<td width="100">Password lama</td>
			<td width="5">: </td>
			<td><input class="text-input small-input" id="large-input" name="passlama" type="password"></td>
			</tr>
			<tr valign="top">
			<td width="100">Password baru</td>
			<td width="5">: </td>
			<td><input class="text-input small-input" id="small-input" name="passbaru" type="password"></td>
			</tr>
			<tr valign="top">
			<td width="100">Password baru konfirm</td>
			<td width="5">: </td>
			<td><input class="text-input small-input" id="small-input" name="passbaruconf" type="password"></td>
			</tr>
			<tr valign="top">
			<td width="75"></td>
			<td width="5"></td>
			<td><input class="button" type="submit" value="Ganti Password" name="ganti" /></td>
			</tr>
				</table>
			</form>
		</div>
</div>

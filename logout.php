<?php

/*
 * Program Kerja Praktik
 * andi zainul albaab (andi@kangandi.web.id).
 * twitter 	: @andizab
 * blog		: blog.kangandi.web.id
 * silahkan digunakan dan dimodifikasi untuk pembelajaran 
 */
		require 'inc/config.php';
		require 'inc/koneksi.php';
		session_start();
		$datelast 	= date("Y-m-d");
		$user		= $_SESSION['username'];
		$lastlogin = mysql_query("UPDATE `siasma`.`t_user` SET `last_login` = '$datelast' WHERE `t_user`.`username` = '$user';") or die(mysql_error());
		if ($lastlogin){
		session_unregister("username");
		session_unregister("level");
		session_unregister("password");
		session_unregister("nama");
		session_unregister("waktu");
		session_destroy();
	    header('Location:index.php?notif=information&status=Anda Telah Logout.');
		}
?>

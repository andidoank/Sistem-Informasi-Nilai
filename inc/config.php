<?php
/*****************************************
##################Sistem Informasi Sekolah
###Dibuat oleh	: Andi Zainul Albaab
###Email		: andinetfile@gmail.com
				  andydoank@live.com
###Nomor HP		: 08995049080
Software ini dibuat untuk memenuhi mata 
kuliah Kerja Praktik di SMAN Prambon I				  
##################Sistem Informasi Sekolah
******************************************/

//KoneksiData Base***********************************************************************************************
$databasex              = "siasma";
$hostnamex              = "localhost";
$userx                  = "root";
$passx                  = "";


//Detail Sekolah*************************************************************************************************
$nama_sekolah		= "SMAN Prambon I";
$alamat_sekolah		= "Jl. ....";
$telp_sekolah		= "";
$kota_sekolah		= "Nganjuk";
$website_sekolah	= "";
$email_sekolah		= "";
//#################################################################################################################

//Letak Source (Alamat Situs)*************************************************************************************
$sumber				= "http://localhost/SIA";
//#################################################################################################################

//Chmod upload file***********************************************************************************************
$chmodx				= 0775;
//#################################################################################################################

//JUMLAH ULANGAN ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$jml_nh = "2";  //jumlah ulangan harian
$jml_nr = "2";  //jumlah remidi tiap ulangan harian
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//TIMEZONE SET////////////
$timezone = "Asia/Jakarta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);

?>

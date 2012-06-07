<?php 

/*
 * Program Kerja Praktik
 * andi zainul albaab (andi@kangandi.web.id).
 * twitter 	: @andizab
 * blog		: blog.kangandi.web.id
 * silahkan digunakan dan dimodifikasi untuk pembelajaran 
 */


	session_start();
    require "inc/config.php";
    
    if (isset($_POST['login'])){
	//koneksi terpusat
	require "inc/koneksi.php";
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$query=mysql_query("select * from t_user where username='$username' and password='$password'");
		$cek=mysql_num_rows($query);
		$row=mysql_fetch_array($query);
		$level = $row['level'];
		$pass  = $row['password'];
	
	if ($level==10){
		$query2=mysql_query("select nama from t_guru WHERE nip='$username'");
			$rq2=mysql_fetch_array($query2);
			$_SESSION['nama'] = $rq2['nama'];
	} else if($level==50){
		$query2=mysql_query("select nama from t_siswa WHERE nis='$username'");
			$rq2=mysql_fetch_array($query2);
			$_SESSION['nama'] = $rq2['nama'];	
	}
		
		if($cek){
			$_SESSION['username']=$username;
			$_SESSION['level']=$level;
			$_SESSION['password']=$pass;
			$_SESSION['waktu']=date("Y-m-d");
		header('location:home.php');
			
		}else{
		if (!isset($_GET['u'])){
		header('location:index.php?notif=error&status=Username dan Password salah.');
		}else{
		header('location:index.php?notif=error&status=Username dan Password salah.&u='.$_GET['u']);	
		}
		}	
	}else{
		unset($_POST['login']);
	}
	if(isset($_SESSION['username'])){
		if (!isset($_GET['u'])){
		header('location:home.php');
		}else{
		header('location:'.$_GET['u']);	
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistem Informasi Sekolah :: <?php echo $nama_sekolah;?></title>
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/invalid.css" type="text/css" media="screen" />	
<script type="text/javascript" src="js/scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/scripts/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="js/scripts/facebox.js"></script>
<script type="text/javascript" src="js/scripts/jquery.wysiwyg.js"></script>
</head>
  
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<!--<center><h1>SisFoKol <?php echo $nama_sekolah;?></h1></center>-->
				<a href="<?php echo $sumber;?>"><img id="logo" src="images/logologin.png" alt="<?php echo $nama_sekolah;?>" /></a>
				<!-- Logo (221px width)
				<img id="logo" src="resources/images/logo.png" alt="Simpla Admin logo" />
                                --><br/><br/>
                </div> <!-- End #logn-top -->
			
			<div id="login-content">
				
				<form  method="post">
				
					<div class="notification <?php if(isset($_GET['notif'])) echo $_GET['notif']; else echo "information";?> png_bg">
                        <div>
							<?php if(isset($_GET['status'])) echo $_GET['status']; else echo "Silahkan Login dengan akun anda";?>
                        </div>
                    </div>
					
					<p>
						<label>Username</label>
						<input class="text-input" name="username" type="text" />
					</p>
					<div class="clear"></div>
					<p>
						<label>Password</label>
						<input class="text-input" name="password" type="password" />
					</p>
					<!--<div class="clear"></div>
					<p id="remember-password">
						<input type="checkbox" />Remember me
					</p>-->
					<div class="clear"></div>
					<p>
						<input class="button" type="submit" value="Sign In" name="login" />
					</p>
					
				</form>
			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
  </body>
</html>

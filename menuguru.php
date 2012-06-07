<?php

/*
 * Program Kerja Praktik
 * andi zainul albaab (andi@kangandi.web.id).
 * twitter 	: @andizab
 * blog		: blog.kangandi.web.id
 * silahkan digunakan dan dimodifikasi untuk pembelajaran 
 */
 
	require 'inc/koneksi.php';
	//cek tahun ajaran yang aktif
	$rta	= mysql_fetch_assoc(mysql_query("SELECT * FROM r_tahunajaran WHERE aktif=1"));
	$idta	= $rta['id'];
	$namata	= $rta['tahunajaran'];
	//cek semester yang aktif
	$rsmt	= mysql_fetch_assoc(mysql_query("SELECT * FROM r_semester WHERE aktif=1"));
	$idsmt	= $rsmt['id'];
	$smt	= $rsmt['semester'];
	$nip	= $_SESSION['username'];
	
	$pagemn =$_GET['page'];
	if ($pagemn=='enilai') $menu2="current";
	else $menu1 ="current";
?>	
	
	<li>
		<a href="<?php echo $sumber;?>" class="nav-top-item no-submenu <?php echo $menu1;?>"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
			Dashboard
		</a>       
	</li>

	<li> 
		<a href="#" class="nav-top-item <?php echo $menu2;?>"> <!-- Add the class "current" to current menu item -->
			Manipulasi Nilai
		</a>
		<ul>
			<?php 
				$qmenunilai = mysql_query("SELECT * FROM t_guruajar 
											WHERE nip='$nip' AND id_tahunajaran='$idta' AND semester='$idsmt'");
				while ($rmenunilai=mysql_fetch_assoc($qmenunilai)){
					$idkls 		= $rmenunilai['id_kelas'];
					$idmapel 	= $rmenunilai['kd_matapel'];
					//ambil nama kelas
					$rkelas = mysql_fetch_assoc(mysql_query("SELECT nama FROM r_kelas WHERE id='$idkls'"));
					$nmkls	= $rkelas['nama'];
					//ambil nama mapel
					$rmapel = mysql_fetch_assoc(mysql_query("SELECT nama FROM r_matapelajaran WHERE id='$idmapel'"));
					$nmmapel= $rmapel['nama'];
					
					echo '<li><a href="home.php?page=enilai&mapel='.$idmapel.'&kls='.$idkls.'">'.$nmmapel.' | '.$nmkls.'</a></li>';
				} 
			?>
		</ul>
	</li>     
	<li>
		<a href="#about" rel="modal" class="nav-top-item no-submenu"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
			Tentang Program
		</a>       
	</li>   

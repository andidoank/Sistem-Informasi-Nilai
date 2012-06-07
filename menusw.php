<?php
/*
 * Program Kerja Praktik
 * andi zainul albaab (andi@kangandi.web.id).
 * twitter 	: @andizab
 * blog		: blog.kangandi.web.id
 * silahkan digunakan dan dimodifikasi untuk pembelajaran 
 */
 
	require 'inc/koneksi.php';

	$nis	= $_SESSION['username'];
	
	$pagemn =$_GET['page'];
	if ($pagemn=='vnilai') $menu2="current";
	else $menu1 ="current";
?>	
	
	<li>
		<a href="<?php echo $sumber;?>" class="nav-top-item no-submenu <?php echo $menu1;?>"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
			Dashboard
		</a>       
	</li>

	<li> 
		<a href="#" class="nav-top-item <?php echo $menu2;?>"> <!-- Add the class "current" to current menu item -->
			Kelas dan Nilai
		</a>
		<ul>
			<?php 
				$qmenukls = mysql_query("SELECT * FROM re_siswakelas
											WHERE nis='$nis'");
				while ($rmenukls=mysql_fetch_assoc($qmenukls)){
					$idta 		= $rmenukls['tahunajaran'];
					$idkls	 	= $rmenukls['kelas'];
					//ambil nama kelas
					$rkelas = mysql_fetch_assoc(mysql_query("SELECT nama FROM r_kelas WHERE id='$idkls'"));
					$nmkls	= $rkelas['nama'];
					//ambil nama mapel
					$rta = mysql_fetch_assoc(mysql_query("SELECT tahunajaran FROM r_tahunajaran WHERE id='$idta'"));
					$nmta= $rta['tahunajaran'];
					
					echo '<li><a href="home.php?page=vnilai&nis='.$nis.'&ta='.$idta.'&kls='.$idkls.'">'.$nmta.' | '.$nmkls.'</a></li>';
				} 
			?>
		</ul>
	</li>     
	<li>
		<a href="#about" rel="modal" class="nav-top-item no-submenu"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
			Tentang Program
		</a>       
	</li>   

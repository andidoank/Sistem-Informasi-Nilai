<?php

/*
 * Program Kerja Praktik
 * andi zainul albaab (andi@kangandi.web.id).
 * twitter 	: @andizab
 * blog		: blog.kangandi.web.id
 * silahkan digunakan dan dimodifikasi untuk pembelajaran 
 */


$pagemn =$_GET['page'];

	if ($pagemn=='sview') $menu2="current";
	else if ($pagemn=='gview') $menu2="current";
	else if ($pagemn=='mkelas') $menu3="current";
	else if ($pagemn=='mpelajaran') $menu3="current";
	else if ($pagemn=='mta') $menu3="current";
	else if ($pagemn=='uview') $menu2="current";
	else if ($pagemn=='akdgurumapel') $menu4="current";
	else if ($pagemn=='akdwalikelas') $menu4="current";
	else if ($pagemn=='akdnaikkelas') $menu4="current";
	else $menu1 ="current";
?>
   <li>
		<a href="<?php echo $sumber;?>" class="nav-top-item no-submenu <?php echo $menu1;?>"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
			Dashboard
		</a>       
	</li>

	<li> 
		<a href="#" class="nav-top-item <?php echo $menu2;?>"> <!-- Add the class "current" to current menu item -->
			Data
		</a>
		<ul>
			<li><a href="home.php?page=sview">Siswa</a></li>
			<li><a href="home.php?page=gview">Guru</a></li>
			<li><a href="home.php?page=uview">User</a></li>
		</ul>
	</li>     
	<li> 
		<a href="#" class="nav-top-item <?php echo $menu3;?>"> <!-- Add the class "current" to current menu item -->
			Master
		</a>
		<ul>
			<li><a href="home.php?page=mkelas">Kelas</a></li>
			<li><a href="home.php?page=mpelajaran">Mata Pelajaran</a></li>
			<li><a href="home.php?page=mta">Tahun Ajaran</a></li>
		</ul>
	</li>     
	<li> 
		<a href="#" class="nav-top-item <?php echo $menu4;?>"> <!-- Add the class "current" to current menu item -->
			Akademik
		</a>
		<ul>
			<li><a href="home.php?page=akdgurumapel">Guru Mapel</a></li>
			<li><a href="home.php?page=akdnaikkelas">Kenikan Siswa</a></li>
			<li><a href="home.php?page=akdwalikelas">Wali Kelas</a></li>
		</ul>
	</li> 
	<li>
		<a href="#about" rel="modal" class="nav-top-item no-submenu"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
			Tentang Program
		</a>       
	</li>    

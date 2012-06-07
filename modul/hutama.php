<title>Sistem Informasi Nilai :: Halaman Utama</title>
<?php 

/*
 * Program Kerja Praktik
 * andi zainul albaab (andi@kangandi.web.id).
 * twitter 	: @andizab
 * blog		: blog.kangandi.web.id
 * silahkan digunakan dan dimodifikasi untuk pembelajaran 
 */

?>

		<h2>Selamat datang, <?php if ($_SESSION['level']==1){echo $_SESSION['username'];}else{echo ucwords(strtolower($_SESSION['nama']));}?>.</h2>
			<?php
				if ($_SESSION['level']==1){
			?>
			<p id="page-intro">Apa yang ingin kamu lakukan?</p>
			
			<ul class="shortcut-buttons-set">
				
				<li><a class="shortcut-button" href="home.php?page=sedit"><span>
					<img width="48px" height="48px" src="images/icons/siswa.png" alt="icon" /><br />
					Siswa Baru
				</span></a></li>
				
				<li><a class="shortcut-button" href="home.php?page=gedit"><span>
					<img width="48px" height="48px" src="images/icons/guru.png" alt="icon" /><br />
					Guru Baru
				</span></a></li>
				
				<li><a class="shortcut-button" href="home.php?page=uview"><span>
					<img width="48px" height="48px" src="images/icons/user.png" alt="icon" /><br />
					Lihat User
				</span></a></li>
				</ul>

				<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
				<p id="page-intro">Manipulasi Data</p>
				<ul class="shortcut-buttons-set">
				<li><a class="shortcut-button" href="home.php?page=mkelas"><span>
					<img width="48px" height="48px" src="images/icons/kelas.png" alt="icon" /><br />
					Data Kelas
				</span></a></li>
				
				<li><a class="shortcut-button" href="home.php?page=mta"><span>
					<img width="48px" height="48px" src="images/icons/ta.png" alt="icon" /><br />
					Tahun Ajaran
				</span></a></li>
				
				<li><a class="shortcut-button" href="home.php?page=mpelajaran"><span>
					<img width="48px" height="48px" src="images/icons/mapel.png" alt="icon" /><br />
					Data Mata Pelajaran
				</span></a></li>
				
			</ul>
			<?php
			}else if($_SESSION['level']==10){
			?>
			<br/><br/>
			<h3>Anda Login sebagai Guru,
			<br/>Segera <a href="home.php?page=gpass">ganti password</a> anda untuk menjaga keamanan data nilai siswa anda.</h3>
			<?php
			}else if($_SESSION['level']==50){
			?>
			<br/><br/>
			<h3>Anda Login sebagai Siswa,
			<br/>Segera <a href="home.php?page=gpass">ganti password</a> anda untuk menjaga keamanan nilai anda.</h3>
			<?php
			}
			?>

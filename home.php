<?php 

/*
 * Program Kerja Praktik
 * andi zainul albaab (andi@kangandi.web.id).
 * twitter 	: @andizab
 * blog		: blog.kangandi.web.id
 * silahkan digunakan dan dimodifikasi untuk pembelajaran 
 */
 
    require 'inc/config.php';
    require 'inc/fungsi.php';
    session_start();
    if (!isset($_SESSION['username'])){
		$pageURL = $_SERVER["REQUEST_URI"];
		 header('Location: index.php?u='.$pageURL);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/invalid.css" type="text/css" media="screen" />	
        <link rel="stylesheet" href="css/tstyle.css"/>
        <link rel="stylesheet" href="css/token-input.css" type="text/css" />
		<link rel="stylesheet" href="css/token-input-facebook.css" type="text/css" />
            
        
        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/simpla.jquery.configuration.js"></script>
        <script type="text/javascript" src="js/facebox.js"></script>
        <script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
        <script type="text/javascript" src="js/jquery.tokeninput.js"></script>
        <script type="text/javascript" src="js/number.js"></script>
    </head>
    <body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->

            <div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->

                    <!--<h1 id="sidebar-title"><a href="<?php echo $sumber;?>"><?php echo $nama_sekolah;?></a></h1>-->

                    <!-- Logo (221px wide)-->
                    <a href="<?php echo $sumber;?>"><img id="logo" src="images/logosin.png" alt="<?php echo $nama_sekolah;?>" /></a>

                    <!--Sidebar Profile links -->
                    <div id="profile-links">
                        <!--Hello, <a href="#" title="Edit your profile">John Doe</a>, you have <a href="#messages" rel="modal" title="3 Messages">3 Messages</a><br />
                        --><br />
                        <a href="/" title="View the Site">View the Site</a> | <a href="logout.php" title="Sign Out">Sign Out</a>
                    </div>        

                    <ul id="main-nav">  <!-- Accordion Menu -->

<?php
		if ($_SESSION['level']==1){
		include "menuadm.php";
		}else if ($_SESSION['level']==10){
		include "menuguru.php";
		}else if ($_SESSION['level']==50){
		include "menusw.php";
		}
?>

                    </ul> <!-- End #main-nav -->
                    
                    <div id="about" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->

                        <?php require "modul/about.php"; ?>

                    </div> <!-- End #about -->

                </div></div> <!-- End #sidebar -->

            <div id="main-content"> <!-- Main Content Section with everything -->

                <noscript> <!-- Show a notification if the user has disabled javascript -->
                    <div class="notification error png_bg">
                        <div>
                            Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
                        </div>
                    </div>
                </noscript>

                <!-- Page Head -->
                <?php if(isset($_GET['sukses'])){?>
                <div class="notification success png_bg">
				<a href="#" class="close"><img src="images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div><?php echo $_GET['sukses'];?></div>
				</div>
				<?php } ?>
				
				<?php if(isset($_GET['gagal'])){?>
                <div class="notification error png_bg">
				<a href="#" class="close"><img src="images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div><?php echo $_GET['gagal'];?></div>
				</div>
				<?php } ?>
                
                <div id="bodyx">
                <?php  
                $page=$_GET['page'];
                if(isset($_GET['page'])){
					include 'modul/'.$page.'.php';
				}else{
					include 'modul/hutama.php'; 
				}
				
				?>
                </div>
				<div class="clear"></div>
                <div id="footer">
                    <small> <!-- Remove this notice or replace it with whatever you want -->
                        &#169; Copyright 2012 <?php echo $nama_sekolah?> | Powered by <a href="http://kangandi.web.id" onclick="window.open(this.href,'_blank');return false;">KangAndi</a> | <a href="#">Top</a>
                    </small>
                </div><!-- End #footer -->

            </div> <!-- End #main-content -->
        </div></body>
</html>

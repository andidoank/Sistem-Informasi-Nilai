<?php

/*
 * Program Kerja Praktik
 * andi zainul albaab (andi@kangandi.web.id).
 * twitter 	: @andizab
 * blog		: blog.kangandi.web.id
 * silahkan digunakan dan dimodifikasi untuk pembelajaran 
 */

require 'inc/koneksi.php';

if (isset($_GET['reset'])){
	$user = $_GET['user']; 
	$rpass= md5($user); 
	$resetpass = mysql_query("UPDATE t_user SET password='$rpass' WHERE t_user.username='$user'");
	if ($resetpass){
		echo "<script>window.location.href = 'home.php?page=uview&sukses=Berhasil mereset password ".$user."';</script>";
		}
	}
?>
<title>Sistem Informasi Nilai :: Data User</title>
<link href="js/jqueryContextMenu/jquery.contextMenu.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="js/jquery/redmond/jquery-ui-1.8rc2.custom.css" rel="stylesheet" />

<script type="text/javascript" src="js/jquery/jquery-ui-1.8rc2.custom.min.js"></script> 
<script type="text/javascript" src="js/jquery/jquery.blockUI.js"></script> 

<script type="text/javascript" src="js/script-new.js"></script>

<script src="js/jqueryContextMenu/jquery.contextMenu.js" type="text/javascript"></script>

<script language="javascript">
	function Controller(action, el)
	{
		//COLUMNA id principal
		var idColumn = 0;
		//COLUMNA nombre info
		var nameColumn = 1;
		var ids = $(el).children('td').eq(idColumn).text();
	
		switch(action)
		{
			case "reset":
				window.location.href = "home.php?page=uview&reset=pass&user="+ids;
				break;
		}	
	}
	function initFuncionsTaula()
	{
		$('#tableData tbody tr').contextMenu({
				menu: 'contextMenuElements',
				inSpeed: 10,
				outSpeed: 10
			},
			function(action, el, pos) {
				Controller(action, el)
			}
		);
		$('#tableData tbody tr').dblclick(
			function() {
				Controller('editar', this)
			}
		);
	}
	var sorter = null;
	$(document).ready( function() {
		//inisial TINYTABLE
		
		sorter = new TINY.table.sorter('sorter','tableData',{
			headclass:'head',
			ascclass:'asc',
			descclass:'desc',
			evenclass:'evenrow',
			oddclass:'oddrow',
			evenselclass:'evenselected',
			oddselclass:'oddselected',
			paginate:true,
			size:20,
			colddid:'columns',
			currentid:'currentpage',
			totalid:'totalpages',
			startingrecid:'startrecord',
			endingrecid:'endrecord',
			totalrecid:'totalrecords',
			hoverid:'selectedrow',
			pageddid:'pagedropdown',
			navid:'tablenav',
			sortcolumn:1,
			sortdir:1,
			//sum:[8],
			//avg:[6,7,8,9],
			//columns:[{index:7, format:'%', decimals:1},{index:8, format:'$', decimals:0}],
			init:true
			},
			function() {initFuncionsTaula()});
		
		//INISIAL DIALOG MODUL
		$("#dialogTable").dialog({
			bgiframe: true,
			resizable: false,
			autoOpen: false,
			modal: true,
			overlay: {
				backgroundColor: '#000',
				opacity: 0.5
			},
			buttons: {
				'Tidak': function() {
					$(this).dialog('close');
				},
				'OK': function() {
					Controller('eliminarAction',this);
					$(this).dialog('close');
				}
			}
		});
	});
</script>
<div class="content-box">
        <div class="content-box-header">
            <h3>Data User</h3>
        </div>
        <div class="content-box-content">
	<div id="tablewrapper">
		<div id="tableheader">
        	<div class="search">
                <select id="columns" onchange="sorter.search('query')"></select>
                <input type="text" id="query" onkeyup="sorter.search('query')" />
            </div>
            <span class="details">
				<?php
						$lvlx=  mysql_query('SELECT * FROM r_level WHERE id<>1') or die(mysql_error());
					echo '<a href="home.php?page=uview">Admin</option>';
					while ($dtlvlx=mysql_fetch_assoc($lvlx)){
						$idlvlx = $dtlvlx['id'];
						$namalvlx = $dtlvlx['level'];
					echo ' | <a href="home.php?page=uview&u='.$idlvlx.'">'.ucwords($namalvlx).'</a> ';
						}
				?>
        	</span>
        </div>
        <table cellpadding="0" cellspacing="0" border="0" id="tableData" class="tinytable">
            <thead>
				<tr>
                    <th><h3>Username</h3></th>
                    <th><h3>Nama</h3></th>
                    <th><h3>Hak Akses</h3></th>
                    <th><h3>Last Login</h3></th>
                </tr>
            </thead>
            <tbody>
<?php
$users=$_GET['u'];
if(isset($_GET['u'])){
	$namalvl = mysql_query("SELECT `level` , `key` FROM r_level WHERE id = '$users'") or die(mysql_error());
	$rnamalvl= mysql_fetch_assoc($namalvl);
	$nmlvl	 = $rnamalvl['level'];
	$keylvl	 = $rnamalvl['key'];
	$sql	 = mysql_query('SELECT username,t_'.$nmlvl.'.nama,last_login FROM t_user
							LEFT JOIN t_'.$nmlvl.' ON username='.$keylvl.' WHERE level='.$users.'') or die(mysql_error());;
}else{
	$namalvl = mysql_query("SELECT `level` FROM r_level WHERE id = 1") or die(mysql_error());
	$rnamalvl= mysql_fetch_assoc($namalvl);
	$nmlvl	 = $rnamalvl['level'];
	$sql 	 = mysql_query('SELECT `username`,`username`,last_login FROM t_user WHERE level=1') or die(mysql_error());;
}
if (mysql_num_rows($sql) == 0){
	echo '<tr><td colspan=4><center><h4>Tidak ada data</h4></center></td></tr>';
	}
while ($row = mysql_fetch_array($sql)) {
    echo '<tr>
			<td>'.$row[0].'</td>
			<td>'.$row[1].'</td>
			<td>'.ucwords($nmlvl).'</td>
			<td>'.$row[2].'</td></tr>';
}
?>
            </tbody>
        </table>
        <div id="tablefooter">
          <div id="tablenav">
            	<div>
                    <img src="tinytable/images/first.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1,true)" />
                    <img src="tinytable/images/previous.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" />
                    <img src="tinytable/images/next.gif" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
                    <img src="tinytable/images/last.gif" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" />
                </div>
                <div>
                	<select id="pagedropdown"></select>
				</div>
                <div>
                	<a href="javascript:sorter.showall()">view all</a>
                </div>
            </div>
			<div id="tablelocation">
            	<div>
					 <span>Show : </span>
                    <select onchange="sorter.size(this.value)">
                        <option value="10">10</option>
                        <option value="20" selected="selected">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div class="page">Records <span id="startrecord"></span>-<span id="endrecord"></span> of <span id="totalrecords"></span>
                <br/>Page <span id="currentpage"></span> of <span id="totalpages"></span>
                </div>
            </div>
        </div>
    </div>
  <ul id="contextMenuElements" class="contextMenu">
<li class="edit"><a href="#reset">Reset Pass</a></li>
</ul>
</div>
</div>

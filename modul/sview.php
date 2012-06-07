<?php

/*
 * Program Kerja Praktik
 * andi zainul albaab (andi@kangandi.web.id).
 * twitter 	: @andizab
 * blog		: blog.kangandi.web.id
 * silahkan digunakan dan dimodifikasi untuk pembelajaran 
 */

require 'inc/koneksi.php';
?>

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
			case "eliminarAction":
				//alert("Menghapus "+$('#dialogTable #idEliminar').text());
				window.location.href = "home.php?page=sedit&del="+$('#dialogTable #idEliminar').text();
				break;
			case "delete":
				$('#dialogTable').dialog('open');
				$('#dialogTable #nomEliminar').text($(el).children('td').eq(nameColumn).text());
				$('#dialogTable #idEliminar').text(ids);
				break;
			case "edit":
				window.location.href = "home.php?page=sedit&aksi=edit&nis="+ids;
				break;
			case "detail":
				window.location.href = "home.php?page=detail&lvl=50&user="+ids;
				break;
			case "add":
				window.location.href = "home.php?page=sedit";
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
<title>Sistem Informasi Nilai :: Data Siswa</title>
<div class="content-box">
        <div class="content-box-header">
            <h3>Data Siswa</h3>
        </div>
        <div class="content-box-content">
	<div id="tablewrapper">
		<div id="tableheader">
        	<div class="search">
                <select id="columns" onchange="sorter.search('query')"></select>
                <input type="text" id="query" onkeyup="sorter.search('query')" />
            </div>
            <span class="details">
				<div class="add"><a href="home.php?page=sedit">Murid Baru</a></div>
        	</span>
        </div>
        <table cellpadding="0" cellspacing="0" border="0" id="tableData" class="tinytable">
            <thead>
				<tr>
                    <th><h3>NIS</h3></th>
                    <th><h3>Nama</h3></th>
                    <th><h3>Tanggal Lahir</h3></th>
                </tr>
            </thead>
            <tbody>
<?php
$sql=  mysql_query('select nis,nama,tgl_lahir from t_siswa');
if (mysql_num_rows($sql) == 0){
	echo '<tr><td colspan=3><center><h4>Tidak ada data</h4></center></td></tr>';
	}
while ($row = mysql_fetch_array($sql)) {
    echo '<tr>
			<td>'.$row[0].'</td>
			<td>'.$row[1].'</td>
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
<li class="add"><a href="#add">Tambah</a></li>
<HR>
<li class="detail"><a href="#detail">Detail</a></li>	  
<li class="edit"><a href="#edit">Ubah</a></li>
<li class="delete"><a href="#delete">Hapus</a></li>
</ul>
	<div id="dialogTable" title="Ingin menghapus data?"> 
<input type="hidden" id="idEliminar" name="iddel"/>
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Apakah anda ingin menghapus :<br /><b><div id="nomEliminar"></div></b><br />Yakin ingin tetap melanjutkan?</p> 
</div>
</div>
</div>

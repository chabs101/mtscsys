<!DOCTYPE html>
<html>
<head>
	<title>	GENERATE SEED COLLECTION SHEET | <?php include('../../view/inc_common/title_name.php');?></title>
	<style type="text/css">
		@page { margin: 1cm 1cm 1cm 1cm; }
		body {  font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 10px; }
		.tStyle {
			width: 98%;
			border:1px solid #000;
			border-collapse:collapse;
		}
		.prepared_by_cont {
			width: 40% !important;
			border: none !important;
			border-collapse: collapse;
			font-size:13px;
			float: right;
			margin-right: 10px;
		}
		.prepared_by_cont tr > .pby {
			width: 90px;
		}
		.prepared_by_cont tr > .pbyname {
			width: 200px;
			text-transform: capitalize;
		}
		.prepared_by_cont tr > td {
			border: none !important;
		}
		.rjc_underline {
			border-bottom: 1px solid #000;
			width: 100%;
		}
		li {
		        margin: 4px  4px;
		}
		.row {
			width: 100%;
		}
		.row tr, td {
			width: 100%;
			text-align: center;
			border: 1px solid black;
			padding: 5px;
			font-size: 14px;
		}
		.table td, th{
			width: 100%;
			padding: 2px;
			border: 1px solid black;
		}
		.rjc-width-225 {
			width:225px !important;
			text-align: left;
		}
		.rjc-width-85 {
			width:175px !important;
		}
		.rjc-text-uline {
			text-decoration: underline;
		}

		.b-b-n {
			border-bottom: none;
		}

		.b-t-n {
			border-top: none;
		}

		.b-l-n {
			border-left:none;
		}

		.b-r-n {
			border-right:none;
		}
		.b-n {
			border: none;
		}

		.text-left { 
			text-align:left;
		}

		.text-right { 
			text-align:right;
		}
		.text-center { 
			text-align:center;
		}

		.small {
			font-size: x-small !important;
		}
	</style>
</head>
<body>
<!-- 
	<div style="width: 100%;position:absolute;height:160px;">
		<div style="text-align: center;margin-top:10px;">
			<label style="font-size: 18px;"><b>SEED COLLECTION DATA SHEET</b></label><br>
		</div>
	</div> -->
	<?php $title = "SEED COLLECTION DATA SHEET";?>
	<?php include 'default_title.php'; ?><br><br>


	<div style="width:100%;margin-top:55px;page-break-inside:auto;">

		<table class="tStyle small">
			<tr>
				<td colspan="1" class="text-left b-r-n">Species</td>
				<td colspan="3" class="text-left b-l-n">: <?=$_SESSION['data']['seed_result'][0]['species_name'] ?? "n/a";?></td>
				<td colspan="1" class="text-left b-r-n">Lat</td>
				<td colspan="2" class="text-left b-l-n">: <?=$_SESSION['data']['seed_result'][0]['lat'] ?? "n/a";?></td>
				<td colspan="1" class="text-left b-r-n">Long</td>
				<td colspan="2" class="text-left b-l-n">: <?=$_SESSION['data']['seed_result'][0]['longi'] ?? "n/a";?></td>
				<td colspan="1" class="text-left b-r-n">Seedlot No</td>
				<td colspan="3" class="text-left b-l-n">: <?=$_SESSION['data']['seed_result'][0]['seedlot_no'] ?? "n/a";?></td>
			</tr>
			<tr>
				<td colspan="1" class="text-left b-r-n">Location</td>
				<td colspan="6" class="text-left b-l-n">: <?=$_SESSION['data']['seed_result'][0]['location'] ?? "n/a";?></td>
				<td colspan="1" class="text-left b-r-n">Region</td>
				<td colspan="2" class="text-left b-l-n">: <?=$_SESSION['data']['seed_result'][0]['region'] ?? "n/a";?></td>
				<td colspan="1" class="text-left b-r-n">Alt. (m)</td>
				<td colspan="3" class="text-left b-l-n">: <?=$_SESSION['data']['seed_result'][0]['alt'] ?? "n/a";?></td>
			</tr>
			<tr>
				<td colspan="1" class="text-left b-r-n">Habitat</td>
				<td colspan="4" class="text-left b-l-n">: <?=$_SESSION['data']['seed_result'][0]['habitat'] ?? "n/a";?></td>
				<td colspan="3" class="text-left b-r-n">Provenance for database</td>
				<td colspan="1" class="text-left b-l-n">: <?=$_SESSION['data']['seed_result'][0]['provenance_name_db'] ?? "n/a";?></td>
				<td colspan="3" class="text-left b-r-n">Philippine Climate Type</td>
				<td colspan="2" class="text-left b-l-n">: <?=$_SESSION['data']['seed_result'][0]['ph_climatic_type'] ?? "n/a";?></td>
			</tr>
			<tr>
				<td colspan="14">
					&nbsp;
				</td>
			</tr>

			<tr>
				<td colspan="1" class="text-left b-r-n">Vegetation Structure:</td>
				<td colspan="2" class="text-left b-l-n">: <?=$_SESSION['data']['seed_result'][0]['sp_freq'] ?? "n/a";?></td>
				<td colspan="2" class="text-left b-r-n">Soil Structure:</td>
				<td colspan="2" class="text-left b-l-n">: <?=$_SESSION['data']['seed_result'][0]['ph'] ?? "n/a";?></td>
				<td colspan="2">Association Include</td>
				<td colspan="1">Freq.</td>
				<td colspan="1">Ht.(m)</td>
				<td colspan="3">Comments</td>
			</tr>
			<tr>
				<td colspan="1" class="text-left b-r-n">Sp. Freq.</td>
				<td colspan="2" class="text-left b-l-n">: <?=$_SESSION['data']['seed_result'][0]['sp_freq'] ?? "n/a";?></td>
				<td colspan="2" class="text-left b-r-n">pH</td>
				<td colspan="2" class="text-left b-l-n">: <?=$_SESSION['data']['seed_result'][0]['ph'] ?? "n/a";?></td>
				<td colspan="2" rowspan="5"><?=$_SESSION['data']['seed_result'][0]['assoc_inc'] ?? "&nbsp;";?></td>
				<td colspan="1" rowspan="5"><?=$_SESSION['data']['seed_result'][0]['freq'] ?? "&nbsp;";?></td>
				<td colspan="1" rowspan="5"><?=$_SESSION['data']['seed_result'][0]['ht_m'] ?? "&nbsp;";?></td>
				<td colspan="3" rowspan="5"><?=$_SESSION['data']['seed_result'][0]['comments'] ?? "&nbsp;";?></td>

			</tr>
			<tr>
				<td colspan="1" class="text-left b-r-n">Slope</td>
				<td colspan="6" class="text-left b-l-n">: <?=$_SESSION['data']['seed_result'][0]['slope'] ?? "n/a";?></td>
			</tr>
			<tr>
				<td colspan="1" class="text-left b-r-n">Seed Crop</td>
				<td colspan="2" class="text-left b-l-n">: <?=$_SESSION['data']['seed_result'][0]['seed_crop'] ?? "n/a";?></td>
				<td colspan="2" class="text-left b-r-n">Predation Status</td>
				<td colspan="2" class="text-left b-l-n">: <?=$_SESSION['data']['seed_result'][0]['predation_status'] ?? "n/a";?></td>
			</tr>
			<tr>
				<td colspan="1" class="text-left b-r-n">Bud</td>
				<td colspan="6" class="text-left b-l-n">: <?=$_SESSION['data']['seed_result'][0]['bud'] ?? "n/a";?></td>
			</tr>
			<tr>
				<td colspan="1" class="text-left b-r-n">Flowers</td>
				<td colspan="6" class="text-left b-l-n">: <?=$_SESSION['data']['seed_result'][0]['flower'] ?? "n/a";?></td>
			</tr>

			<tr>
				<td colspan="14" class="text-left b-l-n">&nbsp;</td>
			</tr>

			<tr>
				<td colspan="1" rowspan="2" class="text-left b-r-n" style="vertical-align: top;">Description/notes</td>
				<td colspan="9" rowspan="2" class="text-left b-l-n" style="vertical-align: top;">: <?=$_SESSION['data']['seed_result'][0]['description'] ?? "&nbsp;";?></td>
				<td colspan="2">Seed Weight(g)</td>
				<td colspan="2">Viab/10g</td>
			</tr>
			<tr>
				<td colspan="2"><?=$_SESSION['data']['seed_result'][0]['seed_weight'] ?? "&nbsp;";?></td>
				<td colspan="2"><?=$_SESSION['data']['seed_result'][0]['viab'] ?? "&nbsp;";?></td>
			</tr>
			<tr>
				<td colspan="1" class="text-left b-n">Collected as bulk</td>
				<td colspan="13" class="text-left b-n">: <?=$_SESSION['data']['seed_result'][0]['collect_as_bulk'] ?? "&nbsp;";?></td>
			</tr>
			<tr>
				<td colspan="1" class="text-left b-n">Individuals</td>
				<td colspan="13" class="text-left b-n">: <?=$_SESSION['data']['seed_result'][0]['individuals'] ?? "&nbsp;";?></td>
			</tr>
			<tr>
				<td colspan="1" class="text-left b-n">Total</td>
				<td colspan="13" class="text-left b-n">: 
					<!-- <?=$_SESSION['data']['seed_result'][0]['individuals']+$_SESSION['data']['seed_result'][0]['collect_as_bulk'] ?? "&nbsp;";?> -->
				</td>
			</tr>

<!-- 			<tr>
				<td colspan="5">EXACT LOCALITY OF COLLECTION</td>
				<td colspan="5">PARENT TREE(S)</td>
				<td colspan="5">SEED</td>
			</tr>
			<tr>
				<td colspan="5" rowspan="4" class="text-left b-b-n" style="text-align:left;vertical-align: top;">
						Address: <br>
						as lkdaskldasl kdaskld askld askld askldkasldlk asdklaskl askldaksl dlksa
				</td>
				
				<td colspan="1" rowspan="2" class="text-left b-r-n">No <br>of<br> Parents</td>
				<td colspan="1" class="text-left b-n">Bulk</td>
				<td colspan="3" class="text-left b-n">: bulk value</td>

				<td colspan="1" class="text-left b-r-n">Collector</td>
				<td colspan="4" class="text-left b-l-n">: value</td>
			</tr>
			<tr>
				
				<td colspan="1" class="text-left b-n">Tree</td>
				<td colspan="3" class="text-left b-n">: tree Value</td>
				
				<td colspan="1" class="text-left b-r-n">Collector's No</td>
				<td colspan="4" class="text-left b-l-n">: value</td>
			</tr>
			<tr>

				<td colspan="1" class="text-left b-r-n">D.B.H (cm)</td>
				<td colspan="4" class="text-left b-l-n">: dbh value</td>
				
				<td colspan="1" class="text-left b-r-n">Project</td>
				<td colspan="4" class="text-left b-l-n">: value</td>
			</tr>
			<tr>

				<td colspan="1" class="text-left  b-r-n">Total Height</td>
				<td colspan="4" class="text-left  b-l-n">: dbh value</td>
				
				<td colspan="1" class="text-left  b-r-n">Project</td>
				<td colspan="4" class="text-left  b-l-n">: value</td>
			</tr>
			<tr>
				<td colspan="5" class="b-n"></td>

				<td colspan="1" class="text-left b-r-n">Form</td>
				<td colspan="4" class="text-left b-l-n">: dbh value</td>
				
				<td colspan="1" class="text-left  b-r-n">Project</td>
				<td colspan="4" class="text-left  b-l-n">: value</td>
			</tr>
			<tr>
				<td colspan="5" class="b-n"></td>

				<td colspan="1" rowspan="4" class="text-left b-r-n" style="text-align:left;vertical-align: top;">Remarks</td>
				<td colspan="4" rowspan="4" class="text-left b-n" style="text-align:left;vertical-align: top;">: remarkaskd laskld aslkd askld aslk dakls sadkl askdl askl dakls value</td>
				
				<td colspan="1" class="text-left b-r-n">Storage</td>
				<td colspan="4" class="text-left b-l-n">: value</td>
			</tr>
			<tr>
				<td colspan="5" class="b-n"></td>
				
				<td colspan="1" class="text-left b-r-n">Quantity</td>
				<td colspan="4" class="text-left b-l-n">: value</td>
			</tr>
			<tr>
				<td colspan="5" class="b-n"></td>
				
				<td colspan="5">GERMINATION</td>
			</tr>

			<tr>
				<td colspan="2" class="text-left">Latitude (°N'): asdasdaskda</td>
				<td colspan="3" class="text-left">Longitude (°E'): asdasdaskda</td>
				<td colspan="5">DATE</td>
			</tr>

			<tr>
				<td colspan="3" class="text-left">Altitude (m): asdasdaskda</td>
				<td colspan="1" class="text-left">Aspect : asdasdaskda</td>
				<td colspan="1" class="text-left">Slope : </td>
				<td colspan="5" class="text-left">Fumigation Method</td>
				<td colspan="1">Method</td>
				<td colspan="1">From</td>
				<td colspan="1">To</td>
				<td colspan="2">Viability/10g(%)</td>
			</tr>
			<tr>
				<td colspan="2" class="text-left b-r-n">Geology and Soil</td>
				<td colspan="3" class="text-left b-l-n">: Value</td>
				<td colspan="5">Fumigation method value</td>
				<td colspan="1">Method value</td>
				<td colspan="1">From value</td>
				<td colspan="1">To value</td>
				<td colspan="2">viab value</td>
			</tr>
			<tr>
				<td colspan="2" class="text-left b-r-n">pH</td>
				<td colspan="3" class="text-left b-l-n">: ph value</td>
				<td colspan="1" class="b-r-n">Date</td>
				<td colspan="4" class="text-left b-l-n">: date value</td>
				<td colspan="5" class="b-n"></td>
			</tr>
			<tr>
				<td colspan="5">&nbsp;</td>
				<td colspan="5">&nbsp;</td>
				<td colspan="5">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="5">&nbsp;</td>
				<td colspan="5">&nbsp;</td>
				<td colspan="5">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2" class="text-left">SeedLot No</td>
				<td colspan="3" class="text-left">: value</td>
				<td colspan="5">Distribution</td>
				<td colspan="2" class="text-left b-r-n">Amount Received</td>
				<td colspan="3" class="text-left b-l-n">: value</td>
			</tr>
			<tr>
				<td colspan="5">&nbsp;</td>
				<td colspan="5">&nbsp;</td>
				<td colspan="5">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2"><b>File No</b></td>
				<td colspan="3"><b>Date</b></td>
				<td colspan="5"><b>Consignee</b></td>
				<td colspan="2"><b>Amount Sent</b></td>
				<td colspan="3"><b>Amount Left</b></td>
			</tr>
			<tr>
				<td colspan="2">value</td>
				<td colspan="3">value</td>
				<td colspan="5">value</td>
				<td colspan="2">value</td>
				<td colspan="3">value</td>
			</tr>
			<tr>
				<td colspan="2">value</td>
				<td colspan="3">value</td>
				<td colspan="5">value</td>
				<td colspan="2">value</td>
				<td colspan="3">value</td>
			</tr>

			<tr>
				<td colspan="15" class="text-right">
					date printed : mm/dd/yyyy &nbsp;&nbsp;
				</td>
			</tr> -->
		</table>
		<br><br>
		<br><br>
		<br><br>
						
	</div>
</body>
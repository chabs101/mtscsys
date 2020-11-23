<?php 
include('../Barcode/BarcodeGenerator.php');
include('../Barcode/BarcodeGeneratorPNG.php');
$generator = new Picqer\Barcode\BarcodeGeneratorPNG();

?>
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
	<?php $barcode = $_SESSION['data']['seed_result'][0]['prefix_id'];?>
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
				<td colspan="2"><?=$_SESSION['data']['assoc_result'][0]['assoc_inc'] ?? "&nbsp;";?></td>
				<td colspan="1"><?=$_SESSION['data']['assoc_result'][0]['freq'] ?? "&nbsp;";?></td>
				<td colspan="1"><?=$_SESSION['data']['assoc_result'][0]['ht_m'] ?? "&nbsp;";?></td>
				<td colspan="3"><?=$_SESSION['data']['assoc_result'][0]['comments'] ?? "&nbsp;";?></td>

			</tr>
			<tr>
				<td colspan="1" class="text-left b-r-n">Slope</td>
				<td colspan="6" class="text-left b-l-n">: <?=$_SESSION['data']['seed_result'][0]['slope'] ?? "n/a";?></td>
				<td colspan="2"><?=$_SESSION['data']['assoc_result'][1]['assoc_inc'] ?? "&nbsp;";?></td>
				<td colspan="1"><?=$_SESSION['data']['assoc_result'][1]['freq'] ?? "&nbsp;";?></td>
				<td colspan="1"><?=$_SESSION['data']['assoc_result'][1]['ht_m'] ?? "&nbsp;";?></td>
				<td colspan="3"><?=$_SESSION['data']['assoc_result'][1]['comments'] ?? "&nbsp;";?></td>
			</tr>
			<tr>
				<td colspan="1" class="text-left b-r-n">Seed Crop</td>
				<td colspan="2" class="text-left b-l-n">: <?=$_SESSION['data']['seed_result'][0]['seed_crop'] ?? "n/a";?></td>
				<td colspan="2" class="text-left b-r-n">Predation Status</td>
				<td colspan="2" class="text-left b-l-n">: <?=$_SESSION['data']['seed_result'][0]['predation_status'] ?? "n/a";?></td>
				<td colspan="2"><?=$_SESSION['data']['assoc_result'][2]['assoc_inc'] ?? "&nbsp;";?></td>
				<td colspan="1"><?=$_SESSION['data']['assoc_result'][2]['freq'] ?? "&nbsp;";?></td>
				<td colspan="1"><?=$_SESSION['data']['assoc_result'][2]['ht_m'] ?? "&nbsp;";?></td>
				<td colspan="3"><?=$_SESSION['data']['assoc_result'][2]['comments'] ?? "&nbsp;";?></td>
			</tr>
			<tr>
				<td colspan="1" class="text-left b-r-n">Bud</td>
				<td colspan="6" class="text-left b-l-n">: <?=$_SESSION['data']['seed_result'][0]['bud'] ?? "n/a";?></td>
				<td colspan="2"><?=$_SESSION['data']['assoc_result'][3]['assoc_inc'] ?? "&nbsp;";?></td>
				<td colspan="1"><?=$_SESSION['data']['assoc_result'][3]['freq'] ?? "&nbsp;";?></td>
				<td colspan="1"><?=$_SESSION['data']['assoc_result'][3]['ht_m'] ?? "&nbsp;";?></td>
				<td colspan="3"><?=$_SESSION['data']['assoc_result'][3]['comments'] ?? "&nbsp;";?></td>
			</tr>
			<tr>
				<td colspan="1" class="text-left b-r-n">Flowers</td>
				<td colspan="6" class="text-left b-l-n">: <?=$_SESSION['data']['seed_result'][0]['flower'] ?? "n/a";?></td>
				<td colspan="2"><?=$_SESSION['data']['assoc_result'][4]['assoc_inc'] ?? "&nbsp;";?></td>
				<td colspan="1"><?=$_SESSION['data']['assoc_result'][4]['freq'] ?? "&nbsp;";?></td>
				<td colspan="1"><?=$_SESSION['data']['assoc_result'][4]['ht_m'] ?? "&nbsp;";?></td>
				<td colspan="3"><?=$_SESSION['data']['assoc_result'][4]['comments'] ?? "&nbsp;";?></td>
			</tr>
			<!-- incase 4+ assoc -->
			<?php for($i = 4; $i<(count($_SESSION['data']['assoc_result'])); $i++) {?>
				<tr>
					<td colspan="7" class="text-left b-r-n"></td>
					<td colspan="2"><?=$_SESSION['data']['assoc_result'][$i]['assoc_inc'] ?? "&nbsp;";?></td>
					<td colspan="1"><?=$_SESSION['data']['assoc_result'][$i]['freq'] ?? "&nbsp;";?></td>
					<td colspan="1"><?=$_SESSION['data']['assoc_result'][$i]['ht_m'] ?? "&nbsp;";?></td>
					<td colspan="3"><?=$_SESSION['data']['assoc_result'][$i]['comments'] ?? "&nbsp;";?></td>
				</tr>
			<?php } ?>
			<!--  -->
			<tr>
				<td rowspan="2">Tree No</td>
				<td rowspan="2">Total</td>
				<td rowspan="2">Age</td>
				<td colspan="2">Bole</td>
				<td colspan="5">Ht</td>
				<td rowspan="2" colspan="2">Description/Notes</td>
				<td rowspan="2">Seed Weight(g)</td>
				<td rowspan="2">Viab/10g</td>
			</tr>
			<tr>
				<td>dbh(cm)</td>
				<td>Form</td>
				<td>Den</td>
				<td>Branch</td>
				<td>Width</td>
				<td>MH</td>
				<td>TH</td>
			</tr>
			<?php
				$seed_Weight_total = 0;
			?>
			<?php for($i = 0; $i<(count($_SESSION['data']['seed_other_result'])); $i++) {?>
				<tr>
					<td><?=$_SESSION['data']['seed_other_result'][$i]['tree_no'] ?? "&nbsp;";?></td>
					<td><?=$_SESSION['data']['seed_other_result'][$i]['total'] ?? "&nbsp;";?></td>
					<td><?=$_SESSION['data']['seed_other_result'][$i]['age_'] ?? "&nbsp;";?></td>
					<td><?=$_SESSION['data']['seed_other_result'][$i]['dbh'] ?? "&nbsp;";?></td>
					<td><?=$_SESSION['data']['seed_other_result'][$i]['form_'] ?? "&nbsp;";?></td>
					<td><?=$_SESSION['data']['seed_other_result'][$i]['den'] ?? "&nbsp;";?></td>
					<td><?=$_SESSION['data']['seed_other_result'][$i]['branch'] ?? "&nbsp;";?></td>
					<td><?=$_SESSION['data']['seed_other_result'][$i]['width_'] ?? "&nbsp;";?></td>
					<td><?=$_SESSION['data']['seed_other_result'][$i]['mh_'] ?? "&nbsp;";?></td>
					<td><?=$_SESSION['data']['seed_other_result'][$i]['th_'] ?? "&nbsp;";?></td>
					<td colspan="2"><?=$_SESSION['data']['seed_other_result'][$i]['description'] ?? "&nbsp;";?></td>
					<td><?=$_SESSION['data']['seed_other_result'][$i]['seed_weight'] ?? "&nbsp;";?></td>
					<td><?=$_SESSION['data']['seed_other_result'][$i]['viab_percent'] ?? "&nbsp;";?></td>
				</tr>
				<?php 
					$seed_Weight_total += $_SESSION['data']['seed_other_result'][$i]['seed_weight'] ?? 0;
				?>
			<?php } ?>

			<tr>
				<td colspan="6" rowspan="2" class="text-left">Team: <?=$_SESSION['data']['seed_result'][0]['team'] ?? "&nbsp;";?></td>
				<td colspan="3" rowspan="2" class="text-left">Date: <?=$_SESSION['data']['seed_result'][0]['seed_date'] ?? "&nbsp;";?></td>
				<td colspan="3" class="text-left b-b-n">
					Collected as Bulk: <?=$_SESSION['data']['seed_result'][0]['collect_as_bulk'] ?? "&nbsp;";?> <br>
				</td>
				<td rowspan="2"><?=$seed_Weight_total ?? 0?></td>
				<td rowspan="2"></td>
			</tr>
			<tr>
				<td colspan="3" class="text-left b-t-n">Individuals: <?=$_SESSION['data']['seed_result'][0]['individuals'] ?? "&nbsp;";?></td>
			</tr>



		</table>
		<br><br>
		<br><br>
		<br><br>
						
	</div>
</body>
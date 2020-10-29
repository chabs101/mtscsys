<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
	<title>	GENERATE SEED RECORD | <?php include('../../view/inc_common/title_name.php');?></title>
	<style type="text/css">
		@page { margin: 1cm 1cm 1cm 1cm; }
		body {  font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 10px; }
		* {
			/*font-family: "DeJaVu Sans Mono",monospace;*/
		}
		.tos {
			width: 100%;
			border:1px solid #000;
			border-collapse:collapse;
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
			/*padding: 3px;*/
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

		.small {
			font-size: x-small !important;
		}
	</style>
</head>
<body>

	<?php $title = "SEED RECORD CARD";?>
	<?php include 'default_title.php'; ?><br><br>


	<div style="width:100%;margin-top:55px;page-break-inside:auto;">

		<table class="tos small">
			<tr>
				<td colspan="3" class="b-b-n">SeedLot No.</td>
				<td colspan="3" class="b-b-n">Species Code</td>
				<td colspan="3" class="b-b-n">Botanical Name</td>
				<td colspan="3" class="b-b-n">Store Code</td>
				<td colspan="3" class="b-b-n">Cost Code</td>
			</tr>
			<tr>
				<td colspan="3" class="b-t-n"><?=$_SESSION['data']['seed_record_collection_result'][0]['seedlot_no'] ?? "n/a";?></td>
				<td colspan="3" class="b-t-n"><?=$_SESSION['data']['seed_record_collection_result'][0]['species_code'] ?? "n/a";?></td>
				<td colspan="3" class="b-t-n"><?=$_SESSION['data']['seed_record_collection_result'][0]['botanical_name'] ?? "n/a";?></td>
				<td colspan="3" class="b-t-n"><?=$_SESSION['data']['seed_record_collection_result'][0]['store_code'] ?? "n/a";?></td>
				<td colspan="3" class="b-t-n"><?=$_SESSION['data']['seed_record_collection_result'][0]['cost_code'] ?? "n/a";?></td>
			</tr>
			<tr>
				<td colspan="5">EXACT LOCALITY OF COLLECTION</td>
				<td colspan="5">PARENT TREE(S)</td>
				<td colspan="5">SEED</td>
			</tr>
			<tr>
				<td colspan="5" rowspan="4" class="text-left b-b-n" style="text-align:left;vertical-align: top;">
						Address: <br>
						<?=$_SESSION['data']['seed_record_collection_result'][0]['location'] ?? "n/a";?>
				</td>
				
				<td colspan="1" rowspan="2" class="text-left b-r-n">No <br>of<br> Parents</td>
				<td colspan="1" class="text-left b-n">Bulk</td>
				<td colspan="3" class="text-left b-n">: <?=$_SESSION['data']['seed_record_collection_result'][0]['bulk'] ?? "n/a";?></td>

				<td colspan="1" class="text-left b-r-n">Collector</td>
				<td colspan="4" class="text-left b-l-n">: <?=$_SESSION['data']['seed_record_collection_result'][0]['collector'] ?? "n/a";?></td>
			</tr>
			<tr>
				
				<td colspan="1" class="text-left b-n">Tree</td>
				<td colspan="3" class="text-left b-n">: <?=$_SESSION['data']['seed_record_collection_result'][0]['tree'] ?? "n/a";?></td>
				
				<td colspan="1" class="text-left b-r-n">Collector's No</td>
				<td colspan="4" class="text-left b-l-n">: <?=$_SESSION['data']['seed_record_collection_result'][0]['collector_no'] ?? "n/a";?></td>
			</tr>
			<tr>

				<td colspan="1" class="text-left b-r-n">D.B.H (cm)</td>
				<td colspan="4" class="text-left b-l-n">: <?=$_SESSION['data']['seed_record_collection_result'][0]['dbh'] ?? "n/a";?></td>
				
				<td colspan="1" class="text-left b-r-n">Project</td>
				<td colspan="4" class="text-left b-l-n">: <?=$_SESSION['data']['seed_record_collection_result'][0]['project'] ?? "n/a";?></td>
			</tr>
			<tr>

				<td colspan="1" class="text-left  b-r-n">Total Height</td>
				<td colspan="4" class="text-left  b-l-n">: <?=$_SESSION['data']['seed_record_collection_result'][0]['total_height'] ?? "n/a";?></td>
				
				<td colspan="1" class="text-left  b-r-n">Identified By</td>
				<td colspan="4" class="text-left  b-l-n">: <?=$_SESSION['data']['seed_record_collection_result'][0]['identified_by'] ?? "n/a";?></td>
			</tr>
			<tr>
				<td colspan="5" class="b-n"></td>

				<td colspan="1" class="text-left b-r-n">Form</td>
				<td colspan="4" class="text-left b-l-n">: <?=$_SESSION['data']['seed_record_collection_result'][0]['form'] ?? "n/a";?></td>
				
				<td colspan="1" class="text-left  b-r-n">Condition</td>
				<td colspan="4" class="text-left  b-l-n">: <?=$_SESSION['data']['seed_record_collection_result'][0]['condition'] ?? "n/a";?></td>
			</tr>
			<tr>
				<td colspan="5" class="b-n"></td>

				<td colspan="1" rowspan="4" class="text-left b-r-n" style="text-align:left;vertical-align: top;">Remarks</td>
				<td colspan="4" rowspan="4" class="text-left b-n" style="text-align:left;vertical-align: top;">: 
					<?=$_SESSION['data']['seed_record_collection_result'][0]['remarks'] ?? "n/a";?>
				</td>
				
				<td colspan="1" class="text-left b-r-n">Storage</td>
				<td colspan="4" class="text-left b-l-n">: <?=$_SESSION['data']['seed_record_collection_result'][0]['storage'] ?? "n/a";?></td>
			</tr>
			<tr>
				<td colspan="5" class="b-n"></td>
				
				<td colspan="1" class="text-left b-r-n">Quantity</td>
				<td colspan="4" class="text-left b-l-n">: <?=$_SESSION['data']['seed_record_collection_result'][0]['quantity'] ?? "n/a";?></td>
			</tr>
			<tr>
				<td colspan="5" class="b-n"></td>
				
				<td colspan="5">GERMINATION</td>
			</tr>

			<tr>
				<td colspan="2" class="text-left">Latitude (°N'): 
					<?=$_SESSION['data']['seed_record_collection_result'][0]['lat'] ?? "n/a";?>
				</td>
				<td colspan="3" class="text-left">Longitude (°E'): 
					<?=$_SESSION['data']['seed_record_collection_result'][0]['longi'] ?? "n/a";?>
				</td>
				<td colspan="5">DATE</td>
			</tr>

			<tr>
				<td colspan="3" class="text-left">Altitude (m): 
					<?=$_SESSION['data']['seed_record_collection_result'][0]['alt'] ?? "n/a";?>
				</td>
				<td colspan="1" class="text-left">Aspect : 
					<?=$_SESSION['data']['seed_record_collection_result'][0]['aspect'] ?? "n/a";?>
				</td>
				<td colspan="1" class="text-left">Slope :
					<?=$_SESSION['data']['seed_record_collection_result'][0]['slope'] ?? "n/a";?>
				 </td>
				<td colspan="5" class="text-left b-b-n">Fumigation Method :</td>
				<td colspan="1">Method</td>
				<td colspan="1">From</td>
				<td colspan="1">To</td>
				<td colspan="2">Viability/10g(%)</td>
			</tr>
			<tr>
				<td colspan="2" class="text-left b-r-n">Geology and Soil</td>
				<td colspan="3" class="text-left b-l-n">: 
					<?=$_SESSION['data']['seed_record_collection_result'][0]['geo_n_soil'] ?? "n/a";?>
				</td>
				<td colspan="5" class="text-left b-t-n"><?=$_SESSION['data']['seed_record_collection_result'][0]['fumigation_method'] ?? "n/a";?></td>
				<td colspan="1">
					<?=$_SESSION['data']['seed_record_collection_result'][0]['g_method'] ?? "&nbsp;";?>
				</td>
				<td colspan="1">
					<?=$_SESSION['data']['seed_record_collection_result'][0]['g_from'] ?? "&nbsp;";?>
				</td>
				<td colspan="1">
					<?=$_SESSION['data']['seed_record_collection_result'][0]['g_to'] ?? "&nbsp;";?>
				</td>
				<td colspan="2">
					<?=$_SESSION['data']['seed_record_collection_result'][0]['g_viab'] ?? "&nbsp;";?>
				</td>
			</tr>
			<tr>
				<td colspan="2" class="text-left b-r-n">pH</td>
				<td colspan="3" class="text-left b-l-n">: 
					<?=$_SESSION['data']['seed_record_collection_result'][0]['ph'] ?? "n/a";?>
				</td>
				<td colspan="1" class="b-r-n">Date</td>
				<td colspan="4" class="text-left b-l-n">: 
					<?=$_SESSION['data']['seed_record_collection_result'][0]['seed_date'] ?? "n/a";?>
				</td>
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
				<td colspan="5" class="text-left">SeedLot No</td>
				<!-- <td colspan="3" class="text-left">: 
				</td> -->
				<td colspan="5">Distribution</td>
				<td colspan="2" class="text-left b-r-n">Amount Received</td>
				<td colspan="3" class="text-left b-l-n">: 
					<!-- //value -->
				</td>
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
			<?php for($i = 0; $i<(count($_SESSION['data']['seed_record_other_result'])); $i++) {?>
				<tr>
					<td colspan="2">
						<?=$_SESSION['data']['seed_record_other_result'][$i]['file_no'] ?? "n/a";?>
					</td>
					<td colspan="3">
						<?=$_SESSION['data']['seed_record_other_result'][$i]['consignee_date'] ?? "n/a";?>
					</td>
					<td colspan="5">
						<?=$_SESSION['data']['seed_record_other_result'][$i]['consignee'] ?? "n/a";?>
					</td>
					<td colspan="2">
						<?=$_SESSION['data']['seed_record_other_result'][$i]['amount_sent'] ?? "n/a";?>
					</td>
					<td colspan="3">
						<?=$_SESSION['data']['seed_record_other_result'][$i]['amount_left'] ?? "n/a";?>
					</td>
				</tr>
			<?php } ?>

			<tr>
				<td colspan="15" class="text-right">
					date printed : <?=date('m/d/Y');?>&nbsp;&nbsp;
				</td>
			</tr>
		</table>
		<br><br>

		<table class="tos small">
			<tr>
				<td colspan="2" class="b-b-n">Seedlot No</td>
				<td class="b-b-n">Seedlot No</td>
				<td colspan="5" class="b-b-n">&nbsp;</td>
				<td colspan="3" rowspan="2" class="b-b-n">Storage</td>
				<td colspan="5" rowspan="2" class="b-b-n">Dispatch</td>
			</tr>
			<tr>
				<td colspan="3" class="b-b-n">&nbsp;</td>
				<td colspan="5" class="b-b-n">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="1" class="b-b-n">Tree No.</td>
				<td colspan="1" class="b-b-n">Barcode</td>
				<td colspan="1" class="b-b-n">Collection (bulk/individual)</td>
				<td colspan="1" class="b-b-n">MC</td>
				<td colspan="1" class="b-b-n">Purity</td>
				<td colspan="1" class="b-b-n">Viability</td>
				<td colspan="1" class="b-b-n">Seed Count</td>
				<td colspan="1" class="b-b-n">Seed Wt(g)</td>
				<td colspan="1" class="b-b-n">Room</td>
				<td colspan="1" class="b-b-n">Cont.No.</td>
				<td colspan="1" class="b-b-n">Bag No.</td>
				<td colspan="1" class="b-b-n">Date</td>
				<td colspan="2" class="b-b-n">Consignee</td>
				<td colspan="1" class="b-b-n">Released</td>
				<td colspan="1" class="b-b-n">Balance</td>
			</tr>

			<?php for($i = 0; $i<(count($_SESSION['data']['seed_record_other_result'])); $i++) {?>
				<tr>
					<td colspan="1">
						<?=$_SESSION['data']['seed_record_other_result'][$i]['tree_no'] ?? "n/a";?>
					</td>
					<td colspan="1">
						<?=$_SESSION['data']['seed_record_other_result'][$i]['barcode'] ?? "n/a";?>
					</td>
					<td colspan="1">
						<?=$_SESSION['data']['seed_record_other_result'][$i]['collection'] ?? "n/a";?>
					</td>
					<td colspan="1">
						<?=$_SESSION['data']['seed_record_other_result'][$i]['mc'] ?? "n/a";?>
					</td>
					<td colspan="1">
						<?=$_SESSION['data']['seed_record_other_result'][$i]['purity'] ?? "n/a";?>
					</td>
					<td colspan="1">
						<?=$_SESSION['data']['seed_record_other_result'][$i]['viab'] ?? "n/a";?>
					</td>
					<td colspan="1">
						<?=$_SESSION['data']['seed_record_other_result'][$i]['seed_count'] ?? "n/a";?>
					</td>
					<td colspan="1">
						<?=$_SESSION['data']['seed_record_other_result'][$i]['seed_weight'] ?? "n/a";?>
					</td>
					<td colspan="1">
						<?=$_SESSION['data']['seed_record_other_result'][$i]['room'] ?? "n/a";?>
					</td>
					<td colspan="1">
						<?=$_SESSION['data']['seed_record_other_result'][$i]['cont_no'] ?? "n/a";?>
					</td>
					<td colspan="1">
						<?=$_SESSION['data']['seed_record_other_result'][$i]['bag_no'] ?? "n/a";?>
					</td>
					<td colspan="1">
						<?=$_SESSION['data']['seed_record_other_result'][$i]['consignee_date'] ?? "n/a";?>
					</td>
					<td colspan="2">
						<?=$_SESSION['data']['seed_record_other_result'][$i]['consignee'] ?? "n/a";?>
					</td>
					<td colspan="1">
						<?=$_SESSION['data']['seed_record_other_result'][$i]['Released'] ?? "n/a";?>
					</td>
					<td colspan="1">
						<?=$_SESSION['data']['seed_record_other_result'][$i]['Balance'] ?? "n/a";?>
					</td>
				</tr>
			<?php } ?>


		</table>
						
	</div>
</body>
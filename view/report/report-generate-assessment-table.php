<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
	<title>	GENERATE ASSESSMENT TABLE SPECIES LOCATION OF SELECTED TREES | <?php include('../../view/inc_common/title_name.php');?></title>
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
	</style>
</head>
<body>

	<div style="width: 100%;position:absolute;height:160px;">
		<div style="text-align: center;margin-top:10px;">
			<label style="font-size: 18px;"><b>ASSESSMENT TABLE SPECIES LOCATION OF SELECTED TREES CY 
							<?= $_SESSION['data']['tree_assessment_result'][0]['cy'] ?? "n/a"?></b></label><br>
		</div>
	</div>


	<div style="width:100%;margin-top:35px;page-break-inside:auto;">

		<table class="tos">
			<tr>
				<td colspan="7" class="b-b-n"></td>
				<!-- <td colspan="3" class="b-b-n">Coordinates</td> -->
				<td colspan="9" class="b-b-n">Tree Assessment</td>
			</tr>
			<tr>
				<td>Tree Code</td>
				<td>Tree Species</td>
				<td>Scientific Name</td>
				<td>Location</td>
				<td>Method:Natural / Plantation</td>
				<td>Topography</td>
				<td>Stem Diameter</td>
				<!-- <td>Lat</td>
				<td>Long</td>
				<td>Altitude</td> -->
				<td>Height</td>
				<td>Stem Straightness</td>
				<td>Forking</td>
				<td>Circularity</td>
				<td>Tree Health</td>
				<td>Branch Angle</td>
				<td>Branch Thickness</td>
				<td>Branch Pruning</td>
				<td>Remarks</td>
			</tr>
			<tr>
				<td><?= $_SESSION['data']['tree_assessment_result'][0]['tree_code'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['tree_assessment_result'][0]['species_name'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['tree_assessment_result'][0]['botanical_name'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['tree_assessment_result'][0]['location'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['tree_assessment_result'][0]['method'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['tree_assessment_result'][0]['topography'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['tree_assessment_result'][0]['stem_diamenter'] ?? "n/a"?></td>
<!-- 				<td><?= $_SESSION['data']['tree_assessment_result'][0]['lat'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['tree_assessment_result'][0]['longi'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['tree_assessment_result'][0]['alt'] ?? "n/a"?></td>
 -->				<td><?= $_SESSION['data']['tree_assessment_result'][0]['total_height'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['tree_assessment_result'][0]['stem_straight'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['tree_assessment_result'][0]['forking'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['tree_assessment_result'][0]['circularity'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['tree_assessment_result'][0]['tree_health'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['tree_assessment_result'][0]['branch_angle'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['tree_assessment_result'][0]['branch_thickness'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['tree_assessment_result'][0]['branch_pruning'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['tree_assessment_result'][0]['remarks'] ?? "n/a"?></td>
			</tr>
			<tr>
				<td colspan="16" class="text-right">
					date printed : <?=date('m/d/Y');?>&nbsp;&nbsp;
				</td>
			</tr>
		</table>
		<br><br>
		<br><br>
		<br><br>
						
	</div>
</body>
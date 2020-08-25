<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
	<title>	GENERATE DETAILED INFORMATION ON IDETIFIED SEED SOURCE  | <?php include('../../view/inc_common/title_name.php');?></title>
	<style type="text/css">
		@page { margin: 1cm 1cm 1cm 1cm; }
		body {  font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 10px; }
		* {
			/*font-family: "DeJaVu Sans Mono",monospace;*/
		}
		.tos {
			width: 95%;
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
			<label style="font-size: 18px;"><b>DETAILED INFORMATION ON IDETIFIED SEED SOURCE </b></label><br>
		</div>
	</div>


	<div style="width:100%;margin-top:35px;page-break-inside:auto;">

		<table class="tos">
			<tr>
				<td colspan="6" class="b-b-n"></td>
				<td colspan="3" class="b-b-n">Coordinates</td>
				<td colspan="8" class="b-b-n">Stand Description</td>
			</tr>
			<tr>
				<td>Location</td>
				<td>Species</td>
				<td>Scientific Name</td>
				<td>Owner</td>
				<td>Contact No</td>
				<td>Date Assessed</td>
				<td>Lat</td>
				<td>Long</td>
				<td>Altitude</td>
				<td>Access Road</td>
				<td>Topography</td>
				<td>Soil Type</td>
				<td>Year Established</td>
				<td>Established Method</td>
				<td>Associated Agricultural/Plant</td>
				<td>Spacing</td>
				<td>Remarks</td>
			</tr>
			<tr>
				<td><?= $_SESSION['data']['detailed_info_result'][0]['location'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['detailed_info_result'][0]['species_name'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['detailed_info_result'][0]['botanical_name'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['detailed_info_result'][0]['owner'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['detailed_info_result'][0]['contact_no'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['detailed_info_result'][0]['date_assess'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['detailed_info_result'][0]['lat'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['detailed_info_result'][0]['longi'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['detailed_info_result'][0]['alt'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['detailed_info_result'][0]['access_road'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['detailed_info_result'][0]['topography'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['detailed_info_result'][0]['soil_type'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['detailed_info_result'][0]['year_establish'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['detailed_info_result'][0]['assoc_agri'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['detailed_info_result'][0]['assoc_method'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['detailed_info_result'][0]['spacing'] ?? "n/a"?></td>
				<td><?= $_SESSION['data']['detailed_info_result'][0]['remarks'] ?? "n/a"?></td>
			</tr>
			<tr>
				<td colspan="17" class="text-right">
					date printed : <?=date('m/d/Y');?>&nbsp;&nbsp;
				</td>
			</tr>
		</table>
		<br><br>
		<br><br>
		<br><br>
						
	</div>
</body>
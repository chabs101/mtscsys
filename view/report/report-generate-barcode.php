<?php 
include('../Barcode/BarcodeGenerator.php');
include('../Barcode/BarcodeGeneratorPNG.php');
$generator = new Picqer\Barcode\BarcodeGeneratorPNG();

?>
<!DOCTYPE html>
<html>
<head>
	<title>	GENERATE BARCODE | <?php include('../../view/inc_common/title_name.php');?></title>
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
			padding: 3px;
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
		.barcode {
			height:40px; 
			width:150px;
			margin-top: 5px;
			padding: 0px 13px 3px 13px;
		}
	</style>
</head>
<body>

	<?php $title = "GENERATE BARCODE";?>
	<?php include 'default_title.php'; ?><br><br>


	<div style="width:100%;margin-top:100px;page-break-inside:auto;">

			<?php 
				$trCounter = 0;
				for($i=0; $i<count($_SESSION['data']['ids']); $i++) { ?>
					<?php for($j=0; $j<$_SESSION['data']['qtyToPrint']; $j++) {?>

						<?php 
							$trCounter++;
						?>

						<div class="text-center" style="float:left;position: inline-block;border:1px dashed #000;height: auto;width: 160px;font-size:15px;padding:3px;margin-left:15px;page-break-inside:avoid;">
						<span class="text-left"><?= $_SESSION['data']['seedName'][$i] ?? "n/a"?></span><br>
						<img class="barcode" src="data:image/png;base64,<?= base64_encode($generator->getBarcode(( $_SESSION['data']['ids'][$i] ), $generator::TYPE_CODE_128))?>"/>
						<br><span><?= $_SESSION['data']['ids'][$i] ?? "n/a"?></span>
						</div>
			
						<?php if($trCounter == 4) {?>
						<div style="position: inline-block;color:white;font-size:10px;width: 100%;">
							i am invisible
						</div>
						<?php 
								$trCounter =0;
							} 
						?>

					<?php } ?>

			<?php } ?>			


	</div>
</body>
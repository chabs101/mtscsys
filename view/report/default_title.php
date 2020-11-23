	<div style="width: 100%;position:absolute;height:160px;">
		<div style="text-align: center;margin-left:50px;position:absolute;margin-top:40px;">
			<label style="font-size: 18px;"><b><?=$title ?? ""?></b></label><br>
		</div>

		<?php if(isset($barcode)) {?>
		<div class="text-center" style="height:30px;width:auto;margin-right:50px;float:right;border:1px dashed #000;height: auto;padding-top: 4px;padding-bottom:4px;page-break-inside:avoid;text-align: center !important;">
		<img class="barcode" src="data:image/png;base64,<?= base64_encode($generator->getBarcode(( $barcode ?? "" ), $generator::TYPE_CODE_128))?>" style="height:30px;padding-top: 10px;padding-left:10px;padding-right:10px;" />
		<br><span><?= $barcode ?? "" ?></span>
		</div>
		<?php } ?>
		<img src="../../assets/img/mtsc_logo.jpeg" style="height:50px;width:auto;margin-right:100px;float:right;margin-top:10px;">
	</div>
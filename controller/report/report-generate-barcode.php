<?php
session_start();
require_once('../DBConn.php');
require_once('../dompdf/lib/html5lib/Parser.php');
require_once('../dompdf/src/Autoloader.php');
Dompdf\Autoloader::register();
use Dompdf\Dompdf;

$db = new DBconn();

$_SESSION['data'] = [
					"ids" 		=>  $_GET['ids'],
					"seedName" 		=>  $_GET['seedName'],
					"qtyToPrint" => $_GET['qtyToPrint']
					];

// echo json_encode($_SESSION['data']);
// return;
ob_start();

include_once('../../view/report/report-generate-barcode.php');
$content = ob_get_clean();

$dompdf = new Dompdf();
$date = date('Y-m-d-Hm');
$dompdf->load_html($content);
$dompdf->set_paper("letter","portrait");
$dompdf->render();
ob_end_clean();
$dompdf->stream("barcode.pdf",array("Attachment" => 0));
?>
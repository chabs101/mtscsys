<?php
session_start();
require_once('../DBConn.php');
require_once('../dompdf/lib/html5lib/Parser.php');
require_once('../dompdf/src/Autoloader.php');
Dompdf\Autoloader::register();
use Dompdf\Dompdf;

$db = new DBconn();

if(isset($_GET['search'])) {
$search = $_GET['search'];

	$db->select("seed_collection","*","isdeleted=0 AND seed_collection_id=$search");
	$SeedCollectionResult = $db->result();

	$db->select("seed_collection_prov","*","isdeleted=0 AND seed_collection_id=$search");
	$AssocResult = $db->result();

	$db->select("seed_collection_other","*","isdeleted=0 AND seed_collection_id=$search");
	$seedOtherResult = $db->result();

	$_SESSION['data'] = [
						"seed_result" 		=>  $SeedCollectionResult,
						"assoc_result" 		=>  $AssocResult,
						"seed_other_result" => $seedOtherResult,
						];

	// echo json_encode($_SESSION['data']);
	// return;
	ob_start();
	include_once('../../view/report/report-generate-seed-collection.php');
	$content = ob_get_clean();

	$dompdf = new Dompdf();
	$date = date('Y-m-d-Hm');
	$dompdf->load_html($content);
	$dompdf->set_paper("letter","landscape");
	$dompdf->render();
	ob_end_clean();
	$dompdf->stream("GENERATE SEED COLLECTION.pdf",array("Attachment" => 0));
}
?>
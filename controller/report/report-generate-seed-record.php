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

		$db->select("seed_collection AS sc LEFT JOIN seed_record AS sr ON sr.seed_collection_id = sc.seed_collection_id","sc.*,seed_record_id, species_code ,store_code ,cost_code ,geo_n_soil ,bulk ,tree ,dbh ,total_height ,form ,remarks ,fumigation_method ,collector ,collector_no ,collection_date ,project ,identified_by ,seed_condition ,storage ,quantity,g_method, g_from, g_to, g_viab","sc.isdeleted=0 AND sr.seed_collection_id=$search");
		$seedRecordandCollection = $db->result();
		$search = $seedRecordandCollection[0]['seed_record_id'] ?? 0;

		$db->select("seed_record_other","*","isdeleted=0 AND seed_record_id=$search");
		$seedRecordOther = $db->result();

		$_SESSION['data'] = [
							"seed_record_collection_result" 		=>  $seedRecordandCollection,
							"seed_germination_result" 				=>  $germination_result,
							"seed_record_other_result" 				=> $seedRecordOther,
							];

	// echo json_encode($_SESSION['data']);
	// return;
	ob_start();

	include_once('../../view/report/report-generate-seed-record.php');
	$content = ob_get_clean();

	$dompdf = new Dompdf();
	$date = date('Y-m-d-Hm');
	$dompdf->load_html($content);
	$dompdf->set_paper("letter","landscape");
	$dompdf->render();
	ob_end_clean();
	$dompdf->stream("GENERATE SEED RECORD.pdf",array("Attachment" => 0));
}

?>
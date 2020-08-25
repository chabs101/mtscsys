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

	$db->select("seed_collection AS sc LEFT JOIN seed_detailed_information AS sdi ON sdi.seed_collection_id = sc.seed_collection_id LEFT JOIN seed_record AS sr ON sc.seed_collection_id = sr.seed_collection_id LEFT JOIN tree_assessment AS ta ON ta.seed_collection_id = sc.seed_collection_id","sc.*,detailed_info_id,owner,soil_type, date_assess,contact_no, access_road, total_area, year_establish, assoc_agri,sdi.remarks,spacing,method,topography","sc.isdeleted=0 AND sdi.seed_collection_id=$search");
		$treeResult = $db->result();

		$_SESSION['data'] = [
							"detailed_info_result" 		=>  $treeResult,
							];
	// echo json_encode($_SESSION['data']);
	// return;
	ob_start();

	include_once('../../view/report/report-generate-detailed-information.php');
	$content = ob_get_clean();

	$dompdf = new Dompdf();
	$date = date('Y-m-d-Hm');
	$dompdf->load_html($content);
	$dompdf->set_paper("legal","landscape");
	$dompdf->render();
	$dompdf->stream("GENERATE SEED RECORD.pdf",array("Attachment" => 0));
}

?>
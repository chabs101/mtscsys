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

	$db->select("seed_collection AS sc LEFT JOIN tree_assessment AS ta ON ta.seed_collection_id = sc.seed_collection_id LEFT JOIN seed_record AS sr ON sc.seed_collection_id = sr.seed_collection_id ","sc.*,tree_assessment_id,method, topography, stem_diamenter, tree_code, stem_straight, forking, circularity, tree_health, branch_angle, branch_thickness, branch_pruning,cy, ta.remarks,total_height","sc.isdeleted=0 AND ta.seed_collection_id=$search");
		$treeResult = $db->result();

		$_SESSION['data'] = [
							"tree_assessment_result" 		=>  $treeResult,
							];
	// echo json_encode($_SESSION['data']);
	// return;
	ob_start();

	include_once('../../view/report/report-generate-assessment-table.php');
	$content = ob_get_clean();

	$dompdf = new Dompdf();
	$date = date('Y-m-d-Hm');
	$dompdf->load_html($content);
	$dompdf->set_paper("legal","landscape");
	$dompdf->render();
	$dompdf->stream("GENERATE ASSESSMENT TABLE SPECIES LOCATION OF SELECTED TREES.pdf",array("Attachment" => 0));
}

?>
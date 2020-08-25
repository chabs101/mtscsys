<?php
header($_SERVER['SERVER_PROTOCOL']." 404 Not Found", true, 404);
include_once("view/error_pages/404.php");
die();
?>
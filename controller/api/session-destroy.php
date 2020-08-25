<?php
session_start();
session_destroy();
require_once('../DBConn.php');
$db = new DBConn();
$db->destroyRememberToken();
header('Location:../../');
?>
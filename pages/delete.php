<?php 
require_once "../config/connect.php";

$id = $_GET['id'];
$stmt = $con->prepare("DELETE FROM workers WHERE worker_id = ?");
$stmt->execute([$id]);
header("Location: index.php")

?>
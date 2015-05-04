<?php
//Products API
//@author 506920
if(!isset($dbhost)){
require_once("../settings.php");
}
$pdo = new PDO('mysql:host=' . $dbhost . ';dbname=webscrp', $dbuser, $dbpassword);

$id = intval($_GET['id']);

//PDO stuff 


$sql = $pdo->prepare("DELETE FROM Product WHERE ProdID=?");
$sql->execute(array($id));
$json = $sql->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($json);
//echo json_encode($json);
echo "Product successfully deleted!";
$pdo = null;
<?php
if(!isset($dbhost)){
require_once("settings.php");
}
$pdo = new PDO('mysql:host=' . $dbhost . ';dbname=webscrp', $dbuser, $dbpassword);
$sql="SELECT * FROM Product INNER JOIN Category on Product.CatID = Category.CatID";
$json = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($json);

$pdo = null;
?>
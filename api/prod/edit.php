<?php
//Products API
//@author 506920
if(!isset($dbhost)){
require_once("../settings.php");
}

$pdo = new PDO('mysql:host=' . $dbhost . ';dbname=webscrp', $dbuser, $dbpassword);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$id = $_POST["id"];
	$name = $_POST["title"];
	$desc = $_POST["productDesc"];
	$price = $_POST["price"];
	$stock = $_POST["stock"];
	if(substr($price, 0, 1) == "£"){
	$price = substr($price, 1);
	}
$sql = $pdo->prepare("UPDATE Product SET Name = ?, Description = ?, Price = ?, Stock = ? WHERE ProdID = ?;");
$sql->execute(array($name, $desc, $price, $stock, $id));
$json = $sql->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($json);

echo '<script type="text/javascript">alert("Product successfully edited!"); window.location.href="'. $rootURL . 'CMS/prodAdmin";</script>';
//header('Location:' . $rootURL . 'CMS/prodAdmin');

$pdo = null;
}
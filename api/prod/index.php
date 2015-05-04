<?php
//Products API
//@author 506920
if(!isset($dbhost)){
require_once("../settings.php");
}
$pdo = new PDO('mysql:host=' . $dbhost . ';dbname=webscrp', $dbuser, $dbpassword);
//POST - Add new product
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$name = $_POST["name"];
	$desc = $_POST["desc"];
	$price = $_POST["price"];
	$stock = $_POST["stock"];
	$catID = $_POST["category"];
	if(substr($price, 0, 1) == "£"){
	$price = substr($price, 1);
	}
$sql = $pdo->prepare("INSERT INTO Product (Name, Description, Price, CatID, Stock) VALUES (?, ?, ?, ?, ?);");
$sql->execute(array($name, $desc, $price, $catID, $stock));
$json = $sql->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($json);
echo "Product successfully added!";
	}

else{
$id = intval($_GET['id']);

//PDO stuff 


$sql = $pdo->prepare("SELECT * FROM Product INNER JOIN Category on Product.CatID = Category.CatID WHERE ProdID=?");
$sql->execute(array($id));
$json = $sql->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($json);
//echo json_encode($json);
}
$pdo = null;
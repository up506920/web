<?php
//Products API
//@author 506920

if (session_status() == PHP_SESSION_NONE) {
 session_start();
 }
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
//Get specific product
$id = intval($_GET['id']);
$sql = $pdo->prepare("SELECT * FROM Product INNER JOIN Category on Product.CatID = Category.CatID WHERE ProdID=?");
$sql->execute(array($id));

if(isset($_GET['qty'])){
	$json = $sql->fetch(PDO::FETCH_ASSOC);
	if(empty($json)){
//Remove from basket if product doesn't exist in DB anymore
		if(array_key_exists($id, $_SESSION['basket'])){
			unset($_SESSION['basket'][$id]);
			echo 'Deleted';
		}

		
	}
	if(!empty($json)){
		$qty = $_GET['qty'];
		$json["BasketQty"] = $qty;
		$json = json_encode($json);
		echo $json;
	}
} 
else{
	$json = $sql->fetch(PDO::FETCH_ASSOC);
	$json["BasketQty"] = 0;
	$json = json_encode($json);
	
	//echo $json;
}
}

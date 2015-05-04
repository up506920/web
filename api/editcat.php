<?php
//Category Edit
//@author 506920
if(!isset($dbhost)){
require_once("settings.php");
}
$pdo = new PDO('mysql:host=' . $dbhost . ';dbname=webscrp', $dbuser, $dbpassword);
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	//check if it's a new or edit
	 
	if(isset($_POST["catID"])){
		$catID = $_POST["catID"];
		$category = $_POST["category"];
		
$sql = $pdo->prepare("UPDATE Category SET CatName = ? WHERE CatID = ?;");
$sql->execute(array($category, $catID));
$json = $sql->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($json);
echo '<script type="text/javascript">alert("Category successfully edited!"); window.location.href="'. $rootURL . 'CMS/prodAdmin";</script>';
	}
	//new
	else{
	$newcat = $_POST["newcat"];
	$sql = $pdo->prepare("INSERT INTO Category (CatName) VALUES (?);");
	$sql->execute(array($newcat));
	$json = $sql->fetchAll(PDO::FETCH_ASSOC);
	$json = json_encode($json);
	echo '<script type="text/javascript">alert("New category successfully added!"); window.location.href="'. $rootURL . 'CMS/prodAdmin";</script>';
	
	}
	

$pdo = null;
}
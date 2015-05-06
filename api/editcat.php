<?php
//Category Edit
//@author 506920
if(!isset($dbhost)){
require_once("settings.php");
}
//$pdo = new PDO('mysql:host=' . $dbhost . ';dbname=webscrp', $dbuser, $dbpassword);
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
	//new category
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

//Delete Category
else if ($_SERVER["REQUEST_METHOD"] == "GET"){
	if(isset($_GET["catID"])){
		$catID = $_GET["catID"];
		$sql = $pdo->prepare("Select Count(p.prodID) as prods, c.CatName as catname FROM Category c INNER JOIN Product p on c.CatID=p.CatID WHERE c.CatID=?;");
		$sql->execute(array($catID));
		$json = $sql->fetch(PDO::FETCH_ASSOC);
		//check if products are associated with that category
		if($json["prods"] == 0){
		//check if category exists in DB to delete
			if($json["catname"] != "")
			{
				$sql = $pdo->prepare("DELETE FROM Category WHERE CatID=?;");
				$sql->execute(array($catID));
				echo "Category deleted succesfully";
				}
			else
			{ 
				echo "Category doesn't exist in database";
			}
		}
		else{
			echo "There are " . $json["prods"] . " products still associated with that category - please remove products before deleting category.";
		}
	}
			
}


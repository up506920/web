<?php 
session_start();
//Base basket code
//Some base session reference to https://www.codeofaninja.com/2013/04/shopping-cart-in-php.html
//Other content author 506920

if(!isset($dbhost)){
require_once("settings.php");
}
//Check if ID exists in DB
if(isset($_GET['id'])){
$id = $_GET['id'];

if(isset($_GET['qty'])){
$qty = $_GET['qty'];
}

//Get old stock value
$sql = $pdo->prepare("SELECT Stock from Product WHERE ProdID = ?;");
$sql->execute(array($id));
$oldstockArray = $sql->fetch(PDO::FETCH_ASSOC);
$oldstock = intval($oldstockArray['Stock']);
//print_r(gettype($oldstock));

//Work out new stock value, check if stock levels have changed since first loading the page
//I've done this validity check on a PHP level so it can check the DB as it stands, and so it can't be
//broken by edited clientside files.

$newstock = $oldstock - intval($qty);
if($newstock >= 0){
	if(!isset($_SESSION['basket'])){
		$_SESSION['basket'] = array();
	}
	//if it exists in session array then add quantity
	if(array_key_exists($id, $_SESSION['basket'])){
		$_SESSION['basket'][$id]=$_SESSION['basket'][$id]+$qty;
	}
	else{
		$_SESSION['basket'][$id]=$qty;
	}
	$basketcount = count($_SESSION['basket']);
	$sql = $pdo->prepare("UPDATE Product SET Stock = ? WHERE ProdID = ?;");
	$sql->execute(array($newstock, $id));
	$json = $sql->fetchAll(PDO::FETCH_ASSOC);
	$json = json_encode($json);
	$pdo = null;
	echo 'Product successfully added to cart!';
	}
else{
	echo 'Not enough stock, please try again';
}




// Stuff left over from testing
/*
foreach($_SESSION['basket'] as $id=>$value){
echo $id;
echo($_SESSION['basket'][$id]);

}
*/
}


if(!isset($_GET['id'])){
//Return json of all basket items
echo(json_encode($_SESSION['basket']));
}

?>
<?php 
session_start();
//Edit contents of basket. Author 506920
if(!isset($dbhost)){
require_once("settings.php");
}
//Check if ID exists in DB
if(isset($_GET['id'])){
$id = intval($_GET['id']);

if(isset($_GET['qty'])){
$qty = intval($_GET['qty']);
}
//If on basket page and qty=absolute value



//Get old stock value
$sql = $pdo->prepare("SELECT Stock from Product WHERE ProdID = ?;");
$sql->execute(array($id));
$oldstockArray = $sql->fetch(PDO::FETCH_ASSOC);
$oldstock = intval($oldstockArray['Stock']);
//print_r(gettype($oldstock));

//Work out new stock value, check if stock levels have changed since first loading the page
//I've done this validity check on a PHP level so it can check the DB as it stands, and so it can't be
//broken by edited clientside files.
if(!isset($_GET['newqty'])){
$newstock = $oldstock - intval($qty);
}
else{
	$newqty = $_GET['newqty'];
	$difference = $newqty - $_SESSION['basket'][$id]; 
	$newstock = $oldstock - intval($difference);
}	
if($newstock >= 0){
	if(!isset($_SESSION['basket'])){
		$_SESSION['basket'] = array();
	}
	//if it exists in session array then add quantity
	if(array_key_exists($id, $_SESSION['basket'])){
		if(isset($_GET['qty'])){
			$_SESSION['basket'][$id]=$_SESSION['basket'][$id]+$qty;
			$msg = 'Product successfully added to cart!';
			}
		else if(isset($_GET['newqty'])){
			if($newqty > 0){
				$_SESSION['basket'][$id]=$newqty;
				$msg = 'Product successfully updated!';
				}
			else{
			if(array_key_exists($id, $_SESSION['basket'])){
				unset($_SESSION['basket'][$id]);
				$msg = 'Product successfully removed from basket';
			}
			}
		}
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
		echo $msg;
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
//Return json of all basket items if basket exists
	if(isset($_SESSION['basket'])){
		echo(json_encode($_SESSION['basket']));
	}
	else
	{
		echo 'No items currently in basket';
	}
}
	else{
}



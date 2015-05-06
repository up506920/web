<?php
$title="Shop Name Here"; //pull this from the DB when installed?
include( "include/header.php" );
include( "api/catget.php");
include( "include/nav.php");
?>
<section id="basketDetails" class="contentright productlist">
	<h2 id="basket" class="contentTitle">Basket</h2>
 Loading Basket...
	
</section>
</section>
<?php
include( "include/footer.php" );
?>

<script>


window.onload = onLoad;

function makeSmallProds(response)
    { 
		var prodsHTML = document.getElementById('basketDetails').innerHTML;
			if(response == 'Deleted'){
				document.getElementById('basketDetails').innerHTML = prodsHTML; 
				return;
			}
			else{
		obj = JSON.parse(response);
		stockOptionsHTML = makeQuantityOptions(parseInt(obj["Stock"]), parseInt(obj["BasketQty"]));
		shortDesc = obj["Description"].substring(0,65) + "...";
		prodsHTML+='<section id="prod1" class="marginBottom"><img src="lib/img/prods/' + obj["ProdID"] + '.jpg" style="width:100px; height:77px;" onerror="errorImage(this)"/><a href="product.php?id=' + obj["ProdID"] + '"><h2>' + obj["Name"] + '</h2></a><p id="productDesc" class="shortProductDesc">' + shortDesc + '</p><p id="categoryNum" class="cat hidden">' + obj["CatID"] + '<p id="prodCategory">' + obj["CatName"] + '</p><aside id="basketQuantity"><p class="sameLine">Price: </p><p id="price" class="priceText">£' + obj["Price"] + '</p><br/><p class="sameLine">Quantity: </p><select id="qty' + obj["ProdID"] + '">' + stockOptionsHTML + '</select><button id="update' + obj["ProdID"] + '" class="update" type="button">Update item</button><br/><button id="remove' + obj["ProdID"] + '" class="remove" type="button">Remove item</button></aside>'
		
	
		document.getElementById('basketDetails').innerHTML = prodsHTML; 
		//Add listeners to buttons
		var basketEdit = document.getElementsByClassName("update");
			for (var i = 0; i < basketEdit.length; i++) {
				basketEdit[i].addEventListener('click', editBasketItem);
			}
		var basketRemove = document.getElementsByClassName("remove");
		for (var x = 0; x < basketEdit.length; x++) {
			basketRemove[x].addEventListener('click', removeBasketItem);
			}
		}
	}
	

	
function makeQuantityOptions(stockNum, basketNum){

//Take the number of items in stock from PHP, loop through to add the options to the qty select.
var stockOptions = "";
var totalStock = parseInt(stockNum + basketNum);
for (var i=1; i <= totalStock; i++) {
	if(i==basketNum){
		stockOptions += "<option value=" + i + " selected>" + i + "</option>";
		}
	else{
		stockOptions += "<option value=" + i + ">" + i + "</option>";
	}
		}
	return stockOptions;
	
}

function errorImage(img){
		img.src='lib/img/prods/Default-Icon-icon.png';
	}
	
  function findProds(response)
    { 
		var prodsHTML = '<h2 id="basket">Basket</h2>';
		document.getElementById('basketDetails').innerHTML = prodsHTML; 
		if(response.charAt(0) == 'N'){
			prodsHTML+=response;
			document.getElementById('basketDetails').innerHTML = prodsHTML; 
		}
		else
		{
		//The following is returning an object, I guess because an array has to be sequential and
		//without gaps? Either way, easier to rewrite my standard array loop below to work with 
		//the jsonResp as an object.

		jsonResp = JSON.parse(response);
		//jsonResp = jsonResp.toArray();
		for(var key in jsonResp){
			var qty = jsonResp[key];
			//Edited AjaxGet to pass parameters. Specific instance so won't add into lib.
			var URL = 'api/prod/index.php?id=' + parseInt(key) + '&qty=' + qty;
			var ajaxObj = new XMLHttpRequest();
			ajaxObj.open("GET", URL, false); 
			ajaxObj.onreadystatechange = function()
			{ if (ajaxObj.status == 200)
				if (ajaxObj.readyState == 4)
					makeSmallProds(ajaxObj.responseText);
				};
			ajaxObj.send(null);
			}
		prodsHTML = document.getElementById('basketDetails').innerHTML;
		prodsHTML+='<button id="buy" type="button">Simulate Purchase</button>';
		document.getElementById('basketDetails').innerHTML = prodsHTML; 
		document.getElementById('buy').addEventListener("click", simulatePurchase);
		}
	}

function getResponse(response){
	alert(response);
	location.reload();
	}
	
function simulatePurchase(e){
//msgbox asking for custs details

//add to Orders

//add each line to orderlines

//remove from basket


}

function editBasketItem(e){
	var targetid = e.target.id.substring(6);
	var newQty = document.getElementById("qty" + targetid).value;
	AjaxGet("api/editbasket.php?id=" + targetid + "&newqty=" + newQty, getResponse); 
}

function removeBasketItem(e){
	var targetid = e.target.id.substring(6);
	var newQty = 0;
	AjaxGet("api/editbasket.php?id=" + targetid + "&newqty=" + newQty, getResponse); 
}

function onLoad() {
	AjaxGet('api/addtocart.php', findProds);
	
}




goHomeAndHighlight = function(){
var catClicked = document.querySelector(".sidebar > li:hover > a");
window.location.href = "index.php?#" + catClicked.id;
}



var sidebarLinks = document.getElementsByClassName("sidebar")[0].getElementsByTagName("a");
var clicked = document.querySelector(".sidebar > li:target > a");
for (var i = 0; i < sidebarLinks.length; i++) {
sidebarLinks[i].addEventListener("click", goHomeAndHighlight);
}
</script>
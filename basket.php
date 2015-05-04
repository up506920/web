<?php
$title="Shop Name Here"; //pull this from the DB when installed?
include( "include/header.php" );
include( "api/catget.php");
include( "include/nav.php");
?>
<section id="basketDetails" class="contentright productlist">
	<h2 id="basket" class="contentTitle">Basket</h2>
	<?php
include( "include/smallprodbasket.php" );

?>
	
</section>
</section>
<?php
include( "include/footer.php" );
?>

<script>


window.onload = onLoad;

function makeSmallProds(response, qty)
    { 
	
		var prodsHTML = document.getElementById('basketDetails').innerHTML;
		jsonResp = JSON.parse(response);
		for(var i=0;i<jsonResp.length;i++){
		var obj = jsonResp[i];
		/*for(var key in obj){
			var attrName = key;
			var attrValue = obj[key];
			}*/
		shortDesc = obj["Description"].substring(0,65) + "...";
		prodsHTML+='<section id="prod1" class="marginBottom"><img src="lib/img/prods/' + obj["ProdID"] + '.jpg" style="width:100px;"/><a href="product.php?id=' + obj["ProdID"] + '"><h2>' + obj["Name"] + '</h2></a><p id="productDesc" class="shortProductDesc">' + shortDesc + '</p><p id="categoryNum" class="cat hidden">' + obj["CatID"] + '<p id="prodCategory">' + obj["CatName"] + '</p><aside id="basketQuantity"><p class="sameLine">Price: </p><p id="price" class="priceText">£499.99</p><br/><p class="sameLine">Quantity: </p><select><option value="1">' + qty + '</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></aside>'
		}
	
		document.getElementById('basketDetails').innerHTML = prodsHTML; 

	}


  function findProds(response)
    { 
		var prodsHTML = '<h2 id="basket">Basket</h2>';
		document.getElementById('basketDetails').innerHTML = prodsHTML; 
		jsonResp = JSON.parse(response);
		for(var i=0;i<jsonResp.length;i++){
		var obj = jsonResp[i];
		/*for(var key in obj){
			var attrName = key;
			var attrValue = obj[key];
			}*/
			AjaxGet('api/prod/index.php?id=' + obj[0], makeSmallProds(obj[1]));	
			}


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
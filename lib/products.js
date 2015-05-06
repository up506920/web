//Get product content from PHP
//Written by UP506920. Based on Dr Rich Boakes' Ajax Worksheets.

//Add Listeners

window.onload = onLoad;

//Add listener for any sidebar link click
var sidebarLinks = document.getElementsByClassName("sidebar")[0].getElementsByTagName("a");
for (var i = 0; i < sidebarLinks.length; i++) {
sidebarLinks[i].addEventListener("click", showAndHideProds);
}

function showAndHideProds(e, catClicked)
    { 
	if(catClicked == undefined)
	{
		var catClicked = document.querySelector(".sidebar > li:hover > a");
	}

	var prodsHTML = catClicked.innerHTML;
	var product = document.getElementsByClassName("marginBottom");
	for(var i=0; i<product.length; i++){
		if(catClicked.id.charAt(1) == "1" || product[i].getElementsByClassName("cat")[0].innerHTML == catClicked.id.charAt(1)){
			product[i].className = "marginBottom";
			}
		else if(catClicked.id.charAt(1) > "1" && product[i].getElementsByClassName("cat")[0].innerHTML != catClicked.id.charAt(1)){
			product[i].className = product[i].className + " hidden";
			}
		}
	document.getElementById('productTypes').innerHTML = prodsHTML;
	}

	function errorImage(img){
		img.src='lib/img/prods/Default-Icon-icon.png';
	}
	
  function makeSmallProds(response)
    { 
	var catClicked = document.querySelector(".sidebar > li:target > a");
	if(catClicked != null && catClicked !== undefined){
		var prodsHTML = '<h2 id="productTypes">' + catClicked.innerHTML + '</h2> Loading products...';
		document.getElementById('products').innerHTML = prodsHTML; 
		prodsHTML = '<h2 id="productTypes">' + catClicked.innerHTML + '</h2>';
	}
	else{
		var prodsHTML = '<h2 id="productTypes">All Products</h2> Loading products...';
		document.getElementById('products').innerHTML = prodsHTML; 
		prodsHTML = '<h2 id="productTypes">All Products</h2>';
		}
	jsonResp = JSON.parse(response);
	for(var i=0;i<jsonResp.length;i++){
		var obj = jsonResp[i];
		//Don't show out of stock items
		if(obj["Stock"]>= 1){
			shortDesc = obj["Description"].substring(0,65) + "...";
			prodsHTML+='<section id="prod' + obj["ProdID"] + '" class="marginBottom prod"><img src="lib/img/prods/' + obj["ProdID"] + '.jpg" onError="errorImage(this)" style="width:100px;"/></object><a href="product.php?id=' + obj["ProdID"] + '"><h2>' + obj["Name"] + '</h2></a><p id="productDesc" class="shortProductDesc">' + shortDesc + '</p><p id="categoryNum" class="cat hidden">' + obj["CatID"] + '<p id="prodCategory">' + obj["CatName"] + '</p><aside id="price" class="price">£' + obj["Price"] + '<img src="lib/img/basket.png"/ id="q'+ obj["ProdID"]+'" class="basket" style="width:50px;"/ alt="Add to basket..."></aside></section>'
			}
		}
	
		//if no prods in stock:
		if(prodsHTML == '<h2 id="productTypes">All Products</h2>'){
			prodsHTML += ' No products in stock';
			}
		document.getElementById('products').innerHTML = prodsHTML; 
		
		//add listeners for the quick basket icon
		var baskets = document.getElementsByClassName("basket");
		for (var i=0; i<baskets.length; i++) {
            baskets[i].addEventListener('click', quickBasket);
        }
		
		if(catClicked !== undefined && catClicked != null){
			if(catClicked.id.charAt(1) != "1"){
				showAndHideProds(null, catClicked);
			}
		}
	}

function updateBasket(response){
	document.getElementById("basketCount").innerHTML = response;
}
	
function refreshBasket(){
	AjaxGet('api/prodget.php', makeSmallProds);
	AjaxGet('api/prodget.php?&bskt=1', updateBasket);
	}
	
function addedToBasket(response){
	alert(response);
	refreshBasket();
}
	
function quickBasket(e) {
	var targetid = e.target.id.substring(1);
	AjaxGet('api/addtocart.php?&id=' + targetid + '&qty=1', addedToBasket);
}
	

function onLoad() {
	AjaxGet('api/prodget.php', makeSmallProds);

};




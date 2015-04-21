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

	var prodsHTML = catClicked.innerText;
	var product = document.getElementsByClassName("marginBottom");
	for(var i=0; i<product.length; i++){
		if(catClicked.id == "1" || product[i].getElementsByClassName("cat")[0].innerHTML == catClicked.id){
			product[i].className = "marginBottom";
			}
		else if(catClicked.id > "1" && product[i].getElementsByClassName("cat")[0].innerHTML != catClicked.id){
			product[i].className = product[i].className + " hidden";
			}
		}
	document.getElementById('productTypes').innerHTML = prodsHTML;
	}
	/*jsonResp = JSON.parse(response);
	for(var i=0;i<jsonResp.length;i++){
		var obj = jsonResp[i];
		/*for(var key in obj){
			var attrName = key;
			var attrValue = obj[key];
			}
		shortDesc = obj["Description"].substring(0,100) + "...";
		prodsHTML+='<section id="prod1" class="marginBottom"><img src="lib/img/prods/' + obj["ProdID"] + '.jpg" style="width:100px;"/><a href="product.php?id=' + obj["ProdID"] + '"><h2>' + obj["Name"] + '</h2></a><p id="productDesc" class="shortProductDesc">' + shortDesc + '</p><p id="categoryNum" class="hidden">' + obj["CatID"] + '<p id="prodCategory">Computers > Laptops</p><aside id="price" class="price">' + obj["Price"] + '<img src="lib/img/basket.png"/ style="width:50px;"/ alt="Add to basket..."></aside></section>'
		}
	document.getElementById('products').innerHTML = prodsHTML; */ 

  function makeSmallProds(response)
    { 
	var catClicked = document.querySelector(".sidebar > li:target > a");
	var prodsHTML = '<h2 id="productTypes">' + catClicked.innerText + '</h2> Loading products...';
	document.getElementById('products').innerHTML = prodsHTML; 
	prodsHTML = '<h2 id="productTypes">' + catClicked.innerText + '</h2>';
	jsonResp = JSON.parse(response);
	for(var i=0;i<jsonResp.length;i++){
		var obj = jsonResp[i];
		/*for(var key in obj){
			var attrName = key;
			var attrValue = obj[key];
			}*/
		
		shortDesc = obj["Description"].substring(0,65) + "...";
		prodsHTML+='<section id="prod1" class="marginBottom"><img src="lib/img/prods/' + obj["ProdID"] + '.jpg" style="width:100px;"/><a href="product.php?id=' + obj["ProdID"] + '"><h2>' + obj["Name"] + '</h2></a><p id="productDesc" class="shortProductDesc">' + shortDesc + '</p><p id="categoryNum" class="cat hidden">' + obj["CatID"] + '<p id="prodCategory">' + obj["CatName"] + '</p><aside id="price" class="price">£' + obj["Price"] + '<img src="lib/img/basket.png"/ style="width:50px;"/ alt="Add to basket..."></aside></section>'
		}
	
		document.getElementById('products').innerHTML = prodsHTML; 
		if(catClicked.id != "1"){
			showAndHideProds(null, catClicked);
		}
	}


function onLoad() {
	AjaxGet('api/prodget.php', makeSmallProds);

};




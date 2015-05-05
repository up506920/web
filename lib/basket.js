//Get product content from PHP
//Written by UP506920. Based on Dr Rich Boakes' Ajax Worksheets.

//Add Listeners

window.onload = onLoad;

function makeSmallProds(response, qty)
    { 
	
		var prodsHTML = document.getElementById('products').innerHTML;
		document.getElementById('products').innerHTML = prodsHTML; 
		prodsHTML = '<h2 id="productTypes">Basket</h2>';
		jsonResp = JSON.parse(response);
		jsonResp = jsonResp.toArray();
		for(var i=0;i<jsonResp.length;i++){
		var obj = jsonResp[i];
		/*for(var key in obj){
			var attrName = key;
			var attrValue = obj[key];
			}*/
		shortDesc = obj["Description"].substring(0,65) + "...";
		prodsHTML+='<section id="prod1" class="marginBottom"><img src="lib/img/prods/' + obj["ProdID"] + '.jpg" style="width:100px;"/><a href="product.php?id=' + obj["ProdID"] + '"><h2>' + obj["Name"] + '</h2></a><p id="productDesc" class="shortProductDesc">' + shortDesc + '</p><p id="categoryNum" class="cat hidden">' + obj["CatID"] + '<p id="prodCategory">' + obj["CatName"] + '</p><aside id="basketQuantity"><p class="sameLine">Price: </p><p id="price" class="priceText">£499.99</p><br/><p class="sameLine">Quantity: </p><select><option value="1">' + qty + '</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></aside>'
		}
	
		document.getElementById('products').innerHTML = prodsHTML; 

	}


  function findProds(response)
    { 
		var prodsHTML = '<h2 id="productTypes">Basket</h2>';
		document.getElementById('products').innerHTML = prodsHTML; 
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
};




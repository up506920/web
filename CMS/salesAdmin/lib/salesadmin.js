//Sales Admin Scripts
//Author 506920

var sidebarLinks = document.getElementsByClassName("sidebar")[0].getElementsByTagName("a");

for (var i = 0; i < sidebarLinks.length; i++) {
sidebarLinks[i].addEventListener("click", getForm);
}

function ajaxChooser(){
var clicked = document.querySelector(".sidebar > li:hover> a");
	if(clicked != null && clicked !== undefined){
		if(clicked.hash == "#1"){
			AjaxGet('../../api/orders.php', makeForm, "async");
		}
		if(clicked.hash == "#2"){
			AjaxGet('../../api/prodget.php', makeForm, "async");
		}
		if(clicked.hash == "#3"){
			AjaxGet('../../api/orders.php?cash=true', makeForm, "async");
		}
	}
}

function getForm() {
	ajaxChooser();
	}
  function makeForm(response)
    { 
	//Generates different sales admin pages
	var catClicked = document.querySelector(".sidebar > li:hover> a");
	if(catClicked != null && catClicked !== undefined){
		var formHTML = '<h2 id="header">' + catClicked.innerHTML + '</h2> Loading form...';
		document.getElementById('form').innerHTML = formHTML; 
		formHTML = '<h2 id="header">' + catClicked.innerHTML + '</h2><br/><br/>';
		
		//Sales Report
		if(catClicked.hash == "#1"){
			formHTML+='<table class="tg"><tr><th class="tg-031e">Order Number</th><th class="tg-031e">Name</th><th class="tg-031e">Address</th><th class="tg-031e">Telephone Number</th><th class="tg-031e">Number of Products</th><th class="tg-031e">Total Price</th><th class="tg-031e">Order Date</th></tr>'
			jsonResp = JSON.parse(response);
			for(var i=0;i<jsonResp.length;i++){
				var obj = jsonResp[i];
				formHTML+='<tr><td class="tg-031e">' + obj["OrderID"] + '</td><td class="tg-031e">' + obj["name"] + '</td><td class="tg-031e">' + obj["address"] + '</td><td class="tg-031e">' + obj["tel"] + '</td><td class="tg-031e">' + obj["prods"] + '</td><td class="tg-031e">£' + obj["totalprice"] + '</td><td class="tg-031e">' + obj["orderDate"] + '</td></tr>';
				}
			formHTML+='</table>';
			document.getElementById('form').innerHTML = formHTML; 
			}
			
		//Stock Level Report
		else if(catClicked.hash == "#2"){
			formHTML+='<table class="tg"><tr><th class="tg-031e">Product Name</th><th class="tg-031e">Stock Level</th></tr>'
			jsonResp = JSON.parse(response);
			for(var i=0;i<jsonResp.length;i++){
				var obj = jsonResp[i];
					var tdclass = "tg-031e";
					//Highlight in red if stock is 0
					if(obj["Stock"] == 0){
						tdclass = "tg-031e priceText";
					}
					formHTML+='<tr><td class="tg-031e">'+ obj["Name"] + ' </td><td class="' + tdclass + '">'+ obj["Stock"] +'</td></tr>';
					
				document.getElementById('form').innerHTML = formHTML; }
			formHTML+='</table>';
			document.getElementById('form').innerHTML = formHTML; 
			
		}
		else if(catClicked.hash == "#3"){
		formHTML+='<table class="tg"><tr><th class="tg-031e">Total Cash Taken/Day</th><th class="tg-031e">Day of Transactions</th></tr>'
			jsonResp = JSON.parse(response);
			var totalcount = 0;
			for(var i=0;i<jsonResp.length;i++){
				var obj = jsonResp[i];
				totalcount = totalcount + parseInt(obj["totalcash"]);
				formHTML+='<tr><td class="tg-031e"><p class="priceText">£'+ obj["totalcash"] + '</p> </td><td class="tg-031e">'+ obj["orderday"] +'</td></tr>';
				document.getElementById('form').innerHTML = formHTML; }
			formHTML+='</table><br/><br/><table class="tg"><tr><th class="tg-031e">Absolute Total Cash Taken</th><tr><td class="tg-031e"><p class="priceText">£'+ totalcount + '</p></td></tr></table>';
			document.getElementById('form').innerHTML = formHTML; 
		
        }
		else if(catClicked.hash == "#4"){
		formHTML+='<table class="tg"><tr><th class="tg-031e">Total Cash Taken/Day</th><th class="tg-031e">Day of Transactions</th></tr>'
			jsonResp = JSON.parse(response);
			var totalcount = 0;
			for(var i=0;i<jsonResp.length;i++){
				var obj = jsonResp[i];
				totalcount = totalcount + parseInt(obj["totalcash"]);
				formHTML+='<tr><td class="tg-031e"><p class="priceText">£'+ obj["totalcash"] + '</p> </td><td class="tg-031e">'+ obj["orderday"] +'</td></tr>';
				document.getElementById('form').innerHTML = formHTML; }
			formHTML+='</table><br/><br/><table class="tg"><tr><th class="tg-031e">Absolute Total Cash Taken</th><tr><td class="tg-031e"><p class="priceText">£'+ totalcount + '</p></td></tr></table>';
			document.getElementById('form').innerHTML = formHTML; 
		
        }
	}
	else{
		var formHTML = '<h2 id="header">Click on the links to the left to do different tasks</h2>';
		document.getElementById('form').innerHTML = formHTML; 
		}

    }
	
		
	function deleteResponse(response){
	alert(response);
	location.reload();
	}
	
	function deleteProd(e)
	{
	var delProdName = document.getElementById('title' + e.target.id).value;
	if(confirm("Are you sure you want to delete product '" + delProdName + "'? This change is permanent.")){
		AjaxGet('../../api/prod/delete.php?id=' + e.target.id, deleteResponse, "async");	
		}
	else {
	}
	}
	
	
		function errorImage(img){
		img.src='../../lib/img/prods/Default-Icon-icon.png';
	}
	
	
	
	/*jsonResp = JSON.parse(response);
	for(var i=0;i<jsonResp.length;i++){
		var obj = jsonResp[i];

		
		shortDesc = obj["Description"].substring(0,65) + "...";
		prodsHTML+='<section id="prod1" class="marginBottom"><img src="lib/img/prods/' + obj["ProdID"] + '.jpg" onError="errorImage(this)" style="width:100px;"/></object><a href="product.php?id=' + obj["ProdID"] + '"><h2>' + obj["Name"] + '</h2></a><p id="productDesc" class="shortProductDesc">' + shortDesc + '</p><p id="categoryNum" class="cat hidden">' + obj["CatID"] + '<p id="prodCategory">' + obj["CatName"] + '</p><aside id="price" class="price">£' + obj["Price"] + '<img src="lib/img/basket.png"/ style="width:50px;"/ alt="Add to basket..."></aside></section>'
		}
	
		document.getElementById('products').innerHTML = prodsHTML; 
		if(catClicked !== undefined && catClicked != null){
			if(catClicked.id != "1"){
				showAndHideProds(null, catClicked);
			}
		}
	}
	*/
	

function addProds(){
var xhr = new XMLHttpRequest();
var url = "../../api/prod/index.php";
var name = document.getElementById("name").value;
var desc = document.getElementById("desc").value;
var price = document.getElementById("price").value;
var stock = document.getElementById("stock").value;
var category = document.getElementById("category").value;
var fields = "name="+name+"&desc="+desc+"&price="+price+"&stock="+stock+"&category="+category;
xhr.open("POST", url, true);
//Send the proper header information along with the request
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

xhr.onreadystatechange = function() {//Call a function when the state changes.
	if(xhr.readyState == 4 && xhr.status == 200) {
		window.alert(xhr.responseText);
		document.getElementById("addprods").reset();
	}
}
xhr.send(fields);
}








//document.getElementById("submitProd").addEventListener("click", addProds);

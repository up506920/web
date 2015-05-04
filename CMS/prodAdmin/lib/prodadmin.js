//Prod Admin Scripts
//Author 506920

var sidebarLinks = document.getElementsByClassName("sidebar")[0].getElementsByTagName("a");

for (var i = 0; i < sidebarLinks.length; i++) {
sidebarLinks[i].addEventListener("click", getForm);
}

function ajaxChooser(){
var clicked = document.querySelector(".sidebar > li:hover> a");
	if(clicked != null && clicked !== undefined){
		if(clicked.hash == "#1"){
			AjaxGet('../../api/catget.php?response=true', makeForm, "async");
		}
		if(clicked.hash == "#2"){
			AjaxGet('../../api/prodget.php', makeForm, "async");
		}
		if(clicked.hash == "#3"){
			AjaxGet('../../api/catget.php?response=true', makeForm, "async");
		}
	}
}

function getForm() {
	ajaxChooser();
	}
  function makeForm(response)
    { 
	var catClicked = document.querySelector(".sidebar > li:hover> a");
	if(catClicked != null && catClicked !== undefined){
		var formHTML = '<h2 id="header">' + catClicked.innerText + '</h2> Loading form...';
		document.getElementById('form').innerHTML = formHTML; 
		formHTML = '<h2 id="header">' + catClicked.innerText + '</h2>';
		if(catClicked.hash == "#1"){
			formHTML+='<form id="addprods" class="cmsform" method="POST"><label for="name">Product Name</label><input type="text" id="name"><br/><label for="desc">Description</label><input type="text" id="desc"><br/><label for="price">Price</label><input type="text" id="price"><br/><label for="stock">Stock</label><input type="text" id="stock"><br/><label for="category">Category</label><Select type="text" id="category"><br/>'
			jsonResp = JSON.parse(response);
			for(var i=1;i<jsonResp.length;i++){
				var obj = jsonResp[i];
				formHTML+='<option value="' + obj["CatID"] + '">' + obj["CatName"] + '</option>';
				}
			formHTML+='</select><br/><br/><button id="submitProd" type="submit">Add Product</button></form>';
			document.getElementById('form').innerHTML = formHTML; 
			document.getElementById("submitProd").addEventListener("click", addProds);
			}
			//STILL TO DO
		else if(catClicked.hash == "#2"){
		jsonResp = JSON.parse(response);
		for(var i=0;i<jsonResp.length;i++){
		var obj = jsonResp[i];
		/*for(var key in obj){
			var attrName = key;
			var attrValue = obj[key];
			}*/
		formHTML+='<section id="prod1" class="marginBottom"><form id="formedit'+ obj["ProdID"] +'" action="../../api/prod/edit.php" method="POST"><img src="../../lib/img/prods/' + obj["ProdID"] + '.jpg" onError="errorImage(this)" style="width:100px;"/></object><label for="title' + obj["ProdID"] + '">Product Name: </label><input type="hidden" name="id" value="'+ obj["ProdID"] + '"><input id="title' + obj["ProdID"] + '" name="title" value="' + obj["Name"] + '"></h2><br/><input id="productDesc" name="productDesc" class="shortProductDesc" value="' + obj["Description"] + '"><label for="stock">Stock</label><input id="stock" name="stock" class="stock" value="' + obj["Stock"] + '"><label for="price" style="float:right">Price</label><input id="price" name="price" class="price" value="' + obj["Price"] + '"><br/><button id="'+ obj["ProdID"] +'" class="editbutton" type="submit">Edit Product</button><button id="'+ obj["ProdID"] +'" class="deletebutton" type="button">Delete Product</button><br/><br/><br/></form></section>';
		document.getElementById('form').innerHTML = formHTML; }
		formHTML+='</form>';
		document.getElementById('form').innerHTML = formHTML; 
		var dels = document.getElementsByClassName("deletebutton");
		for (var i=0; i<dels.length; i++) {
            dels[i].addEventListener('click', deleteProd);
        }
		}
		else if(catClicked.hash == "#3"){
		jsonResp = JSON.parse(response);
		for(var i=1;i<jsonResp.length;i++){
		var obj = jsonResp[i];
		/*for(var key in obj){
			var attrName = key;
			var attrValue = obj[key];
			}*/
		
		formHTML+='<section id="prod1" class="marginBottom"><form action="../../api/editcat.php" method="POST"><input type="hidden" name="catID" value="' + obj["CatID"] + '"><input id="' + obj["CatID"] + '" name="category" value="'+ obj["CatName"] + '"><button id="edit" type="submit">Edit Category</button></form><br/><br/>';
		}
		formHTML+='</select><br/></form><form id="newcatform" action="../../api/editcat.php" method="POST"><input id="newcat" name="newcat" value="New Category Here..."><button id="submitProd" type="submit">Add Category</button></form>';
			document.getElementById('form').innerHTML = formHTML; 
			document.getElementById("newcat").addEventListener("click", addcategory);
		
		document.getElementById('form').innerHTML = formHTML; 
        }
	}
	else{
		var formHTML = '<h2 id="header">Click on the links to the left to do different tasks</h2>';
		document.getElementById('form').innerHTML = formHTML; 
		}
		//Add Products

    }
	
	function addcategory(){
	
	}
	
	
	
	function deleteResponse(response){
	alert(response);
	location.reload();
	}
	
	function deleteProd(e)
	{
	AjaxGet('../../api/prod/delete.php?id=' + e.target.id, deleteResponse, "async");
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

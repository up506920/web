<?php
include( "include/header.php" );
?>
<!--<script src='lib/products.js'> </script>-->
<script src ='lib/ajaxget.js'></script>
<script>

  function makeSmallProds(response)
    { var prodsHTML = '<h2 id="productTypes">All Products</h2>';
	jsonResp = JSON.parse(response);
	for(var i=0;i<jsonResp.length;i++){
		var obj = jsonResp[i];
		/*for(var key in obj){
			var attrName = key;
			var attrValue = obj[key];
			}*/
		shortDesc = obj["Description"].substring(0,100) + "...";
		prodsHTML+='<section id="prod1" class="marginBottom"><img src="lib/img/prods/' + obj["ProdID"] + '.jpg" style="width:100px;"/><a href="product.php?id=' + obj["ProdID"] + '"><h2>' + obj["Name"] + '</h2></a><p id="productDesc" class="shortProductDesc">' + shortDesc + '</p><p id="categoryNum" class="hidden">' + obj["CatID"] + '<p id="prodCategory">Computers > Laptops</p><aside id="price" class="price">' + obj["Price"] + '<img src="lib/img/basket.png"/ style="width:50px;"/ alt="Add to basket..."></aside></section>'
		}
	document.getElementById('products').innerHTML = prodsHTML; }
	


function onLoad() {
	AjaxGet('api/prodget.php', makeSmallProds);
	/*var xhr, target, success, failure;

	target = document.getElementById("products");

	// create a request object
	xhr = new XMLHttpRequest();

	success = function () {
	var jsonResponse = JSON.parse(xhr.responseText);
		var content = '<h2 id="productTypes">All Products</h2>'
		for(var i=0; i<jsonResponse.length; i++) {
			var obj = jsonResponse[i];
			xhr.open("GET", "api/prodget.php?id=" +obj.ProdID, true);
			xhr.onreadystatechange=function() {
        		if (xhr.readyState==4 && xhr.status==200)
				{
					content+=xhr.responseText;
				}
			};
			xhr.send();
			
		}
		target.innerHTML = content;
	};

	failure = function () {
		target.innerHTML = "<p>Something went wrong.</p>";
	};

	// initialise a request, specifying the HTTP method
	// to be used and the URL to be connected to.
	xhr.open("GET", "api/prodget.php?id=" + +obj.ProdID, true);
	xhr.addEventListener("load", success);
	xhr.addEventListener("error", failure);
	xhr.send();
*/
};
window.onload = onLoad



</script>
<section id="content" class="contentcenter">
<nav id="sidebar" class="contentleft">
	<ul class="sidebar">
		<li id="1"><a href="#1">Computers</a>
			<ul class="submenu">
				<li><a href="#">Laptops</a></li>
				<li><a href="#">Desktops</a></li>
				<li><a href="#">Tablets</a></li>
			</ul>
		</li>
		<li id="2"><a href="#2">Cameras</a>
			<ul class="submenu">
				<li><a href="#">SLR</a></li>
				<li><a href="#">Compact</a></li>
			</ul>
		</li>
		<li id="3"><a href="#3">Films</a>
			<ul class="submenu">
				<li><a href="#">Blu-Ray</a></li>
				<li><a href="#">DVD</a></li>
			</ul>
		</li>
		<li id="4"><a href="#4">Sports</a></li>
	</ul>
</nav>
<section id="products" class="contentright productlist">
	<h2 id="productTypes">All Products</h2>
	<?php
include( "include/smallprod.php" );
include( "include/smallprod.php" );
include( "include/smallprod.php" );
include( "include/smallprod.php" );
include( "include/smallprod.php" );
?>
</section>
</section>
</section>
<?php
include( "include/footer.php" );
?>

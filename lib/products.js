//Get product content from PHP
//Written by UP506920. Based on Dr Rich Boakes' Ajax Worksheets.
var pageLoaded;

pageLoaded = function () {
	
	var xhr, target, success, failure;

	target = document.getElementById("products");

	// create a request object
	xhr = new XMLHttpRequest();

	success = function () {
	var jsonResponse = JSON.parse(xhr.responseText);
		var content = '<h2 id="productTypes">All Products</h2>'
		for(var i=0; i<jsonResponse.length; i++) {
			var obj = jsonResponse[i];
			xhr.open("GET", "include/smallprod.php?id=" +obj.ProdID, true);
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
	xhr.open("GET", "api/prodget.php", true);
	xhr.addEventListener("load", success);
	xhr.addEventListener("error", failure);
	xhr.send();

};

window.addEventListener("load", pageLoaded);
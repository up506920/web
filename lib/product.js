//Product scripts
//Author 506920
//With reference to Rich Boakes AJAX worksheets @ http://rjb.soc.port.ac.uk/

var pageLoaded;

pageLoaded = function() {
	var xhr, target, success, failure, prodID;
	
	// find the element that should be updated
	target = document.getElementById("prodName");
	prodID = document.getElementById("ID").innerHTML;
	// create a request object
	xhr = new XMLHttpRequest();

	success = function () {
		target.innerHTML = xhr.responseText;
	};

	failure = function () {
		target.innerHTML = "<p>Something went wrong.</p>";
	};

	// initialise a request, specifying the HTTP method
	// to be used and the URL to be connected to.
	xhr.open("GET", "api/prod/index.php?id=" + prodID, true);
	xhr.addEventListener("load", success);
	xhr.addEventListener("error", failure);
	xhr.send();

};

window.addEventListener("load", pageLoaded);
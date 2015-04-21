//Initialise product.php page
//Author 506920

goHomeAndHighlight = function(){
var catClicked = document.querySelector(".sidebar > li:hover > a");
window.location.href = "index.php?#" + catClicked.id;
}
var sidebarLinks = document.getElementsByClassName("sidebar")[0].getElementsByTagName("a");
var catID = document.getElementById("catid").innerHTML;
var clicked = document.querySelector(".sidebar > li:target > a");
for (var i = 0; i < sidebarLinks.length; i++) {
//detect if category link has been highlighted/added to url already, if not, do it.
if(sidebarLinks[i].id == catID && (clicked == null && window.location.href.indexOf("#") <= -1))
{
	window.location.href = window.location.href + "#" + catID;
}
sidebarLinks[i].addEventListener("click", goHomeAndHighlight);
}
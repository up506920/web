//Taken and edited from Kit Lester's DYNA worksheets
 
function AjaxGet(URL, callback, async)
  { var ajaxObj = new XMLHttpRequest();
  if(async != null && async !== undefined){
    ajaxObj.open("GET", URL, false); 
	}
	else{
	ajaxObj.open("GET", URL, true); 
	}
    ajaxObj.onreadystatechange = function()
      { if (ajaxObj.status == 200)
	    if (ajaxObj.readyState == 4)
		    callback(ajaxObj.responseText);
      };
    ajaxObj.send(null);
  }
  

function AjaxPut(URL, callback, args)
  { var ajaxObj = new XMLHttpRequest();
    ajaxObj.open("POST", URL, true); 
    ajaxObj.onreadystatechange = function()
      { if (ajaxObj.status == 200)
	    if (ajaxObj.readyState == 4)
		callback(ajaxObj.responseText);
      };
    ajaxObj.send(args); 
  }
  
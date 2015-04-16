//Taken and edited from Kit Lester's DYNA worksheets

function AjaxGet(URL, callback)
  { var ajaxObj = new XMLHttpRequest();
    ajaxObj.open("GET", URL, true); // The TRUE implies asynchronous
    ajaxObj.onreadystatechange = function()
      { if (ajaxObj.status == 200)
	    if (ajaxObj.readyState == 4)
		    callback(ajaxObj.responseText);
      };
    ajaxObj.send(null); 
  };
  

function AjaxPut(URL, callback)
  { var ajaxObj = new XMLHttpRequest();
    ajaxObj.open("POST", URL, true); // The TRUE implies asynchronous
    ajaxObj.onreadystatechange = function()
      { if (ajaxObj.status == 200)
	    if (ajaxObj.readyState == 4)
		callback(ajaxObj.responseText);
      };
    ajaxObj.send(null); 
  };
  
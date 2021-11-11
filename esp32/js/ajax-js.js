var xhtmlhttp = requestAjax();
 function requestAjax(){
   if(window.XMLHttpRequest){
	 return new XMLHttpRequest();
	 }else if(window.ActiveXObject){
	 return new ActiveXObject("Microsoft.XMLHTTP");
   }else{
	 return null;
	}
 }

function ajaxSend(){
   xhtmlhttp.onreadystatechange = stateAjax;
   xhtmlhttp.send(null);
   myInteraction(true, 0, 'Mohon Tunggu...');
}

function stateAjax(){
  var ajaxdata = xhtmlhttp.responseText;
  if(xhtmlhttp.readyState==4){
	   if(ajaxdata.length>=1){
	   myInteraction(false,2000,ajaxdata);
		 }else{
		 	myInteraction(false,2000,"Data Tidak Di Temukan");
		}
	}
}
/* ==========================
   Language:javascript/ajax
   Author:na2m
============================= */
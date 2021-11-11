/* =======================================
   showPassword(string,string)
   action:onclik
*/
function showPassword(idpass,idcex){
  var idpa = document.getElementById(idpass);
  var idcx = document.getElementById(idcex);
  var gta = idpa.getAttribute("type");
 if(gta == "password"){
   idpa.setAttribute("type","text");
   idcx.setAttribute("value","HIDEN");
   }else{
	idpa.setAttribute("type","password");
    idcx.setAttribute("value","SHOW");
   }
}
/* *****************
   Language:javascript
   author:na2m*
*/
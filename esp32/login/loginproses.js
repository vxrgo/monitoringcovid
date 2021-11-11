/* =================================
  *type data:inLogin(string,string,int)*
  action:onclick
*/
function inLogin(idla,idlb,addrl){
  var url;
  var idmail = document.getElementById(idla).value;
  var idpass = document.getElementById(idlb).value;
  idmail = idmail.replace(/\s/g,'');
  idpass = idpass.replace(/\s/g,'');
  var ary = [idmail.indexOf('@'),idmail.indexOf('.com'),idmail.indexOf('.co.id')];
  if(idmail == "" || ary[0] == -1 || ary[1] == -1 && ary[2] == -1){
     myInteraction(false,2000,'KETIK EMAIL DENGAN BENAR @xxx.com');
  }
  else if(idpass == "" || idpass.length <= 7){
  myInteraction(false,2000,'MASUKAN PASSWORD MINIMAL 8 KARAKTER DENGAN KOMBINASI ANGKA DAN HURUF');
   }
 else{
  if(addrl == 1){
     /* memproses file proseslogin.php */
     url = "proseslogin.php?prosesloginone="+idmail;
     url = url+"&& proseslogintwo="+idpass;
   }
   else{
     /* memproses file prosessignin.php */
      url = "prosessignin.php?prosesloginone="+idmail;
      url = url+"&& proseslogintwo="+idpass;
   }
  xhtmlhttp.open('GET',url,true);
  ajaxSend();
  }
}
/* *************************************
   Language:javascript*
   Author:na2m*
   Demo:na2m004.000webhostapp.com
************************************** */


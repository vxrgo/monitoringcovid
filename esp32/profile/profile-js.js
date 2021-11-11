/* ===================================
   TypeData:edu(string)
   Action:onClick
 */
function edu(actions) {
 if(actions == 'show-user') {
  $(document).ready(function(){
    $('.ed-mail,.ed-pass').css({display:'none'});
    $('.ed-user').fadeIn('slow');
  });
 }
 else if(actions == 'show-mail'){
  $(document).ready(function(){
    $('.ed-user,.ed-pass').css({display:'none'});
    $('.ed-mail').fadeIn('slow');
  });
 }
 else if(actions == 'show-pass'){
  $(document).ready(function(){
    $('.ed-user,.ed-mail').css({display:'none'});
    $('.ed-pass').fadeIn('slow');
  });
 }
 else{
  myInteraction(false, 3000, 'erorr function edu(?)');
 }
}

/* ===================================
   TypeData:editProfile(string)
   Action:onClick
 */
function editProfile(idp){
   var idt = document.getElementById(idp);
   var gta = idt.getAttribute("type");
if(gta == 'text'){
  if(idt.value == ""){
  myInteraction(false,2000,'Username Masih Kosong');
  }else{
    var url="profile/crudprofile.php?ep="+idt.value;
      url=url+"&&ir=1";
    xhtmlhttp.open('GET',url,true);
    ajaxSend();
    }
}
else if(gta == 'email') {
  var ary = [idt.value.indexOf('@'),idt.value.indexOf('.com'),idt.value.indexOf('.co.id')];
  if(idt.value == "" || ary[0] == -1 || ary[1] == -1 && ary[2] == -1){
     myInteraction(false,2000,'TULIS EMAIL DENGAN BENAR @xxx.com');
  }else{
   var url="profile/crudprofile.php?ep="+idt.value;
        url=url+"&&ir=2";
     xhtmlhttp.open('GET',url,true);
     ajaxSend();
     }
}
else if(gta == 'password'){
  if(idt.value == "" || idt.value.length <= 7){
  myInteraction(false,2000,'MASUKAN PASSWORD MINIMAL 8 KARAKTER DENGAN KOMBINASI ANGKA DAN HURUF');
   }else{
      var url="profile/crudprofile.php?ep=" + idt.value;
      url=url+"&&ir=3";
    xhtmlhttp.open('GET',url,true);
    ajaxSend();
    }
}
else{
  myInteraction(false, 3000, 'erorr parameter editProfile(?)');
 }
}

/* ===================================
   TypeData:deleteUser(null)
   Action:onClick
 */
function deleteUser(){
  var url="profile/crudprofile.php?ep=none";
      url=url+"&&ir=0";
    xhtmlhttp.open('GET',url,true);
    ajaxSend();
}
/* ===================================
   Language:javascript
   Author:na2m
   Demo:na2m444.000webhostapp.com
 */
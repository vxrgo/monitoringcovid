/* ===================================
  *typeData:myValidation(String, Int)*
  action:onKeyup
**/
function myValidation(ident,limits){
	var ab,txt;
	var aa = document.getElementById(ident).value;
      ab = aa.replace(/\s/g,'');
	if(aa.length >= limits){
	document.getElementById(ident).value = ab.substring(0, limits);
		 txt = 'Batas caracter hanya ' + limits;
		 myInteraction(false, 2000, txt);
		}else if (aa.indexOf(' ') >= 0){
      document.getElementById(ident).value = ab;
      txt = 'DO NOT USE SPACE ';
      myInteraction(false, 1000,txt);
    }
}

/* ==============================================
   *TypeData:myInteraction(Boolean, Int, String)*
**/
function myInteraction(imag, timedout, alerted){
	var showImage = '<div align="center" class="preloader"><div class="inloader"></div></div>';
			showImage = showImage + alerted;
 var sch = screen.height;
 var mcc = Math.ceil(sch / 5);
 mcc = mcc+"px";
  $(document).ready(function(){
$(".box_intrac").css({position:"fixed", right:"20px", left:"20px", top:mcc});

	if(imag == true && timedout==0){
	 $(".box_intrac").fadeIn("slow").html(showImage);
   }
   else if(imag == true && timedout>0){
	   $(".box_intrac").fadeIn("slow").html(showImage);
	     setTimeout(function(){
     $(".box_intrac").fadeOut("slow");
    },timedout);
  }
  else if(imag == false && timedout == 0){
	  $(".box_intrac").fadeIn("slow").html(alerted);
	  }
	else if(imag == false && timedout>0){
	   $(".box_intrac").fadeIn("slow").html(alerted);
	     setTimeout(function(){
     $(".box_intrac").fadeOut("slow");
    },timedout);
  }
  });
}

/* ============================================
   *TypeData: myStartUp(int, Int, int, string)*
   action:startup
**/
function myStartUp(tops, bottoms, timeouts, alerted){
  var topss = tops + "px";
  var bottomss = bottoms + "px";
  var showImag='<div align="center" class="preloader"><div class="inloader"></div></div><br />'+alerted;
    $(document).ready(function(){
      $(".box_intrac").fadeIn("slow").html(showImag)
       .css({height:bottomss, position:"fixed", top:topss, right:0, left:0});
      });
    setTimeout(function(){
     $(".box_intrac").fadeOut("slow");
    },timeouts);
}
/* *************************************
   Language:javascript* 
   Author:na2m*
   Demo:na2m004.000webhostapp.com
************************************** */
































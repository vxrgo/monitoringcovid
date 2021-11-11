<?php
session_start();
if(isset($_SESSION['mail_user'])){
  header("location:../index.php");
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <title>login-page</title>
    <meta name="viewport" content="width=device-width,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="login-style.css" />
   
      <script src="../js/jquery-1.11.3.min.js" type="text/javascript"></script>
      <script src="../js/ajax-js.js" type="text/javascript"></script>
      <script src="loginproses.js" type="text/javascript"></script>

    <!-- *showPassword* -->
    <script src="../js/showPassword.js" type="text/javascript"></script>

    <!-- *loader* -->
      <script type="text/javascript" src="../pluginLoader/loader.js"></script>
      <link rel="stylesheet" type="text/css" href="../pluginLoader/loader.css" />
</head>
<body>
  <div align="right" id="header"><strong class="starts">&nbsp;NA2M&nbsp;</strong></div>

    <div id="box_login">
      <div class="login_top" align="center">
        <div class="inboxlog">
        <h2>L&#9865;GIN</h2>
        <form name="frm_login">
        <div class="text_box">           
        <input id="idmaillog" name="mailname_login" type="email" class="input_box" onkeyup="myValidation('idmaillog',40)" placeholder=" example@email" />
        </div>
        <div class="text_box">
        <input id="idpasslog" name="passname_login" type="password" class="input_box" onkeyup="myValidation('idpasslog',40)" placeholder=" * * * * * * *" />
        <input type="button" value="SHOW" class="bat_pas" id="checklog" onclick="showPassword('idpasslog','checklog')" />
        </div>
        <input type="reset" value="RESET" class="btnlog" />
        <input id="idbtnlogin" type="button" value="LOGIN" onclick="inLogin('idmaillog','idpasslog',1)" class="btnlog" />
        </form>
        </div>

        <div class="inboxlog">
        <h2>SIGN-IN</h2>
        <form name="frm_signin">
        <div class="text_box">
        <input id="idmailsign" name="mailname_signin" type="email" class="input_box" onkeyup="myValidation('idmailsign', 40)" placeholder=" example@email" />
        </div>
        <div class="text_box">
        <input id="idpasssign" name="passname_signin" type="password" class="input_box" onkeyup="myValidate('idpasssign', 40)" placeholder=" * * * * * * *" />
        <input type="button" value="SHOW" class="bat_pas" id="checksign" onclick="showPassword('idpasssign','checksign')" />
        </div>
        <input type="reset" value="RESET" class="btnlog" />
        <input id="idbtnsignin" type="button" value="SIGN IN" onclick="inLogin('idmailsign','idpasssign',0)" class="btnlog" />
        </form>
       </div>
      </div>

    </div><!-- *CloseBoxLogin* -->

    <div align="center" class="box_intrac"></div>
    <script type="text/javascript">
      myStartUp(0, 100,2000,'SEDANG MEMUAT HALAMAN');
    </script>
  </body>
<!--
 Language:html
 Author:na2m
 Demo:na2m444.000webhostapp.com
 Vidio:
-->
</html>

<?php
 session_start();
 $_SESSION['mail_user'] = '';
 unset($_SESSION['mail_user']);
 session_unset();
 session_destroy();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
   <head>
   	<title>index</title>
   	<meta name="viewport" content="width=device-width, user-scalable=no" />

    <!-- *jquery-ajax* -->
    <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
   
    <!-- *loader* -->
    <script type="text/javascript" src="pluginLoader/loader.js"></script>
    <link rel="stylesheet" type="text/css" href="pluginLoader/loader.css" />

   </head>
   <body>
   	<div align="center" style="margin-top: 50px;">
   		<a href="login/login.php"><strong>LOGIN KEMBALI</strong></a>
   	<br />
   </div>
   <div align="center" class="box_intrac"></div>
   <script type="text/javascript">
   	myStartUp(0, 100,3000,'berhasil - logout');
   </script>
   </body>
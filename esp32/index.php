<?php
session_start();
if(isset($_SESSION['mail_user'])){
    $mailname = $_SESSION['mail_user'];
    $id_us = $_SESSION['id_user'];
	  }else{
	    $mailname = false;
	    header("location:login/login.php",true,301);
	    exit();
	    }
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
   <head>
   	<title>login-form</title>
   	<meta name="viewport" content="width=device-width, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="profile/profile-style.css" />

    <!-- *jquery-ajax* -->
    <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="js/ajax-js.js" type="text/javascript"></script>

    <!-- *showPassword* -->
    <script src="js/showPassword.js" type="text/javascript"></script>

    <!-- *loader* -->
    <script type="text/javascript" src="pluginLoader/loader.js"></script>
    <link rel="stylesheet" type="text/css" href="pluginLoader/loader.css" />

    <script src="profile/profile-js.js" type="text/javascript"></script>

   </head>
   <body>
    <div style="clear: both;margin-top: 100px;"></div>
    <div align="center" id="headers">
      <h2>WELCOME TO PAGE INDEX</h2>
    </div>

   	<div align="center" class="box-table">
      <a style="text-decoration: none;" href="exit.php"><strong>LOGOUT</strong></a>
   	  <table border="1">
   		<tr bgcolor="#ff0000">
   		  <td>ID</td><td>USER</td>.
   		</tr>
   		<tr>
   		<?php
   		echo '<td>'.$id_us.'</td><td>'.$mailname.'</td>';
   		?>
   		</tr>
   		</table>
    <div align="center" style="margin-top: 10px;">
      <button onclick="edu('show-user')">EDIT USERNAME</button>
      <button onclick="edu('show-mail')">EDIT MAILNAME</button>
      <button onclick="edu('show-pass')">EDIT PASSWORD</button>
      <form name="globe">
      <div class="ed-user">
        <input type="text" onkeyup="myValidation('ideuser',30)" placeholder="EDIT USERNAME" id="ideuser" />
        <button type="button" onclick="editProfile('ideuser')">EDIT</button>
      </div>
      <div class="ed-mail">
        <input type="email" onkeyup="myValidation('idemail',50)" placeholder="EDIT MAILNAME" id="idemail" />
        <button type="button" onclick="editProfile('idemail')">EDIT</button>
      </div>
      <div class="ed-pass">
        <input type="password" onkeyup="myValidation('idepass',30)" placeholder="EDIT PASSWORD" id="idepass" />
        <button type="button" onclick="editProfile('idepass')">EDIT</button>
      </div>
      <button style="margin-top: 5px;" type="button" onclick="deleteUser()">DELETE ACOUNT</button>
      </form>
    </div>
   	</div>

   	<div align="center" class="box-table">
   		<table border="1">
   		<tr bgcolor="#0000ff">
   		  <td>NO</td><td>ID</td><td>NAME</td><td>EMAIL</td><td>PASSWORD</td>
   		</tr>
   		
   	<?php
   		include("configs/connection.php");
      $slc_tbl_acount = "SELECT * FROM tbl_acount ORDER BY id_user DESC";
      $query = $conect -> query($slc_tbl_acount);
    
   		if(mysqli_num_rows($query) > 0){
   		 $no = 1;
   		 while($results = mysqli_fetch_array($query)){
   		  echo '<tr><td>'.$no.'</td><td>'.$results['id_user'].'</td><td>'.$results['name_user'].'</td><td>'.$results['mail_user'].'</td><td>'.$results['pass_user'].'</td></tr>';
   		  $no++;
   		 }
     	}
      mysqli_close($conect);
   	?>
   			
   		</table>
   	</div>
    <div align="center" class="box_intrac"></div>
    <script type="text/javascript">
    	myStartUp(0, 100, 2000, 'MEMUAT HALAMAN');
    </script>
    <!-- 
     Language:html
     Author:na2m
     Demo:na2m444.000webhost.com
     -->
   </body>
  </html>
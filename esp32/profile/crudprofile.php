<?php 
session_start();
$ida = $_SESSION['id_user'];

$acount_edit = strip_tags($_GET['ep']);
$acount_edit = addslashes($acount_edit);
$acount_edit = trim($acount_edit);
$indexrecord = strip_tags($_GET['ir']);
$indexrecord = addslashes($indexrecord);

if($acount_edit){
  include("../configs/connection.php");

  if($indexrecord == 1 || $indexrecord == '1'){
    $updtName = "UPDATE tbl_acount SET name_user='$acount_edit' WHERE id_user='$ida'";
    $userUpdate = $conect -> query($updtName);
      if($userUpdate){
        echo'Nama Berhasil Diubah.<meta http-equiv="refresh" content="0; url=index.php" />';
        }else{
          echo" Coba Kembali. ";
          }
  }
  else if($indexrecord == 2 || $indexrecord == '2'){
    $updtMail ="UPDATE tbl_acount SET mail_user='$acount_edit' WHERE id_user='$ida'";
     $mailUpdate = $conect -> query($updtMail);
      if($mailUpdate){
         echo'Email Berhasil Diubah.<meta http-equiv="refresh" content="0; url=index.php" />';
        }else{
          echo" Coba Kembali. ";
          }
  }
  else if($indexrecord == 3 || $indexrecord == '3'){
    $updtPass ="UPDATE tbl_acount SET pass_user='$acount_edit' WHERE id_user='$ida'";
    $passUpdate = $conect -> query($updtPass);
      if($passUpdate){
        echo'Password Berhasil Diubah.<meta http-equiv="refresh" content="0; url=index.php" />';
        }else{
          echo" Coba Kembali. ";
          }
  }
  else if($indexrecord == 0 || $indexrecord == '0'){
    $delAcount ="DELETE from tbl_acount WHERE id_user='$ida'";
    $dell = $conect -> query($delAcount);
      if($dell){
        $_SESSION['mail_user'] = '';
        unset($_SESSION['mail_user']);
        session_unset();
        session_destroy();
        echo'Acount Berhasil Dihapus.<meta http-equiv="refresh" content="0; url=login/login.php" />';
        }else{
          echo" Coba Kembali. ";
          }
   }
  else{ 
    echo " No Index Record";
  }
  mysqli_close($conect);
 }
 else{ echo " Undefined id "; }
/* ***************
  language:php*
  Author:na2m*
  Demo:na2m004.000webhostapp.com
*/
?>
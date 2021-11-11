<?php
session_start();

$userSignin = strip_tags($_GET['prosesloginone']);
$userSignin = addslashes($userSignin);
$userSignin = trim($userSignin);
$passSignin = strip_tags($_GET['proseslogintwo']);
$passSignin = addslashes($passSignin);
$passSignin = trim($passSignin);
  
if($userSignin && $passSignin){
  /* mengambil file connetion.php */
  include("../configs/connection.php");
  $slctAcount = "SELECT * FROM tbl_acount WHERE mail_user = '$userSignin'";
  $query = $conect -> query($slctAcount);
    if($query->num_rows > 0){
       echo'Email Sudah Terdaftar. ';
      }
  else{
    $cut = substr($userSignin, 0, strpos($userSignin,'@'));
    $insrtAcount = "INSERT INTO tbl_acount (name_user,mail_user,pass_user) VALUES ('$cut','$userSignin','$passSignin')";

    $insrtquery = $conect -> query($insrtAcount);
      if($insrtquery){
         echo'BERHASIL MENYIMPAN DATA, silahkan login untuk melanjutkan';
         } else{
      echo" Gagal Menyimpan Data. ";
     }
   }mysqli_close($conect);
 }else{ echo" Undefined id "; }

/* ============================
   Language : php
   author : na2m
   demo:na2m444.000webhostapp.com 
=============================== */
?>


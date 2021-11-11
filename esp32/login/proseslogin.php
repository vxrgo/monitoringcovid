<?php
session_start();

$userLogin = strip_tags($_GET['prosesloginone']);
$userLogin = addslashes($userLogin);
$userLogin = trim($userLogin);
$passLogin = strip_tags($_GET['proseslogintwo']);
$passLogin = addslashes($passLogin);
$passLogin = trim($passLogin);

if($userLogin && $passLogin){
  /* mengambil connection.php */
  include("../configs/connection.php");
  $slct_tbl_acount = "SELECT * FROM tbl_acount WHERE mail_user = '$userLogin' ";
  $query = $conect -> query($slct_tbl_acount);
  $result = $query -> fetch_array();

  if($query -> num_rows == 0){ echo "Email Belum Terdaftar, silahkan daftar untuk melanjutkan"; }
  else{
    if($passLogin <> $result['pass_user']){ echo " Kata Sandi Salah "; }
    else {
    $_SESSION['id_user'] = $result['id_user'];
    $_SESSION['mail_user'] = $result['mail_user'];
    echo 'WATI...<meta http-equiv="refresh" content="0; url=../home.php" />'; 
    }
  }
mysqli_close($conect);
}
else{
  echo 'user belum terdaftar, silahkan daftar dahulu'; 
}

/* ============================
   file name : proseslogin.php
   language : php
   author : na2m
   demo:na2m444.000webhostapp.com
=============================== */
?>
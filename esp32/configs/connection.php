<?php
 /* local host */
 $servername = "localhost";
 /* masukan user databaase.
   - jika menggunakan xamap isi $db_user dengan 'root'
 */
 $db_user = "root";
 /* masukan nama database */
 $db_name = "nodemcu";
 /* masukan password database */
 $db_pass = "";

 $conect = mysqli_connect($servername,$db_user,$db_pass,$db_name);
 /* =======xamap==========
  $conect = mysqli_connect($servername,$db_pass,$db_user); 
  mysqli_select_db($db_name);
 */

 if(!$conect){
  die("koneksi gagal : ".mysqli_connect_error());
 }

 /* mysqli_close($conect); */
 /* ==============================
    language:php
    author:na2m
    demo:na2m444.000webhostapp.com
    vidio:
 */
 ?>
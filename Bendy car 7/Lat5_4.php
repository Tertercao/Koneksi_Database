<?php 
  //ganti mySQLUserName dengan username dari server mySQL Anda 
  //ganti mySQLPassWord dengan password dari server mySQL Anda 
 
  $mysqli = new mysqli(’localhost’, ’mySQLUserName’,  
                       ’mySQLPassWord’, ’praktikumWeb’); 
 
  $rs = $mysqli->query( "CALL SP_Login('".$username."','".$password."')" ); 
  $row = $rs->fetch_object(); 
  if ($row) 
  { 
    header("location:Lat5_1.php"); 
  } 
  else 
  { 
    echo "Data tidak terdaftar";   
    header('Location: form_login.html'); //nama file form login yang  
  } 
?> 
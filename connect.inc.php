<?php

session_start();
define('siteurl', 'http://localhost/hello/');

 $conn = mysqli_connect('localhost', 'root', '') or die(mysql_error());
 $dbselect= mysqli_select_db($conn, 'sae23') or die(mysql_error());
 ?>
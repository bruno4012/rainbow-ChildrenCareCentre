<!--Creates a connection with the Database-->


<?php
  DEFINE('DB_USER', 'root');
  DEFINE('DB_PASSWORD', '82599506');
  DEFINE('DB_HOST', '127.0.0.1');
  DEFINE('DB_NAME', 'rainbow');
  $db_connection = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)OR
  die("Could not connect to MySQL! ". mysqli_connect_error());
 ?>
<?php
// Turn off all error reporting
error_reporting(0);
?>
<?php
// define('DB_SERVER','localhost');
// define('DB_USER','root');
// define('DB_PASS' ,'');
// define('DB_NAME', 'vetspets');
$con =new mysqli('localhost','root','','vetspets');
// Check connection
if(!$con){
    echo "database not connected";
}
?>
<?php
//this is what is used to connect the mysql database

//usually always localhost unless your databse is on a different server
define('DB_HOST', 'localhost');
//the database name
define('DB_NAME', 'pizza');
//mysql database username
define('DB_USERNAME', 'pizzaAppUser');
//mysql database username's password
define('DB_PASSWORD', 'desiree');

//the mysql connection via the PDO 
$odb = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
?>
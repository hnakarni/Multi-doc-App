<?php

ob_start();
session_start();
$dbhost = "localhost";
$dbuser = 'root';
$dbpass = '';
$dbname = 'doc_app';

$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die("Db not connected");

define('ADMIN_URL',"http://localhost/doctorApp/Admin_panel/");

?>
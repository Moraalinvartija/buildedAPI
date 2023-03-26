<?php

$host = "localhost";            //setting up database connection parameters
$username = "root";
$password = "";
$dbname = "clientapi";

$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn) {

    die("Connection Failed: " . mysqli_connect_error());  //show error message/info if connection cant be made
}


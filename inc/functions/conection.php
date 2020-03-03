<?php 
$servidor = "localhost";
$usr = "root";
$pass = "";
$bd = "curstopia";

$conn = new mysqli($servidor, $usr, $pass, $bd);

if ($conn->connect_error) {
    echo $conn->connect_error;
}

$conn->set_charset('utf8');
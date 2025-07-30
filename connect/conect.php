<?php
$host="localhost";
$username="root";
$password="";
$database="polio_db";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {

    die("data base gagal terkoneksi:" . $conn->connect_error);
}
?>
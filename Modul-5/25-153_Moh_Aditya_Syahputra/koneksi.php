<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "praktikum_penjualan";

try {
    $conn = mysqli_connect($servername, $username, $password, $database);
} catch (mysqli_sql_exception $e) {
    die("connection failed: " . $e->getMessage());
}
?>
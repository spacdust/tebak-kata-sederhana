<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "asah_otak";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

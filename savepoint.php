<?php
include 'db/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = $_POST['nama'];
    $poin = $_POST['poin'];

    if (!empty($nama) && !empty($nama)) {
        $sql = "INSERT INTO point_game (nama_user, total_point) VALUES ('$nama', $poin)";

        // Eksekusi query
        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil disimpan!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Tutup koneksi
        $conn->close();
    } else {
        echo "Nama harus diisi!";
    }
}

header("location: index.php");

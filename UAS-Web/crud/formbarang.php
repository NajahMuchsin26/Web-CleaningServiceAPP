<?php
include "../connection.php";
session_start();
$queryLastId = "SELECT id_barang FROM inventory ORDER BY id_barang DESC LIMIT 1";
$resultLastId = $conn->query($queryLastId);
$lastId = mysqli_fetch_assoc($resultLastId)['id_barang'];

if (isset($_POST['submit'])) {
    $id = $lastId + 1;
    $namaBarang = $_POST['nama_barang'];
    $stokBarang = $_POST['stok_barang'];

    // Memeriksa koneksi database
    if (!$conn) {
        die('Koneksi database gagal: ' . mysqli_connect_error());
    }

    // Menyiapkan pernyataan SQL untuk menginsert data ke tabel yang sesuai dalam database
    $sql = "INSERT INTO inventory (id_barang, nama_barang, stok_barang) 
        VALUES ($id, '$namaBarang', $stokBarang)";
    $result = $conn->query($sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>alert('Data barang berhasil ditambahkan'); window.location.href = '../barang.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Menutup koneksi database
    mysqli_close($conn);
    unset($_POST['submit']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        .schedule-form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="date"],
        input[type="time"],
        input,
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            width: 100%;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="schedule-form">
        <h1>Barang</h1>
        <form method="POST">
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" id="nama_barang" name="nama_barang" required>
            </div>
            <div class="form-group">
                <label for="stok_barang">Stok Barang</label>
                <input type="number" id="stok_barang" name="stok_barang" required>
            </div>
            <button name="submit" type="submit" class="btn btn-success">Simpan Data</button>
        </form>
    </div>
</body>

</html>
<?php
include "../connection.php";
session_start();


if (isset($_POST['submit'])) {
    $jenisService = $_POST['jenis_service'];
    $harga = $_POST['harga'];

    // Memeriksa koneksi database
    if (!$conn) {
        die('Koneksi database gagal: ' . mysqli_connect_error());
    }

    // Menyiapkan pernyataan SQL untuk menginsert data ke tabel yang sesuai dalam database
    $sql = "INSERT INTO service (id_service, jenis_service, harga) 
        VALUES (0, '$jenisService', '$harga')";
    $result = $conn->query($sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>alert('Data service berhasil ditambahkan'); window.location.href = '../servicedata.php'</script>";
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
    <title>Service</title>
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
        <h1>Service</h1>
        <form method="POST">
            <div class="form-group">
                <label for="jenis_service">Jenis Service</label>
                <input type="text" id="jenis_service" name="jenis_service" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" id="harga" name="harga" required>
            </div>
            <button name="submit" type="submit" class="btn btn-success">Simpan Data</button>
        </form>
    </div>
</body>

</html>
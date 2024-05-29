<?php
include "../connection.php";
session_start();
// Mengambil data customer dari database
$query_customer = "SELECT * FROM register where id_role = 3";
$query_inventory = "SELECT * FROM  inventory";
$result_customer = mysqli_query($conn, $query_customer);
$result_inventory = mysqli_query($conn, $query_inventory);

if (isset($_POST['submit'])) {
    // Mengambil nilai yang dikirimkan melalui metode POST
    $tanggal_schedule = $_POST['tanggal_Schedule'];
    $waktu_mulai = $_POST['waktu_mulai'];
    $waktu_selesai = $_POST['waktu_selesai'];
    $id_cleaner = $_POST['id_cleaner'];
    $id_barang = $_POST['id_barang'];

    // Memeriksa koneksi database
    if (!$conn) {
        die('Koneksi database gagal: ' . mysqli_connect_error());
    }

    // Menyiapkan pernyataan SQL untuk menginsert data ke tabel yang sesuai dalam database
    $sql = "INSERT INTO schedule (id_schedule, tanggal_schedule, waktu_mulai, waktu_selesai, id_cleaner, id_barang) 
        VALUES (0, '$tanggal_schedule', '$waktu_mulai', '$waktu_selesai', '$id_cleaner', '$id_barang')";
    $result = $conn->query($sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>alert('pemesanan anda berhasil, silahkan lakukan pembayaran'); window.location.href = '../schedule.php'</script>";
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
    <title>Schedule</title>
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
        <h1>Schedule</h1>
        <form method="POST">
            <div class="form-group">
                <label for="tanggal_Schedule">Tanggal Schedule:</label>
                <input type="date" id="tanggal_Schedule" name="tanggal_Schedule" required>
            </div>
            <div class="form-group">
                <label for="waktu_mulai">Waktu Mulai</label>
                <input type="time" id="waktu_mulai" name="waktu_mulai" required step="any">
            </div>
            <div class="form-group">
                <label for="waktu_selesai">Waktu Selesai</label>
                <input type="time" id="waktu_selesai" name="waktu_selesai" required step="any">
            </div>
            <div class="form-group">
                <label for="id_cleaner">Cleaner</label>
                <select name="id_cleaner" id="id_cleaner">
                    <?php while ($dataCustomer = mysqli_fetch_assoc($result_customer)) {
                        ?>
                        <option value="<?php echo $dataCustomer['id_user'] ?>"><?php echo $dataCustomer['username'] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_barang">Nama Barang</label>
                <select name="id_barang" id="id_barang">
                    <?php while ($dataBarang = mysqli_fetch_assoc($result_inventory)) {
                        ?>
                        <option value="<?php echo $dataBarang['id_barang'] ?>"><?php echo $dataBarang['nama_barang'] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <button name="submit" type="submit" class="btn btn-success">Simpan Data</button>
        </form>
    </div>
</body>

</html>
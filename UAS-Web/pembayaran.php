<?php
session_start();
include "connection.php";
$query = "SELECT id_order FROM orders";
$result_orders = mysqli_query($conn, $query);


if (isset($_POST['submit'])) {
    $tgl_payment = $_POST['tgl_payment'];
    $time_payment = $_POST['time_payment'];
    $payment_method = $_POST['payment_method'];
    $order_id = $_POST['order_id'];
    $file = $_SESSION['file'];

    if (!$conn) {
        die('Koneksi database gagal: ' . mysqli_connect_error());
    }
    $sql = "INSERT INTO orders (tanggal_payment, time_payment, payment_method, order_id, file) 
    VALUES ('$tgl_payment', '$time_payment', '$payment_method', '$order_id', '$file')";

if (mysqli_query($conn, $sql)) {
// echo "<script>";
// echo "alert('pemesanan anda berhasil, silahkan lakukan pembayaran');";
// echo "window.location.href = ('pembayaran.php');";
// echo "</script>";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
unset($_POST['submit']);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            background-color: #fff;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 15px;
            font-size: 14px;
        }

        select {
            height: 34px;
        }

        input[type="file"] {
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<h1>Form Pembayaran</h1>

<form action="process_payment.php" method="POST">
    <?php
    while ($row = mysqli_fetch_assoc($result_orders)) {
        $id_order = $row['id_order'];
        echo "<input type='hidden' name='id_order' value='$id_order'>";
    }
    ?>

    <label for="tgl_payment">Tanggal Pembayaran:</label>
    <input type="date" name="tgl_payment" id="tgl_payment" required><br><br>

    <label for="time_payment">Waktu Pembayaran:</label>
    <input type="time" name="time_payment" id="time_payment" required><br><br>

    <label for="payment_method">Metode Pembayaran:</label>
    <select name="payment_method" id="payment_method" required>
        <option value="transfer_bank">Transfer Bank</option>
        <option value="kartu_kredit">Kartu Kredit</option>
        <option value="e-wallet">E-Wallet</option>
    </select><br><br>

    <label>Upload:</label>
    <input type="file" name="file"><br><br>

    <input type="submit" name="submit" value="Bayar">
</form>
    <!-- <h1>Form Pembayaran</h1>

    <form action="process_payment.php" method="POST">
        <input type="text" name="order_id" value="<?php echo $order_id; ?>">

        <label for="tgl_payment">Tanggal Pembayaran:</label>
        <input type="date" name="tgl_payment" id="tgl_payment" required><br><br>

        <label for="time_payment">Waktu Pembayaran:</label>
        <input type="date" name="time_payment" id="time_payment" required><br><br>

        <label for="metode_pembayaran">Metode Pembayaran:</label>
        <select name="metode_pembayaran" id="metode_pembayaran" required>
            <option value="transfer_bank">Transfer Bank</option>
            <option value="kartu_kredit">Kartu Kredit</option>
            <option value="e-wallet">E-Wallet</option>
        </select><br><br>

        <label>Upload:</label>
        <input type="file" name="file"><br><br>

        <input type="submit" name="submit" value="Bayar">
    </form> -->
</body>
</html>

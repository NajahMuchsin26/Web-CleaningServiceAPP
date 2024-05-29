<?php
include "connection.php";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $alamat = $_POST["alamat"];
    $no_telepon = $_POST["no_telepon"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $id_role = $_POST["role"];

    // Validasi form
    // $errors = array();

    // Jika username telah digunakan
    $query = "SELECT * FROM register WHERE username = '$username'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        echo "<script>";
        echo "alert('Username sudah digunakan. Silakan pilih username lain!');";
        echo "</script>";
    }
    // Jika konfirmasi password tidak cocok
    if ($password !== $confirm_password) {
        echo "<script>";
        echo "alert('Ulangi, password tidak sama!');";
        echo "</script>";
    }

    // Jika tidak ada error, simpan data ke database dan tampilkan dalam tabel
    // if (empty($errors)) {
        // Enkripsi password menggunakan password_hash()
        $md5password = md5($password);

        // Query untuk menyimpan data pengguna ke dalam tabel users
        $insert_query = "INSERT INTO register (username, email, alamat, no_telepon, password, id_role) 
        VALUES ('$username', '$email','$alamat','$no_telepon', '$md5password', '$id_role')";
            
        // Menjalankan query
        if ($conn->query($insert_query) === TRUE) {
        // Menampilkan notifikasi pop-up registrasi berhasil
            echo "<script>";
            echo "alert('Anda Sukses Registrasi!');";
            header("location: login.html");
            echo "</script>";

        }   
    // } 
    // else {
    //     // Menampilkan pesan error menggunakan notifikasi pop-up
    //     foreach ($errors as $error) {
    //         echo "<script>";
    //         echo "alert('$error');";
    //         echo "</script>";
    //     }
    // }
// }
?>

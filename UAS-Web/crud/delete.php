<?php
include_once "connection.php";

$id_service = $_GET['id'];

$query1 = mysqli_query($conn, "DELETE FROM service WHERE id_service = '$id_service'");
$query2 = mysqli_query($conn, "UPDATE produk SET id_service = '1' WHERE id_service = '$id_service'");

if ($query1 && $query2) {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'isi' => 'Kategori berhasil hapus'
    ];
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Kategori gagal hapus'
    ];
}
header('location: ../index.php?page=kategori');

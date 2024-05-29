<?php
include "connection.php";
if (isset($_GET['idOrder'])) {
  $id = $_GET['idOrder'];
  $queryDeleteOrder = "DELETE FROM orders WHERE id_order = $id";
  $resultDeleteOrder = $conn->query($queryDeleteOrder);

  if (mysqli_affected_rows($conn) > 0) {
    echo '<script>alert("Data order berhasil dihapus"); window.location.href = "tampilanorder.php"; </script>';
  } else {
    echo '<script>alert("Data order gagal dihapus"); window.location.href = "tampilanorder.php"; </script>';
  }
}

?>
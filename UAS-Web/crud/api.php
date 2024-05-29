<?php
include '../connection.php';
$action = $_REQUEST['action'];

switch ($action) {
  case 'edit_schedule':
    $id = $_GET['id_schedule'];
    $tanggalSchedule = $_GET['tanggal_schedule'];
    $waktuMulai = $_GET['waktu_mulai'];
    $waktuSelesai = $_GET['waktu_selesai'];

    $queryCleaner = "SELECT * FROM register WHERE id_role = 3";
    $getCleaner = $conn->query($queryCleaner);
    $arrCleaner = [];

    while ($row = mysqli_fetch_assoc($getCleaner)) {
      $arrCleaner[] = $row;
    }

    echo json_encode(
      array(
        'id' => $id,
        'tanggal_schedule' => $tanggalSchedule,
        'waktu_mulai' => $waktuMulai,
        'waktu_selesai' => $waktuSelesai,
        'cleaner' => $arrCleaner,
      )
    );
    break;

  case 'submit_edit_schedule':
    $id = $_GET['id_schedule'];
    $tanggalSchedule = $_GET['tanggal_schedule'];
    $waktuMulai = $_GET['waktu_mulai'];
    $waktuSelesai = $_GET['waktu_selesai'];
    $cleaner = $_GET['cleaner'];

    $queryUpdate = "UPDATE schedule SET tanggal_schedule = '$tanggalSchedule', waktu_mulai = '$waktuMulai', waktu_selesai = '$waktuSelesai', id_cleaner = $cleaner WHERE id_schedule = $id";

    if ($conn->query($queryUpdate) === true) {
      echo 'success';
    } else {
      echo 'failed';
    }
    break;

  case 'submit_delete_schedule':
    $arrID = explode(',', $_GET['id_schedule']);

    foreach ($arrID as $id) {
      $queryDelete = "DELETE FROM schedule WHERE id_schedule = $id";
      $result = $conn->query($queryDelete);
    }

    if (mysqli_affected_rows($conn) > 0) {
      echo 'success';
    } else {
      echo 'failed';
    }
    break;

  case 'delete_all_schedule':
    $queryDelete = "DELETE FROM schedule";
    $result = $conn->query($queryDelete);
    if (mysqli_affected_rows($conn) > 0) {
      echo 'success';
    } else {
      echo 'failed';
    }
    break;

  case 'edit_barang':
    $id = $_GET['id_barang'];
    $stokBarang = $_GET['stok_barang'];

    echo json_encode(
      array(
        'id' => $id,
        'stok_barang' => $stokBarang,
      )
    );
    break;

  case 'submit_edit_barang':
    $id = $_GET['id_barang'];
    $stokBarang = $_GET['stok_barang'];

    $queryUpdate = "UPDATE inventory SET stok_barang = '$stokBarang' WHERE id_barang = $id";

    if ($conn->query($queryUpdate) === true) {
      echo 'success';
    } else {
      echo 'failed';
    }
    break;

  case 'submit_delete_barang':
    $arrID = explode(',', $_GET['id_barang']);

    foreach ($arrID as $id) {
      $queryDelete = "DELETE FROM inventory WHERE id_barang = $id";
      $result = $conn->query($queryDelete);
    }

    if (mysqli_affected_rows($conn) > 0) {
      echo 'success';
    } else {
      echo 'failed';
    }
    break;

  case 'delete_all_barang':
    $queryDelete = "DELETE FROM inventory
WHERE NOT EXISTS (
  SELECT * FROM schedule
  WHERE schedule.id_barang = inventory.id_barang
);";
    $result = $conn->query($queryDelete);
    if (mysqli_affected_rows($conn) > 0) {
      echo 'success';
    } else {
      echo 'failed';
    }
    break;

  case 'edit_service':
    $id = $_GET['id_service'];
    $jenisService = $_GET['jenis_service'];
    $harga = $_GET['harga'];

    echo json_encode(
      array(
        'id' => $id,
        'jenis_service' => $jenisService,
        'harga' => $harga,
      )
    );
    break;

  case 'submit_edit_service':
    $id = $_GET['id_service'];
    $jenisService = $_GET['jenis_service'];
    $harga = $_GET['harga'];

    $queryUpdate = "UPDATE service SET jenis_service = '$jenisService', harga = '$harga' WHERE id_service = $id";

    if ($conn->query($queryUpdate) === true) {
      echo 'success';
    } else {
      echo 'failed';
    }
    break;

  case 'submit_delete_service':
    $arrID = explode(',', $_GET['id_service']);

    foreach ($arrID as $id) {
      $queryDelete = "DELETE FROM service WHERE id_service = $id";
      $result = $conn->query($queryDelete);
    }

    if (mysqli_affected_rows($conn) > 0) {
      echo 'success';
    } else {
      echo 'failed';
    }
    break;

  case 'delete_all_service':
    $queryDelete = "DELETE FROM service
WHERE NOT EXISTS (
  SELECT * FROM orders
  WHERE orders.id_service = service.id_service
);";
    $result = $conn->query($queryDelete);
    if (mysqli_affected_rows($conn) > 0) {
      echo 'success';
    } else {
      echo 'failed';
    }
    break;

  case 'edit_user':
    $id = $_GET['id_user'];
    $alamat = $_GET['alamat'];
    $noTelepon = $_GET['no_telepon'];

    echo json_encode(
      array(
        'id' => $id,
        'alamat' => $alamat,
        'noTelepon' => $noTelepon,
      )
    );
    break;

  case 'submit_edit_user':
    $id = $_GET['id_user'];
    $alamat = $_GET['alamat'];
    $noTelepon = $_GET['no_telepon'];

    $queryUpdate = "UPDATE register SET alamat = '$alamat', no_telepon = '$noTelepon' WHERE id_user = $id";

    if ($conn->query($queryUpdate) === true) {
      echo 'success';
    } else {
      echo 'failed';
    }
    break;

  case 'submit_delete_user':
    $arrID = explode(',', $_GET['id_user']);

    foreach ($arrID as $id) {
      $queryDelete = "DELETE FROM register WHERE id_user = $id";
      $result = $conn->query($queryDelete);
    }

    if (mysqli_affected_rows($conn) > 0) {
      echo 'success';
    } else {
      echo 'failed';
    }
    break;

  case 'delete_all_user':
    $queryDelete = "DELETE FROM register
WHERE NOT EXISTS (
  SELECT * FROM orders
  WHERE orders.id_customer = register.id_user
);";
    $result = $conn->query($queryDelete);
    if (mysqli_affected_rows($conn) > 0) {
      echo 'success';
    } else {
      echo 'failed';
    }
    break;

  case 'download':
    $idPayment = $_GET['id_payment'];
    $queryPayment = "SELECT * FROM payment WHERE id_payment = $idPayment";
    $getPayment = $conn->query($queryPayment);
    $resultPayment = $getPayment->fetch_assoc();
    header("Content-length:" . $resultPayment["size_file"]);
    header("Content-type:" . $resultPayment["type_file"]);
    header("Content-Disposition: attachment; filename=" . $resultPayment["name_file"]);
    ob_clean();
    flush();
    echo $resultPayment["file"];
    break;

  case 'edit_status_order':
    $arrID = explode(',', $_GET['id_order']);

    foreach ($arrID as $id) {
      $queryUpdate = "UPDATE orders SET status = 'success' WHERE id_order = $id";
      $result = $conn->query($queryUpdate);
    }

    if (mysqli_affected_rows($conn) > 0) {
      echo 'success';
    } else {
      echo 'failed';
    }
    break;

  case 'submit_delete_review':
    $arrID = explode(',', $_GET['id_review']);

    foreach ($arrID as $id) {
      $queryDelete = "DELETE FROM review WHERE id_review = $id";
      $result = $conn->query($queryDelete);
    }

    if (mysqli_affected_rows($conn) > 0) {
      echo 'success';
    } else {
      echo 'failed';
    }
    break;

  case 'delete_all_review':
    $queryDelete = "DELETE FROM review";
    $result = $conn->query($queryDelete);
    if (mysqli_affected_rows($conn) > 0) {
      echo 'success';
    } else {
      echo 'failed';
    }
    break;
}

?>
<?php
session_start();

include "connection.php";

$nama = $_SESSION['username'];
$query_user = "SELECT * from register where username='$nama'";
$result = mysqli_query($conn, $query_user);
$id_user;

if ($result && mysqli_num_rows($result) > 0) {
  // Ambil baris pertama dari hasil query
  $row = mysqli_fetch_assoc($result);
  // Ambil ID user
  $id_user = $row['id_user'];
} else {
  echo 'Failed to fetch user ID.';
}

$sql = "SELECT * FROM orders WHERE id_customer = '$id_user'";
$result_order = mysqli_query($conn, $sql);

$sql2 = "SELECT * FROM orders WHERE id_customer = '$id_user'";
$result_order2 = mysqli_query($conn, $sql2);

if (isset($_POST["bayar"])) {
  // Ambil nilai dari formulir
  $tgl_payment = $_POST['tgl_payment'];
  $time_payment = $_POST['time_payment'];
  $id_order = $_POST['id_order']; // Ambil nilai ID Order dari baris yang ditampilkan di formulir
  $fileName = $_FILES['formFile']['name'];
  $fileType = $_FILES['formFile']['type'];
  $typeCut = strstr($fileType, '/');
  $formatType = trim($typeCut, '/');
  $fileSize = $_FILES['formFile']['size'];
  $file = addslashes(file_get_contents($_FILES['formFile']['tmp_name']));

  if ($id_order != '') {
    if ($fileSize > 2097152) {
      echo '<script>alert("Ukuran file terlalu besar, maksimal 2MB!");</script>';
    } else {
      $queryAddPayment = "INSERT INTO payment (id_payment, tanggal_payment, time_payment, id_order, `file`, `type_file`, name_file, size_file) VALUES(0, '$tgl_payment', '$time_payment', '$id_order', '$file', '$formatType', '$fileName', '$fileSize')";
      $resultAddPayment = $conn->query($queryAddPayment);

      $arrIdOrder = explode(',', $id_order);
      foreach ($arrIdOrder as $idOrderSpecific) {
        $queryCheckOrder = "SELECT * FROM orders WHERE id_order = $idOrderSpecific";
        $resultCheckOrder = $conn->query($queryCheckOrder);

        while ($rowIdOrder = mysqli_fetch_assoc($resultCheckOrder)) {
          $getIdOrder = $rowIdOrder['id_order'];
          $queryUpdateStatus = "UPDATE orders SET status = 'success' WHERE id_order = $getIdOrder";
          $resultUpdateStatus = $conn->query($queryUpdateStatus);
        }
      }

      if (mysqli_affected_rows($conn) > 0) {
        echo '<script>alert("Pembayaran berhasil!"); window.location.href = "tampilanorder.php";</script>';
      } else {
        echo '<script>alert("Pembayaran gagal!"); window.location.href = "tampilanorder.php";</script>';
      }
    }
  } else {
    echo '<script>alert("Pilih order yang ingin dibayar terlebih dahulu!")</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Smart Clean :: Order</title>
  <link rel="stylesheet" href="src/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="src/custom.css" />
  <link rel="shortcut icon" href="assets/img/logo2.png" />
  <style>
    table {
      border-collapse: collapse;
      width: 60%;
      margin: 0 auto;
    }

    th,
    td {
      text-align: left;
      padding: 8px;
    }

    th {
      background-color: #4CAF50;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .order-item:not(:first-child) {
      padding-top: 30px;
    }

    .order-item:not(:last-child) {
      border-bottom: 1px solid #ddd;
      padding-bottom: 14px;
    }
  </style>

</head>

<body>
  <!-- HEADER -->
  <section class="w-100 bg-white" style="box-sizing: border-box">
    <div class="header-cleanhome container-xxl mx-auto p-0 position-relative" style="font-family: 'Poppins'">
      <!-- NAVBAR -->
      <nav class="navbar navbar-expand-lg navbar-light">
        <a href="">
          <img src="assets/img/logo2.png" alt="logo" style="margin-right: 0.75rem" width="100" />
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="modal" data-bs-target="#targetModal-item">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MODAL HEADER -->
        <div class="modal-item modal fade" id="targetModal-item" tabindex="-1" role="dialog"
          aria-labelledby="targetModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content bg-white border-0">
              <div class="modal-header border-0" style="padding: 2rem; padding-bottom: 0">
                <a class="modal-tittle" id="targetModalLabel">
                  <img src="assets/img/logo2.png" alt="logo" width="150" style="margin-top: 0.5rem" />
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
              </div>

              <div class="modal-body" style="padding: 2rem; padding-top: 0; padding-bottom: 0">
                <ul class="navbar-nav responsive me-auto mt-2 mt-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about.html">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="product.php">Product</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="blog">Blog</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="tampilanorder.php">Order</a>
                  </li>
                </ul>
              </div>

              <div class="modal-footer border-0 gep-3" style="padding: 2rem; padding-top: 0.75rem">
                <a href="login.html"><button class="btn btn-fill text-white">Log In</button></a>
              </div>
            </div>
          </div>
        </div>
        <!-- MODAL HEADER -->

        <div class="collapse navbar-collapse" id="nabarTogglerDemo">
          <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="product.php">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="tampilanorder.php">Order</a>
            </li>
          </ul>

        </div>
      </nav>
      <!-- NAVBAR -->
      <section class="section">
        <div class="container">

          <div class="row justify-content-center">
            <div class="col-lg-8">
              <h2 class="card-title">Laporan Orders</h2>
              <div class="card">
                <div class="card-body">
                  <?php
                  mysqli_data_seek($result_order, 0);

                  while ($row = mysqli_fetch_assoc($result_order)) {
                    if ($row['status'] == 'pending') {
                      $service_id = $row['id_service'];
                      $sql_service = "SELECT harga FROM service WHERE id_service = $service_id";
                      $result_service = mysqli_query($conn, $sql_service);
                      $service_row = mysqli_fetch_assoc($result_service);
                      $harga = $service_row['harga'];
                      echo "<div class='order-item d-flex align-items-center justify-content-between'>";
                      echo "<div class='d-flex gap-5 align-items-center'>";
                      echo "<input type='checkbox' class='checkbox' value='{$row['id_order']}' style='width: 32px; height: 32px;' data-harga='{$harga}'  />";
                      echo "<div>";
                      echo "<h4>ID Order: " . $row['id_order'] . "</h4>";
                      echo "<p>Tanggal Order: " . $row['tanggal_order'] . "</p>";
                      echo "<p>Waktu Order: " . $row['waktu_order'] . "</p>";
                      echo "<p>Alamat: " . $row['alamat'] . "</p>";
                      // Ambil nama customer dari tabel customer
                      $customer_id = $row['id_customer'];
                      $sql_customer = "SELECT * FROM register WHERE id_user = $customer_id";
                      $result_customer = mysqli_query($conn, $sql_customer);
                      $customer_row = mysqli_fetch_assoc($result_customer);
                      $nama_customer = $customer_row['username'];
                      echo "<p>Nama Customer: " . $nama_customer . "</p>";
                      // Ambil jenis service dari tabel service
                      $service_id = $row['id_service'];
                      $sql_service = "SELECT jenis_service FROM service WHERE id_service = $service_id";
                      $result_service = mysqli_query($conn, $sql_service);
                      $service_row = mysqli_fetch_assoc($result_service);
                      $jenis_service = $service_row['jenis_service'];
                      echo "<p>Jenis Service: " . $jenis_service . "</p>";
                      echo "</div>";
                      echo "</div>";

                      echo "<div class='order-actions d-flex flex-column gap-2'>";
                      echo "<a href='order.php?idOrder={$row['id_order']}' class='btn btn-primary btn-edit' data-order-id='" . $row['id_order'] . "'>Edit</a>";
                      echo "<button class='btn btn-danger btn-delete' data-bs-toggle='modal' data-bs-target='#modalExample{$row['id_order']}' data-order-id='" . $row['id_order'] . "'>Delete</button>";
                      echo "</div>"; // End of order-actions div
                      echo "</div>"; // End of order-item div
                    }
                    ?>

                    <!-- Start Modal data -->
                    <div class="modal fade" id="modalExample<?= $row['id_order'] ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin ingin menghapus data?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-content-custom">
                            <div class="modal-footer justify-content-center">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                aria-label="Close">Tidak</button>
                              <button type="button" name="submit_data" class="btn btn-danger"
                                data-id="<?= $row['id_order'] ?>">Ya, saya yakin</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End Modal data -->
                    <?php
                  }
                  ?>
                </div>
              </div>

            </div>
          </div>
        </div>
    </div>
  </section>


  <br><br>

  <!-- CONTENT -->
  <section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <h2 class="card-title">Payment</h2>
              <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" readonly name="id_order" id="id_order">
                <div class="form-group" style="padding-bottom: 16px">
                  <label for="tgl_payment">Tanggal Payment</label>
                  <input type="date" name="tgl_payment" id="tgl_payment" class="form-control" required />
                </div>
                <div class="form-group" style="padding-bottom: 16px">
                  <label for="time_payment">Time Payment:</label>
                  <input type="time" id="time_payment" name="time_payment" class="form-control" step="any" required />
                </div>
                <?php
                $totalHarga = 0;
                while ($row2 = mysqli_fetch_assoc($result_order2)) {
                  $service_id = $row2['id_service'];
                  $sql_service = "SELECT harga FROM service WHERE id_service = $service_id";
                  $result_service = mysqli_query($conn, $sql_service);
                  $service_row = mysqli_fetch_assoc($result_service);
                  $harga = $service_row['harga'];
                  $totalHarga += $harga;
                }
                ?>
                <div class="form-group" style="padding-bottom: 16px">
                  <label for="total_harga">Total Harga:</label>
                  <input type="text" id="total_harga" name="total_harga" class="form-control" required readonly
                    value="0" />
                </div>
                <div class="row mb-3">
                  <label for="inputNumber">File Upload</label>
                  <div class="col-sm-12">
                    <input class="form-control" type="file" id="formFile" name="formFile" accept="image/*,.pdf"
                      required>
                  </div>
                </div>
                <button class="btn btn-primary" type="submit" name="bayar">Bayar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- CONTENT -->

  <!-- Footer -->
  <section class="h-100 w-100 bg-white" style="box-sizing: border-box">
    <div class="footer-cleanhome container-xxl mx-auto position-relative p-0"
      style="font-family: 'Poppins', sans-serif">
      <div class="list-footer">
        <div class="row gap-md-0 gap-3">
          <div class="col-lg-3 col-md-6">
            <div class="">
              <div class="list-space">
                <img src="assets/img/logo.png" alt="" width="150px" />
              </div>
              <nav class="list-unstyled">
                <li class="list-space">
                  <a href="index.html" class="list-menu">Home</a>
                </li>
                <li class="list-space">
                  <a href="about.html" class="list-menu">About Us</a>
                </li>
                <li class="list-space">
                  <a href="product.html" class="list-menu">Product</a>
                </li>
                <li class="list-space">
                  <a href="contact.html" class="list-menu">Contact</a>
                </li>
              </nav>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <h2 class="footer-text-title">Product</h2>
            <nav class="list-unstyled">
              <li class="list-space">
                <a href="" class="list-menu">Clean Home</a>
              </li>
              <li class="list-space">
                <a href="" class="list-menu">Clean Office</a>
              </li>
            </nav>
          </div>
          <div class="col-lg-3 col-md-6">
            <h2 class="footer-text-title">Company</h2>
            <nav class="list-unstyled">
              <li class="list-space">
                <a href="contact.html" class="list-menu">Contact</a>
              </li>
              <li class="list-space">
                <a href="blog.html" class="list-menu">Blog</a>
              </li>
            </nav>
          </div>
          <div class="col-lg-3 col-md-6">
            <h2 class="footer-text-title">Support</h2>
            <nav class="list-unstyled">
              <li class="list-space">
                <a href="" class="list-menu">Getting Started</a>
              </li>
              <li class="list-space">
                <a href="" class="list-menu">Help Center</a>
              </li>
            </nav>
          </div>
        </div>
      </div>

      <div class="border-color info-footer">
        <div class="">
          <hr class="hr" />
        </div>
        <div class="
              mx-auto
              d-flex
              flex-column flex-lg-row
              align-items-center
              footer-info-space
              gap-4
            ">
          <div class="d-flex align-items-center gap-4">logo social media</div>
          <nav class="
                mx-auto
                d-flex
                flex-wrap
                align-items-center
                justify-content-center
                gap-4
              ">
            <a href="" class="footer-link" style="text-decoration: none">Terms of Service</a>
            <span>|</span>
            <a href="" class="footer-link" style="text-decoration: none">Privacy Policy</a>
          </nav>
          <nav class="
                d-flex
                flex-lg-row flex-column
                align-items-center
                justify-content-center
              ">
            <p style="margin: 0">Copyright © 2023 SmartClean</p>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!-- Footer -->

  <script src="src/bootstrap/js/bootstrap.min.js"></script>
  <script>
    const deletesOrder = document.querySelectorAll('[name="submit_data"]');
    deletesOrder.forEach(deleteOrder => {
      deleteOrder.addEventListener('click', function () {
        const id = deleteOrder.dataset.id;
        window.location.href = `delete_order.php?idOrder=${id}`;
      })
    })

    const checkboxes = document.querySelectorAll('.checkbox');
    const inputTotalHarga = document.getElementById('total_harga');
    const inputIdOrder = document.getElementById('id_order');
    let totalHarga = 0;
    checkboxes.forEach(checkbox => {
      checkbox.addEventListener('change', function () {
        const totalHargaChecked = checkbox.dataset.harga;

        if (checkbox.checked) {
          totalHarga += parseInt(totalHargaChecked);

          if (inputIdOrder.value === "") {
            inputIdOrder.value = checkbox.value;
          } else {
            inputIdOrder.value += "," + checkbox.value;
          }
        } else {
          const inputValues = inputIdOrder.value.split(',');
          const index = inputValues.indexOf(checkbox.value);
          if (index !== -1) {
            inputValues.splice(index, 1);
            inputIdOrder.value = inputValues.join(",");
          }

          totalHarga -= parseInt(totalHargaChecked);
        }

        inputTotalHarga.value = totalHarga;
      })
    })
  </script>
</body>

</html>
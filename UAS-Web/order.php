<?php
include "connection.php";
session_start();
$nama = $_SESSION['username'];

// Mengambil data customer dari database
$query_customer = "SELECT * FROM register where id_role = 2";
$query_service = "SELECT * FROM service ";
$query_user = "SELECT * from register where username='$nama'";
$result_customer = mysqli_query($conn, $query_customer);
$result_service = mysqli_query($conn, $query_service);
$result = mysqli_query($conn, $query_user);


if (isset($_POST['submit'])) {
  // Mengambil nilai yang dikirimkan melalui metode POST
  $tanggal_order = $_POST['tanggal_order'];
  $waktu_order = $_POST['waktu_order'];
  $alamat = $_POST['alamat'];
  $id_customer = $_POST['id_user'];
  $id_service = $_POST['id_service'];
  // $status = $_POST['status'];


  // Memeriksa koneksi database
  if (!$conn) {
    die('Koneksi database gagal: ' . mysqli_connect_error());
  }

  // Menyiapkan pernyataan SQL untuk menginsert data ke tabel yang sesuai dalam database
  $sql = "INSERT INTO orders (tanggal_order, waktu_order, alamat, id_customer, id_service, status) 
        VALUES ('$tanggal_order', '$waktu_order', '$alamat', '$id_customer', '$id_service', 'pending')";

  if (mysqli_query($conn, $sql)) {
    echo "<script>";
    echo "alert('pemesanan anda berhasil, silahkan lakukan pembayaran');";
    echo "window.location.href = ('tampilanorder.php');";
    echo "</script>";
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
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Smart Clean :: Order</title>
  <link rel="stylesheet" href="src/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="src/custom.css" />
  <link rel="shortcut icon" href="assets/img/logo2.png" />
</head>

<body>
  <!-- HEADER -->
  <section class="h-100 w-100 bg-white" style="box-sizing: border-box">
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
                  <li class="nav-item ">
                    <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="about.html">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="product.php">Product</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="blog">Blog</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
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
              <a class="nav-link active" href="product.php">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          </ul>

        </div>
      </nav>
      <!-- NAVBAR -->

      <!-- CONTENT -->
      <section class="section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="card">
                <?php if (isset($_GET['idOrder']) && isset($_SESSION['id_role']) && $_SESSION['id_role'] == 2):
                  $idOrder = $_GET['idOrder'];
                  $queryOrder = "SELECT * FROM orders WHERE id_order = $idOrder";
                  $resultOrder = $conn->query($queryOrder);
                  $dataOrder = mysqli_fetch_assoc($resultOrder);

                  if (isset($_POST['submit_edit'])) {
                    $idCustomer = $_POST['id_customer'];
                    $tanggalOrder = $_POST['tanggal_order'];
                    $waktuOrder = $_POST['waktu_order'];
                    $alamat = $_POST['alamat'];
                    $service = $_POST['id_service'];

                    $queryUpdateOrder = "UPDATE orders SET tanggal_order = '$tanggalOrder', waktu_order = '$waktuOrder', alamat = '$alamat', id_service = $service, id_customer = $idCustomer WHERE id_order =  $idOrder";
                    $resultUpdateOrder = $conn->query($queryUpdateOrder);

                    if (mysqli_affected_rows($conn) > 0) {
                      echo '<script>alert("Data order berhasil diubah"); window.location.href = "tampilanorder.php"; </script>';
                    } else {
                      echo '<script>alert("Data order gagal diubah"); window.location.href = "tampilanorder.php"; </script>';
                    }
                  }
                  ?>
                  <?php if ($dataOrder != null): ?>
                    <div class="card-body">
                      <h2 class="card-title">Edit Orders</h2>
                      <form action="" method="POST">
                        <input type="hidden" value="<?= $dataOrder['id_order'] ?>" name="id_order">
                        <input type="hidden" value="<?= $dataOrder['id_customer'] ?>" name="id_customer">
                        <div class="form-group">
                          <label for="tanggal_order">Date:</label>
                          <input id="tanggal_order" name="tanggal_order" type="date" class="form-control" required
                            value="<?= $dataOrder['tanggal_order'] ?>" />
                        </div>
                        <div class="form-group">
                          <label for="waktu_order">Time:</label>
                          <input type="time" id="waktu_order" name="waktu_order" class="form-control" required
                            value="<?= $dataOrder['waktu_order'] ?>" step="any" />
                        </div>
                        <div class="form-group">
                          <label for="alamat">Address:</label>
                          <input id="alamat" name="alamat" type="text" class="form-control" placeholder="Input your address"
                            value="<?= $dataOrder['alamat'] ?>" required />
                        </div>
                        <div class="form-group">
                          <label for="id_customer">Name:</label>
                          <input id="id_customer" name="nama_customer" class="form-control" rows="5" value="<?php
                          echo "$nama";
                          ?>" />
                        </div>
                        <div class="form-group">
                          <label for="id_service">Jenis:</label>
                          <select id="id_service" name="id_service" class="form-control" rows="5" required>
                            <?php while ($row_service = mysqli_fetch_assoc($result_service)): ?>
                              <?php if ($row_service['id_service'] == $dataOrder['id_service']): ?>
                                <option value="<?= $row_service['id_service'] ?>" selected><?= $row_service['jenis_service'] ?>
                                </option>
                              <?php else: ?>
                                <option value="<?= $row_service['id_service'] ?>"><?= $row_service['jenis_service'] ?></option>
                              <?php endif; ?>
                            <?php endwhile; ?>
                            <?php
                            ?>
                          </select>
                        </div><br>
                        <button class="btn btn-primary" type="submit" name="submit_edit">Submit</button>
                      </form>
                    <?php endif; ?>
                  </div>
                <?php else: ?>
                  <div class="card-body">
                    <h2 class="card-title">Orders</h2>
                    <form action="" method="POST">
                      <?php
                      // Periksa apakah query berhasil dieksekusi dan ada baris yang dikembalikan
                      if ($result && mysqli_num_rows($result) > 0) {
                        // Ambil baris pertama dari hasil query
                        $row = mysqli_fetch_assoc($result);
                        // Ambil ID user
                        $id_user = $row['id_user'];
                        // Simpan ID user pada input hidden
                        echo '<input type="hidden" id="id_user" name="id_user" value="' . $id_user . '">';
                      } else {
                        echo 'Failed to fetch user ID.';
                      }
                      ?>
                      <div class="form-group">
                        <label for="tanggal_order">Date:</label>
                        <input id="tanggal_order" name="tanggal_order" type="date" class="form-control" required />
                      </div>
                      <div class="form-group">
                        <label for="waktu_order">Time:</label>
                        <input type="time" id="waktu_order" name="waktu_order" class="form-control" required step="any" />
                      </div>
                      <div class="form-group">
                        <label for="alamat">Address:</label>
                        <input id="alamat" name="alamat" type="text" class="form-control" placeholder="Input your address"
                          required />
                      </div>
                      <div class="form-group">
                        <label for="id_customer">Name:</label>
                        <input id="id_customer" name="nama_customer" class="form-control" rows="5" value="<?php
                        echo "$nama";
                        ?>" />
                      </div>
                      <div class="form-group">
                        <label for="id_service">Jenis:</label>
                        <select id="id_service" name="id_service" class="form-control" rows="5" required>
                          <?php
                          while ($row_service = mysqli_fetch_assoc($result_service)) {
                            echo '<option value="' . $row_service['id_service'] . '">' . $row_service['jenis_service'] . '</option>';
                          }
                          ?>
                        </select>
                      </div><br>
                      <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    </form>
                  </div>
                <?php endif; ?>

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
</body>

</html>
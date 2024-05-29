<?php
session_start();
include "connection.php";
$query = "SELECT * FROM payment";
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
      <div
        class="header-cleanhome container-xxl mx-auto p-0 position-relative"
        style="font-family: 'Poppins'"
      >
         <!-- NAVBAR -->
         <nav class="navbar navbar-expand-lg navbar-light">
          <a href="">
            <img
              src="assets/img/logo2.png"
              alt="logo"
              style="margin-right: 0.75rem"
              width="100"
            />
          </a>
          <button
            class="navbar-toggler border-0"
            type="button"
            data-bs-toggle="modal"
            data-bs-target="#targetModal-item"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- MODAL HEADER -->
          <div
            class="modal-item modal fade"
            id="targetModal-item"
            tabindex="-1"
            role="dialog"
            aria-labelledby="targetModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog" role="document">
              <div class="modal-content bg-white border-0">
                <div
                  class="modal-header border-0"
                  style="padding: 2rem; padding-bottom: 0"
                >
                  <a class="modal-tittle" id="targetModalLabel">
                    <img
                      src="assets/img/logo2.png"
                      alt="logo"
                      width="150"
                      style="margin-top: 0.5rem"
                    />
                  </a>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="close"
                  ></button>
                </div>

                <div
                  class="modal-body"
                  style="padding: 2rem; padding-top: 0; padding-bottom: 0"
                >
                  <ul class="navbar-nav responsive me-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="about.html">About Us</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="product.html">Product</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="blog">Blog</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                  </ul>
                </div>

                <div
                  class="modal-footer border-0 gep-3"
                  style="padding: 2rem; padding-top: 0.75rem"
                >
                  <a href="login.html"><button class="btn btn-fill text-white">Log In</button></a>
                </div>
              </div>
            </div>
          </div>
          <!-- MODAL HEADER -->

          <div class="collapse navbar-collapse" id="nabarTogglerDemo">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="product.html">Product</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="blog">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact</a>
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
          <div class="card-body">
            <h2 class="card-title">Payment</h2>
            <form>
              <div class="form-group" style="padding-bottom: 16px">
                <label for="tgl_payment">Tanggal Payment</label>
                <input type="date" name="tgl_payment" id="tgl_payment" class="form-control" required />
              </div>
              <div class="form-group" style="padding-bottom: 16px">
                <label for="time_payment">Time Payment:</label>
                <input type="time" id="time_payment" name="time_payment" class="form-control" required />
              </div>
              <div class="row mb-3">
                <label for="inputNumber">File Upload</label>
                <div class="col-sm-12">
                  <input class="form-control" type="file" id="formFile">
                </div>
              </div>
              <button class="btn btn-primary" type="submit">Submit</button>
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
      <div
        class="footer-cleanhome container-xxl mx-auto position-relative p-0"
        style="font-family: 'Poppins', sans-serif"
      >
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
          <div
            class="
              mx-auto
              d-flex
              flex-column flex-lg-row
              align-items-center
              footer-info-space
              gap-4
            "
          >
            <div class="d-flex align-items-center gap-4">logo social media</div>
            <nav
              class="
                mx-auto
                d-flex
                flex-wrap
                align-items-center
                justify-content-center
                gap-4
              "
            >
              <a href="" class="footer-link" style="text-decoration: none"
                >Terms of Service</a
              >
              <span>|</span>
              <a href="" class="footer-link" style="text-decoration: none"
                >Privacy Policy</a
              >
            </nav>
            <nav
              class="
                d-flex
                flex-lg-row flex-column
                align-items-center
                justify-content-center
              "
            >
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

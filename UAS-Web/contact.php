<?php
include "connection.php";

session_start();


if (isset($_POST['submit_review'])) {
  $saveIdCustomer = $_POST['id_customer'];
  $saveIdPayment = $_POST['id_payment'];
  $name = $_POST['fullname'];
  $messageReview = $_POST['message_review'];
  $rating = $_POST['rating_value'];

  $queryInsertReview = "INSERT INTO review (id_review, isi_review, waktu_review, id_customer, id_payment, rating) VALUES(0, '$messageReview', NOW(), $saveIdCustomer, $saveIdPayment, $rating)";
  $resultInsertReview = $conn->query($queryInsertReview);

  if (mysqli_affected_rows($conn) > 0) {
    echo '<script>alert("Review anda berhasil diterima, terimakasih!"); window.location.href = "contact.php";</script>';
  } else {
    echo '<script>alert("Review anda gagal diterima!"); window.location.href = "contact.php";</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Smart Clean :: Contact</title>
  <link rel="stylesheet" href="src/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="src/custom.css" />
  <link rel="shortcut icon" href="assets/img/logo2.png" />

  <style>
    .rating {
      display: flex;
      width: 100%;
      justify-content: start;
      overflow: hidden;
      flex-direction: row-reverse;
      position: relative;

    }

    .rating>input {
      display: none;
    }

    .rating>label {
      cursor: pointer;
      width: 40px;
      height: 40px;
      margin-top: auto;
      background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
      background-repeat: no-repeat;
      background-position: center;
      background-size: 76%;
      transition: .3s;
    }

    .rating>input:checked~label,
    .rating>input:checked~label~label {
      background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23fcd93a' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
    }


    .rating>input:not(:checked)~label:hover,
    .rating>input:not(:checked)~label:hover~label {
      background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23d8b11e' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
    }
  </style>
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
            <div class="modal-content bg--white border-0">
              <div class="modal-header border-0" style="padding: 2rem; padding-bottom: 0">
                <a class="modal-tittle" id="targetModalLabel">
                  <img src="assets/img/logo2.png" alt="logo" width="150" style="margin-top: 0.5rem" />
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
              </div>

              <div class="modal-body" style="padding: 2rem; padding-top: 0; padding-bottom: 0">
                <ul class="navbar-nav responsive me-auto mt-2 mt-lg-0">
                  <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about.html">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="product.php">Product</a>
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
          <ul class="navbar-nav responsive me-auto mt-2 mt-lg-0">
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="product.php">Product</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="tampilanorder.php">Order</a>
            </li>
          </ul>
          <div class="gap-3">
            <a href="login.html"><button class="btn btn-fill text-white">Log In</button></a>
          </div>
        </div>
      </nav>
      <!-- NAVBAR -->
    </div>
  </section>
  <!-- HEADER -->

  <!-- CONTENT -->
  <section class="h-100 w-100 bg-white" style="box-sizing: border-box">
    <div class="content-cleanhome container-xxl mx-auto position-relative" style="font-family: 'Poppins'">
      <!-- Map -->
      <div style="position: relative; overflow: hidden; width: 100%">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.122388972764!2d106.9225522145888!3d-6.24759889547773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698ce7503803bd%3A0x121ae674658857f!2sWebHozz%20Kalimalang%20%7C%20Kursus%20Website%20PHP%20Android!5e0!3m2!1sid!2sid!4v1628393119248!5m2!1sid!2sid"
          width="100%" height="450" style="border: 0; width: 100%; height: 100%" allowfullscreen=""
          loading="lazy"></iframe>
      </div>
      <!-- Map -->
      <div class="row">
        <!-- Contact -->
        <div class="flex-column col-lg-6">
          <h2 class="title-text">Contact Us</h2>
          <form>
            <div class="form-group" style="padding-bottom: 16px">
              <label>Name :</label>
              <input type="text" class="form-control" placeholder="Input your name ..." required />
            </div>
            <div class="form-group" style="padding-bottom: 16px">
              <label>Email :</label>
              <input type="text" class="form-control" placeholder="Input your email ..." required />
            </div>
            <div class="form-group" style="padding-bottom: 16px">
              <label>Phone :</label>
              <input type="text" class="form-control" placeholder="Input your phone number ..." required />
            </div>
            <div class="form-group" style="padding-bottom: 16px">
              <label>Massage :</label>
              <textarea class="form-control" name="massage" rows="5" placeholder="Input your massage ..."></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
          </form>
        </div>
        <!-- Contact -->

        <!-- Review -->
        <?php if (isset($_SESSION['id_role']) && $_SESSION['id_role'] == 2): ?>
          <?php
          $registerUsername = $_SESSION['username'];
          $registerAlamat = $_SESSION['alamat'];
          $registerNoTelepon = $_SESSION['no_telepon'];
          $queryCustomer = "SELECT * FROM register WHERE username = '$registerUsername' AND alamat = '$registerAlamat' AND no_telepon = '$registerNoTelepon' LIMIT 1";
          $resultCustomer = $conn->query($queryCustomer);
          $idCustomer = mysqli_fetch_assoc($resultCustomer)['id_user'];

          $queryOrders = "SELECT * FROM orders WHERE id_customer = $idCustomer AND status ='success' LIMIT 1";
          $resultOrders = $conn->query($queryOrders);
          $dataOrder = mysqli_fetch_assoc($resultOrders);

          $idOrder = $dataOrder['id_order'];
          $queryPayment = "SELECT * FROM payment WHERE id_order = $idOrder";
          $resultPayment = $conn->query($queryPayment);
          $idPayment = mysqli_fetch_assoc($resultPayment)['id_payment'];
          ?>

          <?php if ($dataOrder != null): ?>
            <div class="flex-column col-lg-6">
              <h2 class="title-text">Review</h2>
              <form class="form-review" method="POST">
                <input type="hidden" value="<?= $idCustomer ?>" name="id_customer">
                <input type="hidden" value="<?= $idPayment ?>" name="id_payment">
                <div class="form-group" style="padding-bottom: 16px">
                  <label>Name:</label>
                  <input type="text" class="form-control" placeholder="Input your name ..." required name="fullname" />
                </div>
                <div class="form-group" style="padding-bottom: 16px">
                  <label>Message Review:</label>
                  <textarea class="form-control" name="message_review" rows="5"
                    placeholder="Input your message ..."></textarea>
                </div>
                <div class="form-group" style="padding-bottom: 16px">
                  <input type="text" hidden name="rating_value" id="rating_value" value="0">
                  <label>Rating:</label>
                  <div class="ratingCard">
                    <div class="rating">
                      <input type="radio" name="rating" id="rating-5" data-rating="5">
                      <label for="rating-5"></label>
                      <input type="radio" name="rating" id="rating-4" data-rating="4">
                      <label for="rating-4"></label>
                      <input type="radio" name="rating" id="rating-3" data-rating="3">
                      <label for="rating-3"></label>
                      <input type="radio" name="rating" id="rating-2" data-rating="2">
                      <label for="rating-2"></label>
                      <input type="radio" name="rating" id="rating-1" data-rating="1">
                      <label for="rating-1"></label>
                      <input type="radio" name="rating" id="rating-0">
                    </div>
                  </div>
                </div>
                <button class="btn btn-primary" type="submit" name="submit_review">Submit</button>
              </form>
            </div>
          <?php endif; ?>
        <?php endif; ?>
        <!-- End Review -->
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
    const ratings = document.querySelectorAll('[name="rating"]');
    const inputValueRating = document.getElementById('rating_value');
    ratings.forEach(rating => {
      rating.addEventListener('click', function () {
        const valueRating = rating.dataset.rating;
        console.log(valueRating);
        inputValueRating.setAttribute('value', valueRating);
      })
    })
  </script>
</body>

</html>
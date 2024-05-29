<?php
session_start();
$login = $_SESSION['login'] ?? "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Smart Clean :: Product</title>
  <link rel="stylesheet" href="src/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="src/custom.css" />
  <link rel="stylesheet" href="src/aos/aos.css" />
  <link rel="shortcut icon" href="assets/img/logo2.png">
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
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about.html">About Us</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="product.html">Product</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                  </li>
                  <li class="nav-item ">
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
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="product.php">Product</a>
            </li>
            <li class="nav-item">
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

      <!-- Hero -->
      <div class="mx-auto d-flex flex-lg-row flex-column hero">
        <!-- Left Column -->
        <div class="
                left-column
                d-flex
                flex-lg-grow-1 flex-column
                align-items-lg-start
                text-lg-start
                align-items-center
                text-center
              ">
          <h3 class="title-text-big" data-aos="fade-right" data-aos-delay="300">Find Our Products!</h3>
          <p data-aos="fade-right" data-aos-delay="600">
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy
            text ever since the 1500s, when an unknown printer took a galley
            of type and scrambled it to make a type specimen book. It has
            survived not only five centuries,
          </p>
          <div class="
                  d-flex
                  flex-sm-row flex-column
                  align-items-center
                  mx-lg-0 mx-auto
                  justify-content-center
                  gap-3
                "></div>
        </div>
        <!-- Left Column -->

        <!-- Right Column -->
        <div class="
                right-column
                text-center
                d-flex
                justify-content-lg-end justify-content-center
                pe-0
              " data-aos="fade-left" data-aos-delay="1200">
          <img src="assets/img/product.jpg" alt="Our Product" id="img-fluid" class="h-auto mw-100"
            style="border-radius: 30px" />
        </div>
        <!-- Right Column -->
      </div>
    </div>
    <!-- Hero -->
    </div>
  </section>
  <!-- HEADER -->

  <!-- CONTENT -->
  <?php if (isset($_SESSION['id_role']) && $_SESSION['id_role'] == 2): ?>
    <section class="h-100 w-100 bg-white" style="box-sizing: border-box ">
      <div class="
          content-price
          overflow-hidden
          container-xxl
          mx-auto
          position-relative
        " style="font-family: 'Poppins'">
        <div class="container mx-auto">
          <div class="d-flex flex-column text-center w-100" style="margin-bottom: 2rem">
            <h2 class="title-text">Our Product</h2>
            <p class="caption-text mx-auto">
              Choose one of our friendly pricing that suitable <br />
              for you place to clean an hygiene
            </p>
          </div>
          <div class="d-flex flex-wrap">

            <!-- Custom -->
            <div class="mx-auto card-item position-relative" data-aos="fade-up" data-aos-delay="1800">
              <div class="
                  card-item-outline
                  d-flex
                  flex-column
                  postion-relative
                  overflow-hidden
                  h-100
                " style="background-color: #2e3a53">
                <h2 class="price-title text-white">Dapur</h2>
                <h2 class="price-value d-flex align-items-center text-white">
                </h2>
                <img class="img-fluid" src="assets/img/logo2.png" alt="" />
                <p class="price-caption" style="color: #7987a6">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <?php
                if ($login != "login") {
                  echo '
              <a href="login.html">
                <button 
                  class="
                    btn btn-outline
                    d-flex
                    justify-content-center
                    align-items-center
                    w-100
                  "
                >
                  order
                </button>
              </a>
            ';
                } else {
                  echo '
              <a href="order.php">
                <button 
                  class="
                    btn btn-outline
                    d-flex
                    justify-content-center
                    align-items-center
                    w-100
                  "
                >
                  order
                </button>
              </a>
            ';
                }
                ?>
                <!-- <button
                    class="
                      btn btn-outline
                      d-flex
                      justify-content-center
                      align-items-center
                      w-100
                    "
                  >
                    Choose Plan
                  </button> -->
              </div>
            </div>
            <!-- Custom -->

            <!-- Custom -->
            <div class="mx-auto card-item position-relative" data-aos="fade-up" data-aos-delay="1800">
              <div class="
                    card-item-outline
                    d-flex
                    flex-column
                    postion-relative
                    overflow-hidden
                    h-100
                  " style="background-color: #2e3a53">
                <h2 class="price-title text-white">Dapur</h2>
                <h2 class="price-value d-flex align-items-center text-white">
                </h2>
                <img class="img-fluid" src="assets/img/logo2.png" alt="" />
                <p class="price-caption" style="color: #7987a6">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <div class="price-list">

                </div>
                <?php
                if ($login != "login") {
                  echo '
              <a href="login.html">
                <button 
                  class="
                    btn btn-outline
                    d-flex
                    justify-content-center
                    align-items-center
                    w-100
                  "
                >
                  order
                </button>
              </a>
            ';
                } else {
                  echo '
              <a href="order.php">
                <button 
                  class="
                    btn btn-outline
                    d-flex
                    justify-content-center
                    align-items-center
                    w-100
                  "
                >
                  order
                </button>
              </a>
            ';
                }
                ?>
                <!-- <button
                    class="
                      btn btn-outline
                      d-flex
                      justify-content-center
                      align-items-center
                      w-100
                    "
                  >
                    Choose Plan
                  </button> -->
              </div>
            </div>
            <!-- Custom -->

            <!-- Custom -->
            <div class="mx-auto card-item position-relative" data-aos="fade-up" data-aos-delay="1800">
              <div class="
                    card-item-outline
                    d-flex
                    flex-column
                    postion-relative
                    overflow-hidden
                    h-100
                  " style="background-color: #2e3a53">
                <h2 class="price-title text-white">Dapur</h2>
                <h2 class="price-value d-flex align-items-center text-white">
                </h2>
                <img class="img-fluid" src="assets/img/logo2.png" alt="" />
                <p class="price-caption" style="color: #7987a6">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <div class="price-list">

                </div>
                <?php
                if ($login != "login") {
                  echo '
              <a href="login.html">
                <button 
                  class="
                    btn btn-outline
                    d-flex
                    justify-content-center
                    align-items-center
                    w-100
                  "
                >
                  order
                </button>
              </a>
            ';
                } else {
                  echo '
              <a href="order.php">
                <button 
                  class="
                    btn btn-outline
                    d-flex
                    justify-content-center
                    align-items-center
                    w-100
                  "
                >
                  order
                </button>
              </a>
            ';
                }
                ?>
                <!-- <button
                    class="
                      btn btn-outline
                      d-flex
                      justify-content-center
                      align-items-center
                      w-100
                    "
                  >
                    Choose Plan
                  </button> -->
              </div>
            </div>
            <!-- Custom -->
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
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
            <p style="margin: 0">Copyright © 2023 smartClean</p>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!-- Footer -->
  <script src="src/bootstrap/js/bootstrap.min.js"></script>
  <script src="src/aos/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>
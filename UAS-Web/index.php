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
    <title>Smart Clean :: Home</title>
    <link rel="stylesheet" href="src/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="src/custom.css" />
    <link rel="stylesheet" href="src/aos/aos.css" />
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
                      <a class="nav-link" href="product.php">Product</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="contact.php">Contact</a>
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
                    <li class="nav-item ">
                <a class="nav-link" href="tampilanorder.php">Order</a>
            </li>
                  </ul>
            <?php
            if($login != "login"){
              echo '
              <div class="gap-3">
              <a href="login.html"><button class="btn btn-fill text-white">
              Log In
              </button></a>
            </div>';
            }else{
              echo '
              <div class="gap-3">
              <a href="index.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img
              src="assets/img/user.png"
              alt="logo"
              style="margin-right: 0.75rem"
              width="60"/>
              <ul class="dropdown-menu" >
                <li><a class="dropdown-item" href="index.php">Dashboard</a></li>
                <li><a class="dropdown-item" href="profile.php">Setting </a></li>
                <li><a class="dropdown-item" href="login.html">Logout</a></li>
              </ul>
              </a>
            </div>
            ';
            }
            ?>
            
          </div>
        </nav>
        <!-- NAVBAR -->

        <!-- HERO -->
        <div>
          <div class="mx-auto d-flex flex-lg-row flex-column hero">
            <!-- LEFT COLUMN -->
            <div
              class="
                left-column
                d-flex
                flex-lg-grow-1 flex-column
                align-items-lg-start
                text-lg-start
                align-item-center
                text-center
              "
            >
              <h3
                class="title-text-big"
                data-aos="fade-right"
                data-aos-delay="300"
              >
                Time To Get Your House Cleaned and in Order
              </h3>
              <div
                class="
                  d-flex
                  flex-sm-row flex-column
                  elign-items-center
                  mx-lg-0 mx-auto
                  justify-content-center
                  gap-3
                "
                data-aos="fade-right"
                data-aos-delay="600"
              >
                <button class="btn d-inline-flex mb-md-0 btn-try text-white">
                  Get Started
                </button>
              </div>
            </div>
            <!-- LEFT COLUMN -->

            <!-- RIGHT COLUMN -->
            <div
              class="
                right-column
                text-center
                d-flex
                justify-content-lg-end justify-content-center
                pe-0
              "
              data-aos="fade-left"
              data-aos-delay="1200"
            >
              <img
                src="assets/img/hero-img.png"
                alt="Hero Image"
                id="im-fluid"
                class="h-auto mw-100"
              />
            </div>
            <!-- RIGHT COLUMN -->
          </div>
        </div>
        <!-- HERO -->
      </div>
    </section>
    <!-- HEADER -->

    <!-- CONTENT -->
    <section class="h-100 w-100 bg-white" style="box-sizing: border-box">
      <div
        class="content-cleanhome container-xxl mx-auto p-0 position-relative"
        style="font-family: 'Poppins'"
      >
        <div class="text-center tittle-text">
          <h1 class="text-title">3 Keys Benefit</h1>
          <p class="text-caption" style="margin-left: 3rem">
            You can easily clean your home or office with a hygine tools
          </p>
        </div>

        <div class="grid-padding text-center">
          <div class="row">
            <div
              class="col-lg-4 column"
              data-aos="zoom-in-up"
              data-aos-delay="600"
            >
              <div class="icon">
                <img
                  src="assets/icons/ic-bedroom.png"
                  alt="Better Sleep"
                  width="50"
                />
              </div>
              <h3 class="icon-title">Better Sleep</h3>
              <p class="icon-caption">
                The National Sleep Fondaition also ran a survey that clearly
                showed those with clean rooms had an easier time sleeping. Clean
                house, clean mind
              </p>
            </div>
            <div
              class="col-lg-4 column"
              data-aos="zoom-in-up"
              data-aos-delay="1200"
            >
              <div class="icon">
                <img
                  src="assets/icons/ic-health.png"
                  alt="Mental Health"
                  width="50"
                />
              </div>
              <h3 class="icon-title">Improve Your Mental Health</h3>
              <p class="icon-caption">
                Many psychology studies have been performed that show an
                uncluttered, clean space can help us focus better and feel
                calmer, less depressed and les anxious in general
              </p>
            </div>
            <div
              class="col-lg-4 column"
              data-aos="zoom-in-up"
              data-aos-delay="1800"
            >
              <div class="icon">
                <img
                  src="assets/icons/ic-alergy.png"
                  alt="Allergy Symptoms"
                  width="50"
                />
              </div>
              <h3 class="icon-title">Ease Seasonal Allergy Symptoms</h3>
              <p class="icon-caption">
                Regularly changing bed sheets and cleaning windows dressings can
                greatly reduce your allergy symptoms
              </p>
            </div>
          </div>
        </div>

        <div class="cadr-block">
          <div class="card">
            <div class="d-flex flex-lg-row flex-column align-items-center">
              <div class="me-lg-3">
                <img
                  src="assets/img/card-2.jpg"
                  alt=""
                  width="100"
                  style="border-radius: 10px"
                />
              </div>
              <div class="flex-grow-1 text-lg-start text-center card-text">
                <h3 class="card-title">Fast Clean Management in 30 minutes</h3>
                <p class="card-caption">
                  With proper care of our clean tools, you can guarentee they'll
                  past a lifetime.
                </p>
              </div>
              <?php
            if($login != "login"){
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
            }else{
              echo '
              <a href="home.php"><button class="btn btn-card text-white">Get Started</button></a>
            ';
            }
            ?>
              <!-- <div class="card-btn-space">
                <a href="register.html"><button class="btn btn-card text-white">Get Started</button></a>
              </div> -->
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
              <p style="margin: 0">Copyright © 2023 SmartClean </p>
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

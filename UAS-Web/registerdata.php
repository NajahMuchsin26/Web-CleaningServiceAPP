<?php
include 'connection.php';
$query = "SELECT * FROM register ";
$result = $conn->query($query);
// $query = "SELECT schedule.*, register.username AS username, service.jenis_service AS jenis_service 
// FROM orders 
// JOIN register ON orders.id_customer = register.id_user
// JOIN service ON orders.id_service = service.id_service";
// $result = $conn->query($query);

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width= , initial-scale=1.0">
  <title> Smart Clean :: Profile</title>
  <link rel="stylesheet" href="src/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="src/custom.css" />
  <link rel="stylesheet" href="src/aos/aos.css" />
  <link rel="shortcut icon" href="assets/img/logo2.png" />
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">
  <main id="main" class="main">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo2.png" alt="">
        <span class="d-none d-lg-block">SmartClean</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="login.html">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->



      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="schedule1.php" class="active">
              <i class="bi bi-circle"></i><span>Form Schedule</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="schedule.php">
              <i class="bi bi-circle"></i><span>Data Schedule</span>
            </a>
          </li>
          <li>
            <a href="datapayment.php">
              <i class="bi bi-circle"></i><span>Data Payment</span>
            </a>
          </li>
          <li>
            <a href="datareview.php">
              <i class="bi bi-circle"></i><span>Data Review</span>
            </a>
          </li>
          <li>
            <a href="barang.php">
              <i class="bi bi-circle"></i><span>Data Barang</span>
            </a>
          </li>
          <li>
            <a href="registerdata.php">
              <i class="bi bi-circle"></i><span>Data Register</span>
            </a>
          </li>
          <li>
            <a href="servicedata.php">
              <i class="bi bi-circle"></i><span>Data Service</span>
            </a>
          </li>
          <li>
            <a href="roledata.php">
              <i class="bi bi-circle"></i><span>Data role</span>
            </a>
          </li>
          <li>
            <a href="data.php">
              <i class="bi bi-circle"></i><span>Data Order</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->


      </li><!-- End Register Page Nav -->


    </ul>

  </aside><!-- End Sidebar-->

  <div class="pagetitle">
    <h1>Data Register</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Datatables</h5>
            <p>Add lightweight datatables to your project with using the <a
                href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library.
              Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>

            <button class="btn btn-danger btn-sm me-1 p-2" onclick="deleteAll(this)" data-bs-toggle="modal"
              data-bs-target="#modalExample">Hapus Semua Data</button>

            <button class="btn btn-primary btn-sm me-1 p-2 btn-data" data-status="delete_user" onclick="checked(this)"
              data-bs-toggle="modal" data-bs-target="#modalExample"><i class="bi bi-trash3"></i></button>
            <!-- TABLE HERE -->
            <div class="table-responsive">
              <table class="table table-sm mt-4" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th width="5%"></th>
                    <th width="1%">No.</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>password</th>
                    <th>Alamat</th>
                    <th>No.Telepon</th>
                    <th width="10%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($result && mysqli_num_rows($result) > 0) {
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($result)) {
                      ?>
                      <tr>
                        <td><input type="checkbox" class="mt-1 checkbox" value="<?php echo $data['id_user'] ?>">
                        <td>
                          <?php echo $no ?>
                        </td>
                        <td>
                          <?php echo $data['username'] ?>
                        </td>
                        <td>
                          <?php echo $data['email'] ?>
                        </td>
                        <td>
                          <?php echo $data['password'] ?>
                        </td>
                        <td>
                          <?php echo $data['alamat'] ?>
                        </td>
                        <td>
                          <?php echo $data['no_telepon'] ?>
                        </td>
                        <td class="d-flex">
                          <button class="btn btn-warning btn-sm me-2 p-2 btn-data"
                            data-index="<?php echo $data['id_user'] ?>" data-status="edit_user" data-bs-toggle="modal"
                            data-bs-target="#modalExample"><i class="bi bi-pencil-square"></i></button>
                          <button class="btn btn-danger btn-sm me-1 p-2 btn-data"
                            data-index="<?php echo $data['id_user'] ?>" data-status="delete_user" data-bs-toggle="modal"
                            data-bs-target="#modalExample"><i class="bi bi-trash3"></i></button>
                        </td>
                      </tr>
                      <?php
                      $no++;
                    }
                  } else {
                    echo "<tr><td colspan='6'>No data found</td></tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>


          </div>
        </div>

      </div>
    </div>
  </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
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
        <div class="d-flex align-items-center gap-4">Smartclean</div>
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
          <p style="margin: 0">Copyright © 2023 SmartClean </p>
        </nav>
      </div>
    </div>
    </div>
  </footer><!-- End Footer -->

  <!-- Start Modal data -->
  <div class="modal fade" id="modalExample">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Title Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-content-custom">
          <!-- Code dari Javascript -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal data -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    const xhr = new XMLHttpRequest();
    const modalTitle = document.querySelector('.modal-title');
    const modalContent = document.querySelector('.modal-content-custom');

    const buttonsData = document.querySelectorAll('.btn-data');
    buttonsData.forEach((btnData) => {
      btnData.addEventListener('click', function () {
        const indexData = btnData.dataset.index;
        const alamat = btnData.parentElement.parentElement.querySelector('td:nth-child(6)').innerText;
        const noTelepon = btnData.parentElement.parentElement.querySelector('td:nth-child(7)').innerText;

        const statusData = btnData.dataset.status;

        if (statusData === 'edit_user') {
          xhr.onreadystatechange = function () {
            if (xhr.status === 200 && xhr.readyState === 4) {
              const response = JSON.parse(xhr.responseText);

              modalTitle.textContent = 'Edit Data User';
              modalContent.innerHTML = `<form method="POST" class="form">
            <div class="modal-body d-flex flex-column gap-3">
              <div class="d-flex flex-column gap-2">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" required value="${response['alamat']}">
              </div>
              <div class="d-flex flex-column gap-2">
                <label for="no_telepon">No.Telepon</label>
                <input type="text" id="no_telepon" name="no_telepon" required value="${response['noTelepon']}">
              </div>
              <div class="modal-footer justify-content-center">
                <button type="submit" name="submit_data" class="btn btn-success">Simpan
                  Data</button>
              </div>
          </form>`;

              editData(indexData);
            }
          }

          xhr.open('POST', `./crud/api.php?id_user=${indexData}&alamat=${alamat}&no_telepon=${noTelepon}&action=${statusData}`, true);
          xhr.send();
        } else if (statusData === 'delete_user') {
          modalTitle.textContent = 'Apakah Anda yakin ingin menghapus data?';
          modalContent.innerHTML = `<div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Tidak</button>
            <button type="button" name="submit_data" class="btn btn-danger">Ya, saya yakin</button>
          </div>`;

          deleteData(indexData);
        };

      });
    });

    function editData(indexData) {
      const alamat = document.getElementById('alamat');
      const noTelepon = document.getElementById('no_telepon');

      const form = document.querySelector('.form');
      form.addEventListener('submit', function () {
        xhr.onreadystatechange = function (e) {
          e.preventDefault();
          if (xhr.readyState === 4 && xhr.status === 200) {
            const response = xhr.responseText;
            console.log(response);
            if (response === 'success') {
              alert('Data user berhasil diubah!');
            } else {
              alert('Data user gagal diubah!');
            }
          }
        }

        xhr.open('POST', `./crud/api.php?id_user=${indexData}&alamat=${alamat.value}&no_telepon=${noTelepon.value}&action=submit_edit_user`, true);
        xhr.send();
      })
    }

    function deleteData(indexData) {
      const btnDeleteData = document.querySelector('[name="submit_data"]');
      btnDeleteData.addEventListener('click', function () {
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
            const response = xhr.responseText;
            console.log(response);
            if (response === 'success') {
              alert('Data user berhasil dihapus, kecuali foreign_key_column!');
            } else {
              alert('Data user gagal dihapus, karena ada foreign_key_column!');
            }

            window.location.reload();
          }
        }

        xhr.open('POST', `./crud/api.php?id_user=${[indexData]}&action=submit_delete_user`, true);
        xhr.send();
      })
    }

    function checked(input) {
      const tempCheckbox = [];
      const checkboxes = document.querySelectorAll('.checkbox');
      checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
          tempCheckbox.push(checkbox.value);
          input.setAttribute('data-index', `${tempCheckbox}`);
        }
      })
    }

    function deleteAll(btn) {
      modalTitle.textContent = 'Apakah Anda yakin ingin menghapus data?';
      modalContent.innerHTML = `<div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Tidak</button>
            <button type="button" name="submit_data" class="btn btn-danger">Ya, saya yakin</button>
          </div>`;

      const btnDeleteData = document.querySelector('[name="submit_data"]');
      btnDeleteData.addEventListener('click', function () {
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
            const response = xhr.responseText;
            console.log(response);
            if (response === 'success') {
              alert('Semua data user berhasil dihapus!');
            } else {
              alert('Semua data user gagal dihapus, karena ada foreign_key_column!');
            }

            window.location.reload();
          }
        }

        xhr.open('POST', `./crud/api.php?action=delete_all_user`, true);
        xhr.send();
      })
    }
  </script>
</body>

</html>
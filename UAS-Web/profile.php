<?php
            include "connection.php";
            session_start();
            $username = $_SESSION['username'];
            $email = $_SESSION['email'];
            $alamat = $_SESSION['alamat'];
            $no_telepon = $_SESSION['no_telepon'];
            $nama_role = $_SESSION['nama_role'];


            // // Query untuk mendapatkan daftar dokumen
            // $query = "SELECT * FROM register where username ='$username'";

            // $result = $conn->query($query);
            // if ($result->num_rows > 0) {
            //     $row = $result->fetch_assoc();

            //     // Mengambil ukuran file dan mengkonversi ukuran file menjadi Megabyte (MB) 

            //     // Display the document information
            //     echo "<tr>";
            //     echo "<td>" . $row['username'] . "</td>";
            //     echo "<td>" . $row['tanggal_lahir'] . "</td>";
            //     echo "<td>" . $row['no_hp'] . "</td>";
            //     echo "<td>" . $row['email'] . "</td>";
            //     echo "<td>" . $row['alamat'] . "</td>";
            
            //     // Provide a download link for the document
            //     echo "</tr>";
            // } else {
            // }            
            ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Clean :: Profile</title>
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>    
<body>
    <section class="section profile">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="assets/img/user.png" alt="Profile" class="rounded-circle">
                            <h2><?php echo $username ?></h2>
                            <h3><?php echo $nama_role ?></h3>
                            <div class="social-links mt-2">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body pt-3">
                            <ul class="nav nav-tabs nav-tabs-bordered">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#profile-overview">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#profile-settings">Settings</a>
                                </li>
                            </ul>
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">About</h5>
                                    <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-md-4 label">Full Name</div>
                                        <div class="col-md-8"><?php echo $username ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 label">Alamat</div>
                                        <div class="col-md-8"><?php echo $alamat ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 label">Email</div>
                                        <div class="col-md-8"><?php echo $email ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 label">No.Telepon</div>
                                        <div class="col-md-8"><?php echo $no_telepon ?></div>
                                    </div>
                                </div>

                                <div class="tab-pane fade pt-3" id="profile-settings">
                                    <form>
                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-form-label">Email Notifications</label>
                                            <div class="col-md-8">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="changesMade" checked>
                                                    <label class="form-check-label" for="changesMade">
                                                        Changes made to your account
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="newProducts" checked>
                                                    <label class="form-check-label" for="newProducts">
                                                        Information on new products and services
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="proOffers">
                                                    <label class="form-check-label" for="proOffers">
                                                        Marketing and promo offers
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                                                    <label class="form-check-label" for="securityNotify">
                                                        Security alerts
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

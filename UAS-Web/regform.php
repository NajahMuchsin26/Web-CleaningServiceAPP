<!DOCTYPE html>
<html>
<head>
  <title>Form Registrasi</title>
  <link rel="stylesheet" type="text/css" href="assets/css/register.css">
</head>
<body>
  <div class="register-container">
    <h1>Registrasi</h1>
    <form method="post" action="register.php">
      <label for="username">Username:</label><br>
      <input type="text" id="username" name="username" placeholder="Masukkan username"><br>

      <label for="email">Email:</label><br>
      <input type="email" id="email" name="email" placeholder="Masukkan email"><br>

      <label for="alamat">Alamat:</label><br>
      <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat"><br>

      <label for="no_telepon">No.HP:</label><br>
      <input type="text" id="no_telepon" name="no_telepon" placeholder="Masukkan no_telepon"><br>

      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password" placeholder="Masukkan password"><br>

      <label for="confirm_password">Konfirmasi Password:</label><br>
      <input type="password" id="confirm_password" name="confirm_password" placeholder="Konfirmasi password"><br>
    
      <tr>
        <td>Level:</td>
        <td>
        <select name="role" required>
          <?php 
          include "connection.php";
          $sql="SELECT * from role";
          $query = $conn->query($sql);
            while($r=$query->fetch_array()){
            ?>
             <option value="<?php echo $r['id_role']; ?>"><?php echo $r['nama_role']; ?></option>
            <?php
            }

          ?> 
            </select>
        </td>
    </tr><br><br>
      <input type="submit" value="Daftar">
    </form>
    <p>Already have an account? <a href="login.html">Login</a></p>
  </div>
</body>
</html>

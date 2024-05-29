<?php
session_start();
include "connection.php";
$username = $_POST['username'];
$password = md5($_POST['password']);
// $md5password = md5($password);
$op = $_GET['op'];

if($op=="in"){
    
   $sql="SELECT * from register where username='$username' AND password='$password'";
    $query = $conn->query($sql);
    if(mysqli_num_rows($query)==1){
        $data = $query->fetch_array();
        $_SESSION['username'] = $data['username'];
        $_SESSION['alamat'] = $data['alamat'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['no_telepon'] = $data['no_telepon'];
        $_SESSION['id_role'] = $data['id_role'];
        $_SESSION['login'] = 'login';
       $sql2 = "SELECT * from register  join role on register.id_role = role.id_role ";
        $query2 = $conn->query($sql2);
        $data2 = $query2->fetch_array();
        $_SESSION['nama_role'] = $data2['nama_role'];
        // $_SESSION['login'] = 'login';
        if($data['id_role']=="1"){
            header("location:data.php");
        }else if($data['id_role']=="2"){
            header("location:index.php");
        }else if($data['id_role']=="3"){
            header("location:index.php");
        }else{
            die("password salah <a href=\"javascript:history.back()\">kembali</a>");
        }
    }
}else if($op=="out"){
    unset($_SESSION['username']);
    unset($_SESSION['level']);
    header("location:login.php");
}
?>

<?php

 
header('Content-Type: text/html; charset=UTF-8');
$servername = 'localhost'; 
$db = 'gardenut'; 
$username = 'root'; 
$password = '';
$con = mysqli_connect($servername, $username, $password ,$db);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
 
if (isset($_POST['login'])) 
{
    $username = '';
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);

    // $password = md5($password);
     
    //Kiểm tra tên đăng nhập có tồn tại không
    $sql = "SELECT user_id, username, password FROM user_info WHERE username='$username'";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) == 0) {
        echo '<script language="javascript">alert("Tên đăng nhập không tồn tại. Vui lòng kiểm tra lại."); window.location="index.php";</script>';
        exit;
    }
     
    //Lấy mật khẩu trong database ra
    $row = mysqli_fetch_array($query);
     
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['password']) {
        echo '<script language="javascript">alert("Mật khẩu không đúng!"); window.location="index.php";</script>';
        exit;
    }
     
    //Lưu tên đăng nhập
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['user_id'] = $row['user_id'];
    header('Location: index.php');
        die();
}
?>
<?php
 
    if (!isset($_POST['username'])){
        echo('hi');
        die('');
    }

    $servername = 'localhost'; 
    $db = 'gardenut'; 
    $username = 'root'; 
    $password = '';
    // $con = mysqli_connect($servername, $username, $password ,$db);
    // if (!$con) {
    //     die("Connection failed: " . mysqli_connect_error());
    // }

    // header('Content-Type: text/html; charset=UTF-8');

    $username   = addslashes($_POST['username']);
    $phone   = addslashes($_POST['phone']);
    $password   = addslashes($_POST['password']);
    
    // // $password = md5($password);

    // $add_user_info = "INSERT INTO user_info (username, phone, password) VALUES ('$username','$phone', '$password')";

    // if (mysqli_query($con, $add_user_info)){
    //     echo '<script language="javascript">alert("Đăng ký thành công"); window.location="index.html";</script>';
    // }
    // else {
    //     echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="form.html";</script>';
    // }


      
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO user_info (username, phone, password) VALUES ('$username','$phone', '$password')";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
      
      $conn = null;
?>
<?php
  session_start();
    $servername = 'localhost'; 
    $db = 'gardenut'; 
    $username = 'root'; 
    $password = '';
    $con = mysqli_connect($servername, $username, $password ,$db);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    header('Content-Type: text/html; charset=UTF-8');

    if (!empty($_POST)){
      $username = $php_errormsg='';
      $username   = addslashes($_POST['username']);
      $phone   = addslashes($_POST['phone']);
      $password   = addslashes($_POST['password']);
      $re_password   = addslashes($_POST['re_password']);
      
      $password = md5($password);

          //Kiểm tra tên đăng nhập có tồn tại không
      $sql = "SELECT user_id, username, password FROM user_info WHERE username='$username'";
      $query = mysqli_query($con, $sql);
      if (mysqli_num_rows($query) != 0) {
        echo '<script language="javascript">alert("Tên đăng nhập đã tồn tại. Vui lòng kiểm tra lại."); window.location="index.php";</script>';
        exit;
      }
      
      $add_user_info = "INSERT INTO user_info (username, phone, password) VALUES ('$username','$phone', '$password')";
  
      if (mysqli_query($con, $add_user_info)){
        $_SESSION['username'] = $username;
        header('Location: index.php');
            die();
      }
      else {
          echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="index.php";</script>';

      }
      
    }



      
    // try {
    //     $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    //     // set the PDO error mode to exception
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     $sql = "INSERT INTO user_info (username, phone, password) VALUES ('$username','$phone', '$password')";
    //     // use exec() because no results are returned
    //     $conn->exec($sql);
    //     echo "New record created successfully";
    //   } catch(PDOException $e) {
    //     echo $sql . "<br>" . $e->getMessage();
    //   }
      
    //   $conn = null;
?>
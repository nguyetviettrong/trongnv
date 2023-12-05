<?php
function checkid($username,$password){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user";

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    $sql= "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
    var_dump($sql);
    $result = mysqli_query($conn,$sql);
    $check = mysqli_fetch_array($result);
    if(isset($check)){
        $i = true;
        echo 'success';
    }else{
        $i = false;
        echo 'failure';
    }
}

// Kết nối thành công, bạn có thể thực hiện các truy vấn SQL ở đây

// Đóng kết nối
$conn->close();
?>
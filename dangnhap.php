<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <form action='dangnhap.php?do=login' method='POST'>
            <table cellpadding='0' cellspacing='0' border='1'>
                <tr>
                    <td>
                        Tên đăng nhập :
                    </td>
                    <td>
                        <input type='text' name='txtUsername' />
                    </td>
                </tr>
                <tr>
                    <td>
                        Mật khẩu :
                    </td>
                    <td>
                        <input type='password' name='txtPassword' />
                    </td>
                </tr>
            </table>
            <input type='submit' value='Đăng nhập' onclick="login()" />
            <a href='dangky.php' title='Đăng ký'>Đăng ký</a>
        </form>
        <script>
            function login() {
                // Gọi hàm PHP login() ở đây
                <?php login(); ?>
            }
</script>
    </body>
</html>

<?php
//Khai báo sử dụng session
session_start(); 

//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
function login(){
    //Xử lý đăng nhập
    echo "abc";
    if (isset($_POST['dangnhap'])) 
    {
        //Kết nối tới database
        include('ketnoi.php');
        
        //Lấy dữ liệu nhập vào
        $username = addslashes($_POST['txtUsername']);
        $password = addslashes($_POST['txtPassword']);
        
        //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
        if (!$username || !$password) {
            echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }
        
        checkid($username,$password);

        
        //So sánh 2 mật khẩu có trùng khớp hay không
        if ($password != $row['password']) {
            echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }
        
        //Lưu tên đăng nhập
        $_SESSION['username'] = $username;
        echo "Xin chào " . $username . ". Bạn đã đăng nhập thành công. <a href='/'>Về trang chủ</a>";
        die();
    } 

}
?>

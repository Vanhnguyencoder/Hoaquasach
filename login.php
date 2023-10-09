<?php
include('sessions.php');
include('connect.php');
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <?php include('templates/header.php') ?>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <?php
            if(isset($_SESSION['dangnhapthanhcong'])) {
                echo '<meta http-equiv="refresh" content="1;URL=index.php">';
            } else {
        ?>
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Đang tải...</span>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="/" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>MANAGER</h3>
                            </a>
                            <h3>Đăng nhập</h3>
                        </div>

                        <form name="formdangnhap" method="POST" action="login.php">
                            <div class="form-floating mb-3">
                                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="abcd@gmail.com">
                                <label for="floatingInput">Địa chỉ Email</label>
                            </div>
                        
                            <div class="form-floating mb-4">
                                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Mật khẩu">
                                <label for="floatingPassword">Mật khẩu</label>
                            </div>
                        
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="rememberme">
                                    <label class="form-check-label" for="rememberme">Ghi nhớ tài khoản</label>
                                </div>  
                            </div>
                            
                            <button name="tienhanhdangnhap" type="submit" class="btn btn-primary py-3 w-100 mb-4">Đăng nhập</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
            }
            if(isset($_POST['tienhanhdangnhap'])) {
                $email = mysqli_escape_string($connect, $_POST['email']);
                $password = md5($_POST['password']);

                $sqlcheckuser = "SELECT * FROM `users` WHERE `email` = '". $email ."' AND `password` = '". $password ."'";
                $ketqua = $connect->query($sqlcheckuser);

                if($ketqua->num_rows > 0) {
                    echo 'Đăng nhập thành công.';
                    $user = $ketqua->fetch_array();
                    $_SESSION['dangnhapthanhcong'] = 'OK';
                    $_SESSION['username'] = $user["username"];
                    $_SESSION['email'] = $user["email"];
                    // header("Refresh: 0; url='/'");
                    echo '<meta http-equiv="refresh" content="1;URL=index.php">';
                } else {
                    echo '<script>alert("Mật khẩu hoặc tên tài khoản không chính xác.");</script>';
                    // header("Refresh: 0; ");
                    echo '<meta http-equiv="refresh" content="1;URL=login.php">';
                }
            }
        ?>
    </div>

    <?php include('templates/scripts.php') ?>
</body>

</html>
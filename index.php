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
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Đang tải...</span>
            </div>
        </div>

        <?php include('templates/sidebar.php') ?>

        <div class="content">
            <?php include('templates/navbar.php') ?>

            <?php include('templates/content.php') ?>

            <?php include('templates/footer.php') ?>
        </div>

        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php include('templates/scripts.php') ?>
    
</body>

</html>
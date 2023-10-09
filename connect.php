<?php
$ipserver = 'localhost';
$usernameSQL = 'root';
$passwordSQL = '';
$database = 'hoaquasach';

$connect = new mysqli($ipserver, $usernameSQL, $passwordSQL, $database);
if ($connect->connect_error) {
    die('Kết nối không thành công');
}
?>
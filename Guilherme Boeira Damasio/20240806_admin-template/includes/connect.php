<?php
try {
    $dsn = "mysql:host=localhost;dbname=desi202301_admin;charset=utf8mb4";
    $con = new PDO($dsn, "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

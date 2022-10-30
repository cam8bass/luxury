<?php
session_start();
$allInput = $_SESSION['allInput'] ?? "";
$error = $_SESSION['errorCreateAd'] ?? "";
unset($_SESSION['errorCreateAd']);
unset($_SESSION['allInput']);

echo json_encode([$allInput, $error]);

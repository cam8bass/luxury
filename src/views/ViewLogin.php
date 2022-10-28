<?php
session_start();

$error = $_SESSION['error'] ?? "";
$email = $_SESSION['email'] ?? "";
unset($_SESSION['email']);
unset($_SESSION['error']);
session_destroy();

echo json_encode([$email, $error]);

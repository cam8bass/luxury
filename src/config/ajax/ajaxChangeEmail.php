<?php
session_start();
$errorChangeEmail = $_SESSION['errorInputEmail'] ?? "";
unset($_SESSION['errorInputEmail']);
echo json_encode($errorChangeEmail);

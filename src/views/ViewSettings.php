<?php
session_start();
$userProfile = $_SESSION['userProfile'] ?? [];
unset($_SESSION['userProfile']);
echo json_encode($userProfile);

<?php
session_start();
$allAd = $_SESSION['allAd'] ?? [];
unset($_SESSION['allAd']);
echo json_encode($allAd);

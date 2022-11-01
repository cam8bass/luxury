<?php

session_start();
$allAd = $_SESSION['userAllAd'] ?? [];
unset($_SESSION['userAllAd']);
session_destroy();

echo json_encode($allAd);

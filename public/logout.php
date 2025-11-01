<?php
require_once __DIR__ . '/../src/ecommerce.php';
session_unset();
session_destroy();
header('Location: /index.php');
exit;

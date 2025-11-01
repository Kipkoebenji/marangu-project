<?php
// 1. Bring in the configuration "secrets"
require_once __DIR__ . '/config.php';

/*
 * -----------------------------------------------------------------
 * DATABASE CONNECTION (PDO)
 * -----------------------------------------------------------------
 * This script creates a database connection object using PDO.
 * PDO (PHP Data Objects) is the modern, secure way to talk to databases.
 *
 * We use a try...catch block. This is a best practice for error handling.
 * If the connection fails (e.g., wrong password), it will "catch" the
 * error and display a friendly message instead of crashing the site.
 */

// This string tells PDO what database to connect to and where it is.
$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

try {
    // Try to create the connection object
    $pdo = new PDO($dsn, DB_USER, DB_PASS);

    // Set some attributes to make PDO behave consistently
    // - ATTR_ERRMODE: Makes PDO throw exceptions on errors (so our 'catch' block works)
    // - ATTR_DEFAULT_FETCH_MODE: Makes PDO return data as associative arrays (easier to use)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // If the 'try' part failed, this 'catch' part will run.
    // It prints a user-friendly error message and stops the script.
    echo 'Connection failed: ' . $e->getMessage();
    exit; // Stop the script from running further
}

// If the script reaches this point, the connection was successful!
// The $pdo object is now available to any script that 'includes' this file.

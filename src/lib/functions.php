<?php
/*
 * -----------------------------------------------------------------
 * SITE FUNCTIONS
 * -----------------------------------------------------------------
 * This file is for reusable PHP functions.
 * Keeping functions here makes your main pages (like services.php)
 * much cleaner and easier to read.
 */

/**
 * Fetches all services from the database.
 *
 * @param PDO $pdo The active database connection object.
 * @return array An array of all services.
 */
function getAllServices(PDO $pdo) {
    // 1. Prepare the SQL query
    $stmt = $pdo->prepare("SELECT * FROM services");
    
    // 2. Execute the query
    $stmt->execute();
    
    // 3. Fetch all results and return them
    return $stmt->fetchAll();
}

// You could add more functions here later...
// function getServiceById(PDO $pdo, $id) { ... }
// function addContactMessage(PDO $pdo, $name, $email, $message) { ... }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- The $pageTitle variable will be set in each main file (index.php, about.php) -->
    <title><?php echo isset($pageTitle) ? $pageTitle : 'My Local Business'; ?></title>
    <!-- Link to our main CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header class="site-header">
        <div class="container">
            <div class="logo">
                <a href="index.php">My Local Business</a>
            </div>
            <?php
                // We include the navigation menu inside the header
                include_once __DIR__ . '/nav.php';
            ?>
        </div>
    </header>

    <main class="site-content">
        <div class="container">

<?php
    /*
     * This page needs to do more setup.
     * 1. Connect to the database
     * 2. Get the functions file
     */
    require_once __DIR__ . '/../src/db_connect.php'; // Gives us the $pdo object
    require_once __DIR__ . '/../src/lib/functions.php'; // Gives us getAllServices()
    
    // Page-specific logic
    // Call the function to get all services from the DB
    $services = getAllServices($pdo);

    // Now we can set the page title and include the header
    $pageTitle = 'Our Services - My Local Business';
    include_once __DIR__ . '/../src/templates/header.php';
?>

<h1 class="page-title">What We Do</h1>
<p>We offer a range of professional services. Here's what we can do for you:</p>

<div class="services-list">
    <?php
        /*
         * This is the "PHP Loop".
         * We use a foreach loop to iterate over the $services array
         * that we got from the database.
         * For each item, we create an HTML article.
         *
         * htmlspecialchars() is a VITAL security function.
         * It prevents XSS attacks by converting special characters
         * (like < or >) into their HTML entities.
         * ALWAYS use it when printing data from your database!
         */
    ?>
    <?php foreach ($services as $service): ?>
        <article class="service-item">
            <h2><?php echo htmlspecialchars($service['name']); ?></h2>
            <p><?php echo htmlspecialchars($service['description']); ?></p>
        </article>
    <?php endforeach; ?>

    <?php
        // A nice message if there are no services in the database
        if (empty($services)):
    ?>
        <p>We are currently updating our services list. Please check back soon!</p>
    <?php endif; ?>
</div>

<?php
    // Include the page footer
    include_once __DIR__ . '/../src/templates/footer.php';
?>

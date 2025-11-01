<?php
    // Set a variable for the page title, which header.php will use
    $pageTitle = 'Home - My Local Business';

    // 1. Include the page header
    // We use __DIR__ to get the absolute path to the current file's directory
    // Then '..' to go "up" one level out of 'public' and into 'src'
    include_once __DIR__ . '/../src/templates/header.php';
?>

<!-- This is the main content for the homepage -->
<h1 class="page-title">Welcome to Our Business!</h1>
<p>We are a local business dedicated to providing the best services in town. Browse our site to learn more about what we do.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque leo nec massa vehicula, A-enean vulputate ac massa A-convallis. Phasellus A-sapien eget nisi egestas A-aliquet.</p>


<?php
    // 2. Include the page footer
    include_once __DIR__ . '/../src/templates/footer.php';
?>

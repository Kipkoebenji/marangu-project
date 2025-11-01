<?php
    $pageTitle = 'Contact Us - My Local Business';
    
    // 1. Include the page header
    include_once __DIR__ . '/../src/templates/header.php';
?>

<!-- This is the main content for the Contact page -->
<h1 class="page-title">Get In Touch</h1>
<p>We'd love to hear from you. Here's how you can reach us:</p>

<div class="contact-info">
    <p><strong>Phone:</strong> (555) 123-4567</p>
    <p><strong>Email:</strong> contact@yourbusiness.com</p>
    <p><strong>Address:</strong> 123 Main St, Yourtown, ST 12345</p>
</div>

<!-- 
A great "next step" would be to make this a functional PHP contact form
that emails you or saves the message to the database.
-->

<?php
    // 2. Include the page footer
    include_once __DIR__ . '/../src/templates/footer.php';
?>

<?php
    if ($_SERVER["REQUEST_METHOD"] === 'GET') {
        require __DIR__ . '/first_page.php';
    } elseif ($_SERVER["REQUEST_METHOD"] === 'POST') { 
        require __DIR__ . '/wellness_form.php';
    }
?>

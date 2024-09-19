<?php
    if ($_SERVER["REQUEST_METHOD"] === 'GET') {
        require __DIR__ . '/first_page.php';
    } elseif ($_SERVER["REQUEST_METHOD"] === 'POST') {
        if ($_POST["mode"] === "get_sig") {
            require __DIR__ . '/get_signature.php';
        } elseif ($_POST["mode"] === "gen_pdf") {
            require __DIR__ . '/generate_pdf.php';
        }
    }
?>

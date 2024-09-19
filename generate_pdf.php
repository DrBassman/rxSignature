<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    </head>
    <body>
        <?php 
            $pdfChosen = $_POST["pdfChosen"];
            $capConsent = $_POST["capConsent"];
            $rxAck = $_POST["rxAck"];
        ?>
        <div class="container">
            <div class="jumbotron">
                <img class="rounded float-right" src="/images/lol-logo.png" alt="Logo">
                <h1>Signatures for Rx's</h1>
                <p>Bull$|-|it rule from tyrants!</p>
            </div>
            File:  <?php echo "$pdfChosen"; ?><br>
            Signature capture consent: <?php echo "$capConsent"; ?><br>
            Rx Receipt Acknowledgement:<?php echo "$rxAck"; ?><br>
        </div>
    </body>
</html>
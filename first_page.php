<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <img class="rounded float-right" src="/images/lol-logo.png" alt="Logo">
                <h1>Signatures for Rx's</h1>
                <p>Bull$|-|it rule from tyrants!</p>
            </div>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <select name="in_pdf">Choose a document to sign:
                <?php
                    echo "<option value=\"\">Select File</option>";
                    foreach (glob ("*.[pP][dD][fF]") as $file) {
                        echo "<option value=\"$file\">$file</option>";
                    }
                ?>
                </select>
                <input type="hidden" name="mode" value="get_sig">
                <input type="submit" value="Sign Rx">
            </form>
        </div>
    </body>
</html>

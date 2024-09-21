<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    </head>
    <body>
        <?php require __DIR__ . "/page_header.php"; ?>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <select name="in_pdf">Choose a document to sign:
                <?php
                    echo "<option value=\"\">Select File</option>";
                    chdir(__DIR__ . "/input");
                    foreach (glob ("*.[pP][dD][fF]") as $file) {
                        echo "<option value=\"$file\">$file</option>";
                    }
                ?>
                </select>
                <input type="hidden" name="mode" value="get_sig">
                <input type="submit" value="Sign Rx">
            </form>
        <?php require __DIR__ . "/page_footer.php"; ?>
    </body>
</html>

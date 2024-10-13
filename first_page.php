<!doctype html>
<html class="no-js" lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rx Signature Collector</title>
        <link rel="stylesheet" href="css/foundation/foundation.css">
        <link rel="stylesheet" href="css/foundation/app.css">
    </head>
    <body>
        <?php require __DIR__ . "/configfile.php"; ?>
        <?php require __DIR__ . "/page_header.php"; ?>
            <div class="grid-x">
                <div class="cell">
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <label for="fselect">Choose the document(s) to sign:</label>
                        <select multiple class="form-select" id="fselect" name="in_pdf[]" required>Choose a document to sign:
                            <?php
                                chdir($input_dir);
                                foreach (glob ("*.[pP][dD][fF]") as $file) {
                                    echo "\n<option value=\"$file\">$file</option>";
                                }
                            ?>
                        </select>
                        <div class="button-group hollow align-center">
                            <input type="hidden" name="mode" value="get_sig">
                            <input type="submit" class="button" value="Sign Rx(s)">
                            <a class="button secondary" href="<?php echo $_SERVER["REQUEST_URI"]; ?>">Refresh</a>
                        </div>
                    </form>
                </div>
            </div>
        <?php require __DIR__ . "/page_footer.php"; ?>
        <script src="js/foundation/vendor/jquery.js"></script>
        <script src="js/foundation/vendor/what-input.js"></script>
        <script src="js/foundation/vendor/foundation.js"></script>
        <script src="js/foundation/app.js"></script>
    </body>
</html>

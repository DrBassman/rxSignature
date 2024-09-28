<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/bootstrap5.min.css">
    </head>
    <body>
        <?php require __DIR__ . "/configfile.php"; ?>
        <?php require __DIR__ . "/page_header.php"; ?>
        <div class="container">
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <div class="form-group">
                    <label for="fselect">Choose the document(s) to sign:</label>
                    <select multiple class="form-select" id="fselect" name="in_pdf[]" required>Choose a document to sign:
                        <?php
                            chdir($input_dir);
                            foreach (glob ("*.[pP][dD][fF]") as $file) {
                                echo "\n<option value=\"$file\">$file</option>";
                            }
                        ?>
                    </select>
                    <input type="hidden" name="mode" value="get_sig">
                    <input type="submit" class="btn btn-outline-primary" value="Sign Rx(s)">
                    <a class="btn btn-outline-secondary" href="<?php echo $_SERVER["REQUEST_URI"]; ?>">Refresh</a>
                </div>
            </form>
        </div><?php require __DIR__ . "/page_footer.php"; ?>
        <script src="js/bootstrap5.bundle.min.js"></script>
    </body>
</html>

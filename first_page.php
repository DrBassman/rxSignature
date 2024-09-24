<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>
    <body>
        <?php require __DIR__ . "/configfile.php"; ?>
        <?php require __DIR__ . "/page_header.php"; ?>
        <div class="container">
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <div class="form-group">
                    <label for="fselect">Choose the document(s) to sign:</label>
                    <select multiple class="form-control" id="fselect" name="in_pdf[]" size="10">Choose a document to sign:
                        <?php
                            echo "input_dir [{$input_dir}]";
                            chdir($input_dir);
                            foreach (glob ("*.[pP][dD][fF]") as $file) {
                                echo "<option value=\"$file\">$file</option>";
                            }
                        ?>
                    </select>
                </div>
                <input type="hidden" name="mode" value="get_sig">
                <input type="submit" class="btn btn-primary" value="Sign Rx(s)">
                <a href="<?php echo $_SERVER["REQUEST_URI"]; ?>">Refresh</a>
                </form>
        </div><?php require __DIR__ . "/page_footer.php"; ?>
    </body>
</html>

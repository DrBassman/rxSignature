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

            <?php
                $pdfChosen = $_POST["in_pdf"];
                echo "[$pdfChosen]<br>";
            ?>
            <iframe src="<?php echo "$pdfChosen"; ?>" width="100%" height="330"></iframe>
            <p>To comply with 16 CFR Part 456 Ophthalmic Practice Rule (eyeglass rule) June, 2024; and
                to comply with 16 CFR Part 315 Contact Lens Rule July, 2004 (rules);
                Losh Optometry LLC is required to have the patient sign a copy of their prescription at the conclusion
                of their examination.  Losh Optometry LLC is required by the rules <i>to keep the receipts on file for three years</i>.
                Losh Optometry LLC has developed this paperless method to comply with rules.
            </p>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <input type="hidden" name="mode" value="gen_pdf">
            <input type="hidden" name="pdfChosen" value="<?php echo "$pdfChosen"; ?>">
            <ul>
                <li><input type="checkbox" name="capConsent"> I consent for my signature to be electronically captured and affixed
                 to the copy of my prescription shown here.
                <li><input type="checkbox" name="rxAck"> I acknowledge my prescription was issued to me at the conclusion of my examination.
            </ul>
            <hr>
            <hr>
            <input type="submit" value="Apply Signature">
            </form>
        </div>
    </body>
</html>
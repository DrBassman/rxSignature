<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/signature-pad.css">
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
            ?>
            <iframe src="<?php echo "input/$pdfChosen"; ?>" width="100%" height="360"></iframe>
            <p>To comply with 16 CFR Part 456 ophthalmic practice rule June, 2024; and
                to comply with 16 CFR Part 315 contact lens rule July, 2004 (rules);
                Losh Optometry LLC is required to have the patient sign a copy of their prescription at the conclusion
                of their examination.  Losh Optometry LLC is required by the rules <i>to keep the receipts on file for three years</i>.
                Losh Optometry LLC has developed this paperless method to comply with rules.
            </p>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <input type="hidden" name="mode" value="gen_pdf">
            <input type="hidden" name="pdfChosen" value="<?php echo "$pdfChosen"; ?>">
            <input type="hidden" id="svgData" name="svgData" value="">
            <ul>
                <li><input type="checkbox" name="capConsent"> I consent for my signature to be electronically captured and affixed
                 to the copy of my prescription shown here.
                <li><input type="checkbox" name="rxAck"> I confirm that my prescription was issued to me at the conclusion of my examination.
            </ul>
        </div>
        <div id="signature-pad" class="signature-pad container">
            <hr>
            <div id="canvas-wrapper" class="signature-pad--body">
              <canvas></canvas>
            </div>
            <div class="signature-pad--footer">
              <div class="description">Sign above</div>
                     <div class="signature-pad--actions">
                    <div class="column">
                        <button type="button" class="button clear" data-action="clear">Clear</button>
                        <button type="button" class="button" data-action="undo" title="Ctrl-Z">Undo</button>
                        <button type="button" class="button" data-action="redo" title="Ctrl-Y">Redo</button>
                    </div>
                    <div class="column">
                        <input type="submit" value="Apply Signature">
                    </div>
                </div>
            </div>
            </form>
            <hr>
        </div>
        <script src="js/signature_pad.umd.min.js"></script>
        <script src="js/app.js"></script>        
    </body>
</html>
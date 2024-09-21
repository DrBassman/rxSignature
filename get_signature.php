<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/signature-pad.css">
        <script>
            function refused_toggled(element) {
                //element.checked = !element.checked;
                cc = document.getElementById("capConsent");
                ra = document.getElementById("rxAck");
                if (element.checked) {
                    cc.checked = false;
                    ra.checked = false;
                } else {
                    cc.checked = true;
                    ra.checked = true;
                }
            }
        </script>
    </head>
    <body>
        <?php require __DIR__ . "/page_header.php"; ?>

            <?php
                $pdfChosen = $_POST["in_pdf"];
            ?>
            <iframe src="<?php echo "input/$pdfChosen"; ?>" width="100%" height="360"></iframe>
            <div class="container">
            <p>To comply with <i>16 CFR Part 456 ophthalmic practice rule</i> June, 2024; and
                to comply with <i>16 CFR Part 315 contact lens rule</i> July, 2004 (rules);
                Losh Optometry LLC is required to have the patient sign a copy of their prescription at the conclusion
                of their examination.  Losh Optometry LLC is required by the rules <i>to keep the receipts on file for three years</i>.
                Losh Optometry LLC has developed this paperless method to comply with rules.
            </p>
            </div>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <input type="hidden" name="mode" value="gen_pdf">
            <input type="hidden" name="pdfChosen" value="<?php echo "$pdfChosen"; ?>">
            <input type="hidden" id="svgData" name="svgData" value="">
            <ul class="list-group">
                <li class="list-group-item"><input type="checkbox" name="capConsent" id="capConsent" checked> I consent for my signature to be electronically captured and affixed
                 to the copy of my prescription(s) shown here.
                <li class="list-group-item"><input type="checkbox" name="rxAck" id="rxAck" checked> I confirm that my prescription was issued to me,
                 in my preferred medium, at the conclusion of my examination.
                <br>
                <br>
                <li class="list-group-item"><input type="checkbox" name="ptRefused" onchange="refused_toggled(this)"> Patient REFUSED to sign Rx.</li>
            </ul>
        <?php require __DIR__ . "/page_footer.php"; ?>
        <div id="signature-pad" class="signature-pad container">
            <hr>
            <div id="canvas-wrapper" class="signature-pad--body">
              <canvas id="lol_sig_canvas" style="background-color: rgb(249, 226, 51);"></canvas>
            </div>
            <div class="signature-pad--footer">
              <div class="description">Sign above</div>
                     <div class="signature-pad--actions">
                    <div class="column">
                        Pen Color<br>
                        <div class="btn-group">
                            <button type="button" class="button btn" data-action="red-pen" style="background-color: rgb(255,0,0);"></button>
                            <button type="button" class="button btn" data-action="green-pen" style="background-color: rgb(0,255,0);"></button>
                            <button type="button" class="button btn" data-action="blue-pen" style="background-color: rgb(0,0,192);"></button>
                            <button type="button" class="button btn" data-action="black-pen" style="background-color: rgb(0,0,0);"></button>
                            <button type="button" class="button btn" data-action="purple-pen" style="background-color: rgb(148,0,211);"></button>
                        </div>
                        <br>
                        <div class="btn-group">
                            <button type="button" class="button clear btn" data-action="clear">Clear</button>
                            <button type="button" class="button btn" data-action="undo" title="Ctrl-Z">Undo</button>
                            <button type="button" class="button btn" data-action="redo" title="Ctrl-Y">Redo</button>
                        </div>
                    </div>
                    <div class="column">
                        <input type="submit" class="btn btn-primary" value="Apply Signature">
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
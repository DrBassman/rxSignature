<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/bootstrap5.min.css">
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
        <?php require __DIR__ . "/configfile.php"; ?>
        <?php require __DIR__ . "/page_header.php"; ?>
        <?php
            use \setasign\Fpdi\Tcpdf\Fpdi;
            require_once('tcpdf/tcpdf.php');
            require_once('fpdi/src/autoload.php');
            
            $pdfsChosen = $_POST["in_pdf"];
            $pdfChosen = ".tmp_" . $pdfsChosen[0];
            $pdf = new Fpdi();
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            $pdf->SetAutoPageBreak(false, 0);
            if (! empty($pdfsChosen)) {
                foreach ($pdfsChosen as $file) {
                    $pageCount = $pdf->setSourceFile($input_dir . $file);
                    for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                        $templateId = $pdf->importPage($pageNo);
                        $size = $pdf->getTemplateSize($templateId);
                        $pdf->AddPage($size['orientation'], $size);
                        $pdf->useTemplate($templateId);
                    }
                }
                $pdf->Output($input_dir . $pdfChosen, "F");
            }
        ?>
            <div class="container">
                <p><?php echo "$get_sig_explanation"; ?></p>
            </div>
            <div class="container">
                <iframe src="<?php echo "input/$pdfChosen"; ?>" width="100%" height="360"></iframe>
            </div>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <input type="hidden" name="mode" value="gen_pdf">
                <input type="hidden" name="pdfChosen" value="<?php echo "$pdfChosen"; ?>">
                <input type="hidden" name="pdfsChosen" value="<?php echo base64_encode(serialize($pdfsChosen)); ?>">
                <input type="hidden" id="svgData" name="svgData" value="">
                <ul>
                    <li><input type="checkbox" name="capConsent" id="capConsent" checked>
                        <?php echo "$get_sig_consent"; ?>
                    </li>
                    <li><input type="checkbox" name="rxAck" id="rxAck" checked>
                        <?php echo "$get_sig_ack"; ?>
                    </li>
                    <br>
                    <br>
                    <li><input type="checkbox" name="ptRefused" onchange="refused_toggled(this)">
                        <?php echo "$get_sig_refused"; ?>
                    </li>
                </ul>
            <?php require __DIR__ . "/page_footer.php"; ?>
        <div id="signature-pad" class="signature-pad container">
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
                </div>
            </div>
            <div id="canvas-wrapper" class="signature-pad--body">
              <canvas id="lol_sig_canvas" style="background-color: <?php echo "$get_sig_pad_color"; ?>"></canvas>
            </div>
            <div class="signature-pad--footer">
              <div class="description">Sign above</div>
                    <div class="signature-pad--actions">
                        <div class="column">
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
        </div>
        <script src="js/signature_pad.umd.min.js"></script>
        <script src="js/app.js"></script>
        <script src="js/bootstrap5.bundle.min.js></script>
    </body>
</html>
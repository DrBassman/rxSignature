<!doctype html>
<html class="no-js" lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rx Signature Collector</title>
        <link rel="stylesheet" href="css/foundation/foundation.css">
        <link rel="styledheet" href="css/foundation/app.css">
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
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <div class="grid-x">
                <div class="cell">
                    <div class="callout warning">
                        <p><?php echo "$get_sig_explanation"; ?></p>
                    </div>
                </div>
                <div class="cell">
                    <iframe src="<?php echo "input/$pdfChosen"; ?>" width="100%" height="480"></iframe>
                </div>
                <div class="cell">
                    <input type="hidden" name="mode" value="gen_pdf">
                    <input type="hidden" name="pdfChosen" value="<?php echo "$pdfChosen"; ?>">
                    <input type="hidden" name="pdfsChosen" value="<?php echo base64_encode(serialize($pdfsChosen)); ?>">
                    <input type="hidden" id="svgData" name="svgData" value="">
                    <div class="callout warning">
                        <ul class="no-bullet">
                            <li>
                                <label>
                                    <input type="checkbox" name="capConsent" id="capConsent" checked>
                                    <?php echo "$get_sig_consent"; ?>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="rxAck" id="rxAck" checked>
                                    <?php echo "$get_sig_ack"; ?>
                                </label>
                            </li>
                            <hr>
                            <li>
                                <label>
                                    <input type="checkbox" name="ptRefused" onchange="refused_toggled(this)">
                                    <?php echo "$get_sig_refused"; ?>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="cell">
                    <div id="signature-pad" class="signature-pad">
                        <div class="signature-pad--actions">
                            <div class="column">
                                Pen Color<br>
                                <div class="button-group">
                                <button type="button" class="button" data-action="red-pen" style="background-color: rgb(255,0,0);"></button>
                                <button type="button" class="button" data-action="green-pen" style="background-color: rgb(0,255,0);"></button>
                                <button type="button" class="button" data-action="blue-pen" style="background-color: rgb(0,0,192);"></button>
                                <button type="button" class="button" data-action="black-pen" style="background-color: rgb(0,0,0);"></button>
                                <button type="button" class="button" data-action="purple-pen" style="background-color: rgb(148,0,211);"></button>
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
                                    <div class="button-group hollow">
                                        <button type="button" class="button secondary" data-action="clear">Clear</button>
                                        <button type="button" class="button secondary" data-action="undo" title="Ctrl-Z">Undo</button>
                                        <button type="button" class="button secondary" data-action="redo" title="Ctrl-Y">Redo</button>
                                    </div>
                                </div>
                                <div class="column">
                                    <input type="submit" class="button hollow primary" value="Apply Signature">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <?php require __DIR__ . "/page_footer.php"; ?>
        <script src="js/signature_pad.umd.min.js"></script>
        <script src="js/app.js"></script>
        <script src="js/foundation/vendor/jquery.js"></script>
        <script src="js/foundation/vendor/what-input.js"></script>
        <script src="js/foundation/vendor/foundation.js"></script>
        <script src="js/foundation/app.js"></script>
    </body>
</html>
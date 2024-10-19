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
        <?php require __DIR__ . "/page_header.php"; ?>
        <?php 
            require __DIR__ . "/configfile.php";
            $pdfChosen = $_POST["pdfChosen"];
            $pdfsChosen = unserialize(base64_decode($_POST["pdfsChosen"]));
            $capConsent = $_POST["capConsent"];
            if(isset($_POST["ptRefused"])) {
                $ptRefused = $_POST["ptRefused"];
            } else {
                $ptRefused = FALSE;
            }
            $rxAck = $_POST["rxAck"];
            $svgData = $_POST["svgData"];

            date_default_timezone_set('America/Chicago');
            $curDtTime = time();
            $date = date('m/d/Y @ h:i:sa T', $curDtTime);
            $fileDate = date('Ymd-His', $curDtTime);
            use \setasign\Fpdi\Tcpdf\Fpdi;
            require_once('tcpdf/tcpdf.php');
            require_once('fpdi/src/autoload.php');
            $pdf = new Fpdi("p", "in", "letter" );
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            $pdf->SetAutoPageBreak(false, 0);
            $pageCount = $pdf->setSourceFile($input_dir . $pdfChosen);
            for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                $tplIdx = $pdf->importPage($pageNo);
                $size = $pdf->getTemplateSize($tplIdx);
                $width = $size['width'];
                $height = $size['height'];
                $pdf->AddPage($size['orientation'], $size);
                $pdf->useImportedPage($tplIdx);

                $pdf->Rect(0.375, $height - 2.625, 7.5, 2.1875, 'DF', '', $pdf_stamp_color);

                $pdf->ImageSVG('@' . $svgData, 0.5, $height - 1.375, 0, 0.9375);

                $pdf->SetFont('Helvetica');
                $pdf->SetXY(0, $height - 2.1875 - 0.25 + -0.375);
                $pdf->Write(0, "\n$date:\n");
                if ($ptRefused) {
                    $pdf->Write(0, "$get_sig_refused");
                } else {
                    $pdf->Write(0, "$get_sig_consent\n\n");
                    $pdf->Write(0, "$get_sig_ack");
                }
            }
            //ob_end_clean();
            $pdf->Output($output_dir . $fileDate . "-rxRctVerification.pdf", "F");
            //$pdf->Output($fileDate . "-rxRctVerification.pdf", "I");
            unlink($input_dir . $pdfChosen);
            if($remove_input_files) {
                foreach ($pdfsChosen as $file) {
                    unlink($input_dir . $file);
                }
            }
        ?>
        <div class="grid-x">
            <div class="cell">
                <div class="button-group hollow align-center">
                <!-- kludge -- will not work if output/ is not where files are created -->
                <a class="button secondary" href="<?php echo "output/{$fileDate}-rxRctVerification.pdf"?>">View signed Rx</a><br>
                <a class="button primary" href="<?php echo $_SERVER["REQUEST_URI"]; ?>">Capture another</a>
                </div>
            </div>
        </div>
        <?php require __DIR__ . "/page_footer.php"; ?>
        <script src="js/foundation/vendor/jquery.js"></script>
        <script src="js/foundation/vendor/what-input.js"></script>
        <script src="js/foundation/vendor/foundation.js"></script>
        <script src="js/foundation/app.js"></script>
    </body>
</html>
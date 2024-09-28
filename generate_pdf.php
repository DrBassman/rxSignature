<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/bootstrap5.min.css">
    </head>
    <body>
        <?php require __DIR__ . "/page_header.php"; ?>
        <?php 
            require __DIR__ . "/configfile.php";
            $pdfChosen = $_POST["pdfChosen"];
            $pdfsChosen = unserialize(base64_decode($_POST["pdfsChosen"]));
            $capConsent = $_POST["capConsent"];
            $ptRefused = $_POST["ptRefused"];
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
        <!-- kludge -- will not work if output/ is not where files are created -->
        <a href="<?php echo "output/{$fileDate}-rxRctVerification.pdf"?>">Signature successfully captured.</a><br>
        <a href="<?php echo $_SERVER["REQUEST_URI"]; ?>">Capture another</a>
        <?php require __DIR__ . "/page_footer.php"; ?>
        <script src="js/bootstrap5.bundle.min.js"></script>
    </body>
</html>
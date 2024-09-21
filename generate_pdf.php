<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    </head>
    <body>
        <?php require __DIR__ . "/page_header.php"; ?>
        <?php 
            $pdfChosen = $_POST["pdfChosen"];
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
            $pdf->AddPage();
            $pdf->setSourceFile(__DIR__ . "/input/" . $pdfChosen);
            $tplIdx = $pdf->importPage(1);
            $pdf->useImportedPage($tplIdx);

            $pdf->Rect(0.375, 8.875, 7.5, 2.375, 'DF', '', array(249, 226, 51));

            $pdf->ImageSVG('@' . $svgData, 0.5,10, 2.5);

            $pdf->SetFont('Helvetica');
            $pdf->SetXY(0, 8.6875);
            $pdf->Write(0, "\n$date:\n");
            if ($ptRefused) {
                $pdf->Write(0, "I certify that the patient or guardian REFUSED to sign acknowlegment receipt.");
            } else {
                $pdf->Write(0, "1)  I consent for my signature to be electronically captured and affixed to the copy of my prescription shown here.\n\n");
                $pdf->Write(0, "2)  I confirm that my prescription was issued to me, in my preferred medium, at the conclusion of my examination.");
            }
            //ob_end_clean();
            $pdf->Output(__DIR__ . "/output/" . $fileDate . "-rxRctVerification.pdf", "F");
            //$pdf->Output($fileDate . "-rxRctVerification.pdf", "I");
            unlink(__DIR__ . "/input/" . $pdfChosen);
        ?>
        <a href="output/<?php echo "{$fileDate}-rxRctVerification.pdf"?>">Signature successfully captured.</a><br>
        <a href="/rxSignature/">Capture another</a>
 <?php require __DIR__ . "/page_footer.php"; ?>
        </body>
</html>
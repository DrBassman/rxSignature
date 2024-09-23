<?php
    $input_dir = __DIR__ . "/input/";
    $output_dir = __DIR__ . "/output/";
    $remove_input_files = false;
    $app_name = "Signatures for Rx's"; // Shown at the top of all pages.
    $app_tag = "Compliance with rules, which are unconstitutionally enforced as laws, written by unelected, unaccountable bureaucrats.";
    $get_sig_consent = "I consent for my signature to be electronically captured and affixed to the copy of my prescription(s) shown here.";
    $get_sig_ack = "I confirm that a copy of this prescription was issued to me at the conclusion of my refractive examination.";
    $get_sig_refused = "I certify that the patient REFUSED to sign this/these prescriptions.";
    $get_sig_pad_color = "rgb(249, 226, 51);";
    $pdf_stamp_color = array(249, 226, 51); // RGB color for signature "stamp"
    $get_sig_explanation = "
        To comply with 16 CFR Part 456 ophthalmic practice rule June, 2024;
        and to comply with 16 CFR Part 315 contact lens rule July, 2004 (rules);
        YOUR_NAME_HERE is required to have the patient sign a copy of their
        prescription at the conclusion of their examination.
        YOUR_NAME_HERE is required by the rules to keep the receipts on file for three years.
        Losh Optometry LLC developed this paperless method to comply with these rules.
    ";
?>

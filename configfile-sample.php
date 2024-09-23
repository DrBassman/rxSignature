<?php
    $input_dir = __DIR__ . "/input/";
    $output_dir = __DIR__ . "/output/";
    $remove_input_files = false;
    $app_name = "Signatures for Rx's"; // Shown at the top of all pages.
    $app_tag = "Compliance with rules, which are unconstitutionally enforced as laws, written by unelected, unaccountable bureaucrats.";
    $get_sig_consent = "I consent for my signature to be electronically captured and affixed to the copy of my prescription(s) shown here.";
    $get_sig_ack = "I confirm that this prescription was issued to me, in my preferred medium, at the conclusion of my examination.";
    $get_sig_refused = "I certify that the patient REFUSED to sign this/these prescriptions.";
    $get_sig_pad_color = "rgb(249, 226, 51);";
    $pdf_stamp_color = array(249, 226, 51); // RGB color for signature "stamp"
    $get_sig_explanation = "
        To comply with 16 CFR Part 456 ophthalmic practice rule June, 2024;
        and to comply with 16 CFR Part 315 contact lens rule July, 2004 (rules);
        Losh Optometry LLC is required to have the patient sign a copy of their
        prescription at the conclusion of their examination.
        Losh Optometry LLC is required by the rules to keep the receipts on file for three years.
        Losh Optometry LLC has developed this paperless method to comply with these rules.
    ";
?>
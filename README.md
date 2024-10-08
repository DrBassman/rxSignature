This application will allow you to comply with the FTC "contact lens rule", as well as their "eyeglass Rx rule".

Background:  The founders draft the US Constitution.  The Constitution explicitly gives the senate and house of representatives the power to write and enact laws.  The same Constitution explicitly PROHIBITS the senate and house of representatives from granting or allowing others to write and enact laws.  Furthermore, any
legislation requires the US president to sign the law into being.

Sometime between 1783 and today, congress successfully gave their power to legislate to the bureaucrats.  This unconstituional grant of power has resulted in the Federal registry, which contains countless thousands of "rules" that are enforced as though they are "laws".

Anyway, I digress, Starting 09/2024, all who issue prescriptions for eyeglasses and contact lenses are compelled by this unconstituional madness to begin acting as signature gatherers...Every time an eyeglass or contact lens prescription is issued, the provider (whether an optometrist, or an ophthalmologist, UNLESS THEY ARE EMPLOYED BY THE US FEDERAL GOVERNMENT) are compelled to have the patient to whom the Rx is issued sign a statement that they received a copy of their Rx at the conclusion of their refractive or contact lens examination.  This signed receipt MUST be kept by the provider FOR THREE YEARS!  Nevermind the fact that most eyeglass and contact lens Rx's ARE ONLY VALID FOR ONE YEAR!!!!!

This app is my attempt to comply with the above bu|_|_$hit!!!!  The above fertilizer is also the reason our practice increased the fee for a refractive or contact lens examination
THE DAY IT unconstitutionally took effect.

All of the source code is here.  It is Copyright (C) 10/2024 Ryan K. Losh, ALL RIGHTS RESERVED.  It is offered here, 'as is', with NO WARRANTY, NO CLAIM OF FITNESS FOR A PARTICULAR PURPOSE.  It is FREE for others to download, use, and to modify as you see fit, WITHOUT CHARGE, provided all copyright notices are left in tact, etc.

This code contains the following third party software packages.
* Bootstrap:  For more information, see their website at https://getbootstrap.com/
* signature_pad:  For more information, see their project at https://github.com/szimek/signature_pad

This code depends on the following third party PHP modules.  These need to be installed somewhere in the php 'include_path'.
* tcpdf:  Code can be downloaded from https://tcpdf.org/
* FPDI:  Code can be downloaded from https://www.setasign.com/products/fpdi/about/

How it works:  you need a web server with PHP.  Presumably, your existing electronic health record (EHR) will produce a PDF copy of the patient's prescription, and you can place those PDF files in a directory that the web server can read.  The first page of the app allows you to pick which files in that directory are to be signed.  After selecting one or more files to sign, the application will combine those Rx's into a single PDF which is displayed on the screen, and the patient is then able to apply their signature in the yellow square at the bottom.  When submit is pressed on this screen, the signature is applied to each of the Rx's.  The original Rx is (optionally) removed, and the resulting "signed" Rx is stored in a different directory, with the date and time stamp contained in the file name.

We developed it using XAMPP on a Linux system running Mint Linux 22.  We verified that it functions on Windows XAMPP.  See the INSTALL file for more details...

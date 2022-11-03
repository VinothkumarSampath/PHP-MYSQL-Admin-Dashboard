<?php
ob_start();
// We'll be outputting a PDF
header('Content-type: application/pdf');

// It will be called downloaded.pdf
header('Content-Disposition: attachment; filename="Logilab-ELN-General-Brochure.pdf"');

// The PDF source is in original.pdf
readfile('https://camsinfotech.co.in/logilab-eln/Logilab-ELN-General-Brochure.pdf');
?>
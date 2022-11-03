<?php
ob_start();
// We'll be outputting a PDF
header('Content-type: application/pdf');

// It will be called downloaded.pdf
header('Content-Disposition: attachment; filename="ELN-Product-Notes.pdf"');

// The PDF source is in original.pdf
readfile('https://camsinfotech.co.in/logilab-eln/ELN-Product-Notes.pdf');
?>
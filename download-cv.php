<?php
$file = __DIR__ . '/assets/files/CV_FATOMBI_Marius.pdf';
if (!file_exists($file)) {
    http_response_code(404);
    exit('CV introuvable');
}
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="CV_FATOMBI_Marius_Akomedi.pdf"');
header('Content-Length: ' . filesize($file));
readfile($file);
exit;
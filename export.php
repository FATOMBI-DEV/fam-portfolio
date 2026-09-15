<?php
// export.php
// Renders the PHP site to a static `dist/` folder and copies assets.

chdir(__DIR__);
// capture output of index.php
ob_start();
// ensure script behaves like front page
$_SERVER['REQUEST_METHOD'] = 'GET';
$_SERVER['REQUEST_URI'] = '/';
require __DIR__ . '/index.php';
$html = ob_get_clean();

// Fix download links that relied on PHP endpoints
$html = str_replace(['/download-cv', '/portfolio/download-cv'], ['assets/files/CV_FATOMBI_Marius.pdf', 'assets/files/CV_FATOMBI_Marius.pdf'], $html);

$dist = __DIR__ . '/dist';
if (!is_dir($dist)) mkdir($dist, 0755, true);
file_put_contents($dist . '/index.html', $html);

function rr_copy($src, $dst) {
    $dir = opendir($src);
    @mkdir($dst);
    while(false !== ($file = readdir($dir))) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {
                rr_copy($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

// copy assets
if (is_dir(__DIR__ . '/assets')) {
    rr_copy(__DIR__ . '/assets', $dist . '/assets');
}

// copy files (pdfs)
if (is_dir(__DIR__ . '/assets/files')) {
    @mkdir($dist . '/assets/files', 0755, true);
    rr_copy(__DIR__ . '/assets/files', $dist . '/assets/files');
}

echo "Static export complete. Output: dist/index.html\n";

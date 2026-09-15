<?php
require_once __DIR__ . '/../classes/Model.php';
require_once __DIR__ . '/../classes/Profile.php';
require_once __DIR__ . '/../classes/Project.php';
require_once __DIR__ . '/../classes/Skill.php';
require_once __DIR__ . '/../classes/Experience.php';

$profileModel = new Profile();
$profile = $profileModel->get();

/*function base_url(string $path = ''): string {
    static $base = null;
    if ($base === null) {
        $cfg  = require __DIR__ . '/config.php';
        $base = rtrim($cfg['site']['url'], '/');
    }
    return $base . '/' . ltrim($path, '/');
}

function url(string $path = ''): string {
    return base_url($path);
}*/
?>


<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($profile['full_name']) ?> — <?= htmlspecialchars($profile['title']) ?></title>
<meta name="description" content="<?= htmlspecialchars($profile['short_bio']) ?>">
<link rel="icon" type="image/png" href="assets/img/logo.png">
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
  theme: {
    extend: {
      colors: {
        brand: {
          50:'#eff6ff',100:'#dbeafe',200:'#bfdbfe',300:'#93c5fd',
          400:'#60a5fa',500:'#3b82f6',600:'#2563eb',700:'#1d4ed8',
          800:'#1e40af',900:'#1e3a8a'
        }
      },
      fontFamily: { sans: ['Inter','system-ui','sans-serif'] }
    }
  }
}
</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="font-sans min-h-screen text-white antialiased bg-[#0a1e3f] overflow-x-hidden">

<!-- Fond dégradé animé -->
<div class="fixed inset-0 -z-20 bg-gradient-to-br from-[#0a1e3f] via-[#153a6e] to-[#1e5ba8]"></div>
<div class="fixed inset-0 -z-10 pointer-events-none overflow-hidden">
  <div class="absolute -top-40 -left-40 w-[500px] h-[500px] bg-brand-400/20 rounded-full blur-[120px] animate-pulse-slow"></div>
  <div class="absolute -bottom-40 -right-40 w-[500px] h-[500px] bg-white/10 rounded-full blur-[120px] animate-pulse-slow"></div>
  <div class="absolute top-1/2 left-1/2 w-[400px] h-[400px] bg-brand-300/10 rounded-full blur-[120px]"></div>
</div>
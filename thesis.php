<?php
require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/classes/Model.php';
require_once __DIR__ . '/classes/Profile.php';

$profile = (new Profile())->get();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mémoire de Licence — <?= htmlspecialchars($profile['full_name']) ?></title>
<meta name="description" content="Consultation en lecture seule du mémoire de Licence professionnelle en Sciences Informatiques.">
<meta name="robots" content="noindex, nofollow">
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
<body class="font-sans min-h-screen text-white antialiased bg-[#0a1e3f] overflow-x-hidden"
      oncontextmenu="return false;">

<!-- Fonds décoratifs -->
<div class="fixed inset-0 -z-20 bg-gradient-to-br from-[#0a1e3f] via-[#153a6e] to-[#1e5ba8]"></div>
<div class="fixed inset-0 -z-10 pointer-events-none overflow-hidden">
  <div class="absolute -top-40 -left-40 w-[500px] h-[500px] bg-brand-400/20 rounded-full blur-[120px] animate-pulse-slow"></div>
  <div class="absolute -bottom-40 -right-40 w-[500px] h-[500px] bg-white/10 rounded-full blur-[120px] animate-pulse-slow"></div>
</div>

<!-- Navbar simplifiée -->
<header class="fixed top-0 inset-x-0 z-50 backdrop-blur-xl bg-white/5 border-b border-white/10">
  <nav class="max-w-6xl mx-auto flex items-center justify-between p-4">
    <a href="/portfolio/" class="flex items-center gap-3">
      <img src="assets/img/<?= htmlspecialchars($profile['logo'] ?? 'logo.png') ?>"
           alt="Logo" class="w-9 h-9 object-contain">
      <span class="font-bold text-white hidden sm:inline">
        <?= htmlspecialchars($profile['full_name']) ?>
      </span>
    </a>
    <a href="/portfolio/"
       class="text-xs px-4 py-2 rounded-lg bg-white/10 border border-white/20 hover:bg-white/20 transition inline-flex items-center gap-2">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
      </svg>
      Retour au portfolio
    </a>
  </nav>
</header>

<main class="pt-28 pb-20 max-w-6xl mx-auto px-4">

  <header class="mb-8">
    <h1 class="text-3xl md:text-4xl font-bold">
      Mémoire de <span class="text-brand-300">Licence professionnelle</span>
    </h1>
    <p class="text-brand-100/80 mt-3 max-w-3xl leading-relaxed">
      <strong>Sujet :</strong> Conception et réalisation d'une application web et mobile.<br>
      Soutenu le <strong>03 juin 2026</strong> — mention <strong>Excellente</strong>.<br>
      <span class="text-brand-200/70 text-sm">
        Document consultable en lecture seule. Reproduction interdite sans autorisation.
      </span>
    </p>
  </header>

  <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl p-6">

    <!-- Barre d'outils -->
    <div class="flex items-center justify-between flex-wrap gap-4 mb-5">
      <div class="flex items-center gap-3">
        <span class="w-10 h-10 rounded-lg bg-brand-300/20 flex items-center justify-center shrink-0">
          <svg class="w-5 h-5 text-brand-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
          </svg>
        </span>
        <div class="min-w-0">
          <p class="font-medium truncate">Memoire_Licence_<?= preg_replace('/\s+/','_', $profile['full_name']) ?>.pdf</p>
          <p class="text-xs text-brand-200/70">Lecture seule • Téléchargement désactivé</p>
        </div>
      </div>

      <div class="flex gap-2">
        <button id="zoomOut" title="Zoom -"
          class="w-10 h-10 rounded-lg bg-white/10 border border-white/20 hover:bg-white/20 transition flex items-center justify-center">−</button>
        <button id="zoomIn" title="Zoom +"
          class="w-10 h-10 rounded-lg bg-white/10 border border-white/20 hover:bg-white/20 transition flex items-center justify-center">+</button>
        <button id="fullscreenBtn"
          class="px-4 h-10 rounded-lg bg-white/10 border border-white/20 hover:bg-white/20 transition text-sm">
          ⛶ Plein écran
        </button>
      </div>
    </div>

    <!-- Visionneuse -->
    <div id="viewer"
         class="relative w-full h-[78vh] rounded-xl overflow-hidden bg-black/50 select-none"
         oncontextmenu="return false;">

      <iframe id="pdfFrame"
              src="assets/files/memoire.pdf#toolbar=0&navpanes=0&scrollbar=1&view=FitH&zoom=100"
              class="w-full h-full"
              type="application/pdf">
        <p class="p-6 text-brand-100">
          Votre navigateur ne supporte pas l'affichage PDF intégré.
          <a href="assets/files/memoire.pdf" class="underline">Ouvrir le PDF</a>
        </p>
      </iframe>

      <!-- Filigrane anti-copie -->
      <div class="absolute inset-0 pointer-events-none flex items-center justify-center overflow-hidden">
        <span class="text-white/[0.06] text-4xl md:text-6xl font-bold rotate-[-30deg] tracking-widest whitespace-nowrap">
          FATOMBI MARIUS — CONFIDENTIEL
        </span>
      </div>
    </div>

    <p class="text-xs text-brand-200/60 mt-4 flex items-center gap-2">
      <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
      </svg>
      Document protégé. Toute reproduction est interdite sans autorisation écrite de l'auteur.
    </p>
  </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

<script src="assets/js/thesis.js"></script>
<script>
  /* Zoom + / − */
  let zoom = 100;
  const frame = document.getElementById('pdfFrame');
  const updateZoom = () => {
    frame.src = `assets/files/memoire.pdf#toolbar=0&navpanes=0&scrollbar=1&view=FitH&zoom=${zoom}`;
  };
  document.getElementById('zoomIn') ?.addEventListener('click', () => {
    zoom = Math.min(zoom + 25, 300); updateZoom();
  });
  document.getElementById('zoomOut')?.addEventListener('click', () => {
    zoom = Math.max(zoom - 25, 50);  updateZoom();
  });

  /* Plein écran */
  document.getElementById('fullscreenBtn')?.addEventListener('click', () => {
    const v = document.getElementById('viewer');
    if (v.requestFullscreen) v.requestFullscreen();
    else if (v.webkitRequestFullscreen) v.webkitRequestFullscreen();
  });

  /* Blocage des raccourcis sensibles */
  document.addEventListener('keydown', e => {
    const k = e.key.toLowerCase();
    if ((e.ctrlKey || e.metaKey) && ['s','p','u','c'].includes(k)) e.preventDefault();
    if (k === 'f12') e.preventDefault();
    if (e.ctrlKey && e.shiftKey && ['i','j','c'].includes(k)) e.preventDefault();
  });

  /* Blocage copier / drag */
  ['copy','cut','dragstart','selectstart'].forEach(ev =>
    document.addEventListener(ev, e => {
      if (e.target.closest('#viewer')) e.preventDefault();
    })
  );
</script>
</body>
</html>
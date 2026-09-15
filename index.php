<?php require_once __DIR__ . '/includes/header.php';

$projectModel = new Project();
$skillModel   = new Skill();
$expModel     = new Experience();

$projects    = $projectModel->findAll();
$skills      = $skillModel->grouped();
$experiences = $expModel->byType('experience');
$education   = $expModel->byType('education');
$others      = $expModel->byType('other');
?>

<!-- NAVBAR -->
<header class="fixed top-0 inset-x-0 z-50 backdrop-blur-xl bg-white/5 border-b border-white/10">
  <nav class="max-w-6xl mx-auto flex items-center justify-between p-4">
    <a data-nav="home" class="cursor-pointer flex items-center gap-3">
      <img src="assets/img/<?= htmlspecialchars($profile['logo']) ?>" alt="Logo" class="w-11 h-11 object-contain">
      <span class="font-bold text-white hidden sm:inline">FAM<span class="text-brand-300">.</span></span>
    </a>

    <ul class="hidden md:flex items-center gap-1 text-sm">
      <?php foreach ([
        'home'=>'Accueil','about'=>'À propos','skills'=>'Compétences',
        'projects'=>'Projets','resume'=>'Parcours','thesis'=>'Mémoire','contact'=>'Contact'
      ] as $id=>$label): ?>
      <li>
        <a data-nav="<?= $id ?>" class="nav-link cursor-pointer px-4 py-2 rounded-lg transition hover:bg-white/10">
          <?= $label ?>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>

    <div class="flex items-center gap-2">
      <a href="/download-cv"
         class="hidden sm:inline-flex items-center gap-2 text-xs px-4 py-2 rounded-lg bg-white/10 border border-white/20 hover:bg-white/20 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>
        CV
      </a>
      
      <button id="menuBtn" class="md:hidden p-2 rounded-lg bg-white/10 border border-white/20">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
      </button>
    </div>
  </nav>
  <div id="mobileMenu" class="md:hidden hidden px-4 pb-4 space-y-1 text-sm">
    <?php foreach (['home'=>'Accueil','about'=>'À propos','skills'=>'Compétences',
                    'projects'=>'Projets','resume'=>'Parcours','thesis'=>'Mémoire','contact'=>'Contact'] as $id=>$l): ?>
      <a data-nav="<?= $id ?>" class="nav-link block px-4 py-2 rounded-lg hover:bg-white/10 cursor-pointer"><?= $l ?></a>
    <?php endforeach; ?>
    <a href="/download-cv" class="block px-4 py-2 rounded-lg bg-white/10 text-center">Télécharger CV</a>
  </div>
</header>

<main class="pt-28 pb-20 max-w-6xl mx-auto px-4">

<!-- ========== ACCUEIL ========== -->
<section id="home" class="page-section">
  <div class="grid md:grid-cols-2 gap-8 items-center">
    <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-3xl p-8 md:p-10">
      <p class="text-brand-200 tracking-[0.3em] text-xs mb-4">DÉVELOPPEUR WEB & MOBILE</p>
      <h1 class="text-4xl md:text-5xl font-bold leading-tight">
        Bonjour, je suis
        <span class="block mt-2 bg-gradient-to-r from-white via-brand-200 to-white bg-clip-text text-transparent">
          <?= htmlspecialchars($profile['full_name']) ?>
        </span>
      </h1>
      <p class="mt-5 text-brand-100/90 leading-relaxed">
        <?= htmlspecialchars($profile['short_bio']) ?>
      </p>
      <div class="mt-7 flex flex-wrap gap-3">
        <a data-nav="projects" class="cursor-pointer px-6 py-3 rounded-xl bg-white text-brand-800 font-semibold hover:bg-brand-50 transition shadow-lg shadow-brand-900/30">
          Voir mes projets
        </a>
        <a data-nav="contact" class="cursor-pointer px-6 py-3 rounded-xl bg-white/10 border border-white/20 hover:bg-white/20 transition">
          Me contacter
        </a>
      </div>
      <div class="mt-8 flex items-center gap-4 text-sm text-brand-100/70">
        <span class="inline-flex items-center gap-2">
          <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
          <?= htmlspecialchars($profile['availability']) ?>
        </span>
        <span>•</span>
        <span><?= htmlspecialchars($profile['city']) ?></span>
      </div>
    </div>

    <div class="relative">
      <div class="absolute inset-0 bg-gradient-to-tr from-brand-400/30 to-white/10 rounded-3xl blur-2xl"></div>
      <div class="relative backdrop-blur-xl bg-white/5 border border-white/10 rounded-3xl p-4">
        <img src="assets/img/<?= htmlspecialchars($profile['photo']) ?>"
             alt="<?= htmlspecialchars($profile['full_name']) ?>"
             class="w-full aspect-square object-cover rounded-2xl">
      </div>
    </div>
  </div>
</section>

<!-- ========== À PROPOS ========== -->
<section id="about" class="page-section hidden">
  <h2 class="text-3xl md:text-4xl font-bold mb-8">À propos <span class="text-brand-300">de moi</span></h2>
  <div class="grid md:grid-cols-3 gap-6">
    <div class="md:col-span-2 backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl p-8">
      <p class="text-brand-100/90 leading-relaxed whitespace-pre-line"><?= htmlspecialchars($profile['long_bio']) ?></p>
      <div class="grid grid-cols-2 gap-4 mt-8 text-sm">
        <div><p class="text-brand-200 text-xs uppercase tracking-wider mb-1">Nom</p><p><?= htmlspecialchars($profile['full_name']) ?></p></div>
        <div><p class="text-brand-200 text-xs uppercase tracking-wider mb-1">Naissance</p><p><?= date('d/m/Y', strtotime($profile['birth_date'])) ?></p></div>
        <div><p class="text-brand-200 text-xs uppercase tracking-wider mb-1">Lieu</p><p><?= htmlspecialchars($profile['birth_place']) ?></p></div>
        <div><p class="text-brand-200 text-xs uppercase tracking-wider mb-1">Nationalité</p><p><?= htmlspecialchars($profile['nationality']) ?></p></div>
        <div><p class="text-brand-200 text-xs uppercase tracking-wider mb-1">Téléphone</p><p><?= htmlspecialchars($profile['phone']) ?></p></div>
        <div><p class="text-brand-200 text-xs uppercase tracking-wider mb-1">Email</p><p class="break-all"><?= htmlspecialchars($profile['email']) ?></p></div>
      </div>
    </div>
    <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl p-6 space-y-4">
      <h3 class="font-semibold text-lg">Contact rapide</h3>
      <a href="tel:<?= htmlspecialchars($profile['phone']) ?>" class="flex items-center gap-3 p-3 rounded-xl bg-white/5 hover:bg-white/10 transition">
        <svg class="w-5 h-5 text-brand-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
        <span class="text-sm"><?= htmlspecialchars($profile['phone']) ?></span>
      </a>
      <a href="mailto:<?= htmlspecialchars($profile['email']) ?>" class="flex items-center gap-3 p-3 rounded-xl bg-white/5 hover:bg-white/10 transition">
        <svg class="w-5 h-5 text-brand-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
        <span class="text-sm break-all"><?= htmlspecialchars($profile['email']) ?></span>
      </a>
      <?php if ($profile['whatsapp']): ?>
      <a href="https://wa.me/<?= preg_replace('/\D/','',$profile['whatsapp']) ?>" target="_blank" class="flex items-center gap-3 p-3 rounded-xl bg-green-500/10 border border-green-400/20 hover:bg-green-500/20 transition">
        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
        <span class="text-sm">WhatsApp</span>
      </a>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ========== COMPÉTENCES ========== -->
<section id="skills" class="page-section hidden">
  <h2 class="text-3xl md:text-4xl font-bold mb-8">Mes <span class="text-brand-300">compétences</span></h2>
  <div class="grid md:grid-cols-2 gap-6">
    <?php foreach ($skills as $cat => $list): ?>
    <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl p-6">
      <h3 class="text-xs font-semibold tracking-[0.2em] text-brand-200 mb-6 uppercase"><?= htmlspecialchars($cat) ?></h3>
      <?php foreach ($list as $s): ?>
      <div class="mb-5 last:mb-0">
        <div class="flex justify-between text-sm mb-2">
          <span><?= htmlspecialchars($s['name']) ?></span>
          <span class="text-brand-200 font-medium"><?= (int)$s['level'] ?>%</span>
        </div>
        <div class="h-1.5 bg-white/10 rounded-full overflow-hidden">
          <div class="skill-bar h-full bg-gradient-to-r from-brand-300 to-white rounded-full" data-level="<?= (int)$s['level'] ?>" style="width:0%"></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ========== PROJETS ========== -->
<section id="projects" class="page-section hidden">
  <div class="flex items-end justify-between mb-8 flex-wrap gap-4">
    <h2 class="text-3xl md:text-4xl font-bold">Mes <span class="text-brand-300">projets</span></h2>
    <div class="flex gap-2 text-xs" id="projectFilters">
      <button data-filter="all" class="filter-btn px-4 py-2 rounded-lg bg-white/10 border border-white/20 hover:bg-white/20 transition">Tous</button>
      <button data-filter="web" class="filter-btn px-4 py-2 rounded-lg bg-white/5 border border-white/10 hover:bg-white/20 transition">Web</button>
      <button data-filter="mobile" class="filter-btn px-4 py-2 rounded-lg bg-white/5 border border-white/10 hover:bg-white/20 transition">Mobile</button>
      <button data-filter="autre" class="filter-btn px-4 py-2 rounded-lg bg-white/5 border border-white/10 hover:bg-white/20 transition">Autres</button>
    </div>
  </div>

  <?php if (empty($projects)): ?>
  <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl p-12 text-center">
    <p class="text-brand-100/70">Les projets seront bientôt disponibles.</p>
    <p class="text-sm text-brand-200/50 mt-2">Portfolio en cours de finalisation</p>
  </div>
  <?php else: ?>
  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" id="projectsGrid">
    <?php foreach ($projects as $p): ?>
    <article class="project-card backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl overflow-hidden hover:bg-white/10 hover:border-white/20 transition group"
             data-category="<?= htmlspecialchars($p['category']) ?>">
      <?php if ($p['image']): ?>
        <div class="overflow-hidden h-44">
          <img src="assets/img/projects/<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['title']) ?>"
               class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
        </div>
      <?php else: ?>
        <div class="h-44 bg-gradient-to-br from-brand-600/40 to-brand-300/20 flex items-center justify-center">
          <svg class="w-12 h-12 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        </div>
      <?php endif; ?>
      <div class="p-5">
        <?php if ($p['featured']): ?>
          <span class="inline-block text-[10px] uppercase tracking-widest text-brand-900 bg-brand-200 px-2 py-0.5 rounded mb-2">★ En vedette</span>
        <?php endif; ?>
        <span class="text-[10px] uppercase tracking-widest text-brand-200"><?= htmlspecialchars($p['category']) ?></span>
        <h3 class="text-lg font-semibold mt-1"><?= htmlspecialchars($p['title']) ?></h3>
        <p class="text-sm text-brand-100/80 mt-2 line-clamp-3"><?= htmlspecialchars($p['description']) ?></p>
        <p class="text-xs text-brand-200/70 mt-3"><?= htmlspecialchars($p['technologies']) ?></p>
        <div class="flex gap-4 mt-4 text-sm">
          <?php if ($p['github_url']): ?>
          <a href="<?= htmlspecialchars($p['github_url']) ?>" target="_blank" class="text-brand-200 hover:text-white inline-flex items-center gap-1">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.438 9.8 8.205 11.387.6.113.82-.26.82-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.09-.745.083-.73.083-.73 1.205.085 1.838 1.236 1.838 1.236 1.07 1.835 2.807 1.305 3.492.997.108-.776.418-1.305.762-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.467-2.38 1.235-3.22-.123-.303-.535-1.523.117-3.176 0 0 1.008-.322 3.3 1.23a11.5 11.5 0 013.003-.404c1.02.005 2.047.138 3.006.404 2.29-1.552 3.297-1.23 3.297-1.23.653 1.653.24 2.873.118 3.176.768.84 1.234 1.91 1.234 3.22 0 4.61-2.804 5.625-5.476 5.921.43.37.813 1.102.813 2.222v3.293c0 .32.216.694.825.576C20.565 21.795 24 17.298 24 12c0-6.63-5.37-12-12-12z"/></svg>
            Code
          </a>
          <?php endif; ?>
          <?php if ($p['demo_url']): ?>
          <a href="<?= htmlspecialchars($p['demo_url']) ?>" target="_blank" class="text-brand-200 hover:text-white inline-flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            Démo
          </a>
          <?php endif; ?>
        </div>
      </div>
    </article>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>
</section>

<!-- ========== PARCOURS ========== -->
<section id="resume" class="page-section hidden">
  <h2 class="text-3xl md:text-4xl font-bold mb-8">Mon <span class="text-brand-300">parcours</span></h2>
  <div class="grid md:grid-cols-2 gap-6">
    <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl p-6">
      <h3 class="text-lg font-semibold mb-6 flex items-center gap-2">
        <span class="w-8 h-8 rounded-lg bg-brand-300/20 flex items-center justify-center">💼</span>
        Expériences
      </h3>
      <?php foreach ($experiences as $e): ?>
      <div class="mb-6 last:mb-0 border-l-2 border-brand-300/40 pl-5 relative">
        <span class="absolute -left-[7px] top-1 w-3 h-3 rounded-full bg-brand-300"></span>
        <p class="text-xs text-brand-200">
          <?= date('m/Y', strtotime($e['start_date'])) ?> — <?= $e['end_date'] ? date('m/Y', strtotime($e['end_date'])) : 'Présent' ?>
        </p>
        <p class="font-semibold mt-1"><?= htmlspecialchars($e['title']) ?></p>
        <p class="text-sm text-brand-100/80"><?= htmlspecialchars($e['company']) ?><?= $e['city'] ? ' • '.htmlspecialchars($e['city']) : '' ?></p>
        <?php if ($e['description']): ?>
          <p class="text-sm text-brand-100/70 mt-2"><?= nl2br(htmlspecialchars($e['description'])) ?></p>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl p-6">
      <h3 class="text-lg font-semibold mb-6 flex items-center gap-2">
        <span class="w-8 h-8 rounded-lg bg-brand-300/20 flex items-center justify-center">🎓</span>
        Formations
      </h3>
      <?php foreach ($education as $e): ?>
      <div class="mb-6 last:mb-0 border-l-2 border-brand-300/40 pl-5 relative">
        <span class="absolute -left-[7px] top-1 w-3 h-3 rounded-full bg-brand-300"></span>
        <p class="text-xs text-brand-200">
          <?= date('Y', strtotime($e['start_date'])) ?> — <?= $e['end_date'] ? date('Y', strtotime($e['end_date'])) : 'Présent' ?>
        </p>
        <p class="font-semibold mt-1"><?= htmlspecialchars($e['title']) ?></p>
        <p class="text-sm text-brand-100/80"><?= htmlspecialchars($e['company']) ?></p>
        <?php if ($e['description']): ?>
          <p class="text-sm text-brand-100/70 mt-2"><?= nl2br(htmlspecialchars($e['description'])) ?></p>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>

      <?php if (!empty($others)): ?>
      <h3 class="text-lg font-semibold mt-8 mb-6 flex items-center gap-2">
        <span class="w-8 h-8 rounded-lg bg-brand-300/20 flex items-center justify-center">⭐</span>
        Autres formations
      </h3>
      <?php foreach ($others as $e): ?>
      <div class="mb-4 last:mb-0 border-l-2 border-brand-300/40 pl-5 relative">
        <span class="absolute -left-[7px] top-1 w-3 h-3 rounded-full bg-brand-300"></span>
        <p class="font-semibold"><?= htmlspecialchars($e['title']) ?></p>
        <p class="text-sm text-brand-100/80"><?= htmlspecialchars($e['company']) ?><?= $e['city'] ? ' • '.htmlspecialchars($e['city']) : '' ?></p>
      </div>
      <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>

  <div class="mt-8 backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl p-6 flex items-center justify-between flex-wrap gap-4">
    <div>
      <h3 class="font-semibold">Curriculum Vitae complet</h3>
      <p class="text-sm text-brand-100/70 mt-1">Téléchargez mon CV au format PDF</p>
    </div>
    <a href="/portfolio/download-cv" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white text-brand-800 font-medium hover:bg-brand-50 transition">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>
      Télécharger le CV
    </a>
  </div>
</section>

<!-- ========== MÉMOIRE ========== -->
<section id="thesis" class="page-section hidden">
  <h2 class="text-3xl md:text-4xl font-bold mb-4">Mémoire de <span class="text-brand-300">Licence</span></h2>
  <p class="text-brand-100/80 mb-8 max-w-3xl">
    Consultation en <strong>lecture seule</strong>. Conception et réalisation d'une application web et mobile —
    soutenu le 03/06/2026, mention Excellente.
  </p>

  <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl p-6">
    <div class="flex items-center justify-between flex-wrap gap-4 mb-5">
      <div class="flex items-center gap-3">
        <span class="w-10 h-10 rounded-lg bg-brand-300/20 flex items-center justify-center">
          <svg class="w-5 h-5 text-brand-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
        </span>
        <div>
          <p class="font-medium">Mémoire_Licence_FATOMBI_Marius.pdf</p>
          <p class="text-xs text-brand-200/70">Lecture seule • Téléchargement désactivé</p>
        </div>
      </div>
      <button id="thesisFullscreen" class="px-4 py-2 rounded-lg bg-white/10 border border-white/20 hover:bg-white/20 transition text-sm">
        ⛶ Plein écran
      </button>
    </div>

    <div id="thesisViewer"
         class="relative w-full h-[75vh] rounded-xl overflow-hidden bg-black/40 select-none"
         oncontextmenu="return false;">
      <iframe id="thesisFrame"
              src="assets/files/memoire.pdf#toolbar=0&navpanes=0&scrollbar=1&view=FitH"
              class="w-full h-full"
              type="application/pdf"></iframe>
      <!-- Filigrane anti-copie -->
      <div class="absolute inset-0 pointer-events-none flex items-center justify-center">
        <span class="text-white/5 text-4xl md:text-6xl font-bold rotate-[-30deg] tracking-widest">
          FATOMBI MARIUS — CONFIDENTIEL
        </span>
      </div>
    </div>

    <p class="text-xs text-brand-200/60 mt-4 flex items-center gap-2">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
      Document protégé. Toute reproduction est interdite sans autorisation.
    </p>
  </div>
</section>

<!-- ========== CONTACT ========== -->
<section id="contact" class="page-section hidden">
  <h2 class="text-3xl md:text-4xl font-bold mb-8">Me <span class="text-brand-300">contacter</span></h2>
  <div class="grid md:grid-cols-3 gap-6">
    <div class="md:col-span-2 backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl p-8">
      <form id="contactForm" class="space-y-4">
        <div class="grid md:grid-cols-2 gap-4">
          <input name="name" required placeholder="Votre nom"
            class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/15 placeholder-brand-200/50 focus:outline-none focus:border-brand-300/60 transition">
          <input name="email" type="email" required placeholder="Votre email"
            class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/15 placeholder-brand-200/50 focus:outline-none focus:border-brand-300/60 transition">
        </div>
        <input name="subject" placeholder="Sujet"
          class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/15 placeholder-brand-200/50 focus:outline-none focus:border-brand-300/60 transition">
        <textarea name="message" required rows="6" placeholder="Votre message"
          class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/15 placeholder-brand-200/50 focus:outline-none focus:border-brand-300/60 transition"></textarea>
        <button class="px-6 py-3 rounded-xl bg-white text-brand-800 font-semibold hover:bg-brand-50 transition inline-flex items-center gap-2">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
          Envoyer le message
        </button>
        <p id="formMsg" class="text-sm"></p>
      </form>
    </div>

    <div class="space-y-4">
      <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl p-6">
        <h3 class="font-semibold mb-4">Coordonnées</h3>
        <div class="space-y-3 text-sm">
          <p class="flex items-start gap-3"><span class="text-brand-300">📞</span> <?= htmlspecialchars($profile['phone']) ?></p>
          <p class="flex items-start gap-3 break-all"><span class="text-brand-300">✉️</span> <?= htmlspecialchars($profile['email']) ?></p>
          <p class="flex items-start gap-3"><span class="text-brand-300">📍</span> <?= htmlspecialchars($profile['city']) ?></p>
        </div>
      </div>
      <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl p-6">
        <h3 class="font-semibold mb-4">Réseaux</h3>
        <div class="flex gap-3">
          <?php if ($profile['github_url']): ?><a href="<?= htmlspecialchars($profile['github_url']) ?>" target="_blank" class="w-10 h-10 rounded-lg bg-white/10 hover:bg-white/20 flex items-center justify-center transition">GH</a><?php endif; ?>
          <?php if ($profile['linkedin_url']): ?><a href="<?= htmlspecialchars($profile['linkedin_url']) ?>" target="_blank" class="w-10 h-10 rounded-lg bg-white/10 hover:bg-white/20 flex items-center justify-center transition">in</a><?php endif; ?>
          <?php if ($profile['whatsapp']): ?><a href="https://wa.me/<?= preg_replace('/\D/','',$profile['whatsapp']) ?>" target="_blank" class="w-10 h-10 rounded-lg bg-green-500/20 hover:bg-green-500/30 flex items-center justify-center transition">WA</a><?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

</main>

<footer class="border-t border-white/10 backdrop-blur-xl bg-white/5">
  <div class="max-w-6xl mx-auto px-4 py-8 flex items-center justify-between flex-wrap gap-4 text-sm text-brand-100/70">
    <p>© <?= date('Y') ?> <?= htmlspecialchars($profile['full_name']) ?>. Tous droits réservés.</p>
    <p>Conçu avec <span class="text-brand-300">♥</span> en PHP / Tailwind</p>
  </div>
</footer>

<script src="assets/js/app.js"></script>
</body>
</html>
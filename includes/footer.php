<?php
/**
 * Pied de page public.
 * Variables optionnelles : $profile (tableau associatif).
 */
if (!isset($profile)) {
    require_once __DIR__ . '/../config/Database.php';
    require_once __DIR__ . '/../classes/Model.php';
    require_once __DIR__ . '/../classes/Profile.php';
    $profile = (new Profile())->get();
}
?>
<footer class="border-t border-white/10 backdrop-blur-xl bg-white/5">
  <div class="max-w-6xl mx-auto px-4 py-10 grid md:grid-cols-3 gap-6 text-sm">

    <div>
      <div class="flex items-center gap-3 mb-3">
        <img src="assets/img/<?= htmlspecialchars($profile['logo'] ?? 'logo.png') ?>"
             alt="Logo" class="w-9 h-9 object-contain">
        <span class="font-bold text-white">
          <?= htmlspecialchars($profile['full_name'] ?? 'Portfolio') ?>
        </span>
      </div>
      <p class="text-brand-100/70 leading-relaxed">
        <?= htmlspecialchars($profile['short_bio'] ?? '') ?>
      </p>
    </div>

    <div>
      <h3 class="font-semibold text-white mb-3">Navigation</h3>
      <ul class="space-y-2 text-brand-100/70">
        <li><a href="/"                 class="hover:text-white">Accueil</a></li>
        <li><a href="/about"            class="hover:text-white">À propos</a></li>
        <li><a href="/skills"           class="hover:text-white">Compétences</a></li>
        <li><a href="/projects"         class="hover:text-white">Projets</a></li>
        <li><a href="/resume"           class="hover:text-white">Parcours</a></li>
        <li><a href="/thesis"           class="hover:text-white">Mémoire</a></li>
        <li><a href="/contact"          class="hover:text-white">Contact</a></li>
      </ul>
    </div>

    <div>
      <h3 class="font-semibold text-white mb-3">Contact</h3>
      <ul class="space-y-2 text-brand-100/70">
        <li>📞 <?= htmlspecialchars($profile['phone'] ?? '') ?></li>
        <li class="break-all">✉️ <?= htmlspecialchars($profile['email'] ?? '') ?></li>
        <li>📍 <?= htmlspecialchars($profile['city']  ?? '') ?></li>
      </ul>

      <div class="flex gap-2 mt-4">
        <?php if (!empty($profile['github_url'])): ?>
          <a href="<?= htmlspecialchars($profile['github_url']) ?>" target="_blank"
             class="w-9 h-9 rounded-lg bg-white/10 hover:bg-white/20 flex items-center justify-center transition text-xs">GH</a>
        <?php endif; ?>
        <?php if (!empty($profile['linkedin_url'])): ?>
          <a href="<?= htmlspecialchars($profile['linkedin_url']) ?>" target="_blank"
             class="w-9 h-9 rounded-lg bg-white/10 hover:bg-white/20 flex items-center justify-center transition text-xs">in</a>
        <?php endif; ?>
        <?php if (!empty($profile['whatsapp'])): ?>
          <a href="https://wa.me/<?= preg_replace('/\D/','',$profile['whatsapp']) ?>" target="_blank"
             class="w-9 h-9 rounded-lg bg-green-500/20 hover:bg-green-500/30 flex items-center justify-center transition text-xs">WA</a>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="border-t border-white/10">
    <div class="max-w-6xl mx-auto px-4 py-5 flex items-center justify-between flex-wrap gap-3 text-xs text-brand-100/60">
      <p>© <?= date('Y') ?> <?= htmlspecialchars($profile['full_name'] ?? '') ?>. Tous droits réservés.</p>
      <p>Conçu avec <span class="text-brand-300">♥</span> en PHP / TailwindCSS</p>
    </div>
  </div>
</footer>
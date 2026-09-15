/* ============================================================
   Portfolio SPA — URLs propres (sans #hash)
   ============================================================ */

const BASE_PATH = '';                       // site servi à la racine du domaine
const SECTIONS  = ['home','about','skills','projects','resume','thesis','contact'];

/* ---------- Affichage d'une section ---------- */
function showPage(id, replace = false) {

  if (!SECTIONS.includes(id)) id = 'home';

  // Masquer toutes les sections
  document.querySelectorAll('.page-section').forEach(s => s.classList.add('hidden'));

  const target = document.getElementById(id);
  if (target) {
    target.classList.remove('hidden');
    target.style.animation = 'none';
    void target.offsetWidth;
    target.style.animation = '';
  }

  // États actifs du menu
  document.querySelectorAll('.nav-link').forEach(l =>
    l.classList.remove('active', 'bg-white/15')
  );
  document.querySelectorAll(`.nav-link[data-nav="${id}"]`).forEach(l => {
    l.classList.add('active', 'bg-white/15');
  });

  // Fermer le menu mobile
  document.getElementById('mobileMenu')?.classList.add('hidden');

  // URL propre (sans rechargement)
  const url = id === 'home' ? BASE_PATH + '/' : BASE_PATH + '/' + id;
  if (location.pathname !== url) {
    if (replace) history.replaceState({ section: id }, '', url);
    else         history.pushState({ section: id }, '', url);
  }

  window.scrollTo({ top: 0, behavior: 'smooth' });

  // Animation compétences à l'affichage
  if (id === 'skills') animateSkills();
}

/* ---------- Clic sur un lien du menu ---------- */
document.addEventListener('click', e => {
  const link = e.target.closest('[data-nav]');
  if (link) {
    e.preventDefault();
    showPage(link.dataset.nav);
  }
});

/* ---------- Détection de la section au chargement ---------- */
window.addEventListener('load', () => {
  const path = location.pathname
    .replace(BASE_PATH, '')
    .replace(/^\/|\/$/g, '');

  let section = 'home';
  if (path.startsWith('index/')) {
    const candidate = path.split('/')[1];
    if (SECTIONS.includes(candidate)) section = candidate;
  } else if (SECTIONS.includes(path)) {
    section = path;
  }

  showPage(section, true);
});

/* ---------- Boutons précédent / suivant du navigateur ---------- */
window.addEventListener('popstate', e => {
  const id = e.state?.section || 'home';
  showPage(id, true);
});

/* ---------- Menu burger ---------- */
document.getElementById('menuBtn')?.addEventListener('click', () => {
  document.getElementById('mobileMenu')?.classList.toggle('hidden');
});

/* ============================================================
   Animations compétences
   ============================================================ */
function animateSkills() {
  document.querySelectorAll('.skill-bar').forEach(b => {
    const lvl = b.dataset.level + '%';
    b.style.width = '0%';
    setTimeout(() => { b.style.width = lvl; }, 50);
  });
}

/* ============================================================
   Filtres projets
   ============================================================ */
document.querySelectorAll('.filter-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    document.querySelectorAll('.filter-btn').forEach(b => {
      b.classList.remove('active', 'bg-white/5', 'border-white/10');
    });
    btn.classList.add('active');
    btn.classList.remove('bg-white/5', 'border-white/10');

    const f = btn.dataset.filter;
    document.querySelectorAll('.project-card').forEach(card => {
      card.classList.toggle('hidden', !(f === 'all' || card.dataset.category === f));
    });
  });
});

/* ============================================================
   Formulaire de contact
   ============================================================ */
const form = document.getElementById('contactForm');
form?.addEventListener('submit', async e => {
  e.preventDefault();
  const msg = document.getElementById('formMsg');
  const data = Object.fromEntries(new FormData(form));
  msg.textContent = 'Envoi en cours...';
  msg.className = 'text-sm text-brand-200';

  try {
    const r = await fetch(`${BASE_PATH}/api/contact`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data)
    });
    const j = await r.json();
    if (j.success) {
      msg.textContent = '✅ Message envoyé avec succès !';
      msg.className = 'text-sm text-green-300';
      form.reset();
    } else {
      msg.textContent = '❌ ' + (j.error || 'Erreur');
      msg.className = 'text-sm text-red-300';
    }
  } catch {
    msg.textContent = '❌ Erreur réseau';
    msg.className = 'text-sm text-red-300';
  }
});

/* ============================================================
   Blocages (protections mémoire)
   ============================================================ */
document.addEventListener('keydown', e => {
  const thesis = document.getElementById('thesis');
  if (!thesis || thesis.classList.contains('hidden')) return;

  if ((e.ctrlKey || e.metaKey) && ['s','p','u'].includes(e.key.toLowerCase())) {
    e.preventDefault();
  }
  if (e.key === 'F12') e.preventDefault();
});
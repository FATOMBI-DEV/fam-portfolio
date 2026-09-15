document.addEventListener('DOMContentLoaded', () => {
  const v = document.getElementById('thesisViewer');
  if (!v) return;
  ['copy','cut','dragstart'].forEach(ev => v.addEventListener(ev, e => e.preventDefault()));
});
document.addEventListener('DOMContentLoaded', function () {
  const btn = document.querySelector('.hamburger');
  const menu = document.getElementById('mobileMenu');
  if (!btn || !menu) return;

  function openMenu() {
    btn.setAttribute('aria-expanded', 'true');
    menu.classList.add('open');
    menu.setAttribute('aria-hidden', 'false');
  }
  function closeMenu() {
    btn.setAttribute('aria-expanded', 'false');
    menu.classList.remove('open');
    menu.setAttribute('aria-hidden', 'true');
  }

  btn.addEventListener('click', function () {
    if (menu.classList.contains('open')) closeMenu(); else openMenu();
  });

  // close when clicking a link
  menu.querySelectorAll('a').forEach(function (a) {
    a.addEventListener('click', function () {
      closeMenu();
    });
  });

  // close on escape
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeMenu();
  });
});

document.addEventListener('DOMContentLoaded', () => {
  const menuButton = document.querySelector('.menu-button');
  const nav = document.querySelector('.main-nav');
  if (menuButton && nav) {
    menuButton.addEventListener('click', () => {
      const open = menuButton.getAttribute('aria-expanded') === 'true';
      menuButton.setAttribute('aria-expanded', String(!open));
      nav.classList.toggle('open', !open);
    });
  }

  const anonymous = document.querySelector('#anonymous');
  const identityFields = document.querySelector('#identity-fields');
  const syncAnonymous = () => {
    if (!anonymous || !identityFields) return;
    identityFields.classList.toggle('disabled-fields', anonymous.checked);
    identityFields.querySelectorAll('input, select').forEach(el => {
      el.disabled = anonymous.checked;
    });
  };
  anonymous?.addEventListener('change', syncAnonymous);
  syncAnonymous();

  document.querySelectorAll('[data-copy]').forEach(button => {
    button.addEventListener('click', async () => {
      try {
        await navigator.clipboard.writeText(button.dataset.copy || '');
        const original = button.textContent;
        button.textContent = 'Copiado';
        setTimeout(() => button.textContent = original, 1600);
      } catch (_) {
        alert('Não foi possível copiar automaticamente.');
      }
    });
  });
});

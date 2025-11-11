function setHeaderScrollState() {
  const header = document.querySelector('.js-header');
  if (window.scrollY > 50) {
    header.classList.add('is-scrolled');
  } else {
    header.classList.remove('is-scrolled');
  }
}

document.addEventListener('DOMContentLoaded', function () {
  setHeaderScrollState();
});
window.addEventListener('scroll', () => {
  setHeaderScrollState();
});

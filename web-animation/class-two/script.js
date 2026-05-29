document.querySelectorAll('[data-grid]').forEach(function (grid) {
    for (let i = 0; i < 8; i++) {
        let box = document.createElement('div');
        box.className = 'pic animate-scale';
        box.style.transitionDelay = (i * 0.08) + 's';
        grid.appendChild(box);
    }
  });
document.querySelectorAll('.words').forEach(function (word) {
    word.classList.add('animate-up');
});
let watcher = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
        if (entry.isIntersecting) {
            entry.target.classList.add('in');
            watcher.unobserve(entry.target);
        }
    });
}, { threshold: 0.15 });

document.querySelectorAll('.animate-scale, .animate-up').forEach(function (el) {
    watcher.observe(el);
});

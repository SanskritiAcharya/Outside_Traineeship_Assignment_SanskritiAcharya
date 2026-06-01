import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'swiper/css';
import './styles.css';

import Swiper from 'swiper';
import { Autoplay } from 'swiper/modules';

// Swiper
const swiper = new Swiper('.overview-swiper', {
  modules: [Autoplay],
  loop: true,
  autoplay: { delay: 3000, disableOnInteraction: false },
  on: {
    slideChange() {
      const idx = this.realIndex;
      document.querySelectorAll('.swiper-dot').forEach((dot, i) => {
        dot.classList.toggle('active', i === idx);
      });
    },
  },
});

// Custom dot clicks
document.querySelectorAll('.swiper-dot').forEach((dot) => {
  dot.addEventListener('click', () => swiper.slideToLoop(+dot.dataset.index));
});

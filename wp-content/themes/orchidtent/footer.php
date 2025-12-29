<footer class="site-footer">

  <div class="footer-content">
    <div class="footer-main container">
        <div class="footer-left">
        <img 
            src="http://orchid.local/wp-content/uploads/2025/12/logo-black-1.png" 
            alt="Orchid"
            class="footer-logo"
        >
        </div>

        <div class="footer-right">
            <ul class="footer-menu">
                <li class="<?php echo is_front_page() ? 'active' : ''; ?>">
                <a href="<?php echo home_url('/'); ?>">Beranda</a>
                </li>

                <li class="<?php echo is_page('solusi') ? 'active' : ''; ?>">
                <a href="<?php echo home_url('/solusi'); ?>">Solusi</a>
                </li>

                <li class="<?php echo is_page('segmen') ? 'active' : ''; ?>">
                <a href="<?php echo home_url('/segmen'); ?>">Segmen</a>
                </li>

                <li class="<?php echo is_page('testimoni') ? 'active' : ''; ?>">
                <a href="<?php echo home_url('/testimoni'); ?>">Testimoni</a>
                </li>

                <li class="<?php echo is_page('kontak') ? 'active' : ''; ?>">
                <a href="<?php echo home_url('/kontak'); ?>">Kontak</a>
                </li>
            </ul>
            </div>

    </div>
            <hr>
    <div class="footer-bottom">
        © <?php echo date('Y'); ?> Orchid. All Rights Reserved.
    </div>    
  </div>

  <?php wp_footer(); ?>
</footer>
<script>
  document.querySelectorAll('.faq-question').forEach(button => {
    button.addEventListener('click', () => {
      const item = button.closest('.faq-item');
      const icon = button.querySelector('.icon');

      document.querySelectorAll('.faq-item').forEach(other => {
        if (other !== item) {
          other.classList.remove('active');
          other.querySelector('.icon').textContent = '+';
        }
      });

      const isActive = item.classList.contains('active');

      if (isActive) {
        item.classList.remove('active');
        icon.textContent = '+';
      } else {
        item.classList.add('active');
        icon.textContent = '−';
      }
    });
  });

  const cards = document.querySelectorAll('.testi-card');
  const dots = document.querySelectorAll('.dot');
  let index = 1;

  function updateSlider() {
    cards.forEach((card, i) => {
      card.classList.toggle('active', i === index);
      dots[i].classList.toggle('active', i === index);
    });
  }

  document.querySelector('.next').addEventListener('click', () => {
    index = (index + 1) % cards.length;
    updateSlider();
  });

  document.querySelector('.prev').addEventListener('click', () => {
    index = (index - 1 + cards.length) % cards.length;
    updateSlider();
  });




//    kebutuhan

/* LEFT MENU */
const menuItems = document.querySelectorAll('.kebutuhan-list li');
const sliders = document.querySelectorAll('.slider');

menuItems.forEach(item => {
  item.addEventListener('click', () => {
    menuItems.forEach(i => i.classList.remove('active'));
    sliders.forEach(s => s.classList.remove('active'));

    item.classList.add('active');
    document.getElementById(item.dataset.target).classList.add('active');
  });
});

/* SLIDER PER ITEM */
sliders.forEach(slider => {
  const images = slider.querySelectorAll('img');
  const dotsContainer = slider.querySelector('.dots');
  const next = slider.querySelector('.next');
  const prev = slider.querySelector('.prev');
  let index = 0;

  images.forEach((_, i) => {
    const dot = document.createElement('span');
    if (i === 0) dot.classList.add('active');
    dotsContainer.appendChild(dot);
  });

  const dotsK = dotsContainer.querySelectorAll('span');

  function showSlide(i) {
    images.forEach(img => img.classList.remove('active'));
    dotsK.forEach(dot => dot.classList.remove('active'));
    images[i].classList.add('active');
    dotsK[i].classList.add('active');
    index = i;
  }

  next.addEventListener('click', () =>
    showSlide((index + 1) % images.length)
  );

  prev.addEventListener('click', () =>
    showSlide((index - 1 + images.length) % images.length)
  );

  dotsK.forEach((dot, i) =>
    dot.addEventListener('click', () => showSlide(i))
  );
});
</script>


<script>
document.addEventListener('DOMContentLoaded', () => {

  document.querySelectorAll('.card-slider').forEach(slider => {

    const cards   = slider.querySelectorAll('.card');
    const nextBtn = slider.querySelector('.exp-next');
    const prevBtn = slider.querySelector('.exp-prev');

    let index = 0;
    const total = cards.length;

    function update() {
      cards.forEach((card, i) => {
        card.classList.remove('active', 'prev', 'next');

        if (i === index) {
          card.classList.add('active');
        }

        if (i === index - 1 || (index === 0 && i === total - 1)) {
          card.classList.add('prev');
        }

        if (i === index + 1 || (index === total - 1 && i === 0)) {
          card.classList.add('next');
        }
      });
    }

    if (nextBtn) {
      nextBtn.addEventListener('click', () => {
        index = (index + 1) % total;
        update();
      });
    }

    if (prevBtn) {
      prevBtn.addEventListener('click', () => {
        index = (index - 1 + total) % total;
        update();
      });
    }

    update();
  });

});
</script>

<script>
document.addEventListener('DOMContentLoaded', () => {

  const header = document.querySelector('.site-header');
  const links = document.querySelectorAll('.nav-link');
  const sections = document.querySelectorAll('section');
  const burger = document.querySelector('.burger');
  const nav = document.querySelector('.nav');

  let lastScroll = 0;

  /* === HIDE / SHOW HEADER === */
  window.addEventListener('scroll', () => {
    const current = window.scrollY;

    if (current > lastScroll && current > 100) {
      header.classList.add('hide');
      header.classList.remove('show');
    } else {
      header.classList.remove('hide');
      header.classList.add('show');
    }

    lastScroll = current;
  });

  /* === SMOOTH SCROLL === */
  links.forEach(link => {
    link.addEventListener('click', e => {
      e.preventDefault();
      const target = document.querySelector(link.getAttribute('href'));
      nav.classList.remove('open');

      window.scrollTo({
        top: target.offsetTop - 80,
        behavior: 'smooth'
      });
    });
  });

  /* === ACTIVE MENU === */
  window.addEventListener('scroll', () => {
    let current = '';

    sections.forEach(section => {
      const sectionTop = section.offsetTop - 120;
      if (scrollY >= sectionTop) {
        current = section.getAttribute('id');
      }
    });

    links.forEach(link => {
      link.classList.remove('active');
      if (link.getAttribute('href') === `#${current}`) {
        link.classList.add('active');
      }
    });
  });

  /* === MOBILE MENU === */
  burger.addEventListener('click', () => {
    nav.classList.toggle('open');
  });

});
</script>
<script>
let varianIndex = 0;
const varianSlides = document.querySelector('.varian-slides');
const varianDots = document.querySelectorAll('.varian-dot');

function varianUpdate() {
  varianSlides.style.transform = `translateX(-${varianIndex * 100}%)`;
  varianDots.forEach(dot => dot.classList.remove('active'));
  varianDots[varianIndex].classList.add('active');
}

function varianNext() {
  varianIndex = (varianIndex + 1) % varianDots.length;
  varianUpdate();
}

function varianPrev() {
  varianIndex = (varianIndex - 1 + varianDots.length) % varianDots.length;
  varianUpdate();
}

function varianGo(index) {
  varianIndex = index;
  varianUpdate();
}
</script>



</body>
</html>

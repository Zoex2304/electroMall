function slide() {
  const wrapperContainer = document.getElementById('banner-container');
  const carousel = wrapperContainer.parentElement;
  const wrapper = wrapperContainer.querySelector('.wrapper');
  const banners = [...wrapper.querySelectorAll('.banner')];
  const nextButton = document.getElementById('next');
  const prevButton = document.getElementById('prev');

  const bannerWidth = banners[0].offsetWidth + parseFloat(getComputedStyle(wrapper).gap);

  banners.forEach((b) => wrapper.append(b.cloneNode(true)));
  banners.forEach((b) => wrapper.append(b.cloneNode(true)));

  let currIndex = banners.length;
  const updatePositions = (instant = false) => {
    wrapper.style.transition = instant ? 'none' : 'transform 0.3s ease-in-out';
    wrapper.style.transform = `translateX(-${currIndex * bannerWidth}px)`;
  }

  const move = (itemMove) => {
    currIndex += itemMove;
    updatePositions();
    if (currIndex === 0 || currIndex === banners.length * 2) {
      setTimeout(() => {
        currIndex = itemMove > 0 ? banners.length : banners.length - 1;
        updatePositions(true);
      }, currIndex === 0 ? 0.1 : 300);
    }
  }

  nextButton.addEventListener('click', () => move(1));
  prevButton.addEventListener('click', () => move(-1));

  let autoSlide = setInterval(() => move(1), 1000);
  carousel.addEventListener('mouseenter', () => clearInterval(autoSlide));
  carousel.addEventListener('mouseleave', () => autoSlide = setInterval(() => move(1), 1000));

  window.addEventListener('resize', () => {
    currIndex = banners.length;
    updatePositions(true);
  })

  updatePositions(true);
};

document.addEventListener('DOMContentLoaded', slide);
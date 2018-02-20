'use strict';
(function () {
  var slides = document.querySelectorAll('.slider__slide');
  var sliderBtns = document.querySelectorAll('.slider__btn');
  var slideCurrentNum = 0;
  sliderBtns[0].classList.add('slider__btn--hidden');
  slides[0].classList.add('slider__slide--active');
  // Функции для обработки событий на слайдере
  var onClickButtonBack = function () {
    if (slideCurrentNum === (slides.length - 1)) {
      sliderBtns[1].classList.remove('slider__btn--hidden');
    }
    slides[slideCurrentNum].classList.remove('slider__slide--active');
    slideCurrentNum--;
    slides[slideCurrentNum].classList.add('slider__slide--active');
    if (slideCurrentNum === 0) {
      sliderBtns[0].classList.add('slider__btn--hidden');
    }
  };
  var onClickButtonForward = function () {
    if (slideCurrentNum === 0) {
      sliderBtns[0].classList.remove('slider__btn--hidden');
    }
    slides[slideCurrentNum].classList.remove('slider__slide--active');
    slideCurrentNum++;
    slides[slideCurrentNum].classList.add('slider__slide--active');
    if (slideCurrentNum === (slides.length - 1)) {
      sliderBtns[1].classList.add('slider__btn--hidden');
    }
  };

  // Установка обработчиков событий для слайдера
  sliderBtns[0].addEventListener('click', onClickButtonBack);
  sliderBtns[1].addEventListener('click', onClickButtonForward);
})();

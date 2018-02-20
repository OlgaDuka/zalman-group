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
    slideCurrentNum -= slideCurrentNum;
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
    slideCurrentNum += slideCurrentNum;
    slides[slideCurrentNum].classList.add('slider__slide--active');
    if (slideCurrentNum === (slides.length - 1)) {
      sliderBtns[1].classList.add('slider__btn--hidden');
    }
  };

  // Установка обработчиков событий для слайдера
  sliderBtns[0].addEventListener('click', onClickButtonBack);
  sliderBtns[1].addEventListener('click', onClickButtonForward);
})();

/* var navMain = document.querySelector('.main-nav');
var navToggle = document.querySelector('.page-header__toggle');
var navTop = document.querySelector('.page-header__panel');

navMain.classList.add('main-nav--closed');
navTop.classList.add('page-header__panel--menu-closed');

navMain.classList.remove('main-nav--nojs');

navToggle.addEventListener('click', function() {
  navMain.classList.toggle('main-nav--closed');
  navTop.classList.toggle('page-header__panel--menu-closed');
}); */
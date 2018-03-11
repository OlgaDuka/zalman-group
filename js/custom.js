'use strict';
(function () {
  // ----------------------------------------------
  // Меню
  // ----------------------------------------------
  var header = document.querySelector('.header');
  var toggle = header.querySelector('.header__toggle');
  var menu = header.querySelector('.menu');
  var title = header.querySelector('.header__title');
  var service = header.querySelector('.service');
  // Закрываем меню, если JS работает
  menu.classList.remove('menu--nojs');
  menu.classList.add('menu--close');
  toggle.classList.remove('header__toggle--collapse');
  title.classList.remove('header__title--hidden');
  service.classList.remove('service--mobile-menu-open');

  // Переключаем состояние меню по кнопке и меняем высоту хедера
  toggle.addEventListener('click', function () {
    menu.classList.toggle('menu--close');
    toggle.classList.toggle('header__toggle--collapse');
    title.classList.toggle('header__title--hidden');
    service.classList.toggle('service--mobile-menu-open');
  });

  // ----------------------------------------------
  // Слайдер
  // ----------------------------------------------
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

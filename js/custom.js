'use strict';
(function () {
  // ----------------------------------------------
  // Меню
  // ----------------------------------------------
  var header = document.querySelector('.header');
  var toggle = header.querySelector('.header__toggle');
  var menu = header.querySelector('.menu');
  var title = header.querySelector('.header__title');
  // Закрываем меню, если JS работает
  menu.classList.remove('menu--nojs');
  menu.classList.add('menu--close');
  toggle.classList.remove('header__toggle--collapse');
  title.classList.remove('header__title--opacity');
  // Переключаем состояние меню по кнопке и меняем высоту хедера
  toggle.addEventListener('click', function () {
    menu.classList.toggle('menu--close');
    toggle.classList.toggle('header__toggle--collapse');
    title.classList.toggle('header__title--opacity');
  });

  // ----------------------------------------------
  // Слайдер
  // ----------------------------------------------
  var slides = document.querySelectorAll('.slider__slide');
  var sliderBtns = document.querySelectorAll('.slider__btn');
  var slideCurrentNum = 0;

  if (sliderBtns.length !== 0) {
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
  }

  // -----------------------------------------------
  // Показать текст
  // ------------------------------------------------

  var readmoreBtns = document.querySelectorAll('.way__readmore');
  var wrappers = document.querySelectorAll('.way__wrapper-text');
  var collapseBtns = document.querySelectorAll('.way__collapse');

  var onClickButtonReadmore = function (evt) {
    var currentElement = [].indexOf.call(readmoreBtns, evt.currentTarget);
    evt.currentTarget.classList.add('way__readmore--hidden');
    wrappers[currentElement].classList.add('way__wrapper-text--open');
    collapseBtns[currentElement].classList.add('way__collapse--visible');
  };

  var onClickButtonCollapse = function (event) {
    var currentElement = [].indexOf.call(collapseBtns, event.currentTarget);
    readmoreBtns[currentElement].classList.remove('way__readmore--hidden');
    wrappers[currentElement].classList.remove('way__wrapper-text--open');
    event.currentTarget.classList.remove('way__collapse--visible');
  };

  [].forEach.call(readmoreBtns, function (element) {
    element.addEventListener('click', onClickButtonReadmore);
  });

  [].forEach.call(collapseBtns, function (element) {
    element.addEventListener('click', onClickButtonCollapse);
  });

  // -----------------------------------------------
  // Показать список этапов по направлению работ
  // ------------------------------------------------

  var tabletWidth = 768;
  var desktopWidth = 1330;
  var stage = document.querySelector('.stage');
  var backBtn = stage.querySelector('.stage__back');
  var stagelist = stage.querySelector('.stage__list');
  var types = stage.querySelectorAll('.stage__type');
  var sublists = stage.querySelectorAll('.stage__sublist');
  var widthCurrent = document.documentElement.clientWidth;

  var onClickBackBtn = function () {
    backBtn.classList.add('stage__back--hidden');
    stagelist.classList.remove('stage__list--hidden');
    [].forEach.call(sublists, function (element) {
      if (!element.classList.contains('stage__sublist--hidden')) {
        element.classList.add('stage__sublist--hidden');
      }
    });
  };

  var onClickTypeStage = function (event) {
    var currentElement = [].indexOf.call(types, event.currentTarget);

    stagelist.classList.add('stage__list--hidden');
    [].forEach.call(types, function (element) {
      if (element.classList.contains('stage__type--active')) {
        element.classList.remove('stage__type--active');
      }
    });
    [].forEach.call(sublists, function (element) {
      if (!element.classList.contains('stage__sublist--hidden')) {
        element.classList.add('stage__sublist--hidden');
      }
    });
    event.currentTarget.classList.add('stage__type--active');
    sublists[currentElement].classList.remove('stage__sublist--hidden');
    backBtn.classList.remove('stage__back--hidden');
  };

  if ((widthCurrent < desktopWidth) && (widthCurrent > tabletWidth)) {
    [].forEach.call(types, function (element) {
      element.addEventListener('click', onClickTypeStage);
    });
  }
  if (widthCurrent < tabletWidth) {
    [].forEach.call(types, function (element) {
      element.addEventListener('click', onClickTypeStage);
    });
    backBtn.addEventListener('click', onClickBackBtn);
  }

})();

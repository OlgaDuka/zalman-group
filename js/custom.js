'use strict';
(function () {
  var limit = $(window).height() / 3;
  var $backToTop = $('#footer__up-btn');
  // Появление и исчезновение кнопки "наверх" на первом экране
  $(window).scroll(function () {
    if ($(this).scrollTop() > limit) {
      $backToTop.fadeIn();
    } else {
      $backToTop.fadeOut();
    }
  });
  // Мягкий скролл к началу сайта
  $backToTop.click(function () {
    $('body,html').animate({scrollTop: 0}, 1500);
    return false;
  });

  // ----------------------------------------------
  // Меню
  // ----------------------------------------------
  var toggle = document.querySelector('.header__toggle');
  var menu = document.querySelector('.menu');
  var title = document.querySelector('.header__title');
  // Закрываем меню, если JS работает
  menu.classList.remove('menu--nojs');
  if (!menu.classList.contains('menu--404')) {
    menu.classList.add('menu--close');
  }
  // Функция обработки клика на кнопке переключения меню
  var onClickToggleMenu = function () {
    menu.classList.toggle('menu--close');
    toggle.classList.toggle('header__toggle--collapse');
    title.classList.toggle('header__title--opacity');
  };

  if (toggle !== null) {
    toggle.classList.remove('header__toggle--collapse');
    title.classList.remove('header__title--opacity');
    // Обработчик события клика на кнопке переключения меню
    toggle.addEventListener('click', onClickToggleMenu);
  }

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
  // Показать список этапов по направлению работ
  // ------------------------------------------------

  var tabletWidth = 768;
  var desktopWidth = 1330;

  var backBtn = document.querySelector('.stage__back');
  var stagelist = document.querySelector('.stage__list');
  var types = document.querySelectorAll('.stage__type');
  var sublists = document.querySelectorAll('.stage__sublist');
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

  if ((widthCurrent < desktopWidth) && (widthCurrent >= tabletWidth)) {
    [].forEach.call(types, function (element) {
      element.addEventListener('click', onClickTypeStage);
    });
    if (sublists.length !== 0) {
      sublists[0].classList.remove('stage__sublist--hidden');
    }
  }
  if (widthCurrent < tabletWidth) {
    [].forEach.call(types, function (element) {
      element.addEventListener('click', onClickTypeStage);
    });
    if (backBtn !== null) {
      backBtn.addEventListener('click', onClickBackBtn);
    }
  }

  // Слайдер Партнеры -->
  var swiper1 = new Swiper('.swiper-container--partner', {
    slidesPerView: 'auto',
    spaceBetween: 74,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

  // Слайдер Скриншоты проекта -->
  var swiper2 = new Swiper('.swiper-container--screen', {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

  $().fancybox({
    selector: '[data-fancybox="gallery"]',
    animationEffect: 'zoom',
    transitionEffect: 'circular',
    transitionDuration: 1200,
    loop: true,
    infobar: false,
    buttons: ['close'],
    btnTpl: {
      arrowLeft:
        '<a data-fancybox-prev class="fancybox-button fancybox-button--arrow_left" title="{{PREV}}" href="javascript:;">' +
        '<svg viewBox="0 0 16 16">' +
        '<path d="M12 13h-2L5 8l5-5h2L7 8z"></path>' +
        '</svg>' +
        '</a>',

      arrowRight:
        '<a data-fancybox-next class="fancybox-button fancybox-button--arrow_right" title="{{NEXT}}" href="javascript:;">' +
        '<svg viewBox="0 0 16 16">' +
        '<path d="M4 13h2l5-5-5-5H4l5 5z"></path>' +
        '</svg>' +
        '</a>'
    }
  });
})();

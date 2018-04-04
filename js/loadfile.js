'use strict';
(function () {
  // =========================================================================
  // Константы и переменные
  // =========================================================================
  var FILE_TYPES = ['doc', 'txt'];
  var formNotice = document.querySelector('.notice__form');
  var fileChooser = document.querySelector('.upload input[type=file]');
  var dropZoneImages = formNotice.querySelectorAll('.drop-zone');
  var photoZone = dropZoneImages[1];
  var uploadPhoto = formNotice.querySelector('.form__photo-container');

  // Добавление фотографий на форму
  var upLoadImage = function (evt, getFile, showMiniFile) {
    var files = getFile(evt);
    [].forEach.call(files, function (file) {
      var fileName = file.name.toLowerCase();
      var matches = FILE_TYPES.some(function (element) {
        return fileName.endsWith(element);
      });
      if (matches) {
        var imageLoader = new FileReader();
        imageLoader.addEventListener('load', function (e) {
          showMiniFile(e.target.result);
        });
        imageLoader.readAsDataURL(file);
      }
    });
  };
  // Получаем файл фото при перетаскивании
  var getDraggedFile = function (evt) {
    evt.stopPropagation();
    evt.preventDefault();
    var files = evt.dataTransfer.files;
    evt.dataTransfer.dropEffect = 'copy';
    return files;
  };
  // Получаем файл фото через диалог
  var getDialogFile = function (evt) {
    return evt.target.files;
  };
  // Показываем миниатюры на форме
  var showMiniPhoto = function (content) {
    var img = document.createElement('IMG');
    img.width = '50';
    img.height = '50';
    img.style.margin = '5px';
    img.setAttribute('draggable', true);
    uploadPhoto.appendChild(img);
    img.src = content;
  };
  // Добавляем файлы через окно выбора файлов
  var onChooserFileChange = function (evt) {
    upLoadImage(evt, getDialogFile, showMiniPhoto);
  };
  // Добавляем перетаскиваемые файлы
  var onPhotoZoneDrop = function (evt) {
    upLoadImage(evt, getDraggedFile, showMiniPhoto);
  };
  // Разрешаем процесс перетаскивания фотографий в дроп-зону
  var onDropZoneDragenter = function (evt) {
    evt.stopPropagation();
    evt.preventDefault();
  };
  var onDropZoneDragover = function (evt) {
    evt.stopPropagation();
    evt.preventDefault();
  };

  // Обработчики событий
  // События сброса фото-файлов в drop-зоне
  photoZone.addEventListener('drop', onPhotoZoneDrop);
  [].forEach.call(dropZoneImages, function (element) {
    element.addEventListener('dragenter', onDropZoneDragenter);
  });
  [].forEach.call(dropZoneImages, function (element) {
    element.addEventListener('dragover', onDropZoneDragover);
  });
  // Событие изменения выборщиков файлов для загрузки
  fileChooser.addEventListener('change', onChooserFileChange);

  window.form = {
    init: function () {
      fileChoosers[1].setAttribute('multiple', true);
      uploadPhoto.setAttribute('dropzone', 'move');
    }
  };
})();

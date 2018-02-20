<?php

/*
* Загружаемые скрипты и стили
*/
function load_style_script() {
  wp_enqueue_scripts('customScript', get_template_directory_uri() . '/js/custom.js');
  wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
}

/*
* Загружаем скрипты и стили
*/
add_action('wp_enqueue_scripts', 'load_style_script');

/**
* Опции (настройки сайта)
**/
function my_options() {
  // создаем поле опции
  // $id, $title, $callback, $page, $section, $args
  add_settings_field(
    'admin_phone',
    'Телефон',
    'display_phone',
    'general'
  );
  // регистрирует новую опцию и callback-функцию для обработки значения опции при ее сохранении в БД
  // $option_group, $option_name, $sanitize_callback
  register_setting(
    'general',
    'my_phone'
  );
}

add_action('admin_init', 'my_options');
function display_phone() {
  echo "<input type='text', class='regular-text' name='my_phone', value='" . esc_attr(get_option('my_phone')) . "'>";
} 

/**
* Иконки соцсетей в футере
**/

register_sidebar(array(
    'name' => 'Иконки соцсетей в футере',
    'id' => 'social_icons',
    'description' => 'Используйте виджет HTML для добавления кода иконок',
    'before_widget' => '',
    'after_widget' => ''
));

/**
** Регистрируем множественное меню
**/

register_nav_menus(array(
  'header_menu1' => 'Меню на панели в хедере',
  'header_menu2' => 'Верхнее меню на баннере',
  'header_menu3' => 'Нижнее меню на баннере',
  'footer_menu' => 'Меню в футере'
));

/**
** Создаем слайдер на главной
**/

add_action('init', 'slider_index');
function slider_index() {
  register_post_type('slider', array(
    'public' => true,
    'supports' => array('title', 'editor', 'thumbnail'),
    'menu_position' => 100,
    'labels' => array(
      'name' => 'Слайдер',
      'all_items' => 'Все слайды',
      'add_new' => 'Новый слайд',
      'add_new_item' => 'Добавить слайд'
    )
  ));
}

/**
** Поддержка миниатюр
**/

add_theme_support('post-thumbnails');


/**
** Добавляем блок с данными клиента на слайд в админке
**/

add_action('add_meta_boxes', 'add_custom_firm');
function add_custom_firm(){
	$screens = 'slider';
	add_meta_box( 'firm_id', 'Сведения о клиенте, оставившем отзыв', 'add_custom_firm_callback', $screens );
}

// HTML код блока
function add_custom_firm_callback( $post, $meta ){
	$screens = $meta['args'];

	// Используем nonce для верификации
	wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );

	// Поля формы для введения данных
	echo '<label for="name_client">' . __("Имя клиента", 'myplugin_textdomain' ) . '</label></br> ';
	echo '<input type="text" id= "name_client" name="name_client" value="' . get_post_meta(get_the_ID(), 'name_client', 1) . '" size="50" style="width: 100%"/></br>';
  echo '<label for="manager">' . __("Должность клиента", 'myplugin_textdomain' ) . '</label></br> ';
	echo '<input type="text" id= "manager" name="manager" value="' . get_post_meta(get_the_ID(), 'manager', 1) . '" size="50" size="50" style="width: 100%" /></br>';
  echo '<label for="name_firm">' . __("Название фирмы", 'myplugin_textdomain' ) . '</label></br> ';
	echo '<input type="text" id= "name_firm" name="name_firm" value="' . esc_attr(get_post_meta(get_the_ID(), 'name_firm', 1)) . '" size="50" size="50" style="width: 100%" />';

}

// Сохраняем данные, когда пост сохраняется
add_action( 'save_post', 'custom_firm_save_postdata' );
function custom_firm_save_postdata( $post_id ) {
	// Убедимся что поле установлено.
	if ( ! isset( $_POST['name_client']) )
		return;

	// проверяем nonce нашей страницы, потому что save_post может быть вызван с другого места.
	if ( ! wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) ) )
		return;

	// если это автосохранение ничего не делаем
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return;

	// проверяем права юзера
	if( ! current_user_can( 'edit_post', $post_id ) )
		return;

	// Все ОК. Теперь, нужно найти и сохранить данные
	// Очищаем значение поля input.
	$my_data = sanitize_text_field( $_POST['name_client'] );
	// Обновляем данные в базе данных.
	update_post_meta( $post_id, 'name_client', $my_data );
  // Очищаем значение поля input.
	$my_data = sanitize_text_field( $_POST['manager'] );
	// Обновляем данные в базе данных.
	update_post_meta( $post_id, 'manager', $my_data );
  // Очищаем значение поля input.
	$my_data = sanitize_text_field( $_POST['name_firm'] );
	// Обновляем данные в базе данных.
	update_post_meta( $post_id, 'name_firm', $my_data );
}
?>

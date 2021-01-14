<?php

/*Redirect to mobile version*/
/*
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
header('Location: http://m.vdz.com');
*/

if ( ! function_exists( 'vdz_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own vdz_setup() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function vdz_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'vdz' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'vdz', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since Twenty Sixteen 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

  

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );
  add_image_size('catalog_thumb', 260, 285, true);
  add_image_size('similar_thumb', 250, 250, true);


	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'header'  => __( 'Header Menu', 'vdz' ),
		'footer'  => __( 'Footer Menu', 'vdz' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

  add_theme_support('widgets');

}
endif; // vdz_setup
add_action( 'after_setup_theme', 'vdz_setup' );

function vdz_register_sidebars() {
 
  /* В боковой колонке - первый сайдбар */
  register_sidebar(
    array(
      'id' => 'sidebar_catalog', // уникальный id
      'name' => 'Боковая колонка товара', // название сайдбара
      'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
      'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
      'after_title' => '</h3>'
    )
  );
  register_sidebar(
    array(
      'id' => 'sidebar_catalog_archive', // уникальный id
      'name' => 'Боковая колонка архива товара', // название сайдбара
      'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
      'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
      'after_title' => '</h3>'
    )
  );
  register_sidebar(
    array(
      'id' => 'sidebar_production', // уникальный id
      'name' => 'Боковая колонка производства', // название сайдбара
      'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
      'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
      'after_title' => '</h3>'
    )
  );
  register_sidebar(
    array(
      'id' => 'sidebar_no_form', // уникальный id
      'name' => 'Боковая колонка без формы', // название сайдбара
      'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
      'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
      'after_title' => '</h3>'
    )
  );
}
 
add_action( 'widgets_init', 'vdz_register_sidebars' );

/*
 * "Хлебные крошки" для WordPress
 * автор: Dimox
 * версия: 2017.01.21
 * лицензия: MIT
*/
function dimox_breadcrumbs() {

  /* === ОПЦИИ === */
  $text['home'] = 'Главная'; // текст ссылки "Главная"
  $text['category'] = '%s'; // текст для страницы рубрики
  $text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
  $text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
  $text['author'] = 'Статьи автора %s'; // текст для страницы автора
  $text['404'] = 'Ошибка 404'; // текст для страницы 404
  $text['page'] = 'Страница %s'; // текст 'Страница N'
  $text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'

  $wrap_before = '<ul class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // открывающий тег обертки
  $wrap_after = '</ul><!-- .breadcrumbs -->'; // закрывающий тег обертки
  $sep = ''; // разделитель между "крошками"
  $sep_before = ''; // тег перед разделителем
  $sep_after = ''; // тег после разделителя
  $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
  $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
  $show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
  $before = '<li class="current">'; // тег перед текущей "крошкой"
  $after = '</li>'; // тег после текущей "крошки"
  /* === КОНЕЦ ОПЦИЙ === */

  global $post;
  $home_url = home_url('/');
  $link_before = '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
  $link_after = '</li>';
  $link_attr = ' itemprop="item"';
  $link_in_before = '<span itemprop="name">';
  $link_in_after = '</span>';
  $link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
  $frontpage_id = get_option('page_on_front');
  $parent_id = ($post) ? $post->post_parent : '';
  $sep = ' ' . $sep_before . $sep . $sep_after . ' ';
  $home_link = $link_before . '<a href="' . $home_url . '"' . $link_attr . ' class="home">' . $link_in_before . $text['home'] . $link_in_after . '</a>' . $link_after;

  if (is_home() || is_front_page()) {

    if ($show_on_home) echo $wrap_before . $home_link . $wrap_after;

  } else {

    echo $wrap_before;
    if ($show_home_link) echo $home_link;

    if ( is_category() ) {
      $cat = get_category(get_query_var('cat'), false);
      if ($cat->parent != 0) {
        $cats = get_category_parents($cat->parent, TRUE, $sep);
        $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        if ($show_home_link) echo $sep;
        echo $cats;
      }
      if ( get_query_var('paged') ) {
        $cat = $cat->cat_ID;
        echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
      }

    } elseif ( is_search() ) {
      if (have_posts()) {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
      } else {
        if ($show_home_link) echo $sep;
        echo $before . sprintf($text['search'], get_search_query()) . $after;
      }

    } elseif ( is_day() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
      echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
      if ($show_current) echo $sep . $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
      if ($show_current) echo $sep . $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ($show_home_link) echo $sep;
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        printf($link, $home_url . $slug['slug'] . '/', $post_type->labels->singular_name);
        if ($show_current) echo $sep . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, $sep);
        if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
        if ( get_query_var('cpage') ) {
          echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
        } else {
          if ($show_current) echo $before . get_the_title() . $after;
        }
      }

    // custom post type
    }  elseif ( is_attachment() ) {
      if ($show_home_link) echo $sep;
      $parent = get_post($parent_id);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      if ($cat) {
        $cats = get_category_parents($cat, TRUE, $sep);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
      }
      printf($link, get_permalink($parent), $parent->post_title);
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && !$parent_id ) {
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && $parent_id ) {
      if ($show_home_link) echo $sep;
      if ($parent_id != $frontpage_id) {
        $breadcrumbs = array();
        while ($parent_id) {
          $page = get_page($parent_id);
          if ($parent_id != $frontpage_id) {
            $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
          }
          $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        for ($i = 0; $i < count($breadcrumbs); $i++) {
          echo $breadcrumbs[$i];
          if ($i != count($breadcrumbs)-1) echo $sep;
        }
      }

      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_tag() ) {
      if ( get_query_var('paged') ) {
        $tag_id = get_queried_object_id();
        $tag = get_tag($tag_id);
        echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
      }

    } elseif ( is_author() ) {
      global $author;
      $author = get_userdata($author);
      if ( get_query_var('paged') ) {
        if ($show_home_link) echo $sep;
        echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
      }

    } elseif ( is_404() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . $text['404'] . $after;

    } elseif ( has_post_format() && !is_singular() ) {
      if ($show_home_link) echo $sep;
      echo get_post_format_string( get_post_format() );
    }

    echo $wrap_after;

  }
} // end of dimox_breadcrumbs()

function enqueue_styles() { 
  wp_enqueue_style('lightbox_style', get_template_directory_uri() .'/css/lightbox.css');
  wp_enqueue_style('normalize_style', get_template_directory_uri() .'/css/normalize.css');
  wp_enqueue_style('slick_style', get_template_directory_uri() .'/css/slick.css');
  wp_enqueue_style('slick_theme_style', get_template_directory_uri() .'/css/slick-theme.css');  
  wp_enqueue_style('niceselect-style', get_template_directory_uri() .'/css/nice-select.css');   
  wp_enqueue_style( 'theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'enqueue_styles');


function enqueue_scripts () {
  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', 'https://code.jquery.com/jquery-2.2.4.min.js');
  wp_enqueue_script( 'jquery' );

  wp_enqueue_script('lightbox', get_template_directory_uri() .'/js/lightbox.js', array('jquery'), false, true);
  wp_enqueue_script('slick', get_template_directory_uri() .'/js/slick.min.js', array('jquery'), false, true);  
  wp_enqueue_script('custom', get_template_directory_uri() .'/js/custom.js', array('jquery'), false, true);   
  wp_enqueue_script('yandex_map', 'https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=f26507c4-85ce-4b54-9939-fae873813f9a', array('jquery'), false, true); 
  wp_enqueue_script('niceselect', get_template_directory_uri() .'/js/jquery.nice-select.min.js', array('jquery'), false, true);
  wp_localize_script( 'custom', 'getObject', array( 
    'orderby' => isset($_GET['orderby']) ? $_GET['orderby'] : NULL, 
    'order' => isset($_GET['order']) ? $_GET['order'] : NULL,
    'meta_key' => isset($_GET['meta_key']) ? $_GET['meta_key'] : NULL
  ) );
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

function new_excerpt_length($length) {
  return 40;
}
add_filter('excerpt_length', 'new_excerpt_length');

add_filter('excerpt_more', function($more) {
  return '';
});

function new_more_text( $more_link, $more_link_text ) {
  $new = ''; // вписываем своё
  return str_replace( $more_link_text, $new, $more_link );
}
add_filter( 'the_content_more_link', 'new_more_text', 10, 2 );

function list_terms( $atts ) {
	extract(shortcode_atts(array(		
	), $atts));

	$terms = get_terms(array('taxonomy' => 'catalog_type', 'hide_empty' => false, 'parent' => 0));
	if($terms && !is_wp_error($terms)):
		$current_term = get_queried_object_id();
		ob_start();?>
 		 <ul class="catalog_categories">
		<?php foreach( $terms as $term ) {?>
			<li class="<?php if($current_term == $term->term_id ):echo 'active'; endif;?>">
		      <a href="<?php echo get_term_link($term, 'catalog_type');?>"><?php echo $term->name;?></a>
		    </li>
		<?php }?>
		</ul>
	<?php endif;
  	$html = ob_get_contents();
  	ob_end_clean();
  	echo $html;
}
add_shortcode( 'terms_list', 'list_terms' );

add_shortcode( 'post-gallery', 'gallery_func' );

function gallery_func( $atts, $content ){

  $atts = shortcode_atts( array(
  ), $atts );

  ob_start();
  ?>
  <div class="post_gallery d-flex">
    <?php 
      if(have_rows('gallery')):
        while(have_rows('gallery')): the_row();?>
          <div class="post_gallery_item">
            <a href="<?php echo get_sub_field('image')['url']?>" data-lightbox="gallery">
              <img src="<?php echo get_sub_field('image')['url']?>">
            </a> 
          </div>
        <?php endwhile;
      endif;
    ?>
  </div>  
  <?php 
  $html = ob_get_contents();
  ob_clean();
  return $html;
}

/* AJAX Cart */

add_action('wp_ajax_action_cart','action_cart');
add_action('wp_ajax_nopriv_action_cart','action_cart');

function action_cart() {
  $cookies = array();
  if(isset($_COOKIE['product'])) {
    $cookies = explode(",", $_COOKIE['product']);
  }
  $get_query = $_GET['product_id'].':'.$_GET['product_price'].':'.$_GET['product_count'].':'.$_GET['credit'];
  $product_found=false;
  foreach ($cookies as $k => $cookie) {
    $cookie_explode = explode(':',$cookie);
    foreach ($cookie_explode as $value){
        if($value==$_GET['product_id']){
            $product_found=$k;
        }
    }
  }  
	
  if($product_found !== false) {
    $json_prod = array("action" => "remove",'count_prod' => count($cookies));
    unset($cookies[$product_found]);

  } else {
    $json_prod = array("action" => "add", "product" => array(),'count_prod' => count($cookies));
    $cookies[] = $_GET['product_id'].':'.$_GET['product_price'].':'.$_GET['product_count'].':'.$_GET['credit'];
  }
  setcookie("product", implode(",", $cookies),time() + 3600*24*10,'/');
  echo json_encode($json_prod);
  die;
}

// --- DEL PROD
  add_action('wp_ajax_action_cart_del','action_cart_del');
  add_action('wp_ajax_nopriv_action_cart_del','action_cart_del');

  function action_cart_del(){
    $cookies = array();
    if(isset($_COOKIE['product'])) {
      $cookies = explode(",", $_COOKIE['product']);
    }
    $get_query = $_GET['product_id'].':'.$_GET['product_price'].':'.$_GET['product_count'].':'.$_GET['credit'];
    $product_found=false;
	  foreach ($cookies as $k => $cookie) {
  		$cookie_explode = explode(':',$cookie);
  		foreach ($cookie_explode as $value){
  			if($value==$_GET['product_id']){
  				$product_found=$k;
  			}
  		}
	  }  

    if($product_found !== false) {
      $json_prod = array("action" => "remove",'count' => count($cookies));
      unset($cookies[$product_found]);
    }
    setcookie("product", implode(",", $cookies),time() + 3600*24*10,'/');
    echo json_encode($json_prod);
    die;
  }
<?php

$all_summ = 0;
$prod_count = array();
if (!empty($_COOKIE['product']))
{
	$prod_count = explode(",", $_COOKIE['product']);

	foreach($prod_count as $count) {
		$prod_sum = explode(":", $count);
		if(!empty($prod_sum[1])){
			$all_summ = $all_summ + $prod_sum[1];
		}
	}
}
get_header();?>

<div class="main catalog_single_page <?php echo get_field('product_type')?>">
	<?php 
		$product_type = get_field('product_type');
		get_template_part('single-catalog-' . $product_type);?>
	<?php get_template_part('map-block');?>
	<div class="modal" id="addToCartSuccess">
	  <div class="modal_sandbox"></div>
	  <div class="modal_box">
	    <div class="modal_body">
	      <div class="form">
	        <div class="form_title">Товар добавлен в корзину</div>
	        <div class="form_product_info">
	        	<div class="form_product_info_count">Товаров: <span><?php echo count($prod_count);?></span> </div>
	        	<div class="form_product_info_sum">На сумму: <span><?php echo number_format($all_summ, 0, '.', ' ')?></span> руб.</div>
	        </div>
	        <div class="form_links d-flex">
	        	<a href="<?php the_permalink(274);?>">Перейти в корзину</a>
	        	<button>Продолжить покупку</button>
	        </div>
	        <div class="close">
	          <img src="<?php echo get_template_directory_uri() . '/img/close.png'?>">
	        </div>
	      </div>      
	    </div>
	  </div>
	</div>
</div>


<?php get_footer(); ?>
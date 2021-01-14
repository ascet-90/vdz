<?php
/*
 * Template Name: Cart page
 */
 
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
get_header(); ?>

<div class="main cart_page">
	<div class="container">
		<div class="cart_wrap">
			<?php if(have_posts()):
				while(have_posts()):the_post();?>
					<h1 class="section_title"><?php the_title();?></h1>
					<?php 
						if(empty($prod_count)):?>
							<p class="cart_empty">Ваша корзина пуста</p>
						<?php elseif (!empty($prod_count)) :?>
							<div class="cart_products_list">
								<div class="cart_products_header d-flex">
									<div class="thumbnail"></div>
									<div class="title">Наименование</div>
									<div class="count">Количество</div>
									<div class="price">Цена</div>
									<div class="delete">Удалить</div>
								</div>
								<?php 
									foreach ($prod_count as $cart_item):
										$cart_id = explode(":", $cart_item)[0];
										?>										
										<div class="cart_products_item d-flex">
											<div class="thumbnail">
												<div class="thumbnail_inner d-flex">
													<a href="<?php the_permalink($cart_id);?>" class="prod_thumb"><img src="<?php echo get_the_post_thumbnail_url($cart_id);?>"></a>
												</div>												
											</div>
											<div class="cart_product_info d-flex">
												<div class="title">
													<span class="mob_title">Наименование</span>
													<a href="<?php echo get_permalink($cart_id); ?>" class="prod_title"><?php echo get_the_title($cart_id); ?></a>
												</div>
												<div class="count"><span class="mob_title">Количество:&nbsp;</span><span class="prod_count"><?php echo explode(":", $cart_item)[2];?></span></div>
												<div class="price"><span class="mob_title">Цена:&nbsp;</span><span class="prod_price"><?php echo number_format(explode(":", $cart_item)[1], 0, '.', ' ');?></span></div>
												<?php 
													$cart_credit = explode(":", $cart_item)[3];
												?>
												<div class="delete" data-product-id="<?php echo $cart_id;?>" data-credit="<?php echo $cart_credit;?>">
													<button class="product_delete"><img src="<?php echo get_template_directory_uri() . '/img/delete.png'?>"></button>
												</div>
											</div>											
										</div>
									<?php endforeach;
								?>
							</div>
							<div class="cart_form">
								<?php echo do_shortcode('[contact-form-7 id="384" title="Форма оплаты"]');?>
							</div>
						<?php endif;
					?>
				<?php endwhile;
			endif;
			?>
		</div>		
	</div>
	<div class="modal" id="thanks">
	  <div class="modal_sandbox"></div>
	  <div class="modal_box">
	    <div class="modal_body">
	      <div class="form">	      	
	        <div class="form_title">Спасибо за заказ!</div>
	        <div class="form_subtitle">Ваша заявка отправлена!</div>
	        <div class="close">
	          <img src="<?php echo get_template_directory_uri() . '/img/close.png'?>">
	        </div>
	      </div>      
	    </div>
	  </div>
	</div>
</div>

<?php get_footer(); ?>
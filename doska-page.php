<?php
/*
 * Template Name: Doska page
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
get_header();?>

<div class="main catalog_single_page doska">
	<div class="container">
		<div class="catalog_single_wrap d-flex">
			<?php get_sidebar('catalog');?>
			<div class="content">
				<?php if(have_posts()):
					while(have_posts()):the_post();?>
						<div class="catalog_single_main d-flex">						
							<div class="catalog_single_gallery">
								<div class="doska_catalog_single_slider">
									<?php 
										if(have_rows('gallery')):
											while(have_rows('gallery')):the_row();?>
												<div class="slide">
													<?php 
														$image = get_sub_field('image');
														if(!empty($image)):?>
															<a href="<?php echo $image['url']?>" data-lightbox="main-gallery"><img src="<?php echo $image['url']?>"></a>	
														<?php endif;
													?>												
												</div>
											<?php endwhile;
										endif;
									?>	
								</div>
								<div class="doska_catalog_single_slider_nav">
									<?php 
										if(have_rows('gallery')):
											while(have_rows('gallery')):the_row();?>
												<div class="slide">
													<?php 
														$image = get_sub_field('image');
														if(!empty($image)):?>
															<img src="<?php echo $image['url']?>">
														<?php endif;
													?>												
												</div>
											<?php endwhile;
										endif;
									?>	
								</div>
							</div>
							<div class="catalog_single_info">
								<h1 class="catalog_single_title"><?php the_title()?></h1>
								<div class="doska_info">
									<div class="item d-flex">
										<span class="title">Порода древесины:</span>
										<span class="item_content"><?php the_field('poroda');?></span>
									</div>
									<div class="item d-flex">
										<span class="title">Класс/Сорт:</span>
										<span class="item_content"><?php the_field('class_sort');?></span>
									</div>
									<div class="item price d-flex">
										<span class="title">Цена:</span>
										<span class="item_content">от <span><?php if(!empty(get_field('price'))): echo number_format(get_field('price'), 0, '.', ' '); else: echo 0; endif;?></span> руб./м<sup>3</sup></span>
									</div>
								</div>	
								<?php 
									$price_for_meter = get_field('price_for_meter');
									$price_for_piece = get_field('price_for_piece');
									$price_for_pack = get_field('price_for_pack');
									$price_for_meter_square = get_field('price_for_meter_square');
									$prices[] = $price_for_meter;
									$prices[] = $price_for_piece;
									$prices[] = $price_for_pack;
									$prices[] = $price_for_meter_square;
									$show = false;
									foreach ($prices as $price) {
										if(!empty($price)):
											$show = true;
										endif;
									}
									if($show == true):
								?>
								<div class="price_wrap">
									<?php 
										if(!empty($price_for_meter)):											
									?>
									<div class="price_item meter d-flex">
										<div class="input_wrap d-flex">
											<button class="price_minus">-</button>
											<span class="input_price"><span>1</span>м<sup>3</sup></span>
											<button class="price_plus">+</button>
										</div>
										<span class="single_price" data-price="<?php echo $price_for_meter?>"><span><?php if(!empty(get_field('price_for_meter'))): echo number_format(get_field('price_for_meter'), 0, '.', ' '); else: echo 0; endif;?></span> руб.</span>
									</div>
								<?php endif;?>
									<?php
										$key_id = NULL;
										if (!empty($_COOKIE['product'])){
											$products = explode(",", $_COOKIE['product']);
											$key_id = in_array($post->ID, $products);
											$current_prod_count = '';
											if($key_id):
												foreach($products as $product):
													$product_array = explode(':', $product);
													if($post->ID == $product_array[0]):
														$current_prod_count = $product_array[2];
													endif;
												endforeach;
											endif;
										}																			
									?>
									<?php 
										if(!empty($price_for_piece)):											
									?>
									<div class="price_item piece d-flex">
										<div class="input_wrap d-flex">
											<button class="price_minus">-</button>
											<span class="input_price"><span>
												<?php 
													if($key_id): 
														echo $current_prod_count;
												else: echo 1; 
												endif; 
											?></span>шт.</span>
											<button class="price_plus">+</button>
										</div>
										<span class="single_price" data-price="<?php echo $price_for_piece;?>"><span><?php if(!empty(get_field('price_for_piece'))): echo number_format(get_field('price_for_piece'), 0, '.', ' '); else: echo 0; endif;?></span> руб.</span>
									</div>
									<?php endif;?>	
									<?php 
										if(!empty($price_for_pack) && (empty($price_for_meter) || (empty($price_for_piece)))):											
									?>
									<div class="price_item pack d-flex">
										<div class="input_wrap d-flex">
											<button class="price_minus">-</button>
											<span class="input_price"><span><?php 
													if($key_id): 
														echo $current_prod_count;
												else: echo 1; 
												endif; ?></span>п.</span>
											<button class="price_plus">+</button>
										</div>
										<span class="single_price" data-price="<?php echo $price_for_pack;?>"><span><?php echo number_format($price_for_pack, 0, '.', ' ');?></span> руб.</span>
									</div>
									<?php endif;?>
									<?php 
										$count_empty = 0;
										foreach ($prices as $price) {
											if(empty($price)):
												$count_empty++;
											endif;
										}
										if(!empty($price_for_meter_square) && $count_empty == 2):		
									?>
									<div class="price_item square d-flex">
										<div class="input_wrap d-flex">
											<button class="price_minus">-</button>
											<span class="input_price"><span>1</span>м<sup>2</sup></span>
											<button class="price_plus">+</button>
										</div>
										<span class="single_price" data-price="<?php echo $price_for_meter_square;?>"><span><?php if(!empty(get_field('price_for_meter_square'))): echo number_format(get_field('price_for_meter_square'), 0, '.', ' '); else: echo 0; endif;?></span> руб.</span>
									</div>
									<?php endif;?>
									<div class="price_sum_wrap">Итого: <span class="price_sum"><span></span> руб.</span></div>							
								</div>	
								<?php endif;?>						
							</div>
						</div>				
						<div class="social_wrap d-flex">
							<?php
								$key_id = NULL;
								if (!empty($_COOKIE['product'])) {
									$prod_id_keys = explode(",", $_COOKIE['product']);
									$key_id = in_array($post->ID, $prod_id_keys);
								}								
							?>
							<div class="social_icons">
								<a href="<?php the_field('whatsapp_link')?>"><img src="<?php echo get_template_directory_uri() . '/img/whatsapp-big.png'?>"></a>
								<a href="<?php the_field('viber_link')?>"><img src="<?php echo get_template_directory_uri() . '/img/viber-big.png'?>"></a>
								<a href="<?php the_field('telegram_link')?>"><img src="<?php echo get_template_directory_uri() . '/img/telegram-big.png'?>"></a>
							</div>
							<?php if($show == true):?>
							<button type="button" class="order_catalog" data-product-id="<?php the_ID()?>">							
								<?php 
									if(!$key_id):
										echo 'Заказать';
									else:
										echo 'Удалить';
									endif;
								?>									
							</button>
							<?php endif;?>
							<div class="phone">
								<img src="<?php echo get_template_directory_uri() . '/img/phone.png'?>">
								<?php the_field('phone');?>
							</div>
						</div>	
						<div class="description">
							<?php the_field('description');?>
						</div>
						<div class="production">
							<div class="production_title">
								<?php the_field('doska_prod_title');?>
							</div>
							<div class="production_text">
								<?php the_field('doska_production');?>
							</div>
						</div>
						<div class="media_block d-flex">
							<?php 
								$video_link = get_field('video_link');
								if(!empty($video_link)):									
							?>
							<div class="video_wrap">
								<div class="video_link">
									<a href="<?php the_field('video_link')?>" data-thumbnail="<?php echo get_field('video_preview')['url']?>" class="wplightbox" data-group="set2"><img src="<?php echo get_field('video_preview')['url']?>"></a>
								</div>
							</div>
							<?php endif;?>
							<div class="media_gallery d-flex">
								<?php 
									if(have_rows('production_gallery')):
										while(have_rows('production_gallery')) : the_row();?>
											<div class="media_gallery_item">
												<a href="<?php echo get_sub_field('image')['url'];?>" data-lightbox="media-gallery"><img src="<?php echo get_sub_field('image')['url'];?>"></a>
											</div>
									<?php endwhile;
									endif;
								?>									
							</div>
						</div>	
						<?php 
							$pages = get_posts(array('post_type' => 'page', 'post_parent' => $post->post_parent,'exclude' => get_the_ID(), 'orderby' => 'rand', 'numberposts' => 6));
							if(!empty($pages)): ?>
								<div class="similar_products">
									<div class="similar_products_title">Похожие товары</div>
									<div class="similar_products_list d-flex">
										<?php	
											foreach( $pages as $post ) {
												setup_postdata( $post ); ?>
												<div class="similar_product d-flex" id="<?php the_ID();?>">
													<div class="thumb">
														<a href="<?php the_permalink();?>">
															<?php if(has_post_thumbnail()):
																the_post_thumbnail('similar_thumb');
																endif;
															?>
															<span class="price"><?php if(!empty(get_field('price'))): echo number_format(get_field('price'), 0, '.', ' '); else: echo 0; endif;?> руб.</span>
														</a>
													</div>
													<div class="title">
														<a href="<?php the_permalink();?>">
															<?php the_title();?>
														</a>
													</div>
													<a class="more" href="<?php the_permalink();?>">Подробнее</a>
												</div>
											<?php
											}
										wp_reset_postdata();?>
									</div>
								</div>
							<?php endif;							
						?>
					<?php endwhile;
				endif;
				?>
			</div>
		</div>		
	</div>
	<?php get_template_part('special-offers')?>
	<section class="calculate">
		<div class="container">			
			<div class="calculate_from_wrap">				
				<div class="form">
					<div class="calculate_title">
						<?php the_field('calculate_title', 'options')?>
					</div>
					<?php echo do_shortcode('[contact-form-7 id="335" title="Закажите расчет стоимости материалов"]') ?>
				</div>
				<?php 
					$bg_image1 = get_field('calculate_bg_2', 'options');
					if(!empty($bg_image1)):?>
						<div class="form_image d-flex">
							<img src="<?php echo $bg_image1['url']?>">
						</div>
					<?php endif;
				?>
			</div>			
		</div>		
	</section>
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
<div class="container">
	<div class="catalog_single_wrap d-flex">
		<?php get_sidebar('catalog');?>
		<div class="content">
			<?php if(have_posts()):
				while(have_posts()):the_post();?>
					<h1 class="catalog_single_title"><?php the_title()?></h1>
					<div class="catalog_single_gallery d-flex">
						<div class="catalog_single_slider">
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
						<div class="catalog_single_slider_nav">
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
					<div class="domkomplect_info d-flex">
						<div class="item d-flex">
							<div class="icon">
								<img src="<?php echo get_template_directory_uri() . '/img/expand-square.png'?>">
							</div>
							<div class="item_content">
								<div class="title">
									Линейные размеры:
								</div>
								<div class="item_value">
									<?php the_field('linear_sizes')?>
								</div>
							</div>								
						</div>	
						<div class="item d-flex">
							<div class="icon">
								<img src="<?php echo get_template_directory_uri() . '/img/stripe.png'?>">
							</div>
							<div class="item_content">
								<div class="title">
									Площадь:
								</div>
								<div class="item_value">
									<?php the_field('area')?>
								</div>
							</div>								
						</div>	
						<div class="item d-flex">
							<div class="icon">
								<img src="<?php echo get_template_directory_uri() . '/img/stares.png'?>">
							</div>
							<div class="item_content">
								<div class="title">
									Этажность:
								</div>
								<div class="item_value">
									<?php the_field('storeys')?>
								</div>
							</div>								
						</div>	
						<div class="item d-flex">
							<div class="icon">
								<img src="<?php echo get_template_directory_uri() . '/img/dates.png'?>">
							</div>
							<div class="item_content">
								<div class="title">
									Сроки производства:
								</div>
								<div class="item_value">
									<?php the_field('terms')?>
								</div>
							</div>								
						</div>				
					</div>
					<div class="price_block">	
						<div class="price_block_title">
							Цена за стеновой комплект:
						</div>
						<form id="price_form">
							<div class="price_block_list d-flex">								
								<div class="item d-flex">
									<div class="title">
										Профилированный брус естественной влажности
									</div>
									<div class="price_wrap">
										<div class="price">
											<label>
												<input type="radio" name="price" value="natural_1" checked>
												<span class="price_title"><?php the_field('price_title_1')?> <span>от <span class="sum_price"><?php echo !empty(get_field('price')) ? the_field('price') : 0;?></span> руб.</span></span>
											</label>
										</div>
										<div class="price">
											<label>
												<input type="radio" name="price" value="natural_2">
												<span class="price_title"><?php the_field('price_title_2')?> <span>от <span class="sum_price"><?php echo !empty(get_field('price_natural_2')) ? the_field('price_natural_2') : 0;?></span> руб.</span></span>
											</label>
										</div>
									</div>
								</div>
								<div class="item d-flex">
									<div class="title">
										Профилированный брус камерной влажности
									</div>
									<div class="price_wrap">
										<div class="price">
											<label>
												<input type="radio" name="price" value="camer_1">
												<span class="price_title"><?php the_field('price_title_3')?> <span>от <span class="sum_price"><?php echo !empty(get_field('price_camera_1')) ? the_field('price_camera_1') : 0;?></span> руб.</span></span>
											</label>
										</div>
										<div class="price">
											<label>
												<input type="radio" name="price" value="camer_2">
												<span class="price_title"><?php the_field('price_title_4')?> <span>от <span class="sum_price"><?php echo !empty(get_field('price_camera_2')) ? the_field('price_camera_2') : 0;?></span> руб.</span></span>
											</label>
										</div>
									</div>
								</div>
								<div class="item additional d-flex">
									<div class="price_wrap">
										<div class="price">
											<label>
												<input type="checkbox" name="pilo_complect">
												<span>Комплект пиломатериалов <span><span class="sum_price"><?php echo !empty(get_field('pilo_price')) ? the_field('pilo_price') : 0;?></span> руб.</span></span>
											</label>
										</div>
										<div class="price">
											<label>
												<input type="checkbox" name="sborka">
												<span>Предварительная стоимость сборки <span><span class="sum_price"><?php echo !empty(get_field('sborka_price')) ? the_field('sborka_price') : 0;?></span> руб.</span></span>
											</label>
										</div>
										<div class="price credit">
											<label>
												<input type="checkbox" name="credit">
												<span>Купить в кредит <a href="<?php the_permalink(16);?>" class="credit_more">Узнать подробнее</a></span>
											</label>
										</div>
									</div>
								</div>								
							</div>
							<div class="final_price_wrap">
								Итоговая стоимость: <span class="final_price"><span>920 000</span> руб.</span>
								<input type="hidden" name="final_price" id="final_price">
							</div>
							<?php
								$key_id = NULL;
								if (!empty($_COOKIE['product'])) {
									$prod_id_keys = explode(",", $_COOKIE['product']);
									$key_id = in_array($post->ID, $prod_id_keys);
								}								
							?>
							<div class="social_wrap d-flex">
								<div class="social_icons">
									<a href="<?php the_field('whatsapp_link')?>"><img src="<?php echo get_template_directory_uri() . '/img/whatsapp-big.png'?>"></a>
									<a href="<?php the_field('viber_link')?>"><img src="<?php echo get_template_directory_uri() . '/img/viber-big.png'?>"></a>
									<a href="<?php the_field('telegram_link')?>"><img src="<?php echo get_template_directory_uri() . '/img/telegram-big.png'?>"></a>
								</div>
								<button type="button" class="order_catalog" data-product-id="<?php the_ID()?>">
									<?php 
										if(!$key_id):
											echo 'Заказать';
										else:
											echo 'Удалить';
										endif;
									?>
								</button>
								<div class="phone">
									<img src="<?php echo get_template_directory_uri() . '/img/phone.png'?>">
									<?php the_field('phone');?>
								</div>
							</div>								
						</form>
					</div>
					<div class="services_links">
						<p>Также вы можете заказать <a href="<?php the_permalink(18)?>">услуги строительства</a> и <a href="<?php the_permalink(18)?>">отделочные работы</a></p>
					</div>
					<div class="description">
						<div class="description_title">Описание</div>
						<?php the_field('description');?>
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
									if(have_rows('desc_gallery')):
										while(have_rows('desc_gallery')) : the_row();?>
											<div class="media_gallery_item">
												<a href="<?php echo get_sub_field('image')['url'];?>" data-lightbox="media-gallery"><img src="<?php echo get_sub_field('image')['url'];?>"></a>
											</div>
									<?php endwhile;
									endif;
								?>									
							</div>
						</div>	
					</div>
					<?php 
						$terms = get_the_terms(get_the_ID(), 'catalog_type');
						if( $terms ){
							$term = array_shift( $terms );
						}
						$posts = get_posts(array('post_type' => 'catalog', 'tax_query' => array(array('taxonomy' => 'catalog_type', 'terms' => $term->slug, 'field' => 'slug' )),'exclude' => get_the_ID(), 'orderby' => 'rand', 'numberposts' => 6));
						if(!empty($posts)): ?>
							<div class="similar_products">
								<div class="similar_products_title">Похожие товары</div>
								<div class="similar_products_list d-flex">
									<?php	
										foreach( $posts as $post ) {
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
<div class="order_project">
	<div class="order_project_bg">
		<?php 
			$bg_image = get_field('project_bg', 'options');
			if(!empty($bg_image)): ?>
				<img src="<?php echo $bg_image['url']?>">
			<?php endif;
		?>		
	</div>
	<div class="container">
		<div class="order_project_wrap">
			<div class="order_project_title">
				<?php the_field('project_title', 'options')?>
			</div>
			<div class="order_project_subtitle">
				<?php the_field('project_subtitle', 'options')?>
			</div>
			<button class="order_calculate">Заказать расчет</button>
			<?php 
				$bg_image1 = get_field('project_bg_2', 'options');
				if(!empty($bg_image1)):?>
					<div class="form_image d-flex">
						<img src="<?php echo $bg_image1['url']?>">
					</div>
				<?php endif;
			?>
		</div>	
	</div>
</div>
﻿<?php
/*
 * Template Name: Domkomplect Archive page
 */
get_header();
?>

<div class="main catalog_archive_page domkomplect_archive">
	<div class="container">
		<div class="catalog_archive_wrap d-flex">
			<?php get_sidebar('catalog-archive');?>
			<div class="content">
				<?php if(have_posts()):
					while(have_posts()):the_post();?>
						<h1 class="catalog_archive_title"><?php the_title();?></h1>
						<?php	
							$pages = get_pages(array('parent' => get_the_ID(),'hierarchical' => false, 'sort_column' => 'post_date', 'sort_order' => 'asc'));
							if(isset($_GET['orderby']) && $_GET['orderby'] == 'date' && $_GET['order'] == 'DESC') {
								$pages = get_pages(array('parent' => get_the_ID(),'hierarchical' => false, 'sort_column' => 'post_date', 'sort_order' => 'desc'));
							}	
							elseif(isset($_GET['orderby']) && $_GET['orderby'] == 'date' && $_GET['order'] == 'ASC') {
								$pages = get_pages(array('parent' => get_the_ID(),'hierarchical' => false, 'sort_column' => 'post_date', 'sort_order' => 'asc'));
							}
							elseif (isset($_GET['meta_key']) && $_GET['meta_key'] == 'price_natural_1' && $_GET['order'] == 'DESC') {
								$pages = get_posts(array('post_type' => 'page', 'post_parent' => get_the_ID(), 'meta_key' => 'price_natural_1','orderby' => 'meta_value_num', 'order' => 'desc', 'numberposts' => -1));
							}
							elseif (isset($_GET['meta_key']) && $_GET['meta_key'] == 'price_natural_1' && $_GET['order'] == 'ASC') {
								$pages = get_posts(array('post_type' => 'page', 'post_parent' => get_the_ID(), 'meta_key' => 'price_natural_1','orderby' => 'meta_value_num', 'order' => 'asc', 'numberposts' => -1));
							}
							elseif (isset($_GET['meta_key']) && $_GET['meta_key'] == 'area' && $_GET['order'] == 'DESC') {
								$pages = get_posts(array('post_type' => 'page', 'post_parent' => get_the_ID(), 'meta_key' => 'area','orderby' => 'meta_value_num', 'order' => 'desc', 'numberposts' => -1));
							}
							elseif (isset($_GET['meta_key']) && $_GET['meta_key'] == 'area' && $_GET['order'] == 'ASC') {
								$pages = get_posts(array('post_type' => 'page', 'post_parent' => get_the_ID(), 'meta_key' => 'area','orderby' => 'meta_value_num', 'order' => 'asc', 'numberposts' => -1));
							}?>
						<?php if(count($pages) > 0) : ?>
						<div class="similar_products">
							<div class="products_sort_wrap d-flex">
								<div class="products_sort d-flex">
									<span>Сортировка</span>
									<select class="sort_dropdown" name="sort-products" id="sort_dropdown" onchange="document.location.href='?'+this.options[this.selectedIndex].value;">
										<option disabled selected="">Выбрать</option>
										<option value="orderby=date&order=DESC">Дата: по убыванию</option>
										<option value="orderby=date&order=ASC">Дата: по возрастанию</option>
										<option value="meta_key=price_natural_1&orderby=meta_value_num&order=DESC">Цена: по убыванию</option>
										<option value="meta_key=price_natural_1&orderby=meta_value_num&order=ASC">Цена: по возрастанию</option>
										<option value="meta_key=area&orderby=meta_value_num&order=DESC">Площадь: по убыванию</option>
										<option value="meta_key=area&orderby=meta_value_num&order=ASC">Площадь: по возрастанию</option>
									</select>
									<script type="text/javascript">
										$(document).ready(function(){
											if(getObject.meta_key != null && getObject.meta_key == 'price_natural_1' && getObject.order == 'DESC') {
												document.getElementById('sort_dropdown').value="orderby=date&order=DESC";												
												$('#sort_dropdown').val('meta_key=price_natural_1&orderby=meta_value_num&order=DESC');
												$('#sort_dropdown').niceSelect('update');
											} 
											else if(getObject.meta_key != null && getObject.meta_key == 'price_natural_1' && getObject.order == 'ASC') {
												document.getElementById('sort_dropdown').value="orderby=date&order=ASC";												
												$('#sort_dropdown').val('meta_key=price_natural_1&orderby=meta_value_num&order=ASC');
												$('#sort_dropdown').niceSelect('update');
											} else if(getObject.meta_key != null && getObject.meta_key == 'area' && getObject.order == 'DESC') {
												document.getElementById('sort_dropdown').value="orderby=date&order=DESC";												
												$('#sort_dropdown').val('meta_key=area&orderby=meta_value_num&order=DESC');
												$('#sort_dropdown').niceSelect('update');
											} 
											else if(getObject.meta_key != null && getObject.meta_key == 'area' && getObject.order == 'ASC') {
												document.getElementById('sort_dropdown').value="orderby=date&order=ASC";												
												$('#sort_dropdown').val('meta_key=area&orderby=meta_value_num&order=ASC');
												$('#sort_dropdown').niceSelect('update');
											} 
											else if(getObject.orderby != null && getObject.orderby == 'date' && getObject.order == 'DESC') {
												document.getElementById('sort_dropdown').value="orderby=date&order=DESC";												
												$('#sort_dropdown').val('orderby=date&order=DESC');
												$('#sort_dropdown').niceSelect('update');
											} else if(getObject.orderby != null && getObject.orderby == 'date' && getObject.order == 'ASC') {
												document.getElementById('sort_dropdown').value="orderby=date&order=ASC";												
												$('#sort_dropdown').val('orderby=date&order=ASC');
												$('#sort_dropdown').niceSelect('update');
											}
										});
										
									</script>
								</div>
							</div>
							<div class="similar_products_list d-flex">
								<?php foreach( $pages as $post ) {
									setup_postdata( $post ); ?>
									<div class="similar_product d-flex" id="<?php the_ID();?>">
										<div class="thumb">
											<a href="<?php the_permalink();?>">
												<?php if(has_post_thumbnail()):
													the_post_thumbnail('similar_thumb');
													endif;
												?>
												<span class="price"><?php if(!empty(get_field('price_natural_1'))): echo number_format(get_field('price_natural_1'), 0, '.', ' '); else: echo 0; endif;?> руб.</span>
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
					<?php endif;?>
				<?php endwhile;
				endif;?>
			</div>
		</div>
	</div>	
	<?php get_template_part('special-offers')?>
	<section class="pilomaterials">
		<div class="container">
			<h2 class="section_title"><?php the_field('pilomaterials_title', 'options')?></h2>
			<div class="pilomaterials_content">
				<?php the_field('pilomaterials_text', 'options')?>
			</div>
		</div>
	</section>
	<section class="calculate">
		<div class="calculate_bg">
			<?php 
				$bg_image = get_field('calculate_bg', 'options');
				if(!empty($bg_image)): ?>
					<img src="<?php echo $bg_image['url']?>">
				<?php endif;
			?>		
		</div>
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
</div>


<?php get_footer(); ?>
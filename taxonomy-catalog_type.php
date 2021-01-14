<?php
/*
 * Template Name: Domkomplect Archive page
 */
get_header();
?>

<div class="main catalog_archive_page">
	<div class="container">
		<div class="catalog_archive_wrap d-flex">
			<?php get_sidebar('catalog-archive');?>
			<div class="content">
				<?php 
					$term = get_queried_object();
				?>
				<h1 class="catalog_archive_title"><?php echo $term->name;?></h1>
				<?php 
					$child_terms = get_terms(array('taxonomy' => 'catalog_type', 'parent' => $term->term_id));
					if($child_terms && !is_wp_error($child_terms)): ?>
						<div class="catalog_list d-flex">
							<?php foreach($child_terms as $term):?>
							<div class="product" id="<?php echo $term->term_id;?>">
								<a href="<?php echo get_term_link($term);?>">
									<div class="product_title d-flex">
										<span><?php echo $term->name;?></span>
										<div class="product_link d-flex">
											<img src="<?php echo get_template_directory_uri() . '/img/product-arrow.png'?>">
										</div>
									</div>
									<div class="product_thumb d-flex">
										<?php 
											$thumb = get_field('thumbnail', $term);
											if(!empty($thumb)): ?>
												<img src="<?php echo $thumb['url']?>" alt="">
											<?php endif;
										?>
									</div>								
								</a>
							</div>
							<?php endforeach;?>
						</div>
					<?php endif;
				?>				
				<?php 
					global $query_string;
					$query = $query_string . "&posts_per_page=-1";					
					if(isset($_GET['orderby']) && $_GET['orderby'] == 'date' && $_GET['order'] == 'DESC') {
						$query = $query . "&orderby=date&order=desc";
					}	
					elseif(isset($_GET['orderby']) && $_GET['orderby'] == 'date' && $_GET['order'] == 'ASC') {
						$query = $query . "&orderby=date&order=asc";
					}
					elseif (isset($_GET['meta_key']) && $_GET['meta_key'] == 'price' && $_GET['order'] == 'DESC') {
						$query = $query . "&orderby=meta_value_num&order=desc&meta_key=price";
					}
					elseif (isset($_GET['meta_key']) && $_GET['meta_key'] == 'price' && $_GET['order'] == 'ASC') {
						$query = $query . "&orderby=meta_value_num&order=asc&meta_key=price";
					}
					elseif (isset($_GET['meta_key']) && $_GET['meta_key'] == 'area' && $_GET['order'] == 'DESC') {
						$query = $query . "&orderby=meta_value_num&order=desc&meta_key=area";
					}
					elseif (isset($_GET['meta_key']) && $_GET['meta_key'] == 'area' && $_GET['order'] == 'ASC') {
						$query = $query . "&orderby=meta_value_num&order=asc&meta_key=area";
					}
					query_posts($query);
					if(have_posts()):?>
					<div class="similar_products">
						<div class="products_sort_wrap d-flex">
							<div class="products_sort d-flex">
								<span>Сортировка</span>
								<select class="sort_dropdown" name="sort-products" id="sort_dropdown" onchange="document.location.href='?'+this.options[this.selectedIndex].value;">
									<option disabled selected="">Выбрать</option>
									<option value="orderby=date&order=DESC">Дата: по убыванию</option>
									<option value="orderby=date&order=ASC">Дата: по возрастанию</option>
									<option value="meta_key=price&orderby=meta_value_num&order=DESC">Цена: по убыванию</option>
									<option value="meta_key=price&orderby=meta_value_num&order=ASC">Цена: по возрастанию</option>
									<option value="meta_key=area&orderby=meta_value_num&order=DESC">Площадь: по убыванию</option>
									<option value="meta_key=area&orderby=meta_value_num&order=ASC">Площадь: по возрастанию</option>
								</select>
								<script type="text/javascript">
									$(document).ready(function(){
										if(getObject.meta_key != null && getObject.meta_key == 'price' && getObject.order == 'DESC') {
											document.getElementById('sort_dropdown').value="orderby=date&order=DESC";												
											$('#sort_dropdown').val('meta_key=price&orderby=meta_value_num&order=DESC');
											$('#sort_dropdown').niceSelect('update');
										} 
										else if(getObject.meta_key != null && getObject.meta_key == 'price' && getObject.order == 'ASC') {
											document.getElementById('sort_dropdown').value="orderby=date&order=ASC";												
											$('#sort_dropdown').val('meta_key=price&orderby=meta_value_num&order=ASC');
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
						<?php while(have_posts()):the_post();?>
							<div class="similar_product d-flex" id="<?php the_ID();?>">
								<div class="thumb">
									<a href="<?php the_permalink();?>">
										<?php if(has_post_thumbnail()):
											the_post_thumbnail('similar_thumb');
											endif;
										?>
										<?php 
											$price = get_field('price');
											if(!empty($price)):?>
												<span class="price"><?php echo number_format($price, 0, '.', ' '); ?> руб.</span>
											<?php 
											else: ?>
												<span class="price"><?php echo 0;?> руб.</span>
											<?php endif;
										?>										
									</a>
								</div>
								<div class="title">
									<a href="<?php the_permalink();?>">
										<?php the_title();?>
									</a>
								</div>
								<a class="more" href="<?php the_permalink();?>">Подробнее</a>
							</div>
								
					<?php endwhile;?>
						</div>
					</div>
				<?php 
					wp_reset_query();
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
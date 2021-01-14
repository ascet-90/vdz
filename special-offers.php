<section class="special_offers">
	<div class="special_offers_bg">
		<?php 
			$bg_image = get_field('offers_bg', 'options');
			if(!empty($bg_image)): ?>
				<img src="<?php echo $bg_image?>">
			<?php endif;
		?>		
	</div>
	<div class="container">
		<h2 class="section_title"><?php the_field('offers_title', 'options')?></h2>
		<div class="special_offers_list_wrap">
			<div class="special_offers_list d-flex">
				<?php 
					$bg_image = get_field('offer_1_bg', 'options');
					$style = '';
					if(!empty($bg_image)): 
						$style = 'background-image:url('. $bg_image['url'] .');';
					endif;
				?>
				<div class="offer big">
					<div class="offer_inner" style="<?php echo $style?>">
						<div class="offer_content">
							<div class="offer_title">
								<?php the_field('discount_1', 'options'); ?>
							</div>
							<div class="offer_text">
								<?php the_field('discount_text_1', 'options'); ?>
							</div>
						</div>						
					</div>					
				</div>
				<div class="offers_wrap">
					<?php 
						$bg_image = get_field('offer_2_bg', 'options');
						$style = '';
						if(!empty($bg_image)): 
							$style = 'background-image:url('. $bg_image['url'] .');';
						endif;
					?>
					<div class="offer">
						<div class="offer_inner" style="<?php echo $style?>">
							<div class="offer_content">
								<div class="offer_title">
									<?php the_field('discount_2', 'options'); ?>
								</div>
								<div class="offer_text">
									<?php the_field('discount_text_2', 'options'); ?>
								</div>
							</div>
						</div>
					</div>
					<?php 
						$bg_image = get_field('offer_3_bg', 'options');
						$style = '';
						if(!empty($bg_image)): 
							$style = 'background-image:url('. $bg_image['url'] .');';
						endif;
					?>
					<div class="offer">
						<div class="offer_inner" style="<?php echo $style?>">
							<div class="offer_content">
								<div class="offer_title">
									<?php the_field('discount_3', 'options'); ?>
								</div>
								<div class="offer_text">
									<?php the_field('discount_text_3', 'options'); ?>
								</div>
							</div>							
						</div>
					</div>
				</div>
			</div>			
		</div>
	</div>
</section>
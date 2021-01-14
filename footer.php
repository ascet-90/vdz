				<footer class="footer">
					<div class="container">
						<div class="footer_inner d-flex">
							<div class="social_icons d-flex">
								<?php 
									if(have_rows('social_icons', 'options')):
										while(have_rows('social_icons', 'options')):the_row(); ?>
											<div class="social_icon">
												<a href="<?php the_sub_field('link');?>"><img src="<?php echo get_sub_field('icon')['url'];?>"></a>
											</div>
										<?php endwhile;
									endif;
								?>
							</div>		
							<div class="footer_right d-flex">
								<a href="<?php the_permalink(3)?>">Политика конфиденциальности</a>
								<div class="copyright"><?php the_field('copyright', 'options');?></div>
							</div>
						</div>							
					</div>								
				</footer>				
<!-- Modal -->

<div class="modal" id="modalOrder">
  <div class="modal_sandbox"></div>
  <div class="modal_box">
    <div class="modal_body">
    	<div class="form">
    		<?php echo do_shortcode('[contact-form-7 id="14" title="Заказать звонок"]') ?>
    		<div class="close">
    			<img src="<?php echo get_template_directory_uri() . '/img/close.png'?>">
    		</div>
    	</div>    	
    </div>
  </div>
</div>
<div class="modal" id="modalCalculate">
  <div class="modal_sandbox"></div>
  <div class="modal_box">
    <div class="modal_body">
    	<div class="form">
    		<?php echo do_shortcode('[contact-form-7 id="486" title="Заказать расчет"]') ?>
    		<div class="close">
    			<img src="<?php echo get_template_directory_uri() . '/img/close.png'?>">
    		</div>
    	</div>    	
    </div>
  </div>
</div>
<div class="modal" id="modalCredit">
  <div class="modal_sandbox"></div>
  <div class="modal_box">
    <div class="modal_body">
    	<div class="form">
    		<?php echo do_shortcode('[contact-form-7 id="487" title="Заявка на кредит"]') ?>
    		<div class="close">
    			<img src="<?php echo get_template_directory_uri() . '/img/close.png'?>">
    		</div>
    	</div>    	
    </div>
  </div>
</div>

	</div>

<?php wp_footer(); ?>
</body>
</html>
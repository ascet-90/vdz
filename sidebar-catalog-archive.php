<div id="sidebar" class="sidebar">
	<div class="sidebar_header d-flex">
		<span>Каталог</span>
		<div class="sidebar_toggle">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<div class="sidebar_content">
		<?php if ( is_active_sidebar( 'sidebar_catalog_archive' ) ) : ?>	 
			<?php dynamic_sidebar( 'sidebar_catalog_archive' ); ?>	 
		<?php endif; ?>
	</div>	
</div>
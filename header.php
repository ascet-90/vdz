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
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="keywords" content="<?php bloginfo('keywords'); ?>"/>
		<meta name="description" content="<?php bloginfo('description'); ?>"/>
		<meta name="copyright" content="<?php bloginfo('copyright'); ?>">
		<meta content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width" name="viewport">
		<meta name="author" content="QuatroIT">
		<meta name="format-detection" content="telephone=no">
		<link rel="shortcut icon" href="">
		<meta name="robots" content="noindex, nofollow" />
		<title><?php bloginfo('name'); ?> - <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
			<div class="wrapper">
				<a href="<?php the_permalink(274);?>" class="cart">
				  <div class="cart_image">
				    <img src="<?php echo get_template_directory_uri() . '/img/shopping-cart.png'?>">
				    <span><?php echo count($prod_count);?></span>
				  </div>
				  <div class="cart_price">
				    <span><?php echo number_format($all_summ, 0, '.', ' '); ?></span> руб.
				  </div>
				</a>				
				<?php 
					$class = '';
					if(is_front_page()):
						$class = 'dark';
					endif;
				?>
				<header id="header" class="header <?php echo $class?>">
					<div class="mobile_nav">
						<div class="container">
							<div class="mobile_nav_inner d-flex">
								<?php
									$image = get_field('logo', 'options');
									if(!empty($image)) : ?>
										<div class="logo"><a href="<?php echo get_home_url(); ?>"><img src="<?php echo $image['url']?>" alt="<?php echo $image['alt']?>"></a></div>
									<?php endif;
								?>
								<div class="header_tel">
									<div class="item d-flex">
										<?php the_field('tel_num_1', 'options');?>
										<a class="whatsapp" href="<?php the_field('tel_1_whatsapp', 'options');?>"><img src="<?php echo get_template_directory_uri(). '/img/whatsapp.png'?>"></a> 
										<a href="<?php the_field('tel_1_viber', 'options');?>"><img src="<?php echo get_template_directory_uri(). '/img/viber.png'?>"></a> 
									</div>
									<div class="item d-flex">
										<?php the_field('tel_num_2', 'options');?>
										<a class="whatsapp"  href="<?php the_field('tel_2_whatsapp', 'options');?>"><img src="<?php echo get_template_directory_uri(). '/img/whatsapp.png'?>"></a> 
										<a href="<?php the_field('tel_2_viber', 'options');?>"><img src="<?php echo get_template_directory_uri(). '/img/viber.png'?>"></a> 
									</div>
								</div>							
								<div class="mob_toggle">
									<span></span>
									<span></span>
									<span></span>
								</div>
							</div>
						</div>						
					</div>
					<div class="header_inner">
						<div class="container">
							<div class="header_top d-flex">
								<?php
									$image = get_field('logo', 'options');
									if(!empty($image)) : ?>
										<div class="logo"><a href="<?php echo get_home_url(); ?>"><img src="<?php echo $image['url']?>" alt="<?php echo $image['alt']?>"></a></div>
									<?php endif;
								?>	
								<div class="header_info_wrap d-flex">
									<div class="header_info">
										<div class="description">
											<?php the_field('description', 'options');?>
										</div>
										<div class="work_since">
											<?php the_field('work_since', 'options');?>
										</div>
									</div>
									<div class="header_location">
										<div class="item address d-flex">
											<img src="<?php echo get_template_directory_uri(). '/img/location.png'?>">
											<?php the_field('address', 'options');?>
										</div>
										<div class="item email d-flex">
											<img src="<?php echo get_template_directory_uri(). '/img/mail.png'?>">
											<a href="mailto:<?php the_field('email', 'options');?>"><?php the_field('email', 'options');?></a> 
										</div>
									</div>
									<div class="header_tel">
										<div class="item d-flex">
											<?php the_field('tel_num_1', 'options');?>
											<a class="whatsapp" href="<?php the_field('tel_1_whatsapp', 'options');?>"><img src="<?php echo get_template_directory_uri(). '/img/whatsapp.png'?>"></a> 
											<a href="<?php the_field('tel_1_viber', 'options');?>"><img src="<?php echo get_template_directory_uri(). '/img/viber.png'?>"></a> 
										</div>
										<div class="item d-flex">
											<?php the_field('tel_num_2', 'options');?>
											<a class="whatsapp"  href="<?php the_field('tel_2_whatsapp', 'options');?>"><img src="<?php echo get_template_directory_uri(). '/img/whatsapp.png'?>"></a> 
											<a href="<?php the_field('tel_2_viber', 'options');?>"><img src="<?php echo get_template_directory_uri(). '/img/viber.png'?>"></a> 
										</div>
									</div>
								</div>		
								<button class="order_call">Заказать звонок</button>					
							</div>						
						</div>		
						<div class="header_bottom">
							<div class="container">
								<div class="menu_wrap d-flex">												
									<?php wp_nav_menu(['theme_location' => 'header', 'container'=>false]); ?>
									<button class="order_call">Заказать звонок</button>										
								</div>	
							</div>
						</div>	
					</div>	
				</header>


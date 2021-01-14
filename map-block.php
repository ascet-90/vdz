<div class="map_wrap">
	<div class="container">
		<div class="map_container d-flex">
			<div class="description">
				<div class="map_title">
					<?php the_field('map_title', 'options');?>
				</div>
				<div class="description_list">
					<div class="item address d-flex">
						<div class="icon">
							<img src="<?php echo get_field('address_icon', 'options')['url']?>">
						</div>
						<?php the_field('map_address', 'options');?>
					</div>
					<div class="item mail d-flex">
						<div class="icon">
							<img src="<?php echo get_field('email_icon', 'options')['url']?>">
						</div>
						<a href="mailto:<?php the_field('email', 'options');?>"><?php the_field('email', 'options');?></a> 
					</div>
					<div class="item phone d-flex">
						<div class="icon">
							<img src="<?php echo get_field('phone_icon', 'options')['url']?>">
						</div>
						<div class="phone_list">
							<span><?php the_field('tel_num_1', 'options');?></span>
							<span><?php the_field('tel_num_2', 'options');?></span>
						</div>
					</div>
				</div>
				<button class="order_call">Заказать звонок</button>
			</div>
			<div class="yandex_map_wrap">
				<div id="map"></div>
				<?php 				
					$longitude = get_field('longitude', 'options');
					$latitude = get_field('latitude', 'options');
					$zoom = get_field('zoom', 'options');
					$iconhref = get_field('placemark_icon', 'options')['url'];
				?>
				<script type="text/javascript">
					function addMap() {
						if(typeof ymaps !== 'undefined'){
				            ymaps.ready(function () {
	                        var myMap = new ymaps.Map('map', {
	                            center: ['<?php echo $longitude?>', '<?php echo $latitude?>'],
	                            zoom: '<?php echo $zoom?>'
	                        }, {
	                            searchControlProvider: 'yandex#search'
	                        }),
	                        myPlacemark = new ymaps.Placemark(['<?php echo $longitude?>', '<?php echo $latitude?>'], {
	                            hintContent: '',
	                            balloonContent:''
	                        }, {
	                            iconLayout: 'default#image',
	                            iconImageHref: '<?php echo $iconhref?>',
	                            iconImageSize: [37, 54]
	                        });

	                        myMap.geoObjects.add(myPlacemark);

			                myMap.controls
			                .remove('geolocationControl')
			                .remove('typeSelector')
			                .remove('searchControl')
			                .remove('trafficControl')
			                .remove('rulerControl')
			                myMap.behaviors.disable([
			                    'scrollZoom',
			                    'dblClickZoom'
			                    ]);
			                });
				        }
				    }
					$(window).load(addMap);
				</script>
			</div>
		</div>
	</div>
</div>
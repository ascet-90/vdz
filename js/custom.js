function numberWithSpaces(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, " ");
    return parts.join(".");
}
function calculateDomPrice() {
    var sum = 0;
    $('.price:not(.credit)').each(function(ind, el){
        if($(el).find('input[type=radio]').is(':checked') || 
            $(el).find('input[type=checkbox]').is(':checked')) {
            var priceNumber = $(el).find('.sum_price').html().replace(/\s/g, '');
            sum += parseFloat(priceNumber);
        }        
    });
    return sum;
}
function calculateDoskaPrice() {
    var sum = meterPrice = piecePrice = packPrice = squarePrice = 0;
    if($('.price_item.meter').length) {
        meterPrice = parseInt($('.price_item.meter .single_price > span').text().replace(/\s/g, ''));
    }
    if($('.price_item.piece').length) {
        piecePrice = parseInt($('.price_item.piece .single_price > span').text().replace(/\s/g, ''));
    }
    if($('.price_item.pack').length) {
        packPrice = parseInt($('.price_item.pack .single_price > span').text().replace(/\s/g, ''));
    }   
    if($('.price_item.square').length) {
        squarePrice = parseInt($('.price_item.square .single_price > span').text().replace(/\s/g, ''));
    }  
    
    sum = meterPrice + piecePrice + packPrice + squarePrice;
    return sum;
}

$(document).ready(function() {

    $('.sort_dropdown').niceSelect();
	
	var prodCount = parseInt($('.doska .price_wrap .price_item.piece .input_wrap .input_price > span').html());
	var prodPrice = 0;
	if($('.doska .price_wrap .price_item.piece .single_price > span').html()) {
		prodPrice = parseFloat($('.doska .price_wrap .price_item.piece .single_price > span').html().replace(/\s/g, ''));
	}	
	$('.doska .price_wrap .price_item.piece .single_price > span').html(numberWithSpaces(prodCount * prodPrice));
	
    var header_inner_height = $('.header .header_inner').height();

    $('.order_call').click(function(e){
      e.preventDefault();
      $('#modalOrder').addClass('open');
      $('body').css('overflow-y','hidden');
    });

    $('.modal .modal_sandbox, .modal .close').click(function(){
      $('.modal').removeClass('open');
      $('body').css('overflow-y','auto');
    });


    $(".button_top a").click(function (){
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
        return false;
    });

	$('.mob_toggle').click(function(){
        $(this).toggleClass('active');
        if ($('.header').hasClass('open')) {
			$('.header').removeClass('open');
            $('.header .header_inner').slideUp();
			$('body').css('overflow-y', 'auto');
        } else {
			$('.header').addClass('open');
            $('.header .header_inner').slideDown();
			$('body').css('overflow-y', 'hidden');
        }
        return false;
    });

    $('.catalog_single_slider').slick({
        dots: false,
        arrows: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll:1,
        infinite: false,
        asNavFor: '.catalog_single_slider_nav',
        responsive: [
            {
                breakpoint: 541,
                settings: {
                    infinite: true
                }                           
            }
        ]
      });
    $('.catalog_single_slider_nav').slick({
        focusOnSelect: true,
        dots: false,
        arrows: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll:1,
        vertical: true,
        infinite: false,
        centerMode: true,                   
        centerPadding: 0,
        asNavFor: '.catalog_single_slider',
        responsive: [
            {
                breakpoint: 541,
                settings: {
                    vertical: false,
                    infinite: true
                }
            }
        ]
      });

    $('.doska_catalog_single_slider').slick({
        dots: false,
        arrows: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll:1,
        infinite: true,
        asNavFor: '.doska_catalog_single_slider_nav',
        responsive: [
            {
                breakpoint: 541,
                settings: {
                    infinite: true
                }
            }
        ]
      });
    $('.doska_catalog_single_slider_nav').slick({
        focusOnSelect: true,
        dots: false,
        arrows: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll:1,
        infinite: true,
        centerMode: true,                   
        centerPadding: 0,
        asNavFor: '.doska_catalog_single_slider',
        responsive: [
            {
                breakpoint: 541,
                settings: {
                    infinite: true
                }
            }
        ]
      });	

    var final_price = calculateDomPrice();
    $('.final_price > span').html(numberWithSpaces(final_price));

    $('.sum_price').each(function(ind, el){
        var text = $(el).html();
        $(el).html(numberWithSpaces(text));
    });
    $('#price_form #final_price').val(final_price);
    

    $('.price input[type=radio], .price input[type=checkbox]').change(function(){
        final_price = calculateDomPrice();
        $('.final_price > span').html(numberWithSpaces(final_price));
        $('#price_form #final_price').val(final_price);
    });

    $('.sidebar_toggle').click(function(){
        $(this).toggleClass('active');
        $('.sidebar_content').toggle('slow');
    });

    $('.price_sum_wrap .price_sum > span').text(numberWithSpaces(calculateDoskaPrice()));

    $('.price_minus').click(function(){
        var prevValue = parseInt($(this).next().find('span').text());
        if(prevValue != 1) {
            var priceMeter = $(this).closest('.input_wrap').next().data('price');
            $(this).closest('.input_wrap').next().find('span').text(numberWithSpaces(priceMeter * (prevValue - 1)));
            $(this).next().find('span').text(prevValue - 1);
            $('.price_sum_wrap .price_sum > span').text(numberWithSpaces(calculateDoskaPrice()));
        }                
    });
    $('.price_plus').click(function(){
        var prevValue = parseInt($(this).prev().find('span').text());
        var priceMeter = $(this).closest('.input_wrap').next().data('price');
        $(this).closest('.input_wrap').next().find('span').text(numberWithSpaces(priceMeter * (prevValue + 1)));
        $(this).prev().find('span').text(prevValue + 1);
        $('.price_sum_wrap .price_sum > span').text(numberWithSpaces(calculateDoskaPrice()));
    });

    info_products();

    if($('.cart_form .wpcf7')[0]) {
        $('.cart_form .wpcf7')[0].addEventListener( 'wpcf7mailsent', function( event ) {
            $('#thanks').addClass('open');
            $('body').css('overflow-y','hidden');
        }, false );
    }   
});
$(window).load(function(){
	var header_position = $('.header .header_top').innerHeight();
    if($(window).scrollTop() >= header_position && $(window).innerWidth() > 1024) {
        $('.header .header_bottom').addClass('fixed');
        $('.header').addClass('fixed');
    } else {
        $('.header .header_bottom').removeClass('fixed');
        $('.header').removeClass('fixed');
    }    
    $(window).scroll(function(){   
		header_position = $('.header .header_top').innerHeight();
        if($(window).scrollTop() >= header_position && $(window).innerWidth() > 1024) {
            $('.header .header_bottom').addClass('fixed');
            $('.header').addClass('fixed');
        } else {
            $('.header .header_bottom').removeClass('fixed');
            $('.header').removeClass('fixed');
        }
    });
    $(window).resize(function(){
     if($(window).innerWidth() > 1024) {
         if($('.header').hasClass('open')) {
            $('.header').removeClass('open');
            $('.mob_toggle').removeClass('active');
            $('.header .header_inner').hide();
            $('body').css('overflow-y','auto');
         } 
         header_position = $('.header .header_top').innerHeight();       
         if($(window).scrollTop() >= header_position) {
            $('.header .header_bottom').addClass('fixed');
            $('.header').addClass('fixed');
         } else {
            $('.header .header_bottom').removeClass('fixed');
            $('.header').removeClass('fixed');
         }    
     }
    }); 
});

// $(window).resize(function(){
// 	if($(window).innerWidth() > 1024) {
// 		if($('.header').hasClass('open')) {
// 			$('.header').removeClass('open');
// 			$('.mob_toggle').removeClass('active');
// 			$('.header .header_inner').hide();
// 			$('body').css('overflow-y','auto');
// 		} 
// 		var header_position = $('.header .header_top').innerHeight();		
// 		if($(window).scrollTop() >= header_position) {
// 			$('.header .header_bottom').addClass('fixed');
//             $('.header').addClass('fixed');
// 		} else {
// 			$('.header .header_bottom').removeClass('fixed');
//             $('.header').removeClass('fixed');
// 		}    
// 		$(window).scroll(function(){ 			
// 			header_position = $('.header .header_top').innerHeight();
// 			if($(window).scrollTop() >= header_position) {
// 				$('.header .header_bottom').addClass('fixed');
//                 $('.header').addClass('fixed');
// 			} else {
// 				$('.header .header_bottom').removeClass('fixed');
//                 $('.header').removeClass('fixed');
// 			}
// 		});
// 	}
// }); 

$('.order_calculate').click(function(e){
    e.preventDefault();
    $('#modalCalculate').addClass('open');
    $('body').css('overflow-y','hidden');
});
$('.order_credit').click(function(e){
    e.preventDefault();
    $('#modalCredit').addClass('open');
    $('body').css('overflow-y','hidden');
});
$('.modal .form_links > button').click(function(){
    $('#addToCartSuccess').removeClass('open');
    $('body').css('overflow-y','auto');
});

/* Cart */

$('.order_catalog').click(function(e){
    e.preventDefault();
    $('#addToCartSuccess').addClass('open');
    $('body').css('overflow-y','hidden');

    var productId = $(this).data('product-id');
    var productPrice = null;
    if($('.doska .price_sum_wrap .price_sum > span').html()) {
        productPrice = $('.doska .price_sum_wrap .price_sum > span').html().replace(/\s/g, '');
    }
    else {
        productPrice = $('.domkomplect .price_block .final_price_wrap .final_price > span').html().replace(/\s/g, '');
    }
    var productCount = 1;
    if($('.doska .price_wrap .price_item.piece .input_wrap .input_price > span').length) {
        productCount = parseInt($('.doska .price_wrap .price_item.piece .input_wrap .input_price > span').html());
    } else if($('.doska .price_wrap .price_item.pack .input_wrap .input_price > span').length) {
        productCount = parseInt($('.doska .price_wrap .price_item.pack .input_wrap .input_price > span').html());
    }
    var credit = false;

    if($('.domkomplect .price_block .price.credit input[type=checkbox]').length) {
        credit = $('.domkomplect .price_block .price.credit input[type=checkbox]').is(':checked') ? 'credit' : false;
    }

    var data = {
        action: 'action_cart',
        product_id: productId,
        product_price: productPrice,
        product_count: productCount,
        credit: credit
    }

    $.get('/wp-admin/admin-ajax.php', data, function(response) {
        response = JSON.parse(response);
        var price_high = parseInt(productPrice);
        var basket_count = parseInt($('.cart .cart_image span').text());
        var basket_summ = parseInt($('.cart .cart_price span').text().replace(/\s/g, ''));
        var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)product\s*\=\s*([^;]*).*$)|^.*$/, "$1");

        if(response.action == 'add') {
            $('#addToCartSuccess .form .form_title').text('Товар добавлен в корзину');
            $('.order_catalog').text('Удалить');
            basket_count = basket_count+1;
            basket_summ = basket_summ + price_high;
            if(basket_summ<0 || cookieValue==''){
                basket_summ=0;
            }
            $('.cart .cart_price span').text(numberWithSpaces(basket_summ));
            $('#addToCartSuccess .form .form_product_info_sum span').text(numberWithSpaces(basket_summ));
            $('.cart .cart_image span').text(basket_count);            
            $('#addToCartSuccess .form .form_product_info_count span').text(basket_count);
        } else if(response.action == 'remove') {
            $('#addToCartSuccess .form .form_title').text('Товар удален из корзины.')
            basket_count = basket_count-1;
            $('.order_catalog').text('Заказать');
            basket_summ = basket_summ - price_high;

            if(basket_summ<0 || cookieValue==''){
                $('#addToCartSuccess .form .form_title').text('Ваша корзина пуста.');
                basket_summ=0;
            }
            $('.cart .cart_price span').text(numberWithSpaces(basket_summ));
            $('#addToCartSuccess .form .form_product_info_sum span').text(numberWithSpaces(basket_summ));
            $('.cart .cart_image span').text(basket_count);            
            $('#addToCartSuccess .form .form_product_info_count span').text(basket_count);
        }

    });
    
});

$('.product_delete').click(function (e) {
    var this_prod_del = $(this);
    var product_id = $(this).parent('.delete').data('product-id');
    var price_prod = $(this).parent('.delete').prev().find('span').last().text().replace(/\s/g, '');
    var product_count = $(this).parent('.delete').closest('.cart_product_info').find('.count').find('span').last().text();
    var credit = $(this).parent('.delete').data('credit');

    var data = {
        action: 'action_cart_del',
        product_id: product_id,
        product_price: price_prod,
        product_count: product_count,
        credit: credit
    };

    $.get('/wp-admin/admin-ajax.php', data, function(response) {
        var data = JSON.parse(response);
    }).done(function () {
        this_prod_del.closest('.cart_products_item').remove();
        var prod_sum = 0;
        $('.cart_products_list .cart_products_item').each(function(ind, el){
            prod_sum += parseFloat($(el).find('.price > span:last-child').text().replace(/\s/g, ''));

        });
        $('.cart .cart_price > span').text(numberWithSpaces(prod_sum));
        $('.cart .cart_image span').text($('.cart_products_list .cart_products_item').length);
        if($('.cart_products_list .cart_products_item').length == 0) {
            $('.cart_products_list').remove();
			$('.cart_form').remove();
            $('.cart_wrap').append($('<p class="cart_empty">Ваша корзина пуста</p>'));
        }
        info_products();
    });

    return false;
});

/*Info prod to form*/
function info_products() {
    var total_info = [];
    $('.cart_products_list .cart_products_item').each(function (index, value) {
        var product_name = 'Название товара: ' + $(this).find(".prod_title").text();
        var credit = '';
        if($(this).find('.delete').data('credit') == 'credit') {
            credit = 'Заказан в кредит';
        }
        var product_count = 'Количество товара: ' + $(this).find(".prod_count").text();
        var price = parseFloat($(this).find(".prod_price").text().replace(/\s/g, ''));
        var product_price = 'Цена товара: ' + price; 
        total_info.push('\r\n' + product_name + '\r\n' + product_count + '\r\n' + product_price + '\r\n' + credit +'\r\n' + '---------');
    });
    var total_price = 0;
    $('.cart_products_list .cart_products_item').each(function (ind, el) {
        total_price += parseFloat($(el).find('.prod_price').text().replace(/\s/g, ''));
    })
    var product_all_price = 'Сумма: ' + total_price;        
    var products_total = 'Товаров в заказе: ' + $('.cart_products_list .cart_products_item').length;
    total_info.push('\r\n' + product_all_price + '\r\n' + products_total + '\r\n');
    $('.cart_form input[name=products_info]').val(total_info);
}

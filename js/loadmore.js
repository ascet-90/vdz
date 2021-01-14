
	$('#showMore').click(function(){
		$(this).text('Загружаю...'); // изменяем текст кнопки, вы также можете добавить прелоадер
		var data = {
			'action': action,
			'query': true_posts,
			'page' : current_page
		};
		$.ajax({
			url:ajaxurl, // обработчик
			data:data, // данные
			type:'POST', // тип запроса
			success:function(data){
				if( data ) { 
					$('#showMore').text('Загрузить ещё'); // вставляем новые посты
					$('#postContainer').append(data);
					current_page++; // увеличиваем номер страницы на единицу
					if (current_page == max_pages) $("#showMore").parent().remove(); // если последняя страница, удаляем кнопку
				} else {
					$('#showMore').parent().remove(); // если мы дошли до последней страницы постов, скроем кнопку
				}
			}
		});
	});

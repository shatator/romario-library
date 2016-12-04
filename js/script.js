$(function(){
	var $table_string = $(".content table"),						//строки таблицы
		$form_update = $(".form-update"),							//блок формы правки и удаления
		$button_exit_form = $(".form-update img[alt='Exit']"),		//кнопка выхода на форме
		$form_insert = $("form[name='form_insert']"),				//форма добавления
		$form_ins_table = $("form[name='form_insert'] table"),		//таблица формы добавления
		max_col_authors = 4;										//максимальное количество автором для одной книги

	$table_string.on('click', 'tr:not(:first)',function(){						//при нажатии на строку таблицы
		$form_update.css("display", "block");									//показать форму
		$("input[name='number']")[0].value = this.cells[0].textContent;			//значения строки присваиваются текстовым полям на форме
		$("input[name='book-title']")[0].value = this.cells[1].textContent;
		


		
		/*while (author_count <= this.cells[2].childElementCount){
			$("input[name='book-author']")[0].value = this.cells[2].childNodes[0].data;
		}*/
	});

	$button_exit_form.on('click', function(){						//при нажатии кнопки выхода на форме праавки
		$(this).parent().css("display", "none");					//скрыть форму
	});

	var author_plus_count=1;
	$('input[name=author_plus]').on('click', function(){
		author_plus_count++;
		$("<tr><td>Соавтор</td><td><input type='text' name='ins_author[]'></td></tr>").insertAfter($("form[name='form_insert'] tr:first"));
		if (author_plus_count >= max_col_authors){
			$("input[name='author_plus']").css('display', 'none');
		}
	});
});
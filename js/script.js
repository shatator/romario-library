$(function(){
	var $table_string = $(".content table"),						//строки таблицы
		$form_update = $(".form-update "),							//блок формы правки и удаления
		$button_exit_form = $(".form-update img[alt='Exit']"),		//кнопка выхода на форме
		$form_insert = $(".menu form[name='form_insert']");			//форма добавления

	$table_string.on('click', 'tr:not(:first-child)',function(){				//при нажатии на строку таблицы
		$form_update.css("display", "block");									//показать форму
		$("input[name='number']")[0].value = this.cells[0].textContent;			//значения строки присваиваются текстовым полям на форме
		$("input[name='book-author']")[0].value = this.cells[1].textContent;
		$("input[name='book-title']")[0].value = this.cells[2].textContent;
	});

	$form_insert.on('submit', function(){							//при submit формы добавления
		if ($("input[name='ins_author']")[0].value != ""){
			if ($("input[name='ins_book']")[0].value != ""){
				return true;
			}
			else{
				return false;										//простая проверка заполнения форы добавления
			}
		}
		else{
			return false;
		}
	});

	$button_exit_form.on('click', function(){						//при нажатии кнопки выхода на форме праавки
		$(this).parent().css("display", "none");					//скрыть форму
	});

});
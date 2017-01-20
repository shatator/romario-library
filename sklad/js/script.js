$(function(){
	var $content = $(".content"),
		$form_insert = $(".menu form[name='form_insert']"),
		$inputs__form_insert = $form_insert.find("input[type='text']"),
		$button_clear = $form_insert.find("input[name='clear']");
	
	function reloadContent(){
		$.ajax({
			url: "content.php",
			cache: false,
			success: function(html){
				$content.html(html);
				$(".content table").tablesorter({debug: true});
			}  
        });
    };
    reloadContent();

    function inputClear(){
    	$inputs__form_insert.val('');
    };

	$form_insert.submit(
		function(e){
			var $form = $(this);
			if (($form.find("input[name='manufacturer']").val() != "") &&
				($form.find("input[name='name']").val() != "") &&
				($form.find("input[name='price']").val() != "") &&
				($form.find("input[name='col']").val() != "")){
				
					$.ajax({
						type: $form.attr('method'),
						url: $form.attr('action'),
						data: $form.serialize(),
					}).done(function(){
						reloadContent();
						inputClear();
						console.log('success');
					}).fail(function() {
						console.log('fail');
					});
			}
			e.preventDefault();															//отмена действия по умолчанию для кнопки submit
		}
	);

	$content.on('click', 'tr:not(:first):not(:last)',function(){						//при нажатии на строку таблицы
		if (confirm("Вы действительно хотите удалить данную запись?\r\n\r\n"+
			this.cells[0].textContent+" | "+this.cells[1].textContent+" | "+
			this.cells[2].textContent+" | "+this.cells[3].textContent+" | "+
			this.cells[4].textContent)){
			$.ajax({
				type: 'POST',
				url: 'delete_data.php',
				data: {"id": this.cells[0].textContent}
			}).done(function(){
				reloadContent();
				console.log('success');
			}).fail(function() {
				console.log('fail');
			});
		}
	});

	$button_clear.on('click', function(){									//при нажатии кнопу "Очистить"
		inputClear();
	});

});
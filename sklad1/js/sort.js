$(function(){
	var $content = $(".content");

	$content.on('click', 'th', function(){
		var table = this.offsetParent,
			tbody = table.tBodies[0],
			rowsArray = [].slice.call(tbody.rows),
			colNum = this.cellIndex,
			colType = this.getAttribute('data-type');

		switch (colType){
			case 'number':
				rowsArray.sort(function(a, b) {
					return a.cells[colNum].innerText - b.cells[colNum].innerText;
				});
				break;
			case 'string':
				rowsArray.sort(function(a, b){
					return a.cells[colNum].innerText > b.cells[colNum].innerText ? 1 : -1;
				});
				break;
		};

		table.removeChild(tbody);

		for (var j = 0; j < rowsArray.length; j++) {
			tbody.appendChild(rowsArray[j]);
		}

		table.appendChild(tbody);
	});

});

<?php
	echo "<table>
			<thead>
				<tr>
					<th>Номер</th>
					<th>Производитель</th>
					<th>Наименование</th>
					<th>Цена</th>
					<th>Кол-во</th>
				</tr>
			</thead>
			<tbody>";
	$base=file("base.txt");
	$sum_price = 0;
	$sum_col = 0;
	foreach($base as $line)
	{
		$parts=explode('|',$line);
		$sum_price = $sum_price + $parts[3];
		$sum_col = $sum_col + $parts[4];
		echo "<tr title='".$line."'>
				<td align='center'>".$parts[0]."</td>
				<td>".$parts[1]."</td>
				<td>".$parts[2]."</td>
				<td>".$parts[3]."</td>
				<td>".$parts[4]."</td>
			</tr>";
	}
			
	echo "	<tfoot>
				<tr>
					<td colspan=3>Итого:</td>
					<td>".$sum_price."</td>
					<td>".$sum_col."</td>
				</tr>
			</tfoot>
		</tbody>
		</table>";
?>
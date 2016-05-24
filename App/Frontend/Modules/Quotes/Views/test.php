<table border='1'>
	<tr>
		<th>ID QUOTES</th><th>QUOTES</th>
	</tr>
	<?php
		foreach($listQuotes as $aQuote)
		{	echo'<tr>';
			echo'<td>'.$aQuote->author().'</td>'.'<td>'.$aQuote->id().'</td>'.'<td>'.$aQuote->quote().'</td>';
			echo'<tr>';
		}
	?>
</tr>
</table>
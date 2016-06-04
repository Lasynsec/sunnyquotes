<table border='1'>
	<tr>
		<th>AUTHORS</th><th>ID QUOTES</th><th>QUOTES</th>
	</tr>
	<?php
		foreach($quotes as $aQuote)
		{	echo'<tr>';
			echo'<td>'.$author->firstname().'</td>'.'<td>'.$aQuote->id().'</td>'.'<td>'.$aQuote->quote().'</td>';
			echo'<tr>';
		}
	?>
</tr>
</table>
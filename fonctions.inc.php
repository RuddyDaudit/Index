<?php

//equivalent  explode(separateur, texte)
function fractionner($separateurs, $texte)
{
	
	$tok =  strtok($texte, $separateurs);
	if (strlen ($tok) > 2) $tab_tok[] = $tok;
	while ($tok !== false) 
	{
		$tok = strtok($separateurs);
		if (strlen ($tok) > 2) $tab_tok[] = $tok;		
	}
	return $tab_tok;
}

function print_tab ($tab)
{
		foreach ($tab as $indice => $valeur) echo $indice, " = ", $valeur, "<br>";
}

?>
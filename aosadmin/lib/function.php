<?php
function sanitize($variable){
	$variable = str_replace("",";",$variable);
	if(!get_magic_quotes_gpc()){
		$variable = addslashes($variable);
	}
	return $variable;
}

?>
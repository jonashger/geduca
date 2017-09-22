<?php 
$mod = isset( $_GET[ 'mod' ] ) ? $_GET[ 'mod' ] : null ;
	
	switch($mod){

		case 'escolas':
			include "escolas.php";
		break;
			
		case 'privacity':
			include "mod/privacity.html";
		break;

		default:
			include "mod/home.php";
		break;
		
	}
	

?>
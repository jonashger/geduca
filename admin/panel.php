<?php
$side = isset( $_GET[ 'side' ] ) ? $_GET[ 'side' ] : null ;

	switch($side){


		case 'privacity':
			include "mod/privacity.html";
		break;

		default:
			include "home.php";
		break;

	}


?>

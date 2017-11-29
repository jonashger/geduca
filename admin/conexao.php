<?php

  $servidor ='127.0.0.1';
	$usuario = 'postgres';
	$senha = '123';
	$dbname	= 'geduca';

  $db = new PDO(
    "pgsql:dbname=$dbname host=$servidor port=5432", $usuario, $senha, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      ]
  );
?>

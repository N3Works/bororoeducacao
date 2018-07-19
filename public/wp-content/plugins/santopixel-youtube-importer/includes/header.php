<?php
	// -----
	// Aumenta o tempo limite de execução do script
	// Define UTF-8 como encoding na leitura dos dados do DB
	// Define o timezone de São Paulo
	// Aumenta a memória para rodar o script: 512MB
	// Omite os erros de parser do XML
	// Define o header content-type da resposta HTTP: HTML e UTF-8
	// -----

	set_time_limit( ( 60 * 60 * 6 ) ); // 6 hours
	mb_internal_encoding( 'UTF-8' );
	date_default_timezone_set( 'America/Sao_Paulo' );
	ini_set( 'memory_limit', '512M' );
	libxml_use_internal_errors( TRUE );
	header( 'Content-Type: text/html; charset=utf-8' );
?>
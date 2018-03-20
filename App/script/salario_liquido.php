<?php
	define('DIR', $_SERVER['DOCUMENT_ROOT']);
	require_once DIR . "/vendor/autoload.php";
	echo json_encode(App\classes\Calculadora::salario_liquido($_POST['salario_bruto'], $_POST['dependentes'], $_POST['descontos']));


<?php
	define('DIR', $_SERVER['DOCUMENT_ROOT']);
	require_once DIR . "/vendor/autoload.php";
	echo json_encode(App\classes\Calculadora::irrf($_POST['salario_bruto'], $_POST['dependentes']));

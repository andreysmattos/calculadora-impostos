<?php

namespace App;

class Route
{
	
	//Atributos
	private $route;


	//Metodos
	public function __construct(){
		$this->initRoutes();
		$this->run($this->getUrl());
	}

	//isso aki precisa ser configurado conforme a estrutura de pastas do servidor
	public function initRoutes(){
		$routes['home'] = array('route'=>'/', 'arq'=>'home.php');
		$routes['trabalhista'] = array('route'=>'/trabalhista', 'arq'=>'trabalhista.php');
		$routes['fgts'] = array('route'=>'/trabalhista/fgts', 'arq'=>'trabalhista/fgts.php');
		$routes['irrf'] = array('route'=>'/trabalhista/irrf', 'arq'=>'trabalhista/irrf.html');
		$routes['inss'] = array('route'=>'/trabalhista/inss', 'arq'=>'trabalhista/inss.html');
		$routes['salario_liquido'] = array('route'=>'/trabalhista/salario_liquido', 'arq'=>'trabalhista/salario_liquido.html');
		$this->setRoutes($routes);
	}

	public function setRoutes(array $route){
		$this->route = $route;
	}


	public function run($url){
		array_walk($this->route, function ($route) use ($url){
			if($url == $route['route']){
				include 'App/html/' . $route['arq'];
			}

		});
	}


	public function getUrl(){
		//echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	}
}


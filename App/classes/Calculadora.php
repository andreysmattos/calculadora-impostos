<?php

namespace App\classes;

//LEMBRAR DE VALIDAR OS DADOS DESSA CLASSE

class Calculadora
{
	public static function fgts($salario, $meses)
	{	
		$antigo = ['.', ','];
		$novo = ['', '.'];
		$salario = (float) str_replace($antigo, $novo, $salario);
		$parcela = ($salario * 0.08);
		$total = $parcela * $meses;
		return ['status'=>true,'parcela'=>$parcela, 'total'=>$total, 'meses'=>$meses, 'salario'=>$salario];
	}

	public static function inss($salario)
	{
		$antigo = ['.', ','];
		$novo = ['', '.'];
		$salario = (float) str_replace($antigo, $novo, $salario);

		if($salario <= 1693.72){
			$per = 8;
			$per .= '%';
			$retorno = ($salario * 0.08);
		} elseif($salario <= 2822.90) {
			$per = 9;
			$per .= '%';
			$retorno = ($salario * 0.09);
		} elseif($salario <= 5645.80) {
			$per = 11;
			$per .= '%';
			$retorno = ($salario * 0.11);
		} elseif($salario > 5645.80) {
			$per = 'TETO';
			$retorno = (5645.80 * 0.11);
		// VALOR DE 2017 USADO NO SITE QUE O CLIENTE PASSOU 5531.31
		// VALOR ATUAL USADO EM 2018 QUE ENCONTREI NA INTERNET 5645.80
		} 
		//CUIDADO COM ESSE METODO POIS ELE É USADO NO METODO IRRF
		return ['status'=>true,'porcentagem'=>$per, 'inss'=>$retorno];
	}

	public static function irrf($salario, $dependentes)
	{
		$antigo = ['.', ','];
		$novo = ['', '.'];
		$salario = (float) str_replace($antigo, $novo, $salario);
		$inss = Calculadora::inss($salario)['inss'];
		$desc_dependentes = 189.59;
		$valor_dependentes = $desc_dependentes * $dependentes;

		$salario_base = $salario - $inss - $valor_dependentes;
		// 2018
		if($salario_base < 1903.99){
			return ['status'=>true, 'porcentagem'=>0, 'valor'=>0];
		} elseif($salario_base <= 2826.65){
			$per = 7.5;
			$per .= '%';
			$total = ($salario_base * 0.075) - 142.80;
			return ['status'=>true, 'porcentagem'=>$per, 'valor'=>$total];
		} elseif($salario_base <= 3751.05){
			$per = 15;
			$per .= '%';
			$total = ($salario_base * 0.15) - 354.80;
			return ['status'=>true, 'porcentagem'=>$per, 'valor'=>$total];
		} elseif($salario_base <= 4664.68){
			$per = 22.5;
			$per .= '%';
			$total = ($salario_base * 0.225) - 636.13;
			return ['status'=>true, 'porcentagem'=>$per, 'valor'=>$total];
		} elseif($salario_base > 4664.68){
			$per = 27.5;
			$per .= '%';
			$total = ($salario_base * 0.275) - 869.36;
			return ['status'=>true, 'porcentagem'=>$per, 'valor'=>$total];
		}
		// BOM USEI DADOS DA RECEITA, TESTEI NO SITE DA RECEITA E OS VALORES BATEM MAS SÃO DIFERENTES DOS DADOS DO SITE CLIENTE
		

		/*
		if($salario_base < 1868.23){
			return ['status'=>true, 'porcentagem'=>0, 'valor'=>0];
		} elseif($salario_base <= 2799.86){
			$per = 7.5;
			$total = ($salario_base * 0.075) - 140.12;
			return ['status'=>true, 'porcentagem'=>$per, 'valor'=>$total];
		} elseif($salario_base <= 3733.19){
			$per = 15;
			$total = ($salario_base * 0.15) - 350.11;
			return ['status'=>true, 'porcentagem'=>$per, 'valor'=>$total];
		} elseif($salario_base <= 4664.68){
			$per = 22.5;
			$total = ($salario_base * 0.225) - 630.10;
			return ['status'=>true, 'porcentagem'=>$per, 'valor'=>$total];
		} elseif($salario_base > 4664.68){
			$per = 27.5;
			$total = ($salario_base * 0.275) - 863.33;
			return ['status'=>true, 'porcentagem'=>$per, 'valor'=>$total];
		}
		*/
		

	}


	public static function salario_liquido($salario, $dependentes, $descontos)
	{
		$antigo = ['.', ','];
		$novo = ['', '.'];
		$salario = (float) str_replace($antigo, $novo, $salario);
		$descontos = (float) str_replace($antigo, $novo, $descontos);
		$inss = Calculadora::inss($salario);
		$desc_dependentes = 189.59;
		$valor_dependentes = $desc_dependentes * $dependentes;
		$irrf = Calculadora::irrf($salario, $dependentes);
		$salario_liquido = $salario - $inss['inss'] - $irrf['valor'] - $descontos;
		

		return ['status'=>true, 'salario_liquido'=>$salario_liquido, 'per_inss'=>$inss['porcentagem'], 'per_irrf'=>$irrf['porcentagem'], 'descontos'=>$descontos, 'salario_normal'=>$salario, 'valor_irrf'=>$irrf['valor'], 'valor_inss'=>$inss['inss']];

	}


}
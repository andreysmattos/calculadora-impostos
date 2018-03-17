<?php

namespace App\classes;

class Calculadora
{
	public static function fgts($salario, $meses)
	{	
		$antigo = ['.', ','];
		$novo = ['', '.'];
		$salario = (float) str_replace($antigo, $novo, $salario);
		$parcela = ($salario * 0.08);
		$total = number_format(($parcela * $meses), 2);
		$parcela = number_format($parcela, 2);
		return ['status'=>true,'parcela'=>$parcela, 'total'=>$total, 'meses'=>$meses, 'salario'=>$salario];
	}


}
$(function(){

	$('.dinheiro').mask('000.000.000.000.000,00', {reverse: true});
	$('.mes').mask('000000', {reverse: true});



	//FGTS
	$('#fgts').submit(function(){

		var form = $(this).serialize();

		var ajax = $.ajax({
			method: "post",
			url: '/App/script/fgts.php',
			data:form,
			dataType: 'json'
		});

		ajax.done(function(e){
			//console.log(e);
			var table = '<table id="table-entrada">';
			table += '<thead><tr><th colspan="2">Dados de entrada</th></tr>	</thead>';
			table += '<tbody><tr><td class="desc">Salário Bruto</td><td>R$: '; 
			table += e.salario + ' </td></tr><tr><td class="desc">Número de meses</td><td>'
			table += e.meses + '</td></tr></tbody> </table>';


			table += '<table class="table table-bordered table-resultado " style=""><colgroup><col style="width:210px;"><col style="width:110px;"><col style="width:200px;"></colgroup>';
			table += '<thead><tr><th>Evento</th><th>Ref.</th><th>Valor</th></tr></thead>';
			table += '<tbody><tr><td>FGTS</td><td class="text-center">8,00%</td><td class="text-right">R$'
			table += e.parcela + '</td></tr>';
			table += '<tr class="resultado"><td>FGTS Total</td><td class="text-center">';
			table += e.meses + '</td><td class="text-right">R$'
			table += e.total + '</td></tr></tbody></table>';

			$('#rfgts').html(table);

		})


		return false;
	});

})
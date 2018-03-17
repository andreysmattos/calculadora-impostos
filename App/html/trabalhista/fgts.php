<h1>Cálculo Saldo FGTS</h1>
<h6>Cálculo de uma estimativa de saldo referente aos depósitos mensais em uma conta de FGTS sem considerar correções mensais.</h6>

<div class="row">
	<div class="col-md-8 form">




		<form method="post" id="fgts">
			<div class="input-group">
				<label class="col-sm-4" for="salario_bruto">Salário Bruto</label>
				<div class="input-group-prepend">
					<span class="input-group-text">R$</span>					
				</div>
				<input type="text" class="form-control col-sm-4 input_direita dinheiro" name="salario_bruto" id="salario_bruto" placeholder="0,00">
			</div>

			<br/>
			<div class="input-group">
				<label class="col-sm-4" for="meses">Número de meses</label>
				<div class="input-group-prepend">
					<span class="input-group-text">00</span>			
				</div>
				<input type="text" class="form-control col-sm-4 input_direita mes" name="meses" id="meses" placeholder="0">
			</div>


			
			<br/>
			<button type="submit" class="btn btn-success calc">Calcular</button>
		</form>

		<br/>

		<div id="rfgts"> 

			<!-- Inicio ajax -->
			<!-- 
			<table id="table-entrada">
				<thead>
					<tr>
						<th colspan="2">Dados de entrada</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td class="desc">Salário Bruto</td>
						<td>R$: 1.500</td>
					</tr>

					<tr>
						<td class="desc">Número de meses</td>
						<td>13</td>
					</tr>
				</tbody>
			</table>

			
			


			<table class="table table-bordered table-resultado " style="">
            <colgroup>
                <col style="width:210px;">
                <col style="width:110px;">
                <col style="width:200px;">
              </colgroup>  
            <thead>
            <tr>
                <th>Evento</th>
                <th>Ref.</th>
                <th>Valor</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>FGTS</td>
                <td class="text-center">8,00%</td>
                <td class="text-right">R$120,00</td>
            </tr>
            <tr class="resultado">
                <td>FGTS Total</td>
                <td class="text-center">13</td>
                <td class="text-right">R$1.560,00</td>
            </tr>
            </tbody>
        </table>
        -->
        <!-- FIM AJAX -->


		</div>


	</div>
	<br/>
</div>
<div class="col-md-4"> </div>
</div>
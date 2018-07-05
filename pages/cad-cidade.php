<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php include_once('header.php'); ?>
</head>

<body class="back-cidades">
	<?php include_once('nav-dashboard.php'); ?>

	<div class="register-box">
		<div class="register-box-body">
			<div class="row" style="text-align: center">
				<span class="register-title">
					Cadastro de Cidades
				</span>
			</div>
			<hr class="hr-separator">
			<div class="row" style="text-align: center">
				<p class="register-subtitle">Forneça os dados abaixo</p>
			</div>

			<!-- Formulário de cadastramento de cidades -->
			<form action="grava-cidade.php" method="post" autocomplete="off">

				<!-- nome da cidade -->
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-globe"></span>
					</span>
					<input type="text" class="form-control"
						name="nome_cidade" required placeholder="Nome da Cidade"
						aria-describedby="input-nome_cidade">
				</div>
				<br>

				<!-- Estado -->
				<div class="input-group">
					<span class="input-group-addon" id="input-password">
						<span class="fas fa-building"></span>
					</span>
                    <select name="estado" class="form-control">
						<option value="AC">Acre</option>
						<option value="AL">Alagoas</option>
						<option value="AP">Amapá</option>
						<option value="AM">Amazonas</option>						
						<option value="BA">Bahia</option>
						<option value="CE">Ceará</option>
						<option value="ES">Espirito Santo</option>
						<option value="GO">Goiás</option>
						<option value="MA">Maranhão</option>																														
						<option value="MT">Mato Grosso</option>
						<option value="MS">Mato Grosso do Sul</option>
						<option value="MG">Minas Gerais</option>
						<option value="PA">Pará</option>
						<option value="PB">Paraíba</option>						
						<option value="PR">Paraná</option>
						<option value="PE">Pernambuco</option>
						<option value="PI">Piauí</option>				
						<option value="RJ">Rio de Janeiro</option>						
						<option value="RN">Rio Grande do Norte</option>
						<option value="RS">Rio Grande do Sul</option>
						<option value="RO">Rondônia</option>
						<option value="RR">Roraima</option>						
						<option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>                        
						<option value="SE">Sergipe</option>                        
						<option value="TO">Tocantins</option>						
                    </select>
				</div>
				<br>

				<!-- Botão de envio -->
				<div class="row" style="margin-bottom:10px">
					<div class="col-xs-12">
						<button type="submit"
							class="btn btn-primary btn-block btn-flat">
							Inserir <span class="fas fa-chevron-circle-right"></span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>

<?php
	include_once('footer.php');
	include_once('js.php');
?>
</body>
</html>
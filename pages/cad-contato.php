<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php include_once('header.php'); ?>
</head>

<body class="back-contatos">
	<?php include_once('nav-dashboard.php'); ?>

	<div class="register-box">
		<div class="register-box-body">
			<div class="row" style="text-align: center">
				<span class="register-title">
					Cadastro de Contato
				</span>
			</div>
			<hr class="hr-separator">
			<div class="row" style="text-align: center">
				<p class="register-subtitle">Forneça os dados abaixo</p>
			</div>

			<!-- Formulário de cadastramento de contatos -->
			<form action="grava-contato.php" method="post" autocomplete="off">

				<!-- nome -->
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-user icon"></span>
					</span>
					<input type="text" class="form-control"
						name="nome" required placeholder="Nome"
						aria-describedby="input-nome">
				</div>
				<br>

                <!-- Endereço -->
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-chevron-right"></span>
					</span>
					<input type="text" class="form-control"
						name="endereco" required placeholder="Endereço"
						aria-describedby="input-endereco">
				</div>
				<br>

                <!-- nro_endereço -->
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-chevron-right"></span>
					</span>
					<input type="text" class="form-control"
						name="nro_endereco" required placeholder="Número"
						aria-describedby="input-nro_endereco">
				</div>
				<br>

                 <!-- complemento -->
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-chevron-right"></span>
					</span>
					<input type="text" class="form-control"
						name="complemento" required placeholder="Complemento"
						aria-describedby="input-complemento">
				</div>
				<br>
                
                <!-- bairro -->
                <div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-chevron-right"></span>
					</span>
					<input type="text" class="form-control"
						name="bairro" required placeholder="Bairro"
						aria-describedby="input-bairro">
				</div>
				<br>
                
				<!-- Cidade -->
				<div class="input-group">
                    <?php 
                    // Parametriza a conexão com o banco de dados
                    $host     = "localhost:3306";
                    $user     = "root";
                    $password = "";
                    $database = "agenda";

                    // Faz a conexão com o servidor MySQL
                    $con = mysqli_connect($host, $user, $password);

                    // Verifica se ocorreu erro de conexão
                    if (!$con) {
                        // Se sim, então encerra o programa com uma mensagem de erro
                        die("Erro de conexão com o servidor do BD");
                    }

                    // Determina qual banco de dados que será utilizado
                    $db = mysqli_select_db($con, $database);

                    // Verifica se ocorreu erro na seleção
                    if (!$db) {
                        // Se sim, então encerra o programa com uma mensagem de erro
                        die("Erro ao selecionar o banco de dados.");
                    }

                    // Cria a sentença SQL para buscar as cidades
                    $sql = "select * from tbl_cidades order by nome_cidade";
                    $result = mysqli_query($con, $sql);
           
                    // Cria a sentença SQL para buscar as cidades
                            $sql = "select * from tbl_cidades order by nome_cidade";
                            $result = mysqli_query($con, $sql);

							echo " 
							<div class=\"input-group\">
							<span class=\"input-group-addon\" id=\"input-cidade_id_nome\">
							<span class=\"fas fa-building\"></span>
							</span>
							<select name=\"cidade_id_nome\" class=\"form-control\">
							";while($row = mysqli_fetch_array($result)){
								echo"
                                    <option value=".utf8_encode($row[0]).">".utf8_encode($row[1])."</option>
									";
								}; echo "
								</select>
                            </div>
                                ";

							

                            ?>
				</div>
				<br>

                  <!-- cep -->
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-chevron-right"></span>
					</span>
					<input type="text" class="form-control"
						name="cep" required placeholder="CEP"
						aria-describedby="input-cep">
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
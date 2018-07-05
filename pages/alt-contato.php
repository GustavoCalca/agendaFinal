<?php
	$id = $_GET['id'];

    // Parametriza a conexão com o banco de dados
    $host = "localhost:3306";
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

    $id = $_GET["id"];

    $sql = "select * from tbl_contatos where id=$id";
    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($result);
?>

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
				<span class="register-title-alt">
					Alteração do Cadastro de Contatos
				</span>
			</div>
			<hr class="hr-separator">
			<div class="row" style="text-align: center">
				<p class="register-subtitle-alt">Forneça os dados abaixo</p>
			</div>

			<!-- Formulário de cadastramento de nome -->
			<form action="altera-contato.php" method="post" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
				<!-- nome do contato -->
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-user icon"></span>
					</span>
					<input type="text" class="form-control" value="<?php echo $row[1]; ?>"
						name="nome" required placeholder="Nome"
						aria-describedby="input-nome">
				</div>
				<br>

                <!-- Formulário de cadastramento de endereço -->
			<form action="altera-contato.php" method="post" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
				<!-- nome do endereço -->
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-chevron-right"></span>
					</span>
					<input type="text" class="form-control" value="<?php echo $row[2]; ?>"
						name="endereco" required placeholder="Endereço"
						aria-describedby="input-endereco">
				</div>
				<br>

                <!-- Formulário de cadastramento do número -->
			<form action="altera-contato.php" method="post" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
				<!-- número do endereço -->
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-chevron-right"></span>
					</span>
					<input type="text" class="form-control" value="<?php echo $row[3]; ?>"
						name="nro_endereco" required placeholder="Número"
						aria-describedby="input-nro_endereco">
				</div>
				<br>

                <!-- Formulário de cadastramento do complemento -->
			<form action="altera-contato.php" method="post" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
				<!-- complemento -->
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-chevron-right"></span>
					</span>
					<input type="text" class="form-control" value="<?php echo $row[4]; ?>"
						name="complemento" required placeholder="Complemento"
						aria-describedby="input-complemento">
				</div>
				<br>

                <!-- Formulário de cadastramento do bairro -->
			<form action="altera-contato.php" method="post" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
				<!-- nome do bairro -->
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-chevron-right"></span>
					</span>
					<input type="text" class="form-control" value="<?php echo $row[5]; ?>"
						name="bairro" required placeholder="Bairro"
						aria-describedby="input-bairro">
				</div>
				<br>

                <!-- Formulário de cadastramento de cidade_id -->
			<form action="altera-contato.php" method="post" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
				<!-- nome da cidade -->
				<div class="input-group">
                    <?php 
                    // Cria a sentença SQL para buscar as cidades
                    $sql1 = "select * from tbl_cidades order by nome_cidade";
                    $result1 = mysqli_query($con, $sql1);
           
                    // Cria a sentença SQL para buscar as cidades
                            $sql1 = "select * from tbl_cidades order by nome_cidade";
                            $result1 = mysqli_query($con, $sql1);

							echo " 
							<div class=\"input-group\">
							<span class=\"input-group-addon\" id=\"input-cidade_id\">
							<span class=\"fas fa-building\"></span>
							</span>
							<select name=\"cidade_id\" class=\"form-control\">
							";while($row1 = mysqli_fetch_array($result1)){
								echo "
                                    <option value=".utf8_encode($row1[0]).">".utf8_encode($row1[1])."</option>
									";
								}; echo "
								</select>
                            </div>
                                ";
                            ?>
				</div>
				<br>

                <!-- Formulário de cadastramento de CEP -->
			<form action="altera-contato.php" method="post" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
				<!-- número do cep -->
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-chevron-right"></span>
					</span>
					<input type="text" class="form-control" value="<?php echo $row[7]; ?>"
						name="cep" required placeholder="CEP"
						aria-describedby="input-cep">
				</div>
				<br>

				<!-- Botão de envio -->
				<div class="row" style="margin-bottom:10px">
					<div class="col-xs-12">
						<button type="submit"
							class="btn btn-success btn-block btn-flat">
							Alterar <span class="fas fa-chevron-circle-right"></span>
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
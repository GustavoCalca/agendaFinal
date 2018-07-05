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

    $sql = "select * from tbl_cidades where id=$id";
    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($result);
?>

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
					Alteração do Cadastro de Cidades
				</span>
			</div>
			<hr class="hr-separator">
			<div class="row" style="text-align: center">
				<p class="register-subtitle">Forneça os dados abaixo</p>
			</div>

			<!-- Formulário de cadastramento de cidades -->
			<form action="altera-cidade.php" method="post" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
				<!-- nome da cidade -->
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-globe"></span>
					</span>
					<input type="text" class="form-control" value="<?php echo $row[1]; ?>"
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
				<option value="AC" <?php if($row[2]=='AC') echo 'selected'; ?> >Acre</option>
				<option value="AL" <?php if($row[2]=='AL') echo 'selected'; ?> >Alagoas</option>
				<option value="AP" <?php if($row[2]=='AP') echo 'selected'; ?> >Amapá</option>
				<option value="AM" <?php if($row[2]=='AM') echo 'selected'; ?> >Amazonas</option>						
				<option value="BA" <?php if($row[2]=='BA') echo 'selected'; ?> >Bahia</option>
				<option value="CE" <?php if($row[2]=='CE') echo 'selected'; ?> >Ceará</option>
				<option value="ES" <?php if($row[2]=='ES') echo 'selected'; ?> >Espirito Santo</option>
				<option value="GO" <?php if($row[2]=='GO') echo 'selected'; ?> >Goiás</option>
				<option value="MA" <?php if($row[2]=='MA') echo 'selected'; ?> >Maranhão</option>																														
				<option value="MT" <?php if($row[2]=='MT') echo 'selected'; ?> >Mato Grosso</option>
				<option value="MS" <?php if($row[2]=='MS') echo 'selected'; ?> >Mato Grosso do Sul</option>
				<option value="MG" <?php if($row[2]=='MG') echo 'selected'; ?> >Minas Gerais</option>
				<option value="PA" <?php if($row[2]=='PA') echo 'selected'; ?> >Pará</option>
				<option value="PB" <?php if($row[2]=='PB') echo 'selected'; ?> >Paraíba</option>						
				<option value="PR" <?php if($row[2]=='PR') echo 'selected'; ?> >Paraná</option>
				<option value="PE" <?php if($row[2]=='PE') echo 'selected'; ?> >Pernambuco</option>
				<option value="PI" <?php if($row[2]=='PI') echo 'selected'; ?> >Piauí</option>				
				<option value="RJ" <?php if($row[2]=='RJ') echo 'selected'; ?> >Rio de Janeiro</option>						
				<option value="RN" <?php if($row[2]=='RN') echo 'selected'; ?> >Rio Grande do Norte</option>
				<option value="RS" <?php if($row[2]=='RS') echo 'selected'; ?> >Rio Grande do Sul</option>
				<option value="RO" <?php if($row[2]=='RO') echo 'selected'; ?> >Rondônia</option>
				<option value="RR" <?php if($row[2]=='RR') echo 'selected'; ?> >Roraima</option>						
				<option value="SC" <?php if($row[2]=='SC') echo 'selected'; ?> >Santa Catarina</option>
				<option value="SP" <?php if($row[2]=='SP') echo 'selected'; ?> >São Paulo</option>                        
				<option value="SE" <?php if($row[2]=='SE') echo 'selected'; ?> >Sergipe</option>                        
				<option value="TO" <?php if($row[2]=='TO') echo 'selected'; ?> >Tocantins</option>	
			</select>
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
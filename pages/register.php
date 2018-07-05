<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php include_once('header.php'); ?>
</head>

<body class="back-register">
	<?php include_once('nav.php'); ?>

	<div class="register-box">
		<div class="register-box-body">
			<div class="row" style="text-align: center">
				<span class="register-title">
					Sistema de Agenda
				</span>
			</div>
			<hr class="hr-separator">
			<div class="row" style="text-align: center">
				<p class="register-subtitle">Forneça os dados solicitados</p>
			</div>

			<!-- Formulário que solicita os dados do usuário -->
			<form action="insert_user.php" method="post" autocomplete="off">

				<!-- nome do usuário -->
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-user"></span>
					</span>
					<input autocomplete="off" type="text" class="form-control"
						name="user" required placeholder="Nome do Usuário"
						aria-describedby="input-user">
				</div>
				<br>

				<!-- e-mail do usuário -->
				<div class="input-group">
					<span class="input-group-addon" id="input-email">
						<span class="fas fa-at"></span>
					</span>
					<input autocomplete="off" type="text" class="form-control"
						name="email" required placeholder="E-mail do Usuário"
						aria-describedby="input-email">
				</div>
				<br>

				<!-- senha do usuário -->
				<div class="input-group">
					<span class="input-group-addon" id="input-password">
						<span class="fas fa-asterisk"></span>
					</span>
					<input autocomplete="off" type="password" class="form-control"
						name="password" required placeholder="Senha"
						aria-describedby="input-password">
				</div>
				<br>

				<!-- Botão de envio -->
				<div class="row" style="margin-bottom:10px">
					<div class="col-xs-12">
						<button type="submit"
							class="btn btn-primary btn-block btn-flat">
							<span class="fas fa-lock"> Enviar</span>
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
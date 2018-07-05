<?php

// Iniciando um sessão
session_start();

// Recebe os dados do formulário
$email = $_POST["email"];
$senha = $_POST["password"];

// Verifica se os dados estão corretos
$email = trim($email);
$senha = trim($senha);

$erros = "";
if (empty($email)) {
    $erros .= "O e-mail do usuário está vazio.<br>";
}

if (empty($senha)) {
    $erros .= "Senha está vazia.<br>";
}

if (!empty($erros))
{
    echo "
        Foram encontradas inconsistências de dados.<br>
        Veja abaixo os erros identificados:<br>" .  $erros;

    echo "<br><br><a href='http://localhost:8088/agenda/pages/login.php'>Clique aqui para voltar</a>";
}

// Parametriza a conexão com o banco de dados

$host = "localhost";
$user = "root";
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

// Cria a sentença SQL para consultar o banco de dados
$sql = "select * from tbl_usuarios where email=\"$email\" and senha=\"$senha\" limit 1";

// Enviar a pesquisa para o banco de dados
$result = mysqli_query($con, $sql);

// Verifica quantas linhas foram recuperadas da consulta
$nro_registros = mysqli_num_rows($result);

mysqli_close($con);

if ($nro_registros == 0) {
    echo "
    <script>
        alert('Usuário não encontrado');
    </script>

    <html>
    <head>
        <META http-equiv=\"refresh\" content=\"0;URL=http://localhost:8088/agenda/pages/login.php\">
    </head>
</html>
    ";
} else {
    $_SESSION['user_email'] = $email;

    echo "
    <html>
    <head>
        <META http-equiv=\"refresh\" content=\"0;URL=http://localhost:8088/agenda/pages/dashboard.php\">
    </head>
</html>
    ";
}

?>

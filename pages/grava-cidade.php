
<?php
    include_once("header.php");

// Recebe os dados do formulário
$nome_cidade = $_POST["nome_cidade"];
$estado      = $_POST["estado"];

// Verifica se os dados estão corretos
$nome_cidade = trim($nome_cidade);
$estado = $estado;

$erros = "";
if (empty($nome_cidade)) {
    $erros .= "Campo nome da cidade está vazio. ";
}

if (!empty($erros)) {
    echo "
        <html>
            <head>
                <META http-equiv=\"refresh\" content=\"0;URL=http://localhost:8088/agenda/pages/cad-cidade.php\">
            </head>
            <body onload='alert($erros);'></body>
        </html>
    ";
} 

else {
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

    // Cria a sentença SQL para inserir o usuário
    $sql = "insert into tbl_cidades (nome_cidade, estado) values(\"$nome_cidade\", \"$estado\")";
    // Envia o insert para o banco de dados
    $result = mysqli_query($con, $sql);

    // Fecha a conexão bom o banco de dados
    mysqli_close($con);

    echo "
    <html>
        <head>
            <META http-equiv=\"refresh\" content=\"0;URL=http://localhost:8088/agenda/pages/cad-cidade.php\">
        </head>
    </html>";
}
?>

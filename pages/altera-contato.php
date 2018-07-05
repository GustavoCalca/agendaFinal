<?php
    include_once("header.php");

// Recebe os dados do formulário
$id = $_POST["id"];
$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$nro_endereco = $_POST["nro_endereco"];
$complemento = $_POST["complemento"];
$bairro = $_POST["bairro"];
$cidade_id = $_POST["cidade_id"];
$cep = $_POST["cep"];

// Verifica se os dados estão corretos
$nome = utf8_decode(trim($nome));
$enderco = utf8_decode(trim($endereco));
$nro_endereco = utf8_decode(trim($nro_endereco));
$complemento = utf8_decode(trim($complemento));
$bairro = utf8_decode(trim($bairro));
$cidade_id = utf8_decode($cidade_id);
$cep = utf8_decode(trim($cep));

$erros = "";
if (empty($nome)) {
    $erros .= "Campo nome está vazio. ";
}

$erros = "";
if (empty($endereco)) {
    $erros .= "Campo endereço está vazio. ";
}

$erros = "";
if (empty($nro_endereco)) {
    $erros .= "Campo número do endereço está vazio. ";
}

$erros = "";
if (empty($complemento)) {
    $erros .= "Campo complemento está vazio. ";
}

$erros = "";
if (empty($bairro)) {
    $erros .= "Campo bairro está vazio. ";
}

$erros = "";
if (empty($cep)) {
    $erros .= "Campo CEP está vazio. ";
}

if (!empty($erros)) {
    echo "
        <html>
            <head>
                <META http-equiv=\"refresh\" content=\"0;URL=http://localhost:8088/agenda/pages/lista-contato.php\">
            </head>
            <body onload='alert($erros);'></body>
        </html>
    ";
}

else 

{
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
    $sql = "update tbl_contatos set nome=\"$nome\", endereco=\"$endereco\", nro_endereco=\"$nro_endereco\", 
    complemento=\"$complemento\", bairro=\"$bairro\", cidade_id=\"$cidade_id\", cep=\"$cep\" where id=$id";

    // Envia o insert para o banco de dados
    $result = mysqli_query($con, $sql);

    // Fecha a conexão bom o banco de dados
    mysqli_close($con);

    echo "
    <html>
        <head>
            <META http-equiv=\"refresh\" content=\"0;URL=http://localhost:8088/agenda/pages/lista-contato.php\">
        </head>
    </html>";
}
?>

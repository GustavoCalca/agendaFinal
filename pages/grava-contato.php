
<?php
    include_once("header.php");

// Recebe os dados do formulário
$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$nro_endereco = $_POST["nro_endereco"];
$complemento = $_POST["complemento"];
$bairro = $_POST["bairro"];
$cidade_id = $_POST["cidade_id_nome"];
$cep = $_POST["cep"];

// Verifica se os dados estão corretos
$nome = utf8_decode(trim($nome));
$endereco = utf8_decode(trim($endereco));
$nro_endereco = trim($nro_endereco);
$complemento = utf8_decode(trim($complemento));
$bairro = utf8_decode(trim($bairro));
$cidade_id = $cidade_id;
$cep = trim($cep);

$erros = "";
if (empty($nome)) {
    $erros .= "Campo nome está vazio. ";
}

if (empty($endereco)) {
    $erros .= "Campo endereço está vazio. ";
}

if (empty($nro_endereco)) {
    $erros .= "Campo número do endereço está vazio. ";
}

if (empty($complemento)) {
    $erros .= "Campo complemento está vazio. ";
}

if (empty($bairro)) {
    $erros .= "Campo bairro está vazio. ";
}

if (empty($cep)) {
    $erros .= "Campo CEP está vazio. ";
}

if (!empty($erros)) {
    echo "
        <html>
            <head>
                <META http-equiv=\"refresh\" content=\"0;URL=http://localhost:8088/agenda/pages/cad-contato.php\">
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
    $sql = "insert into tbl_contatos (nome, endereco, nro_endereco, complemento, bairro, cidade_id, cep) 
    values(\"$nome\", \"$endereco\", \"$nro_endereco\", \"$complemento\", \"$bairro\", \"$cidade_id\", \"$cep\")";

    // Envia o insert para o banco de dados
    $result = mysqli_query($con, $sql);

    // Fecha a conexão bom o banco de dados
    mysqli_close($con);

    echo "
    <html>
        <head>
            <META http-equiv=\"refresh\" content=\"0;URL=http://localhost:8088/agenda/pages/cad-contato.php\">
        </head>
    </html>";
}
?>

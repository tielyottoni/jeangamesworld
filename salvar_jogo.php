<?php
// Configuração do banco de dados
$servername = "localhost"; // Insira o nome do servidor MySQL
$username = "seu_usuario"; // Insira o nome de usuário do banco de dados
$password = "sua_senha"; // Insira a senha do banco de dados
$dbname = "jogos_zerados"; // Insira o nome do banco de dados

// Criação da conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se ocorreu algum erro na conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];
    $jogo = $_POST["jogo"];

    // Insere os dados na tabela "jogos"
    $sql = "INSERT INTO jogos (numero, jogo) VALUES ('$numero', '$jogo')";

    if ($conn->query($sql) === true) {
        echo "Jogo salvo com sucesso!";
    } else {
        echo "Erro ao salvar o jogo: " . $conn->error;
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>

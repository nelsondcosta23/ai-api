<?php
// Substitua estas informações pelas suas credenciais
$hostname = "seu_servidor";
$username = "seu_usuario";
$password = "sua_senha";
$database = "seu_banco_de_dados";

// Conectar ao banco de dados
$conn = new mysqli($hostname, $username, $password, $database);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter dados do formulário
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Consulta para verificar as credenciais do usuário
    $query = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    // Verificar se a consulta retornou resultados
    if ($result->num_rows > 0) {
        // Login bem-sucedido
        echo "Login bem-sucedido!";
    } else {
        // Login falhou
        echo "Nome de usuário ou senha incorretos.";
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>

<?php

// Configurações do banco de dados SQL
$host_sql = 'seu_host_sql';
$dbname_sql = 'seu_nome_de_banco_sql';
$username_sql = 'seu_usuario_sql';
$password_sql = 'sua_senha_sql';

// Configurações do banco de dados MongoDB
$host_mongo = 'localhost';
$port_mongo = 27017;
$dbname_mongo = 'seu_nome_de_banco_mongo';

try {
    // Conectar ao banco de dados SQL usando PDO
    $pdo = new PDO("mysql:host=$host_sql;dbname=$dbname_sql", $username_sql, $password_sql);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conectado ao banco de dados SQL\n";

    // Conectar ao banco de dados MongoDB
    $mongoClient = new MongoDB\Driver\Manager("mongodb://$host_mongo:$port_mongo");
    $mongoDB = $mongoClient->selectDatabase($dbname_mongo);

    echo "Conectado ao banco de dados MongoDB\n";
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados SQL: " . $e->getMessage() . "\n";
} catch (MongoDB\Driver\Exception\Exception $e) {
    echo "Erro ao conectar ao banco de dados MongoDB: " . $e->getMessage() . "\n";
}
?>

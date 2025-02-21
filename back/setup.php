<?php
$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$dbname = 'quiz_responses'; 

$conn = new mysqli($host, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Banco de dados '$dbname' criado com sucesso ou já existe.\n";
} else {
    echo "Erro ao criar banco de dados: " . $conn->error . "\n";
    exit;
}

$conn->select_db($dbname);

$tableSql = "
CREATE TABLE IF NOT EXISTS responses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    questOne VARCHAR(255) NOT NULL,
    questTwo VARCHAR(255) NOT NULL,
    questThree VARCHAR(255) NOT NULL,
    correctAnswers INT NOT NULL,
    incorrectAnswers INT NOT NULL,
    noAnswers INT NOT NULL,
    percentageCorrect FLOAT NOT NULL,
    percentageErrors FLOAT NOT NULL,
    percentageNoAnswers FLOAT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($tableSql) === TRUE) {
    echo "Tabela 'responses' criada com sucesso ou já existe.\n";
} else {
    echo "Erro ao criar tabela: " . $conn->error . "\n";
}

$conn->close();
?>

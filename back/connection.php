<?php

class Database {
    private static ?Database $instance = null;
    private mysqli $conn;

    private string $host = 'localhost';
    private string $username = 'root';
    private string $password = '';
    private string $dbname = 'quiz_responses';

    // Construtor privado para evitar múltiplas instâncias
    private function __construct() {
        $this->createDatabase();
        $this->initializeDatabase();
    }

    // Cria o banco de dados antes de tentar se conectar a ele
    private function createDatabase(): void {
        $tempConn = new mysqli($this->host, $this->username, $this->password);

        if ($tempConn->connect_error) {
            die("Erro de conexão: " . $tempConn->connect_error);
        }

        $sql = "CREATE DATABASE IF NOT EXISTS {$this->dbname}";
        if (!$tempConn->query($sql)) {
            die("Erro ao criar banco: " . $tempConn->error);
        }

        $tempConn->close();
    }

    // Inicializa a conexão com o banco
    private function initializeDatabase(): void {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Erro de conexão: " . $this->conn->connect_error);
        }

        $this->createTables();
    }

    // Criar tabelas se não existirem
    private function createTables(): void {
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

        if (!$this->conn->query($tableSql)) {
            die("Erro ao criar tabela: " . $this->conn->error);
        }
    }

    // Retorna a única instância da classe
    public static function getInstance(): Database {
        return self::$instance ??= new Database();
    }

    // Retorna a conexão com o banco
    public function getConnection(): mysqli {
        return $this->conn;
    }

    // Evita clonagem e desserialização
    private function __clone() {}
    public function __wakeup() {
        throw new Exception("Não é possível desserializar um singleton");
    }
}

?>

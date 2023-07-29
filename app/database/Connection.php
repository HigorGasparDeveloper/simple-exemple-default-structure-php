<?php
    namespace app\database;
    use PDO;
    use PDOException;

    class Connection {
        private PDO|null $conn;
        
        public function __construct()
        {
            $this->conn = null;
        }

        public function connect(): PDO|null {
            try {
                $dsn = "mysql:host=" . ";dbname=". DB_NAME . ";charset=utf8mb4";
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];    
                $this->conn = new PDO($dsn, USERNAME, PASSWORD, $options);
                return $this->conn;
            } catch (PDOException $e) {
                http_response_code(500);
                die("Erro de conexão: " . $e->getMessage());
            }
        }

        public function toExecuteCommand(String $sql, array|null $params = null) {
            $prepare = $this->conn->prepare($sql);
            if (empty($params)) {
                $prepare->execute();
                return $prepare;
            }

            $prepare->execute($params);
            return $prepare;
        } 
    
        public function close() {
            $this->conn = null;
        }
    }
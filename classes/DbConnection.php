<?php

class DbConnection {
    private static $dbInstance;
    private $db;

    public static function getDatabaseInstance() {
        if(is_null(DbConnection::$dbInstance)) {
            self::$dbInstance = new DbConnection();
        }

        return self::$dbInstance;
    }

    private function __construct() {
       
        if (file_exists("../public/config/config.php")){
            include("../public/config/config.php");
        }
        
        try {
            global $config;

            $dbHost = $config['host'];
            $dbName = $config['dbname'];
            $dbLogin = $config['user'];
            $dbPassword = $config['password'];

            $this->db = new PDO(
                "mysql:host=$dbHost;dbname=$dbName",
                $dbLogin,
                $dbPassword);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
        } catch (PDOException $e) {
            echo "Database connection failed: " . $e->getMessage();
        }
    }

    public function getDatabaseAccess() {
        return $this->db;
    }
}
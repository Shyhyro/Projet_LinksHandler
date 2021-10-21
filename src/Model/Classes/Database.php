<?php

namespace Bosqu\ProjetLinksHandler\Model\Classes;

    use PDO;
    use PDOException;

class Database {
    private string $host = "localhost";
    private string $dbname = "linkshandler";
    private string $username = "root";
    private string $password = "";

    private static ?PDO $dbInstance = null;

    /**
     * Instance DB
     */
    public function __construct() {
        try {
            self::$dbInstance = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->password);
            self::$dbInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$dbInstance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    /**
     * Get instance Db
     * @return PDO|null
     */
    public static function getInstance(): ?PDO {
        if(is_null(self::$dbInstance)) {
            new self();
        }
        return self::$dbInstance;
    }

    /**
     *
     */
    public function __clone(){}
}
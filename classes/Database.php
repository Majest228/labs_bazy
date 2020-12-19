<?php class Database {
    private static $HOST = "localhost";
    private static $DB_NAME = "shopmoiseenko";
    private static $USER = "root";
    private static $PASSWORD = "root";

    static $db = null;

    public static function getDB() {
        if (Database::$db === null) {
            Database::$db = new PDO("mysql:host=" . Database::$HOST . ";dbname=" . Database::$DB_NAME, Database::$USER, Database::$PASSWORD);
        }

        return Database::$db;
    }
}
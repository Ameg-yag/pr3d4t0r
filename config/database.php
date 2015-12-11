<?php
        class Database {
        // Dados do BD
            private static $db = 'pr3d4d0r' ;
            private static $host = 'localhost' ;
            private static $user = 'root';
            private static $password = '';

            // Instancia Singleton
            private static $con  = null;

            public function __construct() {
                die('Criação não permitida');
        }
        public static function connect() {

                if (self::$con == null) {

                        try {
                                self::$con = new mysqli(self::$host,self::$user,self::$password,self::$db);
                        } catch (Exception $e) {
                                die($e->getMessage());
                        }

                }

                return self::$con;
        }
        public static function disconnect() {
                self::$con = null;
        }

        }

?>


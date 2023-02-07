<?php
/**
 * Description of Conexion
 */
class Conexion {
        	// Implementación de Singleton
    private static $instancia = null;
    public function __construct()
    {
        try {
            self::$instancia = new PDO('mysql:host=localhost;dbname=micavuna_bd','root', '');
            self::$instancia->exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }           
    }
    public static function singleton()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
}
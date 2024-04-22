<?php


define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "tallerautomotriz");


Class DatabasePDO {

    private $host      = DB_HOST;
    private $user      = DB_USER;
    private $pass      = DB_PASS;
    private $dbname    = DB_NAME;
    private $base_de_datos;


    public function conn(){
        try{
            $this->base_de_datos = new PDO('mysql:host=localhost;dbname=' . $this->dbname, $this->user, $this->pass);
            if ($this->base_de_datos) {
                return $this->base_de_datos;
            }
            // Si se lanza una excepción en el bloque try, el código siguiente a la declaración no se ejecutará, y PHP buscará un primer bloque catch.
        }catch(Exception $e){
            return "Ocurrió algo con la base de datos: " . $e->getMessage();
        }
    }
}

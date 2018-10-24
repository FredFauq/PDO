<?php

class database {

    protected $pdo;

    public function __construct() {
        try {
            $this->pdo = NEW PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'root', 'Tomadam');
        }
//autrement un message d'erreur est affiché
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function __destruct() {
        $this->pdo = NULL;
    }

}
?>


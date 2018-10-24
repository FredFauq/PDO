<?php
class database {
    protected  $connexion;
    public function __construct() {
        //On test les erreurs avec le try/catch 
//Si tout est bon, on est connecté à la base de donnée
        try {
            $this->connexion = NEW PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'Fred', '200469');
        }
//Autrement, un message d'erreur est affiché
        catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function __destruct() {
        $this->connexion = NULL;
    }
  }
  
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php

namespace App;

class User {

    public $id;
    public $nnom;
    public $email;
    public $tel;

} 

class Auth {

    private $db;

    public function __construct(\PDO $dbo) {
        $this->db = $dbo;
    }

    public function user(): ?User {
       
    }
    public function login(string $username, string $password): ?User {
    }

}



?>
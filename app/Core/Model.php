<?php

class Model
{
    protected PDO $db;

    public function __construct()
    {
        global $pdo;
        $this->db = $pdo;
    }
}

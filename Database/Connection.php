<?php

class Connection 
{
    public static function make()
    {
        try {
            return new PDO('mysql:host=127.0.0.1;dbname=NEU_IS', 'root', '');
            } catch (PDOException $e) {
                die('Could not connect.');
            }
    }
}

Connection::make();

<?php

const DATABASE_HOST = 'localhost';
const DATABASE_NAME = 'test_db';
const DATABASE_USER = 'root';
const DATABASE_PASSWORD = '';
const DATA_SOURCE_NAME = "mysql:host=" . DATABASE_HOST . ";dbname=" . DATABASE_NAME;


function getPdo(): PDO
{
    try {
        $connection = new PDO(DATA_SOURCE_NAME, DATABASE_USER, DATABASE_PASSWORD);
    } catch (PDOException $e) {
        throw new Exception("Cannot connect to database", 500);
    }
    
    return $connection;
}

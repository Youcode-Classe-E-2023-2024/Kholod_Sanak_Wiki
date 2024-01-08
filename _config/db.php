<?php
/* db info */
const DB_HOST = 'localhost';
const DB_NAME = 'wiki';
const DB_USER = 'root';
const DB_PASS = '';


try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
    $db = new PDO($dsn, DB_USER, DB_PASS);

//    // Set PDO to throw exceptions on error
//    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//    // Set the default fetch mode to associative array
//    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Handle connection errors
    echo "Connection failed: " . $e->getMessage();
    die();
}

//if($db){
//    echo "connected";
//}
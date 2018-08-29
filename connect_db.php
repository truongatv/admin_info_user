<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = 'php_training';
    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if($conn->select_db($dbname) === false){
        $sql  = "CREATE DATABASE IF NOT EXISTS php_training";
        
        if($conn->query($sql) ===TRUE){
            $conn->select_db($dbname);
            $sql = "CREATE TABLE accounts (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                username VARCHAR(30) NOT NULL,
                furigana VARCHAR(30) NOT NULL,
                region VARCHAR(50) NOT NULL,
                address VARCHAR(100) NOT NULL,
                email VARCHAR(50) NOT NULL ,
                pass VARCHAR(50) NOT NULL
                )";
            if($conn->query($sql) === false){
                echo "Error creating database: " . $db->error;
            }
        } else {
            echo "Error creating database: " . $db->error;
        }
    }
?>
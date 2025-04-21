<?php

try 
{
    $dsn = "mysql:host=localhost;dbname=users";
    $user = "root";
    $pass = "";
    $con = new PDO($dsn, $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) 
{
    die('error ' . $e->getMessage());
}

<?php 
//Start session
session_start();

//Add mess errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Connection database
try{
    $db = new PDO('mysql:host=sql303.epizy.com;dbname=epiz_27107946_usersdb;charset=utf8', 'epiz_27107946', 'DrXIZeI4HbrVKDl');
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }

require_once 'functions.php';

//get information of the logged in user
$currentUser = getCurrentUser();

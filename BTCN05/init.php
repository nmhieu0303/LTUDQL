<?php 
//Start session
session_start();

//Add mess errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'functions.php';

//get information of the logged in user
$currentUser = getCurrentUser();

<?php
require_once 'init.php';

unset($_SESSION['username']);
header('Location: login.php');
exit();
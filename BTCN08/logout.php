<?php
require_once 'init.php';

unset($_SESSION['userId']);
header('Location: login.php');
exit();
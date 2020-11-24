<?php
try{
    $db = new PDO('mysql:host=sql303.epizy.com;dbname=epiz_27107946_usersdb;charset=utf8', 'epiz_27107946', 'DrXIZeI4HbrVKDl');
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }


// $stmt = $db->prepare("SELECT * FROM users WHERE email=?");
// $stmt->execute(array('hieu@gmail.com'));
// $user = $stmt->fetch(PDO::FETCH_ASSOC);



// $password = $_GET['password'];

// if(password_verify($password,$user['password']))
// {
//     echo 'Mật khẩu chính xác';
// }
// else{
//     echo 'Mật khẩu không chính xác';
// }
//var_dump($password);


//echo password_hash('123456', PASSWORD_DEFAULT);
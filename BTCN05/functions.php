<?php 
function sum($a,$b){
    return $a+$b;
}

function addUser($listUser,$username,$password,$email){
    $user = array(
        'username' => $username,
        'password' => $password,
        'email'=>$email
    );
    array_push($listUser,$user);
    file_put_contents('./data.json',json_encode($listUser));
}

function findUserByUsername($username){
    $content = file_get_contents('./data.json');
    $users = json_decode($content,true) ;
    if(!$users) return null;
    for($i = 0 ; $i<sizeof($users); $i++){
        $user = $users[$i];
        if($user['username'] == $username) 
            return  $user;
    }
    return null;
}

function getCurrentUser(){
    if(isset($_SESSION['username'])){
        return findUserByUsername($_SESSION['username']);
    }
    return null;
}
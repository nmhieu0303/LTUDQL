<?php 
function sum($a,$b){
    return $a+$b;
}

function findUserById($id){
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE id=?");
    $stmt->execute(array($id));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function findUserByUsername($username){
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE username=?");
    $stmt->execute(array($username));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function changePass($id,$password){
    try{
        global $db;
        $stmt = $db->prepare("UPDATE users SET password = ? WHERE id = ?");
        $stmt->execute(array($password,$id));
    }
    catch (PDOException $e) {
        echo 'Lỗi'. "<br>" . $e->getMessage();
    }
}

function createUser($username,$password,$email){
    global $db;
    $stmt = $db->prepare("INSERT INTO users (username,password,email) VALUES(?,?,?)");
    $stmt->execute(array($username,$password,$email));
    return findUserById($db->lastInsertId());
}

function getCurrentUser(){
    if(isset($_SESSION['userId'])){
        return findUserById($_SESSION['userId']);
    }
    return null;
}
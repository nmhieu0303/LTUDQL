<?php
require_once 'init.php';

$title = 'Activate account';
$code = $_GET['code'];
$id = $_GET['id'];
$user = findUserById($id);
if($user){
    if($user['activation']){
        if($user['activation']==$code){
            activateUser($id);
            $_SESSION['userId'] = $id;
            $_SESSION['password'] = password_hash($user['password'], PASSWORD_DEFAULT);
            header('Location: index.php');
        }
        else{
            $error = 'Invalid activation code';
        }
    }
    else{
        $error = 'Account activated';
    }
}else{
    $error = 'Account does not exist';
}
?>

<?php include 'header.php'; ?>

<!--Check error message -->
<!--Show error message -->
<div class="alert alert-danger" role="alert">
    <?php echo $error; ?>
</div>

<?php
require_once 'init.php';
// Xử lý logic ở đây

$title = "Register";
if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['email'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordCf = $_POST['passwordConfirm'];       
    $email = $_POST['email'];
    $user = findUserByUsername($username);
    if($user){
        $error = 'Account already exists!';
    }
    else if($password != $passwordCf){
        $error = 'Confirm password does not match!';
    }
    else{
        //Assign the user to session
        //addUser($users,$username,$password,$email);
        
        $code = strtoupper(bin2hex(random_bytes(10)));
        $user = createUser($fullname,$username,password_hash($password,PASSWORD_DEFAULT),$email,$code);
        $contentMail = 'Thanks for signing up with Heroku! You must follow this link to activate your account: http://localhost/nmhieu-18600087/BTCN08/activate.php?id='.$user["id"].'&code='.$code;
        sendMail($email,'Confirm your account on LTWeb1',$contentMail);
        header('Location: index.php');
        exit();
    }
}


?>


<?php include 'header.php'; ?>

<?php if (isset($error)) : ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
    </div>
    <?php include 'formRegister.php'; ?>
<?php else : include 'formRegister.php'; ?>


<?php endif; ?>

<?php include 'footer.php'; ?>


<?php 
  require_once 'init.php';
    // Xử lý logic ở đây

  $title = "Register";
    if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['email'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordCf = $_POST['passwordConfirm'];       
        $email = $_POST['email'];
        

        $content = file_get_contents('./data.json');
        $users = json_decode($content,true) ;
        if(!$users) $users = array();

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
            $userId = createUser($username,password_hash($password,PASSWORD_DEFAULT),$email);
            $_SESSION['userId'] = $userId['id'];
            $_SESSION['password'] = password_hash($password,PASSWORD_DEFAULT);
            header('Location: index.php');
            exit();
        }

    }
?>
<?php include 'header.php'; ?>

<?php if(isset($error)):?>
    <div class="alert alert-danger" role="alert">
    <?php echo $error;?>
    </div>
    <?php include 'formRegister.php';?>
<?php else: include 'formRegister.php';?>


<?php endif; ?>

<?php include 'footer.php'; ?>
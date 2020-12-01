<?php 
  require_once 'init.php';
    // Xử lý logic ở đây
  $title = "Forget Pass";
    if(isset($_POST['username'])&&isset($_POST['email'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $user = findUserByUsername($username);
        if(!$user){
            $error = 'User does not exist!';
        }
        else if($email == $user['email']){
             // //Assign the user to session
            changePass($user['id'], password_hash($user['email'], PASSWORD_DEFAULT));
            exit(header('Location: login.php'));
        }
        else{
            $error = 'Incorrect email!';
        }

    }
?>

<?php include 'header.php'; ?>

<?php if (isset($error)) : ?>
    <!--Check error message -->
    <!--Show error message -->
    <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
    </div>
    <!--Error analysis -->
    <?php include 'formForgetPass.php'; ?>
<?php else: ?>
    <?php include 'formForgetPass.php' ?>
<?php endif; ?>

<?php include 'footer.php'; ?>
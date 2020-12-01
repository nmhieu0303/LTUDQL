<?php
require_once 'init.php';
// Xử lý logic ở đây
$title = "Forget password";
if (isset($_POST['email'])&&isset($_POST['username'])) {
    $username = $_POST['username'];
    $email= $_POST['email'];
    $user = findUserByUsername($username); 
    if (!$user) {
        $error = 'Email does not exist!';
    } else if ($email == $user['email']) {
        // //Assign the user to session
        $contentMail = 'You must follow this link to reset password your account: http://localhost/nmhieu-18600087/BTCN09/resetPass.php?id='.$user['id'].'&code='. password_hash($user["email"],PASSWORD_DEFAULT) ;
        sendMail($user['email'], 'Reset password', $contentMail);
    } else {
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
<?php elseif (isset($_POST['username']) && isset($_POST['email']) && $user['email']==$_POST['email']) : ?>
    <div class="alert alert-success" role="alert">
        Please check your email!
    </div>
    <?php include 'formForgetPass.php' ?>
<?php else:?>
    <?php include 'formForgetPass.php' ?>
<?php endif; ?>

<?php include 'footer.php'; ?>
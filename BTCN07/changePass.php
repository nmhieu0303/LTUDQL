<?php
require_once 'init.php';
// Xử lý logic ở đây
$success = false;
$title = "Change the password";
if (isset($_POST['currentPass']) && isset($_POST['newPass']) && isset($_POST['newPassConfirm'])) {

    
    $userId = $_SESSION['userId'];
    $userPassword = findUserById($userId)["password"];
    $oldPassword = $_POST['currentPass'];
    $newPass = $_POST['newPass'];
    $newPassConfirm = $_POST['newPassConfirm'];

    if (!password_verify($oldPassword, $userPassword)) {
        $error = 'Current password is not valid!';
    } else if ($newPass != $newPassConfirm) {
        $error = 'Password confirm don\'t match!';
    } else {
        $success = true;
        changePass($userId, password_hash($newPass, PASSWORD_DEFAULT));
        $_SESSION['userId'] = $userId;
        $_SESSION['password'] = password_hash($newPass, PASSWORD_DEFAULT);
        $_SESSION['changePass'] = true;
        exit(header('Location: changePass.php'));
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
    <?php include 'formChangePass.php'; ?>
<?php elseif (isset($_SESSION['changePass'])) : ?>
    <div class="alert alert-success" role="alert">Sucssec!!!</div>
    <?php include 'formChangePass.php' ?>
<?php else: ?>
    <?php include 'formChangePass.php' ?>
<?php endif; ?>

<?php include 'footer.php'; ?>
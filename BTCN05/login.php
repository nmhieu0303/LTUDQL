

<?php 
  require_once 'init.php';
    // Xử lý logic ở đây

  $title = "Login";
    if(isset($_POST['username'])&&isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = findUserByUsername($username);
        if(!$user){
            $error = 'User does not exist!';
            
        }
        else if($password != $user['password']){
            $error = 'Incorrect password!';
        }
        else{
            //Assign the user to session
            $_SESSION['username'] = $user['username'];
            $_SESSION['password'] = $user['password'];
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
    <div class = "mt-4 text-center "><a class = "btn btn-primary" href="signup.php">Sign Up</a></div>
<?php else: ?>

<form action="login.php" method="POST">
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username" required>
    </div>
    <div class="form-group">
        <label>Password</label> </label>
        <input type="password" class="form-control" name="password" required>
    </div>
    <div class = "mt-4 text-right "><a href="signup.php">Sign Up</a></div>
    <button type="submit" class="btn btn-primary">Login</button>
    <div class = "mt-4"><small>&copy; 2020 Nguyễn Minh Hiếu</small></div>
</form>
</div>
<?php endif; ?>

<?php include 'footer.php'; ?>
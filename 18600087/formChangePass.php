<form action="changePass.php" method="POST">
    <div class="form-group">
        <label>Current password</label>
        <input type="password" class="form-control" name="currentPass" required>
    </div>
    <div class="form-group">
        <label>New password</label> 
        <input type="password" class="form-control" name="newPass" required>
    </div>
    <div class="form-group">
        <label>New password confirm</label>
        <input type="password" class="form-control" name="newPassConfirm" required>
    </div>
    <button type="submit" class="btn btn-primary">Change</button>
    <div class = "mt-4"><small>&copy; 2020 Nguyễn Minh Hiếu</small></div>
</form>
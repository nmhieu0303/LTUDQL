

<?php 
  require_once 'init.php';
  // Xử lý logic ở đây
  $title = "Total";
  $currentUser = getCurrentUser();

  if(!$currentUser){
    header('Location: login.php');
    exit();
  }

  if(isset($_POST['number1']) && isset($_POST['number2']))
  {
    $a = $_POST['number1'];
    $b = $_POST['number2'];
    $result = sum($a, $b);
  }
  

?>
<?php include 'header.php'; ?>



<?php if(isset($result)): ?>
  <div class="alert alert-success" role="alert">
  Kết quả phép tính <?php echo $a ?> + <?php echo $b ?> = <?php echo $result ?>
  </div>  
<?php else: ?>

<form action="sum.php" method="POST">
    <div class="form-group">
        <label>Số thứ nhất</label>
        <input type="number" class="form-control" name="number1" required>
    </div>
    <div class="form-group">
        <label>Số thứ nhất 2 </label>
        <input type="number" class="form-control" name="number2" required>
    </div>
    <button type="submit" class="btn btn-primary">Gửi dữ liệu</button>
    <div class = "mt-4"><small>&copy; 2020 Nguyễn Minh Hiếu</small></div>
</form>
<?php endif; ?>
</div>

<?php include 'footer.php'; ?>
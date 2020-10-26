

<?php 
  require_once 'init.php';
  // Xử lý logic ở đây
  $title = "Home";


?>
<?php include 'header.php'; ?>

<?php if($currentUser):?>
<div class="alert alert-success" role="alert">
    Hello <?php echo $currentUser['username']; ?>!! Have a good day
</div>
<?php else: ?>
    <div class="alert alert-warning" role="alert">
    You are not logged into your account!
    </div>
<?php endif; ?>

<?php include 'footer.php'; ?>
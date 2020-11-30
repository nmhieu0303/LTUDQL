<?php
require_once 'init.php';
// Xử lý logic ở đây
repquireLoggedIn();
$title = "Profile";
if (isset($_FILES['avatar'])) {
  $file = $_FILES['avatar'];
  $nameImg= $currentUser['id'].".jpg";
  // $newImage = resizeImage($file['tmp_name'], 250, 250);
  //imagejpeg($newImage, './users/' . $nameImg );
  move_uploaded_file($file["tmp_name"], './users/'.$currentUser['id'].'.jpg');
  upload_avatar($currentUser['id']);
  repquireLoggedIn();
}
?>
<?php include 'header.php'; ?>

<div class="d-flex justify-content-center">
  <div class="text-center">
    <div class="avatar-box rounded-circle overflow-hidden m-auto" style="background-image: url(<?php echo './users/' . $currentUser['avatar'] ?>);">
    </div>
      <form method="post" enctype="multipart/form-data" action="profile.php">
        <div class="form-group ">
          <h3 class="mt-3 mr-3"><?php echo $currentUser['fullname'] ?></h3>
          <input type="file" accept=".jpg, .jpeg" class="form-control-file" name="avatar">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
      </form>
    </div>
 
  <?php include 'footer.php'; ?>
</div>
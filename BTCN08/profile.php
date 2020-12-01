<?php
require_once 'init.php';
// Xử lý logic ở đây
repquireLoggedIn();


$title = "Profile";
if (isset($_FILES['avatar'])) {
  $file = $_FILES['avatar'];

  $content = file_get_contents($file['tmp_name']);

  // $nameImg= $currentUser['id'].".jpg";
  // // $newImage = resizeImage($file['tmp_name'], 250, 250);
  // //imagejpeg($newImage, './users/' . $nameImg );
  // move_uploaded_file($file["tmp_name"], './users/'.$currentUser['id'].'.jpg');
  upload_avatar($currentUser['id'], $content);
  repquireLoggedIn();
}
?>
<?php include 'header.php'; ?>

<div class="d-flex justify-content-center">
  <div class="text-center">
    <div class="avatar-box rounded-circle overflow-hidden m-auto">
      <img class="w-100" src="avatar.php?id=<?php echo $currentUser['id']; ?>" alt="">
    </div>
    <h3 class="mt-3"><?php echo $currentUser['fullname'] ?></h3>
    <h6 class="mt-3">Email: <?php echo $currentUser['email'] ?></h6>
    <form method="post" enctype="multipart/form-data" action="profile.php">
      <div class="form-group ">
        <input type="file" accept=".jpg, .jpeg" class="form-control-file" name="avatar">
      </div>
      <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>

    <?php include 'footer.php'; ?>
  </div>
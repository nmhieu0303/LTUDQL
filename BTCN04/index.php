<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <title>Document</title>

</head>

<body>
  <div class="vh-100 d-flex">
    <div class="container mt-4 m-auto">
      <h1 class="display-3 text-center">TÍNH TỔNG HAI SỐ</h1>
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
      </form>
    </div>
  </div>
</body>

</html>
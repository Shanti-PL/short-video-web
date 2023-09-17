<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mypdf</title>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    .line-title{
      border: 0;
      border-style: inset;
      border-top: 1px solid #000;
    }
  </style>
</head>
<body>
  <img src="assets/images/logo.jpg" style="position: absolute; width: 60px; height: auto;">
  <table style="width: 100%;">
    <tr>
      <td align="center">
        <span style="line-height: 1.6; font-weight: bold;">
          The Information of Some Users of DingDong
          <br>Author: Junyi Fan
        </span>
      </td>
    </tr>
  </table>

  <hr class="line-title"> 
  <p align="center">
    Web Information System <br>
    <b>2021 S1</b>
  </p>
  <table class="table table-bordered">
    <tr>
      <th>#</th>
      <th>ID</th>
      <th>User_Name</th>
      <th>E-mail</th>
    </tr>
    <?php $no = 1; foreach ($data as $row): ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['e-mail'] ?></td>
      </tr>
    <?php endforeach ?>
  </table>

</body>
</html>
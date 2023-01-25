<?php
include ('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <title>Display Image</title>
</head>
<body>
    <h1>Fething data from mysql database using php</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">password</th>
      <th scope="col">profile</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM `userdata`";
    $result=mysqli_query($con,$sql);
    while($row_fetch = mysqli_fetch_assoc($result)){
        echo"
        <tr>
        <td>$row_fetch[id]</td>
        <td>$row_fetch[name]</td>
        <td>$row_fetch[email]</td>
        <td>$row_fetch[password]</td>
        <td><img src='$row_fetch[pic]' width='100px'></td>
      </tr>
        ";
    }
    ?>
  </tbody>
</table>
</body>
</html>
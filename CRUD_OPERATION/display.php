<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <!--Link css file-->
  <link rel="stylesheet" href="css/style.css" />
  <!--Link css file-->

  <!--link media query-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--link media query-->

  <!--Icons-->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <!--Icons-->
  <title>Display Data</title>
</head>

<body>
  <header class="header">
    <img src="images/logo.png" class="logo" />
    <nav class="navbar">
      <ul class="navbar-list">
        <li><a class="link" href="index.php">Home</a></li>
        <li><a class="link" href="#">About</a></li>
        <li><a class="link" href="user.php">ADD STUDENT</a></li>
        <li><a class="link" href="display.php">DISPLAY</a></li>
        <li><a class="link" href="#">Contact</a></li>

      </ul>

    </nav>
    <div class="mobile-navbar-btn">
      <ion-icon name="menu-outline" class="mobile-nav-icon"></ion-icon>
      <ion-icon name="close-outline" class="mobile-nav-icon"></ion-icon>

    </div>
  </header>

  <div class="container py-5">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Sno</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Mobile</th>
          <th scope="col">Password</th>
          <th scope="col">Operations</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `crud`";
        $result = mysqli_query($con, $sql);
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $mobile = $row['mobile'];
            $password = $row['password'];



        ?>
            <tr>
              <th scope="row"><?php echo $id ?></th>
              <td><?php echo $name ?></td>
              <td><?php echo $email ?></td>
              <td><?php echo $mobile ?></td>
              <td><?php echo $password ?></td>
              <td>
                <button class="btn btn-primary"><a href="update.php?updateid=<?php echo $id ?>" class="text-light">Update</a></button>
                <button class="btn btn-danger"><a href="delete.php?deleteid=<?php echo $id; ?>" class="text-light">Delete</a></button>
              </td>
            </tr>
        <?php
          }
        }
        ?>
      </tbody>

    </table>
  </div>
  <!--Section area-->
  <script src="javascrpt/script.js"></script>
</body>

</html>
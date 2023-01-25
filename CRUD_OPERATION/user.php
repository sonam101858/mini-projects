<?php
include 'connect.php';
$Name_error = " ";
$Email_error = " ";
$mobile_error = " ";
$password_error = " ";

if (isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
        $Name_error = "Name is required";
    } else {
        $Name = $_POST['name'];
        if (!preg_match("/^[a-zA-Z. ]+$/", $Name)) {
            $Name_error = "Only letters and whitespace are allowed";
        }
    }

    if (empty($_POST['email'])) {
        $Email_error = "Email is required";
    } else {
        $Email = $_POST['email'];
        if (!preg_match("/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $Email)) {
            $Email_error = " Invalid Email format";
        }
    }

    if (empty($_POST['mobile'])) {
        $mobile_error = "mobile number is required";
    } else {
        $mobile = $_POST['mobile'];
        if (!preg_match('/^[0-9]{10}+$/', $mobile)) {
            $mobile_error = "Enter Valid Phone Number";
        }
    }

    if (empty($_POST['password'])) {
        $password_error = "password number is required";
    } else {
        $password = $_POST['password'];
        $uppercase    = preg_match('@[A-Z]@', $password);
        $lowercase    = preg_match('@[a-z]@', $password);
        $number       = preg_match('@[0-9]@', $password);
        $specialchars = preg_match('@[^\w]@', $password);
        if (!$uppercase || !$lowercase || !$number || !$specialchars || strlen($password) < 8) {
            $password_error = 'Password is not Strong';
        }
    }

    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['password'])) {
        if ((preg_match("/^[a-zA-Z. ]+$/", $Name) == true) && (preg_match("/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $Email) == true)
            && (preg_match('/^[0-9]{10}+$/', $mobile) == true)
        ) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $password = $_POST['password'];

            // code for inser the data 

            $sql = "INSERT INTO `crud` (name,email,mobile,password)
    VALUES ('$name','$email','$mobile','$password')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                // echo  " Data inserted successfully";
                header('location:display.php');
            } else {
                die(mysqli_error($con));
            }
        }
    }
}
?>

<!doctype html>
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
    <title>crud opertion</title>
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

    <div class="container my-5">
        <form method="POST">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your name"><span class="text-danger"> <?php echo $Name_error ?> </span><br>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email"><span class="text-danger"> <?php echo $Email_error ?> </span><br>
            </div>

            <div class="mb-3">
                <label>Mobile</label>
                <input type="text" class="form-control" name="mobile" placeholder="Enter your phone num...."><span class="text-danger"> <?php echo $mobile_error ?> </span><br>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your pass....."><span class="text-danger"> <?php echo $password_error ?> </span><br>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

    </div>
    <!--Section area-->
    <script src="javascrpt/script.js"></script>
</body>

</html>
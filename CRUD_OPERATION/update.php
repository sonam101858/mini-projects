<?php
include 'connect.php';
$id = $_GET['updateid'];

//code for fetching data
$sql = "SELECT * FROM `crud` where id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$password = $row['password'];

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

            // code for update the data 

            $sql = "UPDATE `crud` set id=$id,name='$name',
             email='$email',mobile='$mobile',password='$password' where id=$id";
            $result = mysqli_query($con, $sql);
            if ($result) {
                // echo  " Data updated successfully";
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
    <title>crud opertion</title>
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>"><span class="text-danger"> <?php echo $Name_error ?> </span><br>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>"><span class="text-danger"><?php echo $Email_error ?> </span><br>
            </div>

            <div class="mb-3">
                <label>Mobile</label>
                <input type="text" class="form-control" name="mobile" value="<?php echo $mobile; ?>"><span class="text-danger"><?php echo $mobile_error ?> </span><br>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" class="form-control" name="password" value="<?php echo $password; ?>"><span class="text-danger"><?php echo $password_error ?> </span><br>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>

    </div>
</body>

</html>
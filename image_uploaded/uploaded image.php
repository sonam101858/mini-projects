<?php
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>uploaded image</title>
    <style>
        .text{
            color: #fff;
            text-decoration: none;
        }
        .text:hover{
            color: #fff;
            text-decoration: none;
        }
        </style>
</head>

<body>
    <div class="float-left fixed-top">
    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
        <button type="submit" class="btn btn-primary btn-lg"><a href="../image_uploaded/image_display.php" class="text">SEE ALL DATA</a></button>
    </div>
</div>
    <section class="vh-50" style="background-color: #eee;">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center ">
                <div class="col-lg-7 col-xl-8">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-1">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-lg-5 col-xl-4 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                    <form class="mx-1 mx-md-4" method="POST" enctype="multipart/form-data">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" class="form-control" name="name" />
                                                <label class="form-label" for="form3Example1c">Your Name</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="form3Example3c" class="form-control" name="email" />
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4 ">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4c" class="form-control" name="password" />
                                                <label class="form-label" for="form3Example4c">Password</label>
                                            </div>
                                        </div>

                                        <div class="col-md-12 p-1">
                                            <input class="form-control form-control-lg" id="formFileLg" type="file" name="profile" />
                                        </div>

                                        <br>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg" name="upload">Register</button>
                                        </div>

                                    </form>

                                </div>

                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="images/student.jpg" class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    if (isset($_POST['upload'])) {
        $uname = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        //    name in form
        $img_loc = $_FILES['profile']['tmp_name'];
        $image_name = $_FILES['profile']['name'];
        $img_extension = pathinfo($image_name, PATHINFO_EXTENSION);
        $img_size = $_FILES['profile']['size'] / (1024 * 1024);
        $img_des = "uploaded/" . $uname . "." . $img_extension;

        print_r($_FILES);
        if (($img_extension != 'jpg') && ($img_extension != 'jpeg') && ($img_extension != 'png') && ($img_extension != 'webp')) {
            echo "<script>alert('invalid Image Extension');</script>";
            exit();
        }
        if ($img_size > 1) {
            echo "<script>alert('Images size is greater then 1MB');</script>";
            exit();
        }


        $sql = "INSERT INTO `userdata`(name,email,password,pic)
        VALUES ('$uname','$email','$password','$img_des')";
        if (mysqli_query($con, $sql)) {
            move_uploaded_file($img_loc, $img_des);
            echo "<script>alert('successfully');</script>";
        } else {
            echo "<script>alert('Unsuccessfully');</script>";
        }
    }
    ?>

</body>

</html>
<?php
$Name_error = " ";
$Email_error = " ";
$Gender_error = " ";
$Website_error = " ";
$age_error = " ";
if (isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
        $Name_error = "Name is required";
    } else {
        $Name = Test_User_Input($_POST['name']);
        if (!preg_match("/^[a-zA-Z. ]+$/", $Name)) {
            $Name_error = "Only letters and whitespace are allowed";
        }
    }



    if (empty($_POST['email'])) {
        $Email_error = "Email is required";
    } else {
        $Email = Test_User_Input($_POST['email']);
        if (!preg_match("/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $Email)) {
            $Email_error = " Invalid Email format";
        }
    }



    if (empty($_POST['age'])) {
        $age_error = "age is required";
    } else {
        $age = Test_User_Input($_POST['age']);
        if (!preg_match("/^[0-9]+$/", $age)) {
            $age_error = " Invalid Age format";
        }
    }



    if (empty($_POST['gender'])) {
        $Gender_error = "Gender is required";
    } else {
        $Gender = Test_User_Input($_POST['gender']);
    }


    if (empty($_POST['website'])) {
        $Website_error = "Website is required";
    } else {
        $website = Test_User_Input($_POST['website']);
        if (!preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/", $website)) {
            $Website_error = "Invalide webside address format";
        }
    }

    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['gender']) && !empty($_POST['website'])) {
        if ((preg_match("/^[a-zA-Z. ]+$/", $Name) == true) && (preg_match("/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $Email) == true) &&
         (preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/", $website) == true) && (preg_match("/^[0-9]+$/", $age)== true)) {
            echo "<h2>Your submit information</h2><br>";
            echo "<b>Name:</b>    {$_POST["name"]}<br>";
            echo "<b>Email:</b>   {$_POST["email"]}<br>";
            echo "<b>Age:</b>      {$_POST["age"]}<br>";
            echo "<b>Gender:</b>  {$_POST["gender"]}<br>";
            echo "<b>Website:</b> {$_POST["website"]}<br>";
            echo "<b>Comment:</b> {$_POST["comment"]}<br>";
            
        } else {
            echo '<span class="text-danger"> please correct and commplete your form again </span>';
        }
    }
}
function Test_User_Input($Data)
{
    return $Data;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<div class="container p-5 my-5 border">
    <div class="container">
        <h2>Form Validation with php</h2>
        <form action="php_validation_form.php" method="post">
            <legend>* Please fill out the following fields</legend>

            <div class="form-group">
               <p class="text-info"> Name:</p>
                <input class="form-control" type="text" name="name" placeholder="Enter name" value=""  autocomplete="off" ><span  class="text-danger"> <?php  echo $Name_error ?> </span><br>
            </div>

            <div class="form-group">
            <p class="text-info"> Email:</p>
                <input class="form-control" type="text" name="email" placeholder="Enter email" value=""  autocomplete="off" ><span  class="text-danger"> <?php echo $Email_error ?></span><br>
            </div>


            <div class="form-group">
            <p class="text-info"> Age:</p>
                <input class="form-control" type="text" name="age" placeholder="Enter age" value=""  autocomplete="off"><span  class="text-danger"  autocomplete="off" > <?php echo $age_error ?></span><br>
            </div>

            <p class="text-info"> Gender:</p>
            <div class="form-check">
                 <input class="form-check-input" type="radio" name="gender" value="Male"><p class="text-info"> Male:</p>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="Female"><p class="text-info"> Female:</p><span  class="text-danger"> <?php echo $Gender_error ?></span><br>
            </div>

            <div class="form-group">
            <p class="text-info"> Website:</p>
                <input class="form-control" type="text" name="website"  placeholder="Enter website"value=""  autocomplete="off" ><span  class="text-danger"> <?php echo $Website_error ?></span><br>
            </div>

            <div class="form-group">
            <p class="text-info"> comment:</p>
                <textarea class="form-control" name="comment" rows="5" cols="25" > </textarea>
                <br>
                <br>
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="submit your information">


        </form>
</body>
</div>
</div>

</html>
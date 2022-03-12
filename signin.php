<?PHP
# author: @rajatbalda
include "./config.php";
$msg = "";
$error = "";
if (isset($_POST['submit'])) {

    if ($_POST['email'] != "" && $_POST['password']) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $registerUser = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
        if (mysqli_num_rows($registerUser) == 1) {
            $row = mysqli_fetch_array($registerUser);
            session_start();
            $_SESSION['user'] = $row['sno'];
            if (isset($_SESSION['user'])) {
                header('location:./dashboard.php');
            }
        } else {
            $error = "Email and Password don't match. Try again.";
        }
    } else {
        $error = "Please fill in all required fields";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Sign In</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>

    <main class="form-signin">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<center>
            <h1 class="h3 mb-3 fw-normal">Sign in</h1>
            </br>
            <p>Do you have account? <a href="./signup.php" class="text-decoration-none">Sign Up</a></p>
</center>
            <label for="floatingInput"><b>Email</b></label>
            <div class="form-floating ">
                <input type="email" class="form-control" name="email" placeholder="yourname@xyz.com">
            </div>
            </br>
            <label for="floatingPassword"><b>Password</b></label>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>

            <div class="checkbox mb-3">
                <label>
                    <p class="text-end"><a href="forgot.php" class="text-decoration-none">Forgot password?</a></p>
                </label>
            </div>
            <?PHP echo $retVal = ($msg == "") ? "" : "<p class='text-success'>*$msg</p>";
            echo $error = ($error == "") ? "" : "<p class='text-danger'>*$error</p>"; ?>
            <input class="w-100 btn btn-lg btn-primary" type="submit" value="Sign In" name="submit" />
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>

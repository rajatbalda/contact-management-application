<?PHP
# author: @rajatbalda
include "./config.php";
$msg = "";
$error = "";
if (isset($_POST['submit'])) {

    if ($_POST['email'] != "" && $_POST['Secret'] && $_POST['password']) {
        $email = $_POST['email'];
        $Secret = $_POST['Secret'];
        $password = $_POST['password'];
        $registerUser = mysqli_query($connect, "INSERT INTO `users`(`email`, `password`, `Secret`) VALUES ('$email','$password','$Secret')");
        if ($registerUser) {
            $msg = 'Sign Up Successful <a href="signin.php">Click Here to Sign In</a>';
        } else {
            $error = "Something went wrong or user already exist. Please try again.";
        }
    } else {
        $error = "Please fill all required fields ";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Sign Up</title>

    <link href="style.css" rel="stylesheet">
</head>

<body>

    <main class="form-signin">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<center>
            <h1 class="h3 mb-3 fw-normal text-primary">Sign Up</h1>
            </br>
            <p>Already have an account? <a href="./signin.php" class="text-decoration-none text-primary">Sign In</a></p>
</center>
            <label>Email</label>
            <div class="form-floating">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            </br>
            <label>Password</label>
            <div class="form-floating">
                <input type="password" class="form-control" id="Password" name="password"  required>
            </div>
            </br>
            <label>Secret</label>
            <div class="form-floating">
                <input type="password" class="form-control" id="Secret" name="Secret" placeholder="Secret" required>
            </div>
            </br>
            <?PHP echo $retVal = ($msg == "") ? "" : "<p class='text-success'>$msg</p>";
            echo $error = ($error == "") ? "" : "<p class='text-danger'>$error</p>"; ?>
            <input class="w-100 btn btn-lg btn-primary" type="submit" value="Sign Up" name="submit" />
            <div class="checkbox mb-3">
                </br>
                <label>
                    <center><p class="text-small text-secondary"> By clicking the "Sign Up" button, you are creating an account, and you agree to the Terms of Use.</p></center>
                </label>
            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>
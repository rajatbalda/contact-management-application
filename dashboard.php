<?PHP
# author: @rajatbalda
session_start();
if (!isset($_SESSION['user'])) {
    header('location:./signin.php');
}
include "./config.php";
$user = $_SESSION['user'];
$msg = "";
$error = "";
if (isset($_POST['submit'])) {
    if ($_POST['email'] != "" && $_POST['name'] != "" && $_POST['ContactNumber'] != "") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contactNo = $_POST['ContactNumber'];
        $registerUser = mysqli_query($connect, "INSERT INTO `userContacts`(`userId`,`name`, `email`, `contactNo`) VALUES ('$user','$name','$email','$contactNo')");
        if ($registerUser) {
            $msg = "Contact Added";
        } else {
            $error = "Please try again";
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

    <title>Dashboard - Add Contact</title>

    <link href="style.css" rel="stylesheet">
</head>

<body>

    <main class="form-signin">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<center>
            <h1 class="h3 mb-3 fw-normal text-dark">Add Contact</h1>
</center>
            </br>
            <label> Name</label>
            <div class="form-floating">
                <input type="text" class="form-control  text-dark" name="name" id="ContactName">
            </div>
            </br>
            <label>Phone Number</label>
            <div class="form-floating">
                <input type="tel" class="form-control  text-dark" name="ContactNumber" id="contactNo">
            </div>
            </br>
            <label>Email</label>
            <div class="form-floating">
                <input type="email" class="form-control  text-dark" name="email" id="email">
            </div>
            </br>
            <?PHP echo $retVal = ($msg == "") ? "" : "<p class='text-success'>*$msg</p>";
            echo $error = ($error == "") ? "" : "<p class='text-danger'>*$error</p>"; ?>
            <input class="w-100 btn btn-lg btn-primary" type="submit" value="Save" name="submit" />
        </form>
        <br>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                    <center>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?PHP
                            $SelectContacts = mysqli_query($connect, "SELECT * FROM `userContacts` WHERE `userId` = '$user'");
                            if (mysqli_num_rows($SelectContacts) != 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_array($SelectContacts)) { ?>
                                    <tr>
                                        <?PHP?>
                                        <td><?PHP echo $row['name']; ?></td>
                                        <td><?PHP echo $row['contactNo']; ?></td>
                                        <td><?PHP echo $row['email']; ?></td>
                                    </tr>
                                <? }
                            } else { ?>
                                <tr>
                                    <th scope="row" colspan="3">No Data Found</th>
                                </tr>
                            <? } ?>
                        </tbody>
                    </table>
                    </center>
                </div>
            </div>
        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>
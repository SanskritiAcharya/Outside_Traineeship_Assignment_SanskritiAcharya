<?php
session_start();
include 'db.php';

if (isset($_SESSION['user_id'])) {
    header("Location: welcome.php");
    exit();
}

$myError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $myUsername = $_POST['username'];
    $myPassword = $_POST['password'];

    if (empty($myUsername) || empty($myPassword)) {
        $myError = "Please fill in all the fields!";
    } else {

        $isUsernameTaken = mysqli_query($myConnection, "SELECT * FROM users WHERE username = '$myUsername'");

        if (mysqli_num_rows($isUsernameTaken) > 0) {
            $myError = "Sorry, that username is already taken. Try a different one!";
        } else {

            $myHashedPassword = password_hash($myPassword, PASSWORD_DEFAULT);

            $addToDatabase = mysqli_query($myConnection, "INSERT INTO users (username, password) VALUES ('$myUsername', '$myHashedPassword')");

            if ($addToDatabase) {
                header("Location: login.php");
                exit();
            } else {
                $myError = "Hmm, something didn't work. Please try again!";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body { 
            margin: 60px auto;
            max-width: 350px; 
        }
        input { 
            display: block; 
            width: 100%; 
            margin-bottom: 10px; 
            padding: 7px; 
            box-sizing: border-box; 
        }
        button { 
            padding: 8px 20px; 
        }
        .myError { 
            color: red; 
        }
        form { 
            border: 1px solid #ccc; 
            padding: 20px; 
        }
    </style>
</head>
<body>

    <h2>Register</h2>

    <?php if ($myError != "") { ?>
        <p class="myError"><?php echo $myError; ?></p>
    <?php } ?>

    <form method="POST" action="register.php">
        <label>Username</label>
        <input type="text" name="username">

        <label>Password</label>
        <input type="password" name="password">

        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="login.php">Login here</a></p>

</body>
</html>
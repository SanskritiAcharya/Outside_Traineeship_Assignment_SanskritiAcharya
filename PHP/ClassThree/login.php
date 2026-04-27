<?php
session_start();
include 'database.php';

if (isset($_SESSION['user_id'])) {
    header("Location: welcome.php");
    exit();
}

$myError = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myUsername = $_POST['username'];
    $myPassword = $_POST['password'];

    $searchForUser = mysqli_query($myConnection, "SELECT * FROM users WHERE username = '$myUsername'");
    $myUser = mysqli_fetch_assoc($searchForUser);

    if ($myUser && password_verify($myPassword, $myUser['password'])) {
        $_SESSION['user_id'] = $myUser['userid'];
        $_SESSION['username'] = $myUser['username'];
        header("Location: welcome.php");
        exit();
    } else {
        $myError = "Incorrect username or password. Please try again!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
    <h2>Login</h2>
    <?php if ($myError != "") { ?>
        <p class="myError"><?php echo $myError; ?></p>
    <?php } ?>

    <form method="POST" action="login.php">
        <label>Username</label>
        <input type="text" name="username">

        <label>Password</label>
        <input type="password" name="password">

        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register here</a></p>
</body>
</html>
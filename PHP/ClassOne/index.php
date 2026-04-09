<?php
$name = "";
$age = "";
$color = "";
$hobbies = [];
$err = "";
$submission = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $age = htmlspecialchars($_POST["age"]);
    $color = htmlspecialchars($_POST["color"]);
    if (isset($_POST["hobbies"])) {
        $hobbies = $_POST["hobbies"];
    }

    if ($name == "") {
        $err = "Name can not be left empty.";
    } elseif ($color == "") {
        $err = "Favourite color can not be empty.";
    } elseif ($age == ""){ 
        $err = "Age can not be left empty."; 
    } elseif (count($hobbies) == 0) {
        $err = "Please select at least one hobby.";
    } else {
        $submission = true; 
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Assignment 1</title>
    <style>
        body {
            margin-top: 80px;
            color:#696767;
        }
        .box {
            padding: 25px;
            width: 340px;
            border: 0.5px solid gray;
            border-radius: 1%; 
            box-shadow: 5px 10px 10px #36453B;
            margin: 100px 500px 100px 500px;
        }
        input[type="text"], input[type="number"] {
            width: 95%;
            padding: 8px;
            margin-bottom: 15px;
            border: 0.5px solid gray; 
        }
    </style>
</head>
<body>
<div class="box">
<?php
if ($submission) {
    echo "<h1 style='color: #606D5D; display: inline-block;'>Your</h1> <h1 style='color: #BC9CB0; display: inline-block;'>Result</h1>";
    echo "<p>Hello, " . $name . "!</p>";

    if ($age >= 18) {
        echo "<p>You are adult.</p>";
    } else {
        echo "<p>You are a minor.</p>"; 
    }

    switch ($color) {
        case "red":
            echo "<p>Red is a bold choice!</p>";
            break;
        case "blue":
            echo "<p>Blue is calming.</p>";
            break;
        case "green":
            echo "<p>Green represents nature.</p>";
            break;
        default:
            echo "<p>That's an interesting choice!</p>";
    }

    echo "<p>Hobbies: ";
    $list = "";
    foreach ($hobbies as $h) {
        $list .= $h . ", "; 
    }
    echo $list;
    echo "</p>";

    echo "<p>Here is a list of the years you have lived:</p>";
    for ($i = 1; $i <= $age; $i++) {
        echo "<p>" . $i . "</p>";
    }
    echo "<br><a href='index.php' style='color: black;'>BACK PLEASEEE</a>";

} else {
    echo "<h1 style='color: #606D5D; display: inline-block;'>Info</h1> <h1 style='color: #BC9CB0; display: inline-block;'>Form</h1>";

    if ($err != "") {
        echo "<p style='color:rgb(193, 70, 70);'>" . $err . "</p>";
    } 

    echo "<form method='POST' action='index.php'>";
    echo "<label>Name:</label><br>";
    echo "<input type='text' name='name' value='" . $name . "'>";

    echo "<label>Age:</label><br>";
    echo "<input type='number' name='age' value='" . $age . "'>";

    echo "<label>Hobbies:</label><br>";
    echo "<input type='checkbox' name='hobbies[]' value='Dancing'> Dancing <br>";
    echo "<input type='checkbox' name='hobbies[]' value='Traveling'> Traveling <br>";
    echo "<input type='checkbox' name='hobbies[]' value='Sleeping'> Sleeping <br>";
    echo "<input type='checkbox' name='hobbies[]' value='Eating'> Eating <br>";
    echo "<input type='checkbox' name='hobbies[]' value='Splitsvilla'> Watching Splitsvilla <br>";

    echo "<br><label>Favorite Color:</label><br>";
    echo "<input type='text' name='color' value='" . $color . "'>";

    echo "<br><input type='submit' value='Submit' style='padding: 8px 15px; font-size: 12px; background-color:#596869; color: white;'>";
    echo "</form>";
}
?>
</div>
</body>
</html>
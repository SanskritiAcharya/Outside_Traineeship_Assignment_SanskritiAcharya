<?php
$myConnection = mysqli_connect("localhost", "root", "", "PHP_assg_3");

if (!$myConnection) {
    die("Could not connect: " . mysqli_connect_error());
}
?>
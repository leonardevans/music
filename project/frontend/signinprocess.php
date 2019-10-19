<?php
session_start();
require_once 'dbconnection.php';
if (isset($_POST['signin'])) {

    function test_input($data)
    { //prevent mysql injection
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $password = $username = "";
    $password = test_input($_POST['password']);
    $username = test_input($_POST['username']);
    if (empty($_POST['username']) || empty($_POST['password'])) {
        header("location:signin.php?emptyerr= Please enter your user name and  password ");
    } else {

        $checkusername = "select * from customers where username='$username'";
        $usernameresult = mysqli_query($conn, $checkusername);
        if (mysqli_fetch_assoc($usernameresult)) {
            $sql = "select * from customers where username = '$username' and password = '$password' ";
            $result = mysqli_query($conn, $sql);
            if (mysqli_fetch_assoc($result)) {
                $_SESSION['User'] = $username;
                setcookie('User', $_SESSION['User'], time() + 43200, '/');
                header("location:index.php");
            } else {
                header("location:signin.php?signinerr= Please enter correct user name and password ");
            }
        } else {
            header("location:signin.php?userexisterr= User name does not exist. ");
        }
    }

} else {
    echo "file not working!";
}
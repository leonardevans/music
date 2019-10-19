<?php
require_once 'dbconnection.php';
if (isset($_POST['update'])) {

    foreach ($_POST['customerID'] as $customerID) {
        $firstname = $_POST['firstname'][$customerID];
        $lastname = $_POST['lastname'][$customerID];
        $username = $_POST['username'][$customerID];
        $gender = $_POST['gender'][$customerID];
        $email = $_POST['email'][$customerID];
        $sql = "UPDATE `customers` SET `firstname` = '$firstname', `lastname` = '$lastname', `username` = '$username', `gender` = '$gender', `email` = '$email' WHERE `customers`.`customerID` = '$customerID'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_query($conn, $sql)) {
            header("location:customers.php?updatesuccess= Table customers updated successfully. ");
        } else {
            header("location:customers.php?updateerr= Error while updating table customers ");
        }

    }
}

if (isset($_POST['deleteChecked'])) {
    if (!empty($_POST['delete'])) {
        $list = implode(",", $_POST['delete']);
        $sql = "DELETE from `customers` where `customerID` in ($list)";
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
        header("location:customers.php?updatesuccess= Items deleted successfully. ");

    } else {
        header("location:customers.php?updateerr= No selected items to delete.");

    }

}
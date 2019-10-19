<?php
require_once 'dbconnection.php';
//if user has clicked like or dislike button
if (isset($_POST['action'])) {
    $movie_ID = $_POST['movie_ID'];
    $action = $_POST['action'];

    switch ($action) {
        case 'like':
            $sql = "INSERT INTO rating_info (movie_ID, customerID, rating_action) VALUES ($movie_ID, $customerID, '$action') ON DUPLICATE KEY UPDATE rating_action = 'like'";
            break;
        case 'dislike':
            $sql = "INSERT INTO rating_info (movie_ID, customerID, rating_action) VALUES ($movie_ID, $customerID, '$action') ON DUPLICATE KEY UPDATE rating_action = 'dislike'";
            break;
        case 'unlike':
            $sql = "DELETE FROM rating_info WHERE customerID=$customerID AND movie_ID = $movie_ID";
            break;
        case 'undislike':
            $sql = "DELETE FROM rating_info WHERE customerID=$customerID AND movie_ID = $movie_ID";
            break;

        default:

            break;
    }

    mysqli_query($conn, $sql);
    //return number of likes
    return getRating($movie_ID);

}

function getRating($movie_ID)
{
    global $conn;
    $rating = array();

    $likes_query = "SELECT COUNT(*) FROM rating_info WHERE movie_ID = $movie_ID AND rating_action = 'like'";
    $dislikes_query = "SELECT COUNT(*) FROM rating_info WHERE movie_ID = $movie_ID AND rating_action = 'dislike'";

    $likes_rs = mysqli_query($conn, $likes_query);
    $dislikes_rs = mysqli_query($conn, $dislikes_query);

    $likes = mysqli_fetch_array($likes_rs);
    $dislikes = mysqli_fetch_array($dislikes_rs);

    $rating = array('likes' => $likes[0], 'dislikes' => $dislikes[0]);
    return json_encode($rating);
}

function getLikes($movie_ID)
{
    global $conn;
    $sql = "SELECT COUNT(*) FROM rating_info where movie_ID=$movie_ID and rating_action = 'like'";
    $rs = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($rs);
    return $result[0];
}
function getDislikes($movie_ID)
{
    global $conn;
    $sql = "SELECT COUNT(*) FROM rating_info where movie_ID=$movie_ID and rating_action = 'dislike'";
    $rs = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($rs);
    return $result[0];
}
function userLiked($movie_ID)
{
    global $conn;
    global $customerID;
    $sql = "SELECT * FROM rating_info WHERE customerID=$customerID AND movie_ID=$movie_ID AND rating_action='like'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}
function userDisliked($movie_ID)
{
    global $conn;
    global $customerID;
    $sql = "SELECT * FROM rating_info WHERE customerID=$customerID AND movie_ID=$movie_ID AND rating_action='dislike'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}
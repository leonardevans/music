<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="Viking movies">
    <meta charset="UTF-8">
    <title>movie</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="frontstyle.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="scripts/jquery.js"></script>
    <script src="scripts/like_dislike.js"></script>
    <link rel="stylesheet" href="css/like_dislike.css">
    <style>

    </style>
</head>

<body class="">

    <?php require 'header.html';?>

    <br>
    <div class="moviespage">
        <div>
            <center>
                <?php
require_once 'dbconnection.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from movies where movie_ID=$id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $view_query = "SELECT * FROM views WHERE customerID=$customerID and movie_ID=$id";
        $view_result = mysqli_query($conn, $view_query);
        if (mysqli_num_rows($view_result) > 0) {
            $updateViews = "UPDATE views SET `views`=`views`+1 WHERE movie_ID=$id and customerID=$customerID";
            mysqli_query($conn, $updateViews);
        } else {
            $addView = "INSERT INTO views (movie_ID, customerID) VALUES($id, $customerID)";
            $addViewResult = mysqli_query($conn, $addView);
        }

        $view_query = "SELECT * FROM views WHERE  movie_ID=$id";
        $view_result = mysqli_query($conn, $view_query);
        $views = mysqli_num_rows($view_result);
        while ($row = mysqli_fetch_assoc($result)) {
            $url = $row['url'];
            $movie = $row['movie_name'];
            $movie_name = pathinfo($row['movie_name'], PATHINFO_FILENAME);
            $movie_ID = $id;

        }
        echo "<video width='90%' height='auto' controls autoplay loop > <source src='$url' autoplay='autoplay' type='video/webm'></video>";

    } else {
        header("location:index.php");
    }
} else {
    header("location:index.php");
}
?>
                <div>
                    <?php include 'like_dislike.php';?>
                    <i class="fa fa-eye"></i>
                    <span class="views"><?php echo $views; ?></span>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <i <?php if (userLiked($movie_ID)) {?> class="fas fa-thumbs-up like-btn" <?php } else {?>
                        class="far fa-thumbs-up like-btn" <?php }?> data-id="<?php echo $movie_ID; ?>"></i>
                    <span class="likes"><?php echo getLikes($movie_ID); ?></span>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <i <?php if (userDisliked($movie_ID)) {?> class="fas fa-thumbs-down dislike-btn" <?php } else {?>
                        class="far fa-thumbs-down dislike-btn" <?php }?> data-id="<?php echo $movie_ID; ?>">
                    </i>
                    <span class="dislikes"><?php echo getDislikes($movie_ID); ?></span>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fas fa-share"></i>
                </div>
                <div>
                    <?php echo "<br>" . $movie_name . "<br>"; ?>
                </div>
            </center>
        </div>
    </div>

    <div id="comments">
        <h5>COMMENTS</h5>
        <?php if (@$_GET['success'] == true) {?>
        <div class="alert-light text-danger text-center" style="color:green;"> <?php echo $_GET['success']; ?> </div>
        <?php }?>

        <?php if (@$_GET['error'] == true) {?>
        <div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['error']; ?> </div>
        <?php }?>

        <form action="add_comment.php" method="post">
            <input type="hidden" name="movieid" style="display: none;" value="<?php if (isset($_GET['id'])) {$id = $_GET['id'];
    echo $id;}?>">
            <textarea name="comment" rows="2" cols="" style="width:96%;"></textarea><br>
            <input type="submit" name="submitcomment>" value="Add Comment">
            <br>
            <br>
            <?php require 'comments.php';?>
            <br>
            <br>
        </form>
    </div>

    <?php require 'footer.html';?>
    <!--Add Jquery scripts -->

</body>

</html>
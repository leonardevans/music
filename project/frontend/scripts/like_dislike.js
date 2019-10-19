$(document).ready(function() {
  // when the user clicks the like button

  $(".like-btn").on("click", function() {
    var movie_ID = $(this).data("id");
    $clicked_btn = $(this);

    // for the like button you can only like or unlike, no dislike action
    if ($clicked_btn.hasClass("far")) {
      action = "like";
    } else if ($clicked_btn.hasClass("fas")) {
      action = "unlike";
    }

    $.ajax({
      url: "moviewatch.php",
      type: "post",
      data: {
        action: action,
        movie_ID: movie_ID,
      },
      success: function(response) {
        res = JSON.parse(response);

        if (action == "like") {
          $clicked_btn.removeClass("far");
          $clicked_btn.addClass("fas");
          $clicked_btn
            .siblings("i.fa-thumbs-down")
            .removeClass("fas")
            .addClass("far");
        } else if (action == "unlike") {
          $clicked_btn.removeClass("fas");
          $clicked_btn.addClass("far");
        }

        // add number of likes and dislikes
        $clicked_btn.siblings("span.likes").text(res.likes);
        $clicked_btn.siblings("span.dislikes").text(res.dislikes);
      },
    });
  });

  // when the user clicks the dislike button
  $(".dislike-btn").on("click", function() {
    var movie_ID = $(this).data("id");
    $(this).addClass("fas");
    $clicked_btn = $(this);

    // for the dislike button you can only dislike or undislike, no like action
    if ($clicked_btn.hasClass("far")) {
      action = "dislike";
    } else if ($clicked_btn.hasClass("fas")) {
      action = "undislike";
    }

    $.ajax({
      url: "moviewatch.php",
      type: "post",
      data: {
        action: action,
        movie_ID: movie_ID,
      },
      success: function(response) {
        res = JSON.parse(response);

        if (action == "dislike") {
          $clicked_btn.removeClass("far");
          $clicked_btn.addClass("fas");
          $clicked_btn
            .siblings("i.fa-thumbs-up")
            .removeClass("fas")
            .addClass("far");
        } else if (action == "undislike") {
          $clicked_btn.removeClass("fas");
          $clicked_btn.addClass("far");
        }

        // add number of likes and dislikes
        $clicked_btn.siblings("span.likes").text(res.likes);
        $clicked_btn.siblings("span.dislikes").text(res.dislikes);
      },
    });

    // $.post(
    //   "moviewatch.php",
    //   {
    //     action: action,
    //     movie_ID: movie_ID,
    //   },
    //   function(data, status) {
    //     res = JSON.parse(data);
    //     $clicked_btn.siblings("span.likes").text("liked");
    //     $clicked_btn.siblings("span.dislikes").text(res.dislikes);
    //   }
    // );
  });
});

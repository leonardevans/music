<?php if(@$_GET['movieerr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['movieerr'];?> </div>
<?php } ?>

<?php if(@$_GET['thumbnailerr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['thumbnailerr'];?> </div>
<?php } ?>

<?php if(@$_GET['genreerr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['genreerr'];?> </div>
<?php } ?>

<?php if(@$_GET['dateerr']==true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['dateerr'];?> </div>
<?php } ?>

<?php if(@$_GET['actorserr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['actorserr'];?> </div>
<?php } ?>

<?php if(@$_GET['addsuccess'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:green;"> <?php echo $_GET['addsuccess'];?> </div>
<?php } ?>

<?php if(@$_GET['movie_err'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['movie_err'];?> </div>
<?php } ?>

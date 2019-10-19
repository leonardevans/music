<?php if(@$_GET['firstnameerr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['firstnameerr'];?> </div>
<?php } ?>

<?php if(@$_GET['lastnameerr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['lastnameerr'];?> </div>
<?php } ?>

<?php if(@$_GET['usernameerr']==true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['usernameerr'];?> </div>
<?php } ?>

<?php if(@$_GET['gendererr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['gendererr'];?> </div>
<?php } ?>

<?php if(@$_GET['emailerr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['emailerr'];?> </div>
<?php } ?>

<?php if(@$_GET['passworderr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['passworderr'];?> </div>
<?php } ?>
<?php if(@$_GET['checkusernameerr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['checkusernameerr'];?> </div>
<?php } ?>

<?php if(@$_GET['checkemailerr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['checkemailerr'];?> </div>
<?php } ?>

<?php if(@$_GET['addcustsuccess'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:green"> <?php echo $_GET['addcustsuccess'];?> </div>
<?php } ?>

<?php if(@$_GET['addcusterr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['addcusterr'];?> </div>
<?php } ?>
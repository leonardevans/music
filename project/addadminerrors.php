	<?php if(@$_GET['admfirstnameerr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['admfirstnameerr'];?> </div>
<?php } ?>

<?php if(@$_GET['admlastnameerr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['admlastnameerr'];?> </div>
<?php } ?>

<?php if(@$_GET['admusernameerr']==true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['admusernameerr'];?> </div>
<?php } ?>

<?php if(@$_GET['admgendererr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['admgendererr'];?> </div>
<?php } ?>

<?php if(@$_GET['admemailerr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['admemailerr'];?> </div>
<?php } ?>

<?php if(@$_GET['admpassworderr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['admpassworderr'];?> </div>
<?php } ?>
<?php if(@$_GET['admcheckusernameerr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['admcheckusernameerr'];?> </div>
<?php } ?>

<?php if(@$_GET['admcheckemailerr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['admcheckemailerr'];?> </div>
<?php } ?>

<?php if(@$_GET['addadminsuccess'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:green"> <?php echo $_GET['addadminsuccess'];?> </div>
<?php } ?>

<?php if(@$_GET['addadminerr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['addcusterr'];?> </div>
<?php } ?>
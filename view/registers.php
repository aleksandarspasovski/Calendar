<?php if (isset($_SESSION['err'])) :?>
	<div class="errors">
		<?php foreach ($_SESSION['err'] as $key => $value) :?>
			<small><?php echo $value; ?> ||</small>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
<form action="<?php echo URL; ?>registers/createUser" method="post">
  <h1>Register</h1>
  <div class="form-group">
    <label for="exampleInputEmail1">Username <span style="color: red;">*</span></label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="John Doe">
    <small id="emailHelp" class="form-text text-muted">Password should be at least 8 characters long, should have at least one alphabet letter, one special character and at least one number</small>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password <span style="color: red;">*</span></label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
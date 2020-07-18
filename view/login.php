<form action="<?php echo URL; ?>login/user" method="post">
  <h1>Log in</h1>
  <div class="form-group">
    <label for="exampleInputEmail1">Username <span style="color: red;">*</span></label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="John Doe" name="username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password <span style="color: red;">*</span></label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
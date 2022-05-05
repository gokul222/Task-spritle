<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<body>

<div class="container"><br>
  <a align ="right" href="<?php echo base_url();?>/add">Add New User </a>
  <h2>User Login</h2>
  <?php $error = $this->uri->segment(2); if ($error == 2){ 
  ?>
  <span style="color: red;"><center> Invaild Email / Password</center></span>
  <?php } ?>
  <form action="<?php echo base_url();?>user_login" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email"  required="" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password"  required="" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
   
    <button type="submit" class="btn btn-default">Login</button>
  </form>
</div>

</body>
</html>

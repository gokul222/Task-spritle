<!DOCTYPE html>
<html lang="en">
<head>
  <title>ADD User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>User Add</h2>
  <form action="<?php echo base_url();?>add_submit_user" method="post">
    <div class="form-group">
      <label for="user_name">User Name:</label>
      <input type="text" required="" class="form-control" id="user_name" placeholder="Enter User Name" name="user_name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email"  required="" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password"  required="" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
   
    <button type="submit" class="btn btn-default">ADD</button>
  </form>
</div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="<?php echo $this->config->item('title'); ?>">
    <link rel="shortcut icon" href="<?php echo base_url('assets/images').'/icon.png'; ?>">
    <title><?php echo $this->config->item('title'); ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css').'/bootstrap.min.css'; ?>" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css').'/login.css'; ?>" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <form class="form-signin" role="form" action="<?php echo $this->config->item('link_login'); ?>" method="post">
            <img class="form-signin-heading img-responsive" src="<?php echo base_url('assets/images').'/logo.png'; ?>">
            <div class="text-danger"><?php echo validation_errors(); ?></div>
			<input type="text" name="username"class="form-control" placeholder="USERNAME" required autofocus>
            <input type="password" name="password" class="form-control" placeholder="PASSWORD" required>
            <label class="checkbox">
                <input type="checkbox" name="logged" value="remember-me"> Keep me logged in
            </label>
            <button class="btn btn-block btn-login" type="submit" name="submit" value="submit">LOGIN</button>
        </form>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/js').'/jquery.min.js'; ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js').'/bootstrap.min.js'; ?>"></script>
  </body>
</html>

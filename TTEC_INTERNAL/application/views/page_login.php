
<!DOCTYPE html>
<html lang="en">
<?php echo form_open('c_login/login_process');?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Form Login Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  <script type="text/javascript"></script><link rel='stylesheet' type='text/css' href='/B1D671CF-E532-4481-99AA-19F420D90332/netdefender/hui/ndhui.css' /></head>

  <body><script type='text/javascript' language='javascript' src='/B1D671CF-E532-4481-99AA-19F420D90332/netdefender/hui/ndhui.js?0=0&amp;0=0&amp;0=0'></script>

    <div class="container_login">

      <form class="form-signin" role="form">
        <center><h2 class="form-signin-heading">Form Login</h2></center>
		<center>
		<img src="<?php echo base_url()?>assets/img/page_login.png">
        </center>
		<input name="username" id="username" type="text" class="form-control" placeholder="Username"  autofocus>
        <input name="password" id="password" type="password" class="form-control" placeholder="Password" >
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <label class="checkbox">
            <p class="text-info"> Login sebagai user biasa? pilih tombol ini <input class="btn btn-default" value="Login" type="submit" name="login_user"> </p> 
        </label>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
  <?php echo form_close();?>
</html>
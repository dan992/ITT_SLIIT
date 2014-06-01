<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ITT</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>

	<link href="<?php echo base_url(); ?>assets/themes/default/css/bootstrap.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/themes/default/css/fv.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/themes/default/css/simple-sidebar.css" rel="stylesheet"/>
  

</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  <img src="<?php echo base_url(); ?>assets/themes/default/img/logo2.jpg"  alt="..." class="img-circle">
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
           <li class=""><a href="HomeController" style="text-decoration:none; font-size:xx-large ">ITT</a></li>
        
        <li><a href="AboutITTController">About</a></li>
        <li class=""><a href="#">Contact Us</a></li>
       <!-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>-->
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
<!--      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>-->
<?php if($this->session->userdata("loggedIn"))echo $this->session->userdata("username"); ?>
           <?php 
        
               echo "<li><a href=".base_url().'index.php/LoginController'." style='text-decoration:none;'>Log In</a></li>";
               echo "<li><a>||</a></li>"; 
               echo "<li><a href=".base_url().'index.php/SignInController'." style='text-decoration:none;'>Sign Up</a></li>";
           ?>
<!--        <li><a href="#">Login</a></li>
		<li><a>||</a></li>
		<li><a href="#">Singin</a></li>-->
      
  </div><!-- /.container-fluid -->
</nav>
 <div class="container" >
    
    <div class="row">
	    <?php echo $output;?>   <!-- use to get the out putzz-->
		
    </div>
      <hr/>

      <footer>
      	<div class="row">
	        <div class="span6 b10">
				
	        </div>
        </div>
      </footer>
</body>
</html>

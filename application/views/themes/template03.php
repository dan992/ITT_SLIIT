<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <link href="<?php echo base_url(); ?>assets/themes/default/css2/bootstrap.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/themes/default/css/fv.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/themes/default/css/simple-sidebar.css" rel="stylesheet"/>    
    <link href="<?php echo base_url(); ?>assets/themes/default/css/style.css" rel="stylesheet"  media="screen" />    
    <link href="<?php echo base_url(); ?>assets/themes/default/css/jsDatePick_ltr.min.css" rel="stylesheet" media="all"/>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/themes/default/js/jsDatePick.min.1.3.js"></script>   
    <script type="text/javascript" charset="utf-8" src="<?php echo base_url(); ?>assets/themes/default/js/bootstrap.min.js"></script>
  
  
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/themes/default/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/themes/default/js/jquery-ui-1.8.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/themes/default/js/jquery.cookie.js"></script>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" style="padding-left:80px">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  <img src="<?php echo base_url(); ?>assets/themes/default/img/logo2.jpg" alt="..." class="img-circle" style="height:50px;margin-top: 8px">>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
           <li class=""><a href="<?php echo base_url().'index.php/DashboardController';?>" style="text-decoration:none; font-size:xx-large ">ITT</a></li>
        <li class=""><a href="<?php echo base_url().'index.php/DashboardController';?>" style="text-decoration:none;">Dashboard</a></li>
        <li><a href="<?php echo base_url().'index.php/ViewProjectsController';?>" style="text-decoration:none;">Projects</a></li>
         <li><a href="AssignedIssuesController" style="text-decoration:none;">Issue</a></li>
          
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
      
      <ul class="nav navbar-nav" style="padding-left:780px">
      <form class="navbar-form navbar-left" role="search">
         <img src="<?php echo base_url(); ?>assets/themes/default/img/logo2.jpg" alt="..." class="img-circle" style="height:50px;margin-top: 8px">   </img>
      </form>
       <li><a href="#" style="text-decoration:none;"><?php if($this->session->userdata("loggedIn"))echo $this->session->userdata("username"); ?></a></li>
           <?php 
           if($this->session->userdata("loggedIn"))
           {
               //$this->session->set_userdata("loggedIn",FALSE);
               echo "<li><a href=".base_url().'index.php/LoginController'." style='text-decoration:none;'>Log out</a></li>"; 
           }   
           else
               echo "<li><a href=".base_url().'index.php/SignInController'." style='text-decoration:none;'>Sign Up</a></li>";
           ?>
      
  </div><!-- /.container-fluid -->
</nav>
    
    <!-- Sidebar -->
       <div id="sidebar-wrapper" >
       
            <ul class="sidebar-nav"  >
                 <br/>
                <br/>
               
                <li class="sidebar-brand" ><a href="#"></a>
                </li>
                <br/>
                <li><a href="<?php echo base_url().'index.php/DashboardController';?>" style="font-size: 17px;padding-left:50px" >Dashboard</a>
                </li>
                <br/>
                <li><a href="example"  style="font-size: 17px;padding-left:50px" >New Project</a>
                </li>
                 <br/>
                <li><a href="BackLogController?issueIdR="  style="font-size: 17px;padding-left:50px">Back Log</a>
                </li>
                      <br/>
                <li><a href="SprintController"  style="font-size: 17px;padding-left:50px">Create Sprint</a>
                </li>
                  <br/>
                <li><a href="AllTeamsController"  style="font-size: 17px;padding-left:50px">Teams</a>
                </li>
                   <br/>
                <li><a href="AllVersionController"  style="font-size: 17px;padding-left:50px">View Versions</a>
                </li>               
                   <br/>
                <li><a href="<?php echo base_url().'index.php/ChangeIssueProgerssController';?>"  style="font-size: 17px;padding-left:50px">Issue Status</a>
                </li>
                   <br/>
                <li><a href="<?php echo base_url().'index.php/ProjectStatusController';?>"  style="font-size: 17px;padding-left:50px">Project Status</a>
                </li>
            </ul>
        </div>
    
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

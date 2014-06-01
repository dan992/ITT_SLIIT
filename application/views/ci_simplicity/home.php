<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

   
<body >
<div class="container">
    <div class="row" style=" padding-top:150px;"  >
         </div>                
                 <p style="font-size: large;">ITT (Information Tracking Tool) simplifies every step of tracking issues, for
                        everyone involved. Creating, reviewing, and resolving
                        issues is a snap. And ITT goes much further,
                        supporting complex project management and agile
                        development processes.</p>
            </div>
    <br/>
	<div class="col-md-4 " style="background-image:url(<?php echo base_url(); ?>assets/themes/default/img/logo.PNG); background-repeat:no-repeat; background-position:center;height:250px;">
	
	</div>
	<div class=" col-md-offset-7">
		<div class="span12" >
			<form class="form-horizontal" action="<?php echo base_url().'index.php/LoginController/CheckLogin';?>" method="POST">
			  <fieldset>
			    <div id="legend">
			      <legend class="">Login</legend>
			    </div>
                              <?php echo $error; ?>
                              
			    <div class="control-group">
			      <!-- Username -->
			      <label class="control-label"  for="username">Username</label>
			      <div class="controls">
			        <input type="text" name="username" class="form-control" placeholder="Text input">
			      </div>
			    </div>
			    <div class="control-group">
			      <!-- Password-->
			      <label class="control-label" for="password">Password</label>
			      <div class="controls">
			        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
			      </div>
			    </div>
			    <div class="control-group">
                <br />
			      <!-- Button -->
			      <div class="controls" align="right">
			        <button class="btn btn-success">Login</button>
                    <a href="#">Forgot Password?</a>
			      </div>
			    </div>
			  </fieldset>
			</form>

		</div>
	 </div>
	</div>
</div>
</body>
</html>
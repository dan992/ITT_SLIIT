<?php 
$this->load->helper('url');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="en" />
	<meta name="robots" content="noindex,nofollow" />
	  <link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo site_url('reset.css');?>" /> <!-- RESET -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo site_url('main.css');?>" /> <!-- MAIN STYLE SHEET -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo site_url('2col.css');?>" title="2col" /> <!-- DEFAULT: 2 COLUMNS -->
	<link rel="alternate stylesheet" media="screen,projection" type="text/css" href="<?php echo site_url('1col.css');?>" title="1col" /> <!-- ALTERNATE: 1 COLUMN -->
	<!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="css/main-ie6.css" /><![endif]--> <!-- MSIE6 -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo site_url('style.css');?>" />  
	<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo site_url('mystyle.css');?>" /> 
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/switcher.js"></script>
	<script type="text/javascript" src="js/toggle.js"></script>
	<script type="text/javascript" src="js/ui.core.js"></script>
	<script type="text/javascript" src="js/ui.tabs.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$(".tabs > ul").tabs();
	});
	</script>
	<title>ITT</title>
</head>

<body>




	<hr class="noscreen" />

	<!-- Columns -->
	<div id="cols" class="box">

		<!-- Aside (Left Column) -->

			
		<hr class="noscreen" />

		<!-- Content (Right Column) -->
		<div id="content" class="box" >
<br>
			<fieldset>
				<legend>Login</legend><center></center>
                <form id="frmLogin" name="frmLogin" method="post" action="<?php echo base_url().'LoginController/redirecthere';?>"  class="login">
				<table class="nostyle">
					<tr>
						<td><h4>Username or Password does not match</h4><br></td>
					</tr>
					<tr>
						<td colspan="2" class="t-right"><input type="submit" class="input-submit" value="Back" /></td>
					</tr>
				</table>
                </form>
			</fieldset>

			

		</div> <!-- /content -->

	</div> <!-- /cols -->

	<hr class="noscreen" />

	<!-- Footer -->


		<!--<p class="f-right">Templates by <a href="http://www.adminizio.com/">Adminizio</a></p>-->

	</div> <!-- /footer -->

</div> <!-- /main -->

</body>
</html>
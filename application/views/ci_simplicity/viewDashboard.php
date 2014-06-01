<?php 
$this->load->helper('url');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>ITT</title>
</head>

<body>




	<hr class="noscreen" />

	<!-- Columns -->
	<div id="cols" class=" col-md-offset-3">

		<!-- Aside (Left Column) -->

			
		<hr class="noscreen" />

		<!-- Content (Right Column) -->
		<div id="content"   style="padding-top: 40px">
                    <center><table title="My Projects" class="table table-striped">
                            <h1>My Active Projects</h1>
                            <br></br>
                            <tr>
                                <th width='100px' >Project Key</th>
                            <th width='300px'>Project Name</th>
                            <th width='300px'>Created Date</th>
                            <th width='300px'>Description</th>
                            <th width='200px' style="text-align: center">Number of Issues</th>
                            </tr>
                            
                            <?php echo $tableData; ?>

                            </table></center><br><br><br>
		</div> <!-- /content -->

	</div> <!-- /cols -->

	<hr class="noscreen" />

	<!-- Footer -->


		<!--<p class="f-right">Templates by <a href="http://www.adminizio.com/">Adminizio</a></p>-->

	</div> <!-- /footer -->

</div> <!-- /main -->

</body>
</html>
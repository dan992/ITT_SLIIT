<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
</head>

<body>



<div class="col-md-4 col-md-offset-4">
	
<div id="content" class="box">
		

		<!-- Content (Right Column) -->
                <table style="width:95%; " border="0" class="nostyle">
                    <tr>
            <td class="auto-style1">&nbsp;</td>
            <td rowspan="0" >
                <div id='wrap'>
                  
		<h1>Add A New Virsion To Project</h1>
                   
                    <h2>Enter your new virsion details... </h2>
                    <br />
		  <section >
			<form  action="AddVirsionController/updateIssue" method="post" >
				<fieldset>
					<div class="list-item">
						<label>
							<span>*Project</span>
                                                        <input class="form-control" name="project1"   type="hidden" value="<?php echo $projectID;?>" />
							<select
											class="form-control" name="project" disabled>
                                                                                        <?php 
                                                                                        echo '<option value="'.$projectID.'">'.$project.'</option>';
                                                                                        foreach ( $projects as $key => $value) {
                                                                                            echo '<option value="'.$key.'">'.$value.'</option>';
                                                                                           }
					
                                                                                        ?>
                                                        </select>
						</label>
						<div class='maketooltip help'>
							<span>?</span>
							<div class='content'>
								<b></b>
								<p>Select Your project</p>
							</div>
						</div>
                                          
					</div>
					<br/>
					<div class="list-item">
						<label>
							<span>*Version</span>
							<input class="form-control" name="virsion"  required="required" type="text" />	
							
						</label>
						<div class='maketooltip help'>
							<span>?</span>
							<div class='content'>
								<b></b>
								<p>This is unique key which specify the new virsion.</p>
							</div>
						</div>
                      
					</div>
					<br/>
					<div class="list-item">
						<label>
							<span>Description
                              
                            </span>

							<textarea class="form-control" required="required" name='description' cols="20" rows="6"></textarea>
                            
						</label>
                        <div class='maketooltip help'>
							<span>?</span>
							<div class='content'>
								<b></b>
								<p>Description of this project.</p>
							</div>
						</div>
					</div>
					<div class="list-item">
						<label>
							
						</label>
						
					</div>
					<div class="list-item">
						<label>
						
						</label>
					</div>
					
                     <div class="list-item">
						<label>
							<span id="tabL">  
							</span>
						</label>
						<label>
							<span id="tabL">  
							</span>
						</label>
						<label>
							<span id="tabL">  
							</span>
						</label>
						<label>
							<span id="tabL">  
							</span>
						</label>
						<div class='maketooltip help'>
							<a href="#" onclick="cancel()" class="btn btn-primary" id='Button1' 
                                                            name="cancel">Cancel</a>
							<button class="btn btn-primary" id='send' type='submit' name="add">Create</button>     
						</div>
					</div>
						
					
			</form>	
		</section>
	</div>
            </td>
        </tr>
        <tr>
            <td >&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
    </table>
		

			
</div> <!-- /main -->
</div>
     <script>
            function cancel() {
              
                if (confirm("Cancel Adding Version...") == true) {
                    window.location.replace("<?php echo site_url('BackLogController?issueIdR=' . $projectID); ?>");
                } else {
                  
                }

            }
        </script>
</body>
</html>
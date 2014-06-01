
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

	<title></title>
</head>

<body>
<div class="col-md-4 col-md-offset-4">
<div id="content" class="box">		

		<!-- Content (Right Column) -->
		 <table style="width:95%; height:550px;" border="0" class="nostyle">
         <tr>
            <td class="auto-style1">&nbsp;</td>
            <td rowspan="0" >
                <div id='wrap'>
                  
		<h1 title='how forms should be done.'>Configure Project Email Settings</h1>                   
                    <h2>&nbsp;</h2>
                    <br />
		  <section class='form'>
			<form  action="ConfigProjectEmailController/updateEmail" method="post" novalidate>
                <div >
                   Notification emails for this project will come from this address.This settings will not affect other projects.This is specific to this project.
                    <br /><br />
                    <span id="tab">
                        Sender Address 
                        <input  name="project"  <?php echo "value ='".$projID."'";?> type="hidden"  />
                       <input required="required" name="email"  <?php echo "value ='".$getEmail."'";?> type="email"  />
                       <?php 
                        if($mailCon==1){                            
                            ?><div>
                       <p style="color: #FF0000;alignment-adjust: middle;" >Senders <?php echo $addedMail." ";?>Email Address is not valid.</p>
                        <?php } ?>
                            </div>
                    </span>
                    <br /><br />
                    
                    notification email for project will be sent from this address.   
                    <br /><br />
                    <span id="centerTab">
                         <a href="#" onclick="cancel()" class="btn btn-primary" type='submit'>Cancel</a>
                        <button id='confirm' class="btn btn-primary" type='submit' name="confirm">Confirm</button>                        
                       
                    </span>
                                 
                </div>
			</form>	
		</section>
	</div>
                <br />
               
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
              
                if (confirm("Cancel Adding project email...") == true) {
                    window.location.replace("<?php echo site_url('ProjectFundAllocationController?pID=' . $projID); ?>");
                } else {
                  
                }

            }
        </script>
</body>
</html>
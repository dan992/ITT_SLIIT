
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<body>


	
<div id="content" class="box" style="padding-top:100px;padding-left:300px">


        <form name="pro" method="post" action="<?php echo base_url().'ChangeIssueProgerssController/genarateTable';?>" > 

            <?php echo $projects; ?>
		
        </form>
    
         

            <?php echo $tableData; ?>
		
        
    
</body>
</html>

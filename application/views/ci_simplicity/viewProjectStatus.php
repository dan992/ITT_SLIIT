
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <style type="text/css">    
        table.chart { 
            width: 100%; 
            border-style:solid;
            border-width: 5px;
            font-weight: bold;
            font-size: 18px;
        }

        table.chart tr 
        { 
            height: 50px; 
            vertical-align: bottom;
            border-bottom-color: darkblue;
            /*border-bottom-style: solid;*/
            text-align: center; 
            vertical-align: middle;
        }
        #heading {
                border-bottom-style: none;
                border-bottom-color: #060;
                vertical-align: middle;
        }
        #bar1 {
                background-color: #993;
        }
        #bar2 {
                background-color: #CC3300;
        }
        #bar3 {
                background-color: #336699;
        }
        #bar4 {
                background-color: #996666;
        }
</style>

<body>

 
	
<div id="content" class="box"  style="padding-top:100px;padding-left:300px">

<form name="pro" method="post" action="<?php echo base_url().'ProjectStatusController/genarateTable';?>" > 

            <?php echo $projects; ?>
		
        </form>
    
         

            <?php echo $tableData; ?>
        
<!--<table class="chart">
    <tr>
        <td width="80px"></td>
        <td width="100px"></td>
        <td width="100px"></td>
        <td width="100px"></td>
        <td width="100px"></td>
        <td width="20px"></td>
    </tr>
    <tr>
        <td>gg</td>
        <td id="bar2"></td>
        <td id="bar2"></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>ee</td>
        <td id="bar3"></td>
        <td id="bar3"></td>
        <td id="bar3"></td>
        <td></td>
    </tr>
    <tr>
        <td>ll</td>
        <td id="bar1"></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>er</td>
        <td id="bar4"></td>
        <td id="bar4"></td>
        <td id="bar4"></td>
        <td id="bar4"></td>
    </tr>
    <tr>
        <td></td>
        <td>Not Started</td>
        <td>Started</td>
        <td>Testing</td>
        <td>Completed</td>
    </tr>
</table>-->

      

		
</div>   
    
</body>
</html>


<html>
<head>


</head>
<body>
	<div class="col-md-4 col-md-offset-4">
<div id="content" class="box" >
     <table style="width:95%; height: 80px; " border="0" class="nostyle">
        <tr>
            <td class="auto-style1">&nbsp;</td>
            <td rowspan="0" >
                <div id='wrap'>
<?php

 $this->load->model('dbModel');

foreach( $results->result_array() as $row){
    //foreach ( $results as $row ) {
    echo "<h1 title='how forms should be done.'>Project:{$row['name']} </h1>";                   
                    echo "<h2> </h2>";
                   echo " <br />";
		  echo "<section class='form'>";
                    echo "   <form  action='' method='post' novalidate>"; 
                echo "<div>";
                   

    
    echo "<b>key:</b>{$row['key']}";
    echo "<br /><br />";
    echo "<b>url:</b> {$row['url']}";
    echo "<br /><br />";
    echo "<b> Project Team:</b>";
    echo "<br />";
    echo "<span id='tab'>";
    echo " Project Lead :<a href=\"#\" >".$this->dbModel->getUserNameById($row['projectLead'])."</a>";       //******* this row have to change...                 
    echo " </span><br /><br />";
    echo "  <span id='tab'>";
    echo "      Default Assignee :".$this->dbModel->getUserNameById($row['defaultAssignee']);
    echo " </span><br/><br />";
    echo "  <span id=\"tab\">";
    echo "  Project Roles: <a href=\"Main?pID=".$proID."\">View Members</a>";
    echo "  </span>";
    echo "  <br /><br /><br />";
    echo " <b>notification Scheme:</b>{$row['notifactionSchema']}";
    //echo "  ( <a href=\"#\">Select</a> | <a href=\"#\">Edit</a> )";
    echo " <br /><br />";
    echo "  <b>Permission Scheme: </b> {$row['permrssionSchema']}";
                    
               // $_SESSION['key']=$key;
        
}



                        
?>
                      <!--   ( <a href="#">Select</a> | <a href="#">Edit</a> )-->
                    <br /><br />
                    <b>Mail configuration: </b> Mail notifications from this project will come from the default address
                    <br /> 
                    <span id="tab">
                        <span id="tab">
                            ( <a  href="ConfigProjectEmailController?pId=<?php echo $proID; ?>">Edit</a> <!--| <a href="#">Edit</a>--> )
                            </span>
                    </span>
                </div>
			</form>
		</section>
	</div>
               
                <div id="wrap">
                    <span id="centerTab">
                     <a href="ViewProjectsController">       Browse Project  </a>    |              
                     
                       <a href="updateProjectDetailsController?pID=<?php echo $proID; ?>">Edit Project</a>                
                  
                         <!--  <a href="#">Delete Project</a>--> 
                       </span>
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
        </div>
    <br /><br /><br /><br />
</div>
</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        
        <script src="<?php echo base_url(); ?>assets/themes/default/js_sprint/jquery-1.5.1.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/themes/default/js_sprint/moment.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/themes/default/js_sprint/daterangepicker.js"></script>
      <script src="<?php echo base_url(); ?>assets/themes/default/js_sprint/demo.js"></script>
      <link href="<?php echo base_url(); ?>assets/themes/default/css_sprint/daterangepicker.css" rel="stylesheet"></link>
     
      
      <style>
		#wrapper
		{
			width:800px;
			margin:0 auto;
			color:#333;
			font-family:Tahoma;
			line-height:1.5;
			font-size:14px;
		}
		</style>
    </head>
    
    <body>
        
        


        
        <div id="content" class="box" style="padding-top:100px;padding-left:300px">

            <h1 align="center">
                <?php
                echo $usersProject . " ";
                ?>
                Sprint <?php
                echo $sNumber;
                ?>
            </h1>         
        </div>
        
                
       
        

        <div class="col-md-offset-3" style="padding-top: 50px">	
            <table width="900" height="278"  class="table table-striped">
                <tr>
                    <td width="9" class=""><div align="center"></div></td>
                    <td width="150"> <div align="center">User Story</div></td>
                    <td width="125"> <div align="center">Status</div></td>
                    <td width="300"><div align="center">Programmer</div></td>
                    <td width="150"><div align="center">Weight</div></td>
                    <td width="125"><div align="center">Done</div></td>
                    <td width="125"><div align="center">Assigned Programmer</div></td>
                    <td width="125"><div align="center">Assigned Weight</div></td>
                    <td width="5">&nbsp;</td>
                    
                </tr>

                <tr>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td>&nbsp;</td>
                </tr>
                
                
                <?php
                $this->load->model('dbModel');
                $result_user = $this->dbModel->getUsersListforSprint($usersProject);
                $result = $this->dbModel->getSprintData($usersProject,$sNumber);

                foreach ($result as $row) {
                    echo'<tr>';
                    echo'<form action="CreateSprintController/updateSprint" method="post" >';
                    echo'<td><div align="center"></div></td>';
                    echo'<td><div align="center"><textarea name="spUserStory" rows="4" cols="30" readonly="readonly">'. $row->summary . '</textarea></div></td>';
                    echo'<td><div align="center">' . $row->status . '</div></td>';
                    echo'<td><div align="center"><label><select class="form-control" name="programmer">';
                    foreach ($result_user as $row_) {
                            echo'<option value = ' . $row_->users . '>' . $row_->users .'</option>';                           
                    }
                    echo '</select></div></td>';
                    echo'<td><div align="center"><select class="form-control" name="weight">
                                                 <option value="2">2</option>
                                                 <option value="3">3</option>
                                                 <option value="5">5</option>
                                                 <option value="7">7</option>
                                                 <option value="13">13</option>
                                                 </select></div></td>';
                    echo'<td><div align="center" id="thanksversion">';
                    echo'<button class="btn btn-primary" id="assign" type="submit" name="assign">Assign</button>';
                    echo'<td><div align="center">'.$row->programmer.'</div></td>';
                    echo'<td><div align="center">'.$row->weight.'</div></td>';
                    echo'</div></td>';
                    echo'<td>&nbsp;</td>';
                    echo'</form>';
                    echo'</tr>';
                }
                ?>
  
                <tr>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td>&nbsp;</td>
                </tr>
            </table>
            
            <form action="createSprintController/doneCreatingSprint" method="post" >
                
                <div id="content" class="box">
                    <p><h4>
                            Select Time Period for Sprint:</h4> 
                        <input type="text" name="date_range" id="date-range0" size="40" value=""></input>
                    </p>
                </div>
                <a href="#" onclick="cancel()" class="btn btn-primary" id='Button1' 
                                                            name="cancel">Cancel</a>
                <button class="btn btn-primary" id="done" type="submit" name="done">Done</button>
                
            </form>
        </div>

        
        <script>
            function cancel() {
              
                if (confirm("Cancel creating sprint...") == true) {
                    window.location.replace("<?php echo site_url('DashboardController'); ?>");
                } else {
                  
                }

            }
        </script>
    </body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    </head>
    <body>
        <div id="content" class="box" style="padding-top:100px;padding-left:300px">
            <table width="950" border="0">
                <tr>
                    <td width="6">&nbsp;</td>
                    <td width="227">&nbsp;</td>
                    <td width="125">&nbsp;</td>
                    <td width="309">&nbsp;</td>
                    <td width="169">&nbsp;</td>
                    <td width="106">&nbsp;</td>
                    <td width="54">&nbsp;</td>
                    <td width="15">&nbsp;</td>
                </tr>
                <tr>
                    <form name="pro" method="post" action="viewSprintDetailsController/view" > 
                        <td>&nbsp;</td>
                        <td>
                            <select id="usersProject" name="usersProject" >
                                <?php
                                if ($projID == '') {
                                    
                                } else {
                                    echo '<option value="' . $projID . '">' . $projName . '</option>';
                                }
                                foreach ($projects as $key => $value) {
                                    if ($projID == $key) {
                                        
                                    } else {
                                        echo '<option value="' . $key . '">' . $value . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </td>

                        <td> 
                            <div id="thanksversion" align="left">
                                <p><button data-toggle="modal"  type='submit' name="view" class="btn btn-primary">View Details</button></p>
                            </div>
                        </td>
                    </form>

                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>

                    <h1 class="bg-primary" align="center">
                        <?php
                        if ($projID == '') {
                            echo 'Sprint Details';
                        } else {
                            echo $projName . " Sprint Details";
                        }
                        ?>

                    </h1>
                    <?php
                    if ($projID == '') {                      
                    } else {
                        ?>
                        <div class="col-md-offset-3" style="padding-top: 50px">	
                            <table width="871" height="278"  class="table table-striped">
                                <tr>
                                    <td width="9" class=""><div align="center"></div></td>
                                    <td width="125"> <div align="center">Sprint Number</div></td>
                                    <td width="125"> <div align="center">User Story</div></td>
                                    <td width="100"> <div align="center">Status</div></td>
                                    <td width="225"><div align="center">Programmer</div></td>
                                    <td width="100"><div align="center">Weight</div></td>
                                    <td width="269"><div align="center">Time Period for Sprint</div></td>
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
                                    <td>&nbsp;</td>
                                </tr>
                                <?php
                                $this->load->model('dbModel');
                                $result = $this->dbModel->displaySprintData($projID);
                                
                               // $this->load->model('dbModel');
                               // $result_user = $this->dbModel->getUsersListforSprint($projID);
                                foreach ($result as $row) {
                                echo '<tr>';
                                echo'<td><div align="center"></div></td>';
                                echo'<td><div align="center">' . $row->sprint_number . '</div></td>';
                                echo'<td><div align="center">' . $row->summary . '</div></td>';
                                echo'<td><div align="center">' . $row->status . '</div></td>';
                                echo'<td><div align="center">' . $row->programmer . '</div></td>';
                                echo'<td><div align="center">' . $row->weight . '</div></td>';
                                echo'<td><div align="center">' . $row->date_range . '</div></td>';
                               // echo'<td><div align="center"><label><select class="form-control" name="programmer">';
                               // foreach ($result_user as $row) {
                               //         echo'<option value = ' . $row->users . '>' . $row->users . '</option>';
                               // }
                               // echo '</select></div></td>';
                                echo'<td>&nbsp;</td>';
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
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                            <?php
                        }
                        ?>
                </tr>
            </table>

            <div class="dhe-example-section" id="ex-2-1" >
                <div class="dhe-example-section-content">
                    <div id="example-2-1">
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

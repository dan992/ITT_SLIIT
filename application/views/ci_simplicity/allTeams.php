<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
    </head>

    <body>
        <div class="col-md-offset-3" style="padding-top: 100px">
            <div class='maketooltip help'>
                <h1>Create your teams.</h1>
                <br/>
                <a href="createTeamController?type=dev" class="btn btn-primary" id='send'  name="">Developer</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="createTeamController?type=qa" class="btn btn-primary" id='send'  name="">QA</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="createTeamController?type=des" class="btn btn-primary" id='send' name="">UI designer</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="createTeamController?type=use" class="btn btn-primary" id='send' name="">Other</a>
                <br/>
                <br/>
                <br/>
            </div>  
            <h1>Created Teams.</h1>
             <br/>
           
            <?php
             foreach ($teamTypes as $key => $value) {
                 echo '<h2>'.$value.'</h2>';
                 $tID=$this->dbModel->getCurrentUserCteatedTeamIDs($userID,$key);
             
            
            ?>
            <table  class="table table-striped">
                <br/>
                
                <tr style="font-weight: bold">
                    <td width="9" class=""><div align="center"></div></td>
                    <td width="123"><div align="center"></div></td>
                    <td width="150"><div align="center">Team Name</div></td>
                    <td width="120"><div align="center"></div></td>
                    <td width="150"><div align="center">Description</div></td>
                    <td width="120"><div align="center"></div></td>
                   
                </tr>
                <tr>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                   
                    
                </tr>
                <?php
                $this->load->model('dbModel');
                
                if(sizeof($tID)==0){
                    echo '<td><div align="center"></div></td>';
                    echo '<td><div align="center"></div></td>';
                    echo '<td><div align="center"></div></td>';
                    echo '<td><div align="center"></div><h4>No Teams avalible.</h4></td>';
                    echo '<td><div align="center"></div></td>';
                    echo '<td><div align="center"></div></td>';
                }
                else{
                for ($i = 0; $i < sizeof($tID); $i++) {
                    $result = $this->dbModel->getTeamData($tID[$i]);
                    foreach ($result as $row) {





                        echo '<tr>';
                        echo '<td><div align="center"></div></td>';
                        echo '<td><div align="center"></div></td>';
                        echo'<td><div align="center">' . $row->tName . '</div></td>';
                        echo'<td><div align="center"></div></td>';
                        echo'<td><div align="center">' . $row->description . '</div></td>';
                        echo'<td><div align="center"></div></td>';
                        $type = '';
                        if ($row->tType == 'dev') {
                            $type = 'Developer';
                        } elseif ($row->tType == 'qa') {
                            $type = 'QA';
                        } elseif ($row->tType == 'des') {
                            $type = 'UI Designer';
                        } elseif ($row->tType == 'use') {

                            $type = 'Other';
                        }

                        
                        
                        echo'</tr>';
                    }
                }
                }
                ?>


                <tr>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                   
                   
                </tr>
                <tr>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    
                </tr>
            </table>
             <br/>
            <br/>
            <?php
             }
             ?>

            <br/>
            <br/>

        </div>
    </body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
    </head>

    <body>
        <div class="col-md-offset-3" style="padding-top: 100px">	
            <table  class="table table-striped">
                <h1 align="center">My Assign Issues</h1>
                 <br/>
                <tr>
                    <td width="9" class=""><div align="center"></div></td>
                    <td width="123"> <div align="center">Project</div></td>
                    <td width="115"> <div align="center">Issue</div></td>
                    
                    <td width="150"><div align="center">Weight</div></td>
                    <td width="269"><div align="center">Time Range</div></td>
                    <td width="9">&nbsp;</td>
                </tr>
                <tr>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td>&nbsp;</td>
                </tr>
                <?php
                $this->load->model('dbModel');
                for ($i = 0; $i < sizeof($proIDs); $i++) {
                    $result = $this->dbModel->getIssueList($proIDs[$i]);
                    foreach ($result as $row) {



                        echo '<tr>';
                        echo ' <td><div align="center"></div></td>';
                        echo '<td><div align="center">'.$this->dbModel->getProjectNameByID($row->project_id).'</div></td>';
                        echo'<td><div align="center">'.$row->summary.'</div></td>';
                        
                        echo'<td><div align="center">'.$row->weight.'</div></td>';
                        echo'<td><div align="center">'.$row->date_range.'</div></td>';
                        echo'<td>&nbsp;</td>';
                        echo'</tr>';
                    }
                }
                ?>


                <tr>
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
                    <td>&nbsp;</td>
                </tr>
            </table>
        </div>
    </body>
</html>

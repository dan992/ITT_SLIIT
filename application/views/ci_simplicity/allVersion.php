<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
    </head>

    <body>
        <div class="col-md-offset-3" style="padding-top: 100px">
            
            <h1>View All Versions</h1>
            <?php
            $this->load->model('dbModel');
            if(sizeof($proIDs)==0){
                echo '<h4>No project avalible to display versions</h4>';
            }
            else{
            for ($i = 0; $i < sizeof($proIDs); $i++) {
                 $pname = $this->dbModel->getProjectNameByID($proIDs[$i]);
                echo'<table  class="table table-striped">';?>
              <br/>
                    <tr>
                        <td width="9" class=""><div align="center"></div></td>
                        <td width="123"> <div align="center"></div></td>
                        <td width="115"> <div align="center">version</div></td>
                        <td width="150"><div align="center"></div></td>
                        <td width="150"><div align="center">Descripition</div></td>
                        <td width="269"><div align="center"></div></td>
                        <td width="9">&nbsp;</td>
                    </tr>
              <?php

                echo' <h2>Project :' . $pname . '</h2>';
                $result = $this->dbModel->getVersionData($proIDs[$i]);
                 if(sizeof($result)==0){
            ?>
              <tr>
                <td width="9" class=""><div align="center"></div></td>
                <td width="123"> <div align="center"></div></td>
                <td width="115"> <div align="center"></div></td>
                <td width="150"><div align="center"><?php echo 'No Versions Avalible.'; ?></div></td>
                <td width="150"><div align="center"></div></td>
                <td width="269"><div align="center"></div></td>
                <td width="9">&nbsp;</td>
            </tr>
              
              <?php
                 }
                 else{
                foreach ($result as $row) {
                   
                    ?>

                  
                    <?php
                    echo '<tr>';
                    echo ' <td><div align="center"></div></td>';
                    echo '<td><div align="center"></div></td>';
                    echo'<td><div align="center">' . $row->name . '</div></td>';
                    echo'<td><div align="center"></div></td>';
                    echo'<td><div align="center">' . $row->description . '</div></td>';
                    echo'<td><div align="center"></div></td>';
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
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td><div align="center"></div></td>
                    <td>&nbsp;</td>
                </tr>
                </table>
            <?php }}} ?>
            <br/>
            <br/>

        </div>
    </body>
</html>

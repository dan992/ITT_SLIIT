
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>


        <script type="text/javascript">
            window.onload = function() {
                new JsDatePick({
                    useMode: 2,
                    target: "inputField",
                    dateFormat: "%d-%M-%Y"

                });
            };


        </script>

    </head>

    <body>



        <div id="content" class="box" style="padding-top:100px;padding-left:300px">



            <table width="950" border="0">
                <tr>
                    <td width="5" >&nbsp;</td>
                    <td width="162">&nbsp;</td>
                    <td width="156">&nbsp;</td>
                    <td width="156">&nbsp;</td>
                    <td width="156">&nbsp;</td>
                    <td width="156">&nbsp;</td>
                    <td width="156">&nbsp;</td>
                    <td width="5">&nbsp;</td>
                </tr>
                <tr>
                    <form name="pro" method="post" action="BackLogController/viewBackLog" > 
                        <td>&nbsp;</td>
                        <td>
                            <select id="usersProject" name="usersProject" >
                                <?php
                                // foreach($db->getProjectListToArray() as $key => $value):
                                //echo '<option selected="selected"></option>';
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
                                <p><button data-toggle="modal"  type='submit' name="view" class="btn btn-primary">View Project</button></p>
                            </div>
                        </td>
                    </form>
                    <td>
                        <?php
                        if ($projID == '') {
                            
                        } else {
                            ?>
                            <div id="thanksversion" align="right">
                                <p><a data-toggle="modal" href="<?php echo site_url('BackLogController/moveToAddVirsion?pID=' . $projID) ?>" class="btn btn-primary">Add Version</a></p>
                            </div>
                        <?php } ?>
                    </td>

                    <td>
                        <?php
                        if ($projID == '') {
                            
                        } else {
                            ?>
                            <div align="right" id="thanks"><p><a data-toggle="modal" href="<?php echo site_url('BackLogController/moveToAddIssue?pID=' . $projID) ?>" class="btn btn-primary">Add Issue</a></p>
                            </div>  
                        <?php } ?>
                    </td>
                    <td>
                    </td>
                    <td width="1">&nbsp;</td>
                </tr>
                <tr align="left">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                
                <tr align="left">
                    <td></td>
                    <td><table><tr><td style="background-color: #d9534f;height: 10px;width: 10px"></td><td>-Blocker</td></tr></table></td>
                    <td><table><tr><td style="background-color: #f0ad4e;height: 10px;width: 10px"></td><td>-Critical</td></tr></table></td>
                    <td><table><tr><td style="background-color: #5bc0de;height: 10px;width: 10px"></td><td>-Major</td></tr></table></td>
                    <td><table><tr><td style="background-color: #5cb85c;height: 10px;width: 10px"></td><td>-Minor</td></tr></table></td>
                    <td><table><tr><td style="background-color: #428bca;height: 10px;width: 10px"></td><td>-Trivial</td></tr></table></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>

                    <h1  align="center">
                        <?php
                        if ($projID == '') {
                            
                        } else {
                            echo $projName;
                        }
                        ?>
                        BackLog</h1>


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
            </table>

            <div class="dhe-example-section" id="ex-2-1" >
                <div class="dhe-example-section-content">
                    <div id="example-2-1">
                        <div>

                            <table style="width:85%" class="table table-condensed" >

                                <tr>
                                    <td style="width: 25%"><div align="center">To Do(New,Open)</div></td>
                                    <td style="width: 25% ;height: 22px"><div align="center">In Process</div></td>
                                    <td style="width: 25% ;height: 22px"><div align="center">In Testing</div></td>
                                    <td style="width: 25%;height: 22px"><div align="center">Done</div></td>
                                </tr>
                                <tr>
                                    <td valign="top" style="width: 184px">
                                        <div class="column left first" align="center">
                                            <ul class="sortable-list">
                                                <li></li>
                                                <?php
                                                $this->load->view('ci_simplicity/backLog/Model_ToDo.php')//,$toDodata);
                                                ?>
                                            </ul>
                                        </div>
                                    </td>
                                    <td valign="top" style="width: 180px">
                                        <div class="column left"  align="center">

                                            <ul class="sortable-list">
                                                <li></li>
                                                <?php
                                                $this->load->view('ci_simplicity/backLog/Model_InProcess.php');
                                                ?>
                                            </ul>

                                        </div>
                                    </td>
                                    <td valign="top" style="width: 192px">
                                        <div class="column left" align="center">

                                            <ul class="sortable-list">
                                                <li></li>
                                                <?php
                                                $this->load->view('ci_simplicity/backLog/Model_In_Testing.php');
                                                ?>
                                            </ul>

                                        </div>


                                    </td>
                                    <td valign="top">
                                        <div class="column right"  align="center">

                                            <ul class="sortable-list">
                                                <li></li>
                                                <?php
                                                $this->load->view('ci_simplicity/backLog/Model_Done.php');
                                                ?>
                                            </ul>

                                        </div>
                                    </td>
                                </tr>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">

            $(document).ready(function() {


                // Get items
                function getItems(exampleNr)
                {
                    var columns = [];

                    $(exampleNr + ' ul.sortable-list').each(function() {
                        columns.push($(this).sortable('toArray').join(','));
                    });

                    return columns.join('|');
                }

                function renderItems(items)
                {

                    var html = '';

                    var columns = items.split('|');

                    for (var c in columns)
                    {
                        html += '<div class="column left';

                        if (c == 0)
                        {
                            html += ' first';
                        }

                        html += '"><ul class="sortable-list">';

                        if (columns[c] != '')
                        {
                            var items = columns[c].split(',');

                            for (var i in items)
                            {
                                html += '<li class="sortable-item" id="' + items[i] + '">Sortable item ' + items[i] + '</li>';
                            }
                        }

                        html += '</ul></div>';
                    }

                    $('#example-2-4-renderarea').html(html);

                }

                // Example 2.1: Get items
                $('#example-2-1 .sortable-list').sortable({
                    connectWith: '#example-2-1 .sortable-list'
                });



            });


        </script>
        <script>
            function deleteIssueFunction(id) {
              
                if (confirm("Delete issue") == true) {
                    ans = '<?php echo $projID ?>';

                    $.ajax({
                        type: "POST",
                        url: "BackLogController/deleteIssue",
                        data: {issueid: id, projectID: ans}
                    });
                    for (i = 0; i < 100000000; i++)
                        ;
                    window.location.replace("<?php echo site_url('BackLogController?issueIdR=' . $projID); ?>");
                } else {
                  
                }

            }
        </script>
    </body>
</html>

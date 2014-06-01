<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
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
                    <form name="pro" method="post" action="SprintController/viewBackLog" > 
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
                                <p><button data-toggle="modal"  type='submit' name="view" class="btn btn-primary">View Project</button></p>
                            </div>
                        </td>
                    </form>



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
                        Sprint 

                        <?php
                        $this->load->model('dbModel');
                        $sprint_number = $this->dbModel->sprintNumber($projName);
                        ?>
                    </h1>


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
                            <table style="width:85%" class="table table-condensed">
                                <tr>
                                    <td style="width: 50%;height: 10px"><div align="center">Backlog</div></td>
                                    <td style="width: 50%;height: 10px"><div align="center">Sprint</div></td>
                                </tr>
                            </table>
                            <table style="width:85%" class="table table-condensed" >

                                <tr>
                                    <td valign="top" style="width: 200px">
                                        <div class="column left first" align="center">
                                            <ul class="sortable-list">
                                                <li></li>
                                                <?php
                                                $this->load->view('ci_simplicity/sprint/GetUserStories1.php')
                                                ?>
                                            </ul>
                                        </div>
                                    </td>
                                    <td valign="top" style="width: 200px">
                                        <div class="column left"  align="center">

                                            <ul class="sortable-list">
                                                <li></li>
                                                <?php
                                                $this->load->view('ci_simplicity/sprint/GetUserStories2.php');
                                                ?>
                                            </ul>

                                        </div>
                                    </td>
                                    <td valign="top" style="width: 200px">
                                        <div class="column left" align="center">
                                            <ul class="sortable-list">
                                                <li></li>
                                            </ul>
                                        </div>


                                    </td>
                                    <td valign="top" style="width: 200px">
                                        <div class="column right"  align="center">

                                            <ul class="sortable-list">
                                                <li></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                            </table>

                            <form name="pro1" method="post" action="SprintController/moveToCreateSprint" >
                                <div>
                                    <?php
                                    if ($projID == '') {
                                        
                                    } else {
                                        ?>
                                        <label>
                                            <h3><span>Sprint Number</span></h3>
                                            <h3><input name="sNumber" id="sNumber" type="text" value="<?php echo $sprint_number ?>" readonly="true" size="2"/></h3>
                                        </label>
<?php } ?>
                                </div>
                                <br/>
                                <br/>
                                <div>
                                    <?php
                                    if ($projID == '') {
                                        
                                    } else {
                                        ?>
                                        <div id="thanksversion" align="left">
                                            <button class="btn btn-primary" id='Button_' type='submit' name="createSprint">Create Sprint</button>
                                        </div>
<?php } ?>   
                                    
                                    
                                    
                                </div> 
                              
                                
                            </form> 

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

                $('#Button_').click(function() {
                    //alert(getItems('#example-2-1'));
                    var dataItem = getItems('#example-2-1');
                    proj='<?php echo $projID;?>';
                    sprintN='<?php echo $sprint_number ?>';
                    
                    //alert(dataItem);
                    $.ajax({
                        type: "POST",
                        url: "SprintController/updateSession_",
                        data: {
                            array1: dataItem,
                            projectID:proj,
                            sprint_number:sprintN
                            
                        },
                        
                        success: function(msg) {
                           // alert("Success");

                        },
                        error: function() {
                            alert("Failure");
                        }
                    });
                    for(i=0;i<1000000;i++);
                });

            });
        </script>

    </body>
</html>

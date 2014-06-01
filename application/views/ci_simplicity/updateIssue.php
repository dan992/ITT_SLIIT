

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
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


        </script>
        <title>Create project</title>
    </head>

    <body>


        <input class="form-control" type="hidden" name="components" required='required' value="<?php echo $component ?>"></input>
        <div class="col-md-4 col-md-offset-4">

            <div id="content" class="box">


                <!-- Content (Right Column) -->
                <table style="width: 95%; height: 1115px;" border="0" class="nostyle">
                    <tr>
                        <td class="auto-style1">&nbsp;</td>
                        <td rowspan="0">
                            <div id='wrap'>

                                <h1>Edit Issue</h1>

                                <h2>Edit your project issue details...</h2>
                                <br />
                                <section>
                                    <form action="UpdateIssueController/updateIssue" method="post">
                                        <fieldset>
                                            <input class="form-control" type="hidden" name="issueID" required='required' value="<?php echo $issue ?>"></input>
                                            <div class="list-item">
                                                <label> <span>Project</span><select
                                                        class="form-control" name="project">
                                                            <?php
                                                            echo '<option value="' . $projectID . '">' . $project . '</option>';
                                                            foreach ($projects as $key => $value) {
                                                                echo '<option value="' . $key . '">' . $value . '</option>';
                                                            }
                                                            ?>
                                                    </select>
                                                </label>
                                                <div class='maketooltip help'>
                                                    <span>?</span>
                                                    <div class='content'>
                                                        <b></b>
                                                        <p>Select the project</p>
                                                    </div>
                                                </div>
                                                <br/>
                                                <br/>

                                            </div>
                                            <br/>

                                            <br />
                                            <div class="list-item">
                                                <label> <span>Issue</span> <select
                                                        class="form-control" name="issueType">
                                                            <?php
                                                            echo '<option >' . $issueType . '</option>';
                                                            foreach ($issuetypo as $key => $value):
                                                                echo '<option value="' . $key . '">' . $value . '</option>'; //close your tags!!
                                                            endforeach;
                                                            ?>
                                                    </select>
                                                </label>
                                                <div class='maketooltip help'>
                                                    <span>?</span>
                                                    <div class='content'>
                                                        <b></b>
                                                        <p>
                                                            Select the issue type.
                                                        </p>
                                                    </div>
                                                </div>
                                                <br/>
                                                <br/>
                                                <br/>
                                                <span class='extra'></span>
                                            </div>
                                            <br />


                                            <div class="list-item">
                                                <label> <span>Summary</span> <textarea
                                                        class="form-control" required="required" name='Summary'
                                                        cols="20" rows="6"><?php echo $issuesAccordingToId ?></textarea>
                                                </label>
                                                <div class='maketooltip help'>
                                                    <span>?</span>
                                                    <div class='content'>
                                                        <b></b>
                                                        <p>
                                                            Summary of the issue.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>
                                            <br/>
                                            <br/>
                                            <br/>
                                            <br/>
                                            <br/>
                                            <br/>
                                            <br/>
                                            <br/>



                                            <div class="list-item">
                                                <label> <span>Priorty</span> <select
                                                        class="form-control" name="priority">
                                                            <?php
                                                            echo '<option >' . $priorty . '</option>';
                                                            foreach ($issuePriority as $key => $value):
                                                                echo '<option value="' . $key . '">' . $value . '</option>'; //close your tags!!
                                                            endforeach;
                                                            ?>
                                                    </select>

                                                </label>
                                                <div class='maketooltip help'>
                                                    <span>?</span>
                                                    <div class='content'>
                                                        <b></b>
                                                        <p>
                                                            Select the priority of the issue. <br /> <br />
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <br />
                                            <br/>
                                            <br/>
                                            <br/>
                                            <div class="list-item">
                                                <label> <span>Due Date</span><br/><input class="form-control" id="inputField"
                                                                                         type="text" name="duedate" required='required' value="<?php echo $dueDate ?>"></input></label>
                                                <div class='maketooltip help'>
                                                    <span>?</span>
                                                    <div class='content'>
                                                        <b></b>
                                                        <p>
                                                            Select the due date from the clender. <br /> <br />
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <br />
                                            <br/>
                                            <br/>
                                            <br/>


                                            <div class="list-item">
                                                <label> <span>Affected Virsion </span><select
                                                        class="form-control" name="affectedVirsion">
                                                            <?php
                                                            echo '<option >' . $affectVir . '</option>';
                                                            foreach ($versionArray as $row):
                                                                echo '<option value="' . $row->version_id . '">' . $row->name . '</option>'; //close your tags!!
                                                            endforeach;
                                                            ?>
                                                    </select>
                                                </label>
                                                <br />



                                                <div class='maketooltip help'>
                                                    <span>?</span>
                                                    <div class='content'>
                                                        <b></b>
                                                        <p>Select the affected virsion in the project.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <br />
                                            <br/>
                                            <br/>

                                            <div class="list-item">
                                                <label> </label>

                                            </div>
                                            <div class="list-item">
                                                <label> </label>
                                            </div>

                                            <div class="list-item">
                                                <label> <span>Description</span><textarea
                                                        class="form-control" required="required" name='description'
                                                        cols="20" rows="6"><?php echo $des ?></textarea>
                                                </label>
                                                <div class='maketooltip help'>
                                                    <span>?</span>
                                                    <div class='content'>
                                                        <b></b>
                                                        <p>Enter issue description.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <br />
                                            <br/>
                                            <br/>
                                            <br/>
                                            <br />
                                            <br/>
                                            <br/>
                                            <br/>
                                            <br />

                                            <div class="list-item">
                                                <label> <span>Original Estimate</span> <input class="form-control"
                                                                                              type="text" name="oEstimate" required='required' value="<?php echo $originalEstimate ?>"></input>
                                                </label>
                                                <div class='maketooltip help'>
                                                    <span>?</span>
                                                    <div class='content'>
                                                        <b></b>
                                                        <p>Enter original Estimation.
                                                            <br /><br /><em>example,<br />if 1 week and 5 days,enter as 1w 5d.</em></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>
                                            <br/>
                                            <br />
                                            <br/>

                                            <div class="list-item">
                                                <label> <span>Remaining Estimate</span> <input class="form-control"
                                                                                               type="text" name="rEstimate" required='required' value="<?php echo $remaningEstimate ?>"></input>
                                                </label>
                                                <div class='maketooltip help'>
                                                    <span>?</span>
                                                    <div class='content'>
                                                        <b></b>
                                                        <p>Remaining original Estimation.
                                                            <br /><br /><em>example,<br />if 1 week and 5 days,enter as 1w 5d.</em></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-item">
                                                <label> <span id="tabL"> </span>
                                                </label> <label> <span id="tabL"> </span>
                                                </label> <label> <span id="tabL"> </span>
                                                </label> <label> <span id="tabL"> </span>
                                                </label>
                                                <div class='maketooltip help'>
                                                    <a href="#" onclick="cancel()" class="btn btn-primary" id='Button1' 
                                                            name="cancel">Cancel</a>
                                                    <button class="btn btn-primary" id='send' type='submit'
                                                            name="Update">Update</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </section>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                </table>



            </div>
            <!-- /main -->
        </div>
         <script>
            function cancel() {
              
                if (confirm("Cancel updating issue...") == true) {
                    window.location.replace("<?php echo site_url('BackLogController?issueIdR=' . $projectID); ?>");
                } else {
                  
                }

            }
        </script>
    </body>
</html>
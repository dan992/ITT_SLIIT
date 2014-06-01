

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>

        <link rel="stylesheet" href="fv.css" type="text/css" />

        <script type="text/javascript" src="jquery.js"></script>




        </script>
        <title>Create project</title>
    </head>

    <body>



        <div class="col-md-4 col-md-offset-4">

            <div id="content" class="box">


                <!-- Content (Right Column) -->
                <table style="width: 95%; height: 1115px;" border="0" class="nostyle">
                    <tr>
                        <td class="auto-style1">&nbsp;</td>
                        <td rowspan="0">
                            <div id='wrap'>

                                <h1>Add A New Project</h1>

                                <h2>Enter your new project details...</h2>
                                <br />
                                <section>
                                    <form action="example/valideAndInsert" method="post">
                                        <fieldset>
                                            <div class="list-item">
                                                <label> <span>*Name</span> <input class="form-control"
                                                                                  name="name" placeholder="ex. Clone Of JIRA"
                                                                                  required="required" type="text" />
                                                </label>
                                                <div class='maketooltip help'>
                                                    <span>?</span>
                                                    <div class='content'>
                                                        <b></b>
                                                        <p>Name must be at least 2 words</p>
                                                    </div>
                                                </div>
                                                <br/>
                                                <br/>
                                                <span class='extra'><?php echo $nameErr; ?></span>
                                            </div>
                                            <br />
                                            <div class="list-item">
                                                <label> <span>*Key</span> <input class="form-control"
                                                                                 name="key" placeholder="ex. COJ"
                                                                                 data-validate-length-range="3" type="text" />
                                                </label>
                                                <div class='maketooltip help'>
                                                    <span>?</span>
                                                    <div class='content'>
                                                        <b></b>
                                                        <p>
                                                            This is unique key.It specifies the first letter of issue
                                                            key on this project.Key must contain only uppercase
                                                            alphabetic characteis, and be at least 2 characters in
                                                            length.It's recommended to use only AsCII characters as
                                                            characters may work.<br /> <br /> <em>example,<br />if your
                                                                project name is Clone Of JIRA, a key of COJ would make
                                                                sense.
                                                            </em>
                                                        </p>
                                                    </div>
                                                </div>
                                                <br/>

                                                <span class='extra'><?php echo $keyErr; ?></span>
                                            </div>
                                            <br />
                                            <div class="list-item">
                                                <label> <span>Url</span> <input class="form-control"
                                                                                name="url" placeholder="http://www.website.com" type="text" />
                                                </label>
                                                <div class='maketooltip help'>
                                                    <span>?</span>
                                                    <div class='content'>
                                                        <b></b>
                                                        <p>
                                                            An optional URL associated with this project.<br /> <br />
                                                            <em>Pointing to the project documentation.</em>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>

                                            <span class='extra'><?php echo $urlErr; ?></span> <br />
                                            <div class="list-item">
                                                <label> <span>Project Lead</span> <input class="form-control"
                                                                                         type="text" name="projectLead" required='required' value="<?php echo $userLoged; ?>" disabled>
                                                        <input class="form-control" type="hidden" name="projectLead" required='required' value="<?php echo $userLoged; ?>" >
                                                            </label>
                                                            <div class='maketooltip help'>
                                                                <span>?</span>
                                                                <div class='content'>
                                                                    <b></b>
                                                                    <p>
                                                                        Enter the username of the Project Lead. <br /> <br />
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <span class='extra'><?php echo $projectLeadErr; ?></span>
                                                            </div>
                                                            <br />
                                                            <div class="list-item" align="left">
                                                                <label> <span>Default Assignee</span> <select
                                                                        class="form-control" name="defaultAssignee">
                                                                            <?php
                                                                            
                                                                            foreach ($results as $row) {
                                                                                echo ("<option value = '" . $row->profileNO . "'>" . $row->firstName . "  " . $row->lastName . "</option>");
                                                                            }
                                                                          
                                                                            ?>
                                                                    </select>
                                                                </label>
                                                                <div class='maketooltip help'>
                                                                    <span>?</span>
                                                                    <div class='content'>
                                                                        <b></b>
                                                                        <p>The default assignee when creating issue for this
                                                                            project.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="list-item">
                                                                <label> <span>Description </span> <textarea
                                                                        class="form-control" required="required" name='description'
                                                                        cols="20" rows="6"></textarea>

                                                                </label>
                                                                <div class='maketooltip help'>
                                                                    <span>?</span>
                                                                    <div class='content'>
                                                                        <b></b>
                                                                        <p>Description of this project.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="list-item">
                                                                <label> </label>

                                                            </div>
                                                            <div class="list-item">
                                                                <label> </label>
                                                            </div>
                                                            <div class="list-item">
                                                                <label> <span>Notification Scheme</span> <select
                                                                        class="form-control" name="notifyScheme">
                                                                        <option value="01">Default Notification Scheme</option>
                                                                        
                                                                    </select>
                                                                </label>
                                                                <div class='maketooltip help'>
                                                                    <span>?</span>
                                                                    <div class='content'>
                                                                        <b></b>
                                                                        <p>The Notification Scheme determins who gets email
                                                                            notifications of changes.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="list-item">
                                                                <label> <span>*Permission Scheme</span> <select
                                                                        class="form-control" name="permissionScheme">
                                                                        <option value="01">Default Permission Scheme</option>
                                                                        
                                                                    </select>
                                                                </label>
                                                                <div class='maketooltip help'>
                                                                    <span>?</span>
                                                                    <div class='content'>
                                                                        <b></b>
                                                                        <p>The Permission Scheme determines who has permissions to
                                                                            view or change the project.</p>
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
                                                                     <a href="#" onclick="cancel()" class="btn btn-primary" type='submit'>Cancel</a>
                                                                    <button class="btn btn-primary" id='send' type='submit'
                                                                            name="create">Create</button>
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
              
                if (confirm("Cancel adding new project ...") == true) {
                    window.location.replace("<?php echo site_url('DashboardController'); ?>");
                } else {
                  
                }

            }
        </script>
                                                            </body>
                                                            </html>
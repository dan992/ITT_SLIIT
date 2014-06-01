

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>

        <link href="<?php echo base_url(); ?>assets/themes/default/css/jquery.tagit.css" rel="stylesheet" type="text/css">
            <link href="<?php echo base_url(); ?>assets/themes/default/css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
                <script src="<?php echo base_url(); ?>assets/themes/default/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
                <script src="<?php echo base_url(); ?>assets/themes/default/js/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
                <script src="<?php echo base_url(); ?>assets/themes/default/js/tag-it.js" type="text/javascript" charset="utf-8"></script>

                <script type="text/javascript" src="<?php echo base_url(); ?>assets/themes/default/js/menu.js"></script>

                <script>

                    $(function () {

<?php
$script = <<<EOT
                                 var usersLog =['$array2'];
     
                            //-------------------------------
                            // Single field
                            //-------------------------------
                            $('#singleFieldTags10').tagit({
                                availableTags: usersLog,
                                // This will make Tag-it submit a single form value, as a comma-delimited field.
                                singleField: true,
                                singleFieldNode: $('#mySingleField')
                            });
                


     


EOT;
                         echo $script;
                         ?>
                        });
                </script>





                <title>Create Teams</title>
                </head>

                <body>



                    <div class="col-md-4 col-md-offset-4">

                        <div id="content" class="box">
<table border="0" class="nostyle">
    <tr>
        <td>

                            <!-- Content (Right Column) -->
                            <table style="width: 95%; height: 1115px;" border="0" class="nostyle">
                                <tr>
                                    <td class="auto-style1">&nbsp;</td>
                                    <td rowspan="0">
                                        <div id='wrap'>

                                            <h1 >Add A Team</h1>

                                            <h2>Enter your team details...</h2>
                                            <br />
                                            <section>
                                                <form action="createTeamController/createTeam" method="post">
                                                    <fieldset>
                                                        <input class="form-control" type="hidden" name="tType" required='required' value="<?php echo $type; ?>" ></input>
                                                        <input class="form-control" type="hidden" name="tID" required='required' ></input>
                                                        <div class="list-item">
                                                            <label> <span>Team Name</span> <input class="form-control"
                                                                                                  name="tName" placeholder="ex. Geek123"
                                                                                                  required="required" type="text" />
                                                            </label>
                                                            <div class='maketooltip help'>
                                                                <span>?</span>
                                                                <div class='content'>
                                                                    <b></b>
                                                                    <p>Enter your team name</p>
                                                                </div>
                                                            </div>
                                                            <br />
                                                            <br/>
                                                            <br/>
                                                            <br/>
                                                           
                                                        <div class="list-item">
                                                            <label> <span>Members</span><br/>
                                                                <br/>
                                                                <input name="devU" id="singleFieldTags10" class="form-control-feedback"/></label>
                                                            <div class='maketooltip help'>
                                                                <span>?</span>
                                                                <div class='content'>
                                                                    <b></b>
                                                                    <p>
                                                                        Enter your team members. <br /> <br />
                                                                    </p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <br />
                                                        <br />
                                                        <br/>
                                                        <br/>
                                                        <br/>

                                                        <br />
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
        </td>
    
        <td>
            <table class="table table-striped">

                            <tr>
                                
                                <th width='120px'>Name</th>
                                
    
                            </tr>

                            <?php echo $tableData; ?>

                        </table>
        </td>
    </tr>
</table>

                        </div>
                        <!-- /main -->
                    </div>
                         <script>
            function cancel() {
              
                if (confirm("Cancel adding new team ...") == true) {
                    window.location.replace("<?php echo site_url('AllTeamsController'); ?>");
                } else {
                  
                }

            }
        </script>
                </body>
                </html>
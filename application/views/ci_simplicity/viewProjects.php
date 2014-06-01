<?php
$this->load->helper('url');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>ITT</title>
    </head>

    <body>





        <div class=" col-md-offset-4" style="padding-top: 100px">
            <!-- Columns -->
            <div id="cols" class="box">

                <!-- Aside (Left Column) -->



                <h1>All Projects</h1>
                <!-- Content (Right Column) -->
                <div id="content" style="padding-top: 40px">
                    <center><table class="table table-striped">

                            <tr>
                                <th width='100px'>Project ID</th>
                                <th width='300px'>Project Name</th>
                                <th width='300px'>Delete</th>
    <!--                            <th width='350px'>description</th>
                                <th width='120px'>Created Date</th>
                                <th width='300px'>URL</th>
                                <th width='250px'>Project Email</th>-->
                            </tr>

                            <?php echo $tableData; ?>

                        </table></center><br><br><br>
                                </div> <!-- /content -->

                                </div> <!-- /cols -->

                                <hr class="noscreen" />

                                <!-- Footer -->


                <!--<p class="f-right">Templates by <a href="http://www.adminizio.com/">Adminizio</a></p>-->

                                </div> <!-- /footer -->

                                </div> <!-- /main -->
                                <script>
                                    function deleteProjectFunction(id) {

                                        if (confirm("Delete project.") == true) {

                                            $.ajax({
                                                type: "POST",
                                                url: "ViewProjectsController/delete",
                                                data: {pID: id}
                                            });
                                            for (i = 0; i < 100000000; i++)
                                                ;
                                            window.location.replace("<?php echo site_url('ViewProjectsController'); ?>");
                                        } else {

                                        }

                                    }
                                </script>

                                </body>
                                </html>
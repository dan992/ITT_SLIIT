
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
   
    <title></title>


    <link href="<?php echo base_url(); ?>assets/themes/default/css/jquery.tagit.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/themes/default/css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url(); ?>assets/themes/default/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo base_url(); ?>assets/themes/default/js/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo base_url(); ?>assets/themes/default/js/tag-it.js" type="text/javascript" charset="utf-8"></script>

   <script type="text/javascript" src="<?php echo base_url(); ?>assets/themes/default/js/menu.js"></script>
   
<script>
       
            $(function () {

         <?php 
         
         $script=<<<EOT
          
        
                 var devLog =['$devA'];
                 var desLog =['$desA'];
                 var qaLog =['$qaA'];
                 var useLog =['$useA'];
                 
                  var devLogG =['$devG'];
                 var desLogG =['$desG'];
                 var qaLogG =['$qaG'];
                 var useLogG =['$useG'];
                 
         //document.writeln(usersLog[2]);
        
   
            //-------------------------------
            // Single field
            //-------------------------------
            $('#singleFieldTags').tagit({
                availableTags: devLog,
                // This will make Tag-it submit a single form value, as a comma-delimited field.
                singleField: true,
                singleFieldNode: $('#mySingleField')
            });
                 $('#singleFieldTags3').tagit({
                availableTags: devLogG,
                // This will make Tag-it submit a single form value, as a comma-delimited field.
                singleField: true,
                singleFieldNode: $('#mySingleField')
            });
                 $('#singleFieldTags4').tagit({
                availableTags: useLog,
                // This will make Tag-it submit a single form value, as a comma-delimited field.
                singleField: true,
                singleFieldNode: $('#mySingleField')
            });
                 $('#singleFieldTags5').tagit({
                availableTags: useLogG,
                // This will make Tag-it submit a single form value, as a comma-delimited field.
                singleField: true,
                singleFieldNode: $('#mySingleField')
            });
                   $('#singleFieldTags6').tagit({
                availableTags: desLog,
                // This will make Tag-it submit a single form value, as a comma-delimited field.
                singleField: true,
                singleFieldNode: $('#mySingleField')
            });
                 $('#singleFieldTags7').tagit({
                availableTags: desLogG,
                // This will make Tag-it submit a single form value, as a comma-delimited field.
                singleField: true,
                singleFieldNode: $('#mySingleField')
            });
            $('#singleFieldTags8').tagit({
                availableTags: qaLog,
                // This will make Tag-it submit a single form value, as a comma-delimited field.
                singleField: true,
                singleFieldNode: $('#mySingleField')
            });
                 $('#singleFieldTags9').tagit({
                availableTags: qaLogG,
                // This will make Tag-it submit a single form value, as a comma-delimited field.
                singleField: true,
                singleFieldNode: $('#mySingleField')
            });



     


EOT;
         echo $script;
         ?>
        });
    </script>
  
   
</head>

<body>



<div class="col-md-3 col-md-offset-3">	
<div id="content" class="box">
    <form  action="Main/update" method="post" novalidate style="padding-top: 100px">
<table style="width:950px; height: 100%"  border="0" class="nostyle">
  <tr>
    <td colspan="7"><h1>People</h1></td>
  </tr>
  <tr>
    <td colspan="7">ITT enable you to allocate partical people to speific roles in your project.Roles are use when defining other settings, like notification and permission.&nbsp;</td>
  </tr>
  <tr>
    <td width="0%">&nbsp;</td>
    <td width="17%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td width="30%"><input name="project" type="hidden"  <?php echo 'value="'.$projID.'"'; ?>/></td>
    <td width="10%">&nbsp;</td>
    <td width="30%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
  </tr>
     <tr>
    <td width="0%">&nbsp;</td>
    <td width="17%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td width="30%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td width="30%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
  </tr>
  <tr style="background-color: #eeeeee">
    <td>&nbsp;</td>
    <td ><h3>Project Roles</h3></td>
    <td>&nbsp;</td>
    <td ><h3>Users</h3></td>
    <td>&nbsp;</td>
    <td ><h3>Groups</h3></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td >Developers&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name="devU" id="singleFieldTags" <?php echo 'value="'.$devUV.'"'; ?>/></td>
    <td>&nbsp;</td>
    <td><input name="devG" id="singleFieldTags3" <?php echo 'value="'.$devGV.'"'; ?>/></td>
    <td>&nbsp;</td>
  </tr>

  <tr style="background-color: #eeeeee">
    <td>&nbsp;</td>
    <td >users&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name="useU" id="singleFieldTags4" <?php echo 'value="'.$useUV.'"'; ?>/></td>
    <td>&nbsp;</td>
    <td><input name="useG" id="singleFieldTags5" <?php echo 'value="'.$useGV.'"'; ?>/></td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>Designers</td>
    <td>&nbsp;</td>
    <td><input name="desU" id="singleFieldTags6" <?php echo 'value="'.$desUV.'"'; ?>/></td>
    <td>&nbsp;</td>
    <td><input name="desG" id="singleFieldTags7" <?php echo 'value="'.$desGV.'"'; ?>/></td>
    <td>&nbsp;</td>
  </tr>

  <tr style="background-color: #eeeeee">
    <td>&nbsp;</td>
    <td>QA</td>
    <td>&nbsp;</td>
    <td><input name="qaU" id="singleFieldTags8" <?php echo 'value="'.$qaUV.'"'; ?>/></td>
    <td>&nbsp;</td>
    <td><input name="qaG" id="singleFieldTags9" <?php echo 'value="'.$qaUV.'"'; ?>/></td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
     </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
      </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="#" onclick="cancelAddPeople()" class="btn btn-primary">Cancel</a></td>
    <td><button id="Button3" name="update" type="submit" class="btn btn-primary" >Update</button></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
    </form>
</div> <!-- /main -->

</div>
      <script>
            function cancelAddPeople() {
              
                if (confirm("Cancel Adding peoples...") == true) {
                    window.location.replace("<?php echo site_url('ProjectFundAllocationController?pID=' . $projID); ?>");
                } else {
                  
                }

            }
        </script>
</body>
</html>
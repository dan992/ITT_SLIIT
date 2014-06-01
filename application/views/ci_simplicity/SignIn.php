

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>

        <link rel="stylesheet" href="fv.css" type="text/css" />

        <script type="text/javascript" src="jquery.js"></script>
    <!--  <script type="text/javascript" src="menu.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="multifield.js"></script>
   <!-- <script src="validator.js"></script>-->




        </script>
        <title>Sign In</title>
    </head>

    <body>


        
        <div class="col-md-offset-4">

            <div id="content" class="box">


                <!-- Content (Right Column) -->
                <table  border="0" class="nostyle">
                    <tr>
                        <td class="auto-style1">&nbsp;</td>
                        <td rowspan="0" >
                            <div id='wrap'>

                                <h1 >Sign In</h1>

                                <h2 >Enter your details here.</h2>
                                <br />
                                <section >
                                    <form  action="SignInController/valideAndInsertmember" method="post" >
                                        <fieldset>
                                            <div class="list-item">
                                                <label>
                                                    <span>*First Name</span>
                                                    <input class="form-control" name="signIn_fname" required="required" type="text" />		
                                                </label>
                                                <div class='maketooltip help'>
                                                    <span>?</span>
                                                    <div class='content'>
                                                        <b></b>
                                                        <p>Your First Name is required.</p>
                                                    </div>
                                                    </div>
                                                <br/>
                                                <span class='extra'><?php echo $fNameErr; ?></span>
                                            </div>
                                            <br/>

                                            <div class="list-item">
                                                <label>
                                                    <span>*Last Name</span>
                                                    <input class="form-control" name="signIn_lname" required="required" type="text" />
                                                </label>
                                                <div class='maketooltip help'>
                                                    <span>?</span>
                                                    <div class='content'>
                                                        <b></b>
                                                        <p>Your Last Name is required.</p>
                                                    </div>
                                                </div>
                                                <br/>
                                                <span class='extra'><?php echo $lNameErr;   ?></span>
                                            </div>
                                            <br/>


                                            <div class="list-item">
                                                <label>
                                                    <span>*E-Mail</span>
                                                    <input class="form-control"  name="signIn_url" placeholder="username@abc.com" required="required" type="text" />
                                                </label>
                                                <div class='maketooltip help'>
                                                    <span>?</span>
                                                    <div class='content'>
                                                        <b></b>
                                                        <p>*E-Mail is required.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>
                                            <span class='extra'><?php echo $urlErr;   ?></span>
                                            <br/>


                                            <div class="list-item">
                                                <label>
                                                    <span>*Password</span>
                                                    <input class="form-control" type="password" name="signIn_password"  required="required"/>
                                                </label>
                                                <div class='maketooltip help'>
                                                    <span>?</span>
                                                    <div class='content'>
                                                        <b></b>
                                                        <p>*Password is required.</p>
                                                    </div>
                                                </div>
                                                <br/>
                                                <span class='extra'><?php echo $passwordErr;   ?></span>
                                            </div>
                                            <br/>


                                            <div class="list-item">
                                                <label>
                                                    <span>*Confirm Password</span>
                                                    <input class="form-control" type="password" name="signIn_confirmpassword"  required="required"/>
                                                </label>
                                                <div class='maketooltip help'>
                                                    <span>?</span>
                                                    <div class='content'>
                                                        <b></b>
                                                        <p>*Confirm Password is required.</p>
                                                    </div>
                                                </div>
                                                <br/>
                                                <span class='extra'><?php echo $compasswordErr;   ?></span>
                                            </div>
                                            <br/>

                                            <div class="list-item">
                                                <label>
                                                    <span>*Company Name</span>
                                                    <input class="form-control" type="text" name="signIn_companyName"  required="required"/>
                                                </label>
                                                <div class='maketooltip help'>
                                                    <span>?</span>
                                                    <div class='content'>
                                                        <b></b>
                                                        <p>*Company Name is required.</p>
                                                    </div>
                                                </div>
                                                <br/>
                                                <span class='extra'><?php echo $companyNameErr;   ?></span>
                                            </div>
                                            <br/><br/><br/><br/><br/><br/><br/><br/>
                                           <br/><br/>

                                            <div class="list-item">
                                                <input name="signIn_newsLetter" type="checkbox" />
                                                <span>Subscribe to Monthly Newasletter.</span>		
                                            </div>

                                            <label>
                                                <span id="tabL">  
                                                </span>
                                            </label>
                                            <label>
                                                <span id="tabL">  
                                                </span>
                                            </label>
                                           
                                            <div class='maketooltip help'>
                                                <button class="btn btn-primary" id='Button1' type='submit' name="cancel SignIn">Cancel Sign In</button>
                                                <button class="btn btn-primary" id='send' type='submit' name="SignIn">Sign In</button>     
                                            </div>
                                            </div>


                                    </form>	
                                </section>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td >&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                </table>



            </div> <!-- /main -->
        </div>
    </body>
</html>
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>



        <title>Create Profile</title>
        <script type="text/javascript">
            function updatepicture(pic) {
                document.getElementById("image").setAttribute("src", pic);
            }
        </script>
    </head>

    <body>



        <div class="col-md-4 col-md-offset-4">

            <div id="content" class="box">


                <!-- Content (Right Column) -->
                <table style="width:95%; height: 1115px;" border="0" class="nostyle">
                    <tr>
                        <td class="auto-style1">&nbsp;</td>
                        <td rowspan="0" >
                            <div id='wrap'>

                                <h1 class="bg-primary">Create Profile</h1>

                                <!--<h2 class="bg-info">Enter your new project details... </h2>-->
                                <br />
                                <section>

                                    <form id="form1" action="addProfileDataController/upload" method="POST" enctype="multipart/form-data">

                                        <div id="error">
                                            <?php echo $error ?>
                                        </div>

                                        <div id="upload">
                                            <input type="file" id="file" name="userfile">
                                                <input type="submit" id="submit" name="Upload" value="Upload" >
                                                    </div>                                   

                                                    <div>
                                                        <img src="<?php echo $img ?>" name="image" width="150" height="150" />
                                                    </div>
                                                    </form>


                                                    <form id="form2" action="insertMemberDetails" method="post" > 
                                                        <fieldset>           
                                                            <div class="list-item">
                                                                <label>
                                                                    <span>E-Mail</span>
                                                                    <input class="form-control" name="cp_email" readonly="true" type="text" value="<?php echo $msignIn_url; ?>"/>		
                                                                </label>
                                                                <span class='extra'><?php //echo //$cpemailErr;     ?></span>
                                                            </div>
                                                            <br/>

                                                            <div class="list-item">
                                                                <label>
                                                                    <span>Password</span>
                                                                    <input class="form-control" name="cp_password" type="password" readonly="true" value="<?php echo $msignIn_password; ?>"/>		
                                                                </label>
                                                                <span class='extra'><?php //echo //$cpPasswordErr;     ?></span>
                                                            </div>

                                                            <div class="list-item">
                                                                <label>
                                                                    <span>Display Name</span>
                                                                    <input class="form-control" name="cp_displayName" readonly="true" type="text" value="<?php echo $mfName . " " . $mlName; ?>"/>		
                                                                </label>
                                                                <div class='maketooltip help'>
                                                                    <span>?</span>
                                                                    <div class='content'>
                                                                        <b></b>
                                                                        <p>Display Name is required.</p>
                                                                    </div>
                                                                </div>
                                                                <span class='extra'><?php //echo //$cpDisNameErr;     ?></span>
                                                            </div>
                                                            <br/>

                                                            <div class="list-item">
                                                                <label>
                                                                    <span>Company Name</span>
                                                                    <input class="form-control" name="cp_companyName" required="required" type="text" value="<?php echo $mcompanyName; ?>"/>		
                                                                </label>
                                                                <div class='maketooltip help'>
                                                                    <span>?</span>
                                                                    <div class='content'>
                                                                        <b></b>
                                                                        <p>Company Name is required.</p>
                                                                    </div>
                                                                </div>
                                                                <span class='extra'><?php //echo //$companyNameErr;     ?></span>
                                                            </div>
                                                            <br/>
                                                        
                                                            <div class="list-item">
                                                                <label>
                                                                    <span>*Position</span>
                                                                    <select class="form-control" name="cp_position">
                                                                        <option value="dev">Developer</option>
                                                                        <option value="des">UI Designer</option>
                                                                        <option value="qa">QA</option>
                                                                        <option value="use">Other</option>
                                                                    </select>
                                                                </label>
                                                                <div class='maketooltip help'>
                                                                    <span>?</span>
                                                                    <div class='content'>
                                                                        <b></b>
                                                                        <p>Position is Required</p>
                                                                    </div>
                                                                </div>
                                                            <br/>

                                                            <div class="list-item">
                                                                <label>
                                                                    <span>Homepage URL</span>
                                                                    <input class="form-control" name="cp_homepageURL" type="text" />		
                                                                </label>
                                                                <span class='extra'><?php //echo //$homepageURLErr;     ?></span>
                                                            </div>
                                                            <br/>

                                                            <div class="list-item">
                                                                <label>
                                                                    <span>IM Info</span>
                                                                    <input class="form-control" name="cp_IMinfo" type="text" />		
                                                                </label>
                                                                <span class='extra'><?php //echo //$iminfoErr;     ?></span>
                                                            </div>
                                                            <br/>

                                                            <div class="list-item">
                                                                <label>
                                                                    <span>About Me</span>
                                                                    <textarea class="form-control" name='cp_description' cols="20" rows="6"></textarea>
                                                                </label>
                                                            </div>

                                                            <div class="list-item">
                                                                <label>
                                                                    <h2 class="bg-primary">Your Personal Info</h2>
                                                                    <h3 class="bg-info">Your personal info is only visible to you.</h3>
                                                                </label>
                                                            </div>

                                                            <div class="list-item">
                                                                <label>
                                                                    <span>*First Name</span>
                                                                    <input class="form-control" name="cp_fName" required="required" type="text" value="<?php echo $mfName; ?>"/>		
                                                                </label>
                                                                <div class='maketooltip help'>
                                                                    <span>?</span>
                                                                    <div class='content'>
                                                                        <b></b>
                                                                        <p>First Name is required.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br/>

                                                            <div class="list-item">
                                                                <label>
                                                                    <span>*Last Name</span>
                                                                    <input class="form-control" name="cp_lName" required="required" type="text" value="<?php echo $mlName; ?>"/>		
                                                                </label>
                                                                <div class='maketooltip help'>
                                                                    <span>?</span>
                                                                    <div class='content'>
                                                                        <b></b>
                                                                        <p>Last Name is required.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br/>
                                                            <br/>

                                                            <br/>

                                                            <div class="list-item">
                                                                <label>
                                                                    <span>*Country</span>
                                                                    <select class="form-control"  name="cp_country">
                                                                        <option value="AU">Australia</option>
                                                                        <option value="CA">Canada</option>
                                                                        <option value="DE">Germany</option>
                                                                        <option value="JP">Japan</option>
                                                                        <option value="GB">United Kingdom</option>
                                                                        <option value="US">United States of America</option>
                                                                        <option value="AF">Afghanistan</option>
                                                                        <option value="AL">Albania</option>
                                                                        <option value="DZ">Algeria</option>
                                                                        <option value="AS">American Samoa</option>
                                                                        <option value="AD">Andorra</option>
                                                                        <option value="AO">Angola</option>
                                                                        <option value="AI">Anguilla</option>
                                                                        <option value="AQ">Antarctica</option>
                                                                        <option value="AG">Antigua and Barbuda</option>
                                                                        <option value="AR">Argentina</option>
                                                                        <option value="AM">Armenia</option>
                                                                        <option value="AW">Aruba</option>
                                                                        <option value="AT">Austria</option>
                                                                        <option value="AZ">Azerbaijan</option>
                                                                        <option value="BS">Bahamas</option>
                                                                        <option value="BH">Bahrain</option>
                                                                        <option value="BD">Bangladesh</option>
                                                                        <option value="BB">Barbados</option>
                                                                        <option value="BY">Belarus</option>
                                                                        <option value="BE">Belgium</option>
                                                                        <option value="BZ">Belize</option>
                                                                        <option value="BJ">Benin</option>
                                                                        <option value="BM">Bermuda</option>
                                                                        <option value="BT">Bhutan</option>
                                                                        <option value="BO">Bolivia</option>
                                                                        <option value="BA">Bosnia and Herzegovina</option>
                                                                        <option value="BW">Botswana</option>
                                                                        <option value="BV">Bouvet Island</option>
                                                                        <option value="BR">Brazil</option>
                                                                        <option value="IO">British Indian Ocean Territory</option>
                                                                        <option value="BN">Brunei</option>
                                                                        <option value="BG">Bulgaria</option>
                                                                        <option value="BF">Burkina Faso</option>
                                                                        <option value="BI">Burundi</option>
                                                                        <option value="KH">Cambodia</option>
                                                                        <option value="CM">Cameroon</option>
                                                                        <option value="CV">Cape Verde</option>
                                                                        <option value="KY">Cayman Islands</option>
                                                                        <option value="CF">Central African Republic</option>
                                                                        <option value="TD">Chad</option>
                                                                        <option value="CL">Chile</option>
                                                                        <option value="CN">China</option>
                                                                        <option value="CX">Christmas Island</option>
                                                                        <option value="CC">Cocos (Keeling) Islands</option>
                                                                        <option value="CO">Colombia</option>
                                                                        <option value="KM">Comoros</option>
                                                                        <option value="CD">Congo(Democratic Republic)</option>
                                                                        <option value="CG">Congo (Republic of)</option>
                                                                        <option value="CK">Cook Islands</option>
                                                                        <option value="CR">Costa Rica</option>
                                                                        <option value="CI">Cote d&#39;Ivoire (Ivory Coast)</option>
                                                                        <option value="HR">Croatia (Hrvatska)</option>
                                                                        <option value="CU">Cuba</option>
                                                                        <option value="CY">Cyprus</option>
                                                                        <option value="CZ">Czech Republic</option>
                                                                        <option value="DK">Denmark</option>
                                                                        <option value="DJ">Djibouti</option>
                                                                        <option value="DM">Dominica</option>
                                                                        <option value="DO">Dominican Republic</option>
                                                                        <option value="EC">Ecuador</option>
                                                                        <option value="EG">Egypt</option>
                                                                        <option value="SV">El Salvador</option>
                                                                        <option value="GQ">Equatorial Guinea</option>
                                                                        <option value="ER">Eritrea</option>
                                                                        <option value="EE">Estonia</option>
                                                                        <option value="ET">Ethiopia</option>
                                                                        <option value="FK">Falkland Islands</option>
                                                                        <option value="FO">Faroe Islands</option>
                                                                        <option value="FJ">Fiji</option>
                                                                        <option value="FI">Finland</option>
                                                                        <option value="FR">France</option>
                                                                        <option value="GF">French Guiana</option>
                                                                        <option value="PF">French Polynesia</option>
                                                                        <option value="TF">French Southern Territories</option>
                                                                        <option value="GA">Gabon</option>
                                                                        <option value="GM">Gambia</option>
                                                                        <option value="GE">Georgia</option>
                                                                        <option value="GH">Ghana</option>
                                                                        <option value="GI">Gibraltar</option>
                                                                        <option value="GR">Greece</option>
                                                                        <option value="GL">Greenland</option>
                                                                        <option value="GD">Grenada</option>
                                                                        <option value="GP">Guadeloupe</option>
                                                                        <option value="GU">Guam</option>
                                                                        <option value="GT">Guatemala</option>
                                                                        <option value="GG">Guernsey</option>
                                                                        <option value="GN">Guinea</option>
                                                                        <option value="GW">Guinea-Bissau</option>
                                                                        <option value="GY">Guyana</option>
                                                                        <option value="HT">Haiti</option>
                                                                        <option value="HM">Heard and McDonald Islands</option>
                                                                        <option value="HN">Honduras</option>
                                                                        <option value="HK">Hong Kong</option>
                                                                        <option value="HU">Hungary</option>
                                                                        <option value="IS">Iceland</option>
                                                                        <option value="IN">India</option>
                                                                        <option value="ID">Indonesia</option>
                                                                        <option value="IR">Iran</option>
                                                                        <option value="IQ">Iraq</option>
                                                                        <option value="IE">Ireland</option>
                                                                        <option value="IM">Isle of Man</option>
                                                                        <option value="IL">Israel</option>
                                                                        <option value="IT">Italy</option>
                                                                        <option value="JM">Jamaica</option>
                                                                        <option value="JE">Jersey</option>
                                                                        <option value="JO">Jordan</option>
                                                                        <option value="KZ">Kazakhstan</option>
                                                                        <option value="KE">Kenya</option>
                                                                        <option value="KI">Kiribati</option>
                                                                        <option value="KP">Korea (North)</option>
                                                                        <option value="KR">Korea (South)</option>
                                                                        <option value="KW">Kuwait</option>
                                                                        <option value="KG">Kyrgyzstan</option>
                                                                        <option value="LA">Laos</option>
                                                                        <option value="LV">Latvia</option>
                                                                        <option value="LB">Lebanon</option>
                                                                        <option value="LS">Lesotho</option>
                                                                        <option value="LR">Liberia</option>
                                                                        <option value="LY">Libya</option>
                                                                        <option value="LI">Liechtenstein</option>
                                                                        <option value="LT">Lithuania</option>
                                                                        <option value="LU">Luxembourg</option>
                                                                        <option value="MO">Macau</option>
                                                                        <option value="MK">Macedonia</option>
                                                                        <option value="MG">Madagascar</option>
                                                                        <option value="MW">Malawi</option>
                                                                        <option value="MY">Malaysia</option>
                                                                        <option value="MV">Maldives</option>
                                                                        <option value="ML">Mali</option>
                                                                        <option value="MT">Malta</option>
                                                                        <option value="MH">Marshall Islands</option>
                                                                        <option value="MQ">Martinique</option>
                                                                        <option value="MR">Mauritania</option>
                                                                        <option value="MU">Mauritius</option>
                                                                        <option value="YT">Mayotte</option>
                                                                        <option value="MX">Mexico</option>
                                                                        <option value="FM">Micronesia</option>
                                                                        <option value="MD">Moldova</option>
                                                                        <option value="MC">Monaco</option>
                                                                        <option value="MN">Mongolia</option>
                                                                        <option value="ME">Montenegro</option>
                                                                        <option value="MS">Montserrat</option>
                                                                        <option value="MA">Morocco</option>
                                                                        <option value="MZ">Mozambique</option>
                                                                        <option value="MM">Myanmar</option>
                                                                        <option value="NA">Namibia</option>
                                                                        <option value="NR">Nauru</option>
                                                                        <option value="NP">Nepal</option>
                                                                        <option value="NL">Netherlands</option>
                                                                        <option value="AN">Netherlands Antilles</option>
                                                                        <option value="NC">New Caledonia</option>
                                                                        <option value="NZ">New Zealand</option>
                                                                        <option value="NI">Nicaragua</option>
                                                                        <option value="NE">Niger</option>
                                                                        <option value="NG">Nigeria</option>
                                                                        <option value="NU">Niue</option>
                                                                        <option value="NF">Norfolk Island</option>
                                                                        <option value="MP">Northern Mariana Islands</option>
                                                                        <option value="NO">Norway</option>
                                                                        <option value="OM">Oman</option>
                                                                        <option value="PK">Pakistan</option>
                                                                        <option value="PW">Palau</option>
                                                                        <option value="PS">Palestinian Territories</option>
                                                                        <option value="PA">Panama</option>
                                                                        <option value="PG">Papua New Guinea</option>
                                                                        <option value="PY">Paraguay</option>
                                                                        <option value="PE">Peru</option>
                                                                        <option value="PH">Philippines</option>
                                                                        <option value="PN">Pitcairn</option>
                                                                        <option value="PL">Poland</option>
                                                                        <option value="PT">Portugal</option>
                                                                        <option value="PR">Puerto Rico</option>
                                                                        <option value="QA">Qatar</option>
                                                                        <option value="RE">Reunion</option>
                                                                        <option value="RO">Romania</option>
                                                                        <option value="RU">Russian Federation</option>
                                                                        <option value="RW">Rwanda</option>
                                                                        <option value="SH">Saint Helena</option>
                                                                        <option value="KN">Saint Kitts and Nevis</option>
                                                                        <option value="LC">Saint Lucia</option>
                                                                        <option value="PM">Saint Pierre and Miquelon</option>
                                                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                                                        <option value="WS">Samoa</option>
                                                                        <option value="SM">San Marino</option>
                                                                        <option value="ST">Sao Tome and Principe</option>
                                                                        <option value="SA">Saudi Arabia</option>
                                                                        <option value="SN">Senegal</option>
                                                                        <option value="RS">Serbia</option>
                                                                        <option value="SC">Seychelles</option>
                                                                        <option value="SL">Sierra Leone</option>
                                                                        <option value="SG">Singapore</option>
                                                                        <option value="SK">Slovak Republic</option>
                                                                        <option value="SI">Slovenia</option>
                                                                        <option value="SB">Solomon Islands</option>
                                                                        <option value="SO">Somalia</option>
                                                                        <option value="ZA">South Africa</option>
                                                                        <option value="ES">Spain</option>
                                                                        <option value="LK">Sri Lanka</option>
                                                                        <option value="SD">Sudan</option>
                                                                        <option value="SR">Suriname</option>
                                                                        <option value="SJ">Svalbard and Jan Mayen Islands</option>
                                                                        <option value="SZ">Swaziland</option>
                                                                        <option value="SE">Sweden</option>
                                                                        <option value="CH">Switzerland</option>
                                                                        <option value="SY">Syria</option>
                                                                        <option value="TW">Taiwan</option>
                                                                        <option value="TJ">Tajikistan</option>
                                                                        <option value="TZ">Tanzania</option>
                                                                        <option value="TH">Thailand</option>
                                                                        <option value="TL">Timor-Leste</option>
                                                                        <option value="TG">Togo</option>
                                                                        <option value="TK">Tokelau</option>
                                                                        <option value="TO">Tonga</option>
                                                                        <option value="TT">Trinidad and Tobago</option>
                                                                        <option value="TN">Tunisia</option>
                                                                        <option value="TR">Turkey</option>
                                                                        <option value="TM">Turkmenistan</option>
                                                                        <option value="TC">Turks and Caicos Islands</option>
                                                                        <option value="TV">Tuvalu</option>
                                                                        <option value="UG">Uganda</option>
                                                                        <option value="UA">Ukraine</option>
                                                                        <option value="AE">United Arab Emirates</option>
                                                                        <option value="UY">Uruguay</option>
                                                                        <option value="UZ">Uzbekistan</option>
                                                                        <option value="VU">Vanuatu</option>
                                                                        <option value="VA">Vatican City</option>
                                                                        <option value="VE">Venezuela</option>
                                                                        <option value="VN">Vietnam</option>
                                                                        <option value="VG">Virgin Islands (British)</option>
                                                                        <option value="VI">Virgin Islands (US)</option>
                                                                        <option value="WF">Wallis and Futuna Islands</option>
                                                                        <option value="EH">Western Sahara</option>
                                                                        <option value="YE">Yemen</option>
                                                                        <option value="ZM">Zambia</option>
                                                                        <option value="ZW">Zimbabwe</option>
                                                                    </select>
                                                                </label>
                                                                <div class='maketooltip help'>
                                                                    <span>?</span>
                                                                    <div class='content'>
                                                                        <b></b>
                                                                        <p>Country name is Required</p>
                                                                    </div>
                                                                </div>
                                                            </div>                                        

                                                            <br/>

                                                            <div class="list-item">
                                                                <label>
                                                                    <span>Address Line1</span>
                                                                    <input class="form-control" name="cp_addressl1" type="text" />		
                                                                </label>
                                                            </div>
                                                            <br/>

                                                            <div class="list-item">
                                                                <label>
                                                                    <span>Address Line2</span>
                                                                    <input class="form-control" name="cp_addressl2" type="text" />		
                                                                </label>
                                                            </div>
                                                            <br/>

                                                            <div class="list-item">
                                                                <label>
                                                                    <span>Address Line3</span>
                                                                    <input class="form-control" name="cp_addressl3" type="text" />		
                                                                </label>
                                                            </div>
                                                            <br/>

                                                            <div class="list-item">
                                                                <label>
                                                                    <span>City</span>
                                                                    <input class="form-control" name="cp_city" type="text" />		
                                                                </label>
                                                            </div>
                                                            <br/>

                                                            <div class="list-item">
                                                                <label>
                                                                    <span>State/Province</span>
                                                                    <input class="form-control" name="cp_state" type="text" />		
                                                                </label>
                                                            </div>
                                                            <br/>

                                                            <div class="list-item">
                                                                <label>
                                                                    <span>ZIP/Post Code</span>
                                                                    <input class="form-control" name="cp_zip" type="text" />		
                                                                </label>
                                                            </div>
                                                            <br/>

                                                            <div class="list-item">
                                                                <label>
                                                                    <span>Phone</span>
                                                                    <input class="form-control" name="cp_phone" type="text"/>		
                                                                </label>
                                                            </div>
                                                            <br/>

                                                            <div class="list-item">
                                                                <label>
                                                                    <span>Tax ID</span>
                                                                    <input class="form-control" name="cp_taxid" type="text" />		
                                                                </label>
                                                            </div>
                                                            <br/>

                                                            <div class="list-item">
                                                                <label>
                                                                    <span id="tabL">  
                                                                    </span>
                                                                </label>
                                                                <label>
                                                                    <span id="tabL">  
                                                                    </span>
                                                                </label>
                                                                <label>
                                                                    <span id="tabL">  
                                                                    </span>
                                                                </label>
                                                                <label>
                                                                    <span id="tabL">  
                                                                    </span>
                                                                </label>
                                                                <div class='maketooltip help'>
                                                                    <button class="btn btn-primary" id='Button1' type='submit' name="cancel">Cancel</button>
                                                                    <button class="btn btn-primary" id='send' type='submit' name="create">Create</button>     
                                                                </div>
                                                            </div>

                                                        </fieldset>
                                                    </form>	
                                                    <iframe style="display:none;" name="iframe"/>
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
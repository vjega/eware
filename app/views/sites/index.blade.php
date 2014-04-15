@extends('master')
<!-- Main Content -->
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Sites</h3></div>
        <div class="panel-body">
            <table id="siteList"></table>
            <div id="sitePager"></div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-inverse" data-toggle="modal" id="showSitePop">New Site</button>
            <button class="btn btn-inverse" data-toggle="modal" id="editSitePop">Edit Selected Site</button>
            <button class="btn btn-inverse" data-toggle="modal" id="delSite">Delete Selected Site(s)</button>
        </div>
    </div>
@stop
<!-- Add/edit popups -->
@section('popups')
<!-- add / Edit -->
<div class="modal fade" id="addSite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Site</h4>
      </div>
      <form class="form-horizontal" role="form" name="addsitefrm" id="addsitefrm">
      <div class="modal-body">      
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Company Code</label>
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="id" value="" placeholder="">
                            <select class="form-control"  id="company_code" name="company_code">
                                @foreach ($company as $com)
                                    <option value="{{$com->id}}">{{$com->company_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control validate[required,custom[onlyLetterSp],minSize[5],maxSize[50]] " id="name" name="name" value="" placeholder="Enter Site Name e.g. Acme Corp.">
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Country</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="country" name="country">
                                <option value="0" label="Select a country ... " selected="selected">Select a country ... </option>
                                <option value="AF" label="Afghanistan">Afghanistan</option>
                                <option value="AL" label="Albania">Albania</option>
                                <option value="DZ" label="Algeria">Algeria</option>
                                <option value="AS" label="American Samoa">American Samoa</option>
                                <option value="AD" label="Andorra">Andorra</option>
                                <option value="AO" label="Angola">Angola</option>
                                <option value="AI" label="Anguilla">Anguilla</option>
                                <option value="AQ" label="Antarctica">Antarctica</option>
                                <option value="AG" label="Antigua and Barbuda">Antigua and Barbuda</option>
                                <option value="AR" label="Argentina">Argentina</option>
                                <option value="AM" label="Armenia">Armenia</option>
                                <option value="AW" label="Aruba">Aruba</option>
                                <option value="AU" label="Australia">Australia</option>
                                <option value="AT" label="Austria">Austria</option>
                                <option value="AZ" label="Azerbaijan">Azerbaijan</option>
                                <option value="BS" label="Bahamas">Bahamas</option>
                                <option value="BH" label="Bahrain">Bahrain</option>
                                <option value="BD" label="Bangladesh">Bangladesh</option>
                                <option value="BB" label="Barbados">Barbados</option>
                                <option value="BY" label="Belarus">Belarus</option>
                                <option value="BE" label="Belgium">Belgium</option>
                                <option value="BZ" label="Belize">Belize</option>
                                <option value="BJ" label="Benin">Benin</option>
                                <option value="BM" label="Bermuda">Bermuda</option>
                                <option value="BT" label="Bhutan">Bhutan</option>
                                <option value="BO" label="Bolivia">Bolivia</option>
                                <option value="BA" label="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                <option value="BW" label="Botswana">Botswana</option>
                                <option value="BV" label="Bouvet Island">Bouvet Island</option>
                                <option value="BR" label="Brazil">Brazil</option>
                                <option value="BQ" label="British Antarctic Territory">British Antarctic Territory</option>
                                <option value="IO" label="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                <option value="VG" label="British Virgin Islands">British Virgin Islands</option>
                                <option value="BN" label="Brunei">Brunei</option>
                                <option value="BG" label="Bulgaria">Bulgaria</option>
                                <option value="BF" label="Burkina Faso">Burkina Faso</option>
                                <option value="BI" label="Burundi">Burundi</option>
                                <option value="KH" label="Cambodia">Cambodia</option>
                                <option value="CM" label="Cameroon">Cameroon</option>
                                <option value="CA" label="Canada">Canada</option>
                                <option value="CT" label="Canton and Enderbury Islands">Canton and Enderbury Islands</option>
                                <option value="CV" label="Cape Verde">Cape Verde</option>
                                <option value="KY" label="Cayman Islands">Cayman Islands</option>
                                <option value="CF" label="Central African Republic">Central African Republic</option>
                                <option value="TD" label="Chad">Chad</option>
                                <option value="CL" label="Chile">Chile</option>
                                <option value="CN" label="China">China</option>
                                <option value="CX" label="Christmas Island">Christmas Island</option>
                                <option value="CC" label="Cocos [Keeling] Islands">Cocos [Keeling] Islands</option>
                                <option value="CO" label="Colombia">Colombia</option>
                                <option value="KM" label="Comoros">Comoros</option>
                                <option value="CG" label="Congo - Brazzaville">Congo - Brazzaville</option>
                                <option value="CD" label="Congo - Kinshasa">Congo - Kinshasa</option>
                                <option value="CK" label="Cook Islands">Cook Islands</option>
                                <option value="CR" label="Costa Rica">Costa Rica</option>
                                <option value="HR" label="Croatia">Croatia</option>
                                <option value="CU" label="Cuba">Cuba</option>
                                <option value="CY" label="Cyprus">Cyprus</option>
                                <option value="CZ" label="Czech Republic">Czech Republic</option>
                                <option value="CI" label="Côte d’Ivoire">Côte d’Ivoire</option>
                                <option value="DK" label="Denmark">Denmark</option>
                                <option value="DJ" label="Djibouti">Djibouti</option>
                                <option value="DM" label="Dominica">Dominica</option>
                                <option value="DO" label="Dominican Republic">Dominican Republic</option>
                                <option value="NQ" label="Dronning Maud Land">Dronning Maud Land</option>
                                <option value="DD" label="East Germany">East Germany</option>
                                <option value="EC" label="Ecuador">Ecuador</option>
                                <option value="EG" label="Egypt">Egypt</option>
                                <option value="SV" label="El Salvador">El Salvador</option>
                                <option value="GQ" label="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="ER" label="Eritrea">Eritrea</option>
                                <option value="EE" label="Estonia">Estonia</option>
                                <option value="ET" label="Ethiopia">Ethiopia</option>
                                <option value="FK" label="Falkland Islands">Falkland Islands</option>
                                <option value="FO" label="Faroe Islands">Faroe Islands</option>
                                <option value="FJ" label="Fiji">Fiji</option>
                                <option value="FI" label="Finland">Finland</option>
                                <option value="FR" label="France">France</option>
                                <option value="GF" label="French Guiana">French Guiana</option>
                                <option value="PF" label="French Polynesia">French Polynesia</option>
                                <option value="TF" label="French Southern Territories">French Southern Territories</option>
                                <option value="FQ" label="French Southern and Antarctic Territories">French Southern and Antarctic Territories</option>
                                <option value="GA" label="Gabon">Gabon</option>
                                <option value="GM" label="Gambia">Gambia</option>
                                <option value="GE" label="Georgia">Georgia</option>
                                <option value="DE" label="Germany">Germany</option>
                                <option value="GH" label="Ghana">Ghana</option>
                                <option value="GI" label="Gibraltar">Gibraltar</option>
                                <option value="GR" label="Greece">Greece</option>
                                <option value="GL" label="Greenland">Greenland</option>
                                <option value="GD" label="Grenada">Grenada</option>
                                <option value="GP" label="Guadeloupe">Guadeloupe</option>
                                <option value="GU" label="Guam">Guam</option>
                                <option value="GT" label="Guatemala">Guatemala</option>
                                <option value="GG" label="Guernsey">Guernsey</option>
                                <option value="GN" label="Guinea">Guinea</option>
                                <option value="GW" label="Guinea-Bissau">Guinea-Bissau</option>
                                <option value="GY" label="Guyana">Guyana</option>
                                <option value="HT" label="Haiti">Haiti</option>
                                <option value="HM" label="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                                <option value="HN" label="Honduras">Honduras</option>
                                <option value="HK" label="Hong Kong SAR China">Hong Kong SAR China</option>
                                <option value="HU" label="Hungary">Hungary</option>
                                <option value="IS" label="Iceland">Iceland</option>
                                <option value="IN" label="India">India</option>
                                <option value="ID" label="Indonesia">Indonesia</option>
                                <option value="IR" label="Iran">Iran</option>
                                <option value="IQ" label="Iraq">Iraq</option>
                                <option value="IE" label="Ireland">Ireland</option>
                                <option value="IM" label="Isle of Man">Isle of Man</option>
                                <option value="IL" label="Israel">Israel</option>
                                <option value="IT" label="Italy">Italy</option>
                                <option value="JM" label="Jamaica">Jamaica</option>
                                <option value="JP" label="Japan">Japan</option>
                                <option value="JE" label="Jersey">Jersey</option>
                                <option value="JT" label="Johnston Island">Johnston Island</option>
                                <option value="JO" label="Jordan">Jordan</option>
                                <option value="KZ" label="Kazakhstan">Kazakhstan</option>
                                <option value="KE" label="Kenya">Kenya</option>
                                <option value="KI" label="Kiribati">Kiribati</option>
                                <option value="KW" label="Kuwait">Kuwait</option>
                                <option value="KG" label="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="LA" label="Laos">Laos</option>
                                <option value="LV" label="Latvia">Latvia</option>
                                <option value="LB" label="Lebanon">Lebanon</option>
                                <option value="LS" label="Lesotho">Lesotho</option>
                                <option value="LR" label="Liberia">Liberia</option>
                                <option value="LY" label="Libya">Libya</option>
                                <option value="LI" label="Liechtenstein">Liechtenstein</option>
                                <option value="LT" label="Lithuania">Lithuania</option>
                                <option value="LU" label="Luxembourg">Luxembourg</option>
                                <option value="MO" label="Macau SAR China">Macau SAR China</option>
                                <option value="MK" label="Macedonia">Macedonia</option>
                                <option value="MG" label="Madagascar">Madagascar</option>
                                <option value="MW" label="Malawi">Malawi</option>
                                <option value="MY" label="Malaysia">Malaysia</option>
                                <option value="MV" label="Maldives">Maldives</option>
                                <option value="ML" label="Mali">Mali</option>
                                <option value="MT" label="Malta">Malta</option>
                                <option value="MH" label="Marshall Islands">Marshall Islands</option>
                                <option value="MQ" label="Martinique">Martinique</option>
                                <option value="MR" label="Mauritania">Mauritania</option>
                                <option value="MU" label="Mauritius">Mauritius</option>
                                <option value="YT" label="Mayotte">Mayotte</option>
                                <option value="FX" label="Metropolitan France">Metropolitan France</option>
                                <option value="MX" label="Mexico">Mexico</option>
                                <option value="FM" label="Micronesia">Micronesia</option>
                                <option value="MI" label="Midway Islands">Midway Islands</option>
                                <option value="MD" label="Moldova">Moldova</option>
                                <option value="MC" label="Monaco">Monaco</option>
                                <option value="MN" label="Mongolia">Mongolia</option>
                                <option value="ME" label="Montenegro">Montenegro</option>
                                <option value="MS" label="Montserrat">Montserrat</option>
                                <option value="MA" label="Morocco">Morocco</option>
                                <option value="MZ" label="Mozambique">Mozambique</option>
                                <option value="MM" label="Myanmar [Burma]">Myanmar [Burma]</option>
                                <option value="NA" label="Namibia">Namibia</option>
                                <option value="NR" label="Nauru">Nauru</option>
                                <option value="NP" label="Nepal">Nepal</option>
                                <option value="NL" label="Netherlands">Netherlands</option>
                                <option value="AN" label="Netherlands Antilles">Netherlands Antilles</option>
                                <option value="NT" label="Neutral Zone">Neutral Zone</option>
                                <option value="NC" label="New Caledonia">New Caledonia</option>
                                <option value="NZ" label="New Zealand">New Zealand</option>
                                <option value="NI" label="Nicaragua">Nicaragua</option>
                                <option value="NE" label="Niger">Niger</option>
                                <option value="NG" label="Nigeria">Nigeria</option>
                                <option value="NU" label="Niue">Niue</option>
                                <option value="NF" label="Norfolk Island">Norfolk Island</option>
                                <option value="KP" label="North Korea">North Korea</option>
                                <option value="VD" label="North Vietnam">North Vietnam</option>
                                <option value="MP" label="Northern Mariana Islands">Northern Mariana Islands</option>
                                <option value="NO" label="Norway">Norway</option>
                                <option value="OM" label="Oman">Oman</option>
                                <option value="PC" label="Pacific Islands Trust Territory">Pacific Islands Trust Territory</option>
                                <option value="PK" label="Pakistan">Pakistan</option>
                                <option value="PW" label="Palau">Palau</option>
                                <option value="PS" label="Palestinian Territories">Palestinian Territories</option>
                                <option value="PA" label="Panama">Panama</option>
                                <option value="PZ" label="Panama Canal Zone">Panama Canal Zone</option>
                                <option value="PG" label="Papua New Guinea">Papua New Guinea</option>
                                <option value="PY" label="Paraguay">Paraguay</option>
                                <option value="YD" label="People's Democratic Republic of Yemen">People's Democratic Republic of Yemen</option>
                                <option value="PE" label="Peru">Peru</option>
                                <option value="PH" label="Philippines">Philippines</option>
                                <option value="PN" label="Pitcairn Islands">Pitcairn Islands</option>
                                <option value="PL" label="Poland">Poland</option>
                                <option value="PT" label="Portugal">Portugal</option>
                                <option value="PR" label="Puerto Rico">Puerto Rico</option>
                                <option value="QA" label="Qatar">Qatar</option>
                                <option value="RO" label="Romania">Romania</option>
                                <option value="RU" label="Russia">Russia</option>
                                <option value="RW" label="Rwanda">Rwanda</option>
                                <option value="RE" label="Réunion">Réunion</option>
                                <option value="BL" label="Saint Barthélemy">Saint Barthélemy</option>
                                <option value="SH" label="Saint Helena">Saint Helena</option>
                                <option value="KN" label="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                <option value="LC" label="Saint Lucia">Saint Lucia</option>
                                <option value="MF" label="Saint Martin">Saint Martin</option>
                                <option value="PM" label="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                <option value="VC" label="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                <option value="WS" label="Samoa">Samoa</option>
                                <option value="SM" label="San Marino">San Marino</option>
                                <option value="SA" label="Saudi Arabia">Saudi Arabia</option>
                                <option value="SN" label="Senegal">Senegal</option>
                                <option value="RS" label="Serbia">Serbia</option>
                                <option value="CS" label="Serbia and Montenegro">Serbia and Montenegro</option>
                                <option value="SC" label="Seychelles">Seychelles</option>
                                <option value="SL" label="Sierra Leone">Sierra Leone</option>
                                <option value="SG" label="Singapore">Singapore</option>
                                <option value="SK" label="Slovakia">Slovakia</option>
                                <option value="SI" label="Slovenia">Slovenia</option>
                                <option value="SB" label="Solomon Islands">Solomon Islands</option>
                                <option value="SO" label="Somalia">Somalia</option>
                                <option value="ZA" label="South Africa">South Africa</option>
                                <option value="GS" label="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                                <option value="KR" label="South Korea">South Korea</option>
                                <option value="ES" label="Spain">Spain</option>
                                <option value="LK" label="Sri Lanka">Sri Lanka</option>
                                <option value="SD" label="Sudan">Sudan</option>
                                <option value="SR" label="Suriname">Suriname</option>
                                <option value="SJ" label="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                <option value="SZ" label="Swaziland">Swaziland</option>
                                <option value="SE" label="Sweden">Sweden</option>
                                <option value="CH" label="Switzerland">Switzerland</option>
                                <option value="SY" label="Syria">Syria</option>
                                <option value="ST" label="São Tomé and Príncipe">São Tomé and Príncipe</option>
                                <option value="TW" label="Taiwan">Taiwan</option>
                                <option value="TJ" label="Tajikistan">Tajikistan</option>
                                <option value="TZ" label="Tanzania">Tanzania</option>
                                <option value="TH" label="Thailand">Thailand</option>
                                <option value="TL" label="Timor-Leste">Timor-Leste</option>
                                <option value="TG" label="Togo">Togo</option>
                                <option value="TK" label="Tokelau">Tokelau</option>
                                <option value="TO" label="Tonga">Tonga</option>
                                <option value="TT" label="Trinidad and Tobago">Trinidad and Tobago</option>
                                <option value="TN" label="Tunisia">Tunisia</option>
                                <option value="TR" label="Turkey">Turkey</option>
                                <option value="TM" label="Turkmenistan">Turkmenistan</option>
                                <option value="TC" label="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                <option value="TV" label="Tuvalu">Tuvalu</option>
                                <option value="UM" label="U.S. Minor Outlying Islands">U.S. Minor Outlying Islands</option>
                                <option value="PU" label="U.S. Miscellaneous Pacific Islands">U.S. Miscellaneous Pacific Islands</option>
                                <option value="VI" label="U.S. Virgin Islands">U.S. Virgin Islands</option>
                                <option value="UG" label="Uganda">Uganda</option>
                                <option value="UA" label="Ukraine">Ukraine</option>
                                <option value="SU" label="Union of Soviet Socialist Republics">Union of Soviet Socialist Republics</option>
                                <option value="AE" label="United Arab Emirates">United Arab Emirates</option>
                                <option value="GB" label="United Kingdom">United Kingdom</option>
                                <option value="US" label="United States">United States</option>
                                <option value="ZZ" label="Unknown or Invalid Region">Unknown or Invalid Region</option>
                                <option value="UY" label="Uruguay">Uruguay</option>
                                <option value="UZ" label="Uzbekistan">Uzbekistan</option>
                                <option value="VU" label="Vanuatu">Vanuatu</option>
                                <option value="VA" label="Vatican City">Vatican City</option>
                                <option value="VE" label="Venezuela">Venezuela</option>
                                <option value="VN" label="Vietnam">Vietnam</option>
                                <option value="WK" label="Wake Island">Wake Island</option>
                                <option value="WF" label="Wallis and Futuna">Wallis and Futuna</option>
                                <option value="EH" label="Western Sahara">Western Sahara</option>
                                <option value="YE" label="Yemen">Yemen</option>
                                <option value="ZM" label="Zambia">Zambia</option>
                                <option value="ZW" label="Zimbabwe">Zimbabwe</option>
                                <option value="AX" label="Åland Islands">Åland Islands</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Region</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="region" name="region" value="" placeholder="Enter Region Name">
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">City</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control validate[required,custom[onlyLetterSp],minSize[5],maxSize[50]]"  id="city" name="city" value="" placeholder="Enter City Name">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Currency</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="currency" name="currency" value="" placeholder="Enter Currency Name">
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Address</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control validate[required,custom[onlyLetterSp],minSize[5],maxSize[50]]" id="addrs1" name="addrs1" value="" placeholder="Enter Address">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email" value="" placeholder="Enter Email Address">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Website</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="website" name="website" value="" placeholder="Enter Website Address">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Telephone Number 1</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tel_no1" value="" name="tel_no1" placeholder="Telephone Number 1 eg. 91-44-244-65788">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Telephone Number 2</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="tel_no2" value="" name="tel_no2" placeholder="Telephone Number 2 eg. 91-44-244-65788">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Fax Number</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="fax_no" value="" name="fax_no" placeholder="Enter Fax Number">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Postal Code</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="postal_code" value="" name="postal_code" placeholder="Postal Code">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Biz Type</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="biz_type" value="" name="biz_type" placeholder="Biz Type">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Opening Hours</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="biz_hours" value="" name="biz_hours" placeholder="Biz Hours">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Credit Limit</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="credit_limit" value="" name="credit_limit" placeholder="Credit Limit">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Priority</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="priority" value="" name="priority" placeholder="Priority">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Zonal Level</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="zonal_level" value="" name="zonal_level" placeholder="Zonal Level">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Vendor File</label>
                        <div class="col-sm-8">
                        <input type="file" class="form-control" id="vendor_file" value="" name="vendor_file" placeholder="">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Customer File</label>
                        <div class="col-sm-8">
                        <input type="file" class="form-control" id="customer_file" value="" name="customer_file" placeholder="">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Support Src File</label>
                        <div class="col-sm-8">
                        <input type="file" class="form-control" id="support_source_file" value="" name="support_source_file" placeholder="">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">3PL</label>
                        <div class="col-sm-8">
                        <input type="file" class="form-control" id="threepl_file" value="" name="threepl_file" placeholder="">  
                        </div>
                    </div>
                </div>
            </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save-site">Save Site</button>
        <button type="button" class="btn btn-primary" id="post-site">Update Site</button>
      </div>
    </div>
</div>
@stop


<!-- Page based Scripts -->
@section('script')
<script>

var serilaizeJson =  function (form, stripfromAttr){
    var unindexed_array = $(form).serializeArray();
    unindexed_array = unindexed_array.concat(
        $(form+' input[type=checkbox]').map(function() {
            return {"name": this.name, "value": ($(this).prop("checked") ? 1 : 0 ) }
        }).get()
    );
    var indexed_array = {};
    $.map(unindexed_array, function(n, i){
        if (typeof(stripfromAttr)==="undefined")
            indexed_array[n['name']] = n['value'];
        else 
            indexed_array[n['name'].replace(stripfromAttr, '')] = n['value'];
    });

    return JSON.stringify(indexed_array);
}

$(document).ready(function(){
    $("#save-site").click(function(){
		if (($("#addsitefrm").validationEngine("validate"))===true) {
			save_site();
		}
    });
    $("#showSitePop").click(function(){
        show_add_modal();
    });
    $("#editSitePop").click(function(){
        show_edit_modal();
    });
    $("#delSite").click(function(){
        del_site();
    });
    $("#post-site").click(function(){
        update_site();
    });
});

var panelWidth = jQuery(".panel").width()-30;
jQuery("#siteList").jqGrid({ 
    url:'api/v1/sites',
    datatype: "json",
    height: 375,
    width: panelWidth,
    colNames:['<input type="checkbox"/>',
                'Company Code',
                'Name',
                'Country',
                'Region',
                'City',
                'Currency',
                'Add1',
                'Add2',
                'Aad3',
                'Email',
                'Website',
                'Tel No',
                'Tel No2',
                'Fax No',
                'ZIP code',
                'biz_type',
                'biz_hours',
                'credit_limit',
                'priority',
                'zonal_level',
                'vendor_file',
                'customer_file',
                'support_source_file',
                'threepl_file'
            ],
    colModel:[
        {name:'select'},
        {name:'company_code'},
        {name:'name'},
        {name:'country'},
        {name:'region'},
        {name:'city'},
        {name:'currency'},
        {name:'addrs1'},
        {name:'addrs2'},
        {name:'addrs3'},
        {name:'email'},
        {name:'website'},
        {name:'tel_no1'},
        {name:'tel_no2'},
        {name:'fax_no'},
        {name:'postal_code'},
        {name:'biz_type'},
        {name:'biz_hours'},
        {name:'credit_limit'},
        {name:'priority'},
        {name:'zonal_level'},
        {name:'vendor_file'},
        {name:'customer_file'},
        {name:'support_source_file'},
        {name:'threepl_file'}
    ], 
    rowNum:10, 
    rowList:[10,20,30], 
    pager: '#sitePager', 
    viewrecords: true, 
    sortorder: "desc", 
    loadonce: true
});

var save_site = function() {
    $.ajax({
        type: "POST",
        data: {'data':serilaizeJson("#addsitefrm")},
        url: "api/v1/sites",
    }).done(function(data){
        if(data) {
            $('#addSite').modal('hide');
            location.reload();
        }
		
    });
    
};

var update_site = function() {
    $.ajax({
        type: "PATCH",
        data: {'data': serilaizeJson("#addsitefrm") },
        url: "api/v1/sites/"+$("#id").val(),
    }).done(function(data){
        if(data) {
            $('#addSite').modal('hide');
            location.reload();
        }
    });
    
};

var del_site = function() {
    var checkboxes = [];
    $("input.sitebox:checked").each(function(){
        checkboxes.push($(this).prop('id'));
    })
    $.ajax({
        type: "DELETE",
        data: {'data':'data'},
        url: "api/v1/sites/"+checkboxes.join(','),
    }).done(function(data){
        if (data==="true") {
            location.reload();
        }
    });
    
};

var show_add_modal = function () {
    $("#post-site").hide();
    $("#save-site").show();
    $('#addsitefrm').each(function() {
        this.reset();
    });
    $('#addSite').modal('show');
}

var show_edit_modal = function () {
    $("#save-site").hide();
    $("#post-site").show();
    var reclen = $("input.sitebox:checked").length;
    if (reclen === 0) {
        alert("Please Select an entry to edit");
        return false;
    }
    if (reclen > 1) {
        alert("Please edit one record at a time");
        return false;
    }
    $.ajax({
        type: "GET",
        url: "api/v1/sites/"+$("input.sitebox:checked").prop('id'),
    }).done(function(data){
        for(var item in data){
            if (data.hasOwnProperty(item)) {
                $('#'+item).val(data[item]);
            }
        };
        $('#addSite').modal('show');
    });
}

</script>
@stop
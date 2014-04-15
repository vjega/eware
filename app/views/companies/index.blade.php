@extends('master')
<!-- Main Content -->
@section('content')


    <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Companies
                        
                    </h1>
                    
                </section>

                <!-- Main content -->
    <section class="content">

        <div class="panel">
            <div class="panel-body">
             <table id="companyList"></table>
            <div id="companyPager"></div>
        </div>
            <div class="panel-footer">
                
                <button class="btn btn-inverse" data-toggle="modal" id="showCompanyPop">New Company</button>
            <button class="btn btn-inverse" data-toggle="modal" id="editCompanyPop">Edit Selected Company</button>
            <button class="btn btn-inverse" data-toggle="modal" id="delCompany">Delete Selected Company</button>
            </div>
        </div>
    </section><!-- /.content -->

@stop


<!-- Add/edit popups -->
@section('popups')
<!-- add / Edit -->
<div class="modal fade" id="addCompany" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Company</h4>
      </div>
      <form class="form-horizontal" role="form" name="addcompanyfrm" id="addcompanyfrm" enctype="multipart/form-data">
      <div class="modal-body">      
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Company Name </label>
                        <div class="col-sm-7">
                            <input type="hidden" class="form-control" id="id" value="" placeholder="">
                            <input type="text" class="form-control validate[required,custom[onlyLetterSp],minSize[5],maxSize[50]]" 
								id="company_name" name="company_name" value="" placeholder="Enter Company Name e.g. Acme Corp.">
                        </div>
                    </div>
                </div>
				<div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Currency</label>
                        <div class="col-sm-7">
                            <select name="currency" id="currency" class="form-control validate[required,custom[onlyLetterSp],minSize[5],maxSize[50]]" >
                                <option value="AF">AFN</option>
                                <option value="AL">ALL</option>
                                <option value="DZ">DZD</option>
                                <option value="AS">USD</option>
                                <option value="AD">EUR</option>
                                <option value="AO">AOA</option>
                                <option value="AI">XCD</option>
                                <option value="AG">XCD</option>
                                <option value="AR">ARP</option>
                                <option value="AM">AMD</option>
                                <option value="AW">AWG</option>
                                <option value="AU">AUD</option>
                                <option value="AT">EUR</option>
                                <option value="AZ">AZN</option>
                                <option value="BS">BSD</option>
                                <option value="BH">BHD</option>
                                <option value="BD">BDT</option>
                                <option value="BB">BBD</option>
                                <option value="BY">BYR</option>
                                <option value="BE">EUR</option>
                                <option value="BZ">BZD</option>
                                <option value="BJ">XOF</option>
                                <option value="BM">BMD</option>
                                <option value="BT">BTN</option>
                                <option value="BO">BOV</option>
                                <option value="BA">BAM</option>
                                <option value="BW">BWP</option>
                                <option value="BV">NOK</option>
                                <option value="BR">BRL</option>
                                <option value="IO">USD</option>
                                <option value="BN">BND</option>
                                <option value="BG">BGL</option>
                                <option value="BF">XOF</option>
                                <option value="BI">BIF</option>
                                <option value="KH">KHR</option>
                                <option value="CM">XAF</option>
                                <option value="CA">CAD</option>
                                <option value="CV">CVE</option>
                                <option value="KY">KYD</option>
                                <option value="CF">XAF</option>
                                <option value="TD">XAF</option>
                                <option value="CL">CLF</option>
                                <option value="CN">CNY</option>
                                <option value="CX">AUD</option>
                                <option value="CC">AUD</option>
                                <option value="CO">COU</option>
                                <option value="KM">KMF</option>
                                <option value="CG">XAF</option>
                                <option value="CD">CDF</option>
                                <option value="CK">NZD</option>
                                <option value="CR">CRC</option>
                                <option value="HR">HRK</option>
                                <option value="CU">CUP</option>
                                <option value="CY">EUR</option>
                                <option value="CZ">CZK</option>
                                <option value="CS">CSJ</option>
                                <option value="CI">XOF</option>
                                <option value="DK">DKK</option>
                                <option value="DJ">DJF</option>
                                <option value="DM">XCD</option>
                                <option value="DO">DOP</option>
                                <option value="EC">USD</option>
                                <option value="EG">EGP</option>
                                <option value="SV">USD</option>
                                <option value="GQ">EQE</option>
                                <option value="ER">ERN</option>
                                <option value="EE">EEK</option>
                                <option value="ET">ETB</option>
                                <option value="FK">FKP</option>
                                <option value="FO">DKK</option>
                                <option value="FJ">FJD</option>
                                <option value="FI">FIM</option>
                                <option value="FR">XFO</option>
                                <option value="GF">EUR</option>
                                <option value="PF">XPF</option>
                                <option value="TF">EUR</option>
                                <option value="GA">XAF</option>
                                <option value="GM">GMD</option>
                                <option value="GE">GEL</option>
                                <option value="DD">DDM</option>
                                <option value="DE">EUR</option>
                                <option value="GH">GHC</option>
                                <option value="GI">GIP</option>
                                <option value="GR">GRD</option>
                                <option value="GL">DKK</option>
                                <option value="GD">XCD</option>
                                <option value="GP">EUR</option>
                                <option value="GU">USD</option>
                                <option value="GT">GTQ</option>
                                <option value="GN">GNE</option>
                                <option value="GW">GWP</option>
                                <option value="GY">GYD</option>
                                <option value="HT">USD</option>
                                <option value="HM">AUD</option>
                                <option value="VA">EUR</option>
                                <option value="HN">HNL</option>
                                <option value="HK">HKD</option>
                                <option value="HU">HUF</option>
                                <option value="IS">ISJ</option>
                                <option value="IN">INR</option>
                                <option value="ID">IDR</option>
                                <option value="IR">IRR</option>
                                <option value="IQ">IQD</option>
                                <option value="IE">IEP</option>
                                <option value="IL">ILS</option>
                                <option value="IT">ITL</option>
                                <option value="JM">JMD</option>
                                <option value="JP">JPY</option>
                                <option value="JO">JOD</option>
                                <option value="KZ">KZT</option>
                                <option value="KE">KES</option>
                                <option value="KI">AUD</option>
                                <option value="KP">KPW</option>
                                <option value="KR">KRW</option>
                                <option value="KW">KWD</option>
                                <option value="KG">KGS</option>
                                <option value="LA">LAJ</option>
                                <option value="LV">LVL</option>
                                <option value="LB">LBP</option>
                                <option value="LS">ZAR</option>
                                <option value="LR">LRD</option>
                                <option value="LY">LYD</option>
                                <option value="LI">CHF</option>
                                <option value="LT">LTL</option>
                                <option value="LU">LUF</option>
                                <option value="MO">MOP</option>
                                <option value="MK">MKN</option>
                                <option value="MG">MGF</option>
                                <option value="MW">MWK</option>
                                <option value="MY">MYR</option>
                                <option value="MV">MVR</option>
                                <option value="ML">MAF</option>
                                <option value="MT">MTL</option>
                                <option value="MH">USD</option>
                                <option value="MQ">EUR</option>
                                <option value="MR">MRO</option>
                                <option value="MU">MUR</option>
                                <option value="YT">EUR</option>
                                <option value="MX">MXV</option>
                                <option value="FM">USD</option>
                                <option value="MD">MDL</option>
                                <option value="MC">MCF</option>
                                <option value="MN">MNT</option>
                                <option value="ME">EUR</option>
                                <option value="MS">XCD</option>
                                <option value="MA">MAD</option>
                                <option value="MZ">MZM</option>
                                <option value="MM">MMK</option>
                                <option value="NA">ZAR</option>
                                <option value="NR">AUD</option>
                                <option value="NP">NPR</option>
                                <option value="NL">NLG</option>
                                <option value="AN">ANG</option>
                                <option value="NC">XPF</option>
                                <option value="NZ">NZD</option>
                                <option value="NI">NIO</option>
                                <option value="NE">XOF</option>
                                <option value="NG">NGN</option>
                                <option value="NU">NZD</option>
                                <option value="NF">AUD</option>
                                <option value="MP">USD</option>
                                <option value="NO">NOK</option>
                                <option value="OM">OMR</option>
                                <option value="PK">PKR</option>
                                <option value="PW">USD</option>
                                <option value="PA">USD</option>
                                <option value="PG">PGK</option>
                                <option value="PY">PYG</option>
                                <option value="YD">YDD</option>
                                <option value="PE">PEH</option>
                                <option value="PH">PHP</option>
                                <option value="PN">NZD</option>
                                <option value="PL">PLN</option>
                                <option value="PT">TPE</option>
                                <option value="PR">USD</option>
                                <option value="QA">QAR</option>
                                <option value="RO">ROK</option>
                                <option value="RU">RUB</option>
                                <option value="RW">RWF</option>
                                <option value="RE">EUR</option>
                                <option value="SH">SHP</option>
                                <option value="KN">XCD</option>
                                <option value="LC">XCD</option>
                                <option value="PM">EUR</option>
                                <option value="VC">XCD</option>
                                <option value="WS">WST</option>
                                <option value="SM">EUR</option>
                                <option value="ST">STD</option>
                                <option value="SA">SAR</option>
                                <option value="SN">XOF</option>
                                <option value="RS">CSD</option>
                                <option value="SC">SCR</option>
                                <option value="SL">SLL</option>
                                <option value="SG">SGD</option>
                                <option value="SK">SKK</option>
                                <option value="SI">SIT</option>
                                <option value="SB">SBD</option>
                                <option value="SO">SOS</option>
                                <option value="ZA">ZAL</option>
                                <option value="ES">ESB</option>
                                <option value="LK">LKR</option>
                                <option value="SD">SDG</option>
                                <option value="SR">SRG</option>
                                <option value="SJ">NOK</option>
                                <option value="SZ">SZL</option>
                                <option value="SE">SEK</option>
                                <option value="CH">CHW</option>
                                <option value="SY">SYP</option>
                                <option value="TW">TWD</option>
                                <option value="TJ">TJR</option>
                                <option value="TZ">TZS</option>
                                <option value="TH">THB</option>
                                <option value="TL">USD</option>
                                <option value="TG">XOF</option>
                                <option value="TK">NZD</option>
                                <option value="TO">TOP</option>
                                <option value="TT">TTD</option>
                                <option value="TN">TND</option>
                                <option value="TR">TRL</option>
                                <option value="TM">TMM</option>
                                <option value="TC">USD</option>
                                <option value="TV">AUD</option>
                                <option value="SU">SUR</option>
                                <option value="UG">UGS</option>
                                <option value="UA">UAK</option>
                                <option value="AE">AED</option>
                                <option value="GB">GBP</option>
                                <option value="US">USS</option>
                                <option value="UM">USD</option>
                                <option value="UY">UYI</option>
                                <option value="UZ">UZS</option>
                                <option value="VU">VUV</option>
                                <option value="VE">VEB</option>
                                <option value="VN">VNC</option>
                                <option value="VG">USD</option>
                                <option value="VI">USD</option>
                                <option value="WF">XPF</option>
                                <option value="EH">MAD</option>
                                <option value="YE">YER</option>
                                <option value="YU">YUM</option>
                                <option value="ZR">ZRZ</option>
                                <option value="ZM">ZMK</option>
                                <option value="ZW">ZWC</option>
                            </select>
                        </div>
                    </div>
                </div> 		
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Country</label>
                        <div class="col-sm-7">
                            <select name="country" id="country" class="form-control validate[required,minSize[6]. maxSize[12]]">
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
                        <label for="" class="col-sm-5 control-label">Region</label>
                        <div class="col-sm-7">
                            <select name="region" id="region" class="form-control">
                                <option value="North">North</option>
                                <option value="South">South</option>
                                <option value="West">West</option>
                                <option value="East">East</option>
                            </select>
                        </div>
                    </div>
                </div>     
            </div>
            <div class="row">
                 <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Site Type</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="site_type" name="site_type" value="" placeholder="Enter Company Name e.g. Acme Corp.">
                        </div>
                    </div>
                </div> 
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">No. of Site</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="number_of_site" name="number_of_site" value="" placeholder="Enter No. of Site">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">City</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control validate[required]"  
							id="city" name="city" placeholder="Type City Here" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Google Earth</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" id="google_earth" name="google_earth" placeholder="Type Google Earth Here"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Address</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" id="address1" name="address1" placeholder="Type Address 1 Here"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Website</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="web_site" value="" name="web_site" placeholder="Type Website URL Here">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Postal Code</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="postal_code" name="postal_code" value="" placeholder="Type Postal Code Here">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Email</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" id="email" value="" name="email" placeholder="Type Email Here">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Telephone 1</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="tel_number1" value="" name="tel_number1" placeholder="Type Telephone Number 1 Here"> 
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Telephone 2</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="tel_number2" value="" name="tel_number2" placeholder="Type Telephone Number 2 Here">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Fax No</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="fax_number" value="" name="fax_number" placeholder="Type Fax Number Here">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Tax</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="tax" value="" name="tax" placeholder="Type Tax Here">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Order Priority</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="order_priority" value="" name="order_priority" placeholder="Type Order Priority Here">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Service Level</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="service_level" value="" name="service_level" placeholder="Type Service Level Here">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Service Provided</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="service_provided" value="" name="service_provided" placeholder="Type Service Provided">  
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Biz Type</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="biz_type" value="" name="biz_type" placeholder="Type Biz Type Here">    
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Biz Hours</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="biz_hours" value="" name="biz_hours" placeholder="Type Biz Hours Here">  
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Credit Limit</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="credit_limit" value="" name="credit_limit" placeholder="Type Credit Limit Here">    
                        </div>
                    </div>
                </div>
            </div>
            <!-- div class="row">
                
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">3PL Contact</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="contact_name" value="" name="contact_name" placeholder="Type 3PL Contact Here">    
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Service Contract File</label>
                        <div class="col-sm-7">
						<span class="btn btn-default btn-file col-sm-12">
							Browse <input type="file" id="service_contract_file" name="service_contract_file">
						</span>
                        </div>
                    </div>
                </div>
				<div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Operation Policy File</label>
                        <div class="col-sm-7">
							<span class="btn btn-default btn-file col-sm-12">
								Browse <input type="file" id="operation_policy_file" name="operation_policy_file" >
							</span>
	                    </div>
                    </div>
                </div>				
            </div>
            <div class="row">
				<div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Company Instruction File</label>
                        <div class="col-sm-6">
						<span class="btn btn-default btn-file col-sm-12">
							Browse <input type="file" id="company_instruction_file" name="company_instruction_file" >
						</span>
                        </div>
                    </div>
                </div>                
            </div -->
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  id="save-company">Save Company</button>
        <button type="button" class="btn btn-primary"  id="post-company">Update Company</button>
      </div>
    </div>
</div>
@stop


<!-- Page based Scripts -->
@section('script')
<script  type="text/javascript">

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
	// alert($("#addcompanyfrm").validationEngine());
    $("#save-company").click(function(){
		if (($("#addcompanyfrm").validationEngine("validate"))===true) {
			save_company();
		}
    });
    $("#showCompanyPop").click(function(){
        show_add_modal();
    });
    $("#editCompanyPop").click(function(){
        show_edit_modal();
    });
    $("#delCompany").click(function(){
        del_company();
    });
    $("#post-company").click(function(){
        update_company();
    });
});





var panelWidth = jQuery(".panel").width()-30;

jQuery("#companyList").jqGrid({ 
    url:'api/v1/companies',
    datatype: "json",
    height: 375,
    width: panelWidth,
    colNames:['<input type="checkbox"/>','Company Name','Country','Region','Currency','Number Of Site','Site Type','City','Google Earth','Address1','Address2','Address3','State','Postal Code','Email','Tel Number1','Tel Number2','Fax Number','Tax','Order Priority','Service Level','Service Provided','Biz Type','Biz Hours','Credit Limit','Web Site','Contact Name'],
    colModel:[
        {name:'select'},
        {name:'company_name'},
		{name:'country'},
		{name:'region'},
		{name:'currency'},
		{name:'number_of_site'},
		{name:'site_type'},
		{name:'city'},
		{name:'google_earth'},
		{name:'address1'},
		{name:'address2'},
		{name:'address3'},
		{name:'state'},
		{name:'postal_code'},
		{name:'email'},
		{name:'tel_number1'},
		{name:'tel_number2'},
		{name:'fax_number'},
		{name:'tax'},
		{name:'order_priority'},
		{name:'service_level'},
		{name:'service_provided'},
		{name:'biz_type'},
		{name:'biz_hours'},
		{name:'credit_limit'},
		{name:'web_site'},
		{name:'contact_name'},
    ], 
    shrinkToFit: false,
    rowNum:10, 
    rowList:[10,20,30], 
    pager: '#companyPager', 
    viewrecords: true, 
    sortorder: "desc", 
    loadonce: true
});

var save_company = function() {
	
    $.ajax({
        type: "POST",
        data: {'data':serilaizeJson("#addcompanyfrm")},
        url: "api/v1/companies",
		async: false
    }).done(function(data){
		
        if(data) {
            $('#addCompany').modal('hide');
            location.reload();
        }
    });
    
};

var update_company = function() {
    $.ajax({
        type: "PATCH",
        data: {'data': serilaizeJson("#addcompanyfrm") },
        url: "api/v1/companies/"+$("#id").val()
    }).done(function(data){
        if(data) {
            $('#addCompany').modal('hide');
            location.reload();
        }
    });
    
};

var del_company = function() {
    var checkboxes = [];
    $("input.companybox:checked").each(function(){
        checkboxes.push($(this).prop('id'));
    })
    $.ajax({
        type: "DELETE",
        data: {'data':'data'},
        url: "api/v1/companies/"+checkboxes.join(','),
    }).done(function(data){
        if (data==="true") {
            location.reload();
        }
    });
    
};

var show_add_modal = function () {
    $("#post-company").hide();
    $("#save-company").show();
    $('#addcompanyfrm').each(function() {
        this.reset();
    });
    $('#addCompany').modal('show');
}

var show_edit_modal = function () {
    $("#save-company").hide();
    $("#post-company").show();
    var reclen = $("input.companybox:checked").length;
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
        url: "api/v1/companies/"+$("input.companybox:checked").prop('id'),
    }).done(function(data){
        for(var item in data){
            if (data.hasOwnProperty(item)) {
                $('#'+item).val(data[item]);
            }
        };
        $('#addCompany').modal('show');
    });
}

</script>
@stop
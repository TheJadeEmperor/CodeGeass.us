<?
include($dir.'admin/fanlisting/flCode.php');

//join button is clicked
if($_POST[join])//error checking
{
	 if($_POST[email] != '' && $_POST[name] != '' && $_POST[comments] != '')
	 {
		 if($_POST[password] != "")	
		 {
			if($_POST[password] == $_POST[vpassword])
			{
				if($_POST[antispam] == "anime" || $_POST[antispam] == "ANIME") 
				{
					//check if entry already exists 
					$sel = 'select email from '.$fanlistName.' where email="'.$_POST[email].'"';
					$res = mysql_query($sel, $conn) or $error = mysql_error();
					
					if (mysql_num_rows($res) == 0)
					{
						$ins = 'insert into '.$fanlistName.' (email, name, country, url, pending, password, showemail, 
						showurl, added)  values
						("'.$_POST[email].'", "'.$_POST[name].'", "'.$_POST[country].'", "'.$_POST[url].'", "0", 
						"'.md5($_POST[password]).'", "1", "1", "1") ' ;
						
						mysql_query($ins, $conn) or $error =  mysql_error();
					
						
						include($dir.'admin/fanlisting/sendWelcomeEmail.php');
						
						$msg = '<p><b>You have successfully joined our fanlistings. You should receive a confirmation
						email shortly. If you do not receive the email, please check your spam folders. 
						Your membership has been added to the members list and should be reflected within
						the hour.</b></p>';
					}//if
					else
						$err = 'You have already registered under that email address.';
				}//if
				else
					$err = 'You didn\'t type anime into the box!';
			}
			else
				$err = 'Passwords do not match.';
	 	}
	 	else
	 		$err = 'You did not type in a password.';
	 }//if
	 else
  		$err = 'You did not fill in all fields.';
}//if

if($err != "")
	$err = '<p>Please fix the following errors before continuing:<br/>'.$err.'</p>';


$explainText = 'Please use the form below for joining the Fanlist. Please hit the submit button only once. 
Your entry is fed instantly into the database, and your email address is checked for duplicates. Passwords are 
encrypted into the database and will not be seen by anyone else other than you. If left blank, a password 
will be generated for you.';
	
echo div( $explainText );
	
?>

<br><br>
<div class="content">If you encounter problems, please feel free to email me. 
<input type=button value="TheEmperor@codegeass.us">
<br>The fields with asterisks (*) are required fields.</div>
<br>

<?=$err?><?=$msg?>

<br/><br/>
<form method="post" action="join.php">
<table>
<tr valign="top">
	<td>
   		<input type="hidden" name="join" value="yes" />
		<table>
		<tr>
			<td> <span class="show_join_name_label">* Name: </span></td>
   			<td> <input type="text" name="name" value="<?=$_POST[name]?>" class="input" size=30/></td>
		</tr><tr>
			<td> <span class="show_join_email_label">* Email address: </span></td>
			<td> <input type="text" name="email" value="<?=$_POST[email]?>" class="input" size=30/></td>
		</tr><tr>
			<td> <span  class="show_join_url_label">* Website URL:</span></td>
			<td> <input type="text" name="url" value="<?=$_POST[url]?>" class="input" size=30/></td>
		</table>
	
		<p class="show_join_country">
		<span style="display: block;" class="show_join_country_label">* Country</span>    
		<select name="country" class="show_join_country_field">
		<option>United States</option>
		<option>Afghanistan</option>
		<option>Albania</option>
		<option>Algeria</option>
		<option>Andorra</option>
		<option>Angola</option>
		<option>Anguilla</option>
		<option>Antigua/Barbuda</option>
		<option>Argentina</option>
		<option>Armenia</option>
		<option>Aruba</option>
		<option>Australia</option>
		<option>Austria</option>
		<option>Azerbaijan</option>
		<option>Bahamas</option>
		<option>Bahrain</option>
		<option>Bangladesh</option>
		<option>Barbados</option>
		<option>Belarus</option>
		<option>Belgium</option>
		<option>Belize</option>
		<option>Benin</option>
		<option>Bermuda</option>
		<option>Bhutan</option>
		<option>Bolivia</option>
		<option>Bosnia</option>
		<option>Botswana</option>
		<option>Bouvet Island</option>
		<option>Brazil</option>
		<option>Brunei</option>
		<option>Bulgaria</option>
		<option>Burkina Faso</option>
		<option>Burundi</option>
		<option>Cambodia</option>
		<option>Cameroon</option>
		<option>Canada</option>
		<option>Cape Verde</option>
		<option>Cayman Islands</option>
		<option>Central African Republic</option>
		<option>Chad</option>
		<option>Chile</option>
		<option>China</option>
		<option>Christmas Island</option>
		<option>Cocos Isles</option>
		<option>Colombia</option>
		<option>Comoros</option>
		<option>Congo</option>
		<option>Cook Islands</option>
		<option>Costa Rica</option>
		<option>Croatia</option>
		<option>Cuba</option>
		<option>Cyprus</option>
		<option>Czech Republic</option>
		<option>Denmark</option>
		<option>Djibouti</option>
		<option>Dominica</option>
		<option>Dominican Republic</option>
		<option>East Timor</option>
		<option>Ecuador</option>
		<option>Egypt</option>
		<option>El Salvador</option>
		<option>England</option>
		<option>Equatorial Guinea</option>
		<option>Eritrea</option>
		<option>Estonia</option>
		<option>Ethiopia</option>
		<option>Falkland Islands</option>
		<option>Faroe Islands</option>
		<option>Fiji</option>
		<option>Finland</option>
		<option>France</option>
		<option>French Guiana</option>
		<option>French Polynesia</option>
		<option>French Southern Territory</option>
		<option>Gabon</option>
		<option>Gambia</option>
		<option>Georgia</option>
		<option>Germany</option>
		<option>Ghana</option>
		<option>Gibraltar</option>
		<option>Greece</option>
		<option>Greenland</option>
		<option>Grenada</option>
		<option>Guadeloupe</option>
		<option>Guam</option>
		<option>Guatemala</option>
		<option>Guinea</option>
		<option>Guinea-Bissau</option>
		<option>Guyana</option>
		<option>Haiti</option>
		<option>Honduras</option>
		<option>Hong Kong</option>
		<option>Hungary</option>
		<option>Iceland</option>
		<option>India</option>
		<option>Indonesia</option>
		<option>Iran</option>
		<option>Iraq</option>
		<option>Ireland</option>
		<option>Israel</option>
		<option>Italy</option>
		<option>Ivory Coast</option>
		<option>Jamaica</option>
		<option>Japan</option>
		<option>Jordan</option>
		<option>Kazakhstan</option>
		<option>Kenya</option>
		<option>Kiribati</option>
		<option>Kuwait</option>
		<option>Kyrgyzstan</option>
		<option>Laos</option>
		<option>Latvia</option>
		<option>Lebanon</option>
		<option>Lesotho</option>
		<option>Liberia</option>
		<option>Libya</option>
		<option>Liechtenstein</option>
		<option>Lithuania</option>
		<option>Luxembourg</option>
		<option>Macau</option>
		<option>Macedonia</option>
		<option>Madagascar</option>
		<option>Malawi</option>
		<option>Malaysia</option>
		<option>Maldives</option>
		<option>Mali</option>
		<option>Malta</option>
		<option>Marshall Islands</option>
		<option>Martinique</option>
		<option>Mauritania</option>
		<option>Mauritius</option>
		<option>Mayotte</option>
		<option>Mexico</option>
		<option>Micronesia</option>
		<option>Moldova</option>
		<option>Monaco</option>
		<option>Mongolia</option>
		<option>Montenegro</option>
		<option>Montserrat</option>
		<option>Morocco</option>
		<option>Mozambique</option>
		<option>Myanmar</option>
		<option>Namibia</option>
		<option>Nauru</option>
		<option>Nepal</option>
		<option>Netherlands</option>
		<option>Netherlands Antilles</option>
		<option>New Caledonia</option>
		<option>New Zealand</option>
		<option>Nicaragua</option>
		<option>Niger</option>
		<option>Nigeria</option>
		<option>Niue</option>
		<option>Norfolk Island</option>
		<option>North Korea</option>
		<option>Northern Ireland</option>
		<option>Northern Mariana Isles</option>
		<option>Norway</option>
		<option>Oman</option>
		<option>Pakistan</option>
		<option>Palau</option>
		<option>Panama</option>
		<option>Papua New Guinea</option>
		<option>Paraguay</option>
		<option>Peru</option>
		<option>Philippines</option>
		<option>Pitcairn</option>
		<option>Poland</option>
		<option>Portugal</option>
		<option>Puerto Rico</option>
		<option>Qatar</option>
		<option>Reunion</option>
		<option>Romania</option>
		<option>Russia</option>
		<option>Rwanda</option>
		<option>Saint Lucia</option>
		<option>Saint Vincent/Grenadines</option>
		<option>Samoa</option>
		<option>San Marino</option>
		<option>Sao Tome/Principe</option>
		<option>Saudi Arabia</option>
		<option>Scotland</option>
		<option>Senegal</option>
		<option>Serbia</option>
		<option>Seychelles</option>
		<option>Sierra Leona</option>
		<option>Singapore</option>
		<option>Slovakia</option>
		<option>Slovenia</option>
		<option>Solomon Islands</option>
		<option>Somalia</option>
		<option>South Africa</option>
		<option>South Korea</option>
		<option>Spain</option>
		<option>Sri Lanka</option>
		<option>St. Helena</option>
		<option>St. Pierre/Miquelon</option>
		<option>Sudan</option>
		<option>Suriname</option>
		<option>Svalbard/Jan Mayen Islands</option>
		<option>Swaziland</option>
		<option>Sweden</option>
		<option>Switzerland</option>
		<option>Syria</option>
		<option>Taiwan</option>
		<option>Tajikistan</option>
		<option>Tanzania</option>
		<option>Thailand</option>
		<option>Togo</option>
		<option>Tokelau</option>
		<option>Tonga</option>
		<option>Trinidad/Tobago</option>
		<option>Tunisia</option>
		<option>Turkey</option>
		<option>Turkmenistan</option>
		<option>Turks/Caicos Islands</option>
		<option>Tuvalu</option>
		<option>Uganda</option>
		<option>Ukraine</option>
		<option>United Arab Emirates</option>
		<option>United States</option>
		<option>US Minor Outlying Isles</option>
		<option>Uruguay</option>
		<option>Uzbekistan</option>
		<option>Vanuatu</option>
		<option>Vatican</option>
		<option>Venezuela</option>
		<option>Vietnam</option>
		<option>Virgin Isles (British)</option>
		<option>Virgin Isles (U.S.)</option>
		<option>Wales</option>
		<option>Wallis and Futuna Islands</option>
		<option>Western Sahara</option>
		<option>Yemen</option>
		<option value="Serbia/Montenegro">Yugoslavia (Serbia/Montenegro)</option>
		<option>Zambia</option>
		<option>Zimbabwe</option>
		</select>
		</p>
   
		<br/>
		<p class="show_join_password">
		<span style="display: block;" class="show_join_password_label">Password (to change your details; type twice):</span>	
		<input type="password" name="password" class="input" /> &nbsp
		<input type="password" name="vpassword" class="input" />
		</p>
	
		<br/>
		<p class="show_join_comments">
		<span style="display: block;" class="show_join_comments_label">How did you find out about this site: </span>
		<textarea name="comments" rows="3" cols="36" class="input" ><?=$_POST[comments]?></textarea>
		</p>
	
		<br/>
		<span>Please type "anime" into the box:
		<p class="anti"><input type="text" name="antispam" class="input"/></p>
		</span>
		
		<br/>
		<p class="show_join_submit">
		<span style="display: block;" class="show_join_send_account_info">
		<input type="checkbox" name="send_account_info" value="yes" checked="checked" class="show_join_send_account_info_field" />
		<span class="show_join_send_account_info_label">Yes, send me my account information!</span>
		</span>
		
	   	<input type="submit" name="join" value="Join the Fanlist" class="submit_button" />
		<input type="reset" value="Clear form" class="submit_button" />
		</p>
	
	</td><td>
		<p class="show_join_email_settings">
		<span style="display: block;" class="show_join_email_settings_label">Show email address on the list? </span>

		<span style="display: block" class="show_join_email_settings_yes">
		<input type="radio" name="show_email" value="1" class="show_join_email_settings_field" checked="checked" />
		<span class="show_join_email_settings_field_label"> Yes (SPAM-protected on the site)</span>
      
      	</span><span style="display: block" class="show_join_email_settings_no">

		<input type="radio" name="show_email" value="0" class="show_join_email_settings_field" />
		<span class="show_join_email_settings_field_label">No</span>
   </span>
   </td>
</tr>
</table>
</form>
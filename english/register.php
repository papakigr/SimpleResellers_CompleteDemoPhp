<?php ob_start();
include('config.php');
ini_set("max_execution_time", 120);


error_reporting(0);


 
 	

	$subject = "Domain Request";
	$headers ="Content-type:text/html; charset=UTF-8";
	$headers  = 'MIME-Version: 1.0' . "\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\n";

	$domainNames = $_POST['domainNames'];

	
	
	$businessTypeRadioButton =  $_POST['businessTypeRadioButton'];

	$drast =  $_POST['businessDrast'];
	$type = $_POST['DropDownListCompanyType'];
	$doy = $_POST['doy'];
	$stateProvince = $_POST['stateProvince'];
	
	$fullname  = $_POST['fullname'];
	//echo $fullname;
	$firstname = $_POST['firstname'];
	//echo $firstname;
	$lastname  = $_POST['lastname'];
	//echo $lastname;
	$emailText = $_POST['emailText'];
	$postcode  = $_POST['postcode'];
	$address1  = $_POST['address1'];
	$phoneNum = $_POST['phoneNum'];
	$mobile = $_POST['mobile'];
	$fax = $_POST['fax'];
	
	$stateProvince = $_POST['stateProvince'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	
	$afm  = $_POST['afm'];
	
	$chkNewsletters = $_POST['chkNewsletters'];
	
	$text = "<html><body>

<table align=\"center\" border=\"0\" cellspacing=\"0\" width=\"100%\">
                                                        <tbody>
                                                     
                                                          <tr>
                                                            <td>
															<table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#FFFFFF\" style=\"margin:1px \">
   	<tr>
      <td colspan=\"2\">";
	   if($businessTypeRadioButton == 0) 
	   {
	  	$text = $text."<label>
        <input name=\"businessTypeRadioButton\" value=\"0\" type=\"radio\" id=\"id0\"  checked=\"checked\" >
        Individual</label>";
	   }
	   else 
	  {
	  	$text = $text."<label>		
    	<input name=\"businessTypeRadioButton\" value=\"0\" type=\"radio\" id=\"id0\">
        Individual</label>";
		}	
	   if($businessTypeRadioButton == 1)
	   {
	    $text = $text ."<label>
        <input id=\"et1\" type=\"radio\" name=\"businessTypeRadioButton\"  checked=\"checked\" value=\"1\">
        Business</label>";
	   }
	   else 
	   {
		 $text  = $text."<label>	
      	 <input id=\"et1\" type=\"radio\" name=\"businessTypeRadioButton\"  checked=\"checked\" value=\"1\">
         Business</label>";
		}
	   if($businessTypeRadioButton == 2)
	   {
	   $text = $text."<label>
        <input id=\"radio\" type=\"radio\" name=\"businessTypeRadioButton\" checked=\"checked\">
        Public Organization</label> ";
		}
	   else{	
		$text = $text."<label>
        <input id=\"radio\" type=\"radio\" name=\"businessTypeRadioButton\">
        Public Organization</label> ";
		}
		$text = $text."
		</td>
    </tr>";
	
	
	if ($businessTypeRadioButton == 1) {
		
	$text= $text."<tr>
			<td colspan=\"2\">
			<table width=\"100%\">
				<tr>
				<td width=\"40%\">Company Type:</td>
				<td width=\"60%\" align=\"left\">". $type."</td> </tr>
	  </table></div>	  </td></tr>";
  	}    
	$text = $text."<tr align=\"left\">
      <td width=\"40%\" align=\"right\" valign=\"top\" class=\"medgray\"><div align=\"left\">Fullname : </div></td>
      <td valign=\"middle\">".$fullname."</td>
    </tr>
    <tr align=\"left\">
      <td width=\"40%\" align=\"right\" class=\"medgray\"><div align=\"left\">&nbsp;Firstname : </div></td>
      <td><label>".$firstname."</label></td>
    </tr>
    <tr align=\"left\">
      <td align=\"right\"  width=\"40%\"><div align=\"left\">&nbsp;Lastname : </div></td>
      <td>".$lastname."</td>
    </tr>";
    
	if ($businessTypeRadioButton == 1 || $businessTypeRadioButton  == 2){
	$text = $text."<tr><td colspan=\"2\">
  	<div id=\"afm_tr\" style=\"display:block\">
	<table width=\"100%\">
  	<tr align=\"left\" valign=\"top\">
       <td  width=\"40%\"><div align=\"left\">Vat number : </div></td>
       <td  width=\"60%\">".$afm."</td>
  	</tr>
	  </table>
        </div>
    </td></tr>
	<tr><td colspan=\"2\">
	<div id=\"doy_tr\" style=\"display:block\">
	<table width=\"100%\">
     <tr align=\"left\" bordercolordark=\"#FFFFFF\" bgcolor=\"#FFFFFF\">
         <td align=\"left\" width=\"40%\"><div align=\"left\">Tax office : </div></td>
         <td align=\"left\" width=\"60%\">".$doy."</td>
      </tr>
	 </table></div></td></tr>";
   }
	if ($businessTypeRadioButton == 2) {
	$text = $text."<tr><td colspan=\"2\">
      <div id=\"drast_ep\" style=\"display:block\">
	  <table width=\"100%\">
            <tr align=\"left\" valign=\"top\">
               <td nowrap=\"nowrap\" width=\"40%\">Business Type :</td>
			 
               <td width=\"60%\">". $drast."</td>
            </tr>
		</table>	
        </div>
		</td></tr>";
	}
	$text = $text."<tr align=\"left\">
      <td align=\"right\" ><div align=\"left\">&nbsp;Email : </div></td>
      <td><label>".$emailText."</label></td>
    </tr>
    <tr align=\"left\">
      <td align=\"right\" class=\"medgray\"><div align=\"left\">&nbsp;Address : </div></td>
      <td><label>".$address1."</label></td>
    </tr>
    <tr align=\"left\">
      <td align=\"right\" width=\"40%\"><div align=\"left\">&nbsp;State :</div></td>
      <td>".$stateProvince."</td>
    </tr>
    <tr align=\"left\">
      <td align=\"right\" class=\"medgray\"><div align=\"left\">&nbsp;City :</div></td>
      <td>". $city."</td>
    </tr>
    <tr align=\"left\">
      <td align=\"right\" class=\"medgray\"><div align=\"left\">&nbsp;Postcode : </div></td>
      <td>". $postcode."</td>
    </tr>
    <tr align=\"left\">
      <td align=\"right\" class=\"medgray\"><div align=\"left\">&nbsp;Country :</div></td>
      <td class=\"style15\">".$country."</td>
    </tr>
    <tr align=\"left\">
      <td align=\"right\" class=\"medgray\"><div align=\"left\">&nbsp;Phone :</div></td>
      <td><label>".$phoneNum."</label></td>
    </tr>";
	if(strlen($mobile) != 0) {
	$text = $text."<tr align=\"left\">
      <td align=\"right\" ><div align=\"left\">&nbsp;Mobile (Optional): </div></td>
      <td>".$mobile."</td>
    </tr>";
	} 
	if(strlen($fax) != 0){
    	$text = $text."<tr align=\"left\">
      <td align=\"right\"><div align=\"left\">&nbsp;Fax (Optional): </div></td>
      <td>".$fax."</td>
    </tr>";
	 }
    $text = $text."
	<tr align=\"left\">
      <td colspan=\"2\">&nbsp;</td>
    </tr>
   <TR>
							<TD width=\"40%\" height=\"25\">&nbsp;</TD>
							<TD width=\"895\" height=\"25\">&nbsp;</TD>
	</TR>
	
	<TR>
							
							<TD height=\"25\" colspan=\"2\">";
			if($chkNewsletters == 1) {						
	   			$text = $text."<input name=\"chkNewsletters\" id=\"chkNewsletters\" type=\"checkbox\" checked=\"checked\" value=\"1\" />";
			}
										
						 $text = $text. "Newsletters</TD>
						</TR>
						<TR>
							
							<TD colspan=\"2\" class=\"black\" height=\"1\" style=\"padding:0\">&nbsp;</TD>
						</TR>
						<TR>
							<TD width=\"40%\" height=\"25\">&nbsp;</TD>
							<TD width=\"895\" height=\"25\"></TD>
						</TR>
  </table></td>
                                                          </tr>
                                                          <tr>
                                                            <td>                                                            </td>
                                                          </tr>
<tr><td colspan=\"2\">requested to register the domains: </td></tr>														 <tr><td colspan=\"2\">".$domainNames."</td></tr> 
                                                        </tbody>
                                                    </table>
													
</body>
</html>
";
	
	mail($admin_email,$subject,$text,$headers);
		
	//echo $text;
	 header("Location:".$url);
	ob_flush();?>





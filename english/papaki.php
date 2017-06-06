<?php
set_time_limit(200) ;
//version 9 :  noemvrios 2011
//require ('libs/ActiveLink/alink_include.php');
//import('org.active-link.net.HTTPClient');
//import('org.active-link.xml.XMLDocument');
require ('libs/HttpClient.class.php');
require_once('json.php');


function papaki_getConfigArray() {
	$configarray = array(
	// "Username" => array( "Type" => "text", "Size" => "20", "Description" => "Enter the username given from Papaki (Leave empty if Apikey is used)", ),
//	 "Password" => array( "Type" => "password", "Size" => "20", "Description" => "Enter the password given from Papaki (Leave empty if Apikey is used)", ),
	 "APIkey" => array( "Type" => "text", "Size" => "100", "Description" => "Enter the apikey", ),
	 "PostUrl" => array( "Type" => "text", "Size" => "64", "Description" => "Enter https://api.papaki.com/register_url2.aspx", ),
	 "TestMode" => array( "Type" => "no", ),
	 "Convert Punycode domains" => array( "Type" => "no", ),
	);
	return $configarray;
}
function isgrdomain($domainname){

return substr($domainname, strlen('.gr')*-1) == '.gr';
}


function iseudomain($domainname){

return substr($domainname, strlen('.eu')*-1) == '.eu';
}

function encodetolatin($mystring){
	   
	
	 $mystring=str_replace("Α","&Alpha;",$mystring);  
	 $mystring=str_replace("Β","&Beta;",$mystring);  
	 $mystring=str_replace("Γ","&Gamma;",$mystring);  
	 $mystring=str_replace("Δ","&Delta;",$mystring);  
	 $mystring=str_replace("Ε","&Epsilon;",$mystring);  
	 $mystring=str_replace("Ζ","&Zeta;",$mystring);  
	 $mystring=str_replace("Η","&Eta;",$mystring);  
	 $mystring=str_replace("Θ","&Theta;",$mystring);  
	 $mystring=str_replace("Ι","&Iota;",$mystring);  
	 $mystring=str_replace("Κ","&Kappa;",$mystring);  
	 $mystring=str_replace("Λ","&Lambda;",$mystring);  
	 $mystring=str_replace("Μ","&Mu;",$mystring);  
	 $mystring=str_replace("Ν","&Nu;",$mystring);  
	 $mystring=str_replace("Ξ","&Xi;",$mystring);  
	 $mystring=str_replace("Ο","&Omicron;",$mystring);  
	 $mystring=str_replace("Π","&Pi;",$mystring);  
	 $mystring=str_replace("Ρ","&Rho;",$mystring);  
	 $mystring=str_replace("Σ","&Sigma;",$mystring);  
	 $mystring=str_replace("Τ","&Tau;",$mystring);  
	 $mystring=str_replace("Υ","&Upsilon;",$mystring);  
	 $mystring=str_replace("Φ","&Phi;",$mystring);  
	 $mystring=str_replace("Χ","&Chi;",$mystring);  
	 $mystring=str_replace("Ψ","&Psi;",$mystring);  
	 $mystring=str_replace("Ω","&Omega;",$mystring);  
	 $mystring=str_replace("α","&alpha;",$mystring);  
	 $mystring=str_replace("β","&beta;",$mystring);  
	 $mystring=str_replace("γ","&gamma;",$mystring);  
	 $mystring=str_replace("δ","&delta;",$mystring);  
	 $mystring=str_replace("ε","&epsilon;",$mystring);  
	 $mystring=str_replace("ζ","&zeta;",$mystring);  
	 $mystring=str_replace("η","&eta;",$mystring);  
	$mystring=str_replace("θ","&theta;",$mystring);  
	$mystring=str_replace("ι","&iota;",$mystring);  
	$mystring=str_replace("κ","&kappa;",$mystring);  
	$mystring=str_replace("λ","&lambda;",$mystring);  
	$mystring=str_replace("μ","&mu;",$mystring);  
	$mystring=str_replace("ν","&nu;",$mystring);  
	$mystring=str_replace("ξ","&xi;",$mystring);  
	$mystring=str_replace("ο","&omicron;",$mystring);  
	$mystring=str_replace("π","&pi;",$mystring);  
	$mystring=str_replace("ρ","&rho;",$mystring);  
	$mystring=str_replace("σ","&sigma;",$mystring);  
	$mystring=str_replace("τ","&tau;",$mystring);  
	$mystring=str_replace("υ","&upsilon;",$mystring);  
	$mystring=str_replace("φ","&phi;",$mystring);  
	$mystring=str_replace("χ","&chi;",$mystring);  
	$mystring=str_replace("ψ","&psi;",$mystring);  
	$mystring=str_replace("ω","&omega;",$mystring);  
	$mystring=str_replace("ς","&sigmaf;",$mystring); 
	
	          
	              
	$mystring=str_replace("ά","&#940;",$mystring); 
	$mystring=str_replace("έ","&#941;",$mystring); 
	$mystring=str_replace("ώ","&#974;",$mystring); 
	$mystring=str_replace("ύ","&#973;",$mystring); 
	$mystring=str_replace("ί","&#943;",$mystring); 
	$mystring=str_replace("ό","&#972;",$mystring); 
	$mystring=str_replace("ή","&#942;",$mystring); 
	$mystring=str_replace("Ά","&#902;",$mystring); 
	$mystring=str_replace("Έ","&#904;",$mystring); 
	$mystring=str_replace("Ώ","&#911;",$mystring); 
	$mystring=str_replace("Ύ","&#910;",$mystring); 
	$mystring=str_replace("Ί","&#906;",$mystring); 
	$mystring=str_replace("Ό","&#908;",$mystring); 
	$mystring=str_replace("Ή","&#905;",$mystring); 
	
	$mystring=str_replace("ϊ","&#970;",$mystring); 
	$mystring=str_replace("ΐ","&#912;",$mystring); 
	$mystring=str_replace("ϋ","&#971;",$mystring); 
	$mystring=str_replace("ΰ","&#944;",$mystring); 
	return $mystring;
	}
	
	
	
	function latintogreek($mystring){
	   
	
	 $mystring=str_replace("&Alpha;","Α",$mystring);  
	 $mystring=str_replace("&Beta;","Β",$mystring);  
	 $mystring=str_replace("&Gamma;","Γ",$mystring);  
	 $mystring=str_replace("&Delta;","Δ",$mystring);  
	 $mystring=str_replace("&Epsilon;","Ε",$mystring);  
	 $mystring=str_replace("&Zeta;","Ζ",$mystring);  
	 $mystring=str_replace("&Eta;","Η",$mystring);  
	 $mystring=str_replace("&Theta;","Θ",$mystring);  
	 $mystring=str_replace("&Iota;","Ι",$mystring);  
	 $mystring=str_replace("&Kappa;","Κ",$mystring);  
	 $mystring=str_replace("&Lambda;","Λ",$mystring);  
	 $mystring=str_replace("&Mu;","Μ",$mystring);  
	 $mystring=str_replace("&Nu;","Ν",$mystring);  
	 $mystring=str_replace("&Xi;","Ξ",$mystring);  
	 $mystring=str_replace("&Omicron;","Ο",$mystring);  
	 $mystring=str_replace("&Pi;","Π",$mystring);  
	 $mystring=str_replace("&Rho;","Ρ",$mystring);  
	 $mystring=str_replace("&Sigma;","Σ",$mystring);  
	 $mystring=str_replace("&Tau;","Τ",$mystring);  
	 $mystring=str_replace("&Upsilon;","Υ",$mystring);  
	 $mystring=str_replace("&Phi;","Φ",$mystring);  
	 $mystring=str_replace("&Chi;","Χ",$mystring);  
	 $mystring=str_replace("&Psi;","Ψ",$mystring);  
	 $mystring=str_replace("&Omega;","Ω",$mystring);  
	 $mystring=str_replace("&alpha;","α",$mystring);  
	 $mystring=str_replace("&beta;","β",$mystring);  
	 $mystring=str_replace("&gamma;","γ",$mystring);  
	 $mystring=str_replace("&delta;","δ",$mystring);  
	 $mystring=str_replace("&epsilon;","ε",$mystring);  
	 $mystring=str_replace("&zeta;","ζ",$mystring);  
	 $mystring=str_replace("&eta;","η",$mystring);  
	$mystring=str_replace("&theta;","θ",$mystring);  
	$mystring=str_replace("&iota;","ι",$mystring);  
	$mystring=str_replace("&kappa;","κ",$mystring);  
	$mystring=str_replace("&lambda;","λ",$mystring);  
	$mystring=str_replace("&mu;","μ",$mystring);  
	$mystring=str_replace("&nu;","ν",$mystring);  
	$mystring=str_replace("&xi;","ξ",$mystring);  
	$mystring=str_replace("&omicron;","ο",$mystring);  
	$mystring=str_replace("&pi;","π",$mystring);  
	$mystring=str_replace("&rho;","ρ",$mystring);  
	$mystring=str_replace("&sigma;","σ",$mystring);  
	$mystring=str_replace("&tau;","τ",$mystring);  
	$mystring=str_replace("&upsilon;","υ",$mystring);  
	$mystring=str_replace("&phi;","φ",$mystring);  
	$mystring=str_replace("&chi;","χ",$mystring);  
	$mystring=str_replace("&psi;","ψ",$mystring);  
	$mystring=str_replace("&omega;","ω",$mystring);  
	$mystring=str_replace("&sigmaf;","ς",$mystring); 
	
	          
	              
	$mystring=str_replace("&#940;","ά",$mystring); 
	$mystring=str_replace("&#941;","έ",$mystring); 
	$mystring=str_replace("&#974;","ώ",$mystring); 
	$mystring=str_replace("&#973;","ύ",$mystring); 
	$mystring=str_replace("&#943;","ί",$mystring); 
	$mystring=str_replace("&#972;","ό",$mystring); 
	$mystring=str_replace("&#942;","ή",$mystring); 
	$mystring=str_replace("&#902;","Ά",$mystring); 
	$mystring=str_replace("&#904;","Έ",$mystring); 
	$mystring=str_replace("&#911;","Ώ",$mystring); 
	$mystring=str_replace("&#910;","Ύ",$mystring); 
	$mystring=str_replace("&#906;","Ί",$mystring); 
	$mystring=str_replace("&#908;","Ό",$mystring); 
	$mystring=str_replace("&#905;","Ή",$mystring); 
	
	$mystring=str_replace("&#970;","ϊ",$mystring); 
	$mystring=str_replace("&#912;","ΐ",$mystring); 
	$mystring=str_replace("&#971;","ϋ",$mystring); 
	$mystring=str_replace("&#944;","ΰ",$mystring); 
	return $mystring;
	}

?>
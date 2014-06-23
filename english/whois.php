<!-- Warning this page Charset must be UTF-8-->
<?php
 error_reporting(0);
	require("config.php");
	require("usablewebLib.php");
	 require_once('papaki.php');

	
	$search = new PapakiDomainNameSearch($_REQUEST["domainName"]);
	$search->apikey = $Papaki_apikey;
	$search->requestURL = $papaki_Post_url;
	$search->use_curl = true;

	$search->exec_request_for(_TYPE_WHOIS);
?>
<?PHP  echo $search->whois_response; ?>

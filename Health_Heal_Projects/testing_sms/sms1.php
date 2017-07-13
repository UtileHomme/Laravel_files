<?php

$message="Home nursing jobs in Bengaluru with attractive salary, free food and accommodation.Contact";
$phonenimber="7022163806";
$url ="http://info.bulksms-service.com/WebServiceSMS.aspx?User=T201301202115&passwd=Rohan@healthheal&mobilenumber=".urlencode($phonenimber)."&message=".urlencode($message)."&sid=HEALTH&mtype=N";
$ch =curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$curl_scraped_page =curl_exec($ch);
curl_close($ch);
echo $curl_scraped_page;
?>

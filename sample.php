#!/usr/bin/php
<?php
define("USERNAME", "test@example.com");
define("PASSWORD", "example");
define("SECURITY_TOKEN", "FAKEkajshflkja");


require_once ('./Force.com-Toolkit-for-PHP/soapclient/SforceEnterpriseClient.php');

$mySforceConnection = new SforceEnterpriseClient();
$mySforceConnection->createConnection("./Force.com-Toolkit-for-PHP/soapclient/enterprise.wsdl.xml");
$mySforceConnection->login(USERNAME, PASSWORD.SECURITY_TOKEN);

$query = "SELECT Id, FirstName, LastName, Phone from Contact";
$response = $mySforceConnection->query($query);

echo "Results of query '$query'<br/><br/>\n";
foreach ($response->records as $record) {
    echo $record->Id . ": " . $record->FirstName . " "
        . $record->LastName . " " . $record->Phone . "<br/>\n";
}


echo "Got here";
?>
<?php
//$client = new SoapClient(null, array(
//	'location' => "http://www.screamingcircuits.com/quote.asmx",
//	'uri'      => "http://screamingcircuits.com/webservices/quote",
//	'style'    => SOAP_DOCUMENT,
//	'use'      => SOAP_LITERAL,
//));

//$client = new SoapClient("http://www.screamingcircuits.com/quote.asmx?WSDL");

$request = "<quote><BoardQuantity>1</BoardQuantity><BomLineItems>1</BomLineItems><DoubleSidedSmt>1</DoubleSidedSmt><Smt>1</Smt><ThruHole>1</ThruHole><FinePitch>1</FinePitch><Bga>1</Bga><IsLeadFree>1</IsLeadFree></quote>";

//$request = array(
//	'quote'	=> array(
//		'BoardQuantity' => (int)'1',
//		'BomLineItems'         => (int)'1',
//		'DoubleSidedSmt'         => (bool)'true',
//		'Smt'          => (int)'1',
//		'ThruHole'         => (int)'1',
//		'FinePitch'       => (int)'1',
//		'Bga'         => (int)'1',
//		'IsLeadFree'       => (bool)'true')
//	);

//$location = "http://www.screamingcircuits.com/quote.asmx";
//$action = "http://www.screamingcircuits.com/webservices/quote/GetBid";
//$version = SOAP_1_2;
//$one_way = null;
//
//$return = $client->__doRequest ($request, $location, $action, $version, $one_way);
//
//echo($return);

//array(2) { [0]=>  string(41) "GetBidResponse GetBid(GetBid $parameters)" [1]=>  string(68) "GetTimeFrameBidResponse GetTimeFrameBid(GetTimeFrameBid $parameters)" }


$client = new SoapClient('http://www.screamingcircuits.com/quote.asmx?WSDL', array('trace' => 1));
//var_dump($client->__getFunctions());
print($client->GetBid($request));
echo "REQUEST:\n" . $client->__getLastRequest() . "\n";

?>
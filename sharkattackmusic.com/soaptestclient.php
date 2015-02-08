<?php
require_once('nusoap.php');

$endpoint = 'http://www.screamingcircuits.com/quote.asmx?WSDL';
$wsdl = true;
$proxyhost = false;
$proxyport = false;
$proxyusername = false;
$proxypassword = false;
$timeout = 30;
$response_timeout = 30;
$portName = '';

$name = 'GetBid';
$type = 'http://screamingcircuits.com/webservices/quote';
$value = 'value';
$element_ns = 'element_ns';
$type_ns = 'type_ns';
$attributes = 'attributes';

// new soapval($name, $type, $value, $element_ns, $type_ns, $attributes)

$operation = 'http://www.screamingcircuits.com/quote.asmx';
$params = array(
	'GetBid' => array(
		'quote'	=> array(
			'BoardQuantity' => (int)'1',
			'BomLineItems'         => (int)'1',
			'DoubleSidedSmt'         => (bool)'true',
			'Smt'          => (int)'1',
			'ThruHole'         => (int)'1',
			'FinePitch'       => (int)'1',
			'Bga'         => (int)'1',
			'IsLeadFree'       => (bool)'true')
	)
);
$namespace = 'http://screamingcircuits.com/webservices/quote';
$soapAction = 'http://screamingcircuits.com/webservices/quote/GetBid';
$headers = false;
$rpcParams = null;
$style = 'document';
$use = 'literal';

$client = new nusoap_client($endpoint, $wsdl, $proxyhost, $proxyport, $proxyusername, $proxypassword, $timeout, $response_timeout, $portName);
$err = $client->getError();
if ($err) {
	echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
	echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->getDebug(), ENT_QUOTES) . '</pre>';
	exit();
}
$client->useHTTPPersistentConnection();

$result = $client->call($operation, $params, $namespace, $soapAction, $headers, $rpcParams, $style, $use);

if ($client->fault) {
	echo '<h2>Fault</h2><pre>'; print_r($result); echo '</pre>';
} else {
	$err = $client->getError();
	if ($err) {
		echo '<h2>Error</h2><pre>' . $err . '</pre>';
	} else {
		echo '<h2>Result</h2><pre>'; print_r($result); echo '</pre>';
	}
}
echo '<h2>Request</h2><pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2><pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->getDebug(), ENT_QUOTES) . '</pre>';
?>
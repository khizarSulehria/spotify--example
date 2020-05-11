<?php

$client_id = 'e36292bc2d69458d8d20d6abaeacd09c';

$client_secret = '9fbe1d83f8cf46c087aafdcadfedadd1';

$redirect_uri = 'http://localhost/Practice/spotify/callback.php';


var_dump($_REQUEST);


// Get cURL resource
$curl = curl_init();
// Set some options - we are passing in a useragent too here





echo '<br/>';

$headers = [
	'Content-type: application/json',
	'Authorization: Basic '.base64_encode($client_id.':'.$client_secret)
];


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,            'https://accounts.spotify.com/api/token' );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_POST,           1 );
curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=authorization_code&code='.$_REQUEST['code'].'&redirect_uri='.$redirect_uri);
											 
curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret))); 

$result=curl_exec($ch);
echo $result;

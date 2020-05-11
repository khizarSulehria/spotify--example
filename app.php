<?php
$client_id = 'e36292bc2d69458d8d20d6abaeacd09c';

$client_secret = '9fbe1d83f8cf46c087aafdcadfedadd1';

$redirect_uri = 'http://localhost/Practice/spotify/callback.php';


$access_token = "BQDe2nwViRcBFnNM5MONf2xziFDf6eWLAVS17PRw9v5-DOcbHWVHZ2QuCfub7emlcvyBGdlv9H4OZTT6MxZlhu6_DvB_ws9uwduN6PBghwMZ3ib5EfSDOy-miDCNpIBqj6zJXx8IlfW13B4xDezWJ1W4-O2BquR8HkFLK6YuxZsYJ4R5vw";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,            'https://api.spotify.com/v1/me' );

//curl_setopt($ch, CURLOPT_POSTFIELDS,     'grant_type=client_credentials' ); 
curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Authorization: Bearer '.$access_token)); 

$result=curl_exec($ch);
echo $result;

?>
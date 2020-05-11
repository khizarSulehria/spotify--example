<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$scope = 'user-read-private user-read-email';


$client_id = 'e36292bc2d69458d8d20d6abaeacd09c';

$client_secret = '9fbe1d83f8cf46c087aafdcadfedadd1';

$redirect_uri = 'http://localhost/Practice/spotify/callback.php';

$state = rand(1000000909090909 , 9999999999999999 );
$code = 

$url = 'https://accounts.spotify.com/authorize?response_type=code&client_id='.$client_id.'&scope='.$scope.'&redirect_uri='.$redirect_uri.'&state='.$state;
//echo $url;
header("Location: ".$url);    



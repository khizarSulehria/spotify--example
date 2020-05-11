<?php

use Illuminate\Support\Facades\Route;
use Rennokki\Larafy\Larafy;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/sp', function () {
    $api = new Larafy();
    try {
    $p  = $api->searchArtists('Lana del Rey');
	return response()->json($p);
	} catch(\Rennokki\Larafy\Exceptions\SpotifyAuthorizationException $e) {
	    // invalid ID & Secret provided
	    $e->getAPIResponse(); // Get the JSON API response.
	}


});

Route::get('/get-client', 'HomeController@getClientCredentials');

Route::get('/get-user-id/{id}', 'HomeController@getUserById');

Route::get('/get-user-playlist/{id}', 'HomeController@userPlayList');

Route::get('/get-playlist-id/{id}', 'HomeController@userPlayListById')->name('user-playlist-by-id');






Route::get('/spotify-login', 'SpotifyUserAuthController@SpotifyAuthorize');

Route::get('/get-user', 'SpotifyUserAuthController@getAuthUser');

Route::get('/get-token-from-refresh', 'SpotifyUserAuthController@getRefreshTokenRequest');

Route::get('/current-user-playlist/{id}', 'UserController@getUserPlaylist');

Route::get('/current-user-follow_artist/{artist_id}/{user_id}', 'UserController@followArtist');
Route::get('/current-user-unfollow_artist/{artist_id}/{user_id}', 'UserController@unfollowArtist');

Route::get('/current-follow-artists/{user_id}', 'UserController@followArtists');

Route::get('/current-user-unfollow_playlist/{playlist}/{user_id}', 'UserController@unfollowPlaylist');

Route::get('/current-follow-playlist/{playlist}/{user_id}', 'UserController@followPlaylist');


Route::get('/current-unfollow-user/{follow_user_id}/{user_id}', 'UserController@unfollowUser');

Route::get('/current-follow-user/{follow_user_id}/{user_id}', 'UserController@followUser');

Route::get('/check-user-following/{type}/{user_id}/{ids}', 'UserController@checkCurrentUserFollowing');



Route::get('/spotify-login-1', function () {
	$session = new SpotifyWebAPI\Session(
	    env('SPOTIFY_KEY'),
	    env('SPOTIFY_SECRET'),
		env('SPOTIFY_REDIRECT_URI')
	);   
	//die(env('SPOTIFY_REDIRECT_URI'));
	$api = new SpotifyWebAPI\SpotifyWebAPI();

	if (isset($_GET['code'])) {
	    $session->requestAccessToken($_GET['code']);
	    $api->setAccessToken($session->getAccessToken());

	    print_r($api->me());
	} else {
	    $options = [
	        'scope' => [
	            'user-read-email',
	        ],
	    ];
	  // die($session->getAuthorizeUrl($options));
	    header('Location: ' . $session->getAuthorizeUrl($options));
	    die();
	}

});


Route::get('/user/{id}', function () {
	$session = new SpotifyWebAPI\Session(
	    env('SPOTIFY_KEY'),
	    env('SPOTIFY_SECRET'),
		env('SPOTIFY_REDIRECT_URI')
	);   

	$api = new SpotifyWebAPI\SpotifyWebAPI();

	if (isset($_GET['code'])) {
	    $session->requestAccessToken($_GET['code']);
	    $api->setAccessToken($session->getAccessToken());

	    print_r($api->me());
	} else {
	    $options = [
	        'scope' => [
	            'user-read-email',
	        ],
	    ];
	  // die($session->getAuthorizeUrl($options));
	    header('Location: ' . $session->getAuthorizeUrl($options));
	    die();
	}

});

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Illuminate\Support\Facades\Cache;

class SpotifyUserAuthController extends Controller
{
	public $thisSession;
	public $thisWebApi;
	public function __construct(){
		$this->thisSession = new Session(
		    env('SPOTIFY_KEY'),
		    env('SPOTIFY_SECRET'),
			env('SPOTIFY_REDIRECT_URI')
		);

		$this->thisWebApi = new SpotifyWebAPI();

	}

    public function SpotifyAuthorize(){
		$session = $this->thisSession;
		$api = new SpotifyWebAPI();
		if (isset($_GET['code'])) {
		    $session->requestAccessToken($_GET['code']);
		    $api->setAccessToken($session->getAccessToken());
		    $user = User::where('email',$api->me()->email)->first();
		    if(empty($user)){
				    $user = User::create([
				    	'name' => $api->me()->display_name,
				    	'email' => $api->me()->email,
				    	'spotify_id' => $api->me()->id,
				    	'access_token' => $session->getAccessToken(),
				    	'refresh_token' => $session->getRefreshToken()
				    ]);			    	
		    }else{
		    	$user->access_token = $session->getAccessToken();
		    	$user->refresh_token = $session->getRefreshToken();
		    	$user->save();
		    }
			Cache::put('spotify-user',$session->getAccessToken(), now()->addSeconds(3600));

		    print_r($api->me());
		    print_r($user);
		    
		} else {
		    $options = [
		        'scope' => [
		            'user-read-email',
		            'playlist-read-collaborative',
					'playlist-modify-public',
					'playlist-read-private',
					'playlist-modify-private',
					'user-follow-read',
					'user-follow-modify',
		        ],
		    ];
		  return Redirect::to($session->getAuthorizeUrl($options));
		}
	}

	public function getAuthUser(){
		if(Cache::has('spotify-user')){
			$this->thisWebApi->setAccessToken(Cache::get('spotify-user'));
			$user = User::find(2);	
		}else{
			$user = User::find(2);	
		}
		
		$token = $this->thisSession->refreshAccessToken($user->refresh_token);
		$this->thisWebApi->setAccessToken($token);
		$data = $this->thisWebApi->getUserPlaylists($user->spotify_id);
		dd($data);
		return NULL;
	}

	public function getRefreshTokenRequest(){
		$user = User::find(6);
		$request = $this->thisSession->refreshAccessToken($user->refresh_token);
		$newToken = $this->thisSession->getAccessToken();
		$refreshToken = $this->thisSession->getRefreshToken();
		$this->thisWebApi->setAccessToken($newToken);

		print_r($this->thisWebApi->me());	
		//dd($this->thisWebApi->getUserPlaylists($this->thisWebApi->me()->id, ['limit' => 30]));

		dd([
			"token" => $user->access_token,
			"newtoken" => $newToken,
			"refreshToken" => $refreshToken
 		]);
		return "";
	}
}

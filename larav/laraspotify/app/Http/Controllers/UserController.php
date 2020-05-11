<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Illuminate\Support\Facades\Cache;
use SpotifyWebAPI\SpotifyWebAPIException;


class UserController extends Controller
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

	public function getUserPlaylist($id){
		$user = User::find($id);
		try {
			$this->thisWebApi->setAccessToken($user->access_token);
			$this->thisWebApi->me();
			//dd($this->thisWebApi->me());
		}catch(SpotifyWebAPIException $e){
			if($e->getCode() == 401){
				$request = $this->thisSession->refreshAccessToken($user->refresh_token);
				$newToken = $this->thisSession->getAccessToken();
				$refresh = $this->thisSession->getRefreshToken();
				$this->thisWebApi->setAccessToken($newToken);
				$user->access_token = $newToken;
				$user->refresh_token = $refresh;
				$user->save();
			}
		}

		dd($this->thisWebApi->getUserPlaylists($user->spotify_id, ['limit' => 31]));

		//$playlists = $this->thisWebApi->getUserPlaylists($user->spotify_id);
		//$playlists = $this->thisWebApi->getMyPlaylists();

		foreach ($playlists->items as $playlist) {
		    echo '<a href="'.route('user-playlist-by-id',$playlist->id).'" ' . $playlist->external_urls->spotify . '>' . $playlist->name . '</a> <br>';
		}
		return '';
	}

	public function followArtists($user_id){
		$user = User::find($user_id);
		$this->thisWebApi->setAccessToken($user->access_token);
		$playlists = $this->thisWebApi->getUserFollowedArtists();
		dd($playlists);

	}
	//0MeLMJJcouYXCymQSHPn8g
	public function followArtist($artist_id,$user_id){
		$user = User::find($user_id);
		$this->thisWebApi->setAccessToken($user->access_token);
		$playlists = $this->thisWebApi->followArtistsOrUsers('artist',$artist_id);
		dd($playlists);

	}
	//0MeLMJJcouYXCymQSHPn8g
	public function unfollowArtist($artist_id,$user_id){
		$user = User::find($user_id);
		$this->thisWebApi->setAccessToken($user->access_token);
		$playlists = $this->thisWebApi->unfollowArtistsOrUsers('artist',$artist_id);
		dd($playlists);
	}

	public function followUser($follow_user_id,$user_id){
		$user = User::find($user_id);
		$this->thisWebApi->setAccessToken($user->access_token);
		$playlists = $this->thisWebApi->followArtistsOrUsers('user',$follow_user_id);
		dd($playlists);
	}

	//0k2IDDkcVyIpIgE6d1woDM
	public function unfollowUser($follow_user_id,$user_id){
		$user = User::find($user_id);
		$this->thisWebApi->setAccessToken($user->access_token);
		$playlists = $this->thisWebApi->unfollowArtistsOrUsers('user',$follow_user_id);
		dd($playlists);
	}


	//0k2IDDkcVyIpIgE6d1woDM
	public function followPlaylist($playlist,$user_id){
		$user = User::find($user_id);
		$this->thisWebApi->setAccessToken($user->access_token);
		$playlists = $this->thisWebApi->followPlaylist($playlist);
		dd($playlists);
	}

	//0k2IDDkcVyIpIgE6d1woDM
	public function unfollowPlaylist($playlist,$user_id){
		$user = User::find($user_id);
		$this->thisWebApi->setAccessToken($user->access_token);
		$playlists = $this->thisWebApi->unfollowPlaylist($playlist);
		dd($playlists);
	}

	public function checkCurrentUserFollowing($type,$user_id,$ids){
		$user = User::find($user_id);
		$idArray = [$ids];	

		$this->thisWebApi->setAccessToken($user->access_token);
		$playlists = $this->thisWebApi->currentUserFollows($type,$idArray);
		dd($playlists);	
	}


}

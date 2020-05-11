<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public $spotify;
    public $spotifyApi;
     
	public function __construct(SpotifyWebAPI $spotifyApi){
		// $this->spotifyApi = \App::make('Spotify');
		$this->spotifyApi = $spotifyApi;
	//	dd($this->spotifyApi);

		
	}

	public function getClientCredentials(){
		//dd($this->spotifyApi);
		dd($this->spotifyApi->getUser('g691j7w74ax5293lel8ehhk5r'));
	}

	public function getUserById($id = 'g691j7w74ax5293lel8ehhk5r'){
		dd($this->spotifyApi->getUser($id));
	}

	public function userPlayList($id){
		dd($this->spotifyApi->getUserPlaylists($id, ['limit' => 10]));

		$playlists = $this->spotifyApi->getUserPlaylists($id);

		foreach ($playlists->items as $playlist) {
		    echo '<a href="'.route('user-playlist-by-id',$playlist->id).'" ' . $playlist->external_urls->spotify . '>' . $playlist->name . '</a> <br>';
		}
		return '';

	}

	public function userPlayListById($id){
		dd($this->spotifyApi->getPlaylistTracks($id));
		$playlistTracks = $this->spotifyApi->getPlaylistTracks($id);

		foreach ($playlistTracks->items as $track) {
		    $track = $track->track;

		    echo '<a href="' . $track->external_urls->spotify . '">' . $track->name . '</a> <br>';
		}
		return '';
	}
}

<?php

namespace App\Jobs;

use App\Playlist;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use SpotifyWebAPI\SpotifyWebAPIException;

class FollowBulkTOFollowArtist implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $webApi;
    public $thisSession;
    public function __construct($webApi,$session)
    {
        $this->webApi = $webApi;
        $this->thisSession = $session;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $song_id = "7hp9DhEqfiffC2W5hNEPDl";
        // playlist ids  :


        $users = User::all();
        foreach ($users as $user){



            if(!empty($user->access_token)){

                try {
                    $this->webApi->setAccessToken($user->access_token);
                    $this->webApi->me();
                }catch(SpotifyWebAPIException $e){
                    if($e->getCode() == 401){
                        $request = $this->thisSession->refreshAccessToken($user->refresh_token);
                        $newToken = $this->thisSession->getAccessToken();
                        $refresh = $this->thisSession->getRefreshToken();
                        $this->webApi->setAccessToken($newToken);
                        $user->access_token = $newToken;
                        $user->refresh_token = $refresh;
                        $user->save();
                    }
                }
                $this->webApi->setAccessToken($user->access_token);
                try {
                   // $playlists = $this->webApi->followArtistsOrUsers('artist', '1zNqDE7qDGCsyzJwohVaoX'); // 5893251
                    $playlists = $this->webApi->unfollowArtistsOrUsers('artist', '1zNqDE7qDGCsyzJwohVaoX');
                    var_dump("success ". $playlists);
                }catch(SpotifyWebAPIException $e){
                    var_dump($this->webApi->me()->email);
                }



            }

        }


    }
}

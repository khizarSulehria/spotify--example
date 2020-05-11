<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;
use Illuminate\Support\Facades\Cache;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    /*    $this->app->bind('SpotifyWebAPI\Session',function(){
            return new SpotifyWebAPI\Session(
                env('SPOTIFY_KEY'),
                env('SPOTIFY_SECRET'),
                env('SPOTIFY_REDIRECT_URI')
            );      
        });*/

        $this->app->singleton('SpotifyWebAPI\SpotifyWebAPI',function(){
            $client = new SpotifyWebApi;
           if(!Cache::has('spotify-client')){
 
                $session = new Session(
                    env('SPOTIFY_KEY'),
                    env('SPOTIFY_SECRET'),
                    env('SPOTIFY_REDIRECT_URI')
                );

                $scopes = [
                    'user-read-email',
                    'user-read-private',
                    'playlist-read-collaborative',
                    'playlist-modify-public',
                    'playlist-read-private',
                    'playlist-modify-private',
                    
                ];

                $session->requestCredentialsToken($scopes);

                $accessToken = $session->getAccessToken();

                Cache::put('spotify-client', $accessToken, now()->addSeconds(3600));

            }
            $accessToken = Cache::get('spotify-client');
            $client->setAccessToken($accessToken);



            return $client;

           // return new SpotifyWebAPI\SpotifyWebAPI();      
        });
         
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}

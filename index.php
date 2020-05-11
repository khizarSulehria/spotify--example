<!DOCTYPE html>
<html>
<head>
  <title>Spotify Web Playback SDK Quick Start Tutorial</title>
</head>
<body>
  <h1>Spotify Web Playback SDK Quick Start Tutorial</h1>
  <h2>Open your console log: <code>View > Developer > JavaScript Console</code></h2>

  <script src="https://sdk.scdn.co/spotify-player.js"></script>
  <script>
    window.onSpotifyWebPlaybackSDKReady = () => {
      const token = 'BQBEiR42cEgNYx7AZxCKWb2k-aCpXRL3pAjW2HVKDiZVr8lOC_sNf1TiN84xOicefr1I20ExDRfvguBVLO9YQn6ruGcafY-rsc0HyiZZpzic9SwZa6c0nHhHnVJfIlQaCT-K4DuCPq2mp_v_C2-eh2gCaGa62zEBDybt6ueW6jpot6Juz2E';
      const player = new Spotify.Player({
        name: 'Web Playback SDK Quick Start Player',
        getOAuthToken: cb => { cb(token); }
      });

      // Error handling
      player.addListener('initialization_error', ({ message }) => { console.error(message); });
      player.addListener('authentication_error', ({ message }) => { console.error(message); });
      player.addListener('account_error', ({ message }) => { console.error(message); });
      player.addListener('playback_error', ({ message }) => { console.error(message); });

      // Playback status updates
      player.addListener('player_state_changed', state => { console.log(state); });

      // Ready
      player.addListener('ready', ({ device_id }) => {
        console.log('Ready with Device ID', device_id);
      });

      // Not Ready
      player.addListener('not_ready', ({ device_id }) => {
        console.log('Device ID has gone offline', device_id);
      });

      // Connect to the player!
      player.connect();
    };
  </script>
</body>
</html>
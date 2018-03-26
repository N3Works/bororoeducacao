<?php
	// -----
	// Busca o feed do Youtube
	// -----

	define( 'SPYI_ROOT_DIR', dirname( __FILE__ ) );

	class SPYI_YoutubeFeed
	{
		private $playlist;
		private $feed;

		public function getFeed()
		{
			return $this->feed;
		}

		public function setFeed( $feed )
		{
			$this->feed = $feed;
		}

		public function getPlaylist()
		{
			return $this->playlist;
		}

		public function setPlaylist( $playlist )
		{
			$this->playlist = $playlist;
		}

		/**
		 * Construtor
		 */
		public function __construct( $ytPlaylistId = NULL, $googleApiKey = NULL )
		{
			$this->feed = array();

			if ( $ytPlaylistId && $googleApiKey ) {
				require_once SPYI_ROOT_DIR .'/../santopixel-google-api-v3/src/Google/autoload.php';
				require_once SPYI_ROOT_DIR .'/../santopixel-google-api-v3/src/Google/Client.php';
				require_once SPYI_ROOT_DIR .'/../santopixel-google-api-v3/src/Google/Service/YouTube.php';
				session_start();

				$client = new Google_Client();
				$client->setDeveloperKey( $googleApiKey );
				$client->setScopes( 'https://www.googleapis.com/auth/youtube' );

				$this->readPage( $client, $ytPlaylistId );
			}
		}

		/**
		 * Lê página por página da playlist
		 */
		public function readPage( $client, $ytPlaylistId, $pageToken = '' )
		{
			$youtube = new Google_Service_YouTube( $client );
			$playlist = NULL;
			$itens = NULL;

			try {
				if ( empty( $pageToken ) ) {
					$params = array();
					$params['id'] = $ytPlaylistId;
					$playlist = $youtube->playlists->listPlaylists( 'id,snippet,contentDetails,status', $params );
				}

				$params = array();
				$params['playlistId'] = $ytPlaylistId;
				$params['maxResults'] = 50;
				
				if ( ! empty( $pageToken ) ) {
					$params['pageToken'] = $pageToken;
				}
				
				$itens = $youtube->playlistItems->listPlaylistItems( 'id,snippet,contentDetails,status', $params );
			} catch ( Google_Service_Exception $e ) {
				die( sprintf( '<p>A service error occurred: <code>%s</code></p>', htmlspecialchars( $e->getMessage() ) ) );
			} catch (Google_Exception $e) {
				die( sprintf( '<p>An client error occurred: <code>%s</code></p>', htmlspecialchars( $e->getMessage() ) ) );
			}

			if ( $playlist ) {
				$this->playlist = $playlist;
			}

			$this->feed[] = $itens;

			if ( isset( $itens['nextPageToken'] ) && ! empty( $itens['nextPageToken'] ) ) {
				$this->readPage( $client, $ytPlaylistId, $itens['nextPageToken'] );
			}
		}
	}
?>
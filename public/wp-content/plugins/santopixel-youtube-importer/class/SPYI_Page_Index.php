<?php
	// -----
	// Página principal do plugin
	// -----

	class SPYI_Page_Index
	{
		/**
		 * Construtor
		 */
		public function __construct()
		{
			add_action( 'admin_menu', array( &$this, 'addMenu' ) );
		}

		/**
		* Insere no menu o link da página
		*/
		public function addMenu()
		{
			add_options_page(
				'SantoPixel Youtube Importer - Configurações',
				'SantoPixel Youtube Importer',
				'manage_options',
				'spyiSettingsPage',
				array( &$this, 'settingsPage' )
			);
		}

		/**
		* Exibe a página (view)
		*/
		public function settingsPage()
		{
			if ( ! current_user_can( 'manage_options' ) ) {
				wp_die( __( 'Você não tem permissão para acessar esta página.' ) );
			}
			else {
				//SantoPixelYoutubeImporter::jobUpdateFeeds();

				$feedback = ( isset( $_GET['feedback'] ) && ! empty( $_GET['feedback'] ) ) ? $_GET['feedback'] : '0';
				
				$status = get_option( 'spyi_site_status' );
				if ( empty( $status ) ) $status = '0';
				
				$ytPlaylistId = get_option( 'spyi_yt_playlist_id' );
				if ( empty( $ytPlaylistId ) ) $ytPlaylistId = '';
				
				$googleApiKey = get_option( 'spyi_google_api_key' );
				if ( empty( $googleApiKey ) ) $googleApiKey = '';

				require_once SPYI_ROOT_DIR .'/pages/settings.php';
			}
		}
	}

	$spyiPageIndex = new SPYI_Page_Index();
?>
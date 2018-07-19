<?php
	// -----
	// Página que atualiza as opções do plugin
	// -----

	class SPYI_Page_Update
	{
		/**
		 * Construtor
		 */
		public function __construct()
		{
			add_action( 'wp_ajax_spyiUpdatePage', array( &$this, 'updatePage' ) );
		}

		/**
		* Exibe a página (view)
		*/
		public function updatePage()
		{
			if ( ! current_user_can( 'manage_options' ) ) {
				wp_die( 'Você não tem permissão para acessar esta página.');
			}
			else {
				$status = ( isset( $_GET['status'] ) && ! empty( $_GET['status'] ) ) ? $_GET['status'] : '0';
				$ytPlaylistId = ( isset( $_GET['ytPlaylistId'] ) && ! empty( $_GET['ytPlaylistId'] ) ) ? $_GET['ytPlaylistId'] : '';
				$googleApiKey = ( isset( $_GET['googleApiKey'] ) && ! empty( $_GET['googleApiKey'] ) ) ? $_GET['googleApiKey'] : '';
				
				$this->updateStatus( $status, $ytPlaylistId, $googleApiKey );
			}
		}

		/**
		* Atualiza as opções do plugin
		*/
		private function updateStatus( $status, $ytPlaylistId, $googleApiKey )
		{
			if ( ! add_option( 'spyi_site_status', $status ) ) update_option( 'spyi_site_status', $status );
			if ( ! add_option( 'spyi_yt_playlist_id', $ytPlaylistId ) ) update_option( 'spyi_yt_playlist_id', $ytPlaylistId );
			if ( ! add_option( 'spyi_google_api_key', $googleApiKey ) ) update_option( 'spyi_google_api_key', $googleApiKey );

			echo '<script>location.href="options-general.php?page=spyiSettingsPage&feedback=1"</script>';
		}
	}

	$spyiPageUpdate = new SPYI_Page_Update();
?>
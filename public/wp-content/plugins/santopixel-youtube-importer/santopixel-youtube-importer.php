<?php
	/*
	Plugin Name: SantoPixel Youtube Importer
	Description: Coletador de vídeos do Youtube (playlist).
	Version: 1.0
	Author: SantoPixel
	Author URI: http://www.santopixel.com.br
	License: GPLv2
	*/

	/*
	Copyright 2014 SantoPixel <contato@santopixel.com.br>

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as 
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	*/

	define( 'SPYI_ROOT_DIR', dirname( __FILE__ ) );
	require_once SPYI_ROOT_DIR .'/includes/header.php';

	class SantoPixelYoutubeImporter
	{
		/**
		 * Construtor
		 */
		public function __construct()
		{
			require_once SPYI_ROOT_DIR .'/class/SPYI_Page_Index.php';
			require_once SPYI_ROOT_DIR .'/class/SPYI_Page_Update.php';
		}

		/**
		* Ativando o plugin
		*/
		public static function activate()
		{
			self::prefixSetupSchedule();
			if ( ! add_option( 'spyi_installed', 'yes' ) ) update_option( 'spyi_installed', 'yes' );
			if ( ! add_option( 'spyi_activated', 'yes' ) ) update_option( 'spyi_activated', 'yes' );
		}

		/**
		* Desativando o plugin
		*/
		public static function deactivate()
		{
			wp_clear_scheduled_hook( 'spyi_schedule_action' );
			update_option( 'spyi_activated', 'no' );
		}

		/**
		 * Definição de novos intervalos
		 */
		public static function cronDefiner( $schedules )
		{
			$schedules['5in5minutes'] = array(
				'interval' => 300,
				'display'=> 'Uma vez a cada 5 minutos'
			);

			$schedules['10in10minutes'] = array(
				'interval' => 600,
				'display'=> 'Uma vez a cada 10 minutos'
			);

			return $schedules;
		}

		/**
		 * Garantia que o job está agendado
		 */
		public static function prefixSetupSchedule() {
			if ( ! wp_next_scheduled( 'spyi_schedule_action' ) ) {
				wp_schedule_event( time(), '10in10minutes', 'spyi_schedule_action' );
			}
		}

		/**
		 * Atualiza os feeds sociais (via job)
		 */
		public static function jobUpdateFeeds()
		{
			require_once SPYI_ROOT_DIR .'/class/SPYI_Util.php';
			require_once SPYI_ROOT_DIR .'/class/SPYI_YoutubeFeed.php';

			global $wpdb;
			$wpdbobj = clone $wpdb;
			
			// Get Status
			// Get Youtube Playlist ID

			$options = $wpdbobj->get_results("
				SELECT option_name, option_value
					FROM {$wpdbobj->options}
					WHERE option_name = 'spyi_site_status'
					OR option_name = 'spyi_yt_playlist_id'
					OR option_name = 'spyi_google_api_key'
					", OBJECT );
			
			$status = '0';
			$limit = 10;

			$ytPlaylistId = '';
			$googleApiKey = '';

			foreach( $options as $option ) {
				if ( $option->option_name == 'spyi_site_status' ) $status = $option->option_value;
				elseif ( $option->option_name == 'spyi_yt_playlist_id' ) $ytPlaylistId = $option->option_value;
				elseif ( $option->option_name == 'spyi_google_api_key' ) $googleApiKey = $option->option_value;
			}

			// If {$status} == '1' (active)

			if ( $status == '1' ) {
				// Update Last Run

				self::updateOption( $wpdbobj, 'spyi_last_run', date( 'Y-m-d H:i:s' ) );

				// Update Youtube Feed

				if ( ! empty( $ytPlaylistId ) && ! empty( $googleApiKey ) ) {
					self::updateYoutubeFeed( $wpdbobj, $blog->blog_id, $ytPlaylistId, $googleApiKey );
				}
			}
		}

		/**
		 * Atualiza option blog
		 */
		public static function updateOption( $wpdbobj, $optionName, $optionValue )
		{
			$rs = $wpdbobj->get_row( "SELECT COUNT(*) AS counter FROM {$wpdbobj->options} WHERE option_name = '{$optionName}' LIMIT 1", OBJECT );

			if ( $rs->counter == 0 ) {
				$wpdbobj->query( "INSERT INTO {$wpdbobj->options} (option_name, option_value) VALUES ('{$optionName}', '{$optionValue}')" );
			}
			else {
				$wpdbobj->query( "UPDATE {$wpdbobj->options} SET option_value = '{$optionValue}' WHERE option_name = '{$optionName}'" );
			}
		}

		/**
		 * Atualiza o feed social do Youtube
		 */
		public static function updateYoutubeFeed( $wpdbobj, $blogId, $ytPlaylistId, $googleApiKey )
		{
			// Get Youtube Feed (WebService)
			
			$ytFeed = new SPYI_YoutubeFeed( $ytPlaylistId, $googleApiKey );
			$ytPlaylist = $ytFeed->getPlaylist();
			$ytFeed = $ytFeed->getFeed();

			// Update Youtube Feed (DB)

			if ( ! empty( $ytPlaylist ) && ! empty( $ytFeed ) && is_array( $ytFeed ) ) {
				$user = get_user_by( 'slug', 'video_uploader' );
				
				if ( ! empty( $user ) ) {
					$userId = $user->ID;
				}
				else {
					$userId = SantoPixelYoutubeImporter::createUser( 'video_uploader', 'V1d30_Upl04d3r', 'Vídeo Uploader', 'Vídeo Uploader', '', '', 'editor' );
				}

				foreach( $ytFeed as $itens ) {
					foreach( $itens as $item ) {
						$videoId = $item['snippet']['resourceId']['videoId'];
						$videoTitle = $item['snippet']['title'];
						$videoDate = $item['snippet']['publishedAt'];
						//$videoThumb = $item['snippet']['thumbnails']['maxres']['url'];
						$videoThumb = $item['snippet']['thumbnails']['high']['url'];
						$videoLink = "http://www.youtube.com/watch?v={$videoId}";

						if ( ! $videoId || ! $videoTitle || ! $videoLink || ! $videoDate || ! $videoThumb ) {
							continue;
						}

						$videoDate = new DateTime( $videoDate );
						$videoDate->setTimezone( new DateTimeZone( 'America/Sao_Paulo' ) );
						$videoDate = date_format( $videoDate, 'Y-m-d H:i:s' );

						// -----

						$argsData = array(
							'post_title' => $videoTitle,
							'post_status' => 'publish',
							'post_type' => 'video',
							'post_date' => $videoDate,
							'post_author' => $userId
						);

						$argsSearch = array(
							'meta_key' => 'wpcf-youtube-id',
							'meta_value' => $videoId,
							'post_type' => 'video',
							'posts_per_page' => 1
						);

						$oldPost = query_posts( $argsSearch );

						if ( sizeof( $oldPost ) ) {
							foreach ( $oldPost as $post ) {
								$argsData['ID'] = $post->ID;
								$postId = wp_update_post( $argsData );
							}
						}
						else {
							$postId = wp_insert_post( $argsData );
						}

						if ( ! $postId ) {
							continue;
						}
						else {
							update_post_meta( $postId, 'wpcf-youtube-id', $videoId );
							update_post_meta( $postId, 'wpcf-video-link', $videoLink );

							if ( ! has_post_thumbnail( $postId ) ) {
								media_sideload_image( $videoThumb, $postId, $videoTitle );

								$attachments = get_posts(
									array(
										'post_type' => 'attachment',
										'numberposts' => 1,
										'order' => 'ASC',
										'post_parent' => $postId
									)
								);

								$attachment = $attachments[0];
								set_post_thumbnail( $postId, $attachment->ID );
							}
						}
					}
				}
			}
		}

		/**
		 * Cria um usuário dentro do WordPress,
		 * e retorna o ID do mesmo
		 */
		private function createUser( $login, $pass, $nickName, $displayName, $firstName, $lastName, $role )
		{
			$userId = wp_create_user( $login, $pass );
			
			wp_update_user(
				array(
					'ID' => $userId,
					'nickname' => $nickName,
					'display_name' => $displayName,
					'first_name' => $firstName,
					'last_name' => $lastName,
					'role' => $role
				)
			);

			return $userId;
		}
	}

	register_activation_hook( WP_PLUGIN_DIR . '/santopixel-youtube-importer/santopixel-youtube-importer.php', array( 'SantoPixelYoutubeImporter', 'activate' ) );
	register_deactivation_hook( WP_PLUGIN_DIR . '/santopixel-youtube-importer/santopixel-youtube-importer.php', array( 'SantoPixelYoutubeImporter', 'deactivate' ) );

	add_filter( 'cron_schedules', array( 'SantoPixelYoutubeImporter', 'cronDefiner' ) );
	
	add_action( 'wp', array( 'SantoPixelYoutubeImporter', 'prefixSetupSchedule' ) );
	
	// schedule job req
	add_action( 'spyi_schedule_action', array( 'SantoPixelYoutubeImporter', 'jobUpdateFeeds' ) );
	
	new SantoPixelYoutubeImporter();
?>
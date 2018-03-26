<?php
	class SPYI_Util
	{
		public static function gzdecode2( $data )
		{
			return gzinflate( substr( $data, 10, -8 ) );
		}

		public static function cleanString( $str )
		{
			// encode to utf-8
			$str = mb_check_encoding( $str, "UTF-8" ) === FALSE ? utf8_encode( $str ) : $str;
			
			// drop all non utf-8 characters
			$str = iconv( "utf-8", "utf-8//ignore", $str );
			
			// this is some bad utf-8 byte sequence that makes mysql complain - control and formatting i think
			$str = preg_replace( '/(?>[\x00-\x1F]|\xC2[\x80-\x9F]|\xE2[\x80-\x8F]{2}|\xE2\x80[\xA4-\xA8]|\xE2\x81[\x9F-\xAF])/', ' ', $str );

			// strip quotes
			$str = str_replace( array( '‘', '’', '′' ), '\'', $str );
			$str = str_replace( array( '“', '”', '″' ), '"', $str );
			
			// strip dashes
			$str = str_replace( array( '–', '–' ), '-', $str );

			// return
			return trim( $str );
		}
		
		public static function sleepRandomTime()
		{
			usleep( rand( 1500000, 2500000 ) );
		}
		
		public static function getUserAgent()
		{
			$linuxProc = array(
				'i686',
				'x86_64'
			);
			
			$macProc = array(
				'Intel',
				'PPC',
				'U; Intel',
				'U; PPC'
			);
			
			$lang = array(
				'en-US',
				'pt-BR'
			);
			
			switch ( rand( 1, 4 ) ) {
				case 1:
					return "Mozilla/5.0 " . SPYI_Util::getUserAgentHelper_firefox( $linuxProc, $macProc, $lang );
					break;
				case 2:
					return "Mozilla/5.0 " . SPYI_Util::getUserAgentHelper_safari( $macProc, $lang );
					break;
				case 3:
					return "Opera/" . rand( 8, 9 ) . '.' . rand( 10, 99 ) . ' ' . SPYI_Util::getUserAgentHelper_opera( $linuxProc, $lang );
					break;
				case 4:
					return 'Mozilla/5.0' . SPYI_Util::getUserAgentHelper_chrome( $linuxProc, $macProc );
					break;
			}
		}
		
		public static function getUserAgentHelper_firefox( $linuxProc, $macProc, $lang )
		{
			$ver = array(
				'Gecko/' . date( 'Ymd', rand( strtotime( '2011-1-1' ), mktime() ) ) . ' Firefox/' . rand( 5, 7 ) . '.0',
				'Gecko/' . date( 'Ymd', rand( strtotime( '2011-1-1' ), mktime() ) ) . ' Firefox/' . rand( 5, 7 ) . '.0.1',
				'Gecko/' . date( 'Ymd', rand( strtotime( '2010-1-1' ), mktime() ) ) . ' Firefox/3.6.' . rand( 1, 20 ),
				'Gecko/' . date( 'Ymd', rand( strtotime( '2010-1-1' ), mktime() ) ) . ' Firefox/3.8'
			);
			
			$platforms = array(
				'(Windows NT ' . rand( 5, 6 ) . '.' . rand( 0, 1 ) . '; ' . $lang[array_rand( $lang, 1 )] . '; rv:1.9.' . rand( 0, 2 ) . '.20) ' . $ver[array_rand( $ver, 1 )],
				'(X11; Linux ' . $linuxProc[array_rand( $linuxProc, 1 )] . '; rv:' . rand( 5, 7 ) . '.0) ' . $ver[array_rand($ver, 1)],
				'(Macintosh; ' . $macProc[array_rand( $macProc, 1 )] . ' Mac OS X 10_' . rand( 5, 7 ) . '_' . rand( 0, 9 ) . ' rv:' . rand( 2, 6 ) . '.0) ' . $ver[array_rand( $ver, 1 )]
			);
			
			return $platforms[array_rand( $platforms, 1 )];
		}
		
		public static function getUserAgentHelper_safari( $macProc, $lang )
		{
			$saf = rand( 531, 535 ) . '.' . rand( 1, 50 ) . '.' . rand( 1, 7 );
			
			if ( rand( 0, 1 ) == 0 ) {
				$ver = rand( 4, 5 ) . '.' . rand( 0, 1 );
			} else {
				$ver = rand( 4, 5 ) . '.0.' . rand( 1, 5 );
			}
			
			$platforms = array(
				'(Windows; U; Windows NT ' . rand( 5, 6 ) . '.' . rand( 0, 1 ) . ") AppleWebKit/$saf (KHTML, like Gecko) Version/$ver Safari/$saf",
				'(Macintosh; U; ' . $macProc[array_rand( $macProc, 1 )] . ' Mac OS X 10_' . rand( 5, 7 ) . '_' . rand( 0, 9 ) . ' rv:' . rand( 2, 6 ) . '.0; ' . $lang[array_rand( $lang, 1 )] . ") AppleWebKit/$saf (KHTML, like Gecko) Version/$ver Safari/$saf",
				'(iPod; U; CPU iPhone OS ' . rand( 3, 4 ) . '_' . rand( 0, 3 ) . ' like Mac OS X; ' . $lang[array_rand( $lang, 1 )] . ") AppleWebKit/$saf (KHTML, like Gecko) Version/" . rand( 3, 4 ) . ".0.5 Mobile/8B" . rand( 111, 119 ) . " Safari/6$saf",
			);
			
			return $platforms[array_rand( $platforms, 1 )];
		}
		
		public static function getUserAgentHelper_opera( $linuxProc, $lang )
		{
			$platforms = array(
				'(X11; Linux ' . $linuxProc[array_rand( $linuxProc, 1 )] . '; U; ' . $lang[array_rand( $lang, 1 )] . ') Presto/2.9.' . rand( 160, 190 ) . ' Version/' . rand( 10, 12 ) . '.00',
				'(Windows NT ' . rand( 5, 6 ) . '.' . rand( 0, 1 ) . '; U; ' . $lang[array_rand( $lang, 1 )] . ') Presto/2.9.' . rand( 160, 190 ) . ' Version/' . rand( 10, 12 ) . '.00'
			);
			
			return $platforms[array_rand( $platforms, 1 )];
		}
		
		public static function getUserAgentHelper_chrome( $linuxProc, $macProc )
		{
			$saf = rand( 531, 536 ) . rand( 0, 2 );
			
			$platforms = array(
				'(X11; Linux ' . $linuxProc[array_rand( $linuxProc, 1 )] . ") AppleWebKit/$saf (KHTML, like Gecko) Chrome/" . rand( 13, 15 ) . '.0.' . rand( 800, 899 ) . ".0 Safari/$saf",
				'(Windows NT ' . rand( 5, 6 ) . '.' . rand( 0, 1 ) . ") AppleWebKit/$saf (KHTML, like Gecko) Chrome/" . rand( 13, 15 ) . '.0.' . rand( 800, 899 ) . ".0 Safari/$saf",
				'(Macintosh; U; ' . $macProc[array_rand( $macProc, 1 )] . ' Mac OS X 10_' . rand( 5, 7 ) . '_' . rand( 0, 9 ) . ") AppleWebKit/$saf (KHTML, like Gecko) Chrome/" . rand( 13, 15 ) . '.0.' . rand( 800, 899 ) . ".0 Safari/$saf"
			);
			
			return $platforms[array_rand( $platforms, 1 )];
		}

		public static function fileGetContents( $url )
		{
			SPYI_Util::sleepRandomTime();

			$return = '';
			$parsedUrl = parse_url( $url );

			// Add 'MediafedMetrics' to not redirect RSS
			//$userAgent = 'MediafedMetrics - SantoPixel WordPress Plugin - RBS News Crawler';
			$userAgent = SPYI_Util::getUserAgent();

			$headers = array(
				'Accept: text/html;q=0.9,*/*;q=0.8',
				'Accept-Charset: utf-8;q=0.7,*;q=0.3',
				'Accept-Encoding: gzip,deflate,sdch',
				'Accept-Language: en-US,en;q=0.8',
				'Cache-Control: max-age=0',
				'Connection: keep-alive',
				'Host: '. $parsedUrl['host'],
				'Pragma: no-cache',
				'Referer: '. $parsedUrl['scheme'] .'://'. $parsedUrl['host'],
				'User-Agent: '. $userAgent
			);

			$handle = curl_init( $url );
			curl_setopt( $handle, CURLOPT_HTTPHEADER, $headers );
			curl_setopt( $handle, CURLOPT_RETURNTRANSFER, TRUE );
			$http_code = curl_getinfo( $handle, CURLINFO_HTTP_CODE );
			$return = curl_exec( $handle );
			curl_close( $handle );

			if ( $return ) {
				$returnUnziped = $return ? SPYI_Util::gzdecode2( $return ) : FALSE;
				$return = $returnUnziped ? $returnUnziped : $return;
				$return = SPYI_Util::cleanString( $return );
			}
			else {
				$return = '';
			}

			return $return;
		}

		public static function log( $text )
		{
			if ( $text == 'newline' ) {
				echo '<p class="log">---</p>';
			}
			else {
				echo '<p class="log">'. $text .'</p>';
			}

			//ob_flush();
			//flush();

			return;
		}

		public static function getMonthNum( $monthText )
		{
			if ( $monthText == 'janeiro' ) return 1;
			elseif ( $monthText == 'fevereiro' ) return 2;
			elseif ( $monthText == 'março' ) return 3;
			elseif ( $monthText == 'abril' ) return 4;
			elseif ( $monthText == 'maio' ) return 5;
			elseif ( $monthText == 'junho' ) return 6;
			elseif ( $monthText == 'julho' ) return 7;
			elseif ( $monthText == 'agosto' ) return 8;
			elseif ( $monthText == 'setembro' ) return 9;
			elseif ( $monthText == 'outubro' ) return 10;
			elseif ( $monthText == 'novembro' ) return 11;
			elseif ( $monthText == 'dezembro' ) return 12;
			return '';
		}

		public static function getShortText( $text, $limit ) {
			$text = explode( ' ', $text, $limit );
			
			if ( count( $text ) >= $limit ) {
				array_pop( $text );
				$text = implode( " ", $text ) .'...';
			}
			else {
				$text = implode( " ", $text );
			}

			return $text;
		}
		
	}
?>
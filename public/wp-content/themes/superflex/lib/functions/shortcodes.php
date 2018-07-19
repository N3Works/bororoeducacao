<?php


function phi_tabmenu( $atts, $content = null ) {
	extract(shortcode_atts(array(
    ), $atts));

	tabmenuoutput;
	$tabmenuoutput .= '<ul id="tabnav">';
	$i = 1;
	foreach ($atts as $tab) {
		$tabmenuoutput .= '<li><a href="#tab'.$i.'">' .$tab. '</a></li>';
		$i++;
	}
	$tabmenuoutput .= '</ul>';	
	return $tabmenuoutput;
	
}
add_shortcode('tabpanel', 'phi_tabmenu');


function phi_tab( $atts, $content = null ) {
	extract(shortcode_atts(array(
			'id' => '',
    ), $atts));
	
	$taboutput;
	$taboutput .= '<div class="tabcontent" id="tab'.$id.'">';
	$taboutput .= do_shortcode($content);
	$taboutput .= '</div>';
	
	return $taboutput;
	
}
add_shortcode('tab', 'phi_tab');



function phi_toggle( $atts, $content = null ) {
	extract(shortcode_atts(array(
		 'title' => '',
    ), $atts));

	output;
	
	$output .= '<h2 class="trigger"><a href="#">' .$title. '</a></h2>';
	$output .= '<div class="toggle_container"><div class="block">';
	$output .= do_shortcode($content);
	$output .= '</div></div>';
	
	
	return $output;
	}
add_shortcode('toggle', 'phi_toggle');




// INSERT GALLERY

function gallery ($atts, $content = null) {
		
		extract(shortcode_atts(array(
											  
				'columns' => '3',
				'per_page' => '6',
				'id' => 'none',
				
				), $atts));
				
				
				return insertGallery($columns,$per_page,$id);
		
}

add_shortcode("gall", "gallery");


// INSERT GALLERY SLIDESHOW

function galleryslideshow ($atts, $content = null) {
		
		extract(shortcode_atts(array(
											  
				'id' => 'none',
				
				
				), $atts));
				
				
				return insertGallerySlider($id);
		
}

add_shortcode("slideshow", "galleryslideshow");

// INSERT PORTFOLIO

function portfolio ($atts, $content = null) {
		
		extract(shortcode_atts(array(
				'category' => '',							  
				'columns' => '3',
				'per_page' => '6',		
				
				), $atts));
				
				
				return insertPortfolio($columns, $category, $per_page);
		
}
add_shortcode("portfolio", "portfolio");


function insertPortfolio($columns, $category, $postcount){
global $post;
$clickbehaviour = get_option('phi_thumbnail_click');
$posttype = 'phiportfolio';
$columns = $columns;
$term = $category;
$postcount = $postcount;

$order = get_option('phi_portfolio_order');

if (get_option(phi_disable_portfolioexcerpt)!= true):
$disableexcerpt = 'false';
endif;

if ($columns == 5){$imageheight = get_option('phi_5col_image_height'); $columnclass='one-fifth'; $imagewidth = 172;}
if ($columns == 4){$imageheight = get_option('phi_4col_image_height'); $columnclass='one-fourth'; $imagewidth = 220;}
if ($columns == 3){$imageheight = get_option('phi_3col_image_height'); $columnclass='one-third'; $imagewidth = 300;}
if ($columns == 2){$imageheight = get_option('phi_2col_image_height'); $columnclass='one-half'; $imagewidth = 460;}



$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$counter =  0;

$args = array(
'post_type' => 'phiportfolio',
'taxonomy' => 'phiportfoliocats',
'term' => $term,
'paged'=>$paged,
//'orderby'=>'title',	
'order'=>$order,
'showposts'=> $postcount,

);

query_posts($args);
$portfoliostring;
$portfoliostring.='<div class="portfoliowrap">';

// The loop
if (have_posts()) : while (have_posts()) : the_post(); 	
$counter++;

// Post text
$customtitle = get_post_meta($post->ID,'phi_customtitle',true);
$customexcerpt = get_post_meta($post->ID,'phi_customexcerpt',true);
$video = get_post_meta($post->ID,'phi_lightbox_image',true);
// Post images
$image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');			//Timthumb Resized image
$wpimage = wp_get_attachment_image_src(get_post_thumbnail_id(), $imagewidth); //WP Resized image

if($video){
	
	$lightbox = $video;
	
	}
else{
	$lightbox = $image[0];
	}
						
						$portfoliostring.= '<!-- Featured Page Box -->';
						$portfoliostring.= '<div class="'.$columnclass.' portfolio';
						if(($counter % $columns) == 0){$portfoliostring.= ' last';}
						$portfoliostring.= '">';
						
						$portfoliostring.= '<div class="image-wrap">';
					
						if($clickbehaviour != 'postlink'){
							$portfoliostring.= '<a href="'.$lightbox.'" rel="prettyPhoto[gall]"><span class="zoom"></span>';
						}
						else{
						$portfoliostring.= '<a href="'.get_permalink().'">';
						}
						if(get_option('phi_resize')== 'timthumb'){
						$portfoliostring.= '<img src="'.ubergeist_image_resize($imagewidth,$imageheight,$image[0]).'"  alt=""/>'; 
						}
						if(get_option('phi_resize')== 'wordpress'){
						$portfoliostring.= '<img src="'.$wpimage[0].'"  alt=""/>'; 
						}
						$portfoliostring.= '</a></div>';
						$portfoliostring.= '<h4><a href="'.get_permalink().'">';
						if($customtitle){
						$portfoliostring.= $customtitle;
						}
						else{
						$portfoliostring.= get_the_title();
						}
						$portfoliostring.= '</a></h4>';
			
						if($disableexcerpt == true){
						$portfoliostring.= '<p>'.$customexcerpt.'</p>';
						}
						$portfoliostring.= '</div>';
						
						 if(($counter % $columns) == 0){$portfoliostring.= '<br class="break" />';}
				
						$portfoliostring.= '<!-- End Featured Page Box -->';
						
						endwhile; 
						
						endif;
						$portfoliostring.= '<br class="break" /></div>';
						$portfoliostring.= wp_pagenavi_return();	
						wp_reset_query();		
						return $portfoliostring;
						
						
						
}




// Script  for contact form shortcode


// CONTACT FORM
function makecontact($rec){


$recipient = $rec;
	//If the form is submitted
if(isset($_POST['phi_name'])) {

	
	
		//Check to make sure that the name field is not empty
		if(trim($_POST['phi_name']) === get_option('phi_trans_name') || trim($_POST['phi_name']) === '') {
			$nameError = get_option('phi_trans_nameerror');
			$hasError = true;
		} else {
			$name = trim($_POST['phi_name']);
		}
		
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['phi_email']) === '')  {
			$emailError = get_option('phi_trans_emailerror');
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['phi_email']))) {
			$emailError = get_option('phi_trans_emailerror');
			$hasError = true;
		} else {
			$email = trim($_POST['phi_email']);
		}
			
		//Check to make sure comments were entered	
		if(trim($_POST['phi_message']) === '') {
			$commentError = get_option('phi_trans_commenterror');
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['phi_message']));
			} else {
				$comments = trim($_POST['phi_message']);
			}
		}
			
		//If there is no error, send the email
		if(!isset($hasError)) {
			$phone=trim($_POST['phi_phone']);
			if($recipient){
			$emailTo = $recipient;
			}
			else{
			$emailTo = get_option('phi_form_mail');
			}
			$subject = 'Contact Form Submission from '.$name;
			$body = "Name: $name \n\nEmail: $email \n\nPhone: $phone \n\nComments: $comments";
			$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			mail($emailTo, $subject, $body, $headers);

			$emailSent = true;

		}
	
}


			$formString = "";
			$formString.='<div id="contact-form" class="innercontent">';
			$formString.='<form action=""  id="validate_form" method="post"><ul>';
			// Name input
			$formString.='<li>';
			$formString.='<input type="text" name="phi_name" class="cleardefault" value="';
			if(isset($_POST['phi_name'])){
			$formString.= $_POST['phi_name'];
			}else{
			$formString.= get_option('phi_trans_name');
			}
			$formString.= '"/>';
			if($nameError != '') {
			$formString.='<span class="red"> * '.$nameError.'</span>';
			}
			$formString.='</li>';
			
			// Mail input
			$formString.='<li>';
			$formString.='<input type="text" name="phi_email" class="cleardefault" value="';
			if(isset($_POST['phi_email'])) {
			$formString.= $_POST['phi_email']; 
			}else{
			$formString.= get_option('phi_trans_email');
			}
			$formString.= '"/>';
			
			if($emailError != '') {
			$formString.='<span class="red"> * '.$emailError.'</span>';
			}
			$formString.='</li>';
			
			// Phone
			$formString.='<li>';
			$formString.='<input type="text" name="phi_phone" class="cleardefault" value="'; 
			if(isset($_POST['phi_phone'])){
			$formString.= $_POST['phi_phone']; 
			}else{ 
			$formString.= get_option('phi_trans_telephone');
			}
			$formString.= '"/>';
			$formString.='</li>';
		
			$formString.='<li>';
			$formString.= get_option('phi_trans_comment');
			if($commentError != ''){ 
			$formString.= '<span class="red"> * '.$commentError.'</span>';
			}
			$formString.='</li>';
			$formString.='<li>';
			$formString.='<textarea name="phi_message" rows="8" cols="40">';
			if(isset($_POST['phi_message'])) { 
			if(function_exists('stripslashes')) {
			$formString.= stripslashes($_POST['phi_message']);
			} else {
			$formString.= $_POST['phi_message'];
			}
			}
			$formString.= '</textarea>';
			$formString.='</li>';
			$formString.='<li>';
			$formString.= '<input type="submit" id="submitbutton" value="Submit"  />';
			$formString.='</li>';
			$formString.='</ul>';
			$formString.='</form>';
			$formString.='</div>';
			

			
			if(isset($emailSent) && $emailSent == true): 
			
			$formString.= '<script type="text/javascript">$("#validate_form").hide();</script>';
			$formString.= '<h1>'.get_option('phi_trans_thanks').' '.$name.'</h1><p>'.get_option('phi_trans_receipt').'</p>';
			endif;
	
		
			return $formString;
	

			
}




function addvideo($atts, $content = null) {
		
		extract(shortcode_atts(array(
				'src' => '',
				'size' =>'medium',
				'width' => '',
				'height' => '',
				'shortcode' => '1',
				), $atts));
                
	
		return makeVideo($src,$size,$width,$height,$shortcode);
}
            
add_shortcode("video", "addvideo");

// VIDEO FUNCTION

function makeVideo($videourl,$mvh,$width,$height,$shortcode){
global $post;

$videourl=$videourl;
$size=$mvh;	
$width = $width;
$height = $height;
$shortcode = $shortcode;

//$videosource = get_post_meta($post->ID,'phi_videosource',true);
if($shortcode != '1'){
$videourl= get_post_meta($post->ID,'phi_videourl',true);
}

if(strstr($videourl,'vimeo.com')) {
	$newvideourl = substr_replace($videourl,'http://vimeo.com/moogaloop.swf?clip_id=', 0,17);	
} 

elseif(strstr($videourl,'youtube.com')) {
	$newvideourl = substr_replace($videourl,'v/', 23,8);	
} 

else{$newvideourl = $videosource; //No change
}
	
if ($height != ''){$setVideoHeight = $height;}
else{$setVideoHeight = get_post_meta($post->ID,'phi_videoheight',true);}
if ($width != ''){$setVideoWidth = $width;}
else{$setVideoWidth = get_post_meta($post->ID,'phi_videowidth',true);}

						
if($size == 'large'){
	$defaultVideoWidth  = '940';
	$defaultVideoHeight = '522';
	};
	
							
if($size == 'medium'){
	$defaultVideoWidth  = '620';
	$defaultVideoHeight = '344';
	
	};
	
if($size == 'small'){
	$defaultVideoWidth  = '300';
	$defaultVideoHeight = '167';
	
	};
												
if($setVideoHeight == false){
	$newVideoHeight = $defaultVideoHeight;
	
	}
else{
	$newVideoHeight = $setVideoHeight;
}
if($setVideoWidth == false){
	$newVideoWidth = $defaultVideoWidth;
}


$videoString = "";
if($size == 'large'){
$videoString .= '<div class="video-wrap">';
}
elseif($size == 'medium'  || $size == 'full'){
$videoString .= '<div class="video-wrap">';
}
elseif($size == 'small'){
$videoString .= '<div class="video-wrap">';
}
$videoString .= '<object type="application/x-shockwave-flash" ';
$videoString .= 'data="';
$videoString .= $newvideourl;
$videoString .= '" width="';
$videoString .= $newVideoWidth;
$videoString .= '" height="';
$videoString .= $newVideoHeight;
$videoString .= '"> <param name="allowScriptAccess" value="always" /><param name="allowFullScreen" value="true" /><param name="movie" value="';
$videoString .= $newvideourl;
$videoString .= '" /><param name="quality" value="high" /><param name="wmode" value="transparent" /><param name="bgcolor" value="#ffffff" /><img src="banner.gif" width="';
$videoString .= $newVideoWidth;
$videoString .= '" height="';
$videoString .= $newVideoHeight;
$videoString .= '" alt="banner" /></object>';
$videoString .= '</div>';


if($shortcode == '1'){
return $videoString;
}
else{
echo $videoString;}


}


// INSERT CONTACTFORM
function addcontactform($atts, $content = null) {
		
		extract(shortcode_atts(array(
				'recipient' => '',
				
				), $atts));
	
		return makecontact($recipent);
}
            
add_shortcode("contactform", "addcontactform");




function addimage($atts, $content = null) {
				extract(shortcode_atts(array(
				'url' => '',
				), $atts));
                return '<img src="'.$url.'"/>';
}
add_shortcode("image", "addimage");




function addline($atts, $content = null) {
				extract(shortcode_atts(array(	
				'line' => '',
				), $atts));
                return '<hr/>';
}
add_shortcode("line", "addline");



function pullquote( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'float' => '$align',
    ), $atts));
   return '<blockquote class="pullquote"><p>'.$content.'</p></blockquote>';
}
add_shortcode('pull', 'pullquote');

function pushquote( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'float' => '$align',
    ), $atts));
   return '<blockquote class="pushquote"><p>'.$content.'</p></blockquote>';
}
add_shortcode('push', 'pushquote');



function box($atts, $content = null) {
				extract(shortcode_atts(array(
				'title' => '',
				'size' => '',
				'align' => '',
				'color' => '',
				'position' => '',	
				), $atts));
                if($position =='last'){$break = '<br class="break"/>'; }
					 if($color== ''){$color = 'transparent';}
					 if($align== 'right'){$align = 'alignright';}
					 if($align== 'left'){$align = 'alignleft';}
					 
										 
				 
				return '<div class="'.$size.' '.$position.' '.$align.' '.$color.'"><h3 class="column-title">'.$title.'</h3>' . do_shortcode($content) . '</div>'.$break;
}
add_shortcode("box", "box");


// Columns


// 1-3 col variations

function phi_one_third( $atts, $content = null ) {
   return '<div class="one-third">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'phi_one_third');


function phi_one_third_last( $atts, $content = null ) {
   return '<div class="one-third last">' . do_shortcode($content) . '</div><br class="break"/>';
}
add_shortcode('one_third_last', 'phi_one_third_last');


function phi_two_third( $atts, $content = null ) {
   return '<div class="two-third">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'phi_two_third');


function phi_two_third_last( $atts, $content = null ) {
   return '<div class="two-third last">' . do_shortcode($content) . '</div><br class="break"/>';
}
add_shortcode('two_third_last', 'phi_two_third_last');

// 1-4 col variations

function phi_one_half( $atts, $content = null ) {
   return '<div class="one-half">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'phi_one_half');


function phi_one_half_last( $atts, $content = null ) {
   return '<div class="one-half last">' . do_shortcode($content) . '</div><br class="break"/>';
}
add_shortcode('one_half_last', 'phi_one_half_last');


function phi_one_fourth( $atts, $content = null ) {
   return '<div class="one-fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'phi_one_fourth');


function phi_one_fourth_last( $atts, $content = null ) {
   return '<div class="one-fourth last">' . do_shortcode($content) . '</div><br class="break"/>';
}
add_shortcode('one_fourth_last', 'phi_one_fourth_last');

function phi_three_fourth( $atts, $content = null ) {
   return '<div class="three-fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'phi_three_fourth');


function phi_three_fourth_last( $atts, $content = null ) {
   return '<div class="three-fourth last">' . do_shortcode($content) . '</div><br class="break"/>';
}
add_shortcode('three_fourth_last', 'phi_three_fourth_last');

// 1-5 col variations

function phi_one_fifth( $atts, $content = null ) {
   return '<div class="one-fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth', 'phi_one_fifth');


function phi_one_fifth_last( $atts, $content = null ) {
   return '<div class="one-fifth last">' . do_shortcode($content) . '</div><br class="break"/>';
}
add_shortcode('one_fifth_last', 'phi_one_fifth_last');

function phi_two_fifth( $atts, $content = null ) {
   return '<div class="two-fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_fifth', 'phi_two_fifth');

function phi_two_fifth_last( $atts, $content = null ) {
   return '<div class="two-fifth last">' . do_shortcode($content) . '</div><br class="break"/>';
}
add_shortcode('two_fifth_last', 'phi_two_fifth_last');

function phi_three_fifth( $atts, $content = null ) {
   return '<div class="three-fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fifth', 'phi_three_fifth');

function phi_three_fifth_last( $atts, $content = null ) {
   return '<div class="three-fifth last">' . do_shortcode($content) . '</div><br class="break"/>';
}
add_shortcode('three_fifth_last', 'phi_three_fifth_last');






?>
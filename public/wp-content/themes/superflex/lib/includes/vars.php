<?php
function styleString(){
$hideauthor = get_option('phi_display_author');
$hidepublishdate = get_option('phi_display_publishdate');
$hidecategories = get_option('phi_display_categories');
$usecontent = get_option('phi_display_postcontent');

$trans_postedby = get_option('phi_trans_postedby');
$trans_postedon = get_option('phi_trans_postedon');
$trans_incategory = get_option('phi_trans_incategory');

$imageheight_slider = get_option('phi_slider_image_height'); 
$imageheight2col = get_option('phi_2col_image_height'); 
$imageheight3col = get_option('phi_3col_image_height'); 
$imageheight2col = get_option('phi_4col_image_height');
$imageheightGallerySlider = get_option('phi_gallery_slider_image_height');
$backgroundimage_selected = get_option('phi_listed_background_image');
$backgroundimage_uploaded = get_option('phi_custom_background_image');
$backgroundcolor = get_option('phi_custom_background_color');

if($backgroundimage_selected){
$newbackgroundimage = get_bloginfo('template_directory').''. $backgroundimage_selected;
}


if($backgroundimage_uploaded){
$newbackgroundimage = $backgroundimage_uploaded;
}

if(get_option('phi_disable_tiled_background')== true){
	$backgroundposition = 'background-repeat:no-repeat; background-position:top center;';
}

$stylestring;
$stylestring.='<style type="text/css" media="screen">';


if(get_option('phi_tertiary_color')!=''){
	
	$stylestring.='.sidebar, .author-box{background-color:'. get_option('phi_tertiary_color').';}';
	}
	
if(get_option('phi_contrast_color')!=''){
	
$stylestring.= '/* SIGNAL AND LINK COLOR */
input[type=submit]:hover, 
input[type=submit]#searchsubmit:hover, input[type=submit]#searchsubmit-flex:hover, 
#nav ul li.current_page_ancestor a, 
#nav ul li.current_page_item a,
#homebutton a.active,
#shortcuts ul li a,
a.button,
.shortcut_hover{background-color:'.get_option('phi_contrast_color') .';} ';
}
$stylestring.= 'h1,h2,h3,h4{font-family:'.get_option('phi_titlefont').';}
h1{font-size:'.get_option('phi_h1').';}
h2{font-size:'.get_option('phi_h2').';}
h3{font-size:'.get_option('phi_h3').';}
h4{font-size:'.get_option('phi_h4').';}
h5{font-size:'.get_option('phi_h5').';}
h6{font-size:'.get_option('phi_h6').';}
p{font-size:'.get_option('phi_p').';}
a{color:'. get_option('phi_custom_link_color').';}
/* PRIMARY COLOR */
input[type=submit],
#nav ul,
#nav ul ul li a,
#homebutton a,
#tabnav li.active a,
h2.trigger{background-color:'.get_option('phi_primary_color').';}
/* SECONDARY COLOR */
#search,
input[type=submit]#searchsubmit, input[type=submit]#searchsubmit-flex,
#nav ul li a:hover,
#nav ul ul li.current_menu_parent ul li a:hover, 
#nav ul ul li.current-menu-ancestor ul li a:hover, 
#nav ul ul li.current-menu-item ul li a:hover, 
#nav ul ul li a:hover,
#homebutton a:hover,
#tabnav li a,
h2.trigger:hover,
h2.active,
#slider-full {background-color:'.get_option('phi_secondary_color').';}
#nav, #homebutton{border-bottom:2px solid '.get_option('phi_secondary_color').';}
/* TERTIARY COLOR */
body,html, #slider-full{background-color:'.$backgroundcolor.'; font-family:'.get_option('phi_htmlfont').';}
body,html{background-image: url('. $newbackgroundimage.'); '.$backgroundposition.'}
#feature{height:'.$imageheight_slider.'px;}
#footer{background-color:'. get_option('phi_custom_background_footer').';}
</style>';
echo $stylestring;
}
?>
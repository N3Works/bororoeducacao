<?php get_header();?>

						<div id="pagecontent">
									
<?php 
// HOME PAGE CONTENT
$pager = get_option('phi_home_blog_pager');

$mod_1 = get_option('phi_home_module_1');
$mod_2 = get_option('phi_home_module_2');
$mod_3 = get_option('phi_home_module_3');
$mod_4 = get_option('phi_home_module_4');
$mod_5 = get_option('phi_home_module_5');
$mod_6 = get_option('phi_home_module_6');
$mod_7 = get_option('phi_home_module_7');
$mod_8 = get_option('phi_home_module_8');
$mod_9 = get_option('phi_home_module_9');
$mod_10 = get_option('phi_home_module_10');


if($mod_1){
	
	include(TEMPLATEPATH.$mod_1);
	
	}

if($mod_2){
	
	include(TEMPLATEPATH.$mod_2);
	
	}

if($mod_3){
	
	include(TEMPLATEPATH.$mod_3);
	
	}

if($mod_4){
	
	include(TEMPLATEPATH.$mod_4);
	
	}

if($mod_5){
	
	include(TEMPLATEPATH.$mod_5);
	
	}

if($mod_6){
	
	include(TEMPLATEPATH.$mod_6);
	
	}

if($mod_7){
	
	include(TEMPLATEPATH.$mod_7);
	
	}
	
if($mod_8){
	
	include(TEMPLATEPATH.$mod_7);
	
	}
	
if($mod_9){
	
	include(TEMPLATEPATH.$mod_7);
	
	}
	
if($mod_10){

	include(TEMPLATEPATH.$mod_10);
	
	}
									
?>
									
									
									
</div>			
<?php get_footer();?>
			
			

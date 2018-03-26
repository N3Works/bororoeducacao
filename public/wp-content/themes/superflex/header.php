<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php wp_title('&laquo;', true, 'right'); ?>
<?php bloginfo('name'); ?>
</title>
<?php wp_head(); ?>

<meta name="home_slider_timeout" content="<?php echo get_option('phi_home_slider_timeout'); ?>" />
<meta name="home_slider_effect" content="<?php echo get_option('phi_home_slider_effect'); ?>" />

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/style.css"/>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/lib/css/<?php echo get_option('phi_mycolourscheme');?>.css"/>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/lib/css/prettyPhoto.css"/>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/lib/scripts/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/lib/scripts/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/lib/scripts/jquery.easing.1.1.3.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/lib/scripts/jquery.prettyPhoto.js"></script>
<?php if(get_option('phi_cufonfont')!='0'):?><?php endif;?>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/lib/scripts/cufon.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/lib/scripts/cufonfonts/<?php echo get_option('phi_cufonfont');?>.js"></script>

<?php if(get_option('phi_dropdown')==false):?>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/lib/scripts/jqueryslidemenu.js"></script>
<?php endif;?>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/lib/scripts/superflex.js"></script>

<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>

<?php styleString();?>

</head>
<body>

<div id="wrap">

			
			<div id="content">
			
						<div id="header">
						
							<?php include(TEMPLATEPATH.'/lib/includes/sociables.php');?>
						
						
						<?php if (get_option(phi_logo_url)):?>
									<a href="<?php echo get_bloginfo('wpurl'); ?>" title="<?php echo $home_page_name;?>"><img src="<?php echo get_option('phi_logo_url');?>" alt="<?php echo $home_page_name;?>" id="logo"/></a>
									<?php endif;?>
						</div>
			
			
						<!-- SEARCH MODULE-->
						<?php if(get_option('phi_disable_search')==false):?>
						<div id="search"> <span><?php echo get_option('phi_trans_searchbox');?></span>
								
									
									<form action="<?php bloginfo('wpurl');?>" method="get" id="searchform-flex">
			<p><input type="text" value="" name="s" id="s" />
			<input type="submit" id="searchsubmit-flex" value="" />
			</p>
		</form>
						</div>
						<!-- / SEARCH MODULE-->
						<?php endif;?>
						
						<?php if(get_option('phi_disable_shortcuts')==false):?>
						<!-- SHORTCUTS MODULE-->
							<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'menu_container' => 'div', 'container_id' => 'shortcuts','link_before' => '<span>', 'link_after' => '</span>','menu_class' => '', 'menu' => 'shortcuts', 'theme_location' => 'shortcuts'));?>
						<!-- / SHORTCUTS MODULE-->
						<?php endif;?>
						
						<!-- MAIN NAVIGATION -->
						<div id="homebutton"><a href="<?php echo get_bloginfo('wpurl');?>" title="<?php echo get_option('phi_trans_home');?>" <?php if (is_home()){echo 'class="active"';}?>><span>Home</span></a></div>
			<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'menu_container' => 'div', 'container_id' => 'nav','link_before' => '<span>', 'link_after' => '</span>','menu_class' => '',  'theme_location' => 'primary', 'menu' => 'primary'));?>
						<!-- / MAIN NAVIGATION -->
						
						
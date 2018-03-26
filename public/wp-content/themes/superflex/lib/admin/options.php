<?php

$shortname="phi";

$phi_homecontent = array(
						'/lib/includes/slideshow.php' => 'Slideshow',
						'/lib/includes/home-teasers.php' => 'Teasers',
						'/lib/includes/home-blog.php' => 'Blog',
						'/lib/includes/home-widget-1.php' => 'Home widget 1 ',
						'/lib/includes/home-widget-2.php' => 'Home widget 2 ',
						'/lib/includes/home-widget-3.php' => 'Home widget 3 ',
						'/lib/includes/home-widget-4.php' => 'Home widget 4 ',
						'/lib/includes/home-widget-5.php' => 'Home widget 5 ',
						'/lib/includes/home-widget-6.php' => 'Home widget 6 ',
						'/lib/includes/home-widget-7.php' => 'Home widget 7 ',
						'/lib/includes/home-widget-8.php' => 'Home widget 8 ',
						'/lib/includes/home-widget-9.php' => 'Home widget 9 ',
						'/lib/includes/home-widget-10.php' => 'Home widget 10 '
						 );



$options = array (
						
		// GLOBAL SETTINGS
				  
		array(
				"name" => "Demo content",
				"type" => "heading"),
		
		
		
		
		
		
		array("name" => "Install demo content",
				"desc" => "Here you can install demo content that you can use as examples when building your site. You can also uninstall these pages/posts at a later time. <br/><br/><i>For the uninstall to work, you can not change the page title/name</i>",
				"id" => "calibra_theme_activated",
				"type" => "setupactivation",
				"std" => "Select option:",
				"options" =>  array(	'install' => "Install demo content",
											'uninstall' => "Uninstall demo content"),
				
				),
		
		
		array(
				"name" => "Image resizing",
				"type" => "heading"),
		
		
		array("name" => "Image resizing",
				"desc" => "Decide what kind of resizing script you want for your images. Wordpress default renders quicker, but the images are resized on upload. Timthumb resizes on the fly, but renders slower",
				"id" => $shortname."_resize",
				"type" => "select",
				"std" => "Select option:",
				"options" =>  array(	'timthumb' => "Timthumb resizing",
											'wordpress' => "Wordpress default"),
				
				),
		

		array(
				"name" => "Logo",
				"type" => "heading"),
		
		
		array(
				"name" => "Logo image",
				"desc" => "Add your logo here",
				"id" => $shortname."_logo_url",
				"type" => "upload"),
		
		
		
		array("name" => "Disable/hide search box",
			  "desc" => "Check this if you want to disable/hide the search module",
				"id" => $shortname."_disable_search",
				"type" => "checkbox"),
		
		array("name" => "Disable/hide shortcut-menu",
			  "desc" => "Check this if you want to disable/hide the shortcut-menu module",
				"id" => $shortname."_disable_shortcuts",
				"type" => "checkbox"),
			
		
		array("name" => "Disable dropdown in main menu",
			  "desc" => "Check this if you want to disable the dropdown functionality in the main navigation",
				"id" => $shortname."_dropdown",
				"type" => "checkbox"),
		
		array("name" => "Disable footer",
			  "desc" => "Check this if you want to disable the footer widgets",
				"id" => $shortname."_footer",
				"type" => "checkbox"),
		
		
		array(
				"name" => "Footer Copyright Text",
				"desc" => "This is the copyright-notice on the bottom of all pages.",
				"id" => $shortname."_credits",
				"type" => "text"),
		
		
		array(
				"name" => "Contact Form Mail",
				"desc" => "Please write an email-adress for contact form submissions.",
				"id" => $shortname."_form_mail",
				"type" => "text"),
		



		array("name" => "Google Analytics Tracking Code",
				 "desc" => "dfdsf",
				"id" => $shortname."_analytics",
				"type" => "textarea"),
		
		
		// HOME PAGE SETTINGS
		
		array("type" => "break"),
		
		array(
				"name" => "Home page modules",
				"desc" => "Select what to display on the home page, ant it's order.",
				"type" => "heading"
			),
		
			array("name" => "Home module 1",
				//"desc" => "Select what to display in home page module 1",
				"id" => $shortname."_home_module_1",
				"options" =>  $phi_homecontent,
				"type" => "select"
		),
			
			array("name" => "Home module 2",
				//"desc" => "Select what to display in home page module 2",
				"id" => $shortname."_home_module_2",
				"options" =>  $phi_homecontent,
				"type" => "select"
		),
			array("name" => "Home module 3",
				//"desc" => "Select what to display in home page module 3",
				"id" => $shortname."_home_module_3",
				"options" =>  $phi_homecontent,
				"type" => "select"
		),
					
			array("name" => "Home module 4",
				//"desc" => "Select what to display in home page module 4",
				"id" => $shortname."_home_module_4",
				"options" =>  $phi_homecontent,
				"type" => "select"
		),
			
			array("name" => "Home module 5",
				//"desc" => "Select what to display in home page module 4",
				"id" => $shortname."_home_module_5",
				"options" =>  $phi_homecontent,
				"type" => "select"
		),
			
			array("name" => "Home module 6",
				//"desc" => "Select what to display in home page module 4",
				"id" => $shortname."_home_module_6",
				"options" =>  $phi_homecontent,
				"type" => "select"
		),
			
			array("name" => "Home module 7",
				//"desc" => "Select what to display in home page module 4",
				"id" => $shortname."_home_module_7",
				"options" =>  $phi_homecontent,
				"type" => "select"
		),
			
			array("name" => "Home module 8",
				//"desc" => "Select what to display in home page module 4",
				"id" => $shortname."_home_module_8",
				"options" =>  $phi_homecontent,
				"type" => "select",
		),
			
			array("name" => "Home module 9",
				//"desc" => "Select what to display in home page module 4",
				"id" => $shortname."_home_module_9",
				"options" =>  $phi_homecontent,
				"type" => "select",
		),
			
			array("name" => "Home module 10",
				"desc" => "Select what to display in home page module 4",
				"id" => $shortname."_home_module_10",
				"options" =>  $phi_homecontent,
				"type" => "select",
		),
		
		array(
				"name" => "Slideshow",
				"type" => "heading"),
		
		
				
							
		array("name" => "Transition effect ",
				"id" => $shortname."_home_slider_effect",
				"options" =>  array(
								"blindX"	=>	    "blindX",
								"blindY"	=>	    "blindY",
								"blindZ"	=>	    "blindZ",
								"cover"	=>	    "cover",
								"curtainX"	=>	    "curtainX",
								"curtainY"	=>	    "curtainY",
								"fade"	=>	    "fade",
								"fadeZoom"	=>	    "fadeZoom",
								"growX"	=>	    "growX",
								"growY"	=>	    "growY",
								"none"	=>	    "none",
								"scrollUp"	=>	    "scrollUp",
								"scrollDown"	=>	    "scrollDown",
								"scrollLeft"	=>	    "scrollLeft",
								"scrollRight"	=>	    "scrollRight",
								"scrollHorz"	=>	    "scrollHorz",
								"scrollVert"	=>	    "scrollVert",
								"shuffle"	=>	    "shuffle",
								"slideX"	=>	    "slideX",
								"slideY"	=>	    "slideY",
								"toss"	=>	    "toss",
								"turnUp"	=>	    "turnUp",
								"turnDown"	=>	    "turnDown",
								"turnLeft"	=>	    "turnLeft",
								"turnRight"	=>	    "turnRight",
								"uncover"	=>	    "uncover",
								"wipe"	=>	    "wipe",
								"zoom"	=>	    "zoom",
											),
				

				"type" => "select"), 
		
		array(
				"name" => "Autoplay interval",
				"desc" => "Enter value in milliseconds. Set to 0 if you want to disable autoslides.",
				"id" => $shortname."_home_slider_timeout",
				"type" => "text"),
		
		array(
				"name" => "Home page blog posts",
				"type" => "heading"),
		
		
		array(
				"name" => "Post per page for blog posts on home page",
				"desc" => "Enter how many blog posts you want to display on home page",
				"id" => $shortname."_home_blog_pager",
				"type" => "text"),
		
		// PORTFOLIO PAGE SETTINGS
		
		array("type" => "break"),
		
				array(
				"name" => "Options for portfolio-pages",
				"type" => "heading"),
						
				array(
				"name" => "Portfolio excerpt",
				"desc" => "Hide excerpt in portfolio pages",
				"id" => $shortname."_disable_portfolioexcerpt",
				"type" => "checkbox"),
		
				array(
				"name" => "Thumbnail behaviour when clicked",
				"desc" => "Choose if you want to link thumbnail to the post or to enlarge the thumbnail in  prettyPhoto lightbox. Default behaviour is enlargement",
				"id" => $shortname."_thumbnail_click",
				"type" => "select",
				"std" => "Select option:",
				"options" =>  array(	'lightbox' => "Enlarge image",
											'postlink' => "Open post"),
				),
				
				array(
				"name" => "Post order",
				"desc" => "Choose if you want to link thumbnail to the post or to enlarge the thumbnail in  prettyPhoto lightbox. Default behaviour is enlargement",
				"id" => $shortname."_portfolio_order",
				"type" => "select",
				"std" => "Select option:",
				"options" =>  array(	'DESC' => "Descending",
											'ASC' => "Ascending"),
				),
		
		
		// BLOG PAGE SETTINGS
		
		
		array("type" => "break"),
		
				array(
				"name" => "Options for Blog",
				"desc" => "Settings for Blog-page, archive-pages, category-pages, tag-pages etc",
				"type" => "heading"),
							
				array(
				"name" => "Posts per page on blog pages",
				"desc" => "Enter the number of post you want to show per page on Blog-page, archive-pages, category-pages, tag-pages etc",
				"id" => $shortname."_blog_pager",
				"type" => "text"),
				
				array(
				"name" => "Display author info in posts",
				"desc" => "Displays a container with author info below the post content",
				"id" => $shortname."_display_authorbox",
				"type" => "checkbox"),
				
				array(
				"name" => "Display related posts",
				"desc" => "Displays a list of related posts below the post content.",
				"id" => $shortname."_display_related",
				"type" => "checkbox"),
				
				array(
				"name" => "Hide publish date in post-meta",
				"desc" => "Hide publish date in post meta on Blog-page, archive-pages, category-pages, tag-pages etc",
				"id" => $shortname."_display_publishdate",
				"type" => "checkbox"),
				
				array(
				"name" => "Hide author in  meta",
				"desc" => "Hide author in post meta on Blog-page, archive-pages, category-pages, tag-pages etc",
				"id" => $shortname."_display_author",
				"type" => "checkbox"),
				
				array(
				"name" => "Hide categories in post-meta",
				"desc" => "Hide categories in post meta on Blog-page, archive-pages, category-pages, tag-pages etc",
				"id" => $shortname."_display_categories",
				"type" => "checkbox"),
				
				array(
				"name" => "Display post content in listing",
				"desc" => "Display post content instead of excerpt on Blog-page, archive-pages, category-pages, tag-pages etc",
				"id" => $shortname."_display_postcontent",
				"type" => "checkbox"),
				
		
		// SOCIAL MEDIA SETTINGS
				
		array("type" => "break"),
		
				array(
				"name" => "Social media buttons ",
				"type" => "heading"),
		
				array(
				"name" => "Social media button 1 ",
				"type" => "subheading"),
		
				array(
				"name" => "Social media icon 1",
				"desc" => "Enter path to image",
				"id" => $shortname."_smi_image_1",
				"type" => "upload"),
		
				array(
				"name" => "Social media icon 1 url",
				"desc" => "Enter url",
				"id" => $shortname."_smi_url_1",
				"type" => "text"),
		
				array(
				"name" => "Social media icon 1 text",
				"desc" => "Enter text",
				"id" => $shortname."_smi_text_1",
				"type" => "text"),
		
				array(
				"name" => "Social media button 2 ",
				"type" => "upload"),
		
				array(
				"name" => "Social media icon 2",
				"desc" => "Enter path to image",
				"id" => $shortname."_smi_image_2",
				"type" => "upload"),
		
				array(
				"name" => "Social media icon 2 url",
				"desc" => "Enter url",
				"id" => $shortname."_smi_url_2",
				"type" => "text"),
		
				array(
				"name" => "Social media icon 2 text",
				"desc" => "Enter text",
				"id" => $shortname."_smi_text_2",
				"type" => "text"),
		
				array(
				"name" => "Social media button 3 ",
				"type" => "subheading"),

				array(
				"name" => "Social media icon 3",
				"desc" => "Enter path to image",
				"id" => $shortname."_smi_image_3",
				"type" => "upload"),
			
				array(
				"name" => "Social media icon 3 url",
				"desc" => "Enter url",
				"id" => $shortname."_smi_url_3",
				"type" => "text"),
		
				array(
				"name" => "Social media icon 3 text",
				"desc" => "Enter text",
				"id" => $shortname."_smi_text_3",
				"type" => "text"),
		
				array(
				"name" => "Social media button 4 ",
				"type" => "subheading"),
		
				array(
				"name" => "Social media icon 4",
				"desc" => "Enter path to image",
				"id" => $shortname."_smi_image_4",
				"type" => "upload"),
		
				array(
				"name" => "Social media icon 4 url",
				"desc" => "Enter url",
				"id" => $shortname."_smi_url_4",
				"type" => "text"),
		
				array(
				"name" => "Social media icon 4 text",
				"desc" => "Enter text",
				"id" => $shortname."_smi_text_4",
				"type" => "text"),
				
				array(
				"name" => "Social media button 5 ",
				"type" => "subheading"),
		
		
				array(
				"name" => "Social media icon 5",
				"desc" => "Enter path to image",
				"id" => $shortname."_smi_image_5",
				"type" => "upload"),
		
				array(
				"name" => "Social media icon 5 url",
				"desc" => "Enter url",
				"id" => $shortname."_smi_url_5",
				"type" => "text"),
		
				array(
				"name" => "Social media icon 5 text",
				"desc" => "Enter text",
				"id" => $shortname."_smi_text_5",
				"type" => "text"),
		
				array(
				"name" => "Social media button 6 ",
				"type" => "subheading"),
		
		
				array(
				"name" => "Social media icon 6",
				"desc" => "Enter path to image",
				"id" => $shortname."_smi_image_6",
				"type" => "upload"),
		
				array(
				"name" => "Social media icon 6 url",
				"desc" => "Enter url",
				"id" => $shortname."_smi_url_6",
				"type" => "text"),
		
				array(
				"name" => "Social media icon 6 text",
				"desc" => "Enter text",
				"id" => $shortname."_smi_text_6",
				"type" => "text"),
		
				array(
				"name" => "Social media button 7",
				"type" => "subheading"),
		
		
				array(
				"name" => "Social media icon 7",
				"desc" => "Enter path to image",
				"id" => $shortname."_smi_image_7",
				"type" => "upload"),
		
				array(
				"name" => "Social media icon 7 url",
				"desc" => "Enter url",
				"id" => $shortname."_smi_url_7",
				"type" => "text"),
		
				array(
				"name" => "Social media icon 7 text",
				"desc" => "Enter text",
				"id" => $shortname."_smi_text_7",
				"type" => "text"),
		
				array(
				"name" => "Social media button 8 ",
				"type" => "subheading"),
				
				array(
				"name" => "Social media icon 8",
				"desc" => "Enter path to image",
				"id" => $shortname."_smi_image_8",
				"type" => "upload"),
		
				array(
				"name" => "Social media icon 8 url",
				"desc" => "Enter url",
				"id" => $shortname."_smi_url_8",
				"type" => "text"),
		
				array(
				"name" => "Social media icon 8 text",
				"desc" => "Enter text",
				"id" => $shortname."_smi_text_8",
				"type" => "text"),
		
				array(
				"name" => "Social media button 9 ",
				"type" => "subheading"),
		
		
				array(
				"name" => "Social media icon 9",
				"desc" => "Enter path to image",
				"id" => $shortname."_smi_image_9",
				"type" => "upload"),
		
				array(
				"name" => "Social media icon 9 url",
				"desc" => "Enter url",
				"id" => $shortname."_smi_url_9",
				"type" => "text"),
		
				array(
				"name" => "Social media icon 9 text",
				"desc" => "Enter text",
				"id" => $shortname."_smi_text_9",
				"type" => "text"),
		
				array(
				"name" => "Social media button 10 ",
				"type" => "subheading"),
		
		
				array(
				"name" => "Social media icon 10",
				"desc" => "Enter path to image",
				"id" => $shortname."_smi_image_10",
				"type" => "upload"),
		
				array(
				"name" => "Social media icon 10 url",
				"desc" => "Enter url",
				"id" => $shortname."_smi_url_10",
				"type" => "text"),
		
				array(
				"name" => "Social media icon 10 text",
				"desc" => "Enter text",
				"id" => $shortname."_smi_text_10",
				"type" => "text"),
				
				
				// STYLE AND LAYOUT SETTINGS
				
				array("type" => "break"),
				
				array(
				"name" => "Skins/colors",
				"desc" => "",
				"type" => "heading"),




		array(	"name" => "Colour Scheme",
				"id" => $shortname."_mycolourscheme",
				"type" => "select",
				"std" => "Choose a colour scheme:",
					"options" =>  array(
												'default' => "Blue and orange",
												'coffee_magenta' => "Coffe and magenta",	
												'dark_grey' => "Dark grey",
												'black_white_olive' => "Black/white and olive",
												'black_white_red' => "Black/white and red",
												'grey_aqua' => "Grey and aqua",
												'chocolate_yellow' => "Chocolate and yellow",
												'black_yellow' => "Black and yellow",
				
											),
				),
		
		array(
				"name" => "Background",
				"desc" => "Here you define background colors for various parts of the theme.",
				"type" => "subheading"),
		
		array(	"name" => "Background image",
				"desc" => "Choose background image. The hex color code for each background is what you should set the custom page background color to, so the slideshow image border displays nicely.",
				"id" => $shortname."_listed_background_image",
				"type" => "select",
				"std" => "Pick an image:",
					"options" =>  array(		
												
												'/lib/img/patterns/medium_grey_grunge.jpg' =>"Grunge - Medium grey",
												'/lib/img/patterns/dark_tan_grunge.jpg' =>"Grunge - Dark tan",
												'/lib/img/patterns/black_wood.jpg' =>"Wood - Black",
												'/lib/img/patterns/dark_wood.jpg' =>"Wood - Dark",
												'/lib/img/patterns/narrow_wood_black.jpg' =>"Narrow wood - Black",
												'/lib/img/patterns/narrow_wood_grey.jpg' =>"Narrow wood - Dark grey",
												'/lib/img/patterns/narrow_wood_grey.jpg' =>"Narrow wood - Grey",
												'/lib/img/patterns/narrow_wood_light.jpg' =>"Narrow wood - Light grey",
												'/lib/img/patterns/rough_wood_medium_tan.jpg' =>"Rough wood - Medium tan",
												'/lib/img/patterns/rough_wood_dark_tan.jpg' =>"Rough wood - Dark tan",
												'/lib/img/patterns/rough_wood_black_tan.jpg' =>"Rough wood - Black tan)",
												'/lib/img/patterns/concrete_light_grey.jpg' =>"Concrete - Light grey",
												'/lib/img/patterns/concrete_medium_grey.jpg' =>"Concrete - Medium grey",
												'/lib/img/patterns/concrete_dark_grey.jpg' =>"Concrete - Dark grey",
												'/lib/img/patterns/stone_black.jpg' =>"Stone - Black (#000)",
												'/lib/img/patterns/stripes_vert_wide.png' =>"Stripes wide vertical",
												'/lib/img/patterns/stripes_vert_narrow.png' =>"Stripes narrow vertical",
												'/lib/img/patterns/stripes_hor_wide.png' =>"Stripes wide horisontal",
												'/lib/img/patterns/stripes_hor_narrow.png' =>"Stripes narrow horisontal",
												'/lib/img/patterns/stripes_diagonal.png' =>"Stripes diagonal",
												'/lib/img/patterns/circles_small.png' =>"Small circles",
												'/lib/img/patterns/cross_small.png' =>"Small crosses",
												'/lib/img/patterns/square_small.png' =>"Small squares",
									
												
												'' => "No background image",
																		
											),
				),
		
		array(
				"name" => "Custom page background image",
				"desc" => "If you want another image for page background, add image here",
				"id" => $shortname."_custom_background_image",
				"type" => "upload"),
		
		
		
		
		array("name" => "Disable tiled background",
			  "desc" => "Check this if you do not want the background image to tile/repeat",
				"id" => $shortname."_disable_tiled_background",
				"type" => "checkbox"),
			
		
		
		
		array(
				"name" => "Custom page background color",
				"desc" => "Her you define color for page background. Click on the input field to open the colorpicker",
				"id" => $shortname."_custom_background_color",
				"type" => "colorpicker"),
		
		array(
				"name" => "Custom footer background color",
				"desc" => "Her you define color for foooter background. Click on the input field to open the colorpicker",
				"id" => $shortname."_custom_background_footer",
				"type" => "colorpicker"),
		
		
		array(
				"name" => "Primary element color",
				"desc" => "Primary skin color ",
				"id" => $shortname."_primary_color",
				"type" => "colorpicker"),
		
		array(
				"name" => "Secondary element color",
				"desc" => "Secondary skin color",
				"id" => $shortname."_secondary_color",
				"type" => "colorpicker"),
		
		array(
				"name" => "Tertiary element color",
				"desc" => "Tertiary skin color - Used for sidebar background etc.",
				"id" => $shortname."_tertiary_color",
				"type" => "colorpicker"),
		
		array(
				"name" => "Contrast color",
				"desc" => "Used as 'blinking' color for contrast on menu hover etc.",
				"id" => $shortname."_contrast_color",
				"type" => "colorpicker"),
		
		
		array(
				"name" => "Link color",
				"desc" => "Click on the input field to open the colorpicker",
				"id" => $shortname."_custom_link_color",
				"type" => "colorpicker"),
		
		array(
				"name" => "Sidebar",
				"type" => "subheading"),
		
		array(
				"name" => "Sidebar position",
				"desc" => "You can override the stylesheet definitions for colors on links and buttons here by adding a hex color code.",
				"id" => $shortname."_sidebarposition",
				"type" => "select",
				"options" =>  array(
												'left' => "Left",
												'right' => "Right",
									),
				),
		
		
		// FONTS
				
			array("type" => "break"),
		
		
			array(
				"name" => "Font options",
				"type" => "subheading"),
		
			array(
				"name" => "Cufon font",
				"desc" => "Select which font to use for the cufon font replacement. If not set, the pages will display html fonts",
				"id" => $shortname."_cufonfont",
				"type" => "select",
				"options" =>  array(
												
												'leagegothic' 	=> "League Gothic",
												'colaborate' 	=> "Colaborate",
												'quicksand' 	=> "Quicksand",
												'vollkorn'		=> "Vollkorn",
												'libertine'		=> "Libertine",
												),
				),
			
			
		array(
				"name" => "Html header font",
				"desc" => "Select which font set to use for h1, h2, h3 and h4. If you have set a font for Cufont font replacement above, this will override these settings for h1, h2 and h3.",
				"id" => $shortname."_titlefont",
				"type" => "select",
				"options" =>  array(
												
												'Verdana, Geneva, Helvetica, sans serif' => "Verdana, Geneva, sans serif",
												'Georgia, Times New Roman, Times, serif' => "Georgia, Times New Roman, Times, serif",
												'Courier New, Courier, monospace' => "Courier New, Courier, monospace",
												'Arial, Helvetica, sans serif' => "Arial, Helvetica, sans serif",
												'Tahoma, Geneva, Helvetica,sans serif' => "Tahoma, Geneva, sans serif",
												'Trebuchet MS, Arial, Helvetica, sans serif' => "Trebuchet MS, Arial, Helvetica, sans serif",
												'Lucida Sans Unicode, Lucida Grande, Helvetica, sans serif' => "Lucida Sans Unicode, Lucida Grande, sans serif",
												
												),
				),
		
				array(	"name" => "Html  font",
				"desc" => "Select which font set to use for paragraph and lists",
				"id" => $shortname."_htmlfont",
				"type" => "select",
				"options" =>  array(
												
												'Verdana, Geneva,Helvetica,  sans serif' => "Verdana, Geneva, sans serif",
												'Georgia, Times New Roman, Times, serif' => "Georgia, Times New Roman, Times, serif",
												'Courier New, Courier, monospace' => "Courier New, Courier, monospace",
												'Arial, Helvetica, sans serif' => "Arial, Helvetica, sans serif",
												'Tahoma, Geneva, Helvetica, sans serif' => "Tahoma, Geneva, sans serif",
												'Trebuchet MS, Arial, Helvetica, sans serif' => "Trebuchet MS, Arial, Helvetica, sans serif",
												'Lucida Sans Unicode, Helvetica, Lucida Grande,  sans serif' => "Lucida Sans Unicode, Lucida Grande, sans serif",
												
												),
				),
				
				
				
		
		
		
		array("name" => "H1 Font size",
				"desc" => "Enter a value.",
				"id" => $shortname."_h1",
				"type" => "text"
				),
		
		array("name" => "H2 Font size",
				"desc" => "Enter a value.",
				"id" => $shortname."_h2",
				"type" => "text"
				),
		
			array(
				"name" => "H3 Font size",
				"desc" => "Enter a value.",
				"id" => $shortname."_h3",
				"type" => "text"
				),
			
			array(
				"name" => "H4 Font size",
				"desc" => "Enter a value.",
				"id" => $shortname."_h4",
				"type" => "text"
				),
			
				array(
				"name" => "H5 Font size",
				"desc" => "Enter a value.",
				"id" => $shortname."_h5",
				"type" => "text"
				),
			
				array(
				"name" => "H6 Font size",
				"desc" => "Enter a value.",
				"id" => $shortname."_h6",
				"type" => "text"
				),
			
				array("name" => "Paragraph font size",
				"desc" => "Enter a value. Default is 12px",
				"id" => $shortname."_p",
				"type" => "text"
				),
				
				
				// IMAGE SETTINGS
				
				array("type" => "break"),
				
				array(
				"name" => "Options for image resizing/cropping",
				"desc" => "This theme uses timthumb.php for resizing and cropping. On this page you can define the heights for the images on the different areas on the site.You can define image heights for all images except the ones that are displayed in lightbox, which are set to not crop and keep it's original aspect ratio.<br/><br/>
				In addition to these settings, you should also define image sizes in Settings > Media, so that you have correct sizes for images inserted manually into posts. Maximum width for images on regular pages is 620px. Max image width on fullwidth pages is 940. You should therefore set medium image to 620px and large image to 940px. Thumbnail could be anything less than 660px.",
				"type" => "heading"),
		
	
			
		array(
				"name" => "Image heights",
				"type" => "subheading"),
		
		
		array(
				"name" => "Height of images in slider",
				"desc" => "Width 620px",
				"id" => $shortname."_slider_image_height",
				"type" => "text"),
		
		
		array(
				"name" => "Height of images in blog / archive / category -pages",
				"desc" => "Width 300px",
				"id" => $shortname."_blog_image_height",
				"type" => "text"),
		
				
		array(
				"name" => "Height of auto-generated images in content area of single-post and pages",
				"desc" => "Width 620px",
				"id" => $shortname."_post_image_height",
				"type" => "text"),
		
		array(
				"name" => "Height of auto-generated large images on top of pages and posts single-post",
				"desc" => "Width 940px",
				"id" => $shortname."_post_large_image_height",
				"type" => "text"),
		
	
		array(
				"name" => "Height of thumbnail images in 5-column gallery / portfolio layouts",
				"desc" => "Width 220px",
				"id" => $shortname."_5col_image_height",
				"type" => "text"),
		
		
		array(
				"name" => "Height of thumbnail images in 4-column gallery / portfolio layouts",
				"desc" => "Width 220px",
				"id" => $shortname."_4col_image_height",
				"type" => "text"),
		
		array(
				"name" => "Height of thumbnail images in 3-column gallery / portfolio layouts",
				"desc" => "Width 300px",
				"id" => $shortname."_3col_image_height",
				"type" => "text"),
		
		array(
				"name" => "Height of thumbnail images in 2-column gallery / portfolio layouts",
				"desc" => "Width 460px",
				"id" => $shortname."_2col_image_height",
				"type" => "text"),
		
		array(
				"name" => "Height of images in Gallery-slider",
				"desc" => "Width 940px",
				"id" => $shortname."_gallery_slider_image_height",
				"type" => "text"),
		
		array(
				"name" => "Height of thumbnails on home page",
				"desc" => "Width 300px",
				"id" => $shortname."_home_thumbnail",
				"type" => "text"),
		
		// TRANSLATION PANEL
				
		array("type" => "break"),
		
		array(
				"name" => "Theme translation",
				"type" => "heading"),
				
				
				array(
				"name" => "Home name",
				"desc" => "",
				"id" => $shortname."_trans_home",
				"type" => "text"),
							
				array(
				"name" => "Read more text",
				"desc" => "",
				"id" => $shortname."_trans_readmore",
				"type" => "text"),
				
				array(
				"name" => "Text for searchbox",
				"desc" => "",
				"id" => $shortname."_trans_searchbox",
				"type" => "text"),
				
				
				array(
				"name" => "Blog and archive pages",
				"type" => "subheading"),
				
				array(
				"name" => "Posted on",
				"desc" => "",
				"id" => $shortname."_trans_postedon",
				"type" => "text"),
				
				array(
				"name" => "Posted by",
				"desc" => "",
				"id" => $shortname."_trans_postedby",
				"type" => "text"),
				
				array(
				"name" => "In category",
				"desc" => "",
				"id" => $shortname."_trans_incategory",
				"type" => "text"),
				
				array(
				"name" => "Tags",
				"desc" => "",
				"id" => $shortname."_trans_withtags",
				"type" => "text"),
				
				array(
				"name" => "Post comments",
				"type" => "subheading"),
				
				array(
				"name" => "Reply",
				"desc" => "",
				"id" => $shortname."_trans_reply",
				"type" => "text"),
				
				array(
				"name" => "Replies",
				"desc" => "",
				"id" => $shortname."_trans_replies",
				"type" => "text"),
				
				array(
				"name" => "Leave a reply",
				"desc" => "",
				"id" => $shortname."_trans_leaveareply",
				"type" => "text"),
				
				array(
				"name" => "Leave a reply to",
				"desc" => "",
				"id" => $shortname."_trans_leaveareplyto",
				"type" => "text"),
				
				array(
				"name" => "You must be logged in to leave a reply",
				"desc" => "",
				"id" => $shortname."_trans_youmustbeloggedin",
				"type" => "text"),
				
				array(
				"name" => "Logged in as",
				"desc" => "",
				"id" => $shortname."_trans_loggedinas",
				"type" => "text"),
				
				array(
				"name" => "Log out",
				"desc" => "",
				"id" => $shortname."_trans_logout",
				"type" => "text"),
				
				array(
				"name" => "One response",
				"desc" => "",
				"id" => $shortname."_trans_oneresponse",
				"type" => "text"),
					
				array(
				"name" => "No responses",
				"desc" => "",
				"id" => $shortname."_trans_noresponses",
				"type" => "text"),
				
				array(
				"name" => "Responses",
				"desc" => "",
				"id" => $shortname."_trans_responses",
				"type" => "text"),
				
				array(
				"name" => "Your comment is awaiting moderation",
				"desc" => "",
				"id" => $shortname."_trans_awaitingmoderation",
				"type" => "text"),
				
				
				array(
				"name" => "Form",
				"type" => "subheading"),
				
				
				array(
				"name" => "Name",
				"desc" => "",
				"id" => $shortname."_trans_name",
				"type" => "text"),
				
				array(
				"name" => "Name error message",
				"desc" => "",
				"id" => $shortname."_trans_nameerror",
				"type" => "text"),
				
				array(
				"name" => "Email",
				"desc" => "",
				"id" => $shortname."_trans_email",
				"type" => "text"),
				
				array(
				"name" => "Email error message",
				"desc" => "",
				"id" => $shortname."_trans_emailerror",
				"type" => "text"),
				
				array(
				"name" => "Telephone",
				"desc" => "",
				"id" => $shortname."_trans_telephone",
				"type" => "text"),
				
				array(
				"name" => "Comment",
				"desc" => "",
				"id" => $shortname."_trans_comment",
				"type" => "text"),
				
				array(
				"name" => "Comment error comment",
				"desc" => "",
				"id" => $shortname."_trans_commenterror",
				"type" => "text"),
				
				
				array(
				"name" => "Thanks",
				"desc" => "",
				"id" => $shortname."_trans_thanks",
				"type" => "text"),
				
				array(
				"name" => "Receipt message",
				"desc" => "",
				"id" => $shortname."_trans_receipt",
				"type" => "textarea"),
				
				array(
				"name" => "Submit comment",
				"id" => $shortname."_trans_submitcomment",
				"type" => "text"),
				
				array(
				"name" => "Submit reply",
				"id" => $shortname."_trans_submitreply",
				"type" => "text"),
				
				
				array(
				"name" => "404 page",
				"type" => "subheading"),
				
				array(
				"name" => "404 page title:",
				"desc" => "",
				"id" => $shortname."_trans_404_header",
				"type" => "text"),
				
				array(
				"name" => "404 message",
				"desc" => "",
				"id" => $shortname."_trans_404_message",
				"type" => "textarea"),
				
				array(
				"name" => "Breadcrumb",
				"type" => "subheading"),
				
				array(
				"name" => "You are here:",
				"desc" => "",
				"id" => $shortname."_trans_breadcrumb",
				"type" => "text"),
				
				array(
				"name" => "Misc words and phrases",
				"type" => "subheading"),
				
				array(
				"name" => "to",
				"id" => $shortname."_trans_to",
				"type" => "text"),
				
				array(
				"name" => "in",
				"id" => $shortname."_trans_in",
				"type" => "text"),
				
				array(
				"name" => "website",
				"id" => $shortname."_trans_website",
				"type" => "text"),
				
				array(
				"name" => "Edit",
				"id" => $shortname."_trans_edit",
				"type" => "text"),
						
				array(
				"name" => "Says",
				"id" => $shortname."_trans_says",
				"type" => "text"),

				array(
				"name" => "required",
				"id" => $shortname."_trans_required",
				"type" => "text"),
				
				array(
				"name" => "will not be publised",
				"id" => $shortname."_trans_notpublished",
				"type" => "text"),
				
				array(
				"name" => "search",
				"id" => $shortname."_trans_search",
				"type" => "text"),
		
	
		
);



$this_file="options.php";
if ( 'save' == $_REQUEST['action'] & 'options.php' == $_REQUEST['page'] ) {
		foreach ($options as $value) {
				if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], stripslashes($_REQUEST[ $value['id'] ])  ); } else { delete_option( $value['id'] ); } }
		
	
		
			header("Location:?page=".$_REQUEST['page'] ."&saved=true");

							
			
				
				if($_REQUEST['phi_blog_ex_cat']!=""){
							$slider_category_final="";
							foreach($_REQUEST['phi_blog_ex_cat']  as $slider_category) {
									$slider_category_final .= $slider_category .",";
							}
							update_option( "phi_blog_ex_cat[]", $slider_category_final);
						}
				

		die;
}

function phi_general(){	

	global $options;
	admin_head_addition();
	$ca=phi_menu('1');
	echo $ca;
	phi_generate_form($options);
	
    if ( $_REQUEST['saved'] ) echo '<div id="message" class="saviour"><p><strong>Saving...</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="saviour"><p><strong> settings reset.</strong></p></div>';
	
}

?>
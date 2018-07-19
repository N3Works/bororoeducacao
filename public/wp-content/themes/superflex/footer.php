				
					<div id="footer">
						<?php if (get_option('phi_footer')==false):?>
						<div class="one-fourth">
								<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Column 1')){};?>
						</div>
						<div class="one-fourth">
								<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Column 2')){};?>
						</div>
						<div class="one-fourth">
								<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Column 3')){};?>
						</div>
						<div class="one-fourth last">
								<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Column 4')){};?>
						</div>
						<?php endif;?>
						<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'menu_container' => 'div', 'container_id' => 'footernav','link_before' => '<span>', 'link_after' => '</span>','menu_class' => '',  'theme_location' => 'footer'));?>
						<div id="footercredits"><?php echo get_option('phi_credits');?></div>
					</div>
				
			</div>
		</div>

<?php wp_footer();?>
<?php echo get_option('phi_analytics');?>


<script>
var options={ "publisher": "75a49743-e1f1-464a-bcb7-175013cd63e2", "position": "left", "ad": { "visible": false, "openDelay": 5, "closeDelay": 0}, "chicklets": { "items": ["facebook", "twitter", "linkedin", "email", "delicious", "orkut", "messenger", "sharethis", "google_bmarks", "google", "evernote"]}};
var st_hover_widget = new sharethis.widgets.hoverbuttons(options);
</script>


<script>
var options={ "publisher": "ur-9ba58dd3-a5f9-2ed2-29d9-f3965533becc", "position": "left", "ad": { "visible": false, "openDelay": 5, "closeDelay": 0}};
var st_hover_widget = new sharethis.widgets.hoverbuttons(options);
</script>

</body>
</html>
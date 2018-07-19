<?php
// -------------------------------------------------------------------
// REGISTER WIDGETS
// -------------------------------------------------------------------


register_sidebar(array(
'name' => 'Home Page Widget 1',
'id' => 'home_page_widget_1',
'before_title' => '<div class="caption"> <span>',
'after_title' => '</span></div><br class="break"/>',
'before_widget' => '<div class="module">',
'after_widget' => '</div>',
));

register_sidebar(array(
'name' => 'Home Page Widget 2',
'id' => 'home_page_widget_2',
'before_title' => '<div class="caption"> <span>',
'after_title' => '</span></div><br class="break"/>',
'before_widget' => '<div class="module">',
'after_widget' => '</div>',
));

register_sidebar(array(
'name' => 'Home Page Widget 3',
'id' => 'home_page_widget_3',
'before_title' => '<div class="caption"> <span>',
'after_title' => '</span></div><br class="break"/>',
'before_widget' => '<div class="module">',
'after_widget' => '</div>',
));

register_sidebar(array(
'name' => 'Home Page Widget 4',
'id' => 'home_page_widget_4',
'before_title' => '<div class="caption"> <span>',
'after_title' => '</span></div><br class="break"/>',
'before_widget' => '<div class="module">',
'after_widget' => '</div>',
));

register_sidebar(array(
'name' => 'Home Page Widget 5',
'id' => 'home_page_widget_5',
'before_title' => '<div class="caption"> <span>',
'after_title' => '</span></div><br class="break"/>',
'before_widget' => '<div class="module">',
'after_widget' => '</div>',
));

register_sidebar(array(
'name' => 'Home Page Widget 6',
'id' => 'home_page_widget_6',
'before_title' => '<div class="caption"> <span>',
'after_title' => '</span></div><br class="break"/>',
'before_widget' => '<div class="module">',
'after_widget' => '</div>',
));

register_sidebar(array(
'name' => 'Home Page Widget 7',
'id' => 'home_page_widget_7',
'before_title' => '<div class="caption"> <span>',
'after_title' => '</span></div><br class="break"/>',
'before_widget' => '<div class="module">',
'after_widget' => '</div>',
));

register_sidebar(array(
'name' => 'Home Page Widget 8',
'id' => 'home_page_widget_8',
'before_title' => '<div class="caption"> <span>',
'after_title' => '</span></div><br class="break"/>',
'before_widget' => '<div class="module">',
'after_widget' => '</div>',
));

register_sidebar(array(
'name' => 'Home Page Widget 9',
'id' => 'home_page_widget_9',
'before_title' => '<div class="caption"> <span>',
'after_title' => '</span></div><br class="break"/>',
'before_widget' => '<div class="module">',
'after_widget' => '</div>',
));

register_sidebar(array(
'name' => 'Home Page Widget 10',
'id' => 'home_page_widget_10',
'before_title' => '<div class="caption"> <span>',
'after_title' => '</span></div><br class="break"/>',
'before_widget' => '<div class="module">',
'after_widget' => '</div>',
));

register_sidebar(array(
'name' => 'Blog Sidebar',
'id' => 'blog_page_widget',
'before_title' => '<div class="caption-sidebar"> <span>',
'after_title' => '</span></div><br class="break"/>',
'before_widget' => '<div class="sidebar-widget">',
'after_widget' => '</div>',
));

register_sidebar(array(
'name' => 'Sidebar 1',
'id' => 'sidebar_widget_1',
'before_title' => '<div class="caption-sidebar"> <span>',
'after_title' => '</span></div><br class="break"/>',
'before_widget' => '<div class="sidebar-widget">',
'after_widget' => '</div>',
));

register_sidebar(array(
'name' => 'Sidebar 2',
'id' => 'sidebar_widget_2',
'before_title' => '<div class="caption-sidebar"> <span>',
'after_title' => '</span></div><br class="break"/>',
'before_widget' => '<div class="sidebar-widget">',
'after_widget' => '</div>',
));

register_sidebar(array(
'name' => 'Sidebar 3',
'id' => 'sidebar_widget_3',
'before_title' => '<div class="caption-sidebar"> <span>',
'after_title' => '</span></div><br class="break"/>',
'before_widget' => '<div class="sidebar-widget">',
'after_widget' => '</div>',
));

register_sidebar(array(
'name' => 'Footer Column 1',
'id' => 'footer_widget_1',
'before_title' => '<h4>',
'after_title' => '</h4>',
'before_widget' => '<div class="footer-widget">',
'after_widget' => '</div>',
));

register_sidebar(array(
'name' => 'Footer Column 2',
'id' => 'footer_widget_2',
'before_title' => '<h4>',
'after_title' => '</h4>',
'before_widget' => '<div class="footer-widget">',
'after_widget' => '</div>',
));

register_sidebar(array(
'name' => 'Footer Column 3',
'id' => 'footer_widget_3',
'before_title' => '<h4>',
'after_title' => '</h4>',
'before_widget' => '<div class="footer-widget">',
'after_widget' => '</div>',
));

register_sidebar(array(
'name' => 'Footer Column 4',
'id' => 'footer_widget_4',
'before_title' => '<h4>',
'after_title' => '</h4>',
'before_widget' => '<div class="footer-widget">',
'after_widget' => '</div>',
));




add_filter('widget_text', 'do_shortcode'); // Makes it possible to use shortcodes inside text widgets	


?>
<?php

$homepage = get_option('siteurl')."/?page_id=17";
global $wp; $wp_received_argument = true;
foreach ($wp->query_vars as $k=>$v) if ($v) $wp_received_argument = true;

if ($wp_received_argument) require(TEMPLATEPATH . "/index.php");
else {
        wp_redirect($homepage);
        exit();
}

?>
<?php
if (isset($_REQUEST['partial'])) {
    return get_template_part('templates/content', 'single');
}

get_header();

get_template_part('templates/content', 'single');

get_footer();

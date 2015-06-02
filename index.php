<?php
if (isset($_REQUEST['partial'])) {
    return get_template_part('templates/content', 'index');
}

get_header();

get_template_part('templates/content', 'index');

get_footer();

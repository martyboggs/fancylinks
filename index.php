<?php

$partial = get_query_var('partial');
if ($partial) {
    return get_template_part('templates/content', $partial);
}

get_header();

get_template_part('templates/content', 'index');

get_footer();

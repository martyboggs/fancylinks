<?php ?>
<div class="meta">
    <?php
    echo '<span class="meta-author"><i class="fa fa-user"></i> ' . get_the_author() . '</span>';

    $t = strtotime($post->post_date);
    echo '<span class="meta-date"><i class="fa fa-calendar"></i> ' . date('F d, Y', $t) . '</span>';

    $categories = get_the_category();
    echo '<span class="meta-categories"><i class="fa fa-book"></i> ';
    foreach ($categories as $i => $c) {
        echo '<a href="' . get_home_url() . '/' . $c->slug . '">' . $c->name . '</a>';
        echo $i < count($categories) - 1 ? ', ' : '';
    }
    echo '</span>';
    ?>
</div>

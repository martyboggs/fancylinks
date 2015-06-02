<?php ?>
<article id="content">
    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            ?>
            <section style="background: #5959E6;">
                <div class="limit-width" style="color: white">
                    <h2 class="no-margin-top">
                        <?php echo $post->post_title; ?>
                    </h2>

                    <?php get_template_part('templates/content', 'meta'); ?>

                    <?php the_content(); ?>
                </div>
            </section>

            <section style="background: white;">
                <div class="limit-width">
                    <?php
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                    ?>
                </div>
            </section>
            <?php
        endwhile;
    endif;
    ?>
    <div class="push"></div>
</article>

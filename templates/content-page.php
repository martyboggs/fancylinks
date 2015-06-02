<?php ?>
<article id="content">
    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            ?>
            <section class="" style="background: #5959E6;">
                <div class="limit-width text-center" style="color: white">
                    <h2 class="no-margin-top">
                        <?php echo $post->post_title; ?>
                    </h2>
                    <?php the_content() ?>
                </div>
            </section>
            <?php
        endwhile;
    endif;
    ?>
    <div class="push"></div>
</article>

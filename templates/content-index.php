<?php ?>
<article id="content">
    <div class="container">
        <div class="row">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    ?>
                    <section class="col-sm-4" style="color: white;">
                        <a style="color: white" href="<?php echo get_permalink(); ?>">
                            <div class="post">
                                <h2 class="no-margin-top">
                                    <?php echo $post->post_title; ?>
                                </h2>

                                <div class="meta">
                                    <span class="meta-author"><i class="fa fa-user"></i>
                                    <?php echo get_the_author() ?></span>
                                </div>

                                <?php the_excerpt() ?>
                            </div>
                        </a>
                    </section>
                    <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>
    <div class="push"></div>
</article>

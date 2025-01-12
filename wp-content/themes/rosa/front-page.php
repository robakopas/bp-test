<?php get_header(); ?>
<main class="container py-lg-5 py-3">
    <div class="row py-lg-5 py-3">
        <div class="col-lg-3">
            <?php get_template_part( 'template-parts/partials/player' ); // player.php ?>
        </div>
        <div class="col-lg-9">
            <?php
            // Start the WordPress loop to fetch the current page
            if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                        </header><!-- .entry-header -->

                        <div class="entry-content">
                        <?php
                        the_content();
                        ?>
                        </div><!-- .entry-content -->

                    </article><!-- #post-## -->

                <?php endwhile;
            endif;
            ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>

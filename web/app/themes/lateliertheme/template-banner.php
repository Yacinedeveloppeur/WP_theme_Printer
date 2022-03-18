<?php
/**
 * Template Name: Page avec bannière
 * Template Post Type: page, post
*/
?>

<?php get_header() ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <section class="template-banner">
    <article>
    <h1><?php the_title() ?></h1>
        <p>
            <img src="<?php the_post_thumbnail_url('full');?>" alt="" style="width:100%; height=auto;">
        </p>
        <?php the_content() ?>
    </article>
    </section>
<?php endwhile;
endif; ?>


<?php get_footer() ?>
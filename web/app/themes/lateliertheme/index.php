<?php get_header() ?>
<section class="categories">
    <article>
        <h1><?php the_category(' - ') ?></h1>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('parts/category', 'post'); ?>
            <?php endwhile; ?>
            <?php lateliertheme_pagination() ?>
            <?= paginate_links(); ?>
        <?php else : ?>
            <h1>Pas d'articles</h1>
        <?php endif; ?>
    </article>
</section>
<?php get_footer() ?>
<section class="recent_posts">
<article>
    <h2>
        <?=  esc_html(get_field('title_section_4'))?>
    </h2>
    <div class="row">
        <?php 
         $recentPosts = new WP_Query();
         $recentPosts->query('showposts=4');
    ?>
        <?php while($recentPosts->have_posts()): $recentPosts->the_post();?>
            <div class="col">
                <?= get_template_part('parts/card', 'post'); ?>
            </div>
        <?php endwhile; wp_reset_postdata();?>
        </div>
       
</article>
</section>
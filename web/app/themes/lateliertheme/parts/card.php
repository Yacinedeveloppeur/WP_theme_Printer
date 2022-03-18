<?php 
$icon_cards = get_field('icon_cards');
 ?>

<div class="default-card">
    <div>
    <img src="<?= esc_url($icon_cards['url']); ?>" alt="<?= esc_attr($icon_cards['alt']); ?>" width="50px" />
    <h5><?php the_title() ?></h5>    
    </div>
        <p ><?php the_excerpt() ?></p>
        <a href="<?php the_permalink() ?>">Voir plus</a>
</div>


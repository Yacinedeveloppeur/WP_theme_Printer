<?php $request= wp_remote_get("https://jsonplaceholder.typicode.com/albums");
    if (is_wp_error($request)) {
        return false;
    }
    $body = wp_remote_retrieve_body( $request );
    $data = json_decode( $body, true );
?>
<section class="question-list">
    <article>
        <h2>
            <?=  esc_html(get_field('title_section_3'))?>
        </h2>
        <p>
        <?=  esc_html(get_field('text_section_3'))?>
        </p>
        <ul>
            <?php for ($i=0; $i < 4; $i++): $question=$data[$i]['title']?>
             <li><span><?= esc_html($question);?></span><button class="default-btn">Lire</button></li>
            <?php endfor;?>
        </ul>
        <p>
        <button class="default-btn">
            <?php 
                $link_section_3 = get_field('text_button_section_3');
                if( $link_section_3 ): 
                $link_section_3_url = $link_section_3['url'];
                $link_section_3_title = $link_section_3['title'];
                $link_section_3_target = $link_section_3['target'] ? $link_section_3['target'] : '_self';
            ?>
                <a class="button" href="<?= esc_url( $link_section_3_url ); ?>" target="<?= esc_attr( $link_section_3_target ); ?>"><?= esc_html( $link_section_3_title ); ?></a>
                <?php endif; ?></button>
        </p>
    </article>
</section>
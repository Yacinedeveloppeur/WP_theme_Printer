<section class="section-2">
  <article class="article">
    <h2><?= esc_html(get_field('title_section_2')); ?></h2>
    <p class="first-p-section-2"><?= esc_html(get_field('text_section_2')); ?></p>
    <?php
    $images = get_field('gallery_section_2');
    if ($images) : ?>
      <div id="slider" class="slider">
        <?php foreach ($images as $image) : ?>
          <div class="slide" height="50px" style='background-image: url(<?= esc_url($image['url']) ?>)'>

          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <p>
      <button class="default-btn"><?php
                                  $link_section_2 = get_field('button_text_section_2');
                                  if ($link_section_2) :
                                    $link_section_2_url = $link_section_2['url'];
                                    $link_section_2_title = $link_section_2['title'];
                                    $link_section_2_target = $link_section_2['target'] ? $link_section_2['target'] : '_self';
                                  ?>
          <a class="button" href="<?= esc_url($link_section_2_url); ?>" target="<?= esc_attr($link_section_2_target); ?>"><?= esc_html($link_section_2_title); ?></a>
        <?php endif; ?></button>
    </p>
  </article>
</section>
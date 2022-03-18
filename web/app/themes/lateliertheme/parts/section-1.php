<?php
$bg_section_1 = get_field('background_section_1');
?>
<section class="section section-1" style='background-image: url(<?php if (!empty($bg_section_1)) echo esc_url($bg_section_1['url']);
                                                                else echo '' ?>)'>
  <article class="article-1">
    <h1><?= esc_html(get_field('title_section_1')); ?></h1>
    <p><?= esc_html(get_field('text_section_1')); ?></p>
    <form action="" class="help-form" method="" id="help-form">
      <div class="input-radio-container">
        <?php if (have_rows('search_filters')) : ?>
          <?php while (have_rows('search_filters')) : the_row();
            // Get sub field values  
            $filter1 = get_sub_field('filter_1');
            $filter2 = get_sub_field('filter_2');
            $filter3 = get_sub_field('filter_3');
            $description_filter_1 = get_sub_field('description_filter_1');
            $description_filter_2 = get_sub_field('description_filter_2');
            $description_filter_3 = get_sub_field('description_filter_3');
          ?>
            <!-- transfer field description to javasccript variables -->
            <input type="hidden" id="description_filter_1" value="<?= esc_attr($description_filter_1); ?>">
            <input type="hidden" id="description_filter_2" value="<?= esc_attr($description_filter_2); ?>">
            <input type="hidden" id="description_filter_3" value="<?= esc_attr($description_filter_3); ?>">
            <script>
              let description_filter_1 = document.getElementById('description_filter_1').value;
              let description_filter_2 = document.getElementById('description_filter_2').value;
              let description_filter_3 = document.getElementById('description_filter_3').value;
            </script>
            <label onclick="{document.getElementById('description_filter').innerHTML=description_filter_1};">
              <input type="radio" name="filter_section_1" hidden value="modele_cartouche" id="value1">
              <span><?= esc_html($filter1); ?></span>
            </label>
            <label onclick="{document.getElementById('description_filter').innerHTML=description_filter_2}; ">
              <input type="radio" name="filter_section_1" checked hidden value="code_barre_cartouche" id="value2">
              <span><?= esc_html($filter2); ?></span>
            </label>
            <label onclick="{document.getElementById('description_filter').innerHTML=description_filter_3}">
              <input type="radio" name="filter_section_1" hidden value="code_barre_boite" id="value3">
              <span><?= esc_html($filter3); ?></span>
            </label>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
      <p><span id="description_filter"><?= esc_html($description_filter_2); ?></span> <span class="icon_filter">?</span></p>
      <div class="textarea-and-btn-container">
        <textarea type="text" id="autoComplete" tabindex="1"></textarea>
        <button id="btn-search-submit" type="submit" class="default-btn">Rechercher</button>
      </div>
      <div class="selection"></div>
    </form>
  </article>
</section>
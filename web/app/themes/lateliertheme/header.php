<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
    
</head>
<body>
<?php 
$bg_section_1 = get_field('background_section_1');

function display_bg($bg_section_1)
{
  if (!empty($bg_section_1)) {
    return "navbar navbar-expand-md navbar-dark fixed-top header-nav-items";
  }
  else {
    return "navbar navbar-expand-md navbar-dark fixed-top header-nav-items color-bg-header";
  }
}

?>
    <header class="header" style='background-color: <?php if (empty($bg_section_1)){echo('#6A2989;');} else {echo('transparent');} ?>'>
    <nav id="header-nav">
                <?php wp_nav_menu([
                    'theme_location' => 'header',
                    'container' => false,
                    'menu_class' => display_bg($bg_section_1),
                    'menu_id' => 'nav_id',
                ]) ?>      
    </nav>
    <!-- js\header.js -> manages background transparency on scroll -->
</header>
<div class="content">

















    </div>
    <footer class="footer">
    <?php wp_nav_menu([
                    'theme_location' => 'footer-1',
                    'container' => false,
                    'menu_class' => 'footer-1'
    ]);
    ?>
        <?php
            wp_nav_menu([
                'theme_location' => 'footer-2',
                'container' => false,
                'menu_class' => 'footer-2'
]);
        ?> 
    </footer>
    <?php wp_footer() ?>
</body>
</html>


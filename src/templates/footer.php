<?php
$defaultWidth       = strtolower(get_field('default_width', 'option'));
$defaultLogoDark    = get_field('default_logo_dark' ,'option');
$headerType         = strtolower(get_field('header_type', 'option'));
?>
<footer class="footer">
    <div class="<?php if($defaultWidth == 'default'){ echo 'uk-container'; }elseif($defaultWidth == 'large'){ echo 'uk-container-large'; }elseif($defaultWidth == 'extra large' ){ echo 'uk-container-xlarge'; }elseif($defaultWidth == 'expand'){ echo 'uk-container-expand'; } ?> uk-margin-auto">
        <nav class="uk-navbar-container" uk-navbar>
            <div class="uk-navbar-left">
                <?php
                if($defaultLogoDark){
                    ?>
                    <a class="uk-navbar-item uk-logo uk-padding-remove" href="#">
                        <img class="logo" src="<?= $defaultLogoDark['url']; ?>" alt="<?= $defaultLogoDark['alt']; ?>" />
                    </a>
                    <?php
                }
                ?>
            </div>
        </nav>
    </div>
</footer>

<script src="<?= get_stylesheet_directory_uri() . '/bundle.js?=' . time(); ?>"></script>

<?php wp_footer(); ?>

</body>
</html>

<?php
$defaultWidth       = strtolower(get_field('default_width', 'option'));
$defaultLogoDark    = get_field('default_logo_dark' ,'option');
$headerType         = strtolower(get_field('header_type', 'option'));
?>
<header>
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
            <div class="<?php if($headerType == 'navigation left'){ echo 'uk-navbar-left'; }elseif($headerType == 'navigation center'){ echo 'uk-navbar-center'; }elseif($headerType == 'navigation right'){ echo 'uk-navbar-right'; } ?>">
                <a class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon uk-toggle="target: #offcanvas-push"></a>
                <div id="offcanvas-push">
                    <div class="offcanvas-container">
                        <button class="uk-offcanvas-close uk-hidden@m" type="button" uk-close></button>
                        <?php
                        wp_nav_menu( array(
                                'menu'              => 'menu-1',
                                'theme_location'    => 'menu-1',
                                'depth'             => 1,
                                'container'         => '',
                                'menu_class'        => 'uk-navbar-nav',
                                'fallback_cb'       => 'your_themename_top_menu::fallback',
                                'walker'            => new your_themename_top_menu())
                        );
                        ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
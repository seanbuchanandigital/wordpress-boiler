<div class="uk-card uk-card-default">
    <div class="uk-child-width-1-1 uk-grid-collapse" uk-grid>
        <?php
        if($image):
            echo '<div>';
            echo '<div class="card-item__image">';
            echo '<img role="img" aria-label="' . $image['alt'] . '" src="' . $image['url'] . '" alt="' . $image['alt'] . '">';
            echo '</div>';
            echo '</div>';
        endif;
        if($text):
            echo '<div>';
            echo '<div class="card-item__text uk-padding">';
            accessibilityFormater($text);
            echo '</div>';
            echo '</div>';
        endif;
        ?>
    </div>
</div>
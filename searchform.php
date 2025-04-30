<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'kb-biz-flick' ); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder', 'kb-biz-flick' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
    </label>
    <button type="submit" class="search-submit"><?php echo esc_html_x( 'Go', 'submit button', 'kb-biz-flick' ); ?></button>
</form>
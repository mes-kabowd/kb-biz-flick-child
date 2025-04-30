<?php
function kb_biz_flick_custom_post_type() {
    $labels = array(
        'name'                  => _x( 'Portfolios', 'Post type general name', 'kb-biz-flick' ),
        'singular_name'         => _x( 'Portfolio', 'Post type singular name', 'kb-biz-flick' ),
        'menu_name'             => _x( 'Portfolios', 'Admin Menu text', 'kb-biz-flick' ),
        'name_admin_bar'        => _x( 'Portfolio', 'Add New on Toolbar', 'kb-biz-flick' ),
        'add_new'               => __( 'Ajouter Nouveau', 'kb-biz-flick' ),
        'add_new_item'          => __( 'Ajouter Nouveau Portfolio', 'kb-biz-flick' ),
        'new_item'              => __( 'Nouveau Portfolio', 'kb-biz-flick' ),
        'edit_item'             => __( 'Modifier Portfolio', 'kb-biz-flick' ),
        'view_item'             => __( 'Voir Portfolio', 'kb-biz-flick' ),
        'all_items'             => __( 'Tous les Portfolios', 'kb-biz-flick' ),
        'search_items'          => __( 'Rechercher Portfolios', 'kb-biz-flick' ),
        'not_found'             => __( 'Aucun portfolio trouvé', 'kb-biz-flick' ),
        'not_found_in_trash'    => __( 'Aucun portfolio trouvé dans la corbeille', 'kb-biz-flick' ),
    );
    
    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'menu_icon'           => 'dashicons-portfolio',
        'supports'            => array( 'title', 'editor', 'thumbnail' ),
        'rewrite'             => array( 'slug' => 'portfolio' ),
    );
    register_post_type( 'portfolio', $args );
}
add_action( 'init', 'kb_biz_flick_custom_post_type' );
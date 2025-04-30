<?php
function kb_biz_flick_customize_register( $wp_customize ) {
    // Ajouter une section pour les couleurs du thème.
    $wp_customize->add_section( 'kb_biz_flick_colors' , array(
        'title'      => __( 'Couleurs du thème', 'kb-biz-flick' ),
        'priority'   => 30,
    ) );
    
    // Réglage pour la couleur de fond.
    $wp_customize->add_setting( 'kb_biz_flick_background_color' , array(
        'default'   => '#ffffff',
        'transport' => 'refresh',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kb_biz_flick_background_color', array(
        'label'    => __( 'Couleur de fond', 'kb-biz-flick' ),
        'section'  => 'kb_biz_flick_colors',
        'settings' => 'kb_biz_flick_background_color',
    ) ) );
}
add_action( 'customize_register', 'kb_biz_flick_customize_register' );
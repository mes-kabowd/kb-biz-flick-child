<section class="Galerie-Media Block-Main">
    <?php
    $imgs = [
        'Icon Logo Principal Blanc.png',
        'Icon Logo Principal Couleur.png',
        'Icon Logo Principal Noir.png',
        'Logo Principal Blanc.png',
        'Logo Principal Couleur.png',
        'Logo Principal Noir.png',
        'Icon Logo Principal Blanc.png',
        'Icon Logo Principal Couleur.png',
        'Icon Logo Principal Noir.png'
    ];
    foreach ($imgs as $i => $img) {
        echo '<img class="Img'.($i+1).'" src="'.esc_url(get_template_directory_uri().'/assets/img/'.$img).'" alt="">';
    }
    ?>
</section>
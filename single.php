<?php get_header(); ?>
<main>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <section class="Titre-Article Block-Main">
        <section class="Block-Haut">
            <h1 class="TitrePage"><?php the_title(); ?></h1>
        </section>
        <section class="Block-Bas">
            <h3 class="SousTitre"><?php the_author(); ?></h3>
        </section>
        <section class="Block-Droite">
            <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
            <?php else : ?>
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/Logo Principal Couleur.png' ); ?>" alt="">
            <?php endif; ?>
        </section>
    </section>

    <section class="Txt-Article Block-Main">
        <h2><?php _e('Texte', 'blankslate'); ?></h2>
        <?php the_content(); ?>
    </section>

    <section class="MiniMedia-Article Block-Main">
        <h2>Texte + Media</h2>
        <section class="Block-Bas">
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maxime beatae doloremque minima tempora saepe quas deserunt nobis, modi placeat cumque sit explicabo ipsam magnam ratione impedit eos at fugiat rerum voluptatum! Suscipit a tempora maxime beatae impedit quibusdam quis corrupti mollitia vitae, quod debitis consequatur, deserunt sequi esse amet! Quis ab corrupti nihil expedita suscipit molestiae mollitia quae harum ipsam consequatur necessitatibus, in repudiandae eius, quaerat aliquid. Cupiditate omnis eius officia facere minus necessitatibus voluptates? Officiis cumque eligendi fuga quisquam quidem velit vitae ullam animi fugiat exercitationem nostrum, alias nisi id blanditiis eos nam autem ipsam sed. Corporis numquam asperiores voluptatem ipsum adipisci quaerat incidunt expedita nisi excepturi sit, delectus ullam velit veniam? Quibusdam consequatur perspiciatis, eum repellendus obcaecati rem assumenda deleniti sit, quam aliquam, ipsam veritatis provident temporibus laudantium asperiores doloremque inventore ad reprehenderit. Similique error repellat alias quos, deleniti quibusdam velit harum fugiat aspernatur repellendus eum cum veniam quidem accusantium enim sint, magnam quisquam in? Eaque unde repellat voluptatum, id dignissimos ab eum magni hic cum beatae quasi ipsa! Molestias illo, quibusdam iure libero dicta error provident neque rerum delectus vero fugit at similique. Dignissimos cum, totam natus modi eius rem quas eveniet aspernatur aliquam consectetur deserunt optio rerum, delectus nobis dolorum tempora facere quidem eligendi sapiente. Sed nemo ad deserunt tempore dolorem doloremque hic suscipit consectetur natus, inventore molestiae totam sunt provident harum excepturi dolorum qui maiores perferendis deleniti dolor blanditiis reprehenderit rerum? Reiciendis ab quas recusandae similique, neque odit dolorum tempore alias aliquid consectetur dolore temporibus.
            </p>
            <img src="assets/img/Logo Principal Couleur.png" alt="">
        </section>
    </section>

    <section class="Media-Article Block-Main">
        <section class="Block-Gauche">
            <h2>Media</h2>
            <ul>
                <li>mini info 1</li>
                <li>mini info 2</li>
            </ul>
        </section>
        <section class="Block-Droite">
            <img src="assets/img/Logo Principal Couleur.png" alt="">
        </section>
    </section>

    <section class="Galerie-Media Block-Main">
        <img class="Img1" src="assets/img/Icon Logo Principal Blanc.png" alt="">
        <img class="Img2" src="assets/img/Icon Logo Principal Couleur.png" alt="">
        <img class="Img3" src="assets/img/Icon Logo Principal Noir.png" alt="">
        <img class="Img4" src="assets/img/Logo Principal Blanc.png" alt="">
        <img class="Img5" src="assets/img/Logo Principal Couleur.png" alt="">
        <img class="Img6" src="assets/img/Logo Principal Noir.png" alt="">
        <img class="Img7" src="assets/img/Icon Logo Principal Blanc.png" alt="">
        <img class="Img8" src="assets/img/Icon Logo Principal Couleur.png" alt="">
        <img class="Img9" src="assets/img/Icon Logo Principal Noir.png" alt="">
    </section>

    <section class="Ressources-Article Block-Main">
        <h2>Ressources & Liens utiles</h2>
        <ul>
            <li><a href="">Ressource1</a></li>
            <li><a href="">Url</a></li>
            <li><a href="">Titre-Article</a></li>
            <li><a href="">Titre Livre</a></li>
            <li><a href="">Lorem ipsum, dolor sit amet consectetur adipisicing elit. A, quod.</a></li>
        </ul>
    </section>

    <section class="Carrousel-Infini Block-Main">
        <section class="Ctn-Carrousel-Infini">
            <div class="Contenu">
                <article class="ImgCtn">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/1.png" height="100" width="250" alt="" />
                </article>
                <article class="ImgCtn">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/2.png" height="100" width="250" alt="" />
                </article>
                <article class="ImgCtn">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/3.png" height="100" width="250" alt="" />
                </article>
                <article class="ImgCtn">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/4.png" height="100" width="250" alt="" />
                </article>
                <article class="ImgCtn">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/5.png" height="100" width="250" alt="" />
                </article>
                <article class="ImgCtn">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/6.png" height="100" width="250" alt="" />
                </article>
                <article class="ImgCtn">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/7.png" height="100" width="250" alt="" />
                </article>
                <article class="ImgCtn">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/1.png" height="100" width="250" alt="" />
                </article>
                <article class="ImgCtn">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/2.png" height="100" width="250" alt="" />
                </article>
                <article class="ImgCtn">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/3.png" height="100" width="250" alt="" />
                </article>
                <article class="ImgCtn">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/4.png" height="100" width="250" alt="" />
                </article>
                <article class="ImgCtn">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/5.png" height="100" width="250" alt="" />
                </article>
                <article class="ImgCtn">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/6.png" height="100" width="250" alt="" />
                </article>
                <article class="ImgCtn">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/7.png" height="100" width="250" alt="" />
                </article>
            </div>
        </section>
    </section>
<?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
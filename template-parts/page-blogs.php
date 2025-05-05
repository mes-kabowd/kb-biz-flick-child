<?php get_header(); ?>

    <main>
        <section class="Titre-Page Block-Main">
            <section class="Block-Gauche">
                <h1 class="TitrePage">Titre de la page</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi consequatur deleniti maiores quos inventore perferendis reprehenderit quo sit consequuntur ipsum voluptatem porro aut corporis sint, temporibus, corrupti iusto qui dolores!50</p>
            </section>
            
            <section class="Block-Droite">
                <img src="assets/img/Logo Principal Couleur.png" alt="">
            </section>
        </section>
        <section class="Carrousel-pack Block-Main">
            <article class="Block-Haut">
                <h2>Actu en Priorité</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias illum mollitia autem fugit accusantium perferendis eum vero quis minima, ipsum tenetur asperiores ipsam distinctio at! Quasi labore aliquam officia illo officiis, minima eius. Fugit, sed quisquam sapiente labore quidem provident? Voluptas labore ratione perspiciatis, iusto tempore pariatur quas voluptatibus explicabo?</p>
            </article>
        </section>
        <section class="Grd-Carrousel-Blog Block-Main">
            <h2>Contenu de Blog</h2>
            <div class="Filtre">
                <div class="Mini-Entete">
                    <h3>Liste d'articles de Kabowd</h3>
                    <form onsubmit="event.preventDefault();" role="search">
                        <label for="search">Search for stuff</label>
                        <input id="search" type="search" placeholder="Search..." autofocus required />
                        <button type="submit">Go</button>    
                    </form>
                </div>
                <ul>
                    <li><a href="#" class="active">Tout</a></li>
                    <li><a href="#">Communiqué</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Secteurs</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">À propos</a></li>
                </ul>
            <section class="mainCard">
                <div class="mainCardHeader"></div>
                <section class="articles">
                    <article class="miniCard" data-tags="Communiqué">
                        <img src="assets/img/Icon Logo Principal Noir.png" alt="">
                        <div class="InfoBlog">
                            <h3>Titre Article</h3>
                            <h4>Auteur Article</h4>
                            <a href="Articles-Blog.html" class="btn btn-primary">Lire l'article</a>
                        </div>
                    </article>  
                    <article class="miniCard" data-tags="Communiqué">
                        <img src="assets/img/Icon Logo Principal Noir.png" alt="">
                        <div class="InfoBlog">
                            <h3>Titre Article</h3>
                            <h4>Auteur Article</h4>
                            <a href="Articles-Blog.html" class="btn btn-primary">Lire l'article</a>
                        </div>
                    </article>  
                    <article class="miniCard" data-tags="Services, Secteurs">
                        <img src="assets/img/Icon Logo Principal Noir.png" alt="">
                        <div class="InfoBlog">
                            <h3>Titre Article</h3>
                            <h4>Auteur Article</h4>
                            <a href="Articles-Blog.html" class="btn btn-primary">Lire l'article</a>
                        </div>
                    </article>  
                    <article class="miniCard" data-tags="Blog">
                        <img src="assets/img/Icon Logo Principal Noir.png" alt="">
                        <div class="InfoBlog">
                            <h3>Titre Article</h3>
                            <h4>Auteur Article</h4>
                            <a href="Articles-Blog.html" class="btn btn-primary">Lire l'article</a>
                        </div>
                    </article>  
                    <article class="miniCard" data-tags="Services">
                        <img src="assets/img/Icon Logo Principal Noir.png" alt="">
                        <div class="InfoBlog">
                            <h3>Titre Article</h3>
                            <h4>Auteur Article</h4>
                            <a href="Articles-Blog.html" class="btn btn-primary">Lire l'article</a>
                        </div>
                    </article>  
                    <article class="miniCard" data-tags="Secteur-Unite, Secteurs">
                        <img src="assets/img/Icon Logo Principal Noir.png" alt="">
                        <div class="InfoBlog">
                            <h3>Titre Article</h3>
                            <h4>Auteur Article</h4>
                            <a href="Articles-Blog.html" class="btn btn-primary">Lire l'article</a>
                        </div>
                    </article>  
                    <article class="miniCard" data-tags="Services, Service-Unite">
                        <img src="assets/img/Icon Logo Principal Noir.png" alt="">
                        <div class="InfoBlog">
                            <h3>Titre Article</h3>
                            <h4>Auteur Article</h4>
                            <a href="Articles-Blog.html" class="btn btn-primary">Lire l'article</a>
                        </div>
                    </article>  
                    <article class="miniCard" data-tags="Secteur-Unite">
                        <img src="assets/img/Icon Logo Principal Noir.png" alt="">
                        <div class="InfoBlog">
                            <h3>Titre Article</h3>
                            <h4>Auteur Article</h4>
                            <a href="Articles-Blog.html" class="btn btn-primary">Lire l'article</a>
                        </div>
                    </article>  
                    <article class="miniCard" data-tags="Secteurs">
                        <img src="assets/img/Icon Logo Principal Noir.png" alt="">
                        <div class="InfoBlog">
                            <h3>Titre Article</h3>
                            <h4>Auteur Article</h4>
                            <a href="Articles-Blog.html" class="btn btn-primary">Lire l'article</a>
                        </div>
                    </article>  
                    <article class="miniCard" data-tags="Services">
                        <img src="assets/img/Icon Logo Principal Noir.png" alt="">
                        <div class="InfoBlog">
                            <h3>Titre Article</h3>
                            <h4>Auteur Article</h4>
                            <a href="Articles-Blog.html" class="btn btn-primary">Lire l'article</a>
                        </div>
                    </article>  
                </section>
            </section>
        </section>
    </main>

<?php get_footer(); ?>
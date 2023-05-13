<?php
require './includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor">
  <h1>Nuestro blog</h1>

  <article class="entrada-blog">
    <div class="imagen">
      <picture>
        <source srcset="build/img/blog1.avif" type="image/avif" />
        <source srcset="build/img/blog1.webp" type="image/webp" />
        <img loading="lazy" width="200" height="300" src="build/img/blog1.jpg" alt="Texto entrada blog" />
      </picture>
    </div>

    <div class="texto-entrada">
      <a href="entrada.html">
        <h4>Terraza en el techo de tu casa</h4>
        <p>En el <span>20/10/2023</span> por: <span>Admin</span></p>
        <p>
          Consejos para contruir una terraza en el techo de tu casa con
          los mejores materiales y ahorrando dinero
        </p>
      </a>
    </div>
  </article>
  <article class="entrada-blog">
    <div class="imagen">
      <picture>
        <source srcset="build/img/blog1.avif" type="image/avif" />
        <source srcset="build/img/blog1.webp" type="image/webp" />
        <img loading="lazy" width="200" height="300" src="build/img/blog1.jpg" alt="Texto entrada blog" />
      </picture>
    </div>

    <div class="texto-entrada">
      <a href="entrada.html">
        <h4>Terraza en el techo de tu casa</h4>
        <p>En el <span>20/10/2023</span> por: <span>Admin</span></p>
        <p>
          Consejos para contruir una terraza en el techo de tu casa con
          los mejores materiales y ahorrando dinero
        </p>
      </a>
    </div>
  </article>
  <article class="entrada-blog">
    <div class="imagen">
      <picture>
        <source srcset="build/img/blog1.avif" type="image/avif" />
        <source srcset="build/img/blog1.webp" type="image/webp" />
        <img loading="lazy" width="200" height="300" src="build/img/blog1.jpg" alt="Texto entrada blog" />
      </picture>
    </div>

    <div class="texto-entrada">
      <a href="entrada.html">
        <h4>Terraza en el techo de tu casa</h4>
        <p>En el <span>20/10/2023</span> por: <span>Admin</span></p>
        <p>
          Consejos para contruir una terraza en el techo de tu casa con
          los mejores materiales y ahorrando dinero
        </p>
      </a>
    </div>
  </article>
</main>

<?php
incluirTemplate('footer');
?>
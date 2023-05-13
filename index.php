<?php
require './includes/funciones.php';
incluirTemplate('header', $inicio = true);
?>

<main class="contenedor">
  <h1>Más sobre nosotros</h1>

  <div class="iconos-nosotros">
    <div class="icono">
      <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy" />
      <h3>Seguridad</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas
        doloremque tempora voluptates adipisci, alias, animi dolores
        officiis quae neque reiciendis aliquid asperiores perferendis dolore
        pariatur. Aperiam commodi magnam quisquam ex!
      </p>
    </div>
    <div class="icono">
      <img src="build/img/icono2.svg" alt="Icono seguridad" loading="lazy" />
      <h3>Seguridad</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas
        doloremque tempora voluptates adipisci, alias, animi dolores
        officiis quae neque reiciendis aliquid asperiores perferendis dolore
        pariatur. Aperiam commodi magnam quisquam ex!
      </p>
    </div>
    <div class="icono">
      <img src="build/img/icono3.svg" alt="Icono seguridad" loading="lazy" />
      <h3>Seguridad</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas
        doloremque tempora voluptates adipisci, alias, animi dolores
        officiis quae neque reiciendis aliquid asperiores perferendis dolore
        pariatur. Aperiam commodi magnam quisquam ex!
      </p>
    </div>
  </div>
</main>

<section class="seccion contenedor">
  <h2>Casas y Departamentos en Venta</h2>

  <div class="contenedor-anuncios">
    <div class="anuncio">
      <picture>
        <source srcset="build/img/anuncio1.avif" type="image/avif" />
        <source srcset="build/img/anuncio1.webp" type="image/webp" />
        <img loading="lazy" width="200" height="300" src="build/img/anuncio1.jpg" alt="Anuncio" />
      </picture>
      <div class="contenido-anuncio">
        <h3>Casa de lujo en el lago</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ad
          ipsum atque ipsa? Eaque
        </p>
        <p class="precio">$3,000,000</p>

        <ul class="iconos-caracteristicas">
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc" />
            <p>3</p>
          </li>
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" />
            <p>3</p>
          </li>
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" />
            <p>4</p>
          </li>
        </ul>

        <a href="anuncio.html" class="boton-amarillo"> Ver propiedad </a>
      </div>
    </div>
    <div class="anuncio">
      <picture>
        <source srcset="build/img/anuncio2.avif" type="image/avif" />
        <source srcset="build/img/anuncio2.webp" type="image/webp" />
        <img loading="lazy" width="200" height="300" src="build/img/anuncio2.jpg" alt="Anuncio" />
      </picture>
      <div class="contenido-anuncio">
        <h3>Casa terminados de lujo</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ad
          ipsum atque ipsa? Eaque
        </p>
        <p class="precio">$3,000,000</p>

        <ul class="iconos-caracteristicas">
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc" />
            <p>3</p>
          </li>
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" />
            <p>3</p>
          </li>
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" />
            <p>4</p>
          </li>
        </ul>

        <a href="anuncio.html" class="boton-amarillo"> Ver propiedad </a>
      </div>
    </div>
    <div class="anuncio">
      <picture>
        <source srcset="build/img/anuncio3.avif" type="image/avif" />
        <source srcset="build/img/anuncio3.webp" type="image/webp" />
        <img loading="lazy" width="200" height="300" src="build/img/anuncio3.jpg" alt="Anuncio" />
      </picture>
      <div class="contenido-anuncio">
        <h3>Casa con alberca</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ad
          ipsum atque ipsa? Eaque
        </p>
        <p class="precio">$3,000,000</p>

        <ul class="iconos-caracteristicas">
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc" />
            <p>3</p>
          </li>
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" />
            <p>3</p>
          </li>
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" />
            <p>4</p>
          </li>
        </ul>

        <a href="anuncio.html" class="boton-amarillo"> Ver propiedad </a>
      </div>
    </div>
  </div>

  <div class="alinear-derecha">
    <a href="anuncios.html" class="boton-verde"> Ver todas </a>
  </div>
</section>

<section class="imagen-contacto">
  <h2>Encuentra la casa de tus sueños</h2>
  <p>
    Llena el formulario de contacto y un asesor se pondrá en contacto
    contigo en la brevedad
  </p>
  <a href="contacto.html" class="boton-amarillo">Contactanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
  <section class="blog">
    <h3>Nuestro blog</h3>

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
          <p class="informacion-meta">
            En el <span>20/10/2023</span> por: <span>Admin</span>
          </p>
          <p>
            Consejos para contruir una terraza en el techo de tu casa con
            los mejores materiales y ahorrando dinero
          </p>
        </a>
      </div>
    </article>
  </section>

  <section class="testimoniales">
    <h3>Testimoniales</h3>
    <div class="testimonial">
      <blockquote>
        El personal se comporto de una exelente forma, muy buena atención y
        la casa que me ofrecieron cumple con todas mis espectativas
        <p>- Juan De la torre</p>
      </blockquote>
    </div>
  </section>
</div>

<?php
incluirTemplate('footer');
?>

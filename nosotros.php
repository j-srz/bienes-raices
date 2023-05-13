<?php
require './includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
  <h1>Conoce sobre nosotros</h1>

  <div class="contenido-nosotros">
    <div class="imagen">
      <picture>
        <source srcset="build/img/nosotros.avif" type="image/avif" />
        <source srcset="build/img/nosotros.webp" type="image/webp" />
        <img loading="lazy" width="200" height="300" src="build/img/nosotros.jpg" alt="Sobre nostros" />
      </picture>
    </div>

    <div class="texto-nosotros">
      <blockquote>25 años de experiencia</blockquote>

      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt
        ducimus voluptatem quaerat minima blanditiis, perspiciatis
        accusantium sit porrouae eius at, asperiores debitis officia tenetur
        harum atque, necessitatibus esse! Quis nisi totam commodi sit
        voluptatem at possiias nisi hic cum dicta, exercitationem adipisci
        perspiciatis aperiam. Eos quod, repellat totam at quo qui cum
        tempore quasi error voluptas temporibus laborum molestiae sequi est
        repreheinctio quos illum magni.<br />
        tenetur totam consequuntur, corporis, voluptatibus dolores amet non
        quasi esse ea! Quae maxime odio officiis sequi reprehenderit sunt
        voluptas nobis ipsum, nihil unde, molestiae labore. Adipisci nemo
        officia eveniet con nulla esse ab ratione, fugiat dolor earum odio,
        suscipit facere nam, sint vel corrupti modi atque. Magni!
      </p>
    </div>
  </div>
</main>

<div class="contenedor">
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
</div>

<?php
incluirTemplate('footer');
?>
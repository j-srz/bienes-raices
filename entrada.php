<?php
require './includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor contenido-centrado">
  <h1>Guía de decoración tu hogar</h1>

  <picture>
    <source srcset="build/img/destacada2.avif" type="image/avif">
    <source srcset="build/img/destacada2.webp" type="image/webp">
    <img loading="lazy" width="200" height="300" src="build/img/destacada2.jpg" alt="Imagen de la propiedad">
  </picture>

  <p class="informacion-meta">Escrito por: <span>Admin</span> el <span>20/10/2023</span></p>

  <div class="resumen-propiedad">

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
</main>

<?php
incluirTemplate('footer');
?>
<?php
   get_header();
   ?>
<!--<div id="carouselExampleSlidesOnly" class="carousel slide container" data-ride="carousel">
   <div class="carousel-inner">
      <?php
         $args = array(
             'post_type'      => 'carrousel',
             'orderby'        => 'date',
             'order'          => 'asc',
             'posts_per_page' => -1,
         );
         $servicio = new WP_query($args);
         $i        = 0;
         if ($servicio->have_posts()): while ($servicio->have_posts()): $servicio->the_post();
                 $title        = get_the_title($post->ID);
                 $contenido    = get_the_content($post->ID);
                 $link         = get_post_meta($post->ID, 'link', true);
                 $thumbID      = get_post_thumbnail_id($post->ID);
                 $imgDestacada = wp_get_attachment_url($thumbID);
                 ?>
      <div class="carousel-item  <?php
         if ($i == 0) {
             echo "active";
         }
         ?>">
         <a href="<?=$link;?>"><img src="<?php echo $imgDestacada; ?>" /></a>
         <div class="text">
            <h3><?=$contenido;?></h3>
         </div>
      </div>
      <?php
         $i++;
         endwhile;
         endif;
         ?>
   </div>
</div>-->
<!-- Abajo -->
<div id="abajo" style="align-content: center;  text-align: center;color:red;">  <a href="#contacto" style="color:#FF5562;"><i class="fa fa-chevron-down  fa-5x" aria-hidden="true"></i></a></div>
<section class="container-fluid">
   <div class="row">
      <div class="col-md-12 text-center">
         <h1><b><span style="color:#000000;">Servicios</span></b></h1>
      </div>
      <?php
         $args = array(
             'post_type'      => 'servicios',
             'orderby'        => 'date',
             'order'          => 'asc',
             'posts_per_page' => 3,
         );
         $servicio = new WP_query($args);
         $i        = 0;
         if ($servicio->have_posts()): while ($servicio->have_posts()): $servicio->the_post();
                 $title        = get_the_title($post->ID);
                 $contenido    = get_the_content($post->ID);
                 $link         = get_post_meta($post->ID, 'url_de_servicio', true);
                 $thumbID      = get_post_thumbnail_id($post->ID);
                 $imgDestacada = wp_get_attachment_url($thumbID);
                 ?>
      <div class="col-md-4 animated zoomIn">
         <div class="wrapper">
            <div class="product">
               <div class="demo-card-image mdl-card mdl-shadow--2dp center-block" style=" background: url('<?php echo $imgDestacada; ?>'); background-position: center center; background-size:cover;background-color:#D0D0D0; width:99%; height:300px;">
                  <div class="mdl-card__title mdl-card--expand"></div>
                  <h3><?php the_title()?></h3>
               </div>
               <a href="<?php echo $link; ?>">
                  <p><b>Leer Mas</b></p>
               </a>
            </div>
         </div>
      </div>
      <?php
         endwhile;
         endif;
         ?>
   </div>
</section>
<section class="" style="background: url('<?php echo get_stylesheet_directory_uri() ?>/img/trabajos.jpg') no-repeat center center fixed;-webkit-background-size: cover; background-size: cover;">
   <div class="col-md-12 text-center" style="background-color: rgba(223, 223, 223,0.2);color:#fff;">
      <h1><b><i class="fa fa-bookmark" aria-hidden="true"></i>
         Nuestros Trabajos</b>
      </h1>
      <?php echo do_shortcode('[logo-slider]'); ?>
   </div>
</section>
<section class="container-fluid row">
   <div class="col-md-12">
      <h3><i class="fa fa-newspaper-o" aria-hidden="true"></i>
         Noticias y blog
      </h3>
   </div>
   <?php
      $args = array(
          'post_type'      => 'noticias',
          'orderby'        => 'date',
          'order'          => 'dasc',
          'posts_per_page' => 4,
      );
      $servicio = new WP_query($args);
      $i        = 0;
      if ($servicio->have_posts()): while ($servicio->have_posts()): $servicio->the_post();
              $title     = get_the_title($post->ID);
              $contenido = get_the_content($post->ID);
      
              $thumbID      = get_post_thumbnail_id($post->ID);
              $imgDestacada = wp_get_attachment_url($thumbID);
              ?>
   <div class="col-md-3" style="margin-top:2%;">
      <div class="demo-card-square mdl-card mdl-shadow--2dp" style=" width: 100%;
         height: 320px;">
         <div class="mdl-card__title mdl-card--expand" style="background:
            url('<?php echo $imgDestacada; ?>') center/cover;  height: 200px;">
         </div>
         <div class="mdl-card__supporting-text" style="text-align:center">
            <div style="height:100px;">
               <b><?php the_title()?></b>
            </div>
         </div>
         <div class="mdl-card__actions mdl-card--border">
            <a href="<?php the_permalink();?>;" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
            Leer mas
            </a>
         </div>
      </div>
   </div>
   <?php
      endwhile;
      endif;
      ?>
</section>
<section  class="modal-footer" style="margin-top:3%">
   <a href="/category/blog/"> <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
   <i class="material-icons">add</i>
   </button></a>
</section>
<section class="container-fluid" id="contacto">
   <div class="center-block" style="width:90%">
      <div class="row">
         <div class="col-sm-7" style="color:#000000; text-align: center;">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/img/logo.png" class="center-block" width="140" height="140"  alt=" logo"="">
            <h1>CONTACTO <i class="fab fa-telegram" aria-hidden="true"></i></h1>
            <?php if (!dynamic_sidebar('contacto')) {
               }
               ?>
            <img src="<?php echo get_stylesheet_directory_uri() ?>/img/DISTRIBUIDOR-AUTORIZADO.jpg" class="img-responsive center-block" width="400"   alt="logo" style="margin-top:10%;"/>
         </div>
         <div class="col-sm-5 text-center" style="margin-top:3%;margin-bottom:3%;">
            <?php echo do_shortcode("[si-contact-form form='1']"); ?>
         </div>
      </div>
   </div>
</section>
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15714.05852342304!2d-69.3899274!3d10.0568513!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd69b01dd63beca20!2sCoNetSys!5e0!3m2!1ses!2sve!4v1509501399038" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen=""></iframe>
<?php
   get_footer(); // llama footer.php   ?>


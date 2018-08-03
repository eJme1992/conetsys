<?php ?>
<!DOCTYPE html>
<html>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
   <?php wp_head(); //llama los css ?>
   <style>
      #cabeza {border-bottom: 1px solid #32373C; background-color:#000000; color:#ffffff; height:45px;text-align: right; border-bottom-style: dashed; border-bottom-color: #16355C;}
      #cabeza ul li a{color:#ffffff;}
      nav.navega {background-color: #ffffff;}
      nav.navega ul li {margin-right:30px;}
      nav.navega ul li a{color:#000000;}
      nav.navega ul li a:hover{color:#F6851F;}
      section {margin-top:3%;}
      @media screen and (max-width: 600px) {
.hidden-phone {
display: none;
}
}
   </style>
   <body>
      <div id="cabeza" class="container-fluid" style="">
         <nav class="navbar text-right">
            <ul class="nav">
               <li class="nav-item ">
                  <a class="nav-link" href="https://www.facebook.com/CoNetSys"><i class="fab fa-2x fa-facebook-square" aria-hidden="true"></i></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="https://www.instagram.com/conetsys_ca/"><i class="fab fa-2x fa-instagram" aria-hidden="true"></i></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="https://twitter.com/CoNetSys_ca"><i class="fab fa-2x fa-twitter-square" aria-hidden="true"></i></a>
               </li>
            </ul>
            <h4>conetsys@gmail.com</h4>
         </nav>
      </div>
      <nav class="navbar navega navbar-expand-sm  sticky-top">
         <div class="container-fluid">
            <div class="row" style="width:100%;">
               <div class="col-md-2 text-center"><a class="navbar-brand" href="http://www.conetsys.com.ve/">  <img src="<?php echo get_stylesheet_directory_uri() ?>/img/logo.png" class="center-block" width="60" heihgt="60"  alt="logo"/></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fa fa-bars"></i>
                  </button>
               </div>
               <?php
                  require_once('wp-bootstrap-navwalker-master/wp-bootstrap-navwalker.php');
                  
                    wp_nav_menu( array(
                         'menu'              => 'navigation',
                         'theme_location'    => 'primary',
                         'depth'             => 2,
                         'container'         => 'div',
                         'container_class'   => 'collapse navbar-collapse col-md-8  justify-content-center',
                         'container_id'      => 'nav-content',
                         'menu_class'        => 'navbar-nav',
                         'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                         'walker'            => new WP_Bootstrap_Navwalker())
                     );
                  ?>
              
            </div>
         </div>
      </nav>
      <?php $layerSlider=get_post_meta($post->ID, 'slider', true);
if ( $layerSlider ) { ?>
<section id="slides">
  <div class="container-fluid sin-padding">
    <?php echo do_shortcode('[rev_slider alias="'.$layerSlider.'"]'); ?> 
  </div>
</section>    
<?php } ?>
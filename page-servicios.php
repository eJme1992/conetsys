<?php
    get_header();
     $args = array(
                'post_type' => 'servicios',
                'orderby' => 'date',
                'page'=>'telecomunicaciones',
                'order' => 'asc',
                'posts_per_page' => 3
            );

    $servicio = new WP_query($args);
            $i = 0;
            if ($servicio->have_posts()) : while ($servicio->have_posts()) : $servicio->the_post();
                    $title = get_the_title($post->ID);
                    $contenido = get_the_content($post->ID);
                    $link = get_post_meta($post->ID, 'url_de_servicio', true);
                    $thumbID = get_post_thumbnail_id($post->ID);
                    $imgDestacada = wp_get_attachment_url($thumbID);
                    ?>    


            <div class="col-md-4 animated zoomIn">
                <div class="wrapper">
                    <div class="product">
                        <div class="demo-card-image mdl-card mdl-shadow--2dp center-block" style=" background: url('<?php echo $imgDestacada; ?>'); background-position: center center; background-size:cover;background-color:#D0D0D0; width:99%; height:300px;">
                            <div class="mdl-card__title mdl-card--expand"></div>
                            <h3><?php the_title() ?></h3>                      
                        </div>

                        <a href="<?php echo $link; ?>"><p><b>Leer Mas</b></p></a>

                    </div>
                </div>
            </div>


               <?php
                   
                endwhile;
            endif;
            ?>

            <?php
    $page = get_page(26);
    $tittle = $page->post_title;
    $thumbID = get_post_thumbnail_id($post->ID);
    $imgDestacadas = wp_get_attachment_url($thumbID);
?>



<div id="banner_service" class="center-block text-center" style="margin:auto;background-image: url('<?php echo $imgDestacadas; ?>');" style="">
    
    <div class="pattern"></div>
    <div id="tittle">
        <h1><?= $tittle ?></h1>
    </div>
    
</div>
    
    
<section class="container">
    <div class="row">
         <?php
    query_posts('category_name=vigilancia-electronica&posts_per_page=4');
    while (have_posts()): the_post();
        $thumbID = get_post_thumbnail_id($post->ID);
        $imgDestacada = wp_get_attachment_url($thumbID);
        ?>

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="<?php echo $imgDestacada ?>" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title"><?php the_title() ?></h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="http://www.conetsys.com.ve/#contacto" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
            </div>

    <?php
    endwhile;
    wp_reset_postdata();
    ?>
        
    </div>
</section>


<?php
    get_footer(); // llama footer.php  
?>
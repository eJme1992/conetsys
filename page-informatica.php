<?php
    get_header();
    
    $page = get_page(126);
    $tittle = $page->post_title;
    $thumbID = get_post_thumbnail_id($post->ID);
    $imgDestacadas = wp_get_attachment_url($thumbID);
?>


<div id="banner_service" class="center-block text-center" style="margin:auto;background-image: url('<?php echo $imgDestacadas; ?>');" style="">
    
    <div class="pattern"></div>
    <div id="tittle">
       <h1><?= the_title(); ?></h1>
    </div>
    
</div>
    
    
<section class="container">
    <div class="row">
          <?php
    $args = array(
     'post_type' => 'detalles_de_servicio',
     'orderby' => 'date',
     'category_name' => 'tecnologia-de-informacion',
     'orderby' => 'desc'
                                        );

                                        $subpages = new WP_query($args);
                                        $i = 0;
                                        //Recorro el arreglo de premios
                                        if ($subpages->have_posts()):
                                            while ($subpages->have_posts()):
                                                $subpages->the_post();
                                                global $post;
                                                $thumbID = get_post_thumbnail_id($post->ID);
                                                $imgDestacada = wp_get_attachment_url($thumbID);
                                                ?>
        
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                          <img class="card-img-top" src="<?php echo $imgDestacada ?>" alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title"><?php the_title() ?></h5>
                             <p class="card-text"><?php the_content(); ?></p>
                    <!--<a href="http://www.conetsys.com.ve/#contacto" class="btn btn-primary">Go somewhere</a>-->
                          </div>
                        </div>
                    </div>

       <?php
                                                
                                            endwhile;
                                        else:
                                            echo 'Lo sentimos, por el momento no contamos con tours para este destino.';
                                        endif;

                                        // reset the query
                                        wp_reset_postdata();
                                        ?>
        
    </div>
</section>


<?php
    get_footer(); // llama footer.php  
?>
<?php
get_header();
$conn = conectar();
?>

<div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php $I = 0;
               
				query_posts('category_name=blog&posts_per_page=4'); while(have_posts()): the_post();
                $thumbID = get_post_thumbnail_id( $post->ID );
                $imgDestacada = wp_get_attachment_url( $thumbID );
                        
                        
                        ?>
                <li data-target="#myCarousel" data-slide-to="<? echo $I;?>" <?php if ($I == 0) echo "class='active'"; ?>></li>
    <?php $I = $I + 1;
endwhile; wp_reset_postdata(); ?>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
<?php $I = 0; 
				query_posts('category_name=blog&posts_per_page=4'); while(have_posts()): the_post();
                $thumbID = get_post_thumbnail_id( $post->ID );
                $imgDestacada = wp_get_attachment_url( $thumbID );
                        
                        
                        ?>

                <div  <?php if ($I == 0) echo "class='item active'";
    else echo "class='item'"; ?>>

        <a href="<?php the_permalink(); ?>"><img class="img-responsive center-block" 
        src="<?php echo $imgDestacada; ?>'" alt="img"></a>

        <div class="panel panel-body lol animated fadeInLeftBig">
        <b><p style="font-size:200%;font-family: 'Lobster', cursive;"><?php //echo $REGISTRO['title']; ?></p></b>
        <b><p style="font-family: 'Lobster', cursive;"><?php //echo $REGISTRO['sub_title']; ?></p></b>
       
       <!-- <a class="left " href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right " href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a> -->

       </div>

                </div>

    <?php $I = $I + 1;
endwhile; wp_reset_postdata(); ?>
        </div>

        <!-- Left and right controls -->
       
    </div>


    <div class="container-fluid">
        <!-- Abajo -->	
        <div style="align-content: center;  text-align: center;color:red;">  <a href="#contacto" style="color:#FF5562;"><i class="fa fa-chevron-down  fa-5x" aria-hidden="true"></i></a>
</div>

<div class="container-fluid" style="background-size: cover;
background-position: center;background-image: url('https://conetsys.000webhostapp.com/wp-content/uploads/2017/11/marcas.jpg');">
<div style="background-color: rgba(0, 0, 0, 0.5);">
cccc
</div>
</div>







        <h3><b><span style="color:#000000;">Nuevos Ingresos</span></b></h3>




        <?php
        $consulta = mysqli_query($conn, "SELECT
 a.id AS idPropiedad,
 a.id_publication_type AS idTipoPublicacion,
 a.title AS titulo,
 a.address AS direccion,
 a.departament AS departamento,
 a.province AS provincia,
 a.district AS distrito,
 a.area AS area,
 a.latitude AS latitud,
 a.longitude AS longitud,
 a.price AS precio,

 a.description AS descripcion,

 CONCAT(a.price, ' ', a.currency) AS precio,
 a.created AS fechaCreacion
    FROM ejmeenet_blog.wp_properties a
 INNER JOIN ejmeenet_blog.wp_destacado_property b
 ON a.id = b.id_property
 INNER JOIN ejmeenet_blog.wp_destacado c
 ON b.id_destacado = c.id ORDER BY b.id_destacado DESC limit 8");
        $i = 1;
        ?>





        <div class="row container-fluid sinpadding">

            <?php
            while ($REGISTRO = mysqli_fetch_assoc($consulta)) {
                $id = $REGISTRO['idPropiedad'];
                $consulta1 = mysqli_query($conn, "SELECT * FROM wp_property_resource WHERE id_property='$id' limit 1");
                $Datos_Tabla = mysqli_fetch_array($consulta1);
                ?>

                <div class="<?php if ($i <= 4) echo "col-md-6"; else echo "col-md-3"; ?> animated zoomIn">
                <div class="wrapper">
                <div class="product">
                    <div class="demo-card-image mdl-card mdl-shadow--2dp center-block" 
                    style=" background: url('http://www.ejme.com.ve<?php echo $Datos_Tabla['url_path']; ?>'); background-position: center center; background-size:cover;background-color:#D0D0D0; width:99%; height:<?php if ($i <= 2) echo "400px";
                else echo "250px"; ?>;">
                        <div class="mdl-card__title mdl-card--expand"></div>
                        <div class="mdl-card__actions">
                            <span class="demo-card-image__filename">
                                <a href="http://www.ejme.com.ve/trabajo/blog/propiedades?ID=<?php echo $REGISTRO['idPropiedad']; ?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="color:#ffffff">
    <?php echo $REGISTRO['titulo']; ?>
                                </a>
                            </span>

                        </div>
                    </div>

 <p>Precio:<br> $<?php  $numero=$REGISTRO['precio']; echo number_format($numero,2);?></p>

                </div>
</div>
</div>

    <?php $i = $i + 1;
} ?>


        </div>
    </div>
<!--
    <section class="container-fluid">
        <h3>Notas:</h3>

<?php
query_posts('category_name=blog&posts_per_page=4');
while (have_posts()): the_post();
    $thumbID = get_post_thumbnail_id($post->ID);
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
                    <b><?php the_title() ?></b>
</div>
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a href="<?php the_permalink(); ?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                            Leer mas
                        </a>

                    </div>

                </div>


            </div>

<?php endwhile;
wp_reset_postdata(); ?>



    </section>
    <div id="ac" class="modal-footer" style="margin-top:2%">
        <a href="http://www.ejme.com.ve/trabajo/blog/category/blog/"> <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
                <i class="material-icons">add</i> 
            </button></a>
    </div>

-->

</div>
<section id="contacto">
 <div class="container-fluid" >
     <div class="row">
          <div class="col-sm-7" style="color:#000000; text-align: center;">
                <h1>CONTACTO</h1>
                <?php if (!dynamic_sidebar('contacto')) {} ?>
          </div>
          <div class="col-sm-5" style="margin-top:3%;margin-bottom:3%;">
<form  name="myForm" onsubmit="enviar( $('#send').val(), $('#mensaje').val(), $('#nombre').val(), $('#telefono').val(), 
$('#email').val(), $('#correo').val(), );return false;">

              
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <input class="form-control" id="nombre" name="nombre" placeholder="*Nombre completo" type="text" required>
                        </div>

                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="email" name="correo" placeholder="*Email" type="email" required>
                        </div>

                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="telefono" name="telefono" placeholder="*Telefono" type="number" required>
                        </div>
                        <div class="col-sm-12 form-group">
                            <textarea class="form-control" id="mensaje" name="mensaje" placeholder="*Mensaje" rows="5"></textarea><br>
                        </div>
                       
                        <!-- -->
                         <input type="hidden" name="correo" id="correo" value="edwin.jme@gmail.com">
       
                        

                        <div class="col-sm-12 form-group">
                            <button class="btn btn-default pull-right" type="submit" id="send" name="send">Submit</button>
                        </div>
<div class="col-md-12" style="margin-top:2%;">
 <div id="resultado"></div>
</div>
                    </div>
                </form>
            </div>
<script>
function enviar( send, mensaje, nombre, telefono, email, correo) {
        var parametros = {
        "send": send,
        "mensaje": mensaje, 
        "nombre": nombre, 
        "telefono": telefono, 
        "email": email, 
        "correo": correo, 
              };
      $.ajax( {
        data: parametros, //datos que se envian a traves de ajax
        url: 'http://www.ejme.com.ve/trabajo/blog/wp-content/themes/inmobiliaria/php/enviar.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
          $( "#resultado" ).html( "<div class='alert alert-success'> <i class='fa fa-spinner fa-spin fa-1x fa-fw'></i> Procesando, espere por favor...</div>" );
        },
        success: function ( response ) { //una vez que el archivo recibe el request lo procesa y lo devuelve
          $( "#resultado" ).html( response );

        }
      } );
    }
    </script>
            
 </div>
        </div>           
</section>

<?php get_footer(); // llama footer.php  ?>

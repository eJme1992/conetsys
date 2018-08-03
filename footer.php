<?php wp_footer(); ?>
<footer  style="background: url('<?php echo get_stylesheet_directory_uri() ?>/img/fondofooter.jpg') no-repeat center top fixed;-webkit-background-size: cover; background-size: cover;">

        <div class="container-fluid col-md-12">
        <div class="row" style="margin-top:0%;margin-bottom:2%;">
           
            
            <div class="col-md-4" style="color:#ffffff; height:382px; margin-top:10px;">
                <?php if ( ! dynamic_sidebar( 'sec1' )){}?>            
            </div> 

            <div class="col-md-4" style="height:382px; margin-top:10px;">
              <div class="fb-page" data-href="https://www.facebook.com/conetsys/" data-tabs="timeline" data-width="500" data-height="380" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/conetsys/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/conetsys/">Conetsys Ca</a></blockquote></div>
              <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.11&appId=156299681591604';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
              <?php if ( ! dynamic_sidebar( 'pie2' )){}?>
            </div> 

            <div class="col-md-4" style="height:382px; margin-top:10px;">
            <a class="twitter-timeline" data-width="500" data-height="380" data-theme="light" href="https://twitter.com/CoNetSys_ca?ref_src=twsrc%5Etfw">Tweets by CoNetSys_ca</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
               <?php if ( ! dynamic_sidebar( 'pie3' )){}?>
            </div> 
       
        </div>
       </div>
      
    <div style="background-color:#000000; color:#FFFFFF;">
    <div class="text-center">
      <b>100% Talento Venezolano.</b><br>
     
   ©Copyright 2016 - 2018 By Conetsys Group. | Todos los Derechos Reservados.<br>
    <b>Web Master:</b> Ing. Hebert Pastrán.   <b>Desarrollo Web:</b> T.S.U. Edwin Mogollón. 
    </div>
    </div>
</footer>

<script>
function suscribete( send,  mail) {
        var parametros = {
        "send": send,
        "mail": mail, 
      };
      $.ajax( {
        data: parametros, //datos que se envian a traves de ajax
        url: 'http://www.ejme.com.ve/trabajo/blog/wp-content/themes/inmobiliaria/php/suscribir.php', //archivo que recibe la peticion
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
<script>    
function enviar( send,  mail, contenido, telefono, compañia , nombre, g-recaptcha-response) {
        var parametros = {
        "send": send,
        "mail": mail,
                "contenido": contenido,
        "telefono": telefono,
        "compañia": compañia,
        "nombre" :nombre,
        "g-recaptcha-response" : g-recaptcha-response
      };
      $.ajax( {
        data: parametros, //datos que se envian a traves de ajax
        url: 'http://www.ejme.com.ve/trabajo/blog/wp-content/themes/inmobiliaria/php/suscribir.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
          $( "#resultado" ).html( "<div class='alert alert-success'> <i class='fa fa-spinner fa-spin fa-1x fa-fw'></i> Procesando, espere por favor...</div>" );
        },
        success: function ( response ) { //una vez que el archivo recibe el request lo procesa y lo devuelve
          $( "#resultado" ).html( response );

        }
      } );
    }
    
    $('.carousel').carousel();
</script>

</body></html>
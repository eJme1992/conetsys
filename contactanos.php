<div class="container">
<h2 style="text-align: center;"><strong><span style="color: #ff0000;">Contactanos <i class="fa fa-paper-plane-o" aria-hidden="true"></i></span></strong></h2>



<div class="row">
<div class="col-sm-6" style="margin-top: 3%; margin-bottom: 3%;">
  <div  class="animated  slideInUp" style=" text-align: center;">
                <?php if (!dynamic_sidebar('contacto')) {} ?>
          </div>
<div class="animated slideInUp" style="text-align: center; "></div>
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
<div class="col-sm-6"><iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3900.854593008387!2d-77.03505158518665!3d-12.122099791417181!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c81887a6c5c9%3A0x9decf3b532d3602e!2sCalle+Jos%C3%A9+Galvez+285%2C+Cercado+de+Lima+15074%2C+Per%C3%BA!5e0!3m2!1ses!2sve!4v1508806246094" width="100%" height="450" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>
</div>
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
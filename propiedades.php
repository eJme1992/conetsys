<?php 
$conn = conectar();
if ( empty( $_GET[ 'ID' ] ) == FALSE ) { $id=$_GET[ 'ID' ]; } else {
echo "<script>location.href='www.ejme.com.ve/trabajo/blog'</script>";    
}
    
  $consulta = mysqli_query($conn,"SELECT * FROM wp_properties WHERE id='$id'");
  $Datos_Tabla = mysqli_fetch_array($consulta);
  $vendedor=$Datos_Tabla['id_seller'];
  $consulta1 = mysqli_query($conn,"SELECT * FROM wp_users_sellers WHERE id='$vendedor'");
  $Datos_Tabla1 = mysqli_fetch_array($consulta1);
?>






 <section  style="background-color:#EEEEEE">
 <div class="container-fluid">
      <div class="row">
     
     <div class="col-md-8" style="margin-top:3%;">
	
	
	<div id="cuerpo" class="panel panel-body" style="background-color:#FFFFFF;">
             <div id="titulo" class="panel panel-body text-center" style="background-color:#FFFFFF;text-aliner:center;">
               <h3><i class="fa fa-bullhorn" aria-hidden="true"></i> <?php echo $Datos_Tabla['title'];?></h3> 
 <img src="<?php echo $REGISTRO['url_path']; ?>" class="img-responsive center-block">
             </div>
 
        <div  id="imagen" style="background-color:#000000;">
	       <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:500px; background-color:#000000; overflow:hidden;">
     <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php $I=0; $consulta = mysqli_query($conn,"SELECT * FROM wp_property_resource Where id_property='$id'");
       while ($REGISTRO = mysqli_fetch_assoc($consulta)) { ?>
      <li data-target="#myCarousel" data-slide-to="<? echo $I;?>" <?php if ($I==0) echo "class='active'"; ?>></li>
      <?php $I=$I+1; } ?>
    </ol>
  <!-- Wrapper for slides -->
   <div class="carousel-inner">
     <?php $I=0; $consulta = mysqli_query($conn,"SELECT * FROM wp_property_resource Where id_property='$id'");
      while ($REGISTRO = mysqli_fetch_assoc($consulta)) { ?>
	  
      <div  <?php if ($I==0) echo "class='item active'"; else echo "class='item'";?> style="height:500px;">
 <img src="<?php echo $REGISTRO['url_path']; ?>" class="img-responsive center-block" style="height:500px;">

	

      

	  </div>
	  
      <?php $I=$I+1; } ?>
   </div>

  <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
     </div>
    <div id="caracteristicas" style="margin-top:2%;">
    <h4><i class="fa fa-check-square-o" aria-hidden="true"></i> Caracteristicas:</h4>
    <div class="row">

<div class="col-md-6">
<b><span>Departamento: </span></b><?php echo $Datos_Tabla['departament'];?>
<br><br>
<b><span>Provincia: </span></b><?php echo $Datos_Tabla['province'];?>
<br><br>
</div>

<div class="col-md-6">
<b><span>Distrito: </span></b><?php echo $Datos_Tabla['district'];?>
<br><br>
<b><span>Area: </span></b><?php echo $Datos_Tabla['area'];?> <b>m<sup>2</sup></b>
<br><br>
</div>

<div class="col-md-12">
<b><span>Direccion: </span></b><?php echo $Datos_Tabla['address'];?>
 
</div>

    </div>
    </div>

<?php if (($Datos_Tabla['latitude']!='') and ($Datos_Tabla['longitude']!='')) 
 if  (($Datos_Tabla['latitude']!='0') and ($Datos_Tabla['longitude']!='0')) 
{ ?>
   <div id="map" style="margin-top:2%;">
     <div id="mapid" style="height: 300px;"></div>
   </div>
<?php } ?>
	
  <div id="descripcion" class="panel panel-body" style="background-color:#FFFFFF;">

	 <h4><i class="fa fa-file-text" aria-hidden="true"></i> Descripción:</h4>
   <div style="margin:2%;">
   <p><?php echo $Datos_Tabla['description'];?></p>
   </div>
	</div>

<?php if ($Datos_Tabla['url_video']!='') { ?>
<div id="video" style="margin-top:2%;">
<iframe width="100%" height="315" src="<?php echo $Datos_Tabla['url_video']; ?>" frameborder="0" gesture="media" allowfullscreen></iframe>

</div> 
<?php } ?>
    </div>


 
	
	</div> <!-- -->
	 
        <div class="col-md-4" style="margin-top:3%;">
   
    
     
     <div id="precio" class="panel panel-body"  style="background-color:#FFFFFF;">
         <h4><i class="fa fa-money" aria-hidden="true"></i> <span style="color:red;">Precio desde:</span> <b><?php  $numero=$Datos_Tabla['price']; echo number_format($numero,2);
?>$</b></h4>
     </div>
     
   
<div id="Datos" class="panel panel-body" style="margin-top:3%; background-color:#FFFFFF;">
<h3> <i class="fa fa-id-card-o" aria-hidden="true"></i> <?php echo $Datos_Tabla1['name'];?></h3>
<b><span style="color:green;"><i class="fa fa-whatsapp fa-x2" aria-hidden="true"></i></span>
<span style="color:blue;">Telefono: </span></b><?php echo $Datos_Tabla1['phone'];?><br>
<?php if ($Datos_Tabla1['enterprice_name']!='') { ?>
<b><i class="fa fa-shopping-bag fa-x2" aria-hidden="true"></i>
<span style="color:blue;">Empresa: </span></b><?php echo $Datos_Tabla1['enterprice_name'];?>
<?php } ?>
<hr>
<form  name="myForm" onsubmit="enviar( $('#send').val(), $('#mensaje').val(), $('#nombre').val(), $('#telefono').val(), 
$('#email').val(), $('#correo').val(), );return false;">

 <div class="mdl-textfield mdl-js-textfield">
    <textarea class="mdl-textfield__input" type="text" rows= "3" id="mensaje" name="mensaje" required></textarea>
    <label class="mdl-textfield__label" for="sample5">Mensaje...</label>
  </div>


  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text"  id="nombre" name="nombre" required>
    <label class="mdl-textfield__label" for="sample4" requere>Nombre...</label>
  </div>


  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="tel" pattern="-?[0-9]*(\.[0-9]+)?" name="telefono" id="telefono" required>
    <label class="mdl-textfield__label" for="sample3">Teléfono...</label>
    <span class="mdl-textfield__error">Debe ser un numero telefonico Valido</span>
  </div>

  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="email" name="email"  id="email" required>
    <label class="mdl-textfield__label" for="sample4">Correo...</label> 
  </div>
  
  <input type="hidden" name="correo" id="correo" value="<?php echo $Datos_Tabla1['email'];?>">

 <div class="col-md-12">
<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" id="send" name="send">
 Enviar
</button>
 </div>
 <br>
  <div class="col-md-12" style="margin-top:2%;">
 <div id="resultado"></div>
</div>
</form>
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
     </div>
     </div>     
</section>
<script>
function Leaflet() {
    var map = L.map('map').setView([<?php echo $Datos_Tabla['latitude'];?>, <?php echo $Datos_Tabla['longitude'];?>], 13);

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([<?php echo $Datos_Tabla['latitude'];?>, <?php echo $Datos_Tabla['longitude'];?>]).addTo(map)
    .bindPopup('<?php echo $Datos_Tabla['address'];?>')
    .openPopup();
  }

Leaflet();
</script>



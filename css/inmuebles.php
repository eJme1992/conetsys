<?php $conn = conectar(); ?>

<section class="container-fluid" style="margin-top:12%">
    <h1 style="color:red;">Inmuebles en Venta</h1>    
    
    <div class="row">
        
        <div class="col-md-4">
           
           <div class="panel panel-default">
               <div class="panel-heading"><h4>Filtros</h4></div>
            <div class="panel-body">
                <h5>Por precio</h5>
                <h5>Por lugar</h5>
            </div>
            </div> 
            
            
        </div>
        
        <div class="col-lg-8">
            <div class=" row">
   
    <?php $I=0; $consulta = mysqli_query($conn,"SELECT SQL_CALC_FOUND_ROWS * FROM wp_properties WHERE id_publication_type='1'");

    
        $sql="SELECT FOUND_ROWS() AS `total`";
        $total = mysqli_query($conn, $sql);
        $fetchArr = $total->fetch_array(MYSQLI_ASSOC);
// print_r($fetchArr["total"]);

    while ($REGISTRO = mysqli_fetch_assoc($consulta)) { 
     
      $id=$REGISTRO['id'];
      $consulta1 = mysqli_query($conn,"SELECT * FROM wp_property_resource Where id_property='$id'");
      $Datos_Tabla = mysqli_fetch_array($consulta1);  ?>  
                
<div class="col-lg-6">    
<div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 100%; height:400px;  margin-bottom:0%; margin-top:1%;">
  <div class="mdl-card__title" style="height:200px; background: url('http://www.ejme.com.ve<?php echo $Datos_Tabla['url_path']; ?>') center/cover no-repeat;" >
      <h2 style="-webkit-text-stroke: 1px #000000;-webkit-text-fill-color:#ffffff;" class="mdl-card__title-text"><?php echo $REGISTRO['title']; ?></h2>
  </div>
  <div class="mdl-card__supporting-text" style="height:150px;">
      <div class="row">
          <div class="col-md-5">
              <b>Direccion:</b> <?php echo $REGISTRO['address']; ?>
          </div>
          <div class="col-md-7" style="text-align: right;">
              <h3>Precio:<br> <?php $numero=$REGISTRO['price']; echo number_format($numero,2);?>$</h3>
          </div>
         </div>
  </div>
  <div class="mdl-card__actions mdl-card--border" style="height:50px;">
      <a href="http://www.ejme.com.ve/trabajo/blog/propiedades?ID=<?php echo $REGISTRO['id']; ?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="color:red">
    Consultar
     </a>
  </div>
  <div class="mdl-card__menu">
    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
      <i class="material-icons">share</i>
    </button>
  </div>
</div>
</div>  
                
            
   <?php 
} ?>
            

            
        </div>
        </div>     
        
        
    </div>    
</section>
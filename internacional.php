<?php $conn = conectar(); 



          
                $condition = " departament = '' AND province = '' AND district = ''";
            

     $consulta_noticias = "SELECT  * FROM wp_properties 
     WHERE $condition";

     
     $rs_noticias = mysqli_query($conn,$consulta_noticias);
     $num_total_registros = mysqli_num_rows($rs_noticias);
     
//Limito la busqueda
$TAMANO_PAGINA = 10;

//examino la página a mostrar y el inicio del registro a mostrar
$pagina = $_GET["pagina"];
if (!$pagina) {
   $inicio = 0;
   $pagina = 1;
}
else {
   $inicio = ($pagina - 1) * $TAMANO_PAGINA;
}
//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);


$limite="LIMIT $inicio,$TAMANO_PAGINA";
$sql= "$consulta_noticias $limite";









?>

<section class="container-fluid" >
    <h1 style="color:red;">Gestión Internacional de inmuebles</h1>    
    

        
        
        <div class="col-lg-12">
            <div class=" row">
   
    <?php 

 
    $consulta = mysqli_query($conn, "$sql");
    while ($REGISTRO = mysqli_fetch_assoc($consulta)) { 
     
      $id=$REGISTRO['id'];
      $consulta1 = mysqli_query($conn,"SELECT * FROM wp_property_resource Where id_property='$id'");
      $Datos_Tabla = mysqli_fetch_array($consulta1);  ?>  

 <a href="http://www.ejme.com.ve/trabajo/blog/propiedades?ID=<?php echo $REGISTRO['id']; ?>" style="text-decoration:none;">                
<div class="col-sm-6">    
<div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 100%; height:400px;  margin-bottom:2%; margin-top:1%; background-color:#F5F5F5;">
<div class="wrapper">
<div class="product">
<div class="mdl-card__title" style="height:400px; background: url('http://www.ejme.com.ve<?php echo $Datos_Tabla['url_path']; ?>') center/cover no-repeat;" >
      <h2  class="mdl-card__title-text"><?php echo $REGISTRO['title']; ?></h2>
  </div>
                <p>Precio:<br> $<?php  $numero=$REGISTRO['price']; echo number_format($numero,2);?></p>
</div>
</div>
</div>
</div>  
</a>                
            
   <?php 
} ?>
            

            
        </div>
        </div>     
        
        
    </div>    
</section>
<div class="center-block text-center">
<ul class="pagination">
<?php 
if ($total_paginas > 1) {
   if ($pagina != 1)
      echo '<li><a href="'.$url.'?pagina='.($pagina-1).'"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a></li>';
      for ($i=1;$i<=$total_paginas;$i++) {
         if ($pagina == $i) { 
//si muestro el índice de la página actual, no coloco enlace
?>
            
               <li class="active"><a href="#"> <?php echo $pagina; ?> </a></li>
       <?php  } else
            //si el índice no corresponde con la página mostrada actualmente,
            //coloco el enlace para ir a esa página
            echo ' <li> <a href="'.$url.'?pagina='.$i.'">'.$i.'</a>  </li>';
      }
      if ($pagina != $total_paginas)
         echo '<li><a href="'.$url.'?pagina='.($pagina+1).'"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></li>';
}?>
</ul>
</div>

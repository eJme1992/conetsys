<?php 
  $conn = conectar(); 
 $condition = "(id_publication_type = '1' and departament <> '' AND province 
<> '' AND district <> '')";

if  ((!empty($_GET["ELIMINAR"])==true))
{  $_SESSION["condition"] = ""; $_SESSION["tipo"] = ""; $_SESSION["precio"] = ""; $_SESSION["zona"] = "";  $_SESSION["inmo"] = ""; }

 function condicion ($searchValue){ 
  if (!empty($searchValue) && $searchValue !== "" && $searchValue !== "c1" && $searchValue !== "c2" && $searchValue !== "c3") {  
            $condition .= "id    LIKE   '%$searchValue%' OR ";
            $condition .= "title LIKE   '%$searchValue%' OR ";
            $condition .= "price LIKE   '%$searchValue%' OR ";
            $condition .= "id_property_type LIKE   '%$searchValue%' OR ";
            $condition .= "address LIKE '%$searchValue%'";
        return $condition;
    }
    else if ($searchValue == "c1") {
      return  "price < 5000   ";
    }
    else if ($searchValue == "c2") {
      return  "price BETWEEN 5000 AND 10000   ";
    }
    else if ($searchValue == "c3") {
      return  "price > 10000   ";
    }
    else if ($searchValue === "") {
      return  "";
    }
     
  }

  function validar (&$condition,$var){
  if ($var!== "") {
  $condition .= "AND (".$var.")";
  }
}


  if  ($_POST["tipo"]!="") {
     	$tipo = $_POST["tipo"];
        $_SESSION["tipo"]= $tipo;
   	 } else {
    	 if  ($_SESSION["tipo"] == "") {
     		$tipo= "";
    	    $_SESSION["tipo"] = "";
     	} else { 
			 $tipo= $_SESSION["tipo"];
		}
    }

if  ($_POST["zona"]!="") {
     $zona = $_POST["zona"];
     $_SESSION["zona"] = $_POST["zona"];
  } else {
    	 if  ($_SESSION["zona"] == "") {
     		$zona= "";
    	    $_SESSION["zona"] = "";
     	} else { 
			 $zona= $_SESSION["zona"];
		}
    }


if  ($_POST["precio"]!="") {
     $precio = $_POST["precio"];
     $_SESSION["precio"] =  $_POST["precio"];
   } else {
    	 if  ($_SESSION["precio"] == "") {
     		$precio= "";
    	    $_SESSION["precio"] = "";
     	} else { 
			 $precio= $_SESSION["precio"];
		}
    }

if  ($_POST["inmo"]!="") {
     $inmo = $_POST["inmo"];
     $_SESSION["inmo"] =  $_POST["inmo"];
   } else {
    	 if  ($_SESSION["inmo"] == "") {
     		$inmo= "";
    	    $_SESSION["inmo"] = "";
     	} else { 
			 $inmo= $_SESSION["inmo"];
		}
    }

echo "<br>";
echo "PRECIO "; echo $precio;echo "<br>";
echo "ZONA "; echo $zona;echo "<br>";
echo "TIPO "; echo $tipo;echo "<br>";
$tipo = condicion($tipo);
validar($condition,$tipo);

$zona = condicion($zona);
validar($condition,$zona);

$inmo = condicion($inmo);
validar($condition,$inmo);

$precio = condicion($precio);
validar($condition,$precio); 
echo "<br>";
echo "PRECIO "; echo $precio;echo "<br>";
echo "ZONA "; echo $zona;echo "<br>";
echo "TIPO "; echo $tipo;echo "<br>";
echo "condicion "; echo $condition;

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
    <h1 style="color:red;">Inmuebles en Venta</h1>    
    
    <div class="row">
        
              <div class="col-lg-4">
           
       <div class="panel panel-default">
                <div class="panel-heading"><h4>Filtros</h4></div>
                <div class="panel-body">
                    
<?php if  (($_SESSION["tipo"]!=="") or  ($_SESSION["zona"]!=="") or ($_SESSION["precio"]!=="")){ 

echo '<div class="alert alert-warning">
  <strong>Se han aplicado filtros </strong>  ';
echo '<a href="http://www.ejme.com.ve/trabajo/blog/inmuebles?ELIMINAR=1"><button type="button" class="btn btn-danger">Eliminar</button>
</a></div>';
} ?>




               <h5>Por precio</h5>
               <?php if ($_SESSION["precio"]===""){ ?>
               <form action="http://www.ejme.com.ve/trabajo/blog/inmuebles" method="post">
               <select class="form-control" id="precio" name="precio">
               <option value="">seleccionar</option>   
               <option value="c1">Menor a 5000</option>
               <option value="c2">5000 a 10000</option>
               <option value="c3">Mas de 10000</option>
               </select>  
               <?php }else { echo "<h4> Filtro aplicado:</h4>"; } ?> 
                
                 <h5>Por tipo de inmueble </h5>
<?php if ($_SESSION["precio"]===""){ ?>
<select  class="form-control" id="inmo" name="inmo" required> 
<option value="">seleccionar</option>                          
<?php
 $consulta = mysqli_query($conn, "SELECT * FROM `wp_property_types` ORDER BY `wp_property_types`.`name` ASC ");
 while ($REGISTRO = mysqli_fetch_assoc($consulta)) {
 ?>
<option value="<?php echo $REGISTRO["id"];?>"> <?php echo $REGISTRO["name"]; ?> </option>
<?php } ?>
</select>
 <?php }else { echo "<h4> Filtro aplicado:</h4>"; } ?> 

<h5>Por tipo publicación</h5>
<?php if ($_SESSION["tipo"]===""){ ?>
        <select class="form-control" id="tipo" name="tipo" >
        <option value="">seleccionar</option>
        <option>Venta</option>
        <option>Alquiler</option>
        </select>
<?php }else { echo "<h4> Filtro aplicado:".$_SESSION["tipo"]."</h4>"; } ?>

        
       
        <h5>Por lugar</h5>
        <?php if ($_SESSION["zona"]===""){ ?>
        <select class="form-control" id="zona" name="zona" >
				<option value="">seleccionar</option>
        <option>Amazonas</option>
				<option>Ancash</option>
				<option>Apurimac</option>
				<option>Arequipa</option>
				<option>Ayacucho</option>
				<option>Cajamarca</option>
				<option>Callao</option>
				<option>Cusco</option>
				<option>Huancavelica</option>
				<option>Huanuco</option>
				<option>Ica</option>
				<option>Junin</option>
				<option>La Libertad</option>
				<option>Lambayeque</option>
				<option>Lima</option>
				<option>Loreto</option>
				<option>Madre De Dios</option>
				<option>Moquegua</option>
				<option>Pasco</option>
				<option>Piura</option>
				<option>Puno</option>
				<option>San Martin</option>
				<option>Tacna</option>
				<option>Tumbes</option>
				<option>Ucayali</option>
				</select>
        <?php }else { echo "<h4> Filtro aplicado:".$_SESSION["zona"]."</h4>"; } ?>
        <div style="margin-top:2%;">
<button type="submit" class="btn btn-primary">Aplicar</button>
</div>
</form>
            </div>
            </div> 
            


        </div>
        
        <div class="col-lg-8">
        <div class=" row">
   
    <?php 

 
    $consulta = mysqli_query($conn, "$sql");
    while ($REGISTRO = mysqli_fetch_assoc($consulta)) { 
     
      $id=$REGISTRO['id'];
      $consulta1 = mysqli_query($conn,"SELECT * FROM wp_property_resource Where id_property='$id'");
      $Datos_Tabla = mysqli_fetch_array($consulta1);  ?>  

 <a href="http://www.ejme.com.ve/trabajo/blog/propiedades?ID=<?php echo $REGISTRO['id']; ?>" style="text-decoration:none;">                
<div class="col-sm-6">    
<div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 100%; height:290px;  margin-bottom:2%; margin-top:1%; background-color:#F5F5F5;">
<div class="wrapper">
<div class="product">
<div class="mdl-card__title" style="height:290px; background: url('http://www.ejme.com.ve<?php echo $Datos_Tabla['url_path']; ?>') center/cover no-repeat;" >
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

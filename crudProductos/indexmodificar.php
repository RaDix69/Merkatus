<?php 


$consulta= consultarPersona($_GET['id']);

function consultarPersona($id){
    include 'conexion/conexion.php';
    $sentencia="SELECT * FROM productos WHERE id_producto='".$id."'";
    $resultado=$conexion->query($sentencia) or die ("Error de conexion".mysqli_error($conexion));
    $fila=$resultado->fetch_assoc();
return[
    $fila['id_producto'],
    $fila['proveedor'],
    $fila['nombrep'],
    $fila['id_categoria'],
    $fila['descripcion'],
    $fila['precio'],
];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mvc.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;1,600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Actualizar Datos Productos</title>
    <link rel="stylesheet" href="./estilos/estiloActualizar.css">
</head>
<body>
    <form action="controlador/controlmodificar.php" method="post" class="formulario">
    <div class="linea">
    <h1>Actualizar datos del Producto</h1>
    <label for="">Id_producto: </label>    
    <input required="" class="entrada" type="text" name="id_producto" id="id_producto" class="form-control" value="<?php echo $consulta[0]?>" style="display:none;">
    <input required="" class="entrada" type="text" name="id_producto2" id="id_producto2" class="form-control" value="<?php echo $consulta[0]?>" disabled>
    <br><br>
    <label for="">Proveedor: </label>    
    <input required="" class="entrada" type="text" name="proveedor" id="proveedor" class="form-control" pattern="[A-Za-z ]{1,100}" value="<?php echo $consulta[1]?>">
    <br><br>
    <label for="">Nombre producto: </label>    
    <input required="" class="entrada" type="text" name="nombrep" id="nombrep" class="form-control" pattern="[A-Za-z ]{1,100}" value="<?php echo $consulta[2]?>">
    <br><br>
    <label for="">Id_categoria: </label>    
    <input required="" class="entrada" type="number" name="id_categoria" id="id_categoria" class="form-control" value="<?php echo $consulta[3]?>" style="display:none;">
    <input required="" class="entrada" type="number" name="id_categoria2" id="id_categoria2" class="form-control" value="<?php echo $consulta[3]?>" disabled >
    <br><br>
    <label for="">Descripcion: </label>    
    <textarea required="" class="entrada" name="descripcion" id="descripcion" class="form-control" value=""><?php echo $consulta[4]?></textarea>   
    <br><br>
    <label for="">Precio: </label>    
    <input required="" class="entrada" type="number" name="precio" id="precio" class="form-control" value="<?php echo $consulta[5]?>">
    <br><br>

    <input type="submit" name="boton" value="Actualizar Producto" class="btn btn-primary" >
    <input type="submit" name="boton" value="Regresar" class="btn btn-primary" >

    </form>
    
    </div> 
</div>    
</body>
<?php 
?>
</html>
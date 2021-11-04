<?php    
include "conexion/conexion.php";

if(empty($_POST['producto']) || empty($_POST['descripcion']) || empty($_POST['precio'])){

    // echo "Digite todos los campos";
}else{
    $producto =$_POST['producto'];
    $proveedor =$_POST['proveedor'];
    $categoria =$_POST['categoria'];
    $descripcion =$_POST['descripcion'];
    $precio =$_POST['precio'];
    $imagena = $_FILES['imagen']['tmp_name'];
    $imagen = addslashes(file_get_contents($imagena));
    $query = "INSERT INTO productos (nombrep,proveedor,id_categoria,Descripcion,Precio,imagen) VALUES ('$producto','$proveedor','$categoria','$descripcion','$precio','$imagen')";
    $resultado = $conexion->query($query);

    if($resultado){
        echo "Se han registrado los datos";
        header('location: ../crudProductos/consulta.php');
    }else{
        echo "Datos no guardados";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estiloIngresar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika+Negative:wght@300&display=swap" rel="stylesheet">
    <title>Ingresar productos</title>
</head>
<body>
    <!-- <center> -->
        <div class="contenedor">
        <section>

        <div class="formulario">
        <h1 class="titulo"> Datos Producto </h1>

        <form action="" method="POST" enctype="multipart/form-data" class="formulario">
        <h2>Ingrese los datos del producto</h2>
        <label for="" class="campos">Nombre del producto: </label>
        <div class="tooltip">
            <input class="entrada" type="text" name="producto" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$+0-9" title="Coloca solo letras, la primera en mayúscula" required="">
             <br><br><span class="tooltiptext">Coloca solo letras, nada de números o caracteres especiales</span>
        </div>
        <label for="" class="campos">Nombre del proveedor: </label>
        <div class="tooltip">
            <input class="entrada" type="text" name="proveedor" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$+0-9" title="Coloca solo letras, la primera en mayúscula" required="">
            <span class="tooltiptext">Coloca el nombre del proveedor</span> <br><br>
        </div>
        <label for="" class="campos">Categoria: </label>
        <select class="entrada" name="categoria" required="">
                  <option value="value1" selected disabled>......</option>
                  <option value="1200">Lacteos</option>
                  <option value="1201">Carnicos</option>
                                    </select><br> <br>
        <label for="" class="campos">Descripción: </label>
        <div class="tooltip">
            <textarea class="entrada" type="text" name="descripcion" pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$+0-9" required="" minlength="10" maxlength="200"></textarea><br><br>
            <span class="tooltiptext">Pon una breve descripción menor a 200 caracteres</span>
        </div>
        <label for="" class="campos">Precio: </label>
        <div class="tooltip">
            <input  class="entrada" type="number" name="precio" required=""><br><br>
            <span class="tooltiptext">Coloca el precio del producto</span>
        </div>
        <label for="" class="campos">Imágen: </label>
        <div class="tooltip">
            <input class="entrada" type="file" name="imagen" required=""><br><br>
            <span class="tooltiptext">Sube la imágen del producto acá</span>
        </div>
        <center>
        <input class="boton" type="submit" name="guardar" value="Guardar">
        <br>
        <br>
        <button class="con"><a href="../crudProductos/consulta.php">Consultar Productos</a></button>
        </center>
        </form>
        </div>
        </div>
    </section>

    <!-- </center> -->
</body>
</html>

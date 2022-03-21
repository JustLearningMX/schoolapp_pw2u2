<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Se importa Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--Se importan estilos-->
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/tablaUsuarios.css">
    <link rel="stylesheet" href="../css/footer.css">

    <!-- <base href="/PW2_U2/"> -->
    <base href="https://safe-stream-39211.herokuapp.com/">
</head>

<body >
    <?php
        include '../php/header.php';
    ?>
    
    <main class="mainSection">
        <!-- <form id="tableContainer" > -->
        <p class="tituloForm">Tabla de Usuarios</p>    
        <section class="table-responsive" style="padding: 0 55px;">                    
            <table class="table table-striped tablaInfoBd">   <!-- class="tablaInfoBd" -->
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col"> Nombre</th>
                    <th scope="col">Tipo</th>
                </tr>
            </table>
        </section>
        <!-- </form> -->
    </main>  
  <?php
      include '../php/footer.php';
  ?>
    <!-- Agregamos scripts para funciones de JS para menú desplegables, carrusel, etc. -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
<?php
    //Enviamos variables    
    $local = false; //Modo Local
    $getUsers = true; //Obtiene todos los usuarios
    $login = false; //Bandera para indicar que se NO va a loguear
    $consulta = "SELECT * FROM";
    $getCalificaciones = false;
    include './obtenerDatosBD.php';
?>
</html>
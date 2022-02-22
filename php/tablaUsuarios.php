<!DOCTYPE html>
<html lang="es">
<head>
    <!--Se importan estilos-->
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/tablaUsuarios.css">
    <link rel="stylesheet" href="../css/footer.css">

    <base href="/PW2_U2/">
    <!-- <base href="https://morning-dawn-52068.herokuapp.com/"> -->
</head>

<body >
    <?php
        include '../php/header.php';
    ?>
    
    <main>
        <form id="tableContainer" >
            <p class="tituloForm">Tabla de Usuarios</p>            
            <table class="tablaInfoBd">                
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                </tr>
            </table>
        </form>
    </main>  
  <?php
      include '../php/footer.php';
  ?>
</body>
<?php
    //Enviamos variables    
    $local = true; //Modo Local
    $getUsers = true; //Obtiene todos los usuarios
    $login = false; //Bandera para indicar que se NO va a loguear
    $consulta = "SELECT * FROM";
    include './obtenerDatosBD.php';
?>
</html>
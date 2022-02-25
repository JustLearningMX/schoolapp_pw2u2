<!DOCTYPE html>
<html lang="es">
<head>
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
        //Guardamos las variables de los parámetros
        $optMenu = $_GET['opcion'];
        $typeOptMenu = $optMenu === 'Estudiante' ? 'E' : 'P';
        if ($typeOptMenu !== $_SESSION['userType'] ) { //Si no es la opción de Estudiante/Profesor en la sesión
            $optMenu = $_SESSION['userType'] === 'E' ? 'Estudiante' : 'Profesor';
            echo "<script type='text/javascript'>";
            echo "window.location.href='./php/consultar.php?opcion=$optMenu'"; // Relocaliza hacia el login
            echo "</script>";
        }
    ?>
    
    <main>
        <form id="tableContainer" >
            <p class="tituloForm">Consultas del <?php echo $optMenu ?></p>            
            <table class="tablaInfoBd">
                <tr>
                    <th>Matricula</th>
                    <?php 
                        if ($_GET['opcion'] !== 'Profesor') {
                    ?>
                        <th>Profesor</th>
                    <?php 
                        }
                    ?>
                    <th>Programación</th>
                    <th>Matemáticas</th>
                    <th>Algoritmos</th>
                    <th>Lógica</th>
                    <th>SO</th>
                    <th>BD</th>
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
    $local = false; //Modo Local
    $getUsers = false; //
    $getCalificaciones = true; //
    $login = false; //Bandera para indicar que se NO va a loguear
    $consulta = "SELECT * FROM";
    $optMenu;
    include './obtenerDatosBD.php';
?>
</html>
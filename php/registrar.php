<?php 
    if (session_id() == '') {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Se importa Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Se importan estilos-->
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/formulario.css">
    <link rel="stylesheet" href="../css/footer.css">

    <!-- <base href="/PW2_U2/"> -->
    <base href="https://safe-stream-39211.herokuapp.com/">
</head>
<body >  

    <?php
        include '../php/header.php';

        if (@$_SESSION['autentificado'] != TRUE) { // Si el usuario no está logueado, se puede Registrar
    ?>

    <section id="contactoContainer">
        <div class="registrarDatos">
            <p class="tituloForm">Registrar usuarios:</p> <!--  -->
            
            <form class="form-horizontal" id="solicitar-form" action="./php/panelControl.php" method="post"> <!--  -->
                <label id="name-label" for="user_id">Id:</label> <!-- id="name-label" -->
                <input name="user_id" type="text" class="form-control" placeholder="Ingresa el Id" autofocus><!-- input-form-->

                <label id="name-label" for="user_name">Nombre:</label>
                <input name="user_name" type="text" class="form-control" placeholder="Ingresa nombre completo" ><!--  -->

                <label id="name-label" for="user_type">Tipo de usuario:</label>
                <input name="user_type" type="text" class="form-control"
                    value="Estudiante" readonly><!--  -->

                <label id="name-label" for="user_pass">Password:</label>
                <input name="user_pass" type="password" class="form-control" min="1" max="100"
                       placeholder="Mínimo 9 caracteres" ><!--  -->

                <input name="user_pass_confirm" type="password" class="form-control passw" min="1" max="100"
                placeholder="Confirmar password" > <!--  -->

                <div id="buttonContainer">
                    <input class="btn btn-primary" type="submit" value="Enviar"><!--  -->
                </div>
            </form>
        </div>
        <div class="registrarImg">
            <img class="formImage" src="./img/kids-school.jpg" alt="niños en el salón">
        </div>
    </section>

    <?php
        } else {
            echo "<script type='text/javascript'>";               // Si no está logueado el usuario,
            echo "window.location.href='./php/panelControl.php'"; // lo relocaliza hacia el panelControl.php
            echo "</script>";
        }

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
</html>
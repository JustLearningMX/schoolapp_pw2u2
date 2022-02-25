<?php 
    if (session_id() == '') {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--Se importan estilos-->
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/formulario.css">
    <link rel="stylesheet" href="../css/footer.css">

    <!-- <base href="/PW2_U2/"> -->
    <base href="https://safe-stream-39211.herokuapp.com/">
    <script src="./js/controladorEvaluar.js"></script>
</head>
<body >  

    <?php
        include '../php/header.php';

        // Si el usuario está logueado y es profesor
        if (@$_SESSION['autentificado'] === TRUE AND @$_SESSION['userType'] === 'P' ) { 
    ?>

    <section id="contactoContainer">
        <div class="registrarDatos">
            <p class="tituloForm">Evaluar alumnos:</p>
            <form id="solicitar-form" action="./php/evaluarRegistros.php" method="POST">
                <label id="matricula-label" for="matricula">Matrícula:</label>                
                    <input name="matricula" onblur="verificarTexto()" type="text" class="input-form matricula" 
                    placeholder="Ingresa matrícula del estudiante" autofocus>
                
                <section class="contenedorMaterias">
                    <div class="divisionMaterias">
                        <label id="programacion-label" for="programacion">Programación:</label>
                        <input name="programacion" type="number" class="input-form2 programacion" min="1" max="100" disabled>
                        <label id="matematicas-label" for="matematicas">Matemáticas:</label>
                        <input name="matematicas" type="number" class="input-form2 matematicas" min="1" max="100" disabled>
                        <label id="algoritmos-label" for="algoritmos">Algoritmos:</label>
                        <input name="algoritmos" type="number" class="input-form2 algoritmos" min="1" max="100" disabled>
                    </div>
                    <div class="divisionMaterias">                    
                        <label id="logica-label" for="logica">Lógica:</label>
                        <input name="logica" type="number" class="input-form2 logica" min="1" max="100" disabled>
                        <label id="so-label" for="so">SO:</label>
                        <input name="so" type="number" class="input-form2 so" min="1" max="100" disabled>
                        <label id="bd-label" for="bd">BD:</label>
                        <input name="bd" type="number" class="input-form2 bd" min="1" max="100" disabled>
                    </div>
                </section>

                <div id="buttonContainer">
                    <input class="submittButton" type="submit" value="Enviar" disabled>
                </div>
            </form>
        </div>
        <div class="registrarImg">
            <img class="formImage" src="./img/evaluar.png" alt="evaluacion">
        </div>
    </section>

    <?php
        } else { // Si no está logueado o no es profesor
            echo "<script type='text/javascript'>";               
            echo "window.location.href='./index.php'"; // lo relocaliza hacia el panelControl.php
            echo "</script>";
        }

        include '../php/footer.php';
    ?>
</body>
</html>
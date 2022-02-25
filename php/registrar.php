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
</head>
<body >  

    <?php
        include '../php/header.php';

        if (@$_SESSION['autentificado'] != TRUE) { // Si el usuario no está logueado, se puede Registrar
    ?>

    <section id="contactoContainer">
        <div class="registrarDatos">
            <p class="tituloForm">Registrar usuarios:</p>
            <form id="solicitar-form" action="./php/panelControl.php" method="post">
                <label id="name-label" for="user_id">Id:</label>
                <input name="user_id" type="text" class="input-form" placeholder="Ingresa el Id" autofocus>
                <label id="name-label" for="user_name">Nombre:</label>
                <input name="user_name" type="text" class="input-form" placeholder="Ingresa nombre completo" >
                <label id="email-label" for="user_type">Tipo de usuario:</label>
                <input name="user_type" type="text" class="input-form"
                    value="Estudiante" readonly>
                <label id="number-label" for="user_pass">Password:</label>
                <input name="user_pass" type="password" class="input-form" min="1" max="100"
                       placeholder="Mínimo 9 caracteres" >
                <input name="user_pass_confirm" type="password" class="input-form" min="1" max="100"
                placeholder="Confirmar password" >         

                <div id="buttonContainer">
                    <input class="submittButton" type="submit" value="Enviar">
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
</body>
</html>
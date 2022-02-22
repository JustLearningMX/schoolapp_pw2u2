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

        if (@$_SESSION['autentificado'] != TRUE) { // Si el usuario no está logueado, solicita user y pass
    ?>

    <section id="contactoContainer">
        <div class="registrarDatos">
            <p class="tituloForm">Ingresar:</p>
            <form id="solicitar-form" action="./php/panelControl.php" method="POST">
                <label id="name-label" for="user_id">Id de usuario:</label>
                <input name="user_id" type="text" class="input-form" placeholder="Ingresa el Id" required>
                <label id="number-label" for="user_pass">Password:</label>
                <input name="user_pass" type="password" class="input-form" min="1" max="100"
                    required>            

                <div id="buttonContainer">
                    <input class="submittButton" type="submit" value="Enviar">
                </div>
            </form>
        </div>
        <div class="registrarImg">
            <img class="formImage" src="./img/login.jpg" alt="login">
        </div>
    </section>

    <?php
        } else {
            echo "<script type='text/javascript'>";               // Si ya está logueado el usuario,
            echo "window.location.href='./php/panelControl.php'"; // lo relocaliza hacia el panelControl.php
            echo "</script>";
        }

        include '../php/footer.php';
    ?>
</body>
</html>
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
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/formulario.css">

    <!-- <base href="/PW2_U2/"> -->
    <base href="https://safe-stream-39211.herokuapp.com/">
</head>
<body >  

    <?php
        include '../php/header.php';

        if (@$_GET['salir'] == 'true') {
            session_unset();
            session_destroy();
            header("HTTP/1.1 302 Moved Temporarily");
            header("Location: /PW2_U2/php/login.php");

        } else { 
            if (@$_POST AND isset($_POST['user_name'])) { // --> Si el POST viene de Registrar Usuario
                $idUser = $_POST['user_id'];
                $nameUser = $_POST['user_name'];
                $typeUser = $_POST['user_type'];
                $passUser = $_POST['user_pass'];
                $passUserConfirm = $_POST['user_pass_confirm'];

                //Validamos que no vayan vacíos los campos
                if(empty($idUser) OR empty($nameUser) OR empty($passUser)){                    
                    echo "<script type='text/javascript'>";
                    echo "alert(`Todos los campos deben ir llenos`)";  //Debug
                    echo "</script>";

                    echo "<script type='text/javascript'>";
                    echo "window.location.href='./php/registrar.php'"; // Relocaliza hacia registrar.php
                    echo "</script>";

                } elseif ($passUser === $passUserConfirm) { //Checar passwords coincidan

                    $patronRgx = "/[\w+(\$)*(\#)*(\%)*(\&)*(\-)*]{9}+/i"; //Regex para validar el password

                    // Validación de password cumpla con: min 9 caract, letras y números
                    // y un caracter especial, ejem: mipa$$word18
                    if (preg_match_all($patronRgx, $passUser)) {                        

                        //Enviamos variables a obtenerDatosBd.php
                        $local = false; //Modo Local
                        $getUsers = false; //Obtiene todos los usuarios
                        $login = false; //Bandera para indicar que se NO va a loguear sino a registrar
                        $idUser; // Id recibido del formulario registrar
                        $nameUser; // Nombre recibido del formulario registrar
                        $typeUser; // Tipo recibido del formulario registrar
                        $passUser; // Password recibido del formulario registrar
                        $consultaSelect = "SELECT * FROM";
                        $consultaInsert = "INSERT INTO";
                        include './obtenerDatosBD.php'; 

                    } else {
                        echo "<script type='text/javascript'>";
                        echo "alert(`password NO válido`)";  //Debug
                        echo "</script>";

                        echo "<script type='text/javascript'>";
                        echo "window.location.href='./php/registrar.php'"; // Relocaliza hacia registrar.php
                        echo "</script>";
                    }

                } else { // Passwords no coinciden
                    echo "<script type='text/javascript'>";
                    echo "alert(`Passwords no coinciden`)";  //Debug
                    echo "</script>";
                    
                    echo "<script type='text/javascript'>";
                    echo "window.location.href='./php/registrar.php'"; // Relocaliza hacia registrar.php
                    echo "</script>";
                }
                
            } else { 
                if ($_POST) { // --> Si el POST viene de Login Usuario              
                    $idUser = $_POST['user_id'];
                    $passUser = $_POST['user_pass'];
                }
            }
              
            //Si no está autenticado y viene de Login
            if (@$_SESSION['autentificado'] != TRUE AND !isset($_POST['user_name'])) {                             
                //Enviamos variables a obtenerDatosBd.php
                $local = false; //Modo Local
                $getUsers = false; //Obtiene todos los usuarios
                $login = true; //Bandera para indicar que se va a loguear
                $idUser; // Id recibido del formulario del Login
                $passUser; // Password recibido del formulario del Login
                $consulta = "SELECT * FROM";
                include './obtenerDatosBD.php';                
            } 
            //Si ya está autenticado (Venga de login o registrar)
            else {                
                $idUser = $_SESSION['userId'];
                $nameUser = $_SESSION['userNombre'];
                $typeUser = $_SESSION['userType'];
                $tipo = $typeUser === "E" ? "Estudiante" : "Profesor";

                if (isset($_SESSION['userId'])) {
                    echo "<main style='height: 100vh'>";
                        // echo "<section id='discapacidadInfo'>";
                            echo "<p class='descripcionInfo'>";
                                echo "Hola nuevamente $nameUser";
                            echo "</p>";
                            echo "<p class='parrafoInfo'>";
                                echo "Tu Id de usuario es: $idUser";
                            echo "</p>";
                            echo "<p class='parrafoInfo'>";
                                echo "Tu tipo de usuario es: $tipo";
                            echo "</p>";
                            echo "<p class='descripcionInfo'>";
                                echo "<a class='submittButton' style='padding: 15px 50px; letter-spacing: 3px' href='./php/panelControl.php?salir=true'>Salir</a>";
                            echo "</p>";
                        // echo "</section>";
                    echo "</main>";
                } else {
                    echo "<script type='text/javascript'>";
                    echo "alert(`Acceso restringido`)";
                    echo "</script>";
                }
            }
        }

    include '../php/footer.php';

    ?>
</body>
</html>
<?php 
    //Si no existe una sesión
    if (session_id() == '') {
        session_start();
    }
?>

<script src="./js/controladorConsultar.js"></script>

<header>
    <a href="#">
        <div class="empresaContainer">            
            <h1 class="nomEmpresa"><strong>colegio</strong>águila</h1>
        </div>
    </a>
    <nav>
        <!--Menú de navegación-->
        <ul class="menuPrincipal">
            <!--Lista no ordenada para las opciones del menú-->
            <li class="menuItems"><a href="#" class="menuLink">Inicio</a></li>

            <?php
                if (@$_SESSION['autentificado'] != TRUE) { //Menú básico
            ?>
                <li class="menuItems"><a href="./php/registrar.php" class="menuLink">Registrarse</a></li>
                <li class="menuItems"><a href="./php/login.php" class="menuLink">Iniciar sesión</a></li>
            <?php
                 } else {
                     if (@$_SESSION['userType'] == 'E') { //Menú Estudiante
            ?>
                        <li class="menuItems"><a onclick="controladorConsultar('Estudiante')" class="menuLink">Consultar</a></li>
                        <!-- <li class="menuItems"><a href="#" class="menuLink">Usuario: Estudiante</a></li> -->
                        <li class="menuItems"><a href="./php/panelControl.php?salir=true" class="menuLink">Salir</a></li>
            <?php
                     } else { //Menú Profesor
            ?>
                        <li class="menuItems"><a href="./php/evaluar.php" class="menuLink">Evaluar</a></li>
                        <!-- <li class="menuItems"><a href="#" class="menuLink">Usuario: Profesor</a></li> -->
                        <li class="menuItems"><a onclick="controladorConsultar('Profesor')" class="menuLink">Consultar</a></li>
                        <li class="menuItems"><a href="./php/panelControl.php?salir=true" class="menuLink">Salir</a></li>
            <?php
                     }
                }
            ?>    
            <!-- Opción que muestra los usuarios del sistema (profesor y alumnos) en una tabla-->
            <li class="menuItems"><a href="./php/tablaUsuarios.php" class="menuLink">Tabla</a></li>
        </ul>
    </nav>
</header>
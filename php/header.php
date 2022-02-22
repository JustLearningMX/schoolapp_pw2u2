<?php 
    if (session_id() == '') {
        session_start();
    }
?>

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
                if (@$_SESSION['autentificado'] != TRUE) {
            ?>
                <li class="menuItems"><a href="./php/registrar.php" class="menuLink">Registrarse</a></li>
                <li class="menuItems"><a href="./php/login.php" class="menuLink">Iniciar sesión</a></li>
            <?php
                 } else {
                     if (@$_SESSION['userType'] == 'E') { 
            ?>
                        <li class="menuItems"><a href="#" class="menuLink">Consultar Calificaciones</a></li>
                        <li class="menuItems"><a href="#" class="menuLink">Usuario: Estudiante</a></li>
                        <li class="menuItems"><a href="./php/panelControl.php?salir=true" class="menuLink">Cerrar sesión</a></li>
            <?php
                     } else {
            ?>
                        <li class="menuItems"><a href="#" class="menuLink">Registrar Calificaciones</a></li>
                        <li class="menuItems"><a href="#" class="menuLink">Usuario: Profesor</a></li>
                        <li class="menuItems"><a href="#" class="menuLink">Consultar</a></li>
                        <li class="menuItems"><a href="./php/panelControl.php?salir=true" class="menuLink">Cerrar sesión</a></li>
            <?php
                     }
                }
            ?>           
            
            <li class="menuItems"><a href="./php/tablaUsuarios.php" class="menuLink">Tabla</a></li>
        </ul>
    </nav>
</header>
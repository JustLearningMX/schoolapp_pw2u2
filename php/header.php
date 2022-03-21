<?php 
    //Si no existe una sesión
    if (session_id() == '') {
        session_start();        
    }
?>
    <script src="./js/controladorConsultar.js"></script>

    <!-- CÓDIGO BOOTSATRAP PARA AGREGAR MENÚ FIJO -->
    <nav class="navbar fixed-top navbar-expand-lg px-5 header" >
        
        <a href="#" class="empresaContainer">
            <div class="logoContainer">            
                <h1 class="nomEmpresa"><strong>colegio</strong>águila</h1>
            </div>
        </a>

        <!-- Botón hamburguesa -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item menuItems">
                    <a class="nav-link menuLink" href="#">Inicio </a></li>
                <?php
                    if (@$_SESSION['autentificado'] != TRUE) { //Menú básico
                ?>
                    <li class="nav-item menuItems"><a href="./php/registrar.php" class="nav-link menuLink">Registrarse</a></li>
                    <li class="nav-item menuItems"><a href="./php/login.php" class="nav-link menuLink">Login</a></li>
                <?php
                    } else {
                        if (@$_SESSION['userType'] == 'E') { //Menú Estudiante
                ?>
                            <li class="nav-item menuItems"><span onclick="controladorConsultar('Estudiante')" class="nav-link menuLink">Consultar</span></li>
                            <li class="nav-item menuItems"><a href="./php/panelControl.php?salir=true" class="nav-link menuLink">Salir</a></li>
                <?php
                        } else { //Menú Profesor
                ?>
                            <li class="nav-item menuItems"><a href="./php/evaluar.php" class="nav-link menuLink">Evaluar</a></li>
                            <li class="nav-item menuItems"><span onclick="controladorConsultar('Profesor')" class="nav-link menuLink">Consultar</span></li>
                            <li class="nav-item menuItems"><a href="./php/panelControl.php?salir=true" class="nav-link menuLink">Salir</a></li>
                <?php
                        }
                    }
                ?>
                <li class="nav-item menuItems"><a href="./php/tablaUsuarios.php" class="nav-link menuLink">Tabla</a></li>    
            </ul>
        </div>
    </nav>
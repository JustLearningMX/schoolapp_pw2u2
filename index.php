<!DOCTYPE html>
<!--Etiqueta para indicar que se usa HTML5 
    UNAdM. Desarrollo de Software
    Materia: Programación Web 2    
    Alumno: Hiram Chávez López
    Matrícula: ES1821000366.
    Profesor: Fernando Viscarra Saveedra
-->
<html lang="es">
<!--Etiqueta para indicar el idioma de la página-->

<head>
    <!--Cabecera de la página-->
    <meta charset="UTF-8">
    <!--Metaetiquetas de información relevante para el navegador-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colegio Águila</title>
    <!--Título de la página-->

    <!--Se importan estilos-->
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/main.css">    
    <!-- <link rel="stylesheet" href="./css/formulario.css"> --> -->

    <!-- Establecemos rutas relativas, ya sea para trabajar en Local o en Heroku -->
    <base href="/PW2_U2/">
    <!-- <base href="https://morning-dawn-52068.herokuapp.com/"> -->
</head>
<!---->

<!--Inicia el cuerpo del sitio. Lo que esté aquí se mostrará al usuario-->

<body>

    <!-- INCLUIMOS EL HEADER -->
    <?php
        include './php/header.php';
    ?>
    <!--Etiqueta semántica para todo el contenido-->
    <main>        
        <section id="discapacidadInfo">
            <h2 class="descripcionInfo">En el <span class="span1">colegio</span><span class="span2">águila</span> contamos con 
                modernas instalaciones para un mejor aprendizaje de los alumnos. El personal que elabora en nuestra 
                institución son personas íntegras, preparadas y con un alto sentido del deber en la noble labor de la enseñanza.</h2>

            <p class="parrafoInfo">
                Nuestra <span class="span3">misión</span> es formar alumnos de calidad, íntegros y con altos valores que les permitan ser mejores en sus 
                acciones ante la sociedad y ellos mismos.                
            </p>
            <p class="parrafoInfo">
                Nuestra <span class="span3">visión</span> es ofrecer una educación continúa con altos estándares de calidad basados en buenos valores, 
                impulsados por las tecnologías de la información y comunicación como eje de vanguardia.
            </p>
            <!-- <img class="discapacidadImg" src="./img/discapacidad_0.jpg" alt="Discapacidades"> -->
        </section>        
    </main>

    <?php
        include './php/footer.php';
    ?>

</body>

</html>
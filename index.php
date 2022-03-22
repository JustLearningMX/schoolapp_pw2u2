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
    <title>Colegio Águila con Bootstrap</title>
    <!--Título de la página-->

    <!-- Se importa Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--Se importan estilos personalizados-->
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/main.css">    
    <!-- <link rel="stylesheet" href="./css/formulario.css"> -->

    <!-- agregando recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Establecemos rutas relativas, ya sea para trabajar en Local o en Heroku -->
    <!-- <base href="/PW2_U2/"> -->
    <base href="https://safe-stream-39211.herokuapp.com/">
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
            
            <div class="card-deck">
                <div class="card">
                    <img src="./img/equipo.jpg" class="card-img-top" alt="team-work">
                    <div class="card-body">
                    <h5 class="card-title">Equipo</h5>
                    <p class="card-text">
                        Fomentamos el trabajo colaborativo, el espíritu de trabajo en equipo genera una sinergia que permite a los estudiantes
                        prepararse para trabajar con pares similares.</p>
                    </div>
                    <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card">
                    <img src="./img/proactivo.jpg" class="card-img-top" alt="proactive">
                    <div class="card-body">
                    <h5 class="card-title">Proactivos</h5>
                    <p class="card-text">Impulsamos el conocimiento que genera la curiosidad. Buscamos que los alumnos sean autocognitivos y autogestivos
                        en la búsqueda de su propio conocimento.</p>
                    </div>
                    <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card">
                    <img src="./img/profesor.jpg" class="card-img-top" alt="profesor-tech">
                    <div class="card-body">
                    <h5 class="card-title">Tecnología</h5>
                    <p class="card-text">Uno de los ejes centrales de nuestro método de enseñanza es la tecnología como impulsor del conocimiento.
                        Las TIC son herramientas esenciales en nuestra institución.</p>
                    </div>
                    <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>

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
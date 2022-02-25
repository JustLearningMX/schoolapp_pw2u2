<!-- Este script de JS llena una tabla HTML con los datos de la BD -->
  <script type="text/javascript" src="./js/llenarTablaUsers.js"></script>
  <!-- <script type="text/javascript" src="./js/llenarCalificaciones.js"></script>   -->

<?php
  if (session_id() == '') {
      session_start();
  }

//En modo local trabajamos con Xampp
  if($local){
    $host= "localhost";
    $user= "root";
    $bd= "es1821000366";
    $pass= "";
    $tabla = "usuarios";
    
    //si trabajamos con Heroku u otro hosting
  } else {
    $host= "us-cdbr-east-05.cleardb.net";
    $user= "beed73ed0c715b";
    $bd= "heroku_1c9bbf4429d4520";
    $pass= "e1981089";
    $tabla = "usuarios";
  };
  
  // Parámetros para la conexión con PDO
  $dsn = "mysql:host=$host;dbname=$bd";
  $username = "$user";
  $password = "$pass";
  $options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'", //Para los acentos
    PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION,
    // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ //CONVIERTE A OBJETO EL RESULTADO
  );

  //Conexión segura a la BD  
  try {
    $pdo = new PDO($dsn, $username, $password, $options); //Conectamos
  } 
  catch (PDOException $e) { //Si existe un error
      echo "Error en Conexión a BD:" . $e->getMessage();
      die();
      echo "<script type='text/javascript'>";
      echo "alert(`Falló la conexión a la BD`)";
      echo "</script>";
  }

  // **** PREPARAMOS LAS CONSULTAS SELECT PARA MOSTRAR TODOS LOS USUARIOS EN 
  //***** UNA TABLA O PARA BUSCAR UN SOLO USUARIO Y GUARDAR SU SESIÓN

  if($getUsers){ // Todos los usuarios
    // echo "<script type='text/javascript'>";
    // echo "alert(`Entró a Tabla...!`)"; //Debug 
    // echo "</script>";
    //Consulta
    $statement = $pdo->prepare($consulta . ' ' . $tabla);
    $statement->execute();  

    //Guarda los resultados como un array
    while($rows = $statement->fetch()) {		
      $arreglo []= array(
        'id' => $rows['id_usuario'],
        'nombre' => $rows['nombre_usuario'],
        'tipo' => $rows['tipo_usuario'],
        'password' => $rows['password']
        );
    };
    
    $jsonArray = json_encode($arreglo); //Se pasa a formato JSON    
    echo "<script type='text/javascript'>";  
    echo "llenarTabla($jsonArray)";//Lo pasamos al script de JS que muestra la info en tablaUsuarios.php
    echo "</script>";

  } elseif($login) { // (LOGIN) un usuario en específico
    
    //Consulta con sentencias preparadas
    $statement = $pdo->prepare($consulta . ' ' . $tabla . ' WHERE id_usuario = :IdUser and password = :Pass');
    $IdUser = $idUser;
    $Pass = $passUser;
    $statement->execute(array(':IdUser' => $IdUser, ':Pass' => $Pass));
    $arreglo = [];

    //Guarda los resultados como un array
    while($rows = $statement->fetch()) {		
      $arreglo = array(
        'id' => $rows['id_usuario'],
        'nombre' => $rows['nombre_usuario'],
        'tipo' => $rows['tipo_usuario'],
        'password' => $rows['password']
        );
    };

    if(empty($arreglo)){ // Si no se halló una coincidencia con el USER y PASS pasado en el LOGIN.PHP
      echo "<script type='text/javascript'>";  
      echo "alert(`Usuario o contraseña no existente`)"; // Mensaje
      echo "</script>";
  
      echo "<script type='text/javascript'>";
      echo "window.location.href='./php/login.php'"; // Relocaliza hacia el login
      echo "</script>";
    } else {
      //Si todo OK se guarda la sesión
      $_SESSION['autentificado'] = TRUE;
      $_SESSION['userId'] = $arreglo['id'];
      $_SESSION['userNombre'] = $arreglo['nombre'];
      $_SESSION['userType'] = $arreglo['tipo'];

      echo "<script type='text/javascript'>";
      echo "console.log(`Autenticado!`)"; //Debug 
      echo "</script>";

      //Volvemos al panelControl.php
      echo "<script type='text/javascript'>";
      echo "window.location.href='./php/panelControl.php'"; // Relocaliza hacia el panelControl.php
      echo "</script>";
    }
  } elseif (!empty($nameUser)){ // (REGISTRAR) un usuario en específico
    
    //Consulta con sentencias preparadas, buscaremos Si existe el ID
    $statement = $pdo->prepare($consultaSelect . ' ' . $tabla . ' WHERE id_usuario = :IdUser');
    $IdUser = $idUser;
    $statement->execute(array(':IdUser' => $IdUser));
    $arreglo = [];

    //Guarda el resultado como un array
    while($rows = $statement->fetch()) {		
      $arreglo = array(
        'id' => $rows['id_usuario'],
        'nombre' => $rows['nombre_usuario'],
        'tipo' => $rows['tipo_usuario'],
        'password' => $rows['password']
        );
    };

    //Analizamos si no existe Ya ese Id
    if(empty($arreglo)){ // Si no se halló una coincidencia con el ID_USER

      //Consulta con sentencias preparadas, Insertaremos el nuevo usuario
      $statement = $pdo->prepare($consultaInsert . ' ' . $tabla . ' (id_usuario, nombre_usuario, tipo_usuario, password) VALUES (:IdUser, :NomUser, :TypeUser, :PassUser)');
      $IdUser = $idUser;
      $NomUser = $nameUser;
      $TypeUser = $typeUser === "Estudiante" ? "E" : "P";
      $PassUser = $passUser;
      $statement->execute(array(':IdUser' => $IdUser, ':NomUser' => $NomUser, ':TypeUser' => $TypeUser, ':PassUser' => $PassUser));
      
      echo "<script type='text/javascript'>";
      echo "alert(`¡Usuario $nameUser! creado con éxito!`)"; //Debug 
      echo "</script>";

      //Redireccionamos a la tabla de usuario para ver que se agregó
      echo "<script type='text/javascript'>";
      echo "window.location.href='./php/tablaUsuarios.php'"; // Relocaliza hacia el panelControl.php
      echo "</script>";

    } else {//Si ya existe un ID igual en la BD
      echo "<script type='text/javascript'>";
      echo "alert(`ID existente en la BD. Registre un usuario con otro ID!`)"; //Debug 
      echo "</script>";

      //Volvemos a la sección Registrar usuario
      echo "<script type='text/javascript'>";
      echo "window.location.href='./php/registrar.php'"; // Relocaliza hacia el registrar.php
      echo "</script>";
    }
  };

  if ($getCalificaciones) {
    $tabla = "calificaciones";    

    //Consulta con sentencias preparadas, buscaremos Si existe el ID
    $optMenu === "Estudiante" //Si es un estudiante la búsqueda es específica
    ? $statement = $pdo->prepare($consulta . ' ' . $tabla . ' WHERE matricula_estudiante = :IdUser') : 
      $statement = $pdo->prepare($consulta . ' ' . $tabla); // Si es profesor traerá todo

    $IdUser = $_SESSION['userId'];
    $optMenu === "Estudiante" ? $statement->execute(array(':IdUser' => $IdUser)) : $statement->execute();

    //Guarda el resultado como un array
    while($rows = $statement->fetch()) {		
      $arreglo [] = array(
        'matricula' => $rows['matricula_estudiante'],
        'profesor' => $rows['id_profesor'],
        'programacion' => $rows['programacion'],
        'matematicas' => $rows['matematicas'],
        'algoritmos' => $rows['algoritmos'],
        'logica' => $rows['logica'],
        'so' => $rows['so'],
        'bd' => $rows['bd']
        );
    };

    if(empty($arreglo)){ // Si no se encontró información 
      echo "<script type='text/javascript'>";
      echo "alert(`No se encontró información en la BD!`)"; //Debug 
      echo "</script>";
    } else {
      $jsonArray = json_encode($arreglo); //Se pasa a formato JSON    
      echo "<script type='text/javascript'>";  
      echo "llenarCalificaciones($jsonArray)";//Lo pasamos al script de JS que muestra la info en tablaUsuarios.php
      echo "</script>";
    }

  }

  $pdo = null; // Cerramos la conexión
?>